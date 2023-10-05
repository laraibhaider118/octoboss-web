<?php require_once('tracker_help_files/control.php');



if(isset($_REQUEST['arr_ids'])){

	

	$arr_ids = $_REQUEST['arr_ids'];

	if(is_array($arr_ids)){

		$str_ids = implode(',', $arr_ids);

		if(isset($_REQUEST['Delete'])){

			for($j=0;$j<count($arr_ids);$j++){

				recover_qty($arr_ids[$j]);

			}

			$sql = "update order_tbl set status='2' where id in ($str_ids)";

			db_query($sql);

			set_sess_msg("Selected records have been deleted successfully");

		}

		

		else if(isset($_REQUEST['Paid']) || isset($_REQUEST['Paid_x'])){

			for($i=0;$i<count($arr_ids);$i++)

			{

				$sql = "update order_tbl set status = '1' where id ='".$arr_ids[$i]."'";

				db_query($sql);

				

				reduce_qty($arr_ids[$i]);

				

				/*Mail for seller*/

				//seller_invoice_mail($arr_ids[$i],'noprint');

				/*end mailing*/	

			}

			

			

			set_sess_msg("Selected records have been paid successfully");

		}

		else if(isset($_REQUEST['Pending']) || isset($_REQUEST['Pending_x'])){

			

			$sql = "update order_tbl  set status = '0' where id in ($str_ids)";

			db_query($sql);

			

			set_sess_msg("Selected records have been pending successfully");

		}

		else if(isset($_REQUEST['Shipped']) || isset($_REQUEST['Shipped_x'])){

			

			for($i=0;$i<count($arr_ids);$i++)

			{

				$oid=$arr_ids[$i];

				///

				/*

				$res=mysqli_fetch_array(db_query("select member_id,order_no from order_tbl where id='".$oid."'"));

				

				$member_id=$res['member_id'];

				$memDtl=mysqli_fetch_array(db_query("select fname,mobile_no from tbl_member where id='".$member_id."'"));

				$username=$memDtl['fname'];

				$mobile_no=$memDtl['mobile_no'];

				if($mobile_no!='')

				{

					$uname = ($username!='')?$username:'Member';

					$msg='Dear '.$uname.' Thanks for your order. Your order no. is '.$res['order_no'].' Thanks Flash Packer Team';

					send_mobile_sms($mobile_no,$msg);

				}

				*/

				//

			}

			

			$sql = "update order_tbl  set ship_status = '2',ship_date=now() where id in ($str_ids)";

			db_query($sql);

			

			set_sess_msg("Selected records have been shipped successfully");

		}

		else if(isset($_REQUEST['Unhipped']) || isset($_REQUEST['Unhipped_x'])){

			

			$sql = "update order_tbl  set ship_status = '1' where id in ($str_ids)";

			db_query($sql);

			

			set_sess_msg("Selected records have been unshipped successfully");

		}

		else if(isset($_REQUEST['Delivered']) || isset($_REQUEST['Delivered_x'])){

			

			for($i=0;$i<count($arr_ids);$i++)

			{

				$oid=$arr_ids[$i];

				///

				$res=mysqli_fetch_array(db_query("select member_id,order_no from order_tbl where id='".$oid."'"));

				

				$member_id=$res['member_id'];

				$memDtl=mysqli_fetch_array(db_query("select fullname,phone_number from tbl_member where id='".$member_id."'"));

				$username=$memDtl['fname'];

				$mobile_no=$memDtl['phone_number'];

				if($mobile_no!='')

				{

					$uname = ($username!='')?$username:'Member';

					//$msg='Dear '.$uname.' Thanks for your order. Your order no. is '.$res['order_no'].' Thanks Flash Packer Team';

					$msg='Dear '.$uname.', as per our logistics records, your ordered item(s) has been delivered. We hope to see you again! Thanks! Happy Exploring!';

					//send_mobile_sms($mobile_no,$msg);

				}

				//

			}

			$sql = "update order_tbl  set del_status = '1' where id in ($str_ids)";

			db_query($sql);

			

			set_sess_msg("Selected records have been set as Delivered successfully");

		}

		else if(isset($_REQUEST['Undelivered']) || isset($_REQUEST['Undelivered_x'])){

			

			$sql = "update order_tbl  set del_status = '0' where id in ($str_ids)";

			db_query($sql);

			

			set_sess_msg("Selected records have been set as Undelivered successfully");

		}

		else if(isset($_REQUEST['Sendnewsletter'])){

			//$_SESSION['ids']=$str_ids;

			//header("Location:send_order_newsletter.php");

			//exit;

			$id_arr=$arr_ids;

			for($i=0;$i<count($id_arr);$i++){

				$res=mysqli_fetch_array(db_query("select semail,member_id from order_tbl where id='".$id_arr[$i]."'"));

				$email=get_title_by_id("tbl_member","email","id",$res['member_id']);

				

				 $To1=trim($email);

				 $From1=admin_from_email();

				 

				 $Subject1=$_REQUEST['subject'];

				 

				 $Msg1=$_REQUEST['message']."<br><br>"; 

				

				 $Msg1.="Thanks & Regards,<br>";

				 $Msg1.=SITE_NAME." Team<br><br>";

				 

				 $Headers1 = "From: ".SITE_NAME."<$From1>\n";

				 $Headers1 .= "X-Mailer: PHP/". phpversion();

				 $Headers1 .= "X-Priority: 3 \n";

				 $Headers1 .= "MIME-version: 1.0\n";

				 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 

				 @mail("$To1", "$Subject1", "$Msg1","$Headers1");

				/*End mailing*/

			}

			

			set_sess_msg('Newsletter has been sent successfuly to the selected users.');

			header("Location:".ADMIN."order_list.php");	

			exit;

			

		}

	}

	header("Location: ".$_SERVER['HTTP_REFERER']);

	exit;

}



