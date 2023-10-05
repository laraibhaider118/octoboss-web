<?php
include('control.php');
$order_id=$_REQUEST['id'];
if($_REQUEST['from']=="adm")
{
	echo invoice_mail($order_id,$print='yes');exit;
}
else
{
	echo invoice_mail($order_id,$print='yes');exit;
}
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css" media="screen">
<!--
@import url("http://cdn.webrupee.com/font");
-->
</style>
</head>
<body style="font:12px Arial, Helvetica, sans-serif; color:#5e5e5e; margin:0px; padding:0; background:#fff;">

<div style="padding:10px;">
<div style="padding:10px; border-bottom:#cacaca 1px solid;">
<img src="<?php echo SITE_URL;?>/images/logo.png" alt="" style="float:right;">
<div><strong style="color:#000;">Company Address : </strong><br> 410, 4th Floor, Jyoti Shikhar Tower, Ansal API Building, District Center, <br />Janakpuri, New Delhi - 110058 (India)</div>
<div style="clear:both;"></div>
</div>

<div style="padding:10px; border-bottom:#cacaca 1px solid; font:14px Arial, Helvetica, sans-serif; color:#000000;">
      <div style="float:left;"><strong>Invoice No. :</strong> 15616515</div>
      <div style="float:right;"><strong>Invoice Date :</strong> 12 Oct, 2012</div>
      <div style="clear:both;"></div>
  </div>
  
  <div style="padding:10px; color:#000;">
      <div style="float:left;"><strong>Billing Address :</strong>   <br>
      Your name <br>103-B/9, Address one,   Motinagar <br> New Delhi, Delhi, 110059</div>
      <div style="float:right;"><strong>Shipping Address :</strong><br>   
      Your name <br>103-B/9, Address one,   Motinagar <br> New Delhi, Delhi, 110059</div>    
    <div style="clear:both;"></div>
  </div>

<div style="border:#e6cdbb 1px solid; border-radius:5px;">
  <div style="background:#f9f2e4; font-weight:bold; padding:8px;">
      <div style="float:left; width:70%;">Product Details</div>
      <div style="float:left; width:10%;">Qty.</div>
      <div style="float:left; width:14%;">Sub Total</div>
    <div style="clear:both;"></div>
      </div>
      
  <div style="padding:10px; border-bottom:#cacaca 1px solid; background:#FFF;">
        <div style="float:left; width:70%;"> <img src="<?php echo SITE_URL;?>/images/ds-pro1.jpg" alt="" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;">
        <div style="float:left; margin-left:10px; width:67%;">
          <div style="color:#a65301; font-size:16px; text-decoration:none;">Axis II IND Black &amp; Silver Sports Shoes</div>
          <div style="font-size:11px; margin-top:5px;">Code : AG_#234</div>
        <div style="font-size:11px; margin-top:5px;"><strong>Color :</strong> Black, <strong>Size :</strong> 8</div>
        <div style="font-size:12px;">Price : <span style="text-decoration:line-through;"><span class="WebRupee">Rs.</span> 2500.00</span> <strong style="color:#e00606;">$200.00</strong></div>
        <div style="clear:both;"></div>
        </div>
    </div>
        <div style="float:left; width:10%;">5</div>
        <div style="float:left; width:14%; font-size:15px; color:#e00606;"><strong>$200.00</strong></div>
        <div style="clear:both;"></div>
  </div>
  
  <div style="padding:10px; border-bottom:#cacaca 1px solid; background:#FFF;">
        <div style="float:left; width:70%;">
        <img src="<?php echo SITE_URL;?>/images/ds-pro1.jpg" alt="" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;">
<div style="float:left; margin-left:10px; width:67%;">
        <div style="color:#a65301; font-size:16px; text-decoration:none;">Axis II IND Black &amp; Silver Sports Shoes</div>
        <div style="font-size:11px; margin-top:5px;">Code : AG_#234</div>
        <div style="font-size:11px; margin-top:5px;"><strong>Color :</strong> Black, <strong>Size :</strong> 8</div>
        <div style="font-size:12px;">Price : <span style="text-decoration:line-through;"><span class="WebRupee">Rs.</span> 2500.00</span> <strong style="color:#e00606;">$200.00</strong></div>
        <div style="clear:both;"></div>
        </div>
    </div>
        <div style="float:left; width:10%;">5</div>
        <div style="float:left; width:14%; font-size:15px; color:#e00606;"><strong>$200.00</strong></div>
      <div style="clear:both;"></div>
  </div> 
        
</div> 

  <div style="float:left; text-transform:uppercase; text-align:center; margin-top:25px; padding:5px; border-radius:5px; background:#b7610a; color:#FFF;"><a href="#" style="color:#fff; text-decoration:none;"> PRINT Invoice</a></div>
  
  <div style="float:right; width:45%; padding:7px;">
        <div style="width:170px; float:left; padding:5px; text-align:right;">Subtotal :</div>
        <div style="width:80px; float:left; padding:5px; margin-left:10px;">$200.00</div>
        <div style="clear:both;"></div>
        <div style="width:170px; float:left; padding:5px; text-align:right;"">Shipping Charges	:</div>
        <div style="width:80px; float:left; padding:5px; margin-left:10px;">$50.00</div>
        <div style="clear:both;"></div>
        <div style="width:170px; float:left; padding:5px; text-align:right; font:bold 13px Arial, Helvetica, sans-serif; color:#e00606;">Amount Payable :</div>
        <div style="width:80px; float:left; padding:5px; margin-left:10px; font:bold 13px Arial, Helvetica, sans-serif; color:#e00606;">$270.00</div>
      	<div style="clear:both;"></div>
  </div>
        
        <div style="clear:both;"></div>

</div>
</body>
</html>
