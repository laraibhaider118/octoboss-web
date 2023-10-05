<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$content = (array)json_decode(file_get_contents('php://input'), TRUE);

$full_name =  isset($content['name']) ? $content['name'] :'';
$name_array= explode(" ",$full_name);
$first_name = isset($name_array[0]) ? $name_array[0] : '';
$last_name = isset($name_array[1]) ? $name_array[1] : '';

$email = isset($content['email']) ? $content['email'] : '';
$type = isset($content['type']) ? $content['type'] : '';
$user_type = 0;
if (isset($type) && $type == 'customer') {
    $user_type = 1;
}
$error_message = null;
$error = null;
$email_q = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from tbl_member where email='$email'"));
$exist_id = isset($email_q['id']) ? $email_q['id'] : 0;
if (isset($exist_id) && !empty($exist_id) && $exist_id > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "user_id" => $exist_id,  "code" => $code, 'id' => $exist_id, "message" => "Signin successfully"));
    exit();
} else {
    $insert_query = "INSERT INTO `tbl_member`(`user_type`,`first_name`,`last_name`,`full_name`, `email`) VALUES ('" . $user_type . "','" . $first_name . "','" . $last_name . "','" . $full_name . "','" . $email . "')";
    mysqli_query($con,$insert_query);
    $last_id = mysqli_insert_id($con);
    if ($last_id > 0) {
        $code = http_response_code(201);
        echo json_encode(array("response" => 1, "user_id" => $last_id,  "code" => $code, 'id' => $last_id, "message" => "Sign in successfully"));
        exit();
    } else {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => "Error Occured!".mysqli_error($con)));
        exit();
    }
}
