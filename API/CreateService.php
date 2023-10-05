<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$name = isset($data_post['service_name']) ? $data_post['service_name'] :'';
$query = mysqli_fetch_assoc(mysqli_query($con,"SELECT * from services_tbl WHERE product_name= '$name'"));
 
if(isset($query['product_name']) && !empty($query['product_name'])){
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "Service name already exists"));
    exit();
}
$date= date('Y-m-d H:i:s');
if(empty($name) || $name==''){
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "Please enter service name"));
    exit();
}
$query =mysqli_query($con,"INSERT INTO services_tbl(status,product_image,product_name,created_at,parent_id,color_id,brand_id,product_code,product_price,shipping_price,discount_price,final_price,delevery_time,delivery_time,product_desc,product_qty, related_product_id,total_view,is_feature,is_new,is_hot,is_deal,isdeal_time,disp_order,feature_time,isnew_time,ishot_time,cod) VALUES(0,'default.png','$name','$date','0','0','0','0','0','0','0','0','0','0','','0','0','0','0','0','0','0','0','0','0','0','0','0')"); 
$insert_id = mysqli_insert_id($con);
if($insert_id > 0){
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "New service added successfylly"));
    exit();
}else{
    $code = http_response_code(200);
    echo json_encode(array("response" =>0, "code"=> $code, 'message' => "Error Occured :) Error Descripton:: ".mysqli_error($con)));
    exit();
}


?>