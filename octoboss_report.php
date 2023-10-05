<?php require_once('tracker_help_files/control.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Customer - Octoboss</title>
    <?php include "include/css.php"; ?>
</head>

<body>
    <div id="main-wrapper">
        <?php include "include/topheader.php"; ?>
        <?php include "include/sidebar.php"; ?>
        <div class="content-body">
            <div class="container-fluid">
                <!-- Add Order -->
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Octoboss</a></li>
                    </ol>

                </div>
                <!-- Start Of Session Message -->
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='col-md-12' style='background: #90eb90';><p style='color: #0b840b;text-align: center;'>" . $_SESSION['message'] . "</p></div>";
                }
                unset($_SESSION['message']);

                $filter_qry = '';
                $check_filter = isset($_GET['filter']) ?  $_GET['filter'] :'';
                if(!empty($check_filter)){
                    if($check_filter=='active'){
                        $filter_qry = ' AND status=1 ';
                    }elseif($check_filter=='inactive'){
                        $filter_qry = ' AND status=0 ';
                    }elseif($check_filter=='block'){
                        $filter_qry = ' AND block=1 ';
                    }elseif($check_filter=='all'){
                        $filter_qry = ''; 
                    }else{
                        $filter_qry = ''; 
                    }
                }else{
                    $filter_qry = ''; 
                }
                ?>
                <!-- End Of Session Message -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row filters">
                                    <div class="col-sm-6">
                                        <a class="btn btn-success blue_btn" href="octoboss_report.php?filter=all">All</a>
                                        <a class="btn btn-success green_btn" href="octoboss_report.php?filter=active">Active</a>
                                        <a class="btn btn-danger red_btn" href="octoboss_report.php?filter=inactive">InActive</a>
                                        <a class="btn btn-danger yellow_btn" href="octoboss_report.php?filter=block">Blocked</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-responsive-lg mb-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th class="pl-5 width200">Address </th>
                                                <th>Status</th>
                                                <th>Blocked</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            <?php $qry = db_query("SELECT * FROM `tbl_member` WHERE `user_type`=0 $filter_qry");
                                            while ($row = mysqli_fetch_array($qry)) {
                                            ?>
                                                <tr class="btn-reveal-trigger">

                                                    <td class="py-3"> <?= $row['fullname'] ?> </td>
                                                    <td class="py-2"><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                                                    <td class="py-2"> <a href="tel:<?= $row['phpone_no'] ?>"><?= $row['phpone_no'] ?></a></td>
                                                    <td class="py-2 pl-5 wspace-no"><?= $row['address'] ?></td> 
                                                    <?php 
                                                        if ($row['status'] == 1) {  ?> 
                                                        <td class="py-2"><span class="badge badge-success">Active</span></td> 
                                                        <?php } else { ?> 
                                                        <td class="py-2"><span class="badge badge-danger"> In-Active</span></td> 
                                                    <?php } ?>
                                                    <?php 
                                                        if ($row['block'] == 1) {  ?> 
                                                        <td class="py-2"><span class="badge badge-danger">Yes</span></td> 
                                                        <?php } else { ?> 
                                                        <td class="py-2"><span class="badge badge-success"> No</span></td> 
                                                    <?php } ?>
                                                </tr> 
                                            <?php } ?>
                                        </tbody>
                                    </table>
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