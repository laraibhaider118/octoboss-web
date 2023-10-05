<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// $data_post = (array)json_decode(file_get_contents("php://input"));
$data_post = $_POST;
// $file = isset($data_post['image']) ? $data_post['image'] : '';
$file = isset($_FILES['image']) ? $_FILES['image'] : '';
$title = isset($data_post['title']) ? $data_post['title'] : '';

$tags = isset($data_post['tags']) ? $data_post['tags'] : '';
$description = isset($data_post['description']) ? $data_post['description'] : '';
$problem = isset($data_post['problem']) ? $data_post['problem'] : '';
$issue_type = isset($data_post['issue_type']) ? $data_post['issue_type'] : 'Public';
$status = isset($data_post['status']) ? $data_post['status'] : '';
$languages = isset($data_post['languages']) ? $data_post['languages'] : '';
$created_by = isset($data_post['created_by']) ? $data_post['created_by'] : '';
$created_at = date('Y-m-d H:i:s');
$add = 1;
// $code = http_response_code(201);
// echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Your Data",'data'=>$data_post));
// exit();
if (isset($add) && $add == 1) {
    $order_id = generateRandomString();
    // $target_dir = "../images/issues";


    // $pos = strpos($file, ';');
    // $type = explode(':', substr($file, 0, $pos))[1];
    // $mime = explode('/', $type);
    // if (empty($pos)) {
    //     echo json_encode(array('response' => 0, 'message' => 'Please upload a vlaid image'));
    //     exit;
    // }
    // $pathImage = "../images/issues/" . $order_id . time() . '.' . $mime[1];
    // $savepath = "images/issues/" . $order_id . time() . '.' . $mime[1];
    // $file = substr($file, strpos($file, ',') + 1, strlen($file));
    // $dataBase64 = base64_decode($file);
    // file_put_contents($pathImage, $dataBase64);
    // $image_link = $base_url . $pathImage;
    if (isset($_FILES["image"]["name"]) and !empty($_FILES["image"]["name"])) {

        $target_dir = "../images/issues/";
        $_dir = "images/issues/";
        $uniquePath = uniqid() . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $uniquePath;
        $target_file = str_replace(' ', "_", $target_file);
        $savepath = $_dir . $uniquePath;

        $savepath = str_replace(' ', "_", $savepath);
        $path =  $savepath;
        $extension = pathinfo($target_file, PATHINFO_EXTENSION);

        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $sqll = "INSERT INTO `issues`(`title`, `description`, `status`, `image`, `languages`,`problem`,`issue_type`, `created_by`,  `tags`, `created_at`) VALUES ('" . $title . "','" . $description . "','" . $status . "','" . $path . "','" . $languages . "','" . $problem . "','" . $issue_type . "','" . $created_by . "','" . $tags . "','" . $created_at . "')";
}
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
$query = mysqli_query($con, $sqll);
$insert_id = mysqli_insert_id($con);
if ($insert_id > 0) {
    mysqli_query($con, "INSERT INTO `issues_history`(`issue_id`, `status`, `user_id`, `date`) VALUES ('" . $insert_id . "','" . $status . "','" . $created_by . "','" . $created_at . "')");
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "New issue added successfylly"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Error Occured"));
    exit();
}