$from_date=$_REQUEST['from_date'];

$to_date=$_REQUEST['to_date'];



$start = intval($_REQUEST['start']);

$pagesize = intval($_REQUEST['pagesize'])==0?$pagesize=PAGE_SIZE:$_REQUEST['pagesize'];

$columns = "select o.*,od.pre_order ";

$sql = " from order_tbl as o JOIN order_detail_tbl as od on o.id=od.order_id where o.status!='2' and o.order_type='1'";



$qstr='?';

if($_REQUEST['search_key']!=""){

	$sql .=" And (o.id ='$_REQUEST[search_key]')";

	$qstr .="&search_key=".$_REQUEST['search_key'];

}

if($_REQUEST['paid_status']!=""){

	$sql .=" And (o.status ='".$_REQUEST['paid_status']."')";

}

if($_REQUEST['ship_status']!=""){

	$sql .=" And (o.ship_status ='".$_REQUEST['ship_status']."')";

}



if($from_date!=""){

	$sql .=" And date(o.created_at) >='".$from_date."'";

	$qstr .="&from_date=".$_REQUEST['from_date'];

}

if($to_date!=""){

	$sql .=" And date(o.created_at) <='".$to_date."'";

	$qstr .="&to_date=".$_REQUEST['to_date'];

}



if($_GET['pay_mode']!=""){

	$sql .=" And (o.pay_mode='".$_REQUEST['pay_mode']."')";

	$qstr .="&pay_mode=".$_REQUEST['pay_mode'];

}

// $sql_count = "select count(*) ".$sql;

// //$sql .= " group by od.order_id order by o.id desc";

// $sql .= " group by od.order_id order by o.id desc";







// $sql .= " limit $start, $pagesize ";

// $sql = $columns.$sql;

// //echo $sql;

// $result = db_query($sql);

// $reccnt = db_scalar($sql_count);


?>
<!DOCTYPE html><html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Order List</title>
<!-- Favicon icon --><?php include "include/css.php";?>
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
***********************************--><?php include "include/sidebar.php";?>

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
	<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
	<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Enquiry</a></li>
</ol>

