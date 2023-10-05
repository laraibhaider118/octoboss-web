<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = $_POST;
$picture = $data_post['picture'] ?? '';
$first_name = $data_post['first_name'] ?? '';
$last_name = isset($data_post['last_name']) ? $data_post['last_name'] : '';
$date_of_birth = isset($data_post['date_of_birth']) ? $data_post['date_of_birth'] : '';
$full_address = isset($data_post['address']) ? $data_post['address'] : '';
$email = isset($data_post['email']) ? $data_post['email'] : '';
$street_no = isset($data_post['street_no']) ? $data_post['street_no'] : '';
$street_name = isset($data_post['street_name']) ? $data_post['street_name'] : '';
$street_address = isset($data_post['street_address']) ? $data_post['street_address'] : '';
$unit_number = isset($data_post['unit_number']) ? $data_post['unit_number'] : '';
$city = isset($data_post['city']) ? $data_post['city'] : '';
$phone_number = isset($data_post['phone_number']) ? $data_post['phone_number'] : '';
$job_info = isset($data_post['job_info']) ? $data_post['job_info'] : '';
$tag_of_services = isset($data_post['tag_of_services']) ? $data_post['tag_of_services'] : '';
$job_title = isset($data_post['job_title']) ? $data_post['job_title'] : '';
$detail_description = isset($data_post['detail_description']) ? $data_post['detail_description'] : '';
$country = isset($data_post['country']) ? $data_post['country'] : '';
$postal_code = isset($data_post['postal_code']) ? $data_post['postal_code'] : '';
$certificate = isset($data_post['certificate']) ? $data_post['certificate'] : '';
$work_picture = isset($data_post['work_picture']) ? $data_post['work_picture'] : '';
$language = isset($data_post['language']) ? $data_post['language'] : '';
$category = isset($data_post['category']) ? $data_post['category'] : '';
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
if (isset($_FILES["work_picture"]["name"]) and !empty($_FILES["work_picture"]["name"])) {
    mysqli_query($con, "DELETE from experience_images   Where octoboss_id = $user_id");
    foreach ($_FILES["work_picture"]["name"] as $wkey => $value) {
        $target_dir = "../images/profile/";
        $_dir = "images/profile/";
        $uniquePath = uniqid() . basename($_FILES["work_picture"]["name"][$wkey]);
        $target_file = $target_dir . $uniquePath;
        $target_file = str_replace(' ', "_", $target_file);
        $savepath = $_dir . $uniquePath;

        $savepath = str_replace(' ', "_", $savepath);
        $workpath =  APPURL . $savepath;
        $extension = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["work_picture"]["tmp_name"][$wkey], $target_file)) {
            mysqli_query($con, "INSERT INTO experience_images (octoboss_id,image) VALUES ('$user_id','$workpath') ");
            // mysqli_query($con, "UPDATE tbl_member set work_picture = '$workpath' Where id = $user_id");
        }
    }
}
if (isset($_FILES["certificate"]["name"]) and !empty($_FILES["certificate"]["name"])) {
    mysqli_query($con, "DELETE from certificate_images   Where octoboss_id = $user_id");
    foreach ($_FILES["certificate"]["name"] as $ckey => $value) {
        $target_dir = "../images/profile/";
        $_dir = "images/profile/";
        $uniquePath = uniqid() . basename($_FILES["certificate"]["name"][$ckey]);
        $target_file = $target_dir . $uniquePath;
        $target_file = str_replace(' ', "_", $target_file);
        $savepath = $_dir . $uniquePath;

        $savepath = str_replace(' ', "_", $savepath);
        $cerpath =  APPURL . $savepath;
        $extension = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["certificate"]["tmp_name"][$ckey], $target_file)) {
            mysqli_query($con, "INSERT INTO certificate_images (octoboss_id,image) VALUES ('$user_id','$cerpath') ");
            // mysqli_query($con, "UPDATE tbl_member set certificate = '$cerpath' Where id = $user_id");
        }
    }
}
$full_name = $first_name . ' ' . $last_name;
mysqli_query($con, "UPDATE tbl_member set first_name = '$first_name' ,  full_name = '$full_name',  last_name = '$last_name' , date_of_birth = '$date_of_birth' , full_address = '$full_address',  email = '$email',  street_no = '$street_no',  street_name = '$street_name',  street_address = '$street_address',  unit_number = '$unit_number',  city = '$city',  phone_number = '$phone_number',  job_info = '$job_info',  tag_of_services = '$tag_of_services',  job_title = '$job_title',  detail_description = '$detail_description',  country = '$country',  postal_code = '$postal_code', language = '$language',  category = '$category' WHERE id = $user_id ");
$user_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from tbl_member WHERE id = $user_id"));
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'message' => "Profile data updated successfully", 'data' => $user_data));
exit();
