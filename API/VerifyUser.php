<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = mysqli_real_escape_string($con, $data_post['user_id']);
$verification_code = mysqli_real_escape_string($con, $data_post['verification_code']);
$sqll ="SELECT * from tbl_member where id = '".$user_id."' AND verified=0 "; 
$query = mysqli_query($con, $sqll);
$count = mysqli_affected_rows($con);

if ($count > 0) {
    $fetch = mysqli_fetch_array($query);
    $verified = isset($fetch['verified']) ? $fetch['verified'] : '';
    
    $id = $fetch['id'];
    $v_code = $fetch['verification_code'];
    if($verification_code==$v_code){
        $return_array=array(
            'id'=>$id,
            'verification_code'=>$v_code
        );
        $code = http_response_code(201);
        echo json_encode(array("response" =>1, "code"=> $code, 'data' => $return_array));
        exit();
    }else{
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code"=>$code, "message" => "Wrong Verification Code!"));
        exit();
    }
    
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Error!"));
    exit();
}

?>