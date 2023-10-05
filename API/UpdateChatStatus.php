<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$status = isset($data_post['status']) ? $data_post['status'] : '';
$chat_id = isset($data_post['chat_id']) ? $data_post['chat_id'] : '';
if (empty($status) || empty($chat_id)) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Missing Required Paramaters!"));
    exit();
}
mysqli_query($con, "UPDATE chat set approved='$status' where id = $chat_id");
$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from chat where id  = $chat_id"));
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'data' => $data, 'message' => "Chat Status Updated!"));
exit();