<?php

include("tracker_help_files/admin_header.php");

protect_admin_page();

$order_id=$_REQUEST['order_id'];

$id=$_REQUEST['id'];



@extract($_POST);

if($action=="send"){

	

		if($id!='' && $id>0){

		

		

			$curr_date=date("Y-m-d H:i:s");

			$updateQry="update courier_details_tbl set 

								`order_id`				='".$order_id."', 

								`subject`					='".$subject."',

								`comp_name`				='".$comp_name."', 

								`comp_url`				='".$comp_url."', 

								`docuket_no`			='".$docuket_no."', 

								`date_of_disp`		='".$date_of_disp."', 

								`exp_del_date`		='".$exp_del_date."' 

								

								where id					='".$id."'

								";

			db_query($updateQry);

			set_sess_msg('Courier details has been updated and emailed successfully');

		

		}

		else

		{

			$curr_date=date("Y-m-d H:i:s");

			$instQry="insert into courier_details_tbl set 

								`order_id`				='".$order_id."', 

								`subject`					='".$subject."',

								`comp_name`				='".$comp_name."', 

								`comp_url`				='".$comp_url."', 

								`docuket_no`			='".$docuket_no."', 

								`date_of_disp`		='".$date_of_disp."', 

								`exp_del_date`		='".$exp_del_date."', 

								`created_at`			='".$curr_date."'							

								";

			db_query($instQry);

			set_sess_msg('Courier details has been saved and emailed successfully');

			

		}

		

		

		

		

		$res=mysqli_fetch_array(db_query("select semail,member_id,order_no from order_tbl where id='".$order_id."'"));

		 $email=$res['semail'];

		 

		 ///

		$member_id=$res['member_id'];

		$memDtl=mysqli_fetch_array(db_query("select fname,mobile_no from user_tbl where id='".$member_id."'"));

		$username=$memDtl['fname'];

		$mobile_no=$memDtl['mobile_no'];

		if($mobile_no!='')

		{

			$uname = ($username!='')?$username:'Member';

			//$msg='Dear '.$uname.' Thanks for your order. Your order no. is '.$res['order_no'].' Thanks Flash Packer Team';

			$d=date('d/m');

			$msg='Dear '.$uname.', your ordered item(s) has been despatched on '.$d.'. The docket number is '.$docuket_no.'. You can track it on '.$comp_url.'. Thanks! Happy Exploring!';

			//send_mobile_sms($mobile_no,$msg);

		}

		//

		 

		 

		

		$To1=trim($email);

		 $From1=admin_from_email();

		 

		 $Subject1="Order No. ".$res['order_no']." has been dispached - ".URL_TEXT;

		

		 

		 $Msg1=courier_mail($order_id); 

		

		 

		 

		 $Headers1 = "From: ".SITE_NAME."<$From1>\n";

		 $Headers1 .= "X-Mailer: PHP/". phpversion();

		 $Headers1 .= "X-Priority: 3 \n";

		 $Headers1 .= "MIME-version: 1.0\n";

		 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 

		 @mail("$To1", "$Subject1", "$Msg1","$Headers1");

		/*End mailing*/

		

		header("Location:".ADMIN."courier_dtl_add_edit.php?order_id=$order_id");

		exit;	

}







$dtl=mysqli_fetch_array(db_query("select * from courier_details_tbl where order_id='".$order_id."'"));

@extract($dtl);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Rapid Collaborate</title>

<link href="<?php echo ADMIN;?>/images/default.css" rel="stylesheet" type="text/css" />

<link href="<?php echo ADMIN;?>/images/include.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo SITE_URL;?>/tracker_help_files/javascript/validation.js"></script>



</head>

<body style="background:#dae3e8">

<div class="bg-black">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ma" style="background: #e9f0f4;">

    <tr>

      <td width="331" class="white treb fs28 lht30 pl20 lht32" style="color: black;">Courier Details </td>

    </tr>

  </table>

</div>



	<div class="required" align="center"><?php echo display_sess_msg();?></div>

	<form name="form1" method="post" action="" onsubmit="return validate(this);">

  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="pt10" style="background: white; border: solid 6px #e9f0f4;">

    <tr>

      <td valign="top">Subject<span class="required">*</span></td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="subject" value="<?php echo $subject;?>" id="NOBLANK~Please enter subject.~DM~"></td>

    </tr>

     <tr>

      <td valign="top">Courier Company<span class="required">*</span></td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="comp_name" value="<?php echo $comp_name;?>" id="NOBLANK~Please enter courier company.~DM~"></td>

    </tr>

    <tr>

      <td valign="top">Courier Company Url</td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="comp_url" value="<?php echo $comp_url;?>">

      <div >[ Ex. : http://www.yahoo.com ]</div>

      </td>

    </tr>

     <tr>

      <td valign="top">Docket No.<span class="required">*</span></td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="docuket_no" value="<?php echo $docuket_no;?>" id="NOBLANK~Please enter docuket no.~DM~"></td>

    </tr>

     <tr>

      <td valign="top">Date of Dispatching</td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="date_of_disp" value="<?php echo $date_of_disp;?>" readonly >

      

      <a onclick="if(self.gfPop)gfPop.fPopCalendar(document.form1.date_of_disp);return false;" href="javascript:void(0)"><img width="35" height="22" border="0" style="vertical-align: middle;" alt="" src="<?php echo SITE_URL?>/tracker_help_files/javascript/calendar/calbtn.gif"></a>

      </td>

    </tr>

     <tr>

      <td valign="top">Expected Date for Delivery</td>

      <td width="1%" valign="top">:</td>

      <td valign="top"><input type="text"  name="exp_del_date" value="<?php echo $exp_del_date;?>" readonly />

      

      <a onclick="if(self.gfPop)gfPop.fPopCalendar(document.form1.exp_del_date);return false;" href="javascript:void(0)"><img width="35" height="22" border="0" style="vertical-align: middle;" alt="" src="<?php echo SITE_URL?>/tracker_help_files/javascript/calendar/calbtn.gif"></a>

      </td>

    </tr>

   

   

    <tr>

    	<td valign="top">&nbsp;</td>

      <td colspan="2" style="padding-left:20px;"><div class="form-button01 mr03 fl">

          <input type="submit" name="button" id="button" value="Save & Send Mail" />

          <input type="hidden" name="action" value="send" />

          <input type="hidden" name="order_id" value="<?php echo $order_id;?>" />

          <input type="hidden" name="id" value="<?php echo $id;?>" />

        </div>

        </td>

    </tr>

   

  </table>

  </form>

  <div style="display:block;">

   <iframe width="11" scrolling="no" height="189" frameborder="0" style="visibility: visible; z-index: 999; position: absolute; top: -500px; left: 467px; width: 11px; height: 172px;" src="<?php echo SITE_URL?>/tracker_help_files/javascript/calendar/themes/Normal/ipopeng.htm" id="gToday:normal:agenda.js" name="gToday:normal:agenda.js"></iframe> </div>

 

</div>

</body></html>

