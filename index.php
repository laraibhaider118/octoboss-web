
<?php
//session_destroy();
include("tracker_help_files/control.php");
$keyword = "Sign In";

if(!empty($_SESSION['member'])) {
	header("Location:".SITE_URL);
	exit;
}

@extract($_POST);
/*
if($action=='guest_checkout') {
	$_SESSION['gmail']=$gemail;
	$_SESSION['quick_mem_id']=1;
	header("Location:checkout.htm");
	exit;
} */
$msg='';
if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

		
		$qry = db_query("SELECT * FROM `admin_tbl` WHERE  `user_email`='$email' AND `user_password`='$password'; ");
		$num = mysqli_num_rows($qry);
		 
		if($num>0) {
		
		$res=mysqli_fetch_assoc($qry);
       
		$_SESSION['member'] = $res['id']."~~".$res['user_name']."~~".$res['user_email']."~~".$res['contact_person'];
		$_SESSION['username'] = $res['user_name'];
		$_SESSION['last_login'] = $res['last_login'];
		$curr_date = date('Y-m-d H:i:s');
		
		if($remember=="yes") {
			setcookie("cockie_email","$email","0","/");
			setcookie("cockie_pass","$pass","0","/");
		}
		else {
			
			setcookie("cockie_email","","0","/");
			setcookie("cockie_pass","","0","/");
		} 
			$redirect_url = SITE_URL.'/dashboard.php';
		?>
		<script type='text/javascript'>window.location.href='<?php echo $redirect_url?>';</script>
		<?php
		exit;
	}
		
		/*
		$rcond='';
		if($_REQUEST['c']!=''){
			$rcond ="?c=$_REQUEST[c]";	
		}
		elseif($_REQUEST['ref']!=''){
			$rcond ="?ref=$_REQUEST[ref]";	
		}
		elseif($_REQUEST['product_id']>0 && $_REQUEST['act']!='') {
			
			$rcond ="?product_id=$_REQUEST[product_id]&act=$_REQUEST[act]";	
		}
		
		$redirect_url = SITE_URL;
	
		
	
		$msg = '<div style="color:red;text-align:center;font-size:18px;">Username or password is incorrect. Please try again!</div>';
	*/
	
		
	
}

?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Octboss Dashboard Admin Panel</title>

    <!-- Favicon icon -->
 <?php include "include/css.php";?>
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Admin Panel</h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1 text-white">
													<input type="checkbox" name="remember" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group" style="display:none;">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn bg-white text-primary btn-block">Sign In </a></button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="register.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   <?php include "include/js.php";?>

</body>

</html>