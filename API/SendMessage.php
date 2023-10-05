<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = $_POST;
// $data_post = (array)json_decode(file_get_contents("php://input"));
$sender_id = isset($data_post['sender_id']) ? $data_post['sender_id'] : '';
$receiver_id = isset($data_post['receiver_id']) ? $data_post['receiver_id'] : '';
$title = isset($data_post['title']) ? $data_post['title'] : '';
$message = isset($data_post['message']) ? $data_post['message'] : '';
$contact_name = isset($data_post['contact_name']) ? $data_post['contact_name'] : '';
$contact_no = isset($data_post['contact_no']) ? $data_post['contact_no'] : '';
$time = isset($data_post['time']) ? $data_post['time'] : '';
$dates = isset($data_post['date']) ? $data_post['date'] : '';
$price = isset($data_post['price']) ? $data_post['price'] : '';
$duration = isset($data_post['duration']) ? $data_post['duration'] : '';
$location = isset($data_post['location']) ? $data_post['location'] : '';
$description = isset($data_post['description']) ? $data_post['description'] : '';
$problem = isset($data_post['problem']) ? $data_post['problem'] : '';
$language = isset($data_post['language']) ? $data_post['language'] : '';
$message_type = isset($data_post['message_type']) ? $data_post['message_type'] : '';
$approved = isset($data_post['approved']) ? $data_post['approved'] : '';
$issue_id = isset($data_post['issue_id']) ? $data_post['issue_id'] : 0;
$file = isset($_FILES['file']) ? $_FILES['file'] : '';
$date = date('Y-m-d H:i:s');
$sending_time = date('h:i A', strtotime($date));
// echo $sending_time;
// die;
function generateRandomString($length = 32)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$order_id = generateRandomString();
$target_dir = "../images/chat";


// $pos = strpos($file, ';');
// $type = explode(':', substr($file, 0, $pos))[1];
// $mime = explode('/', $type);
// if (empty($pos)) {
//     echo json_encode(array('response' => 0, 'message' => 'Please upload a vlaid image'));
//     exit;
// }
// $pathImage = "../images/chat/" . $order_id . time() . '.' . $mime[1];
// $savepath = "images/chat/" . $order_id . time() . '.' . $mime[1];
// $file = substr($file, strpos($file, ',') + 1, strlen($file));
// $dataBase64 = base64_decode($file);
// file_put_contents($pathImage, $dataBase64);
// $image_link = $base_url . $pathImage;
if (isset($_FILES["file"]["name"]) and !empty($_FILES["file"]["name"])) {

    $target_dir = "../images/chat/";
    $_dir = "images/chat/";
    $uniquePath = uniqid() . basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $uniquePath;
    $target_file = str_replace(' ', "_", $target_file);
    $savepath = $_dir . $uniquePath;

    $savepath = str_replace(' ', "_", $savepath);
    $path = APPURL . $savepath;
    $extension = pathinfo($target_file, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
}

$query = mysqli_query($con, 'INSERT INTO `chat`(`sender_id`, `receiver_id`, `title`, `message`, `date`,`image`,`message_type`,`contact_name`,`contact_no`,`time`,`dates`,`price`,`duration`,`location`,`description`,`problem`,`language`,`approved`,`issue_id`,`sending_time`) VALUES (' . $sender_id . ',' . $receiver_id . ',"' . $title . '","' . $message . '","' . $date . '","' . $path . '","' . $message_type . '","' . $contact_name . '","' . $contact_no . '","' . $time . '","' . $dates . '","' . $price . '","' . $duration . '","' . $location . '","' . $description . '","' . $problem . '","' . $language . '","' . $approved . '","' . $issue_id . '","' . $sending_time . '")');
// $all_data = mysqli_fetch_all($query,MYSQLI_ASSOC);
$count = mysqli_insert_id($con);
if ($count > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Message Sent"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => "Error Occured ! Error Description: " . mysqli_error($con)));
    exit();
}