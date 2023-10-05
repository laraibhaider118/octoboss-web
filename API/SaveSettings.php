<?php 
include_once "../include/conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data_post = (array)json_decode(file_get_contents("php://input")); 
// echo "<pre>";
// print_r($data_post);
// die;
    $octo_ter_con = isset($data_post['octo_ter_con']) ? $data_post['octo_ter_con'] :'';
    if(!empty($octo_ter_con)){
        mysqli_query($con,"UPDATE config set value = '$octo_ter_con' WHERE name='octo_ter_con'");
        
    }
    $user_ter_con = isset($data_post['user_ter_con']) ? $data_post['user_ter_con'] :'';
    if(!empty($user_ter_con)){
        mysqli_query($con,"UPDATE config set value = '$user_ter_con' WHERE name='user_ter_con'");
        
    }
    $about_user = isset($data_post['about_user']) ? $data_post['about_user'] :'';
    if(!empty($about_user)){
        mysqli_query($con,"UPDATE config set value = '$about_user' WHERE name='about_user'");
        
    }
    $about_octoboss = isset($data_post['about_octoboss']) ? $data_post['about_octoboss'] :'';
    if(!empty($about_octoboss)){
        mysqli_query($con,"UPDATE config set value = '$about_octoboss' WHERE name='about_octoboss'");
        
    }
    $octo_notification = isset($data_post['octo_notification']) ? $data_post['octo_notification'] :'';
    if(!empty($octo_notification)){
        mysqli_query($con,"UPDATE config set value = '$octo_notification' WHERE name='octo_notification'");
        
    }
    $user_notification = isset($data_post['user_notification']) ? $data_post['user_notification'] :'';
    if(!empty($user_notification)){
        mysqli_query($con,"UPDATE config set value = '$user_notification' WHERE name='user_notification'");
        
    }



    $octo_ter_con_show = isset($data_post['octo_ter_con_show']) && $data_post['octo_ter_con_show']==1 ? $data_post['octo_ter_con_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$octo_ter_con_show' WHERE name='octo_ter_con_show'");

    
    $user_ter_con_show = isset($data_post['user_ter_con_show']) && $data_post['user_ter_con_show']==1 ? $data_post['user_ter_con_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$user_ter_con_show' WHERE name='user_ter_con_show'");


    $about_user_show = isset($data_post['about_user_show']) && $data_post['about_user_show']==1  ? $data_post['about_user_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$about_user_show' WHERE name='about_user_show'");


    $about_octoboss_show = isset($data_post['about_octoboss_show']) && $data_post['about_octoboss_show']==1  ? $data_post['about_octoboss_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$about_octoboss_show' WHERE name='about_octoboss_show'");


    $octo_notification_show = isset($data_post['octo_notification_show'])  && $data_post['octo_notification_show']==1 ? $data_post['octo_notification_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$octo_notification_show' WHERE name='octo_notification_show'");
        

    $user_notification_show = isset($data_post['user_notification_show']) && $data_post['user_notification_show']==1 ? $data_post['user_notification_show'] :'0';
    mysqli_query($con,"UPDATE config set value = '$user_notification_show' WHERE name='user_notification_show'");
    
    $code = http_response_code(201);
    echo json_encode(array("response" =>1, "code"=> $code, 'message' => "Saved Successfully!"));
    exit();

?>