<?php
require_once('tracker_help_files/control.php');
//protect_admin_page();
$id = $_REQUEST['id'];
$cancel_url = "membership.php"; 
@extract($_POST);
if ($action == "add")
{
	$membership_name = addslashes($membership_name);
    $price = addslashes($price);
    $description = addslashes($description);
    $duration = addslashes($duration);
    $status = addslashes($status);
    $qrystr = db_query("INSERT INTO `membership_table`(`membership_name`, `price`, `description`, `status`,`duration`) VALUES ('$membership_name','$price','$description','$status','$duration')");
	 header("Location:".$cancel_url);
	 $_SESSION['message']="Record has been Added successfully.";
        exit;
}
if ($action == "edit" && $id != '' && is_numeric($id))
{
  $updateQry = "update membership_table set 
`membership_name`		='" . $membership_name . "', 
`price`		='" . $price . "', 
`description`		='" . $description . "',  
`description`				='" . $description . "', 
`duration`				='" . $duration . "' 
where id='" . $id . "'";
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
    $res = mysqli_fetch_array(db_query("select * from membership_table where id='" . $id . "'"));
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
    $duration = $_POST['duration'];
    $status = $_POST['status'];
    
} 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Customer - Octoboss</title>
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
                     <li class="breadcrumb-item"><a href="membership.php">Membership</a></li>
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
                                 <h3>Membership Details :</h3>
                                 <div class="form-group">
                                    <div class="form-group">
                                       <label class="text-black font-w500">Membership Name :</label>
                                       <input type="text" class="form-control" name="membership_name" value="<?=$membership_name; ?>">
                                    </div>
                                    <?php echo $email;?>
                                 </div>
                                
                                 <div class="form-group">
                                    <label class="text-black font-w500">Price</label>
                                    <input type="text" class="form-control" name="price" value="<?=$price; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label class="text-black font-w500">Description</label>
                                    <input type="text" class="form-control" name="description" value="<?= $description ?>">
                                 </div>
								  <div class="form-group">
                                    <label class="text-black font-w500">Duration</label>
									<select name="duration" class="form-control">
									<?php for($i=1;$i<=12; $i++)
									{
									?>
										<option value="<?php echo $i; ?>" <?php if($i==$duration){ echo "selected";} ?>><?php echo $i." Months"; ?></option>
									<?php } ?>
									</select>
                                    
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
     
   </body>
</html>