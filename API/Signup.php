<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$content = (array)json_decode(file_get_contents('php://input'), TRUE);


$first_name = isset($content['first_name']) ? $content['first_name'] :'';
$last_name = isset($content['last_name']) ? $content['last_name'] :'';
$full_name = $first_name.' '.$content['last_name'];
$email = isset($content['email']) ? $content['email'] :'';
$age = isset($content['age']) ? $content['age'] :''; 
$city = isset($content['city']) ? $content['city'] :''; 
$password = isset($content['password']) ? md5($content['password']) :'';
$pass_string = isset($content['password']) ? $content['password'] :'';
$phone = isset($content['phone_number']) ? $content['phone_number'] :'';
$address = isset($content['address']) ? $content['address'] :'';
$country = isset($content['country']) ? $content['country'] :'';
$setreet_address = isset($content['setreet_address']) ? $content['setreet_address'] :'';
$date_of_birth = isset($content['date_of_birth']) ? $content['date_of_birth'] :'';
$appartment_no = isset($content['appartment_no']) ? $content['appartment_no'] :'';
$postal_code = isset($content['postal_code']) ? $content['postal_code'] :'';
$type = isset($content['type']) ? $content['type'] :'';
$user_type = 0;
$error_message = null;
$error = null;
if(empty($first_name)){
    $error = 1;
    $error_message = 'First Name is required!';
}
if(empty($last_name)){
    $error = 1;
    $error_message = 'Last Name is required!';
}
if(empty($email)){
    $error = 1;
    $error_message = 'Email is required!';
}
if(empty($password)){
    $error = 1;
    $error_message = 'Password is required!';
}
if(empty($age)){
    $error = 1;
    $error_message = 'Age is required!';
}
if(empty($phone)){
    $error = 1;
    $error_message = 'Phone number is required!';
}
if(empty($address)){
    $error = 1;
    $error_message = 'Address is required!';
}
if(isset($error) && $error=1){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => $error_message));
    exit();
}
$email_exist =  checkUniqueEmail($email); 
if(isset($email_exist) && !empty($email_exist)){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Email Already Exists!"));
    exit();
}
if(isset($type) && $type=='customer'){
    $user_type = 1;
}
$random_number = rand(99999,999999);
include_once("../includes/functions.php");
$data['email'] =$email; 

$message['subject'] = 'Account Registration';
$message['body'] = "<b>Hello " . $full_name . " </b>";
$message['body'] .= '<p>Thank you for registering with Octoboss</p>';
$message['body'] .= '<p>Your security verification number is:</p>';
$message['body'] .= '<p>'.$random_number.'</p>';
$send = sendEmail($data, $message);
// echo $send;
$path = BASE_URL . 'admin/customer_detail.php?customer_id=1';
$message['body'] = '<p>New User Account has been created</p>';
$message['body'] .= '<p>Click below link to view customer.</p>';
$message['body'] .= "<a href='$path'>$path</a>";
sendEmailToAdmin($data, $message);
if($send==1){
    $insert_query = "INSERT INTO `tbl_member`(`user_type`,`first_name`,`last_name`,`city`,`appartment_no`,`setreet_address`,`date_of_birth`,`age`, `full_name`, `email`, `password`, `phone_number`, `address`,  `country`, `postal_code`,`pass_string`,`verification_code`) VALUES ('" . $user_type . "','" . $first_name . "','" . $last_name . "','" . $city . "','" . $appartment_no . "','" . $setreet_address . "','" . $date_of_birth . "','" . $age . "','" . $full_name . "','" . $email . "','" . $password . "','" . $phone . "','" . $address . "','" . $country . "','" . $postal_code . "','" . $pass_string . "','" . $random_number . "')";
    
    $isert_record = mysqli_query($con, $insert_query);
    $last_id = mysqli_insert_id($con);
    if ($last_id > 0) {
        $code = http_response_code(201);
        
        echo json_encode(array("response" =>1, "user_id"=>$last_id,  "code"=> $code, 'id' => $last_id, "message"=>"Email Sent! Please verify your email!!!"));
        exit();
    } else {
        $code = http_response_code(200);
        echo json_encode(array("response" => 0, "code"=>$code, "message" => "Wrong email or password!"));
        exit();
    }
}else{
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Invalid Email!"));
    exit();
}
