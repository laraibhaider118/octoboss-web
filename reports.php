<?php
require_once('tracker_help_files/control.php');
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
                if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                    echo '<div class="alert alert-secondary" role="alert">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }
                ?>

                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="settings.php">Reports</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"> All</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-body">
                                    <div class="row reports_row">

                                        <div class="col-sm-4 reports_bg">
                                            <a href="octoboss_report.php">
                                                <h2>OctoBoss Report</h2>
                                            </a>
                                        </div>


                                        <div class="col-sm-4">
                                            
                                        </div>



                                        <div class="col-sm-4 reports_bg">
                                            <a href="customers_report.php">
                                                <h2>Customers Report</h2>
                                            </a>
                                        </div>

                                    </div>
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