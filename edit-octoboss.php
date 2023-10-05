<?php
require_once('tracker_help_files/control.php');
//protect_admin_page();
$id = $_REQUEST['id'];
$cancel_url = "octoboss.php";
@extract($_POST);
if ($action == "add") {
	$user_type = 0;
	$email = addslashes($email);
	$password = addslashes($password);
	$full_name = addslashes($full_name);
	$address = addslashes($address);
	$appartment_no = addslashes($appartment_no);
	$country = addslashes($country);
	$state = addslashes($state);
	$city = addslashes($city);
	$postal_code = addslashes($postal_code);



	$bname = addslashes($bname);
	$bemail = addslashes($bemail);
	$baddress = addslashes($baddress);
	$bappartment = addslashes($bappartment);
	$bcity = addslashes($bcity);
	$bstate = addslashes($bstate);
	$bcountry = addslashes($bcountry);
	$bzip = addslashes($bzip);

	$postal_code = addslashes($postal_code);
	$bphone				= addslashes($bphone);
	$status				= addslashes($status);
	$block				= addslashes($block);
	$password = md5($password);
	// $qrystr = db_query();
	mysqli_query($con,"INSERT INTO `tbl_member`(`user_type`, `full_name`, `email`,  `phone_number`,`address`, `appartment_no`, `city`, `state`, `postal_code`,`bname`,  `baddress`, `bcity`, `bstate`, `bcountry`, `bzip`, `bemail`, `bphone`, `bappartment`,`status`,`block`,`password`) VALUES ('$user_type','$full_name','$email','$phone','$address','$appartment_no','$city','$state','$postal_code','$bname','$baddress','$bcity','$bstate','$bcountry','$bzip','$bemail','$bphone','$bappartment','$status','$block','$password')");
	if(mysqli_error($con)){
		echo mysqli_error($con);
		die;
	}
	header("Location:" . $cancel_url);
	$_SESSION['message'] = "Record has been Added successfully.";
	exit;
}
if ($action == "edit" && $id != '' && is_numeric($id)) {
	$updateQry = "update tbl_member set 
`full_name`		='" . $full_name . "', 
`email`		='" . $email . "',
`phone`				='" . $phone . "', 
`address`		='" . $address . "', 
`appartment_no`		='" . $appartment_no . "', 
`city`		='" . $city . "', 
`postal_code`		='" . $postal_code . "', 
`state`		='" . $state . "', 
`bname`		='" . $bname . "', 
`user_type`		=0, 
`baddress`		='" . $baddress . "', 
`bcity`		='" . $bcity . "', 
`bstate`		='" . $bstate . "', 
`bcountry`		='" . $bcountry . "', 
`bzip`		='" . $bzip . "', 
`bemail`		='" . $bemail . "', 
`bphone`		='" . $bphone . "', 
`bappartment`		='" . $bappartment . "',  
`block`		='" . $block . "'
where id='" . $id . "'";
	db_query($updateQry);
	set_sess_msg('Record has been updated successfully.');
	header("Location:" . $cancel_url);
	$_SESSION['message'] = "Record has been updated successfully.";
	exit;
	//}

}
if ($id != '' && is_numeric($id)) {
	$page_heading = "Edit Member";
	$res = mysqli_fetch_array(db_query("select * from tbl_member where id='" . $id . "'"));
	@extract($res);
} else {
	$page_heading = "Add Member";
}
if ($_POST) {
	$membership_name = $_POST['membership_name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$block = $_POST['block'];
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
            Header start
        ***********************************-->

		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
		<!--**********************************
            Sidebar start
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
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item"><a href="octoboss.php">Octoboss</a></li>
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
									<form name="form1" id="form1" method="post" onsubmit="return validate(this);" style="margin:0px;" enctype="multipart/form-data">


										<h3>Login Details :</h3>
										<div class="form-group">
											<label class="text-black font-w500">Username/Email Id :</label>
											<?php echo $email; ?>
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Password :</label>
											<input type="password" class="form-control" name="password" value="<?php echo $password; ?>" id="NOBLANK~Please enter password.~DM~" />
										</div>
										<h3>Personal Details:</h3>
										<div class="form-group">
											<label class="text-black font-w500">Member Name</label>
											<input type="text" class="form-control" name="full_name" value="<?= $full_name; ?>">
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Email</label>
											<input type="text" class="form-control" name="email" value="<?= $email; ?>">
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Phone/Mobile</label>
											<input type="text" class="form-control" name="phone" value="<?= $phone ?>">
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Address</label>
											<input type="text" class="form-control" name="address" value="<?= $address ?>">
										</div>
										<div class="form-group"> <label class="text-black font-w500">Apartment(Optional):</label> <input type="text" class="form-control" name="appartment_no" value="<?= $appartment_no ?>">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="text-black font-w500">Country</label>
													<br>
													<select name="country" onchange="show_state3(this.value);" class="form-control" id="country">
														<?php echo country_list_dropdown($country); ?>
													</select>

												</div>

												<div class="form-group  col-md-6">
													<label class="text-black font-w500">State</label>
													<br>
													<select name="state" class="form-control" id="state" size="1" onchange="show_city3(this.value);">
													</select>

												</div>
												<div class="form-group  col-md-6">
													<label class="text-black font-w500">City</label>
													<br>
													<select name="city" class="form-control" id="city" size="1">
													</select>

												</div>
												<div class="form-group  col-md-6">
													<label class="text-black font-w500">Zip</label>
													<br>
													<input type="text" name="postal_code" id="postal_code" value="<?php echo $postal_code; ?>" class="form-control" />

												</div>
											</div>

											<h3>Billing Details :</h3>
											<div class="form-group">
												<label class="text-black font-w500">Name</label>
												<br>
												<input type="text" name="bname" class="form-control" value="<?php echo $bname; ?>" id="bname" />

											</div>
											<div class="form-group">
												<label class="text-black font-w500">Email</label>
												<br>
												<input type="text" name="bemail" class="form-control" value="<?php echo $bemail; ?>" id="bemail" />

											</div>
											<div class="form-group">
												<label class="text-black font-w500">Address : </label>
												<br>
												<textarea name="baddress" class="form-control" id="baddress"><?php echo $baddress; ?></textarea>

											</div>

											<div class="form-group">
												<label class="text-black font-w500">Apartment (Optional) :</label>
												<br>
												<input type="text" name="bappartment" value="<?php echo $bappartment; ?>" class="form-control" />

											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="text-black font-w500"> Country :</label>
													<br>
													<select name="bcountry" onchange="show_state(this.value);" class="form-control" id="bcountry">
														<?php echo country_list_dropdown($bcountry); ?>
													</select>

												</div>
												<div class="form-group col-md-6">
													<label class="text-black font-w500"> State :</label>
													<br>
													<select name="bstate" class="form-control" class="form-control" id="bstate" size="1" onchange="show_city(this.value);">
													</select>

												</div>
												<div class="form-group col-md-6">
													<label class="text-black font-w500"> City :</label>
													<br>
													<select name="bcity" class="form-control" class="form-control" id="bcity" size="1">
													</select>

												</div>
												<div class="form-group col-md-6">
													<label class="text-black font-w500"> Zip :</label>
													<br>
													<input type="text" name="bzip" id="bzip" value="<?php echo $bzip; ?>" class="form-control" />

												</div>
												<div class="form-group col-md-12">
													<label class="text-black font-w500">Phone :</label>
													<br>
													<input type="text" name="bphone" value="<?php echo $bphone; ?>" class="form-control" />

												</div>
												<!-- <div class="form-group">
													<label class="text-black font-w500">Status</label>
													<select name="status" class="form-control">
														<option value="1" <?= ($status == '1') ? 'selected' : '' ?>>Active</option>
														<option value="0" <?= ($status == '0') ? 'selected' : '' ?>>In-active</option>
													</select>
												</div> -->
												<div class="form-group">
													<label class="text-black font-w500">Block</label>
													<select name="block" class="form-control">
														<option value="1" <?= ($block == '1') ? 'selected' : '' ?>>Yes</option>
														<option value="0" <?= ($block == '0') ? 'selected' : '' ?>>No</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<?php
												if ($id != '' && is_numeric($id)) {
												?>
													<input type="submit" name="button" id="button" class="btn btn-success" value="Edit" />
													<input type="hidden" name="action" value="edit" />
													<input type="hidden" name="id" value="<?php echo $id; ?>" />
												<?php
												} else {
												?>
													<input type="submit" name="button" class="btn btn-success" id="button" value="Add" />
													<input type="hidden" name="action" value="add" />
												<?php
												}
												?>

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
		<!--**********************************
            Content body end
        ***********************************-->
		<!--**********************************
            Footer start
        ***********************************-->
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
	<?php include "include/js.php"; ?>
	<!-- Circle progress -->

	<script>
		<?php
		$country = ($country > 0) ? $country : '17';
		$bcountry = ($bcountry > 0) ? $bcountry : '17';
		$scountry = ($scountry > 0) ? $scountry : '17';
		?>
		<? ?>
		$(window).load(function() {
			show_state('<?= $bcountry ?>', '<?= $bstate ?>');
			show_city('<?= $bstate ?>', '<?= $bcity ?>');
			show_state2('<?= $scountry ?>', '<?= $sstate ?>');
			show_city2('<?= $sstate ?>', '<?= $scity ?>');
			show_state3('<?= $country ?>', '<?= $state ?>');
			show_city3('<?= $state ?>', '<?= $city ?>');
		});

		function show_state(country, state) {
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'countryval': country,
					'state_id': state,
					'action': 'show_state'
				},
				dataType: 'json',
				success: function(data2) {
					$("#bstate").html(data2);
				},
				error: function() {}
			});
		}

		function show_city(state, city) {
			if (state == "") {
				$("#city").prop("disabled", true);
			} else {
				$("#city").prop("disabled", false);
			}
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'state': state,
					'city_id': city,
					'action': 'show_city'
				},
				dataType: 'json',
				success: function(data) {
					$("#bcity").html(data);
				},
				error: function() {}
			});
		}

		function show_state2(country, state) {
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'countryval': country,
					'state_id': state,
					'action': 'show_state'
				},
				dataType: 'json',
				success: function(data2) {
					$("#sstate").html(data2);
				},
				error: function() {}
			});
		}

		function show_city2(state, city) {
			if (state == "") {
				$("#city").prop("disabled", true);
			} else {
				$("#city").prop("disabled", false);
			}
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'state': state,
					'city_id': city,
					'action': 'show_city'
				},
				dataType: 'json',
				success: function(data) {
					$("#scity").html(data);
				},
				error: function() {}
			});
		}

		function show_state3(country, state) {
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'countryval': country,
					'state_id': state,
					'action': 'show_state'
				},
				dataType: 'json',
				success: function(data2) {
					$("#state").html(data2);
				},
				error: function() {}
			});
		}

		function show_city3(state, city) {
			if (state == "") {
				$("#city").prop("disabled", true);
			} else {
				$("#city").prop("disabled", false);
			}
			$.ajax({
				url: "<?php echo SITE_URL . '/ajax.php'; ?>",
				type: "POST",
				data: {
					'state': state,
					'city_id': city,
					'action': 'show_city'
				},
				dataType: 'json',
				success: function(data) {
					$("#city").html(data);
				},
				error: function() {}
			});
		}
	</script>
</body>

</html>