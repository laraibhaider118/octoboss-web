<?php include('control.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to <?php echo SITE_NAME;?> admin panel</title>
<link href="<?php echo ADMIN;?>images/default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN;?>images/include.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN;?>fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var site_url='<?php echo SITE_URL;?>/';
</script>
<script src="<?php echo ADMIN;?>jquery.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN;?>jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ADMIN;?>ajax2.js"></script>
<script type="text/javascript" src="<?php echo ADMIN;?>ajax3.js"></script>
<script type="text/javascript" src="<?php echo ADMIN;?>ajax4.js"></script>
</head>

<div class="bg-black">
  <table width="980" border="0" cellspacing="0" cellpadding="0" class="ma">
    <tr>
      <td width="331" class="white"><span class="treb fs28 lht30"><a href="<?php echo ADMIN;?>"><?php echo SITE_NAME;?></a></span>&nbsp;&nbsp;&nbsp;<strong>Admin Panel</strong></td>
      <td align="right"><?php if(!empty($_SESSION['sess_admin_id'])){echo "Welcome Admin";}?>
      &nbsp;|&nbsp; <a href="<?php echo SITE_URL;?>" target="_blank" class="white">Go to Website</a>
      </td>
      <?php
      if($_SESSION['sess_admin_id']==''){
      ?>
	      <td width="350">
	      	<div class="nav-grey ar"><a href="<?php echo ADMIN;?>" class="act"><span>Login</span></a></div></td>
	      
      <?php
    	}
    	else{
	    	?>
	    	 <td width="350">
     
	      <div class="nav-grey ar"> <a href="<?php echo ADMIN;?>logout.php" class="act"><span>Logout</span></a></div></td>
	    	<?php	
    	}
      ?>
      
    </tr>
  </table>
</div>