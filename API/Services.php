<?php 

include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$query = mysqli_query($con, "SELECT id,status,product_image,product_name from services_tbl WHERE status=1 ");
$all_data  = array();
while ($row = mysqli_fetch_assoc($query)) {
    
    if(empty($row['product_image'])){
        $row['product_image'] = APPURL.'images/octoboss.png';
    }else{
        $row['product_image'] = APPURL.$row['product_image'];
    }
    array_push($all_data,$row);
} 
$count = mysqli_num_rows($query);
if ($count > 0) {
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $all_data));
    exit();
} else {
    $code = http_response_code(200);
    echo json_encode(array("response" => 0, "code"=>$code, "message" => "No record found!"));
    exit();
}

?>