</div>
<div class="row">
<div class="col-lg-12">
<?php if(isset($_SESSION['message'])){echo "<div class='col-md-12' style='background: #90eb90';><p style='color: #0b840b;text-align: center;'>".$_SESSION['message']."</p></div>";}unset($_SESSION['message']); ?>

	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			
			   <div id="basicExample1" class="table custom-table">

      <div class=" bg-blue ml03 mr03 pl10"><img src="<?php echo SITE_URL;?>/images/ico-search.png" alt="" class="vam pr04"/>Search Order</div>

      <form name="frm1" id="frm1" method="get" action="<?php echo ADMIN;?><?php echo basename($_SERVER['PHP_SELF']);?>">

      <table width="50%" border="0" align="center" cellpadding="5" cellspacing="0" style="border: solid 6px #e9f0f4;">

          <tr>

            <td width="30%" valign="top">Search by (Order No):</td>

            <td >

            	<input type="text" name="search_key" id="search_key" value="<?php echo $_POST['search_key'];?>" style="padding: 18px 30px;"/>

            	<div style="padding-top:10px;">

            	<select name="pay_mode" class="form-control" id="pay_mode">

            		<option value="">Payment Mode</option>

            		<option value="COD">COD</option>

            		<option value="Payu">Payu</option>

                <option value="Paytm">Paytm</option>

            		<option value="Direct Transfer">Direct Transfer</option>

            		

            	</select>

            	</div>

            	

            	<div style="padding-top:10px;">

            	<select name="paid_status" class="form-control" id="paid_status">

            		<option value="">Paid Status</option>

            		<option value="0">Pending</option>

            		<option value="1">Paid</option>

            		

            	</select>

            	</div>

            	

            	</td>

            </tr>

            <tr>

            <td width="30%" valign="top">From :</td>

            <td><input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo $from_date;?>" style="padding: 18px 30px;" />

	                 
	                  

	                  

	          

            </td>

            </tr>

            <tr>

            <td width="30%" valign="top">To :</td>

            <td><input type="date" class="form-control" name="to_date"  value="<?php echo $to_date;?>"  style="padding: 18px 30px;" />

	                     

            </td>

            </tr>

          <tr>

            <td>&nbsp;</td>

            <td><div class="form-button01 mr03 fl"><input type="submit" name="button" id="button" value="Search" /></div> <div class="form-button01  fl"><input type="button" name="button" id="button" value="View All" onclick="window.location.href='<?php echo ADMIN;?><?php echo basename($_SERVER['PHP_SELF']);?>';" /></div></td>

            </tr>

        </table>

        </form>
		
		</div>
		  <form method="post" name="mainform" id="mainform" onsubmit="confirm_submit(this)">
		  <div class="col-sm-12 butoton">
