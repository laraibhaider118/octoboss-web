<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';
$octoboss_id = isset($data_post['octoboss_id']) ? $data_post['octoboss_id'] : '';
$created_at = date('Y-m-d H:i:s');
if (empty($user_id) || empty($octoboss_id)) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "User and Octoboss ids are required!"));
    exit();
}
$q = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from octoboss_fav where user_id = $user_id AND octoboss_id = $octoboss_id"));
$exist_id = isset($q['id']) ? $q['id'] : '';
if ($exist_id > 0) {
    mysqli_query($con, "DELETE from octoboss_fav where user_id = $user_id AND octoboss_id = $octoboss_id");
    mysqli_query($con, "UPDATE tbl_member set fav_count=fav_count - 1 where id = $octoboss_id");
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "OctoBoss Removed from Favoutire List!"));
    exit();
}
$query = mysqli_query($con, "INSERT INTO `octoboss_fav`(`user_id`, `octoboss_id`, `created_at`) VALUES ($user_id,$octoboss_id,'$created_at')");
$insert_id = mysqli_insert_id($con);
if ($insert_id > 0) {
    mysqli_query($con, "UPDATE tbl_member set fav_count=fav_count + 1 where id = $octoboss_id");
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "OctoBoss Added in Favoutire List!"));
    exit();
}
