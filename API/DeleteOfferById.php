<?php
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$offer_id = isset($data_post['offer_id']) ? $data_post['offer_id'] : '';

$sqll = "DELETE FROM approved_offers where id = '" . $offer_id . "' ";

$query = mysqli_query($con, $sqll) or die(mysqli_error($con));
if ($offer_id > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" => 1, "code" => $code, 'message' => "Deleted Successfylly"));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code" => $code, 'message' => "Id Is Requried!"));
    exit();
}