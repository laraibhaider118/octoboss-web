<?php
//session_start();
function product_classified($pres) {
	$sess_arr=explode("~",$_SESSION['member']);
$member_id=$sess_arr[0];

	$img1=''; $imgurlpath_small='';

	//$cnt++;
	$dtl_link = get_prod_dtl_link($pres['id']);
	$product_img = $pres['product_image'];

	if(!empty($product_img)){
		$img_arr = explode("~",$product_img);
		$tot_img = count($img_arr);
		$img1 = $img_arr[0];
	}

	$price = $pres['product_price'];
	$dprice = $pres['discount_price'];
	$w=255; $h=291;
	
	$imgpath = UP_FILES_ROOT_PATH."/product_images/".$img1;
	
	if(file_exists($imgpath) && strlen($img1)){
		$sspath = SITE_URL."/uploaded/product_images/".$img1;
		$imgurlpath_small = show_thumb($sspath,$w,$h);
	}else{
		$sspath = SITE_URL."/static/no-image.jpg";
		$imgurlpath_small = show_thumb($sspath,$w,$h);
	}
		
	$wish_list_count = mysqli_num_rows(db_query("select * from wishlist_tbl where member_id='$sess_arr[0]' and product_id='$pres[id]' "));
	?>	

	
	 <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box">
                                <div class="position-relative">
                                    <a href="<?=$dtl_link?>" class="d-block">
                                        <figure><img src="<?=$imgurlpath_small?>" alt=""></figure>
                                    </a>
                                </div>
                                <div class="box-details">
                                    <div class="first">
                                        <a href="<?=$dtl_link?>" class="title text-primary"><?=$pres['product_name']?></a>
                                        <div class="price">
                                            <?php
		if($dprice>0) { ?>
			<span class="f-price text-danger"> <?php echo CURRANCY_SYMBOL.$dprice; ?></span>
			<span class="old-price"><?php echo CURRANCY_SYMBOL.$price; ?></span>
			<? 
		} else { 
			?>
			<span class="f-price text-danger"><?php echo CURRANCY_SYMBOL.$price; ?></span>
			<? 
		} ?>
                                        </div>
                                    </div>
                                
                                    <div class="second">
                                        <a href="<?=$dtl_link?>" class="cart-btn">buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php 

}
function product_old_classified($pres) {
$sess_arr=explode("~",$_SESSION['member']);
$member_id=$sess_arr[0];

	$img1=''; $imgurlpath_small='';

	//$cnt++;
	$dtl_link = get_prod_dtl_link($pres['id']);
	$product_img = $pres['product_image'];

	if(!empty($product_img)){
		$img_arr = explode("~",$product_img);
		$tot_img = count($img_arr);
		$img1 = $img_arr[0];
	}

	$price = $pres['product_price'];
	$dprice = $pres['discount_price'];
	$w=255; $h=291;
	
	$imgpath = UP_FILES_ROOT_PATH."/product_images/".$img1;
	
	if(file_exists($imgpath) && strlen($img1)){
		$sspath = SITE_URL."/uploaded/product_images/".$img1;
		$imgurlpath_small = show_thumb($sspath,$w,$h);
	}else{
		$sspath = SITE_URL."/static/no-image.jpg";
		$imgurlpath_small = show_thumb($sspath,$w,$h);
	}
		
	$wish_list_count = mysqli_num_rows(db_query("select * from wishlist_tbl where member_id='$sess_arr[0]' and product_id='$pres[id]' "));
	?>	
	<div class="col-lg-4 col-md-4 col-sm-6">
	<div class="box">
	<div class="position-relative">
	<!--
	<div class="tags"><span class="sale">Sale</span></div>
	-->
		<? if(!empty($sess_arr[0])){ ?>
		<div class="wishlist-icon <?=($wish_list_count==1)?'active':'';?>" href="javascript:;" data-data="<?=$pres['id']?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="far fa-heart <?=($wish_list_count==1)?'fas':'';?>"></i></div>
			<? } else { ?>
			<a class="wishlist-icon" href="<?=SITE_URL?>/login.htm?ref=my-account/wishlist.htm"  title="Add to Wishlist"><i class="far fa-heart <?=($wish_list_count==1)?'fas':'';?>"></i></a>
		<? } ?>
	<a href="<?=$dtl_link?>" class="d-block"><figure><img src="<?=$imgurlpath_small?>" alt=""></figure></a>
	</div>
	<div class="box-details">
	<div class="first">
	<a href="<?=$dtl_link?>" class="title text-primary"><?php echo $pres['product_name'];?></a>
	<div class="price">
	<?php
	if($dprice>0) { 
		?>
		<span class="f-price text-danger"> <?php echo CURRANCY_SYMBOL.$dprice; ?></span>
		<span class="old-price"><?php echo CURRANCY_SYMBOL.$price; ?></span>
		<? 
	} else { 
		?>
		<span class="old-price"><?php echo CURRANCY_SYMBOL.$price; ?></span>
		<? 
	} 
	?>
	</div>
	</div>
	<div class="second">
	<a href="<?=$dtl_link?>" class="cart-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
	</div>
	</div>
	</div>
	</div>
	<?php
}
?>