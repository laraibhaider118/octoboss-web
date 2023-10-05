<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$date = isset($data_post['date']) ? $data_post['date'] : '';
$time = isset($data_post['time']) ? $data_post['time'] : '';
$input = date('Y-m-d H:i:s', strtotime($date . ' ' . $time));
$current_date = date('Y-m-d H:i:s');
if ($current_date < $input) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => NULL));
    exit();
} else {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Review"));
    exit();
}