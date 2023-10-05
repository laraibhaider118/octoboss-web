<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$query = mysqli_query($con, "SELECT * from tbl_member where user_type = 0 ");
$count = mysqli_num_rows($query);
// $count = mysqli_affected_rows($con);
if ($count > 0) {

    $total_octoboss = 0;
    $total_customers = 0;
    $active_octoboss = 0;
    $inactive_octoboss = 0;
    // Total Customers
    $customer_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,country,postal_code from tbl_member where user_type = 1");
    $total_customers = mysqli_fetch_all($customer_q, MYSQLI_ASSOC);
    // Blocked Users
    $blocked_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,country,postal_code from tbl_member where user_type = 1 AND block=1");
    $blocked_users = mysqli_fetch_all($blocked_q, MYSQLI_ASSOC);
    // Active Users
    $active_user_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,country,postal_code from tbl_member where user_type = 1 AND status=1");
    $active_users = mysqli_fetch_all($active_user_q, MYSQLI_ASSOC);
    // InActive Users
    $inactive_user_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,country,postal_code from tbl_member where user_type = 1 AND status=0");
    $inactive_users = mysqli_fetch_all($inactive_user_q, MYSQLI_ASSOC);

    $return_array=array(
        'all_customers'=>$total_customers,
        'active_customers'=>$active_users,
        'inactive_customers'=>$inactive_users,
        'blocked_customers'=>$blocked_users,
    );
    http_response_code(201);
    echo json_encode(array("response" => 1, 'data' => $return_array));
    exit();
} else {
    http_response_code(200);
    echo json_encode(array("response" => 0, "message" => "No Customer found!"));
    exit();
}
