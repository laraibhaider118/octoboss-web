<?php require_once('tracker_help_files/control.php');


$total_octoboss = 0;
$total_customers = 0;
$active_octoboss = 0;
$inactive_octoboss = 0;
$total_services = 0;
$total_plans = 0;

// Total Customers
$customer_q = mysqli_query($con, "SELECT count(id) as total_customers from tbl_member where user_type = 1");
$cus_res = mysqli_fetch_assoc($customer_q);
$total_customers = isset($cus_res['total_customers']) ? $cus_res['total_customers'] : 0;
// Total octoboss
$octoboss_q = mysqli_query($con, "SELECT count(id) as total_octoboss from tbl_member where user_type = 0");
$octoboss_res = mysqli_fetch_assoc($octoboss_q);
$total_octoboss = isset($octoboss_res['total_octoboss']) ? $octoboss_res['total_octoboss'] : 0;
// Active octoboss
$active_octo_query = mysqli_query($con, "SELECT count(id) as active_octoboss from tbl_member where user_type = 0 AND status=1");
$ac_oc_res = mysqli_fetch_assoc($active_octo_query);
$active_octoboss = isset($ac_oc_res['active_octoboss']) ? $ac_oc_res['active_octoboss'] : 0;
// Inactive octoboss
$inactive_q = mysqli_query($con, "SELECT count(id) as inactive_octoboss from tbl_member where user_type = 0 AND status=0");
$in_ac_octoboss_res = mysqli_fetch_assoc($inactive_q);
$inactive_octoboss = isset($in_ac_octoboss_res['inactive_octoboss']) ? $in_ac_octoboss_res['inactive_octoboss'] : 0;
// Blocked Octoboss
$blocked_octo_q = mysqli_query($con, "SELECT count(id) as blocked_octoboss from tbl_member where user_type = 0 AND block=1");
$blocked_octo_res = mysqli_fetch_assoc($blocked_octo_q);
$blocked_octoboss = isset($blocked_octo_res['blocked_octoboss']) ? $blocked_octo_res['blocked_octoboss'] : 0;
// Blocked Users
$blocked_q = mysqli_query($con, "SELECT count(id) as blocked_users from tbl_member where user_type = 1 AND block=1");
$blocked_res = mysqli_fetch_assoc($blocked_q);
$blocked_users = isset($blocked_res['blocked_users']) ? $blocked_res['blocked_users'] : 0;
// total active_plans
$plan_q = mysqli_query($con, "SELECT count(id) as total_plans from membership_table ");
$plan_res = mysqli_fetch_assoc($plan_q);
$total_plans = isset($plan_res['total_plans']) ? $plan_res['total_plans'] : 0;
// Total Services
$services_q = mysqli_query($con, "SELECT count(id) as total_services from services_tbl");
$services_res = mysqli_fetch_assoc($services_q);
$total_services = isset($services_res['total_services']) ? $services_res['total_services'] : 0;


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <title>Octoboss - Dashboard</title>
   <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
   <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
   <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body>
   <!--*******************        Preloader start    ********************-->
   <!--*******************        Preloader end    ********************-->
   <!--**********************************        Main wrapper start    ***********************************-->
   <div id="main-wrapper">
      <!--**********************************            Nav header start        ***********************************-->
      <div class="nav-header">
         <a href="<?= SITE_URL ?>" class="brand-logo"> <img class="logo-abbr" src="images/logo.png" alt=""> <img class="brand-title" src="images/logo-text.png" alt=""> </a>
         <div class="nav-control">
            <div class="hamburger"> <span class="line"></span><span class="line"></span><span class="line"></span> </div>
         </div>
      </div>
      <!--**********************************            Nav header end        ***********************************-->
      <?php include "include/topheader.php"; ?>
      <!--**********************************            Sidebar start        ***********************************-->
      <?php include "include/sidebar.php"; ?>
      <!--**********************************            Sidebar end        ***********************************-->
      <!--**********************************            Content body start        ***********************************-->
      <div class="content-body">
         <!-- row -->
         <div class="container-fluid">
            <!-- Add Order -->
            <?php



            ?>
            <div class="row">
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">
                                 <?php echo $total_customers; ?>
                              </h2>
                              <span class="text-white">Total Customer</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600"><?php echo $total_octoboss; ?></h2>
                              <span class="text-white">Total Octoboss</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!------------------ ADD NEW ONE  --->

               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">
                                 <?php echo $active_octoboss; ?>
                              </h2>
                              <span class="text-white">Active Octoboss</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!------------------- END OF NEW ONE --->
               <!------------------ ADD NEW ONE  --->

               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">
                                 <?php echo $inactive_octoboss; ?>
                              </h2>
                              <span class="text-white">InActive Octoboss</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">
                                 <?php echo $blocked_octoboss; ?>
                              </h2>
                              <span class="text-white">Blocked Octoboss</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!------------------- END OF NEW ONE --->
               <!------------------ ADD NEW ONE  --->

               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">
                                 <?php echo $blocked_users; ?>
                              </h2>
                              <span class="text-white">Blocked Users</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>3/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!------------------- END OF NEW ONE --->
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600"><?php echo $total_plans; ?></h2>
                              <span class="text-white">Total Membership Plans</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>4/8</span> <small class="text-primary"> <img src="images/icon/box.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600"><?php echo $total_services; ?></h2>
                              <span class="text-white">Total Services</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>7/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">850</h2>
                              <span class="text-white">Total Branch</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>7/8</span> <small class="text-primary"> <img src="images/icon/agency.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-xxl-6 col-sm-6">
                  <div class="card grd-card">
                     <div class="card-body">
                        <div class="media align-items-center">
                           <div class="media-body mr-2">
                              <h2 class="text-white font-w600">830</h2>
                              <span class="text-white">Happy Customers</span>
                           </div>
                           <div class="d-inline-block position-relative donut-chart-sale"> <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0)"],   "innerRadius": 41, "radius": 10}'>7/8</span> <small class="text-primary"> <img src="images/icon/user.png" class="img-fluid"> </small> <span class="circle bg-white"></span> </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--**********************************            Content body end        ***********************************--><?php include "include/footer.php"; ?>
      <!--**********************************           Support ticket button start        ***********************************-->
      <!--**********************************           Support ticket button end        ***********************************-->
   </div>
   <!--**********************************        Main wrapper end    ***********************************-->
   <!--**********************************        Scripts    ***********************************-->
   <!-- Required vendors -->
   <script src="vendor/global/global.min.js"></script>
   <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
   <script src="vendor/chart.js/Chart.bundle.min.js"></script>
   <script src="js/custom.min.js"></script>
   <script src="js/deznav-init.js"></script> <!-- Chart piety plugin files -->
   <script src="vendor/peity/jquery.peity.min.js"></script> <!-- Apex Chart -->
   <script src="vendor/apexchart/apexchart.js"></script> <!-- Dashboard 1 -->
   <script src="js/dashboard/dashboard-1.js"></script>
</body>

</html>