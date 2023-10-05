<?php require_once('tracker_help_files/control.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Services - Octoboss </title>
    <!-- Favicon icon --><?php include "include/css.php"; ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->

    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <!--**********************************
            Nav header end
        ***********************************-->
        <?php include "include/topheader.php"; ?>
        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->





        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <?php include "include/sidebar.php"; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Order -->
                <div class="modal fade" id="addOrderModalside">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Menus</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Food Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Order Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Food Price</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Services</a></li>
                    </ol>
                    <div class="over"> <a href="edit.php" class="edit-btn">Add Services</a> </div>
                </div>
                <div class="row"> <?php $qry = db_query("SELECT * FROM `services_tbl`");
                                    while ($row = mysqli_fetch_array($qry)) {                    ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrivals-img-contnent">
                                            <a href="edit.php?id=<?= $row['id']; ?>" class="edit2-btn">Edit</a>
                                            <a href="services.php?delete_id=<?= $row['id']; ?>" class="del-btn">Delete</a>
                                            <a href="services-details.php?id=<?= $row['id']; ?>">
                                                <?php if (empty($row['product_image'])) { ?>
                                                    <img class="img-fluid" src="../assest/octbosss.png" alt=""></a>
                                        <?php } else {
                                        ?>
                                            <img class="img-fluid" src="../<?= $row['product_image']; ?>" alt=""></a>
                                        <?php } ?>
                                        </div>
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4><a href="services-details.php?id=<?= $row['id']; ?>"><?= $row['product_name']; ?></a></h4>
                                            <ul class="star-rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                            </ul>
                                            <span class="price"><?= $row['product_price']; ?> CAD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <?php } ?> <?php if (!empty($_GET['delete_id'])) {
                                                $id = $_GET['delete_id'];
                                                $query_delete = db_query("DELETE FROM `services_tbl` WHERE id='$id'");
                                                if ($query_delete) {
                                                    echo "<script>window.location='services.php';</script> ";
                                                    $_SESSION['message'] = "Services Data is  Deleted Successfully";
                                                }
                                            }                                            ?>

                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
       <?php include "include/footer.php"; ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>


    <script src="vendor/highlightjs/highlight.pack.min.js"></script>
    <!-- Circle progress -->



</body>


<!-- Mirrored from sego.dexignzone.com/xhtml/ecom-product-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 20:01:01 GMT -->

</html>