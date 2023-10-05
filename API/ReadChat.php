<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$sender_id = isset($data_post['sender_id']) ? $data_post['sender_id'] :'';
$receiver_id = isset($data_post['receiver_id']) ? $data_post['receiver_id'] :'';

$sqll ="UPDATE chat set status='read' where receiver_id = $receiver_id AND sender_id=$sender_id";
 
$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$code = http_response_code(201);
echo json_encode(array("response" =>1, "code"=> $code, 'message'=>"Status Updated as read!"));
exit();
?>