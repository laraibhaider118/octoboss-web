<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once('control.php');
include_once('product_classified.php');

$pageno = isset($_REQUEST['pageno'])?$pageno:1;
$pagesize = isset($_REQUEST['pagesize'])?$pagesize:21;
$parent_id = (int)$_REQUEST['parent_id']; //Get By Htaccess
$auto_color_id = $_REQUEST['auto_color_id'];
$auto_size_id = $_REQUEST['auto_size_id'];
$auto_avl = $_REQUEST['auto_avl'];
$auto_prod_order = $_REQUEST['auto_prod_order'];
$keyword = $_REQUEST['keyword'];
$min_price = $_REQUEST['min_price'];
$max_price = $_REQUEST['max_price'];

$start = $pagesize;

if(!empty($pageno)) {
	$start = ($pageno*$pagesize);
}

$sqlstr = "select p.* from product_tbl as p  LEFT JOIN product_size_tbl as ps ON p.id=ps.product_id where p.status='1'";

if($parent_id>0) {
	$sqlstr .=" and p.parent_id='".$parent_id."'";
}
if($auto_color_id>0) {
	$sqlstr .=" and p.color_id='".$auto_color_id."'";
}
if($auto_size_id>0) {
	$sqlstr .=" and ps.size_id='".$auto_size_id."'";
}
if($auto_avl>0) {
	$sqlstr .=" and ps.qty_avl>0";
}
if($keyword!='') {
	$sqlstr .=" and (p.product_name like '%".$keyword."%' || p.product_code like '%".$keyword."%')";
}
if($min_price!='') {
	$sqlstr .=" and p.final_price>='".$min_price."' ";	
}
if($max_price!='') {
	$sqlstr .=" and p.final_price<='".$max_price."' ";	
}
if($s=='newproducts') {
	$sqlstr .=" and is_new='1' ";
}
else if($s=='featuredproducts') {
	$sqlstr .=" and is_feature='1' ";
}
$sqlstr .=" group by p.id";
if($auto_prod_order!='') {
	$sqlstr .="  $auto_prod_order";
}
else {
	$sqlstr .=" order by p.id desc";
}

$product_sql = db_query("$sqlstr limit $start, $pagesize");
$product_cnt = mysqli_num_rows($product_sql);

if($product_cnt>0) {
	$cnt=1;
	while($pres = mysqli_fetch_assoc($product_sql)) {
		product_classified($pres);
	}
}
?>