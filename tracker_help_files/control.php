<?php ob_start(); 
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
ini_set('display_errors', 0);
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('LOCAL_MODE', true);
} else {
 	define('LOCAL_MODE', false);
}

//date_default_timezone_set('Asia/Kolkata');
@putenv("TZ=Asia/Kolkata");
@extract($_POST);
@extract($_GET);
#Root Path
$tmp = dirname(__FILE__);
$tmp = str_replace('\\' ,'/',$tmp);
$tmp = substr($tmp, 0, strrpos($tmp, '/'));
define('SITE_ROOT', $tmp); 
require_once(SITE_ROOT."/tracker_help_files/database.php");
require_once(SITE_ROOT."/tracker_help_files/array.php");
require_once(SITE_ROOT."/tracker_help_files/functions.php");
session_start();
define('SCRIPT_START_TIME', getmicrotime());
#magic_quotes_runtime needs to be "off"
if(get_magic_quotes_runtime()) {
	set_magic_quotes_runtime(0);
}
