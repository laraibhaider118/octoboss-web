<?php
require_once('tracker_help_files/control.php');

// header("Location:slider_images.php");
$cancel_url = "slider_images.php";
@extract($_POST);
if ($action == "add") {
    if (isset($_FILES["image"]["name"]) and !empty($_FILES["image"]["name"])) {        
        $target_dir = "images/slider/";
        $target_file = $target_dir . uniqid() . basename($_FILES["image"]["name"]);
        $extension = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'JOEG') {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                mysqli_query($con, "INSERT INTO `slider_images`(`image`) VALUES ('" . $target_file . "')");
            }
        }
    }
    if(mysqli_error($con)){
        $_SESSION['message'] =mysqli_error($con) ;
    }else{
        $_SESSION['message'] = 'New Image Added Successfully!';
    }
}

$all_images = mysqli_query($con,"SELECT * FROM slider_images order by sort_num asc");
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
                        <li class="breadcrumb-item"><a href="slider_images.php">Slider Images</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"> All</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">                                        
                                        <div class="row">
                                            <?php while ($fetch = mysqli_fetch_assoc($all_images)) {  ?>
                                                <div class="col-sm-4 image_box">
                                                    <img height="200" src="<?php echo $fetch['image']; ?>" alt="Slider Image">
                                                    <a class="btn btn-primary green_btn" href="actions/delete-slider-image.php?delete_id=<?php echo $fetch['id']; ?>&image_name=<?php echo $fetch['image']; ?>">Delete Image</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
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