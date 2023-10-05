<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$user_id = isset($data_post['user_id']) ? $data_post['user_id'] :'';

$sqll ="SELECT * from octoboss_fav where user_id = '".$user_id."' ";
 
$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$pic_res = mysqli_fetch_all($query, MYSQLI_ASSOC);
if(count($pic_res)>0){
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $pic_res));
    exit();
}else{
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "No record found!"));
    exit();  
}
