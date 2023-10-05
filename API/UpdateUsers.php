<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$action = isset($data_post['action']) ? $data_post['action'] :'';
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] :'';
$is_fav = isset($data_post['is_fav']) ? $data_post['is_fav'] :'';
$is_online = isset($data_post['is_online']) ? $data_post['is_online'] :'';
$last_login = isset($data_post['last_seen']) && $data_post['last_seen']==1 ? date('Y-m-d H:i:s') :'';

if($action=='fav_octoboss'){
    mysqli_query($con,"UPDATE tbl_member set is_fav=$is_fav where id = $user_id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "OctoBoss Updated Successfully!"));
    exit();
}
if($action=='last_seen'){
    mysqli_query($con,"UPDATE tbl_member set last_login='$last_login',is_online=0 where id = $user_id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "OctoBoss Updated Successfully!"));
    exit();
}
if($action=='is_online'){
    mysqli_query($con,"UPDATE tbl_member set is_online='$is_online' where id = $user_id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "OctoBoss Updated Successfully!"));
    exit();
}

?>