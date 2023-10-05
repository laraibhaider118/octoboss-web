<?php 
require_once('../tracker_help_files/control.php');
$delete_id = $_GET['delete_id'];
$image = $_GET['image_name'];

if(isset($delete_id) && $delete_id >0){   
    mysqli_query($con, "DELETE FROM `slider_images` WHERE `id` = $delete_id");
    unlink('../'.$image);
    $_SESSION['message'] = 'Image removed Successfully!';
}
header("Location:../slider_images.php");
?>