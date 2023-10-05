<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';
$current_date = date('Y-m-d');
$query_b = mysqli_query($con, "SELECT * from  boosts_records  ");
while ($fetch = mysqli_fetch_assoc($query_b)) {
    $id = isset($fetch['id']) ? $fetch['id'] : '';
    $boost_id = isset($fetch['boost_id']) ? $fetch['boost_id'] : '';
    $created_date = isset($fetch['created_date']) ? $fetch['created_date'] : '';
    $curentdate = isset($fetch['curentdate']) ? $fetch['curentdate'] : '';
    $plan_start_date = isset($fetch['plan_start_date']) ? $fetch['plan_start_date'] : '';
    $plan_expiry_date = isset($fetch['plan_expiry_date']) ? $fetch['plan_expiry_date'] : '';
    if($plan_expiry_date > $plan_start_date){
        mysqli_query($con,"UPDATE boosts_records set is_expired = 1 where id $id");
    }
}
$plan_q = mysqli_query($con, "SELECT * from boosts_records where user_id = $user_id AND plan_start_date <= '$current_date' AND plan_expiry_date >= '$current_date' AND is_expired=0");
$rows = mysqli_num_rows($plan_q);
if ($rows > 0) {
    $data = mysqli_fetch_assoc($plan_q);
}

if ($rows > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'data' => $data));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "No record found!"));
    exit();
}
