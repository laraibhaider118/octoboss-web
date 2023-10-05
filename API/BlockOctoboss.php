<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$member_id = mysqli_real_escape_string($con, $data_post['member_id']);
$staus = mysqli_real_escape_string($con, $data_post['status']);
$status = 1;
if ($status_string == 'unblock') {
    $status = 0;
}
$sql = "UPDATE tbl_member SET block = '$status' WHERE id= $member_id ";
$query = mysqli_query($con, $sql);
$count = mysqli_num_rows($query);

$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "Status Updated Successfully!"));
exit();
