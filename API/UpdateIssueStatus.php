<?php
include_once "../include/conn.php"; 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$id = mysqli_real_escape_string($con, $data_post['id']);
$user_id = mysqli_real_escape_string($con, $data_post['user_id']);
$status = mysqli_real_escape_string($con, $data_post['status']);
$date = date('Y-m-d H:i:s');

$sql = "UPDATE issues SET status = '$status' WHERE id= $id ";
// echo $sql;
$query = mysqli_query($con, $sql);
mysqli_query($con,"INSERT INTO `issues_history`(`issue_id`, `status`, `user_id`, `date`) VALUES ('".$id."','".$status."','".$user_id."','".$date."')");

$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "Status Updated Successfully!"));
exit();
