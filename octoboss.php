<?php require_once('tracker_help_files/control.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Customer - Octoboss</title><!-- Favicon icon --><?php include "include/css.php"; ?>
</head>

<body>
    <!--*******************Preloader start********************-->
    <!--*******************Preloader end********************-->
    <!--**********************************Main wrapper start***********************************-->
    <div id="main-wrapper">
        <!--**********************************Nav header start***********************************-->
        <!--**********************************Nav header end***********************************--><?php include "include/topheader.php"; ?>
        <!--**********************************Chat box start***********************************-->
        <!--**********************************Chat box End***********************************-->
        <!--**********************************Header start***********************************-->
        <!--**********************************Header end ti-comment-alt***********************************-->
        <!--**********************************Sidebar start***********************************--><?php include "include/sidebar.php"; ?>
        <!--**********************************Sidebar end***********************************-->
        <!--**********************************Content body start***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Order -->
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Octoboss</a></li>
                    </ol><input type="button" name="button" id="button" value="Add Octoboss" class="btn btn-success" onclick="window.location.href='edit-octoboss.php';" style="float: right;" />
                </div><?php if (isset($_SESSION['message'])) {
                            echo "<div class='col-md-12' style='background: #90eb90';><p style='color: #0b840b;text-align: center;'>" . $_SESSION['message'] . "</p></div>";
                        }
                        unset($_SESSION['message']); ?><div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-lg mb-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th class="">
                                                    <div class="custom-control custom-checkbox mx-2"> <input type="checkbox" class="custom-control-input" id="checkAll"> <label class="custom-control-label" for="checkAll"></label> </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th class="pl-5 width200">Address </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers"> <?php $qry = db_query("SELECT * FROM `tbl_member` WHERE `user_type`=0");
                                                                while ($row = mysqli_fetch_array($qry)) { ?> <tr class="btn-reveal-trigger">
                                                    <td>
                                                        <div class="custom-control custom-checkbox mx-2"> <input type="checkbox" class="custom-control-input" id="checkbox1"> <label class="custom-control-label" for="checkbox1"></label> </div>
                                                    </td>
                                                    <td class="py-3"> <a href="#">
                                                            <div class="media d-flex align-items-center">
                                                                <div class="avatar avatar-xl mr-2">
                                                                    <div class=""><img class="rounded-circle img-fluid" src="<?= $row['member_image'] ?>images/avatar/5.png" width="30" alt="" /> </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h5 class="mb-0 fs--1"><?= $row['member_name'] ?></h5>
                                                                </div>
                                                            </div>
                                                        </a> </td>
                                                    <td class="py-2"><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                                                    <td class="py-2"> <a href="tel:<?= $row['phpone_no'] ?>"><?= $row['phpone_no'] ?></a></td>
                                                    <td class="py-2 pl-5 wspace-no"><?= $row['address'] ?></td> <?php if ($row['status'] == 1) { ?> <td class="py-2"><span class="badge badge-success">Active</span></td> <?php
                                                                                                                } else { ?> <td class="py-2"><span class="badge badge-danger"> In-Active</span></td> <?php
                                                                                                                } ?> <td class="py-2 text-right">
                                                        <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                        </g>
                                                                    </svg></span></button>
                                                            <div class="dropdown-menu dropdown-menu-right border py-0">
                                                                <div class="py-2"><a class="dropdown-item" href="edit-octoboss.php?id=<?= $row['id'] ?>">Edit</a>
                                                                <?php if($row['status']==1):?>
                                                                    <a class="dropdown-item text-danger" href="de-activate-octoboss.php?user_id=<?= $row['id'] ?>">DeActivate Account</a>
                                                                <?php endif;?>
                                                                <?php if($row['status']==0):?>
                                                                    <a class="dropdown-item text-danger" href="activate-octoboss.php?user_id=<?= $row['id'] ?>">Activate Account</a>
                                                                <?php endif;?>
                                                                <a class="dropdown-item text-danger" href="octoboss.php?delete_id=<?= $row['id'] ?>">Delete</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> <?php
                                                                } ?> </tbody>
                                    </table> <?php if (!empty($_GET['delete_id'])) {
                                                    $id = $_GET['delete_id'];
                                                    $query_delete = db_query("DELETE FROM `tbl_member` WHERE id='$id'");
                                                    if ($query_delete) {
                                                        echo "<script>window.location='octoboss.php';</script> ";
                                                        $_SESSION['message'] = "Octoboss Data is  Deleted Successfully";
                                                    }
                                                } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************Content body end***********************************-->
        <!--**********************************Footer start***********************************--><?php include "include/footer.php"; ?>
        <!--**********************************Footer end***********************************-->
        <!--**********************************Support ticket button start***********************************-->
        <!--**********************************Support ticket button end***********************************-->
    </div>
    <!--**********************************Main wrapper end***********************************-->
    <!--**********************************Scripts***********************************-->
    <!-- Required vendors --><?php include "include/js.php"; ?>
    <!-- Circle progress -->
</body>

</html>