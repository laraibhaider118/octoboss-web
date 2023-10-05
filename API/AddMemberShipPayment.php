<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = mysqli_real_escape_string($con, $data_post['user_id']); 
$plan_id = mysqli_real_escape_string($con, $data_post['plan_id']); 
if(empty($plan_id) || $plan_id==""){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Plan Id is required"));
    exit();
}
$plan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * From membership_table where id = $plan_id"));
if(empty($plan) || count($plan)==0){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Plan Id is invalid"));
    exit();
}
$membership_name = isset($plan['membership_name']) ? $plan['membership_name'] :'';
$price = isset($plan['price']) ? $plan['price'] :'';
$description = isset($plan['description']) ? $plan['description'] :'';
$duration = isset($plan['duration']) ? $plan['duration'] :'';
$created_date = date('Y-m-d');
$curentdate = date('Y-m-d H:i:s');
$plan_start_date = date('Y-m-d');
$plan_expiry_date = date('Y-m-d',strtotime("+".$duration." month"));
$transaction = isset($data_post['transaction']) ? $data_post['transaction'] :''; 
$sqll ='INSERT INTO `membership_records`(`user_id`, `plan_id`, `transaction`, `membership_name`, `price`, `description`, `duration`, `created_date`, `curentdate`, `plan_start_date`, `plan_expiry_date`) VALUES ("'.$user_id.'","'.$plan_id.'","'.$transaction.'","'.$membership_name.'","'.$price.'","'.$description.'","'.$duration.'","'.$created_date.'","'.$curentdate.'","'.$plan_start_date.'","'.$plan_expiry_date.'")'; 
$query = mysqli_query($con, $sqll);
if(mysqli_error($con)){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Error!". mysqli_error($con)));
    exit();  
}
$id = mysqli_insert_id($con);

if ($id > 0) {
    mysqli_query($con," UPDATE tbl_member set status=1  where id = $user_id");
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Payment Added Successfully"));
    exit();    
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Error!". mysqli_error($con)));
    exit();
}

?>