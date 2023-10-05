<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$content = (array)json_decode(file_get_contents('php://input'), TRUE);

$email = isset($content['email']) ? $content['email'] : '';
$new_password = isset($content['new_password']) ? $content['new_password'] : '';
$otp_code = isset($content['otp_code']) ? $content['otp_code'] : '';

$user_type = 0;
$error_message = null;
$error = null;
if (empty($otp_code)) {
    $error = 1;
    $error_message = 'OTP is required!';
}
if (empty($new_password)) {
    $error = 1;
    $error_message = 'Password is required!';
}
if (empty($email)) {
    $error = 1;
    $error_message = 'Email is required!';
}
if (isset($error) && $error = 1) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => $error_message));
    exit();
}
// $valid_otp = true;
$check = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_member WHERE email='$email' AND otp_code = '$otp_code'"));
$valid_otp = isset($check['id']) ? true : false;
if ($valid_otp) {
    $password = md5($new_password);
    if ($email) {
        mysqli_query($con, "UPDATE tbl_member set password = '$password' , pass_string='$new_password' Where email = '$email'");
        $code = http_response_code(201);
        echo json_encode(array("response" => 1,  "code" => $code,  "message" => "Password Changed!"));
        exit();
    } else {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => "Error Occured!"));
        exit();
    }
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => "Wrong OTP!"));
    exit();
}