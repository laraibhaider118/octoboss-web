<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$content = (array)json_decode(file_get_contents('php://input'), TRUE);

$email = isset($content['email']) ? $content['email'] : '';
$type = isset($content['type']) ? $content['type'] : 'email';
if ($type == 'email') {
    $user_type = 0;
    $error_message = null;
    $error = null;
    if (empty($email)) {
        $error = 1;
        $error_message = 'Email is required!';
    }
    if (isset($error) && $error = 1) {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => $error_message));
        exit();
    }
    $query = mysqli_query($con, "SELECT * from tbl_member where email = '$email'");
    $rows = mysqli_num_rows($query);
    $result = mysqli_fetch_assoc($query);

    if ($rows == 0) {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => "Wrong Email!"));
        exit();
    }
    $full_name = $result['full_name'];
    $member_id = $result['id'];
    $random_number = rand(99999, 999999);
    include_once("../includes/functions.php");
    $data['email'] = $email;

    $message['subject'] = 'OTP Code';
    $message['body'] = "<b>Hello " . $full_name . " </b>";
    $message['body'] .= '<p>Your OTP is is:</p>';
    $message['body'] .= '<p>' . $random_number . '</p>';
    $send = sendEmail($data, $message);
    // echo $send;
    // die;
    if ($send != 1) {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => $send));
        exit();
    }
    $pass_string = $random_number;

    $sending_time = date('H:i:s');
    // $password = md5($pass_string);
    if ($send == 1) {
        $insert_query = "UPDATE tbl_member set otp_code = '$pass_string' , otp_time ='$otp_time' WHERE id = '$member_id'";

        $isert_record = mysqli_query($con, $insert_query);
        $last_id = mysqli_affected_rows($con);
        if ($last_id > 0) {
            $code = http_response_code(201);
            echo json_encode(array("response" => 1, "user_id" => $last_id,  "code" => $code, 'id' => $last_id, "message" => "OTP sent! please check your email"));
            exit();
        } else {
            $code = http_response_code(200);
            echo json_encode(array("response" => 0, "code" => $code, "message" => "Error Occured!"));
            exit();
        }
    } else {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code" => $code, "message" => "Invalid Email!"));
        exit();
    }
}