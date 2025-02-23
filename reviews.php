<?php require_once('tracker_help_files/control.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Review -  Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
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
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/logo.png" alt="">
                <img class="logo-compact" src="images/logo-text.png" alt="">
                <img class="brand-title" src="images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		
		<!--**********************************
            Header start
        ***********************************-->
        
 <?php include "include/topheader.php";?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <
        <!--**********************************
            Sidebar end
        ***********************************-->
		 <?php include "include/sidebar.php";?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
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
				</div><div class="page-titles">			
				<ol class="breadcrumb">			
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>						<li class="breadcrumb-item active"><a href="javascript:void(0)">Reviews & Rating </a></li>				
				</ol>    
				</div>
				<div class="d-sm-flex d-block align-items-end">
					<div class="card-action card-tabs mb-sm-4 mb-3 mr-auto">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#All" role="tab" aria-selected="true">
									All
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#Published" role="tab" aria-selected="false">
									Published
								</a>
							</li>
							<!--<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#Today" role="tab" aria-selected="false">
									Deleted
								</a>
							</li>-->
						</ul>
					</div>
					<div class="dropdown custom-dropdown mb-4" style="display:none;">
						<div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" role="button" data-toggle="dropdown" aria-expanded="false">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
							<div class="text-left ml-3">
								<span class="d-block fs-16">Filter Periode</span>
								<small class="d-block fs-13">4 June 2020 - 4 July 2020</small>
							</div>
							<i class="fa fa-angle-down scale5 ml-3"></i>
						</div>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#">4 June 2020 - 4 July 2020</a>
							<a class="dropdown-item" href="#">5 july 2020 - 4 Aug 2020</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="All">
										<div class="card">
											<div class="card-header border-0 pb-0 d-sm-flex d-block">
												<div>
													<h4 class="card-title mb-1 fs-28 font-w600">Recent Review</h4>
													<p class="mb-0"> </p>
												</div>
											<div class="dropdown mt-sm-0 mt-3" style="display:none;">
													<button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
														Latest
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Latest</a>
														<a class="dropdown-item" href="#">OLD</a>
													</div>
												</div>
											</div>
											<div class="card-body p-0">
											
											<?php										$qry = db_query("SELECT * FROM `wp_review` WHERE 1=1");				
											while($row=mysqli_fetch_array($qry))	
												{
$start_name = get_star_name($row['rate']);
												?>
												<div class="media review-box">
													<img class="mr-3 img-fluid btn-rounded" width="55" src="images/avatar/1.jpg" alt="DexignZone">
													<div class="media-body">
														<h4 class="mt-0 mb-0 text-black"><?=$row['name']?></h4>
														<ul class="review-meta mb-3 d-block d-sm-flex align-items-center">
															<li style="display:none;" class="mr-3"><small>Head Marketing</small></li>
															<li class="mr-3"><small><?=date("d M,Y",strtotime($row['posted_date']))?></small></li>
															<li class="ml-auto"><span class="badge badge-rounded text-warning light font-w500"><?=$start_name?></span></li>
														</ul>
														<p class="mb-3 text-secondary"><?=$row['comment']?></p>
													</div>
													<div class="media-footer align-self-center">
														<div class="star-review text-md-center">
															<span class="text-secondary"><?=$row['rate']?></span>
															<? for($i=1; $i<=$row['rate'];$i++){ ?>
															<i class="fa fa-star text-primary"></i>
															<? } ?>
															
															<!--<i class="fa fa-star text-gray"></i>-->
														</div>
													</div>
												</div>
											<? } ?>
											</div>
											<div class="card-footer border-0 text-center" style="display:none;">
												<nav>
													<ul class="pagination style-1 mb-0">
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-left"></i>
															</a>
														</li>
														<li>
															<ul>
																<li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
															</ul>
														</li>
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-right"></i>
															</a>
														</li>
													</ul>
												</nav>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="Published">
										<div class="card">
											<div class="card-header border-0 pb-0 d-sm-flex d-block">
												<div>
													<h4 class="card-title mb-1 fs-28 font-w600">Published</h4>
													<p class="mb-0"></p>
												</div>
												<div class="dropdown mt-sm-0 mt-3" style="display:none;">
													<button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
														Latest
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Latest</a>
														<a class="dropdown-item" href="#">OLD</a>
													</div>
												</div>
											</div>
											<div class="card-body p-0">
												<?php										$qry = db_query("SELECT * FROM `wp_review` WHERE status='1' order by review_id desc");				
											while($row=mysqli_fetch_array($qry))	
												{
$start_name = get_star_name($row['rate']);
												?>
												<div class="media review-box">
													<img class="mr-3 img-fluid btn-rounded" width="55" src="images/avatar/1.jpg" alt="DexignZone">
													<div class="media-body">
														<h4 class="mt-0 mb-0 text-black"><?=$row['name']?></h4>
														<ul class="review-meta mb-3 d-block d-sm-flex align-items-center">
															<li style="display:none;" class="mr-3"><small>Head Marketing</small></li>
															<li class="mr-3"><small><?=date("d M,Y",strtotime($row['posted_date']))?></small></li>
															<li class="ml-auto"><span class="badge badge-rounded text-warning light font-w500"><?=$start_name?></span></li>
														</ul>
														<p class="mb-3 text-secondary"><?=$row['comment']?></p>
													</div>
													<div class="media-footer align-self-center">
														<div class="star-review text-md-center">
															<span class="text-secondary"><?=$row['rate']?></span>
															<? for($i=1; $i<=$row['rate'];$i++){ ?>
															<i class="fa fa-star text-primary"></i>
															<? } ?>
															
															<!--<i class="fa fa-star text-gray"></i>-->
														</div>
													</div>
												</div>
											<? } ?>
											</div>
											<div class="card-footer border-0 text-center py-4" style="display:none;">
												<nav>
													<ul class="pagination style-1 mb-0">
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-left"></i>
															</a>
														</li>
														<li>
															<ul>
																<li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
															</ul>
														</li>
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-right"></i>
															</a>
														</li>
													</ul>
												</nav>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="Today">
										<div class="card">
											<div class="card-header border-0 pb-0 d-sm-flex d-block">
												<div>
													<h4 class="card-title mb-1 fs-28 font-w600">Today</h4>
													<p class="mb-0">Here is customer review about your restaurant </p>
												</div>
												<div class="dropdown mt-sm-0 mt-3">
													<button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
														Latest
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Latest</a>
														<a class="dropdown-item" href="#">OLD</a>
													</div>
												</div>
											</div>
											<div class="card-body p-0">
												<div class="media review-box">
													<img class="mr-3 img-fluid btn-rounded" width="55" src="images/avatar/1.jpg" alt="DexignZone">
													<div class="media-body">
														<h4 class="mt-0 mb-0 text-black">Glee Smiley</h4>
														<ul class="review-meta mb-3 d-block d-sm-flex align-items-center">
															<li class="mr-3"><small>Head Marketing</small></li>
															<li class="mr-3"><small>24 June 2020</small></li>
															<li class="ml-auto"><span class="badge badge-rounded text-warning light font-w500">Excelent</span></li>
														</ul>
														<p class="mb-3 text-secondary">We recently had dinner with friends at David CC and we all walked away with a great experience. Good food, pleasant environment, personal attention through all the evening. Thanks to the team and we will be back!</p>
													</div>
													<div class="media-footer align-self-center">
														<div class="star-review text-md-center">
															<span class="text-secondary">4.5</span>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-gray"></i>
														</div>
													</div>
												</div>
												<div class="media review-box">
													<img class="mr-3 img-fluid btn-rounded" width="55" src="images/avatar/2.jpg" alt="DexignZone">
													<div class="media-body">
														<h4 class="mt-0 mb-0 text-black">Samuel Hawkins</h4>
														<ul class="review-meta mb-3 d-block d-sm-flex align-items-center">
															<li class="mr-3"><small>Head Marketing</small></li>
															<li class="mr-3"><small>24 June 2020</small></li>
															<li class="ml-auto">
																<span class="badge badge-rounded text-warning light font-w500">Recomended</span> 
																<span class="badge badge-rounded text-warning light font-w500 ml-1">Great</span>
															</li>
														</ul>
														<p class="mb-3 text-secondary">We recently had dinner with friends at David CC and we all walked away with a great experience. Good food, pleasant environment, personal attention through all the evening. Thanks to the team and we will be back!</p>
													</div>
													<div class="media-footer align-self-center">
														<div class="star-review text-md-center">
															<span class="text-secondary">4.8</span>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-gray"></i>
														</div>
													</div>
												</div>
												<div class="media review-box">
													<img class="mr-3 img-fluid btn-rounded" width="55" src="images/avatar/1.jpg" alt="DexignZone">
													<div class="media-body">
														<h4 class="mt-0 mb-0 text-black">Sanji Lee</h4>
														<ul class="review-meta mb-3 d-block d-sm-flex align-items-center">
															<li class="mr-3"><small>Head Marketing</small></li>
															<li class="mr-3"><small>24 June 2020</small></li>
															<li class="ml-auto"><span class="badge badge-rounded text-warning light font-w500">Excelent</span></li>
														</ul>
														<p class="mb-3 text-secondary">We recently had dinner with friends at David CC and we all walked away with a great experience. Good food, pleasant environment, personal attention through all the evening. Thanks to the team and we will be back!</p>
													</div>
													<div class="media-footer align-self-center">
														<div class="star-review text-md-center">
															<span class="text-secondary">1.0</span>
															<i class="fa fa-star text-primary"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="card-footer border-0 text-center py-4">
												<nav>
													<ul class="pagination style-1 mb-0">
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-left"></i>
															</a>
														</li>
														<li>
															<ul>
																<li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
																<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
															</ul>
														</li>
														<li class="page-item page-indicator">
															<a class="page-link" href="javascript:void(0)">
																<i class="la la-angle-right"></i>
															</a>
														</li>
													</ul>
												</nav>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-4">
						<div class="row">
							<div class="col-xl-12">	
								<div class="card h-auto sticky">
									<div class="card-header border-0 pb-0 ">
										<div>
											<h3 class="card-title mb-1 fs-28 font-w600">🔥 Newest</h3>
										</div>
										<div class="testimonial-one-navigation owl-clienr-btn pull-left">
											<span id="next-slide" class="prev mr-3"><i class="fa fa-chevron-left"></i></span>
											<span id="prev-slide" class="next"><i class="fa fa-chevron-right"></i></span>
										</div>
									</div>
									<div class="card-body">
										<div class="testimonial-one owl-carousel">
										<?php										$qry = db_query("SELECT * FROM `wp_review`  order by review_id desc limit 5");				
											while($row=mysqli_fetch_array($qry))	
												{
$start_name = get_star_name($row['rate']);
												?>
											<div class="items">
												<div class="">
													<p class="mb-3"><?=$row['comment']?></p>
													<div class="media align-items-center mb-3">
														<img class="mr-3 img-fluid rounded-circle" width="50" src="images/avatar/1.jpg" alt="DexignZone">
														<div class="media-body">
															<h4 class="mt-0 mb-1 text-black"><?=$row['name']?></h4>
															<small class="mb-0" style="display:none;">Head Marketing</small>
														</div>
													</div>
													
										<div class="star-review text-md-center d-flex justify-content-center align-items-center">
										
										
															
															<!--<i class="fa fa-star text-gray"></i>-->
															
															
															
										<span class="text-white fs-32 font-w600 mr-3"><?=$row['rate']?></span>
											<? for($i=1; $i<=$row['rate'];$i++){ ?>
											<i class="fa fa-star fs-22 mx-1 text-white"></i>
											<? } ?>
									
										</div>
										
										
												</div>
											</div>
												<? } ?>
										</div>
									</div>
									<div style="display:none;" class="card-footer border-0 text-center py-4 gradient-bg rounded-xl">
									
									</div>
								</div>
							</div>
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
        ***********************************-->
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
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:0,
				nav:false,
				dots: false,
				navText: [''],
				responsive:{
					0:{
						items:1
					},
					
					480:{
						items:1
					},			
					
					767:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})		
			/*Custom Navigation work*/
			jQuery('#next-slide').on('click', function(){
			   $('.testimonial-one').trigger('next.owl.carousel');
			});

			jQuery('#prev-slide').on('click', function(){
			   $('.testimonial-one').trigger('prev.owl.carousel');
			});
			/*Custom Navigation work*/
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>

<!-- Mirrored from sego.dexignzone.com/xhtml/reviews.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 20:00:58 GMT -->
</html>