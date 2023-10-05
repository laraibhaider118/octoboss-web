<?php 
// if(!defined('LOCAL_MODE')) 
// {
// 	die('<span style="font-family: tahoma, arial; font-size: 11px">database file cannot be included directly');
// }
$con = mysqli_connect('localhost','noqtamar_admin','GnoPDK%V,S*z','noqtamar_admin');
define('APPURL', 'https://admin.noqta-market.com/new/');	
include "Firebase.php";
date_default_timezone_set('Asia/Karachi');
if(!function_exists('get_config')){
	function get_config($name=null){
		global $con;
		$sql = "SELECT * FROM config where name = '$name'";
		$query = mysqli_query($con,$sql);
		$num_rows = mysqli_num_rows($query);
		if($num_rows==0){
			return mysqli_error($con);
		}else{
			$result = mysqli_fetch_assoc($query);
			return isset($result['value']) ? $result['value'] :'';
		}
	}
}
if (LOCAL_MODE) 
{    
	$ARR_CON["db_host"] = 'localhost';
	$ARR_CON["db_name"] = 'noqtamar_admin';
	$ARR_CON["db_user"] = 'noqtamar_admin';
	$ARR_CON["db_pass"] = 'GnoPDK%V,S*z';
	define('SUB_PATH', '/');	
    define('SITE_URL', 'https://admin.octo-boss.com'.SUB_PATH);
} 
else
{
	$ARR_CON["db_host"] = 'localhost';
	$ARR_CON["db_name"] = 'noqtamar_admin';
	$ARR_CON["db_user"] = 'noqtamar_admin';
	$ARR_CON["db_pass"] = 'GnoPDK%V,S*z'; 
	define('SUB_PATH', '/');	
    define('SITE_URL', 'https://admin.octo-boss.com'.SUB_PATH);
}
define('UP_FILES_ROOT_PATH', SITE_ROOT.'/uploaded');
define('UP_FILES_URL_PATH', SITE_URL.'/uploaded');
define('THUMB_CACHE_DIR', 'thumb_cache');
define('SITE_NAME', 'octoboss');
define('SITE_TITLE', 'octoboss');
define('URL_TEXT',SITE_URL);
define('DEF_PAGE_SIZE','10');
define('CURRANCY_SYMBOL', '$ ');
define('CURRANCY', 'INR');
define('PAGE_SIZE', 30);
define('TOTAL_IMAGE', 7);
define('ADMIN',SITE_URL."/");
define('ORD_PREFIX','OD');
define('THUMB_CACHE_DIR', 'thumb_cache');
define('SITE_NAME', 'octoboss');
define('SITE_TITLE', 'octoboss');
define('URL_TEXT',SITE_URL);
define('DEF_PAGE_SIZE','10');
define('CURRANCY_SYMBOL', 'Rs. ');
define('CURRANCY', 'INR');
define('PAGE_SIZE', 30);
define('TOTAL_IMAGE', 7);
define('ORD_PREFIX','OD');
define('ORD_START','300000');
$curr_date=date('Y-m-d H:i:s');
define('CURR_DATE',$curr_date);
define('THUMB_W','223');
define('THUMB_H','134');
