<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';

$certificate = array();
$work_experience = array();

$cer_q = mysqli_query($con, "SELECT * from certificate_images  where octoboss_id = $user_id");
$cer_num_rows = mysqli_num_rows($cer_q);
if ($cer_num_rows > 0) {
    $certificate = mysqli_fetch_all($cer_q, MYSQLI_ASSOC);
}


$wor_q = mysqli_query($con, "SELECT * from experience_images  where octoboss_id = $user_id");
$wor_num_rows = mysqli_num_rows($wor_q);
if ($wor_num_rows > 0) {
    $work_experience = mysqli_fetch_all($wor_q, MYSQLI_ASSOC);
}


$certificate_json =  $certificate;
$work_picture_json =  $work_experience;

$sqll = "SELECT * from tbl_member where id = '" . $user_id . "' ";

$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$pic_res = mysqli_fetch_assoc($query);
// $pic_res = mysqli_fetch_all($query, MYSQLI_ASSOC);
$pic_res['certificate'] = $certificate_json;
$pic_res['work_picture'] = $work_picture_json;
$pic_res['is_online'] = $pic_res['is_online'];
if (count($pic_res) > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'data' => $pic_res));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "No record found!"));
    exit();
}
