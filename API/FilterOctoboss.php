<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$job_array = array('Home Repair', 'Cleaner', 'Electicion', 'Plumber', 'Carpanter');
$yes_no_array = array('No', 'Yes');
$today_date = date('Y-m-d');
function ServiceName($service_id)
{
    global $con;
    $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT product_name from services_tbl Where id = $service_id"));
    return isset($fetch['product_name']) ? $fetch['product_name'] : '';
}
function has_boost($user_id){
     global $con;
     $today_date = date('Y-m-d');
    $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT id from boosts_records Where is_expired=0 AND user_id =$user_id AND plan_expiry_date >= '$today_date'"));
    return isset($fetch['id']) ? $fetch['id'] : 0;
}
function has_membership($user_id){
    global $con;
    $today_date = date('Y-m-d');
     $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT id from membership_records Where is_expired=0 AND user_id =$user_id AND plan_expiry_date >= '$today_date'"));
    return isset($fetch['id']) ? $fetch['id'] : 0;
}
$query = mysqli_query($con, "SELECT * from tbl_member where user_type = 0 ");
$count = mysqli_num_rows($query);
if ($count > 0) {
    $return_array = array();
    while ($fetch = mysqli_fetch_assoc($query)) {
        $image_path = 'images/avatar/' . rand(1, 4) . '.jpg';
        $row['id'] = $fetch['id'];
        $receiver_id = $fetch['id'];
        $chat_count_q = "SELECT COUNT(id) as total_count from chat where receiver_id = $receiver_id GROUP BY  sender_id";
        $query_rows  = mysqli_query($con, $chat_count_q);
        $count_rows = mysqli_num_rows($query_rows);
        $row['image'] = $fetch['picture'];
        $row['name'] = $fetch['full_name'];
        $row['service'] = $fetch['category'];
        // $row['service'] = ServiceName($fetch['service_id']);
        $row['experience'] = rand(1, 10) . ' Years of expreience over all';
        $row['likes'] = rand(33, 99) . ' %';
        $row['chats'] = $count_rows;
        $row['last_seen'] = isset($fetch['last_login']) ? $fetch['last_login'] : "";
        $row['is_active'] = $fetch['is_online'] == 1 ? "Yes" : "No";
        $row['is_online'] = $fetch['is_online'] == 1 ? "Yes" : "No";
        $row['has_boost'] = has_boost($fetch['id']) ? "Yes" : "No";
        $row['has_membership'] = has_membership($fetch['id']) ? "Yes" : "No";
        array_push($return_array, $row);
    }
    http_response_code(201);
    echo json_encode(array("response" => 1, 'data' => $return_array));
    exit();
} else {
    http_response_code(200);
    echo json_encode(array("response" => 0, "message" => "No Octoboss"));
    exit();
}