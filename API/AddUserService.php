<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = mysqli_real_escape_string($con, $data_post['user_id']);
$service = mysqli_real_escape_string($con, $data_post['service']);

$quer = mysqli_fetch_assoc(mysqli_query($con, "SELECT category from tbl_member where id=$user_id"));

$category = isset($quer['category']) ? $quer['category'] : '';
if (isset($category) && !empty($category)) {
    $new_service = $category . ',' . $service;
} else {
    $new_service = $service;
}
mysqli_query($con, "UPDATE tbl_member set category='" . $new_service . "' WHERE id=$user_id");
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "Service Added Successfully!"));
exit();