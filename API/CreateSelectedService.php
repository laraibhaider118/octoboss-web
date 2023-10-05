<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';
$service_id = isset($data_post['service_id']) ? $data_post['service_id'] : '';
if (empty($service_id) || empty($user_id)) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Missing Required Data!"));
    exit();
}
$query = mysqli_query($con, "UPDATE tbl_member set service_id = '" . $service_id . "' Where id = $user_id");
$affected_rows = mysqli_affected_rows($con);
if ($affected_rows > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Service Assigned Successfully!"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Error Occured"));
    exit();
}