<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));

$user_id = isset($data_post['user_id']) ? $data_post['user_id'] : '';

$sqll = "SELECT * from approved_offers where receiver_id = $user_id ";

$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$pic_res = mysqli_fetch_all($query, MYSQLI_ASSOC);
// $pic_array = array();
// while ($result = mysqli_fetch_assoc($query)) {

//     $row = array();
//     $row['file'] = $result['image'];
//     $row['id'] = $result['id'];
//     $row['sender_id'] = $result['sender_id'];
//     $row['title'] = $result['title'];
//     $row['receiver_id'] = $result['receiver_id'];
//     $row['images'] = $result['images'];
//     $row['date'] = $result['date'];
//     $row['message'] = $result['message'];
//     array_push($row, $pic_array);
// }
$code = http_response_code(201);
echo json_encode(array("response" => 1, "code" => $code, 'data' => $pic_res));
exit();