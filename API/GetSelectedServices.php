<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';
if (empty($user_id)) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Missing Required Data!"));
    exit();
}
$query = mysqli_query($con, "SELECT service_id from tbl_member Where id = $user_id");
$affected_rows = mysqli_affected_rows($con);
if ($affected_rows > 0) {
    $service_Res = mysqli_fetch_assoc($query);
    $ser_ids = $service_Res['service_id'];
    $ser_Array = explode(',', $ser_ids);
    $services_data = array();
    foreach ($ser_Array as $key => $ser) {
        $row = array();
        $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT product_name,id from services_tbl Where id = $ser"));
        $row['service_id'] = $fetch['id'];
        $row['service_name'] = $fetch['product_name'];
        array_push($services_data, $row);
    }
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Selected Services List", "data" => $services_data));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Error Occured"));
    exit();
}