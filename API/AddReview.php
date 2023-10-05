<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$content = (array)json_decode(file_get_contents('php://input'), TRUE);
$member_id = isset($content['member_id']) ? $content['member_id'] :'';
$user_id = isset($content['user_id']) ? $content['user_id'] :'';
$rating = isset($content['rating']) ? $content['rating'] :'';
$review = isset($content['review']) ? $content['review'] :'';
$created_at = date('Y-m-d H:i:s');
$insert_query = "INSERT INTO `ratings`(`member_id`, `user_id`, `rating`, `review`) VALUES ('".$member_id."','".$user_id."','".$rating."','".$review."')";
$isert_record = mysqli_query($con, $insert_query);
$last_id = mysqli_insert_id($con);
if ($last_id > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'id' => $last_id, "message"=>"Review Added Successfully!"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Error Occured, Try Again Later!"));
    exit();
}