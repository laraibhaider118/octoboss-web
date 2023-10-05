<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));

$receiver_id = isset($data_post['receiver_id']) ? $data_post['receiver_id'] : '';

$sqll = "SELECT * from chat where receiver_id = '" . $receiver_id . "' OR sender_id='" . $receiver_id . "' order by date asc ";
$last_msg_q = "SELECT * from chat where (receiver_id = '" . $receiver_id . "' OR sender_id='" . $receiver_id . "' ) AND message_type='message' ORDER BY id desc LIMIT 1 ";

$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$last_msg_query = mysqli_query($con, $last_msg_q) or die(mysqli_error($con));
$pic_res = mysqli_fetch_all($query, MYSQLI_ASSOC);
$last_res = mysqli_fetch_assoc($last_msg_query);
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
echo json_encode(array("response" => 1, "code" => $code, 'data' => $pic_res, "last_message"=>$last_res));
exit();
