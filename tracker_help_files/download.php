<?php
include("control.php");

$dir= SITE_URL."/Excel-Format/";
$file=$_REQUEST['doc'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($dir."/".$file));
ob_clean();
flush();
readfile("$dir/$file");
exit;
?>