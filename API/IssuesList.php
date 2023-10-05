<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$add = isset($data_post['add']) ? $data_post['add'] : '';

$sqll = "SELECT * from issues ";

$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
$issues_array = array();
while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['id'];
    $sqllh = "SELECT * from issues_history where issue_id = $id ";

    $queryhistory = mysqli_query($con, $sqllh) or die(mysqli_error($con));
    $history = mysqli_fetch_all($queryhistory, MYSQLI_ASSOC);
    $row['history'] = $history;
    $row['image'] =  APPURL . $row['image'];
    array_push($issues_array, $row);
}
// $pic_res = mysqli_fetch_all($query, MYSQLI_ASSOC);
if (count($issues_array) > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'data' => $issues_array));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "No record found!"));
    exit();
}