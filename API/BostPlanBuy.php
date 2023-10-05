<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = mysqli_real_escape_string($con, $data_post['user_id']); 
$boost_id = mysqli_real_escape_string($con, $data_post['boost_id']); 
if(empty($boost_id) || $boost_id==""){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Boost Id is required"));
    exit();
}
$plan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * From boost_table where id = $boost_id"));
if(empty($plan) || count($plan)==0){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Boost Id is invalid"));
    exit();
}
$boost_name = isset($plan['boost_name']) ? $plan['boost_name'] :'';
$price = isset($plan['price']) ? $plan['price'] :'';
$description = isset($plan['description']) ? $plan['description'] :'';
$duration = isset($plan['duration']) ? $plan['duration'] :'';
$created_date = date('Y-m-d');
$curentdate = date('Y-m-d H:i:s');
$plan_start_date = date('Y-m-d');
$plan_expiry_date = date('Y-m-d',strtotime("+".$duration." month"));
$transaction = isset($data_post['transaction']) ? $data_post['transaction'] :''; 
$sqll ='INSERT INTO `boosts_records`(`user_id`, `boost_id`, `transaction`, `boost_name`, `price`, `description`, `duration`, `created_date`, `curentdate`, `plan_start_date`, `plan_expiry_date`) VALUES ("'.$user_id.'","'.$boost_id.'","'.$transaction.'","'.$boost_name.'","'.$price.'","'.$description.'","'.$duration.'","'.$created_date.'","'.$curentdate.'","'.$plan_start_date.'","'.$plan_expiry_date.'")'; 
$query = mysqli_query($con, $sqll);
$id = mysqli_insert_id($con);

if ($id > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Boost Added Successfully"));
    exit();    
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "Error!". mysqli_error($con)));
    exit();
}

?>