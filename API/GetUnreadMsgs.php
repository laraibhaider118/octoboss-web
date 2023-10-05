<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$receiver_id = isset($data_post['receiver_id']) ? $data_post['receiver_id'] :'';
$sender_id = isset($data_post['sender_id']) ? $data_post['sender_id'] :'';
$sqll ="SELECT COUNT(id) as read_count FROM chat where status='unread' AND receiver_id = '".$receiver_id."' AND sender_id = '".$sender_id."' GROUP BY receiver_id";
 
$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$pic_res = mysqli_fetch_assoc($query);
if(count($pic_res)>0){
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $pic_res, "count"=>$pic_res['read_count']));
    exit();
}else{
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "No record found!","count"=>0));
    exit();  
}
?>