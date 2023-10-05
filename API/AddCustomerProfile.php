<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = $_POST;
// $data_post = (array)json_decode(file_get_contents("php://input")); 
$picture = isset($data_post['picture']) ? $data_post['picture'] : '';
$rating = isset($data_post['rating']) ? $data_post['rating'] : '';
$name = isset($data_post['name']) ? $data_post['name'] : '';
$email = isset($data_post['email']) ? $data_post['email'] : '';
$phone_number = isset($data_post['phone_number']) ? $data_post['phone_number'] : '';
$street_address = isset($data_post['street_address']) ? $data_post['street_address'] : '';
$country = isset($data_post['country']) ? $data_post['country'] : '';
$postal_code = isset($data_post['postal_code']) ? $data_post['postal_code'] : '';
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';
if (!isset($user_id) || empty($user_id)) {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "User Id is Required!!"));
    exit();
}
if (isset($_FILES["picture"]["name"]) and !empty($_FILES["picture"]["name"])) {

    $target_dir = "../images/profile/";
    $_dir = "images/profile/";
    $uniquePath = uniqid() . basename($_FILES["picture"]["name"]);
    $target_file = $target_dir . $uniquePath;
    $target_file = str_replace(' ', "_", $target_file);
    $savepath = $_dir . $uniquePath;

    $savepath = str_replace(' ', "_", $savepath);
    $path =  APPURL . $savepath;
    $extension = pathinfo($target_file, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        mysqli_query($con, "UPDATE tbl_member set picture = '$path' Where id = $user_id");
    }
}
mysqli_query($con, "UPDATE tbl_member set rating = '$rating' ,  full_name = '$name',  email = '$email' , phone_number = '$phone_number' , street_address = '$street_address',  country = '$country',  postal_code = '$postal_code' WHERE id = $user_id ");
$user_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from tbl_member WHERE id = $user_id"));
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "Profile data updated successfully", 'data' => $user_data));
exit();