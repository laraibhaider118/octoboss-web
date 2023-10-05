<?php
require_once('tracker_help_files/control.php');

//protect_admin_page();

$id = $_REQUEST['id'];

$cancel_url = "reviews.php"; 

@extract($_POST);

if ($action == "add")
{

	$email = addslashes($email);
	$name = addslashes($name);
	$rate = addslashes($rate);
	$comment = addslashes($comment);
	$publish_status = addslashes($publish_status);
	$status = addslashes($status);
	$degination = addslashes($degination);
	$posted_date = date('d-m-Y');

   $listing_image2=basename($_FILES['image']['name']);
$imageFileType3 =strtolower(pathinfo($listing_image2,PATHINFO_EXTENSION)); 
 $product_image1=time()."_Services.".$imageFileType3; 
 $listing_image1_temp=$_FILES['image']['tmp_name'];
 $listing_image1_path="../assest/img/user/".$product_image1;
 if(!empty($listing_image2))
 {
     $listing_image1_path2=substr($listing_image1_path,3);
 }else
 {
      $listing_image1_path2="assest/octbosss.png"; 
 }


 move_uploaded_file($listing_image1_temp,$listing_image1_path);
	

	$status =1;

    $qrystr = db_query("INSERT INTO `wp_review`(`name`, `email`, `rate`, `comment`,`posted_date`, `status`, `publish_status`, `degination`, `image`) VALUES ('$name','$email','$rate','$comment','$posted_date','$status','$publish_status','$degination','$listing_image1_path2')");
	 header("Location:".$cancel_url);
	 $_SESSION['message']="Record has been Added successfully.";

        exit;

}

if ($action == "edit" && $id != '' && is_numeric($id))
{


$updateQry = "wp_review tbl_member set 

`name`		='" . $name . "', 

`email`		='" . $email . "',  

`rate`		='" . $rate . "', 
`comment`	='" . $comment . "', 
`posted_date`	='" . $posted_date . "', 
`status`		='" . $status . "', 
`publish_status`		='" . $publish_status . "', 
`degination`		='" . $degination . "', 
`listing_image1_path2`		='" . $listing_image1_path2 . "'
where review_id='" . $id . "'"; 

    db_query($updateQry);

    set_sess_msg('Record has been updated successfully.');

    header("Location:".$cancel_url);
	$_SESSION['message']="Record has been updated successfully.";

    exit;

    //}
    
}

if ($id != '' && is_numeric($id))
{

    $page_heading = "Edit Member";

    $res = mysqli_fetch_array(db_query("select * from wp_review where review_id='" . $id . "'"));

    @extract($res);

}

else
{

    $page_heading = "Add Review";

}

if ($_POST)
{

    $name = $_POST['name'];

    $email = $_POST['email'];

    $rate = $_POST['rate'];
    $posted_date = $_POST['posted_date'];
    $comment = $_POST['comment'];
    $publish_status = $_POST['publish_status'];
    $degination = $_POST['degination'];

    $status = $_POST['status'];

    
} 

