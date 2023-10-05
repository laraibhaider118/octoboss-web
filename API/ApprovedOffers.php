<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$sender_id = isset($data_post['sender_id']) ?  $data_post['sender_id'] : 0;
$receiver_id = isset($data_post['receiver_id']) ?  $data_post['receiver_id'] : 0;
$approved = isset($data_post['approved']) ?  $data_post['approved'] : '';
$offer_id = isset($data_post['offer_id']) ?  $data_post['offer_id'] : 0;
$date = isset($data_post['date']) ?  $data_post['date'] : 0;
$time = isset($data_post['time']) ?  $data_post['time'] : 0;
$created_at = date('Y-m-d H:i:s');
$query = mysqli_query($con, "INSERT INTO `approved_offers`(`sender_id`, `receiver_id`, `approved`, `offer_id`, `created_at`, `date`, `time`) VALUES ($sender_id, $receiver_id, '$approved',$offer_id, '$created_at', '$date', '$time')");


$last_id = mysqli_insert_id($con);
if ($last_id > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Approved Offer Created Successfully!!"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => "Error Occured! Description:: " . mysqli_error($con)));
    exit();
}