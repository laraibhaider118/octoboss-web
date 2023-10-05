<?php
require_once('tracker_help_files/control.php');
require_once('include/conn.php');



$id = $_REQUEST['id'];

$cancel_url = "services.php"; 

@extract($_POST);

if ($action == "add")
{
	$product_name = addslashes($product_name);

    $product_price = addslashes($product_price);

    $product_desc = addslashes($product_desc);

	$status =1;
	
$listing_image2=basename($_FILES['product_image']['name']);

$imageFileType3 =strtolower(pathinfo($listing_image2,PATHINFO_EXTENSION)); 
 $product_image1=time()."_Services.".$imageFileType3; 
 $listing_image1_temp=$_FILES['product_image']['tmp_name'];
 $listing_image1_path="images/services/".$product_image1;
 if(!empty($listing_image2))
 {
     $listing_image1_path2=$listing_image1_path;
 }else
 {
      $listing_image1_path2="images/octbosss.png"; 
 }

$date = date('Y-m-d H:i:s');
$product_price = isset($product_price) ? $product_price : 0;
 move_uploaded_file($listing_image1_temp,$listing_image1_path);
$qrystr = mysqli_query($con,"INSERT INTO `services_tbl`(`product_name`, `product_price`, `product_desc`, `product_image`, `status`,`created_at`) VALUES ('$product_name','$product_price','$product_desc','$listing_image1_path2','$status','$date')");
if(!empty(mysqli_error($con))){
    echo "Error.".mysqli_error($con);
    exit;
}
	 header("Location:".$cancel_url);
	 $_SESSION['message']="Record has been Added successfully.";

        exit;

}

if ($action == "edit" && $id != '' && is_numeric($id))
{
    $listing_image2=basename($_FILES['product_image']['name']);

$imageFileType3 =strtolower(pathinfo($listing_image2,PATHINFO_EXTENSION)); 
 $product_image1=time()."_Services.".$imageFileType3; 
 $listing_image1_temp=$_FILES['product_image']['tmp_name'];
 $listing_image1_path="images/services/".$product_image1;
 if(!empty($listing_image2))
 {
     $listing_image1_path2=$listing_image1_path;
 }else
 {
      $listing_image1_path2="images/octbosss.png"; 
 }
 if(!empty($listing_image2))
 {
    move_uploaded_file($listing_image1_temp,$listing_image1_path);
	$updateQry = "update services_tbl set `product_image`='" . $listing_image1_path2 . "' where id='" . $id . "'"; 
    
    $qrystr = mysqli_query($con,$updateQry);
    if(!empty(mysqli_error($con))){
        echo "Error.".mysqli_error($con);
    exit;
    }  
 }
$updateQry = "update services_tbl set 

`product_name`		='" . $product_name . "', 

`product_price`		='" . $product_price . "',  

`product_desc`='" . $product_desc . "', 
`status`		='" . $status . "'
where id='" . $id . "'"; 

$qrystr = mysqli_query($con,$updateQry);
    if(!empty(mysqli_error($con))){
        echo "Error.".mysqli_error($con);
        exit;
    }
    set_sess_msg('Record has been updated successfully.');

    header("Location:".$cancel_url);
	$_SESSION['message']="Record has been updated successfully.";

    exit;


    
}

if ($id != '' && is_numeric($id))
{

    $page_heading = "Edit Member";

    $res = mysqli_fetch_array(db_query("select * from services_tbl where id='" . $id . "'"));

    @extract($res);

}

else
{

    $page_heading = "Add Member";

}

if ($_POST)
{

    $membership_name = $_POST['membership_name'];

    $price = $_POST['price'];

    $description = $_POST['description'];

    $status = $_POST['status'];

    
} 

?>
<!DOCTYPE html>
<html lang="en">
    

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Octoboss - Octoboss</title>
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
						 <li class="breadcrumb-item"><a href="services.php">Services</a></li>
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
								<form method="post" enctype='multipart/form-data'>
									<div class="form-group">
										<label class="text-black font-w500">Services Name</label>
										<input type="text" class="form-control" name="product_name"value="<?php echo $product_name;?>">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Desperction</label><textarea class="ckeditor"  name="product_desc"><?php echo $product_desc;?></textarea>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Price (in CAD)</label><input type="text" class="form-control" name="product_price"value="<?php echo $product_price;?>  ">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Choose Images</label><br>
									<?php  
									
									if(empty($_REQUEST['id']))
									{
									?>
										<img src="images/octbosss.png" style="width:100px; height:100px;">
										
									<?php } else { ?>
									
									<img src="<?php echo $product_image;?>" style="width:100px; height:100px;">
									<?php } ?>
									
										<input type="file" class="form-control" name="product_image">
									</div>
																		
									<div class="form-group">
								   <label class="text-black font-w500">Status</label>
                                    <select name="status" class="form-control">
                                       <option value="1" <?=($status=='1')?'selected':''?>>Active</option>
                                       <option value="0" <?=($status=='0')?'selected':''?>>In-active</option>
                                    </select>
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