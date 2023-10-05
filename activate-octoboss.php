<?php
require_once('tracker_help_files/control.php');
$user_id  = $_GET['user_id'];
if($user_id){ 
$plan_id = 5;
$plan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * From membership_table where id = $plan_id"));
mysqli_query($con," UPDATE tbl_member set status=1  where id = $user_id");
$membership_name = isset($plan['membership_name']) ? $plan['membership_name'] :'';
$price = isset($plan['price']) ? $plan['price'] :'';
$description = isset($plan['description']) ? $plan['description'] :'';
$duration = isset($plan['duration']) ? $plan['duration'] :'';
$created_date = date('Y-m-d');
$curentdate = date('Y-m-d H:i:s');
$plan_start_date = date('Y-m-d');
$plan_expiry_date = date('Y-m-d',strtotime("+".$duration." month"));
$transaction = isset($data_post['transaction']) ? $data_post['transaction'] :''; 
$sqll ='INSERT INTO `membership_records`(`user_id`, `plan_id`, `transaction`, `membership_name`, `price`, `description`, `duration`, `created_date`, `curentdate`, `plan_start_date`, `plan_expiry_date`) VALUES ("'.$user_id.'","'.$plan_id.'","'.$transaction.'","'.$membership_name.'","'.$price.'","'.$description.'","'.$duration.'","'.$created_date.'","'.$curentdate.'","'.$plan_start_date.'","'.$plan_expiry_date.'")'; 
$query = mysqli_query($con, $sqll);
$_SESSION['message'] = "Octoboss has been Activated successfully.";
}
header("Location:octoboss.php");