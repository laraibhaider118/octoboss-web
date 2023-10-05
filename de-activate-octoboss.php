<?php
require_once('tracker_help_files/control.php');
$user_id  = $_GET['user_id'];
if($user_id){ 
    mysqli_query($con," UPDATE tbl_member set status=0  where id = $user_id");

// $sqll ='UPDATE membership_records set is_expired=1 , expiry_date="" where user_id = '.$user_id; 
// 
$sqll ='DELETE FROM membership_records  where user_id = '.$user_id; 
$query = mysqli_query($con, $sqll);
    $_SESSION['message'] = "Octoboss has been De-Activated successfully.";
}
header("Location:octoboss.php");