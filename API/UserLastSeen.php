<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] :'';
$status = isset($data_post['status']) ? $data_post['status'] :'';
if(empty($user_id)){
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "User id is required!"));
    exit();  
}
if($status=='online'){
    mysqli_query($con,"UPDATE tbl_member set is_online=1 where id = $user_id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Online Status Updated Successfully"));
    exit();
}else{
    $last_login =date('Y-m-d H:i:s');
    mysqli_query($con,"UPDATE tbl_member set last_login='$last_login',is_online=0 where id = $user_id");
    if(mysqli_error($con)){
        $code = http_response_code(201);
        echo json_encode(array("response" =>0, "code"=> $code, 'message' => mysqli_error($con)));
        exit();
    }
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Offline Status Updated Successfully!"));
    exit();
}


?>