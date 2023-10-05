<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input"));
$filter = isset($data_post['filter']) ? $data_post['filter'] :'';
$filter_qry = '';
if(isset($filter) && !empty($filter)){
    $filter_qry = " WHERE name='$filter' ";
}
$query1 = mysqli_query($con, "SELECT * from config Where name = 'about_octoboss'");
$query2 = mysqli_query($con, "SELECT * from config Where name = 'about_user'");
$query3 = mysqli_query($con, "SELECT * from config Where name = 'octo_ter_con'");
$query4 = mysqli_query($con, "SELECT * from config Where name = 'user_ter_con'");
$query5 = mysqli_query($con, "SELECT * from config Where name = 'octo_notification'");
$query6 = mysqli_query($con, "SELECT * from config Where name = 'user_notification'");

$query11 = mysqli_query($con, "SELECT * from config Where name = 'about_octoboss_show'");
$query12 = mysqli_query($con, "SELECT * from config Where name = 'about_user_show'");
$query13 = mysqli_query($con, "SELECT * from config Where name = 'octo_ter_con_show'");
$query14 = mysqli_query($con, "SELECT * from config Where name = 'user_ter_con_show'");
$query15 = mysqli_query($con, "SELECT * from config Where name = 'octo_notification_show'");
$query16 = mysqli_query($con, "SELECT * from config Where name = 'user_notification_show'");


$res1 = mysqli_fetch_assoc($query1); 
$res2 = mysqli_fetch_assoc($query2);
$res3 = mysqli_fetch_assoc($query3);
$res4 = mysqli_fetch_assoc($query4);
$res5 = mysqli_fetch_assoc($query5);
$res6 = mysqli_fetch_assoc($query6);


$res11 = mysqli_fetch_assoc($query11); 
$res12 = mysqli_fetch_assoc($query12);
$res13 = mysqli_fetch_assoc($query13);
$res14 = mysqli_fetch_assoc($query14);
$res15 = mysqli_fetch_assoc($query15);
$res16 = mysqli_fetch_assoc($query16);


$about_octoboss=isset($res1['value']) ? $res1['value'] :'';   
$about_user=isset($res2['value']) ? $res2['value'] :'';   
$octo_ter_con=isset($res3['value']) ? $res3['value'] :'';   
$user_ter_con=isset($res4['value']) ? $res4['value'] :'';   
$octo_notification=isset($res5['value']) ? $res5['value'] :'';   
$user_notification=isset($res6['value']) ? $res6['value'] :'';  

$about_octoboss_show=isset($res11['value']) ? $res11['value'] :'';   
$about_user_show=isset($res12['value']) ? $res12['value'] :'';   
$octo_ter_con_show=isset($res13['value']) ? $res13['value'] :'';   
$user_ter_con_show=isset($res14['value']) ? $res14['value'] :'';   
$octo_notification_show=isset($res15['value']) ? $res15['value'] :'';   
$user_notification_show=isset($res16['value']) ? $res16['value'] :'';  

// $all_data = array(
//     'about_octoboss'=>$about_octoboss,
//     'about_octoboss_show'=>1,
//     'about_user'=>$about_user,
//     'about_user_show'=>1,
//     'octo_notification'=>$octo_notification,
//     'octo_notification_show'=>1,
//     'octo_ter_con'=>$octo_ter_con,
//     'octo_ter_con_show'=>1,
//     'user_ter_con'=>$user_ter_con,
//     'user_ter_con_show'=>1,
//     'user_notification'=>$user_notification,
//     'user_notification_show'=>1,
// );
$all_data = array(
    'about_octoboss'=>$about_octoboss,
    'about_octoboss_show'=>$about_octoboss_show,
    'about_user'=>$about_user,
    'about_user_show'=>$about_user_show,
    'octo_notification'=>$octo_notification,
    'octo_notification_show'=>$octo_notification_show,
    'octo_ter_con'=>$octo_ter_con,
    'octo_ter_con_show'=>$octo_ter_con_show,
    'user_ter_con'=>$user_ter_con,
    'user_ter_con_show'=>$user_ter_con_show,
    'user_notification'=>$user_notification,
    'user_notification_show'=>$user_notification_show,
);
$code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'data' => $all_data));
    exit();

?>