<?php
include('tracker_help_files/control.php');

 $disp_dtl=mysqli_fetch_array(db_query("select * from courier_details_tbl where order_id='".$_REQUEST['id']."'"));
 @extract($disp_dtl);
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<title>Welcome to </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="p10">
<div class="p10 bg4 shadow bdr2 radius-3">
  <h1>Order No. <?php echo $_REQUEST['id'];?></h1>
  <p class="mt10"><strong>Logistic Company Name :</strong><br> <?php echo ($comp_name)?$comp_name:'--';?></p>
  <p class="bdrB mt10"></p>
  <p class="mt10"><strong>Docket No. :</strong><br>  <?php echo ($docuket_no)?$docuket_no:'--';?></p>
  <p class="bdrB mt10"></p>
  <p class="mt10"><strong>Date of Dispatching :</strong><br> <?php echo ($date_of_disp!='0000-00-00' && $date_of_disp!='')?date_format3($date_of_disp):'--';?></p>
  <p class="bdrB mt10"></p>
  <p class="mt10"><strong>Expected Delivery Date :</strong><br> <?php echo ($exp_del_date!='0000-00-00' and $exp_del_date!='')?date_format3($exp_del_date):'--';?></p>
  </div>

</body>

<!-- Mirrored from designer.weblink4you.com/online/refer-friend.htm by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 08 Feb 2013 07:30:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
</html>
