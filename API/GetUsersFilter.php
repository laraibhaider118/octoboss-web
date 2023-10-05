<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$type = mysqli_real_escape_string($con, $data_post['type']);
$user_id = mysqli_real_escape_string($con, $data_post['user_id']);


if ($type == 'octoboss') {
    $user_type='0';
    $query = "SELECT distinct(receiver_id), sender_id FROM chat where receiver_id = $user_id OR sender_id = $user_id ";
}
if ($type == 'customer') {
    $user_type='1';
    $query = "SELECT distinct(receiver_id), sender_id FROM chat where receiver_id = $user_id OR sender_id = $user_id ";
}
$tbl_memeber = mysqli_fetch_assoc(mysqli_query($con,"SELECT * from tbl_member where id = $user_id and user_type=$user_type"));
if(!isset($tbl_memeber['id']) && empty($tbl_memeber['id']) && $tbl_memeber['id']  ==0){
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => "User not exists!!"));
    exit();
}
$sql_query = mysqli_query($con, $query);
$return_users = array();
$all_ids_array = array();
$usersArray= array();
while ($fetch = mysqli_fetch_assoc($sql_query)) {
    $id_receiver = $fetch['receiver_id'];
    $id_sender = $fetch['sender_id'];
    if(!in_array($id_sender,$all_ids_array) || !in_array($id_receiver,$all_ids_array) ){
       if(!in_array($id_sender,$usersArray) && $id_sender != $user_id){
        $usersArray[] = $id_sender;
        $ssqqll  = "SELECT * from tbl_member where id = $id_sender";
       }
       if(!in_array($id_receiver,$usersArray) && $id_receiver != $user_id){
        $usersArray[] = $id_receiver;        
        $ssqqll  = "SELECT * from tbl_member where id = $id_receiver";
       }
       $all_ids_array[]=$id_receiver;
       $all_ids_array[]=$id_sender;
       $query = mysqli_query($con, $ssqqll);
       $row = mysqli_fetch_assoc($query);
       $push = array();
       $push['sender_id'] = $id_sender;
       $push['receiver_id'] = $id_receiver;
       $push['first_name'] = isset($row['first_name']) ? $row['first_name'] : '';
       $push['last_name'] = isset($row['last_name']) ? $row['last_name'] : '';
       $push['full_name'] = isset($row['full_name']) ? $row['full_name'] : '';
       $push['email'] = isset($row['email']) ? $row['email'] : '';
       $push['picture'] = isset($row['picture']) ? $row['picture'] : '';    
       array_push($return_users, $push);
    }
   


    // sender Data::
    // $senderSql  = "SELECT * from tbl_member where id = $id_sender";
    // $query_s = mysqli_query($con, $senderSql);
    // $Sender_row = mysqli_fetch_assoc($query_s);
    // $sender_push = array();
    // $sender_push['sender_id'] = isset($Sender_row['id']) ? $Sender_row['id'] : '';
    // $sender_push['first_name'] = isset($Sender_row['first_name']) ? $Sender_row['first_name'] : '';
    // $sender_push['last_name'] = isset($Sender_row['last_name']) ? $Sender_row['last_name'] : '';
    // $sender_push['full_name'] = isset($Sender_row['full_name']) ? $Sender_row['full_name'] : '';
    // $sender_push['picture'] = isset($Sender_row['picture']) ? $Sender_row['picture'] : '';

    // array_push($return_users, $sender_push);
}
if (count($return_users) > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'data' => $return_users));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, "message" => "No data Found"));
    exit();
}