?>
<!DOCTYPE html>
<html lang="en">
    

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Review - Octoboss</title>
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

            Header start

        ***********************************-->

        

        <!--**********************************

            Header end ti-comment-alt

        ***********************************-->



        <!--**********************************

            Sidebar start

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

						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						 <li class="breadcrumb-item"><a href="octoboss.php">Review</a></li>
                     <li class="breadcrumb-item active"><a href="javascript:void(0)"> <?php
									  if($id!='' && is_numeric($id)){
									  
									  ?>Edit <?php } else { ?> Add <?php }?></a></li>

					</ol>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-body">
								<div class="modal-body">
								<form name="form1" id="form1" method="post"  onsubmit="return validate(this);" style="margin:0px;" enctype="multipart/form-data">
								
								<h3>Review Details:</h3>
									<div class="form-group">
										<label class="text-black font-w500">Review Person Name : </label>
										<input type="text" class="form-control" name="name" value="<?=$name; ?>">
									</div>
									
									
								<div class="form-group">										
									
									<div class="form-group">
										<label class="text-black font-w500">Email : </label>
										<br>
									<input type="text" name="email" class="form-control" value="<?php echo $email;?>" id="email"  />
									
									</div>
																		
									<div class="form-group">
										<label class="text-black font-w500">Comment : </label>
										<br>
									<textarea name="comment" class="form-control" id="baddress"><?php echo $comment;?></textarea>
									
									</div>
									<div class="form-group">
									<label class="text-black font-w500"> Rating :</label>
										<br>
									<input type="number" name="rate" value="<?php echo $rate;?>" class="form-control" />
									</div>
									<div class="form-group">
									<label class="text-black font-w500"> Designation :</label>
										<br>
									<input type="text" name="degination" value="<?php echo $degination;?>" class="form-control" />
									</div>
									<div class="form-group">
									<label class="text-black font-w500"> Image :</label>
										<br>
											<?php  
									
									if(empty($_REQUEST['id']))
									{
									?>
										<img src="../assest/octbosss.png" style="width:100px; height:100px;">
										
									<?php } else { ?>
									<img src="../<?php echo $image;?>" style="width:100px; height:100px;">
									<?php } ?>
									<input type="file" name="image"class="form-control" />
									<p style="color:red;">Image Size Must be 80X80px</p>

									</div>
									
									<div class="row">
									
										<div class="form-group col-md-6">
										<label class="text-black font-w500"> Published Status :</label>
									 <select name="status" class="form-control">
                                       <option value="1" <?=($publish_status=='1')?'selected':''?>>Published</option>
                                       <option value="0" <?=($publish_status=='0')?'selected':''?>>Not Published</option>
                                    </select>
									
									</div>
									<div class="form-group col-md-6">
										<label class="text-black font-w500"> Status :</label>
										<br>
									 <select name="status" class="form-control">
                                       <option value="1" <?=($status=='1')?'selected':''?>>Active</option>
                                       <option value="0" <?=($status=='0')?'selected':''?>>In-active</option>
                                    </select>
									
									</div>
										
									</div>
									
									<div class="form-group">
									<?php

if($id!='' && is_numeric($id)){

?>

<input type="submit" name="button" id="button" class="btn btn-success" value="Edit" />

<input type="hidden" name="action" value="edit" />

<input type="hidden" name="id" value="<?php echo $id;?>" />

<?php

}

else{

?>

<input type="submit" name="button" class="btn btn-success" id="button" value="Add" />

<input type="hidden" name="action" value="add" />

<?php

}

?>
										
										<input type="button" name="button" class="btn btn-danger" id="button" value="Cancel" onclick="window.location.href='<?php echo $cancel_url;?>';" />
									</div>
									
								</form>
				
 
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
<?php include "include/js.php";?>

    <!-- Circle progress -->
	

<script> <?php 
$country = ($country > 0)?$country:'17';
$bcountry = ($bcountry > 0)?$bcountry:'17';
$scountry = ($scountry > 0)?$scountry:'17';
?>
<??>
$(window).load(function (){
show_state('<?=$bcountry?>','<?=$bstate?>');
show_city('<?=$bstate?>','<?=$bcity?>');

show_state2('<?=$scountry?>','<?=$sstate?>');
show_city2('<?=$sstate?>','<?=$scity?>');

show_state3('<?=$country?>','<?=$state?>');
show_city3('<?=$state?>','<?=$city?>');
});
function show_state(country,state){ 



$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'countryval': country,'state_id': state,'action': 'show_state'},
dataType: 'json',
success: function(data2){


$("#bstate").html(data2);
}, 
error: function(){

}
});

}

function show_city(state,city) {

if(state==""){ $("#city").prop("disabled",true); }else{ $("#city").prop("disabled",false); }
$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'state': state,'city_id': city,'action': 'show_city'},
dataType: 'json',
success: function(data){

$("#bcity").html(data);
}, 
error: function(){

}
});

}

function show_state2(country,state){ 



$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'countryval': country,'state_id': state,'action': 'show_state'},
dataType: 'json',
success: function(data2){


$("#sstate").html(data2);
}, 
error: function(){

}
});

}

function show_city2(state,city) {

if(state==""){ $("#city").prop("disabled",true); }else{ $("#city").prop("disabled",false); }
$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'state': state,'city_id': city, 'action': 'show_city'},
dataType: 'json',
success: function(data){

$("#scity").html(data);
}, 
error: function(){

}
});

}
function show_state3(country,state){ 



$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'countryval': country,'state_id': state,'action': 'show_state'},
dataType: 'json',
success: function(data2){


$("#state").html(data2);
}, 
error: function(){

}
});

}

function show_city3(state,city) {

if(state==""){ $("#city").prop("disabled",true); }else{ $("#city").prop("disabled",false); }
$.ajax({
url : "<?php echo SITE_URL.'/ajax.php'; ?>",
type: "POST",
data: {'state': state,'city_id': city, 'action': 'show_city'},
dataType: 'json',
success: function(data){

$("#city").html(data);
}, 
error: function(){

}
});

}


</script>

</body>

</html>