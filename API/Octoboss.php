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
// echo $count;
// die;
if ($count > 0) {

    $total_octoboss = 0;
    $total_customers = 0;
    $active_octoboss = 0;
    $inactive_octoboss = 0;
    $favourite_octoboss = 0;
    // Favourite octoboss
    $favoutie_octo_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,picture,country,postal_code,status from tbl_member where user_type = 0 AND is_fav=1 AND statue = 1");
    $total_octoboss = mysqli_fetch_all($favoutie_octo_q, MYSQLI_ASSOC);
    // Total octoboss
    $octoboss_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,picture,country,postal_code,status from tbl_member where user_type = 0");
    $total_octoboss = mysqli_fetch_all($octoboss_q, MYSQLI_ASSOC);
    // Active octoboss
    $active_octo_query = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,picture,country,postal_code,status from tbl_member where user_type = 0 AND status=1");
    $active_octoboss = mysqli_fetch_all($active_octo_query, MYSQLI_ASSOC);
    // Inactive octoboss
    $inactive_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,picture,country,postal_code,status from tbl_member where user_type = 0 AND status=0");
    $inactive_octoboss = mysqli_fetch_all($active_octo_query, MYSQLI_ASSOC);
    // Blocked Octoboss
    $blocked_octo_q = mysqli_query($con, "SELECT id,full_name,is_fav,email,phone_number,address,picture,country,postal_code,status from tbl_member where user_type = 0 AND block=1");
    $blocked_octoboss = mysqli_fetch_all($active_octo_query, MYSQLI_ASSOC);
    $return_array = array(
        'all_octoboss' => $total_octoboss,
        'active_octoboss' => $active_octoboss,
        'inactive_octoboss' => $inactive_octoboss,
        'blocked_octoboss' => $blocked_octoboss,
    );
    http_response_code(201);
    echo json_encode(array("response" => 1, 'data' => $return_array));
    exit();
} else {
    http_response_code(200);
    echo json_encode(array("response" => 0, "message" => "No Octoboss"));
    exit();
}