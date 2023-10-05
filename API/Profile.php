<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] :'';
$fetch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * from tbl_member where id=$user_id"));
$user_data = array();
$user_type = $fetch['user_type'];
if($user_type==1){
    $user_data['picture'] = isset($fetch['picture']) ? $fetch['picture'] : '';
    $user_data['rating'] = isset($fetch['rating']) ? $fetch['rating'] : '';
    $user_data['name'] = isset($fetch['name']) ? $fetch['name'] : '';
    $user_data['email'] = isset($fetch['email']) ? $fetch['email'] : '';
    $user_data['phone_number'] = isset($fetch['phone']) ? $fetch['phone'] : '';
    $user_data['street_address'] = isset($fetch['street_address']) ? $fetch['street_address'] : '';
    $user_data['country'] = isset($fetch['country']) ? $fetch['country'] : '';
    $user_data['postal_code'] = isset($fetch['postal_code']) ? $fetch['postal_code'] : '';
}else{
    $user_data['picture'] = isset($fetch['picture']) ? $fetch['picture'] : '';
    $user_data['first_name'] = isset($fetch['first_name']) ? $fetch['first_name'] : '';
    $user_data['last_name'] = isset($fetch['last_name']) ? $fetch['last_name'] : '';
    $user_data['date_of_birth'] = isset($fetch['date_of_birth']) ? $fetch['date_of_birth'] : '';
    $user_data['full_address'] = isset($fetch['address']) ? $fetch['address'] : '';
    $user_data['email'] = isset($fetch['email']) ? $fetch['email'] : '';
    $user_data['street_no'] = isset($fetch['street_no']) ? $fetch['street_no'] : '';
    $user_data['street_name'] = isset($fetch['street_name']) ? $fetch['street_name'] : '';
    $user_data['street_address'] = isset($fetch['street_address']) ? $fetch['street_address'] : '';
    $user_data['unit_number'] = isset($fetch['unit_number']) ? $fetch['unit_number'] : '';
    $user_data['city'] = isset($fetch['city']) ? $fetch['city'] : '';
    $user_data['phone_number'] = isset($fetch['phone_number']) ? $fetch['phone_number'] : '';
    $user_data['job_info'] = isset($fetch['job_info']) ? $fetch['job_info'] : '';
    $user_data['tag_of_services'] = isset($fetch['tag_of_services']) ? $fetch['tag_of_services'] : '';
    $user_data['job_title'] = isset($fetch['job_title']) ? $fetch['job_title'] : '';
    $user_data['detail_description'] = isset($fetch['detail_description']) ? $fetch['detail_description'] : '';
    $user_data['country'] = isset($fetch['country']) ? $fetch['country'] : '';
    $user_data['postal_code'] = isset($fetch['postal_code']) ? $fetch['postal_code'] : '';
    $user_data['certificate'] = isset($fetch['certificate']) ? $fetch['certificate'] : '';
    $user_data['work_picture'] = isset($fetch['work_picture']) ? $fetch['work_picture'] : '';
    $user_data['language'] = isset($fetch['language']) ? $fetch['language'] : '';
    $user_data['category'] = isset($fetch['category']) ? $fetch['category'] : '';
}
if($user_id > 0){
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $user_data));
    exit();
}else{
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "Error Occured"));
    exit();
}


?>