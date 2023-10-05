<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = $_POST;
$sender_id = isset($data_post['sender_id']) ? $data_post['sender_id'] : '';
$receiver_id = isset($data_post['receiver_id']) ? $data_post['receiver_id'] : '';
$issue_id = isset($data_post['issue_id']) ? $data_post['issue_id'] : '';
$location = isset($data_post['location']) ? $data_post['location'] : '';
$description = isset($data_post['description']) ? $data_post['description'] : '';
$problem = isset($data_post['problem']) ? $data_post['problem'] : '';
$languages = isset($data_post['languages']) ? $data_post['languages'] : '';
$price = isset($data_post['price']) ? $data_post['price'] : '';
$rating = isset($data_post['rating']) ? $data_post['rating'] : '';
$duration = isset($data_post['duration']) ? $data_post['duration'] : '';
$time = isset($data_post['time']) ? $data_post['time'] : '';
$date = isset($data_post['date']) ? $data_post['date'] : '';
$issue_image = isset($data_post['issue_image']) ? $data_post['issue_image'] : '';

$error_message = null;
$error = null;
if (empty($sender_id)) {
    $error = 1;
    $error_message = 'Sender id is required!';
}
if (empty($receiver_id)) {
    $error = 1;
    $error_message = 'Receiver Id is required!';
}
if (empty($issue_id)) {
    $error = 1;
    $error_message = 'Issue Id is required!';
}

if (isset($error) && $error = 1) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => $error_message));
    exit();
}
$image_path = NULL;
if (isset($_FILES["issue_image"]["name"]) and !empty($_FILES["issue_image"]["name"])) {

    $target_dir = "../images/jobs_done/";
    $_dir = "images/jobs_done/";
    $uniquePath = uniqid() . basename($_FILES["issue_image"]["name"]);
    $target_file = $target_dir . $uniquePath;
    $target_file = str_replace(' ', "_", $target_file);
    $savepath = $_dir . $uniquePath;

    $savepath = str_replace(' ', "_", $savepath);
    $cerpath =  APPURL . $savepath;
    $extension = pathinfo($target_file, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["issue_image"]["tmp_name"], $target_file)) {
        $image_path = $cerpath;
    }
}
$created_on = date('Y-m-d H:i:s');
mysqli_query($con, "INSERT INTO `jobs`(`sender_id`, `receiver_id`, `issue_id`, `description`, `problem`, `location`, `languages`, `price`, `time`, `date`, `issue_image`, `created_on`,`duration`,`rating`) VALUES ('" . $sender_id . "','" . $receiver_id . "','" . $issue_id . "','" . $description . "','" . $problem . "','" . $location . "','" . $languages . "','" . $price . "','" . $time . "','" . $date . "','" . $image_path . "','" . $created_on . "','" . $duration . "','" . $rating . "')");
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "New job done posted successfully"));
exit();