<?php
require_once('tracker_help_files/control.php');


$id = $_REQUEST['id'];
$cancel_url = "settings.php";
@extract($_POST);
if ($action == "add") {
    $octo_ter_con = isset($_POST['octo_ter_con']) ? $_POST['octo_ter_con'] :'';
    if(!empty($octo_ter_con)){
        mysqli_query($con,"UPDATE config set value = '$octo_ter_con' WHERE name='octo_ter_con'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='octo_ter_con_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='octo_ter_con'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='octo_ter_con_show'");
    }
    $user_ter_con = isset($_POST['user_ter_con']) ? $_POST['user_ter_con'] :'';
    if(!empty($user_ter_con)){
        mysqli_query($con,"UPDATE config set value = '$user_ter_con' WHERE name='user_ter_con'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='user_ter_con_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='user_ter_con'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='user_ter_con_show'");
    }
    $about_user = isset($_POST['about_user']) ? $_POST['about_user'] :'';
    if(!empty($about_user)){
        mysqli_query($con,"UPDATE config set value = '$about_user' WHERE name='about_user'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='about_user_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='about_user'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='about_user_show'");
    }
    $about_octoboss = isset($_POST['about_octoboss']) ? $_POST['about_octoboss'] :'';
    if(!empty($about_octoboss)){
        mysqli_query($con,"UPDATE config set value = '$about_octoboss' WHERE name='about_octoboss'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='about_octoboss_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='about_octoboss'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='about_octoboss_show'");
    }
    $octo_notification = isset($_POST['octo_notification']) ? $_POST['octo_notification'] :'';
    if(!empty($octo_notification)){
        mysqli_query($con,"UPDATE config set value = '$octo_notification' WHERE name='octo_notification'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='octo_notification_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='octo_notification'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='octo_notification_show'");
    }
    $user_notification = isset($_POST['user_notification']) ? $_POST['user_notification'] :'';
    if(!empty($user_notification)){
        mysqli_query($con,"UPDATE config set value = '$user_notification' WHERE name='user_notification'");
        mysqli_query($con,"UPDATE config set value = '1' WHERE name='user_notification_show'");
    }else{
        mysqli_query($con,"UPDATE config set value = '' WHERE name='user_notification'");
        mysqli_query($con,"UPDATE config set value = '0' WHERE name='user_notification_show'");
    }
    if(mysqli_error($con)){
        $_SESSION['message'] =mysqli_error($con) ;
    }else{
        $_SESSION['message'] = 'Updated successfully!';
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Octoboss - Octoboss</title>
    <?php include "include/css.php"; ?>
</head>

<body>
    <div id="main-wrapper">
        <?php include "include/topheader.php"; ?>

        <?php include "include/sidebar.php"; ?>

        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Order -->
                <?php 
                
                    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                        echo '<div class="alert alert-secondary" role="alert">'.$_SESSION['message'].'</div>';
                        unset($_SESSION['message']);
                    }
                ?>
                
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="settings.php">Settings</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"> <?php
                                                                                            if ($id != '' && is_numeric($id)) {

                                                                                            ?>Edit <?php } else { ?> Add <?php } ?></a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post">                                        
                                        <!-- Removed class :   ckeditor -->
                                        <div class="form-group">
                                            <label class="text-black font-w500">About Us (Octoboss)</label><textarea class="form-control" name="about_octoboss"><?php echo get_config('about_octoboss'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black font-w500">About Us (Customers)</label><textarea class="form-control" name="about_user"><?php echo get_config('about_user'); ?></textarea>
                                        </div> 
                                        <div class="form-group">
                                            <label class="text-black font-w500">Terms And Conditions (Octoboss)</label><textarea class="form-control" name="octo_ter_con"><?php echo get_config('octo_ter_con'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black font-w500">Terms And Conditions (Customers)</label><textarea class="form-control" name="user_ter_con"><?php echo get_config('user_ter_con'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black font-w500">Announcement/Notifications (Octoboss)</label><textarea class="form-control" name="octo_notification"><?php echo get_config('octo_notification'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black font-w500">Announcement/Notifications (Customers)</label><textarea class="form-control" name="user_notification"><?php echo get_config('user_notification'); ?></textarea>
                                        </div>
                                         
                                        <div class="form-group">
                                            <input type="submit" name="button" class="btn btn-success" id="button" value="Add" />
                                            <input type="hidden" name="action" value="add" />
                                            <input type="button" name="button" class="btn btn-danger" id="button" value="Cancel" onclick="window.location.href='<?php echo $cancel_url; ?>';" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </div>
    <?php include "include/js.php"; ?>
</body>

</html>