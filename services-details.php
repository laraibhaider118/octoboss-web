<?php require_once('tracker_help_files/control.php');$id = $_REQUEST['id'];$cancel_url = "services.php";if ($id != '' && is_numeric($id)){    $page_heading = "Edit Member";    $res = mysqli_fetch_array(db_query("select * from services_tbl where id='" . $id . "'"));    @extract($res);} ?><!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Services - Octoboss </title>

    <!-- Favicon icon -->
<?php include "include/css.php";?>
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

		<?php include "include/topheader.php";?>

		<!--**********************************

            Chat box start

        ***********************************-->

		

		<!--**********************************

            Chat box End

        ***********************************-->





		

		

        

        <!--**********************************

            Header end ti-comment-alt

        ***********************************-->



        <?php include "include/sidebar.php";?>

        <!--**********************************

            Sidebar end

        ***********************************-->



        <!--**********************************

            Content body start

        ***********************************-->

        <div class="content-body">

            <div class="container-fluid">

				<!-- Add Order -->

				

                <div class="page-titles">

					<ol class="breadcrumb">

						<li class="breadcrumb-item"><a href="index.php">Home</a></li>						<li class="breadcrumb-item"><a href="services.php">Services</a></li>

						<li class="breadcrumb-item active"><a href="javascript:void(0)"><?=$product_name; ?></a> </li>	
					</ol>
                </div>

                <div class="row">

                    <div class="col-md-5 col-sm-12">
                        <div class="deatils">
						<img src="../<?=$product_image; ?>" class="img-fluid">
                        </div>
                    </div>

                    <div class="col-md-7 col-sm-12">
                        <div class="details">
						<h1><?=$product_name; ?></h1>							<?=$product_desc; ?>
                        </div>
                    </div> 

                </div>

            </div>

        </div>

        <!--**********************************

            Content body end

        ***********************************-->





        <!--**********************************

            Footer start

       <?php include "include/footer.php";?>

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
<?php include "include/js.php";?>

    <!-- Circle progress -->







</body>

</html>