<div class="form-button01 mr03 fl"><input type="submit" name="Paid" id="Paid" value="Paid" onClick="return validcheck('arr_ids[]','Paid','Record');" /></div>

				<div class="form-button01 mr03 fl"><input type="submit" name="Pending" id="Pending" value="Pending" onClick="return validcheck('arr_ids[]','Pending','Record');" /></div>

				

			<div class="form-button01 mr03 fl"><input type="submit" name="Delivered" id="Delivered" value="Delivered" onClick="return validcheck('arr_ids[]','Delivered','Record');" /></div>

				

			<div class="form-button01 mr03 fl"><input type="submit" name="Undelivered" id="Undelivered" value="Undelivered" onClick="return validcheck('arr_ids[]','Undelivered','Record');" /></div>

			

			

					<div class="form-button01 mr03 fl"><input type="submit" name="Delete" id="Delete" value="Delete" onClick="return validcheck('arr_ids[]','delete','Record');" /></div>

        </div> 
		
				<table class="table table-responsive-lg mb-0 table-striped">
					<thead>
						<tr>
							<th class="">
								<div class="custom-control custom-checkbox mx-2">
									<input type="checkbox" class="custom-control-input" id="checkAll">
									<label class="custom-control-label" for="checkAll"></label>
								</div>
							</th>
							<th>SN.</th>
							<th>Order Details</th>
							<th>Order Price</th>
						
							<th>Pay Mode</th>
							<th class="pl-5 width200">View Details
							</th>
							<th>Order Date</th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody id="customers">			

					<?php

    if($reccnt>0){

      $counter=0;

      $total_amt=0;

      while($res=mysqli_fetch_array($result)){

        $counter++;

        $bgcolor = ($counter%2==0)?"#f1f1f1":"#FFFFFF";

        $curr_symbol=$res['curr_symbol'];

        $preorder=mysqli_num_rows(db_query("select id from order_detail_tbl where order_id='".$res['id']."' and pre_order='1'"));        

        $total_amt +=$res['order_price'];

    		?>
						<tr class="btn-reveal-trigger">
						   <td align="center" ><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?php echo $res['id'];?>" /></td>
						   
							  <td align="center" ><?php echo $counter;?></td>

		      <td >Order No. <?php echo stripslashes($res['order_no']);?>

		      

		      <?php

		      if($preorder>0){

			     	echo '<div class="orange">Pre order ('.$preorder.')</div>'; 

		      }

		      if($res['ip_address']!=''){

			      	echo '<div class="required">IP Address :  '.$res['ip_address'].'</div>'; 

		      }

		      echo '<div style="color:blue;">Name :  '.$res['fullname'].'</div>';

		      echo '<div style="color:blue;">Email Id :  '.get_title_by_id("tbl_member","email","id",$res['member_id']).'</div>';

		      

		      $password=get_title_by_id("tbl_member","password","id",$res['member_id']);

		      if($password=='')

		      {

			     echo '<div style="color:red; font-weight:bold;"> Express Checkout Order</div>';	 

		      }

		      ?>

		      <!--

					<div style="margin-top:10px;margin-bottom:10px;">

					 <a href="<?php echo SITE_URL;?>/admin/shipping_label.php?order_id=<?php echo $res['id'];?>" class="b blue courier">Print Shipping Label</a>

					 

					</div> -->

					

		      <div class="required">

		      <?php

		      $chk_dtl=mysqli_num_rows(db_query("select * from courier_details_tbl where order_id='".$res['id']."'"));

		      $label =($chk_dtl>0)?"View & Update Courier Detail":"Add Courier Details";

		      ?>

		      <a onclick="window.open('<?php echo SITE_URL;?>/courier_dtl_add_edit.php?order_id=<?php echo $res['id'];?>', '_blank', 'scrollbars=1,resizable=1,height=650,width=650');"  class="required courier"><?php echo  $label;?></a>

		      </div>		     

		      </td>

		      <td ><?php echo $curr_symbol.' '.$res['order_price'];?></td>

		    

		      <td >

						<?php

						if($res['pay_mode']=='Payu')

						{

							echo 'Payu';

						}

						elseif($res['pay_mode']=='Paytm')

						{

							echo 'Paytm';

						}

						elseif(strtolower($res['pay_mode'])=='cod')

						{

							echo 'COD';

						}

						elseif(strtolower($res['pay_mode'])=='direct transfer')

						{

							echo 'Direct Transfer';

						}

						else

						{

							echo 'Credit Card';

						}

						

						

						?>

          </td>

		      <td class="blue" align="center"><a  onclick="window.open('<?php echo SITE_URL;?>/tracker_help_files/order-invoice-pop.php?id=<?php echo $res['id'];?>&from=adm', '_blank', 'scrollbars=1,resizable=1,height=650,width=650');"  class="invoice-pop">Click To View</a></td>

		      <td ><?php echo date_format2($res['created_at']);?></td>

		      <td align="center">

		      	<div>

		      	<?php 

		      	if($res['status']=='1'){

			      	echo "Paid";	

		      	}

		      	else{

			      	echo "Pending";	

		      	} 

		      	?>

		      	</div>

		      	

		      
		      	

		      	<div style="padding-top:5px;">

		      		<?php 

			      	if($res['del_status']=='1'){

				      	echo "<span style='color:green;'>Delivered</span>";	

			      	}

			      	else{

				      	echo "<span style='color:red;'>Undelivered</span>";	

			      	} 

			      	?>

		      	

		      	</div>

		      

		      </td>

		   
			  
						</tr>						
						
	<?php } } ?>
	
					<tr>

					<td align="center" bgcolor="#FFFFFF" colspan="10" align="right">

					<?php

					include("tracker_help_files/paging.php");

					?>

					</td>

					</tr>
				
				
					</tbody>
				</table>		
</form>


				<?php		
				if(!empty($_GET['delete_id']))			
				{	
				$id=$_GET['delete_id'];		
				$query_delete=db_query("DELETE FROM `service_enquiry_tbl` WHERE id='$id'");			if($query_delete)			
				{			
			echo "<script>window.location='service_enquiry_list.php';</script> ";		
			$_SESSION['message']="Service Enquiry Data is  Deleted Successfully";	
			}		
			}	
			?>					
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