<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$issue_id = isset($data_post['issue_id']) ? $data_post['issue_id'] :'';
$issue_type = isset($data_post['issue_type']) ? $data_post['issue_type'] :'Public';
if(empty($issue_id)){
    $code = http_response_code(201);
echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Issue id is required"));
exit();
}
mysqli_query($con,"UPDATE issues set issue_type = '$issue_type' WHERE id = $issue_id");
$code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Issue status updated successfylly"));
    exit();


?>