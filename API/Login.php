<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$email = mysqli_real_escape_string($con, $data_post['email']);
$email = strtolower($email);
$password = mysqli_real_escape_string($con, $data_post['password']);
$type = mysqli_real_escape_string($con, $data_post['type']);
$user_type=99999;
if($type=='octoboss'){
    $user_type = 0;
}
if($type=='customer'){
    $user_type = 1;
}
$sqll ="SELECT * from tbl_member where LOWER(email)='$email' AND password = '" . md5($password) . "' and user_type=$user_type ";

$query = mysqli_query($con, $sqll);
$count = mysqli_affected_rows($con);
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$token = random_string(32);
if ($count > 0) {
    $fetch = mysqli_fetch_array($query);
    
    $verified = isset($fetch['verified']) ? $fetch['verified'] : '';
    $block = isset($fetch['block']) ? $fetch['block'] : '';
    if(isset($block) && $block==1){
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code"=>$code, "message" => "Your account is blocked"));
        exit();
    }
    $id = $fetch['id'];
    $email = $fetch['email'];
    // mysqli_query($con,"UPDATE tbl_member set is_online=1 where id = $id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $fetch));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Wrong email or password!"));
    exit();
}

?>