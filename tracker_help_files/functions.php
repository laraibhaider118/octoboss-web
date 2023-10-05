<?php 
function validate_user(){
	if($_SESSION['sess_stud_id']==''){
		$_SESSION['pageName']=$_SERVER['REQUEST_URI'];
		$_SESSION['sess_msg'] = "You are not logged in. Kindly login first to view the same. Please <a href='login.php?back=".urlencode(str_replace("/sangrock/","",$_SERVER['REQUEST_URI']))."' class='txtSmall BlueTxt'><strong>click here</strong></a> to login.";
		header("Location:msg.php");
		exit;
	}
}
function connect_db_old()
{
	global $ARR_CON;
	if (!isset($GLOBALS['dbcon'])) {
		$GLOBALS['dbcon'] =	@mysql_connect($ARR_CON["db_host"], $ARR_CON["db_user"], $ARR_CON["db_pass"]);
		@mysql_select_db($ARR_CON["db_name"]) or die("Could not connect to database. Please check configuration and ensure MySQL is running.");
	}
}
function connect_db()
{
	global $ARR_CON;
	if (!isset($GLOBALS['dbcon'])) {
		$GLOBALS['dbcon'] =	@mysqli_connect($ARR_CON["db_host"], $ARR_CON["db_user"], $ARR_CON["db_pass"]);
		@mysqli_select_db($GLOBALS['dbcon'],$ARR_CON["db_name"]) or die("Could not connect to database. Please check configuration and ensure MySQL is running.");
	}
}
function db_insert_id(){
	$dbcon2	= $GLOBALS['dbcon'];
	return $dbcon2 -> insert_id;
}
function db_query($sql, $dbcon2 = null)
{
	if($dbcon2==''){
		if(!isset($GLOBALS['dbcon'])) {
			connect_db();
		}
		$dbcon2	= $GLOBALS['dbcon'];
	}
	$time_before_sql = checkpoint();
	$result	= mysqli_query($dbcon2, $sql) or die(db_error($sql));
	return $result;
}
function get_title_by_id($tbl,$fld,$wherefld,$whrereval){
	$res=mysqli_fetch_array(db_query("select $fld from $tbl where $wherefld='".$whrereval."'"));
	return ucfirst(stripslashes($res[0]));
}
function get_star_name($rate){
$arr = array("0"=>"Very Very Bad","1"=>"Very  Bad","2"=>"Bad","3"=>"Good","4"=>"Very Good","5"=>"Excellant");
return $arr[$rate];
}
function db_scalar($sql, $dbcon2 = null)
{
	if($dbcon2==''){
		if(!isset($GLOBALS['dbcon'])) {
			connect_db();
		}
		$dbcon2	= $GLOBALS['dbcon'];
	}
	$result	= db_query($sql, $dbcon2);
	if ($line =	mysqli_fetch_array($result))	{
		$response =	$line[0];
	}
	$line =	$response;//mysqli_num_rows($result);
	return $line;
}
function getmicrotime()
{
	list($usec,	$sec) =	explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
function checkpoint($from_start = false)
{
	global $PREV_CHECKPOINT;
	if($PREV_CHECKPOINT==''){
		$PREV_CHECKPOINT = SCRIPT_START_TIME;
	}
	$cur_microtime = getmicrotime();
	
	if($from_start) {
		return $cur_microtime - SCRIPT_START_TIME;
	} else {
		$time_taken = $cur_microtime - $PREV_CHECKPOINT;
		$PREV_CHECKPOINT = $cur_microtime;
		return $time_taken;
	}
}
function db_error($sql)
{
	echo "<div style='font-family: tahoma; font-size: 11px; color: #333333'><br>".mysqli_error()."<br>";
	print_error();
	if(LOCAL_MODE) {
		echo "<br>sql: $sql";
	}
	echo "</div>";
}
function print_error() {
	$debug_backtrace = debug_backtrace();
	for ($i = 1; $i < count($debug_backtrace); $i++) {
		$error = $debug_backtrace[$i];
		echo "<br>";
		echo "<div>";
		echo "<b>File:</b> ".$error['file']."<br>";
		echo "<b>Line:</b> ".$error['line']."<br>";
		echo "<b>Function:</b> ".$error['function']."<br>";
		echo "</div>";
	}
}
function date_format1($date)
{
	$time=strtotime($date);
	$date=date("d-m-y",$time);
	return $date;
}
function date_format2($date)
{	
	$time=strtotime($date);
	$date=date("F d, Y h:i a",$time);
	return $date;
}
function date_format3($date)
{
	$time=strtotime($date);
	$date=date("M d, Y",$time);
	return $date;
	
}
function date_format4($date)
{
	$time=strtotime($date);
	$date=date("M d, Y h:i a",$time);
	return $date;
}
function date_format5($date)
{
	$time=strtotime($date);
	$date=date("d/m/Y [h:i a]",$time);
	return $date;
}
function make_http_url($url)
{
	$parsed_url	= parse_url($url);
	if ($parsed_url['scheme'] == '') {
		return 'http://' . $url;
	} else {
		return $url;
	}
}
function get_qry_str($over_write_key = array(),	$over_write_value =	array())
{
	global $_GET;
	$m = $_GET;
	if (is_array($over_write_key)) {
		$i = 0;
		foreach($over_write_key	as $key) {
			$m[$key] = $over_write_value[$i];
			$i++;
		}
	} else {
		$m[$over_write_key]	= $over_write_value;
	}
	$qry_str = qry_str($m);
	return $qry_str;
}
function qry_str($arr, $skip = '')
{
	$s = "?";
	$i = 0;
	foreach($arr as	$key =>	$value)	{
		if ($key !=	$skip) {
			if (is_array($value)) {
				foreach($value as $value2) {
					if ($i == 0) {
						$s .= $key . '[]=' . $value2;
						$i = 1;
					} else {
						$s .= '&' .	$key . '[]=' . $value2;
					}
				}
			} else {
				if ($i == 0) {
					$s .= "$key=$value";
					$i = 1;
				} else {
					$s .= "&$key=$value";
				}
			}
		}
	}
	return $s;
}
function is_post_back(){
	if(count($_POST)>0) {
		return true;
	} else {
		return false;
	}
}//free shippinh for delhi/ncr
function make_thumb_gd($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $quality = 60, $verbose = false)
{ 
	// options for ratio type = width|height|distort|crop
	// get image info (0 width and 1 height, 2 is (1 = GIF, 2 = JPG, 3 = PNG)
	$size = @getimagesize($imgPath); 
	// break and return false if failed to read image infos
	if (!$size) {
		if ($verbose) {
			echo "Unable to read image info.";
		}
		return false;
	} 
	$curWidth	= $size[0];
	$curHeight	= $size[1];
	$fileType	= $size[2];
	
	// width/height ratio
	$ratio =  $curWidth/$curHeight;
	$srcX = 0;
	$srcY = 0;
	$srcWidth = $curWidth;
	$srcHeight = $curHeight;
	if($ratio_type=='width') {
		
		if($newWidth > $curWidth) {
			$newWidth = $curWidth;
		}
		$newHeight	= $newWidth / $ratio;
	}else if($ratio_type=='crop') {
		$thumbRatio = $newWidth / $newHeight;
		if($ratio < $thumbRatio) {
			$srcHeight = round($curHeight*$ratio/$thumbRatio);
			$srcY = round(($curHeight-$srcHeight)/2);
		} else {
			$srcWidth = round($curWidth*$thumbRatio/$ratio);
			$srcX = round(($curWidth-$srcWidth)/2);
		}
	} else if($ratio_type=='height') {
		
		if($newHeight > $curHeight) {
			$newHeight = $curHeight;
		}
		$newWidth	= $newHeight * $ratio;
	} else if($ratio_type=='distort') {
	}
	
	
	switch ($fileType) {
		case 1:
			if (function_exists("imagecreatefromgif")) {
				$originalImage = imagecreatefromgif($imgPath);
			} else {
				if ($verbose) {
					echo "GIF images are not support in this php installation.";
					return false;
				}
			} 
			$fileExt = 'gif';
			break;
		case 2: 
			$originalImage = imagecreatefromjpeg($imgPath);
			$fileExt = 'jpg';
			break;
		case 3: 
			$originalImage = imagecreatefrompng($imgPath);
			$fileExt = 'png';
			break;
		default:
			if ($verbose) {
				echo "Not a valid image type.";
			}
			return false;
	} 
	// create new image
	$resizedImage = imagecreatetruecolor($newWidth, $newHeight);
	$fileExt=strtolower($fileExt);
	imagecopyresampled($resizedImage, $originalImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight);
	switch ($fileExt) {
		case 'gif':
			imagegif($resizedImage, $destPath, $quality);
			break;
		case 'jpg': 
			imagejpeg($resizedImage, $destPath, $quality);
			break;
		case 'png': 
			imagepng($resizedImage, $destPath, 9);
			break;
	} 
	
	return true;
} 
function show_thumb($file_org, $width, $height, $ratio_type = 'width')
{
	if(preg_match('/(gif|png|jpeg|jpg)/', file_ext($file_org), $matches)){
	$file_name = str_replace(SITE_URL."/", "", $file_org);
	$file_name = str_replace("/", "_", $file_name);
	$cache_file = $width."x".$height.'__'.$ratio_type .'__'.$file_name;
	$file_fs_path = str_replace(SITE_URL, SITE_ROOT, $file_org);
	if(!is_file(SITE_ROOT."/".THUMB_CACHE_DIR."/".$cache_file)) {
		make_thumb_gd($file_fs_path, SITE_ROOT."/".THUMB_CACHE_DIR."/".$cache_file, $width, $height, $ratio_type );
	}	
	return SITE_URL."/".THUMB_CACHE_DIR."/".$cache_file;
	}else{
	  return $file_org;
	}
}
function file_ext($file_name)
{
	$path_parts = pathinfo($file_name);
	$ext = strtolower($path_parts["extension"]);
	return $ext;
}
function array_dropdown( $arr, $sel_value='', $name='', $extra='', $choose_one='', $arr_skip= array())
{
	$combo="<select name='$name' id='$name' $extra >";
	if($choose_one!=''){
		$combo.="<option value=\"\">$choose_one</option>";
	}
	foreach($arr as $key => $value)
	{
		if(is_array($arr_skip) && in_array($key, $arr_skip)) {
			continue;
		}
		$combo.='<option value="'.htmlspecialchars($key).'"';
		if(is_array($sel_value)) {
			if(in_array($key, $sel_value) || in_array(htmlspecialchars($key), $sel_value)) {
				$combo.=" selected ";
			}
		} else {
			if($sel_value==$key || $sel_value==htmlspecialchars($key)) {
				$combo.=" selected ";
			}
		}
		//if($value)
		$combo.=" >$value</option>";
	}	
	$combo.=" </select>";
	return $combo;
}
function pagesize_dropdown($name, $value)
{
	$arr = array('10'=>'10','50'=>'50','100'=>'100','150'=>'150','999999999'=>'All Records');
	$m = $_GET;
	unset($m['pagesize']);
	return array_dropdown($arr, $value , $name, ' class="pagesize_dropdown"  onchange="location.href=\''.$_SERVER['PHP_SELF'].qry_str($m).'&pagesize=\'+this.value" ');
}
function pagesize_dropdown_product($name, $value,$pagesize=30)
{
	$arr = array($pagesize=>$pagesize,'30'=>'30','50'=>'50','100'=>'100','150'=>'150','999999999'=>'All Records');
	$m = $_GET;
	unset($m['pagesize']);
	return array_dropdown($arr, $value , $name, ' class="w120p fs11 txtbox p2"  onchange="location.href=\''.$_SERVER['PHP_SELF'].qry_str($m).'&pagesize=\'+this.value" ');
}
function pagesize_dropdown_front($name, $value)
{
	$arr = array('15'=>'15','50'=>'50','100'=>'100','150'=>'150','999999999'=>'All Records');
	$m = $_GET;
	unset($m['pagesize']);
	return array_dropdown($arr, $value , $name, ' class="w120p fs11 txtbox p2"  onchange="location.href=\''.$_SERVER['PHP_SELF'].qry_str($m).'&pagesize=\'+this.value" ');
}
function admin_email(){
	$sql=db_query("select * from admin_tbl where id='1'");
	$result=mysqli_fetch_array($sql);
	$email=$result['user_email'];
	return $email;	
}
function admin_from_email(){
	$sql=db_query("select * from admin_tbl where id='1'");
	$result=mysqli_fetch_array($sql);
	$email=$result['from_email'];
	if($email=='')
	{
		$email=$result['user_email'];
	}
	
	return $email;	
}
function check_user_session($session_name,$url,$user_type=''){
	if(!!empty($_SESSION[$session_name])){
		$redi_url=SITE_URL."/".$url;
		?>
		<script type="text/javascript">window.location.href='<?=$redi_url?>';</script>
		<?
		exit;	
	}
}
function admin_address(){
	$admin_address=mysqli_fetch_array(db_query("select site_address from admin_tbl where id='1'"));
	$add=nl2br($admin_address['admin_address']);	
	return $add;
}
function country_code_dropdown($val,$india=''){
	$sql="select * from countries where 1";
	
	$sql .=" order by name";
	$qry=db_query($sql);
	if($india==''){
		$var='<option value="">Country Code</option>';
	}
	while($res=mysqli_fetch_array($qry)){
		if(!empty($val)){
			$ccsel =(trim($res['phonecode'])==$val)?$ccsel="selected":$ccsel="";
		}
		$var .='<option value="'.$res['phonecode'].'" '.$ccsel.'>'.$res['name'].' ('.$res['phonecode'].')</option>';
	}
	return $var;
}
function country_list_dropdown($val,$india=''){
	$sql="select * from countries where 1";
	
	$sql .=" order by name";
	$qry=db_query($sql);
	if($india==''){
		$var='<option value="">Choose Country</option>';
	}
	while($res=mysqli_fetch_array($qry)){
		if(!empty($val)){
			$ccsel =(trim($res['id'])==$val)?$ccsel="selected":$ccsel="";
		}
		$var .='<option value="'.$res['id'].'" '.$ccsel.'>'.$res['name'].'</option>';
	}
	return $var;
}
function getResult($tblname,$field,$fieldval,$select_fields=''){
	$selfield = ($select_fields=='')?"*":$select_fields;
	$res=mysqli_fetch_array(db_query("select $selfield from $tblname where $field='".$fieldval."'"));
	return $res;
}
function real_escape($val){
	$v=mysql_real_escape_string($val);
	return $v;	
}
function strip($val){
	$v=stripslashes($val);
	return $v;	
}
function country_name($id){
	$r=mysqli_fetch_array(db_query("select name from countries where id='".$id."'"));	
	return $r[0];
}
function brand_name($id){
	$r=mysqli_fetch_array(db_query("select brand_name from brand_tbl where id='".$id."'"));	
	return $r[0];
}
function user_address($id){
	$result=db_query("select * from user_tbl where id='$id'");
	$line_raw=mysqli_fetch_array($result);
	$country_name=country_name($line_raw['bcountry']);
	
	$bstate=state_name($line_raw[bstate]);
	$bcity=city_name($line_raw[bcity]);
	
	if(!empty($line_raw['b_other_state'])){
			$bstate=$line_raw['b_other_state'];
	}
	
		$var="$line_raw[baddress], $bcity, $bstate, $country_name, $line_raw[bzip]";
	
	return $var;	
}
function billing_address($id){
	$result=db_query("select * from user_tbl where id='$id'");
	$line_raw=mysqli_fetch_array($result);
	$country_name=country_name($line_raw[bcountry]);
	$bstate=state_name($line_raw[bstate]);
	$bcity=city_name($line_raw[bcity]);
	
	if(!empty($line_raw['b_other_state'])){
			$bstate=$line_raw['b_other_state'];
	}
		$var="$line_raw[bname] <br>$line_raw[blname] <br>$line_raw[bphone] <br> $line_raw[bemail]  <br>$line_raw[baddress] <br> $line_raw[bappartment]<br>$bcity, $bstate, $country_name, $line_raw[bzip]";
	
	return $var;	
}
function shipping_address($id){
	$result=db_query("select * from user_tbl where id='$id'");
	$line_raw=mysqli_fetch_array($result);
	$country_name=country_name($line_raw[scountry]);
	
	$sstate=state_name($line_raw[sstate]);
	$scity=city_name($line_raw[scity]);
	
	//$sstate=$line_raw['sstate'];
	
	if(!empty($line_raw['s_other_state'])){
			$sstate=$line_raw['s_other_state'];
	}
	
	$var="$line_raw[sname]<br>$line_raw[slname] <br>$line_raw[sphone]<br>   $line_raw[semail] <br>$line_raw[saddress]<br> $line_raw[sappartment]<br>$scity, $sstate, $country_name,$line_raw[szip]";
	return $var;	
}
function order_shipping_address($order_id){
	$result=db_query("select * from order_tbl where id='$order_id'");
	$line_raw=mysqli_fetch_array($result);
	$country_name=country_name($line_raw[scountry]);
	
	
	
	
	if(!empty($line_raw['s_other_state'])){
			$sstate=$line_raw['s_other_state'];
	}
	
	$sstate=state_name($line_raw[sstate]);
	$scity=city_name($line_raw[scity]);
	$var="$line_raw[fullname]<br>$line_raw[sphone]<br>$line_raw[saddress]<br>$scity, $sstate, $country_name,$line_raw[szip]";
	return $var;	
}
function order_billing_address($order_id){
	
	$result=db_query("select * from order_tbl where id='$order_id'");
	$line_raw=mysqli_fetch_array($result);
	$country_name=country_name($line_raw[bcountry]);
	
	if(!empty($line_raw['b_other_state'])){
			$bstate=$line_raw['b_other_state'];
	}
	
	$bstate=state_name($line_raw[bstate]);
	$bcity=city_name($line_raw[bcity]);
	
	
		$var="$line_raw[fullname]<br>$line_raw[bphone] <br>$line_raw[baddress]<br>$bcity, $bstate, $country_name, $line_raw[bzip]";
	
	return $var;		
}
function protect_admin_page(){
	if($_SESSION['sess_admin_id']==''){
		header("Location:".ADMIN);
		exit;	
	}	
}
function fck_content($filedname,$dbfiledval){
	# CKEditor: / CKFinder
  # user page: fill content into editor textarea
  print '<textarea id="'.$filedname.'" name="'.$filedname.'" cols="50" rows="10">';
  print $dbfiledval;
  print '</textarea>';
 
  print '<script type="text/javascript">';
 
  # CKEditor: define CKEditor
  print 'var editor = CKEDITOR.replace("'.$filedname.'");';
  # html generation: full HTML page (with <html>, <head> and <body> tags)
  print 'CKEDITOR.config.fullPage = false;';
  # toolbar: define toolbar
  print "CKEDITOR.config.toolbar =" .
        "[" .
          "['Source','-','Save','-','Preview','-','Templates']," .          
          "['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt']," .
          "['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']," .
          "['Link','Unlink','Anchor']," .
          "['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']," .
          "['ShowBlocks']," .
          "'/'," .
          "['Styles','Format','Font','FontSize']," .
          "['TextColor','BGColor']," .
          "['Bold','Italic','Underline','Strike','-','Subscript','Superscript']," .
          "['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']," .
          "['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']," .
        "];";
  # Automaticaly enable the "show block" command when the editor loads.
  print 'CKEDITOR.config.startupOutlineBlocks = false;';
  # CKFinder: define CKFinder
  print 'CKFinder.SetupCKEditor(editor, "ckfinder/");';
  # CKEditor: maximize CKEditor
  print 'CKEDITOR.on("instanceReady", function(evt) {evt.editor; editor.execCommand("minmize");});';
  print '</script>';	
}
function fck_content_sml($filedname,$dbfiledval){
	# CKEditor: / CKFinder
  # user page: fill content into editor textarea
  print '<textarea id="'.$filedname.'" name="'.$filedname.'" cols="50" rows="10">';
  print $dbfiledval;
  print '</textarea>';
 
  print '<script type="text/javascript">';
 
  # CKEditor: define CKEditor
  print 'var editor = CKEDITOR.replace("'.$filedname.'");';
  # html generation: full HTML page (with <html>, <head> and <body> tags)
  print 'CKEDITOR.config.fullPage = false;';
  # toolbar: define toolbar
  print "CKEDITOR.config.toolbar =" .
        "[" .
          "['TextColor','BGColor']," .
          "['Bold','Italic','Underline','Strike','-','Subscript','Superscript']," .
          "['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']," .
          "['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']," .
        "];";
  # Automaticaly enable the "show block" command when the editor loads.
  print 'CKEDITOR.config.startupOutlineBlocks = false;';
  # CKFinder: define CKFinder
  print 'CKFinder.SetupCKEditor(editor, "ckfinder/");';
  # CKEditor: maximize CKEditor
  print 'CKEDITOR.on("instanceReady", function(evt) {evt.editor; editor.execCommand("minmize");});';
  print '</script>';	
}
function set_sess_msg($msg)
{
 $_SESSION['sess_msg']=$msg;
}
function display_sess_msg()
{
 if($_SESSION['sess_msg']!='')  {
  echo '<div class="red">';
  echo "<br>".$_SESSION['sess_msg'];
  unset($_SESSION['sess_msg']) ;
  $_SESSION['sess_msg']=''; 
  echo "</div>";
   }
}
function get_page_content($page_id){
  if($page_id!='' && $page_id!=0){
   $text	=	mysqli_fetch_array(db_query("select full_desc from content_tbl where id='$page_id'"));
   $text1=$text['full_desc'];
  //$text	=	ms_form_value($text);
  }else{
   $text1="&nbsp;";
  }
  return $text1;
}
function dactive_child($pid){
	$qry=db_query("select id from category_tbl where parent_id='$pid'");
	$num=mysqli_num_rows($qry);
	if($num>0){
		while($res=mysqli_fetch_array($qry)){
			$num2=mysqli_num_rows(db_query("select product_id from tbl_product where parent_id='".$res['id']."'"));
			if($num2>0){
				db_query("update tbl_product set active_status='Inactive' where parent_id='".$res['id']."'");	
			}
			db_query("update category_tbl set cat_status='0' where parent_id='".$pid."'");
		}			
	}
	else{
		$qry=db_query("select product_id from tbl_product where parent_id='$pid'");
		$num=mysqli_num_rows($qry);
		if($num>0){
			db_query("update tbl_product set active_status='Inactive' where parent_id='".$pid."'");
		}
	}
	db_query("update category_tbl set cat_status='0' where id='".$pid."'");	
}
function file_validation($type,$path){
    $image_data = fopen($path, "rb");
    $header_bytes = fread($image_data, 8);
    fclose ($image_data);
    if($type=='image'){
	
		if (!strncmp ($header_bytes, "\xFF\xD8", 2))
			$file_format = "JPEG";
		else if (!strncmp ($header_bytes, "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A", 8))
			$file_format = "PNG";
		else if (!strncmp ($header_bytes, "BM", 2))
        	$file_format = "BMP";
		else if (!strncmp ($header_bytes, "GIF", 3))
        	$file_format = "GIF";
	}
	if($type=='video'){
		 if (!strncmp ($header_bytes, "\x30\x26\xB2\x75\x8E\x66\xCF\x11", 8))
			$file_format = "WMV";
		else if (!strncmp ($header_bytes, "\x49\x44\x33", 3))
			$file_format = "MP3";
		else if (!strncmp ($header_bytes, "\x00\x00\x00\x18\x66\x74\x79\x70", 8))
			$file_format = "MP4";
		else if (!strncmp ($header_bytes, "\x46\x4C\x56\x01", 4))
			$file_format = "FLV";
	}
	
	if($type=='text'){
		 if (!strncmp ($header_bytes, "\x7B\x5C\x72\x74\x66\x31", 4))
			$file_format = "RTF";
		else if (!strncmp ($header_bytes, "\x50\x4B\x03\x04\x14\x00\x06\x00", 8))
			$file_format = "DOCX";
		
		else if (!strncmp ($header_bytes, "\x25\x50\x44\x46", 4))
			$file_format = "PDF";
	}
    
	if($type=='zip'){
    	 if (!strncmp ($header_bytes, "\x50\x4b\x03\x04", 4))
        	$file_format = "ZIP";
	}	
   
    	if($file_format=='')
        	$file_format = 0;
    
	return $file_format;
}
function func_setImageToSize($dirNm, $imgParams, $imageName, $w1, $h1) { 
    #echo "$dirNm, $imgParams, $imageName, $w1, $h1";
	if(!empty($imageName) and $size = @GetImageSize("$dirNm/$imageName")) {
	    if($size[0]>$w1 and $size[1]>$h1) {
            $width = $size[0] - $w1;
            $height = $size[1] - $h1;
            if($width>$height) $wh= " width=$w1";
            else $wh= " height=$h1";
        }
        elseif ($size[0]>$w1) $wh =" width=$w1";
        elseif ($size[1]>$h1) $wh =" height=$h1";
        else $wh= " width=$size[0] height=$size[1]";
        $vParams="";
        if(!empty(trim($imgParams))) $vParams="$imgParams";
        //echo "==".$dirNm."/".$imageName;
		$imgSRC = "<img src=\"$dirNm/$imageName\" $wh height=\"$h1\" border=0 GALLERYIMG='no' $vParams /> ";
    }
    return $imgSRC;
}
function site_address(){
	$site_address=mysqli_fetch_array(db_query("select admin_address from admin_tbl where id='1'"));
	$add=nl2br($site_address[admin_address]);	
	return $add;
}
function substring($content,$limit){
	$content=strip_tags(stripslashes($content));	
	if(strlen($content) > $limit){
		$content=substr($content,0,$limit)."...";	
	}
	return $content;
}
function substring1($content,$limit){
	$content=strip_tags(stripslashes($content));	
	if(strlen($content) > $limit){
		$content=substr($content,0,$limit);	
	}
	return $content;
}
/*************** function for creating thumnail ******************/
class SimpleImage {
   
   var $image;
   var $image_type;
 
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }   
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }   
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;   
   }      
}
function notice_board_type_dropdown($name,$sel){
	$notice_board=array(
						"0"=>"All",
						"1"=>"All Writers",
						"2"=>"All Students",
						"3"=>"Individual Notice"
	);
	$var='<option value="">Select one</option>';
	foreach($notice_board as $key=>$val){
		$sell = ($key==$sel)?"selected":"";
		$var .='<option value="'.$key.'" '.$sell.' >'.$val.'</option>';
	}
	return $var;
}
function member_type_dropdown($name,$sel,$extra){
	$member_type=array(
						"0"=>"Writers",
						"1"=>"Students"
	);
	$var='<select name="'.$name.'" '.$extra.'><option value="" selected>Select one</option>';
	foreach($member_type as $key=>$val){
		
		$sel = ($key==$sel && $sel!='')?"selected":"";
		$var .='<option value="'.$key.'" '.$sel.' >'.$val.'</option>';
	}
	$var .='</select> <span class="required">*</span>';
	return $var;
}
function member_dropdown($name,$sel,$arr){
	
	$var='<select name="'.$name.'" id="NOBLANK~Please select member.~DM~" style="width:150px;"><option value="" selected>Select one</option>';
	foreach($arr as $key=>$val){
		
		$sel1 = ($key==$sel && $sel!='')?"selected":"";
		$var .='<option value="'.$key.'" '.$sel1.' >'.$val.'</option>';
	}
	$var .='</select> <span class="required">*</span>';
	return $var;
}
function specialization_dropdown($sel_arr){
	$arr=array("Marketing","Finance","Human Resource","Information Technology","Operations Management","Engineering - Mechanical","Engineering - Civil","Engineering - Electrical","Engineering - IT","Education","Social Sciences","Political Science","Accounts","Corporate Finance","Banking and Insurance","Trainings and human resource development","Supply chain and logistics","Bio Technology","Life Sciences","Dental Sciences","Agriculture and farming","Soil and water technology","Fire Engineering","Oil and petroleum","Statistics","English","Literature","Consumer research","International Business","Retail operations","Technology and communications","Electronics and wireless communication","Architecture","Construction","Software Design and testing");
	sort($arr);
	$arr[]="Other";
	$tot=count($arr);
	//$var='<option value="">Select One</option>';
	$var='';
	for($i=0;$i<$tot;$i++){
		if(is_array($sel_arr)){
			$sel = (in_array($arr[$i],$sel_arr))?"selected":"";
		}
		$var .='<option value="'.$arr[$i].'" '.$sel.'>'.$arr[$i].'</option>';	
	}
	return $var;
}
function priority_dropdown($selval){
	$arr=array("High","Medium","Low");
	
	$var='<option value="">Select One</option>';
	
	$tot=count($arr);
	for($i=0;$i<$tot;$i++){
		$sel = ($arr[$i]==$selval)?"selected":"";
		$var .='<option value="'.$arr[$i].'" '.$sel.'>'.$arr[$i].'</option>';	
	}
	return $var;
}
function subcat_counter($parent_id){
	$sqlstr="select id from category_tbl where parent_id='".$parent_id."' and status!='2'";
	$qry=db_query($sqlstr);
	$num=mysqli_num_rows($qry);
	if($num>0)
	$num = str_pad($num,2,0,STR_PAD_LEFT);
	return $num;
}
function product_counter($parent_id){
	$sqlstr="select id from product_tbl where parent_id='".$parent_id."' and status!='2'";
	$qry=db_query($sqlstr);
	$num=mysqli_num_rows($qry);
	if($num>0)
	$num = str_pad($num,2,0,STR_PAD_LEFT);
	return $num;
}
function dateDiff($start, $end) {
  $start_ts = strtotime($start);
  $end_ts = strtotime($end);
  $diff = $end_ts - $start_ts;
  return round($diff / 86400);
}
function task_complete_confirmation_mail($id){
	$res=mysqli_fetch_array(db_query("select * from task_assign_tbl where id='".$id."'"));
	
	$stDtl=mysqli_fetch_array(db_query("select name,user_name,user_email from student_tbl where id='".$res['student_id']."'"));
	
  $writerDtl=mysqli_fetch_array(db_query("select name,user_name,user_email from writer_tbl where id='".$res['student_id']."'"));
  $task_title=get_title_by_id("task_tbl","task_title","id",$res['task_id']);
  
  #Auto Mail For Writers
	 $To1=trim($writerDtl['user_email']);
	 $From1=admin_email();
	 
	 $Subject1="Task Completed..";
	 $Msg1="Dear <b>".$writerDtl['name']."</b>,<br><br>"; 
	 $Msg1 .="Task has been completed. Task details are under below : <br><br>";
	 
	 $Msg1 .="<strong>Project Title</strong> : $task_title<br><br>";
	 $Msg1 .="<strong>Task Title</strong> : $res[task_subtitle]<br><br>";
	 $Msg1 .="<strong>Priority</strong> : $res[task_priority]<br><br>";
	 $Msg1 .="<strong>Deadline</strong> : ".date_format3($res[task_deadlines])."<br><br>";
	 $Msg1 .="<strong>Description</strong> : ".$res[task_description]."<br><br>";
	 
	 
	 $Msg1.="<strong>Thanks & Regards,</strong><br>";
	 $Msg1.=SITE_NAME." Team<br><br>";
	
	 
	 $Headers1 = "From: ".SITE_NAME."<$From1>\n";
	 $Headers1 .= "X-Mailer: PHP/". phpversion();
	 $Headers1 .= "X-Priority: 3 \n";
	 $Headers1 .= "MIME-version: 1.0\n";
	 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	 @mail("$To1", "$Subject1", "$Msg1","$Headers1");	
	#End of Mailing
	
	#Auto Mail For Student
	 $To2=trim($stDtl['user_email']);
	 $From2=admin_email();
	 
	 $Subject2="Task Completed..";
	 $Msg2="Dear <b>".$stDtl['name']."</b>,<br><br>"; 
	 $Msg2 .="Task has been completed. Task details are under below : <br><br>";
	 
	 $Msg2 .="<strong>Project Title</strong> : $task_title<br><br>";
	 $Msg2 .="<strong>Task Title</strong> : $res[task_subtitle]<br><br>";
	 $Msg2 .="<strong>Priority</strong> : $res[task_priority]<br><br>";
	 $Msg2 .="<strong>Deadline</strong> : ".date_format3($res[task_deadlines])."<br><br>";
	 $Msg2 .="<strong>Description</strong> : ".$res[task_description]."<br><br>";
	 
	 
	 $Msg2.="<strong>Thanks & Regards,</strong><br>";
	 $Msg2.=SITE_NAME." Team<br><br>";
	 
	 $Headers2 = "From: ".SITE_NAME."<$From2>\n";
	 $Headers2 .= "X-Mailer: PHP/". phpversion();
	 $Headers2 .= "X-Priority: 3 \n";
	 $Headers2 .= "MIME-version: 1.0\n";
	 $Headers2 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	 @mail("$To2", "$Subject2", "$Msg1","$Headers2");	
	#End of Mailing
  
}
function backendpage_nav($catID,$nomain=''){
	$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$catID'"));
	$flag=0;
	$catparent=$catID;
	while($flag!=1){
		$res1=db_query("select * from category_tbl where id='$catparent'");
		$record=mysqli_fetch_array($res1);
		if($record[parent_id]!=0){
			$catparent=$record[parent_id];
			$array.="$record[id]~";
		}else{
			if($record[id]!=""){
				$array.="$record[id]~";
			}
			$flag=1;
		}
	}
	$arr=explode("~",$array);
	$result = array_reverse($arr);
	//$result = $arr;
	if($nomain==''){
		echo "<a href='category_list.php' class='required'>Main Category</a> &raquo;";
	}
	for($i=1;$i<count($result);$i++){
		$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$result[$i]'"));
		$re=db_query("select * from category_tbl where parent_id='$res[id]'");
		if(mysqli_num_rows($re)!=0){
			if($i<count($result)-1){
   			$arrow= ' &raquo; ';
			}
			else{
				$arrow='';
			}
			if(strlen($arrow)>1){
				echo "  <a href='subcat_list.php?parent_id=".$res[id]."' class='required'>".ucwords(strtolower(stripslashes($res[cat_name])))."</a> ";
				
				echo $arrow;
					
			}
			else{
				echo " <span style='font-weight:bold;'>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
				echo $arrow;
			}
			
			
		}
		else{
			echo " <span style='font-weight:bold;'>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
		}
		
	}
}
function front_cat_nav($catID){
	//echo "<a href='categories.htm'>All Products</a> ";
	$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$catID'"));
	$flag=0;
	$catparent=$catID;
	while($flag!=1){
		$res1=db_query("select * from category_tbl where id='$catparent'");
		$record=mysqli_fetch_array($res1);
		if($record[parent_id]!=0){
			$catparent=$record[parent_id];
			$array.="$record[id]~";
		}else{
			if($record[id]!=""){
				$array.="$record[id]~";
			}
			$flag=1;
		}
	}
	$arr=explode("~",$array);
	$result = array_reverse($arr);
	//$result = $arr;
	echo '<a href="categories.htm">Categories</a>';
	for($i=1;$i<count($result);$i++){
		$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$result[$i]'"));
		$re=db_query("select * from category_tbl where parent_id='$res[id]'");
		if(mysqli_num_rows($re)!=0){
			if($i<count($result)-1){
   			$arrow= ' <b>&gt;</b> ';
			}
			else{
				$arrow='';
			}
			if(strlen($arrow)>1){
				//$link=SITE_URL."/sub-categories.htm?cat_id=".$res['id'];
				$link=cat_link($res['id']);
				echo "<a href='".$link."'>".ucwords(strtolower(stripslashes($res['cat_name'])))."</a>";
				
				//echo $arrow;
					
			}
			else{
				echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
				$link=cat_link($res['id']);
				//echo "<a href='".$link."'>".ucwords(strtolower(stripslashes($res['cat_name'])))."</a>";
				//echo $arrow;
			}
			
			
		}
		else{
			echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
			
			/*$link=cat_link($res['id']);
				echo "<a href='".$link."'>".ucwords(strtolower(stripslashes($res['cat_name'])))."</a>";
				echo $arrow;*/
		}
		
	}
}
function cat_nav($catID){
	$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$catID'"));
	$flag=0;
	$catparent=$catID;
	while($flag!=1){
		$res1=db_query("select * from category_tbl where id='$catparent'");
		$record=mysqli_fetch_array($res1);
		if($record[parent_id]!=0){
			$catparent=$record[parent_id];
			$array.="$record[id]~";
		}else{
			if($record[id]!=""){
				$array.="$record[id]~";
			}
			$flag=1;
		}
	}
	$arr=explode("~",$array);
	$result = array_reverse($arr);
	//$result = $arr;
	
	for($i=1;$i<count($result);$i++){
		$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$result[$i]'"));
		$re=db_query("select * from category_tbl where parent_id='$res[id]'");
		if(mysqli_num_rows($re)!=0){
			if($i<count($result)-1){
   			$arrow= ' &raquo; ';
			}
			else{
				$arrow='';
			}
			if(strlen($arrow)>1){
				echo ucwords(strtolower(stripslashes($res[cat_name])));
				
				echo $arrow;
					
			}
			else{
				echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
				echo $arrow;
			}
			
			
		}
		else{
			echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
		}
		
	}
}
function forum_backendpage_nav($catID){
	$res=mysqli_fetch_array(db_query("select * from forum_category_tbl where id='$catID'"));
	$flag=0;
	$catparent=$catID;
	while($flag!=1){
		$res1=db_query("select * from forum_category_tbl where id='$catparent'");
		$record=mysqli_fetch_array($res1);
		if($record[parent_id]!=0){
			$catparent=$record[parent_id];
			$array.="$record[id]~";
		}else{
			if($record[id]!=""){
				$array.="$record[id]~";
			}
			$flag=1;
		}
	}
	$arr=explode("~",$array);
	$result = array_reverse($arr);
	//$result = $arr;
	echo "<a href='forum_category_list.php' class='required'>Main Category</a> &raquo;";
	for($i=1;$i<count($result);$i++){
		$res=mysqli_fetch_array(db_query("select * from forum_category_tbl where id='$result[$i]'"));
		$re=db_query("select * from forum_category_tbl where parent_id='$res[id]'");
		if(mysqli_num_rows($re)!=0){
			if($i<count($result)-1){
   			$arrow= ' &raquo; ';
			}
			else{
				$arrow='';
			}
			if(strlen($arrow)>1){
				echo "  <a href='forum_subcat_list.php?parent_id=".$res[id]."' class='required'>".ucwords(strtolower(stripslashes($res[cat_name])))."</a> ";
				
				echo $arrow;
					
			}
			else{
				echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
				echo $arrow;
			}
			
			
		}
		else{
			echo " <span>".ucwords(strtolower(stripslashes($res[cat_name])))."</span> ";
		}
		
	}
}
function month_drop_down($selval){
	$arr = Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');	
	
	$var='<option value="">Month</option>';
	
	$tot=count($arr);
	for($i=0;$i<$tot;$i++){
		$sel = ($arr[$i]==$selval)?"selected":"";
		$var .='<option value="'.$arr[$i].'" '.$sel.'>'.$arr[$i].'</option>';	
	}
	return $var;
	
}
function year_drop_down($selval){
	$var='<option value="">Year</option>';
	
	$tot=count($arr);
	for($i=date('Y');$i<date('Y')+2;$i++){
		$sel = ($i==$selval)?"selected":"";
		$var .='<option value="'.$i.'" '.$sel.'>'.$i.'</option>';	
	}
	return $var;
	
}
function get_shipping(){
	
	if($_SESSION['shipping_id']>0)
	{
			$res=mysqli_fetch_array(db_query("select shipping_price from shipping_tbl where id='".$_SESSION['shipping_id']."' and status='1'"));	
		
		return $res[0];
	}
	else
	{
		return "0";	
	}
	
	
}
function banner_pos_dropdown($selval){
		
	
	$arr = Array('1'=>'Home Page Slider (1600px X 666px)','2'=>'Products Page Slider (1600px X 666px)','3'=>'Our Client Page (300px X 300px)','4'=>'Gallery Page (300px X 300px)','5'=>'Home Page Offer (1600px X 666px)');	
	
	$var='<option value="">Banner Position</option>';
	
	$html = '';
	foreach($arr as $key=>$val){
		$sel = ($key==$selval)?"selected":"";
		$html .='<option value="'.$key.'" '.$sel.'>'.$val.'</option>';	
	}
	return $html;
	
}
function gallery_pos_dropdown($selval){
		
	
	$arr = Array('4'=>'Gallery Page (1000 X 1000px)');	
	
	$var='<option value="">Select Page</option>';
	
	$html = '';
	foreach($arr as $key=>$val){
		$sel = ($key==$selval)?"selected":"";
		$html .='<option value="'.$key.'" '.$sel.'>'.$val.'</option>';	
	}
	return $html;
	
}
function show_inside_banner(){
	$bqry=db_query("select * from banner_tbl where status='1' and ban_position='3' order by rand() limit 0,1");
   
	if(mysqli_num_rows($bqry)>0){
		while($bres=mysqli_fetch_array($bqry)){
			$product_img=$bres['banner_image'];
			if(strlen($product_img) && file_exists(UP_FILES_ROOT_PATH."/banner_images/".$product_img)){
							$img=$product_img;
						
						
						$dd="uploaded/banner_images";
						$imgParams='alt="" title=""';$imgW=773;$imgH=138;
						$img_55=func_setImageToSize($dd, $imgParams, $img, $imgW, $imgH);
						$url=$bres['ban_url'];
						if($url!=''){
							if(!strstr($url,"http://")){
								$url="http://".$url;								
							}
							$var='<a href="'.$url.'">'.$img_55.'</a>';
							return $var;
						}
						else{
							return $img_55;
						}
						
			}
		}
	}
		
}
function seller_invoice_mail($order_id,$print='yes')
{
	
	$qry=db_query("select seller_id from order_detail_tbl where order_id='".$order_id."' group by seller_id");
	if(mysqli_num_rows($qry) > 0)
	{
		
		while($res=mysqli_fetch_array($qry))
		{
			$seller_dtl=mysqli_fetch_array(db_query("select comp_name,email from user_tbl where id='".$res['seller_id']."'"));
			
			
			
			$mail_content=	seller_invoice_mail_content($res['seller_id'],$order_id,$print,'yes');
			
			//echo $mail_content;exit;
			
			#mail for seller
			$To1=$seller_dtl['email']; 
			$From1=admin_from_email();
			$Subject1="Order Summery Mail From ".SITE_NAME;
			$Msg1.=$mail_content;
			
			$Headers1 = "From: ".SITE_NAME." \n";
			//$Headers2 = "From: ".SITE_NAME."<$From1>\n";
			$Headers1 .= "X-Mailer: PHP/". phpversion();
			$Headers1 .= "X-Priority: 3 \n";
			$Headers1 .= "MIME-version: 1.0\n";
			$Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n";
			@mail("$To1", "$Subject1", "$Msg1","$Headers1");
			/*End mailing*/
			
		}	
	}
	
}
function apply_awbno($order_id)
{
	
	$qry=db_query("select seller_id from order_detail_tbl where order_id='".$order_id."' group by seller_id");
	if(mysqli_num_rows($qry) > 0)
	{
		
		while($res=mysqli_fetch_array($qry))
		{
			$awbno_res=mysqli_fetch_array(db_query("select awbno from awbno_tbl where status='1' and used_status='2' limit 0,1"));
    		$awbno=$awbno_res['awbno'];
    		
    		$oqry=db_query("select id,order_id from order_detail_tbl where order_id='".$order_id."' and seller_id='".$res['seller_id']."'");
   
    
		    while($ores=mysqli_fetch_array($oqry))
		    {	
			    
			    $order_nores=mysqli_fetch_array(db_query("select order_no from order_tbl where status!='2' and id='".$ores['order_id']."'"));
			    $order_no=$order_nores['order_no'];
			     if($awbno!='')
			     {
				     db_query("update order_detail_tbl set awbno='".$awbno."' where id='".$ores['id']."'");
				     
				     db_query("update awbno_tbl set used_status='1',order_no='".$order_no."',used_date='".date('Y-m-d H:i:s')."' where awbno='".$awbno."'");
			     }	   
		    }
		}
		
	}
    
}
function seller_invoice_mail_content($seller_id,$order_id,$print='yes',$mailprint='')
{
	$res=mysqli_fetch_array(db_query("select * from order_tbl where status!='2' and id='".$order_id."'"));
	
	$seller_dtl=mysqli_fetch_array(db_query("select *  from user_tbl where id='".$seller_id."'"));
	
	$order_no=$res['order_no'];
	
	
    $awbnores=mysqli_fetch_array(db_query("select awbno from order_detail_tbl where order_id='".$order_id."' and seller_id='".$seller_id."'"));
    $awbno=$awbnores['awbno'];
	
	$var='
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
<div style="float:left;"><img src="'.SITE_URL.'/images/flash-packer-sml.jpg" alt="" ></div>
<div style="float:right; width:40%; color:#000;">
          <div><strong>Order No. :</strong> '.$order_no.'</div>
          <div style="margin-top:3px;"><strong>Vendor Name :</strong> '.stripslashes($seller_dtl['comp_name']).'</div>
          <div style="margin-top:3px;"><strong>Vendor Tin No. :</strong> '.stripslashes($seller_dtl['cst_no']).'</div>
          </div>
<div style="clear:both;"></div>
</div>
<div style="padding:10px; border-bottom:#cacaca 1px solid; font:14px Arial, Helvetica, sans-serif; color:#000000;">
      <div><strong>Order Placement Date :</strong> '.date_format3($res['created_at']).'</div>
  </div>
  
  <div style="padding:10px; color:#000;">
      <div style="font:bold 16px Arial, Helvetica, sans-serif; color:#000;">Shipping Details </div>
      
    <div style="margin-top:2px;">'.order_shipping_address($order_id).'</div>
    <div style="margin-top:2px;">Contact No.: '.$res['sphone'].'</div>
  </div>';
  if($awbno!='')
  {
  $var .='
  <div style="padding:10px; color:#000;">
  '.show_barcode($awbno).'
  </div>';
	}
  $var .='
<div style="border:#e6cdbb 1px solid; border-radius:5px;">
  <div style="background:#f6f1dd; font-weight:bold; color:#333; padding:8px;">
      <div style="float:left; width:70%;">Product Details</div>
      <div style="float:left; width:15%;">Quantity</div>
      <div style="float:left; width:14%;">Sub Total</div>
    <div style="clear:both;"></div>
      </div>';
      
  $oqry=db_query("select * from order_detail_tbl where order_id='".$order_id."' and seller_id='".$seller_id."'");
    $cnt=0;
    $sub_total=0;
    
      while($ores=mysqli_fetch_array($oqry))
      {	
	     
	      	
	      $cnt++;			
				$prodDtl=mysqli_fetch_array(db_query("select * from product_tbl where id='".$ores['product_id']."'"));
				
				 $dtl_link=get_prod_dtl_link($prodDtl['id']);
				//End of Code Block
				$prodName=stripslashes($prodDtl['product_name']);
					
			
					
					
					
					$product_img=$prodDtl['product_image'];
					if(strlen($product_img)){
						$img_arr=explode("~",$product_img);
						$tot_img=count($img_arr);
						for($i=0;$i<$tot_img;$i++){
							if(strlen($img_arr[$i]) && file_exists(UP_FILES_ROOT_PATH."/product_images/".$img_arr[$i])){
								$img=$img_arr[$i];
								break;
							}
						}
					}    
      
  $var .='<div style="padding:10px; border-bottom:#cacaca 1px solid; background:#FFF;">
        <div style="float:left; width:70%;"> ';
        
        $dirpath=SITE_ROOT."/uploaded/product_images/".$img;
		  		if(strlen($img) && file_exists($dirpath))
		  		{
		    		$sspath=SITE_URL."/uploaded/product_images/".$img;
		    		$imgurlpath_small=show_thumb($sspath,"120","72");
		    		
		    		$var .='<img src="'.$imgurlpath_small.'" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;"  width="120" height="72" />';
		    		
		  		}
		  		else
		  		{
		    		$var .='<a href="'.$dtl_link.'" target="_blank"><img src="'.SITE_URL.'/tracker_help_files/noimg.jpg" alt="" width="120" height="72" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;" /></a>';	
		  		}
        
        $var .='<div style="float:left; margin-left:10px; width:67%;">
          <div style="color:#333; font-size:16px; text-decoration:none;">'.stripslashes($prodDtl[product_name]).'</div>
          <div style="font-size:11px; margin-top:5px;">Code : '.$prodDtl["product_code"].'</div>
        <div style="clear:both;"></div>
        </div>
    </div>
    		<div style="float:left; width:15%; font-size:15px; color:#e00606;"><strong>'.$ores[product_quantity].'</strong></div>
        
        
        <div style="float:left; width:14%; font-size:15px; color:#e00606;"><strong><span class="WebRupee">Rs.</span>'.display_price($ores[product_price]).'</strong></div>
        <div style="clear:both;"></div>
  </div>';
  $sub_total +=$ores[product_quantity]*$ores[product_price];
	}
  
 $var.='        
</div> ';
	if($print=='yes'){
  $var .='<div style="float:left; text-transform:uppercase; text-align:center; margin-top:25px; padding:5px; border-radius:5px; background:#b7610a; color:#FFF;"><a href="javascript:void(0);" onClick="window.print();" style="color:#fff; text-decoration:none;"> PRINT Invoice</a></div>';
	}
	
	if($mailprint=='yes'){
  $var .='<div style="float:left; text-transform:uppercase; text-align:center; margin-top:25px; padding:5px; border-radius:5px; background:#b7610a; color:#FFF;"><a href="'.SITE_URL.'/index.htm?iprint=yes&id='.$order_id.'" style="color:#fff; text-decoration:none;"> PRINT Invoice</a></div>';
	}
	
	
	$s=db_query("select * from order_tbl where order_no='".$order_no."'");
    
    $orderdtl=mysqli_fetch_array($s);
    $paymode=$orderdtl['pay_mode'];
    if(strtolower($paymode)=='cod')
    {
	  $paymode="Cash on Delivery";  
    }
    
    
    
    $seller_address='<div><b>Name :</b>'.$seller_dtl['fullname'].'</div>';
    $seller_address .='<div><b>Company Name :</b>'.$seller_dtl['comp_name'].'</div>';
    $seller_address .='<div><b>Email :</b>'.$seller_dtl['email'].'</div>';
    $seller_address .='<div><b>Phone :</b>'.$seller_dtl['phone'].'</div>';
		      	$seller_address .='<div style="margin-top:5px;"><b>Mobile :</b>'.$seller_dtl['mobile_no'].'</div>';
			      $seller_address .='<div style="margin-top:5px;"><b>Address :</b>'.$seller_dtl['address'].'</div>';
			      $seller_address .='<div style="margin-top:5px;"><b>City :</b>'.$seller_dtl['city'].'</div>';
			      $seller_address .='<div style="margin-top:5px;"><b>State :</b>'.$seller_dtl['state'].'</div>';
			      $seller_address .='<div style="margin-top:5px;"><b>Post Code  :</b>'.$seller_dtl['zip_code'].'</div>';
			      $seller_address .='<div style="margin-top:5px;"><b>Country :</b>'.country_name($seller_dtl['country']).'</div>';
    
  $var .='<div style="float:right; width:45%; padding:7px; color:#333; font-size:15px; font-weight:bold;">
        <div style="width:170px; float:left; padding:5px; text-align:right;">Subtotal :</div>
        <div style="width:120px; float:left; padding:5px; margin-left:10px;"><span class="WebRupee">Rs.</span>'.price_format($sub_total).'</div>
        <div style="clear:both;"></div>
        
        
        <div style="width:170px; float:left; padding:5px; text-align:right; font:18px Arial, Helvetica, sans-serif; color:#e00606;">Grand Total :</div>
        <div style="width:120px; float:left; padding:5px; margin-left:10px; font:18px Arial, Helvetica, sans-serif; color:#e00606;"><span class="WebRupee">Rs.</span>'.price_format($sub_total).'</div>
      	<div style="clear:both;"></div>
  </div>
        
        <div style="clear:both;"></div>
        
        <div style="margin-top:10px; font-weight:bold; font-size:14px; color:#000;">Payment Mode: '.$paymode.'</div>
    
    <div style="margin-top:15px; font-style:italic;">Please note this is a computer generated invoice and does not need any signature<br /> For any further details, please drop in a mail at <a href="mailto:'.admin_email().'" class="red">'.admin_email().'</a></div>
    
    
   
    <div style="margin-top:10px; text-align:center;">
    <div style="font-size:16px; font-weight:bold; color:#000; padding:7px; background:#ddd;">Shipping Details :</div>
    <div style="font-size:14px; font-weight:bold; color:#000; margin-top:5px;">Order No. : '.$order_no.'</div>
    <div style="font-size:14px; font-weight:bold; color:#000; margin-top:5px;">Payment Mode: '.$orderdtl['pay_mode'].'</div>
    <div style=" text-transform:uppercase; font-weight:bold; color:#000; margin-top:20px;">Customer Details (Delivery Address)</div>
    
    <div class="mt5" style="font-size:14px;">'.$orderdtl['sname'].'</div>
    <div class="mt2" style="font-size:14px;">'.$orderdtl['saddress'].', '.$orderdtl['scity'].', '.$orderdtl['sstate'].', '.$orderdtl['szip	'].'</div>
    <div class="mt2" style="font-size:14px;">Contact No.: '.$orderdtl['sphone'].'</div>
    
    ';
    if($awbno!='')
	  {
	  $var .='
	  <div style="padding:10px; color:#000;">
	  '.show_barcode($awbno).'
	  </div>';
		}
    $var.='
    </div>
    
    <div style="margin-top:20px; text-align:right;">
    <div style=" font:bold 16px Arial, Helvetica, sans-serif; color:#000;">If undelivered, return to :</div>    
    <div style="margin-top:2px;">'.$seller_address.'</div>
    </div>
</div>
</body>
</html>
	
	';
	
	return $var;
	
}
function invoice_mail($order_id,$print='yes'){ 
	
	$res=mysqli_fetch_array(db_query("select * from order_tbl where status!='2' and id='".$order_id."'"));
	@extract($res);
	
	$order_no=$res['order_no'];
	
	$coupon_code=$res['coupon_code'];
	if($coupon_code!=''){
		$coupondtl=mysqli_fetch_array(db_query("select * from coupon_tbl where coupon_code='".$coupon_code."'"));
		
		if($coupondtl['use_type']=="S"){
			db_query("update coupon_tbl set status='0' where id='".$coupondtl['id']."'");
			
		}
	}
	
	$admindtl=mysqli_fetch_array(db_query("select * from admin_tbl where id='1'"));
	
	$subtotal=$order_price-$total_shipping_price;
	
	if($print!='noprint'){
	$var='<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<title></title>
</head>
<body style="font:12px Arial, Helvetica, sans-serif; color:#5e5e5e; margin:0px; padding:0; background:#fff;">';
}
$var .='
<div style="padding:10px;">
<div style="background:#000; padding:5px; text-align:center; line-height:0px;"><img src="'.SITE_URL.'/images/hindustan-made.png" width="100" alt=""></div>
<div style="padding:10px; border-bottom:#cacaca 1px solid;">
<div>
<div style="font-size:36px; font-weight:bold; color:#000;">INVOICE</div>
<strong style="color:#000;">Company Address : </strong><br> '.site_address().'</div>
<div style="clear:both;"></div>
</div>
<div style="padding:10px; border-bottom:#cacaca 1px solid; font:14px Arial, Helvetica, sans-serif; color:#000000;">
      <div style="float:left;"><strong>Invoice No. :</strong> '.$order_no.'</div>
      <div style="float:right;"><strong>Invoice Date :</strong> '.date_format3($res['created_at']).'</div>
      <div style="clear:both;"></div>
  </div>
  
  <div style="padding:10px; color:#000;">
      <div style="float:left;"><strong>Billing Address :</strong>   <br>
      '.$bname.' '.$blname.'<br>'.$bemail.'<br>'.$bphone.' <br>'.$baddress.',<br>'.$bappartment.' <br> '.city_name($bcity).' - '.$bzip.', '.state_name($bstate).'<br>
        '.country_name($bcountry).'</div>
      <div style="float:right;"><strong>Shipping Address :</strong><br>   
      '.$sname.' '.$slname.'<br>'.$semail.' <br>'.$sphone.' <br>'.$saddress.',<br>'.$sappartment.' , '.city_name($scity).' - '.$szip.', '.state_name($sstate).'<br>
        '.country_name($scountry).'</div>    
    <div style="clear:both;"></div>
  </div>
<div>';
   
   $oqry=db_query("select * from order_detail_tbl where order_id='".$order_id."'");
    $cnt=0;
    $sub_total=0;
      while($ores=mysqli_fetch_array($oqry))
      {	
	     
	      	
	      $cnt++;			
				$prodDtl=mysqli_fetch_array(db_query("select * from product_tbl where id='".$ores['product_id']."'"));
				
				 $dtl_link=get_prod_dtl_link($prodDtl['id']);
				//End of Code Block
				$prodName=stripslashes($prodDtl['product_name']);
					
			
					
					
					
					$product_img=$prodDtl['product_image'];
					if(strlen($product_img)){
						$img_arr=explode("~",$product_img);
						$tot_img=count($img_arr);
						for($i=0;$i<$tot_img;$i++){
							if(strlen($img_arr[$i]) && file_exists(UP_FILES_ROOT_PATH."/product_images/".$img_arr[$i])){
								$img=$img_arr[$i];
								break;
							}
						}
					}
        
  $var .='<div style="padding:10px; border-bottom:#c1c1c1 1px solid; background:#FFF;">
        <div style="float:left; width:70%;"> ';
		
		$dirpath=SITE_ROOT."/uploaded/product_images/".$img;
		if(strlen($img) && file_exists($dirpath))
		{
			$sspath=SITE_URL."/uploaded/product_images/".$img;
			$imgurlpath_small=show_thumb($sspath,"85","83");
			
			$var .='<a href="'.$dtl_link.'" target="_blank"><img src="'.$imgurlpath_small.'" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;" /></a>';
			
		}
		else
		{
			$var .='<a href="'.$dtl_link.'" target="_blank"><img src="'.SITE_URL.'/tracker_help_files/noimg.jpg" alt="" width="85" height="83" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;" /></a>';	
		}
		
		$var .='
        <div style="float:left; margin-left:10px; width:67%;">
        <div style="font-size:13px; color:#000; font-weight:bold;">'.stripslashes($prodDtl[product_name]).'</div>
    <div style="font-size:11px; margin-top:2px;">Code : '.$prodDtl["product_code"].'</div><div style="margin-top:4px; font-size:12px;">';
	if(empty($ores[prod_color])){
    $var .='Color: <span style="color:#900;">'.get_title_by_id("color_tbl","color_name","id",$ores[prod_color]).'</span><br>';
	}
    if(empty($ores[prod_size])){
	$var .='Size: <span style="color:#900;">'.get_title_by_id("size_tbl","title","id",$ores[prod_size]).'</span><br>';
	}
	 $var .='</div>
    <div style="font-size:13px; margin-top:2px;">Price: <strong style="color:#900; font-size:14px;">'.$ores[curr_symbol].$ores[product_price].'</strong></div>
        <div style="clear:both;"></div>
        </div>
    </div>
        <div style="float:left; width:10%;">'.$ores[product_quantity].'</div>
        <div style="float:left; width:14%;"><strong>'.$ores[curr_symbol].price_format($ores[product_quantity]*$ores[product_price]).'</strong></div>
        <div style="clear:both;"></div>
  </div>';
  $sub_total +=$ores[product_quantity]*$ores[product_price];
  }
   $coupon_price=($res[total_coupon_price]>0)?$res[total_coupon_price]:'0';
  $var .='
  
  
  
  
    <div style="border-bottom:#ddd 1px solid; padding:10px; border-radius:5px; font-size:16px; font-weight:bold;">
    <div style="text-align:center; padding:5px;">Sub Total : '.$res[curr_symbol].price_format($sub_total).'</div>
    ';
	if($res[total_shipping_price]>0)
        {
        $var .='
        <div style="text-align:center; padding:5px;">Shipping Charges : '.$res[curr_symbol].price_format($res[total_shipping_price]).'</div>';
      	}
      	else
      	{
	      	 $var .='
        <div style="text-align:center; padding:5px;">Shipping Charges : Free</div>';
      	}
		
		
        if($coupon_price>0)
        {
        $var .='
          <div style="text-align:center; padding:5px;">Coupon Discount	: '.$res[curr_symbol].price_format($coupon_price).'</div>
         
       ';
      	}
		
	$var .='<div style="text-align:center; padding:5px;">Amount Payable : '.$res[curr_symbol].price_format($res[order_price]).'</div>          
    </div>';
	
	if($print=='yes'){
  $var .='
  	<div style="margin-top:10px; text-align:center;"><a href="javascript:void(0);" onClick="window.print();" style="color:#000; text-decoration:none;"><img src="'.SITE_URL.'/images/prnt.gif" class="vam pb8" alt="" border="0" /> PRINT Invoice</a></div>';
	}
	
	$var .='
        
        <div style="clear:both;"></div>
        
</div> 
</div>';
if($print!='noprint'){
$var .='
</body>
</html>';
}
	
	
	return $var;	
}
function invoice_mail_admin($order_id,$print='yes'){ 
	
	$res=mysqli_fetch_array(db_query("select * from order_tbl where status!='2' and id='".$order_id."'"));
	
	$order_no=$res['order_no'];
	
	$coupon_code=$res['coupon_code'];
	if($coupon_code!=''){
		$coupondtl=mysqli_fetch_array(db_query("select * from coupon_tbl where coupon_code='".$coupon_code."'"));
		
		if($coupondtl['use_type']=="S"){
			db_query("update coupon_tbl set status='0' where id='".$coupondtl['id']."'");
			
		}
	}
	
	
	$var='
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
<img src="'.SITE_URL.'/images/flash-packer-sml.jpg" alt="" style="float:right;">
<div><strong style="color:#000;">Company Address : </strong><br> '.site_address().'</div>
<div style="clear:both;"></div>
</div>
<div style="padding:10px; border-bottom:#cacaca 1px solid; font:14px Arial, Helvetica, sans-serif; color:#000000;">
      <div style="float:left;"><strong>Order No. :</strong>'.$order_no.'</div>
      <div style="float:right;"><strong>Order Date :</strong> '.date_format3($res['created_at']).'</div>
      <div style="clear:both;"></div>
  </div>
  
  <div style="padding:10px; color:#000; width:100%">
      <div style="float:left; width:50%;"><strong>Billing Address :</strong>   <br>
      '.order_billing_address($order_id).'</div>
      <div style="float:right;width:50%;"><strong>Shipping Address :</strong><br>   
     '.order_shipping_address($order_id).'</div>    
    <div style="clear:both;"></div>
  </div>';
$var .='<div style="border:#e6cdbb 1px solid; border-radius:5px;">
  
  <div style="background:#f6f1dd; font-weight:bold; color:#333; padding:8px;">
      <div style="float:left; width:45%; ">Product Details</div>
      <div style="float:left; width:20%; ">Vendor Details</div>
      <div style="float:left; width:21%; ">Qty.</div>
      <div style="float:left; width:14%;">Sub Total</div>
    <div style="clear:both;"></div>
      </div>';
      
  $oqry=db_query("select * from order_detail_tbl where order_id='".$order_id."'");
    $cnt=0;
    $sub_total=0;
      while($ores=mysqli_fetch_array($oqry))
      {	
	     
	       
    		$awbno=$ores['awbno'];
	      	
	      $cnt++;			
				$prodDtl=mysqli_fetch_array(db_query("select * from product_tbl where id='".$ores['product_id']."'"));
				
				 $dtl_link=get_prod_dtl_link($prodDtl['id']);
				//End of Code Block
				$prodName=stripslashes($prodDtl['product_name']);
					
			
					
					
					
					$product_img=$prodDtl['product_image'];
					if(strlen($product_img)){
						$img_arr=explode("~",$product_img);
						$tot_img=count($img_arr);
						for($i=0;$i<$tot_img;$i++){
							if(strlen($img_arr[$i]) && file_exists(UP_FILES_ROOT_PATH."/product_images/".$img_arr[$i])){
								$img=$img_arr[$i];
								break;
							}
						}
					}
        
					
					$seller_dtl=mysqli_fetch_array(db_query("select comp_name,email from user_tbl where id='".$ores['seller_id']."'"));
					//echo "select comp_name,email from user_tbl where id='".$ores['seller_id']."'";
					
					    
  $var .='<div style="padding:10px; border-bottom:#cacaca 1px solid; background:#FFF;">
        <div style="float:left; width:45%;"> ';
        
         $dirpath=SITE_ROOT."/uploaded/product_images/".$img;
		  		if(strlen($img) && file_exists($dirpath))
		  		{
		    		$sspath=SITE_URL."/uploaded/product_images/".$img;
		    		$imgurlpath_small=show_thumb($sspath,"120","72");
		    		
		    		$var .='<img src="'.$imgurlpath_small.'" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;"  width="120" height="72" />';
		    		
		  		}
		  		else
		  		{
		    		$var .='<a href="'.$dtl_link.'" target="_blank"><img src="'.SITE_URL.'/tracker_help_files/noimg.jpg" alt="" width="120" height="72" border="0" style="float:left; margin-right:10px; border:#CCCCCC 1px dotted;" /></a>';	
		  		}
		  		
		  		
		  		
		  		
        $var .='<div style="float:left; margin-left:10px; width:45%;">
          <div style="color:#333; font-size:16px; text-decoration:none;">'.stripslashes($prodDtl[product_name]).'</div>
          <div style="font-size:11px; margin-top:5px;">Code : '.$prodDtl["product_code"].'</div>
        <div style="font-size:12px;">Price :  <strong style="color:#e00606;">'.$ores[curr_symbol].display_price($ores[product_price]).'</strong></div>';
        
        
        $var .='
        <div style="clear:both;"></div>
        </div>
    </div>';
    		$var .='
    		<div style="float:left; width:20%;">'.$seller_dtl['comp_name'].'<br>'.$seller_dtl['email'];
    		if($awbno!='')
  		{
	  		$var .='<div>'.show_barcode($awbno).'</div>';	
  		}
    		$var .='</div>
    		<div style="float:left; width:10%;">'.$ores[product_quantity].'</div>
	        <div style="float:right; width:14%; font-size:15px; color:#e00606;"><strong>'.$ores[curr_symbol].price_format($ores[product_quantity]*$ores[product_price]).'</strong></div>';
        
        	$sub_total +=$ores[product_quantity]*$ores[product_price];
        
        $var .='<div style="clear:both;"></div>
  </div>';
  
  
}
        $coupon_price=($res[total_coupon_price]>0)?$res[total_coupon_price]:'0';
$var .='</div> ';
	if($print=='yes'){
  $var .='<div style="float:left; text-transform:uppercase; text-align:center; margin-top:25px; padding:5px; border-radius:5px; background:#b7610a; color:#FFF;"><a href="javascript:void(0);" onClick="window.print();" style="color:#fff; text-decoration:none;"> PRINT Invoice</a></div>';
	}
  
  $var .='<div style="float:right; width:45%; padding:7px;">
        <div style="width:170px; float:left; padding:5px; text-align:right;">Subtotal :</div>
        <div style="width:80px; float:left; padding:5px; margin-left:10px;">'.$res[curr_symbol].price_format($sub_total).'</div>
        <div style="clear:both;"></div>
        
        ';
        
        
       
        if($coupon_price>0)
        {
        $var .='
         <div style="width:170px; float:left; padding:5px; text-align:right;"">Coupon Discount	:</div>
         
        <div style="width:80px; float:left; padding:5px; margin-left:10px;">'.$res[curr_symbol].price_format($coupon_price).'</div><div style="clear:both;"></div>';
      	}
        
        
        
        $var .='<div style="width:170px; float:left; padding:5px; text-align:right; font:bold 13px Arial, Helvetica, sans-serif; color:#e00606;">Amount Payable :</div>
        <div style="width:80px; float:left; padding:5px; margin-left:10px; font:bold 13px Arial, Helvetica, sans-serif; color:#e00606;">'.$res[curr_symbol].price_format($res[order_price]).'</div>
      	<div style="clear:both;"></div>
  </div>
        
        <div style="clear:both;"></div>
</div>
</body>
</html>
	';
	//echo $var;exit;
	return $var;	
}
function courier_mail($order_id){ 
	
	$res=mysqli_fetch_array(db_query("select * from order_tbl where status!='2' and id='".$order_id."'"));
	
	$admin_dtl=mysqli_fetch_array(db_query("select mobile,user_email from admin_tbl where id='1'"));
		
	$var='
			
<body>
<div style="background:#fff; width:800px; margin:auto">
  <table width="100%" border="0" cellspacing="1" cellpadding="4">
      <tr class="mb10">
        <td width="75%" align="left" class=" ft-12 pb10" ><strong class="fs14">'.SITE_NAME.'</strong>
            <p class="pt05 fs11  lht-16"><strong>Address : </strong>'.site_address().'</p></td>
        <td width="25%" align="right" valign="bottom" style="background:#000;"><img src="'.SITE_URL.'/images/hindustan-made.png" alt="" /><br />
            <br /></td>
      </tr>
    </table>';
    
     $var .='<div style="padding:5px 5px;" >   
   	Dear '.$res[fullname].',<br><br>
Thank you for your order at <a href="'.SITE_URL.'">'.URL_TEXT.'</a><br><br>
Your product dispatched details are given below. If you have any query about your order status, you can contact us directly by e-mail at: '.$admin_dtl['user_email'].'<br><br>
   </div>';	
   
   $var .='<table width="100%" border="0" cellspacing="1" cellpadding="4" class="bdr3">
      <tr class="green lht-18  ft-12 b">
        <td width="50%" bgcolor="#E8EDDE"><strong>Invoice No. </strong>: '.$res['order_no'].'</td>
        <td width="50%" align="right" bgcolor="#E8EDDE"><strong>Date : </strong>'.date_format3($res['created_at']).'</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="4">
      <tr class="mb10">
        <td width="50%" valign="top" class="fs11  lht-16 p10"><strong class="green1  fs14">Billing Address</strong><br />
            '.order_billing_address($order_id).'</td>
        <td width="50%" valign="top" class="fs11  lht-16 p10"><strong class="green1  fs14">Shipping Address</strong><br />
            '.order_shipping_address($order_id).' </td>
      </tr>
    </table>
  
  <table width="100%" border="0" align="center" cellpadding="7" cellspacing="1" class="mt10px tab_brdr" style="border-bottom:3px solid #f1f1f1;" >
    <tr bgcolor="#E8EDDE">
      <td align="left" style="height:36px;"><strong>Order Dispatch Details</strong></td>
     
      
    </tr>';
   
		$courier_dtl=mysqli_fetch_array(db_query("select * from courier_details_tbl where order_id='".$order_id."'"));
		
   $var .=' <tr>
      <td align="left" valign="top">
      <table width="100%" border="0" align="center" cellpadding="7" cellspacing="1" class="mt10px tab_brdr" style="border-bottom:3px solid #f1f1f1;color:#000;">
      		
      	 <tr>
      <td valign="top" width="30%">Subject</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.$courier_dtl['subject'].'</td>
    </tr>
     <tr>
      <td valign="top">Courier Company</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.$courier_dtl['comp_name'].'</td>
    </tr>
    <tr>
      <td valign="top">Courier Company Url</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.$courier_dtl['comp_url'].'</td>
    </tr>
     <tr>
      <td valign="top">Docket No.</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.$courier_dtl['docuket_no'].'</td>
    </tr>
     <tr>
      <td valign="top">Date of Dispatching</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.date_format1($courier_dtl['date_of_disp']).'</td>
    </tr>
     <tr>
      <td valign="top">Expected Date for Delivery</td>
      <td width="1%" valign="top">:</td>
      <td valign="top">'.date_format1($courier_dtl['exp_del_date']).'</td>
    </tr>
      
      </table>
      </td>
     
      
    </tr>';
  	
   
  $var .='</table>
  
  
	
	<div style="padding-top:10px;">
		We at '.SITE_NAME.' are constantly striving to provide you the best shopping experience. We hope you have enjoyed shopping with us. In case of any suggestions or queries, please feel free to contact us at anytime. We are available 24hrs at your service through:
		<br />
		<ol start="1">
    	<li>Our Helpline numbers:             '.$admin_dtl['mobile'].'  </li>     
    	<li>You can send us your feedback at: '.$admin_dtl['user_email'].' </li>
    </ol>	
		Thank you for shopping with <a href="'.SITE_URL.'">'.URL_TEXT.'</a><br><br>
		
		Sincerely, 
		
		<strong>'.SITE_NAME.' Customer Care<br><br>
		
		THIS IS A SYSTEM GENERATED MAIL. REPLIES TO THIS MAIL ID WILL NOT BE RESPONDED.</strong>
	</div>
  
  <div class="pro-shadow03"></div>
  
    <br />
    <br />
    <br />
  </div>
</div>
</body>
	';
	return $var;	
}
function state_dropdown($selval){
	$var ='<option value="">Choose State</option>';
	$arr=array("Andaman and Nicobar","Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chandigarh","Chattisgarh","Dadra and Nagar Haveli","Daman &amp; Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Lakshadweep","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Pondicherry","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttar Pradesh","Uttarakhand","West Bengal");
	$tot=count($arr);
	for($i=0;$i<$tot;$i++){
		$sel = (strtolower($selval)==strtolower($arr[$i]))?"selected":"";
		$var .='<option value="'.$arr[$i].'" '.$sel.'>'.$arr[$i].'</option>';
	}
	
	return $var;
}
function has_children($catid){
	$num=mysqli_num_rows(db_query("select id from category_tbl where parent_id='".$catid."' and status='1'"));
	
	if($num>=1){
		return TRUE;
	}
	else{
		return false;
	}
}
function get_nlevel_drop_down($parent,$selectId="",$pad="|__"){
	$selId =($selectId!="") ? $selectId : "";
		 
	$var="";
	$qry=db_query("select * from category_tbl where parent_id='".$parent."' and status='1'");
			
	$num_rows      =  mysqli_num_rows($qry);
	
	if ($num_rows > 0 ) {
		while($res_arr = mysqli_fetch_array($qry)){
			$catname=ucfirst(strtolower($res_arr['cat_name']));
			
			if ( has_children($res_arr['id']) ) {
				 $var .= '<optgroup label="'.$pad.'&nbsp;'.$catname.'" >'.$catname.'</optgroup>'; 
				  
				 $var .= get_nlevel_drop_down($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad); 
			}
			else{
					  
			 	$sel=($selectId==$res_arr['id']) ? "selected='selected'" : "";
			 
				$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.$catname.'  </option>'; 
		   
		  }	
		}
	}
	 return $var;
	
}
function has_children2($catid){
	$num=mysqli_num_rows(db_query("select id from product_tbl where parent_id='".$catid."' and status !='2'"));
	
	if($num>=1){
		return TRUE;
	}
	else{
		return false;
	}
}
function get_nlevel_drop_down2($parent,$selectId="",$pad="|__"){
	$selId =($selectId!="") ? $selectId : "";
		 
	$var="";
	$qry=db_query("select * from category_tbl where parent_id='".$parent."' and status='1'");
			
	$num_rows      =  mysqli_num_rows($qry);
	
	if ($num_rows > 0 ) {
		while($res_arr = mysqli_fetch_array($qry)){
			$catname=ucfirst(strtolower($res_arr['cat_name']));
			
			if ( has_children($res_arr['id']) ) {
				if(has_children2($res_arr['id']))
				{
					$var .= '<optgroup label="'.$pad.'&nbsp;'.$catname.'" >'.$catname.'</optgroup>';
					$var .= get_nlevel_drop_down2($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad); 
				}
				else
				{$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.$catname.'  </option>'; 
					$var .= get_nlevel_drop_down2($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad);  
				}
				  
				  
				 //$var .= get_nlevel_drop_down2($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad); 
			}
			else{
				if(has_children2($res_arr['id']))
				{
					$var .= '<optgroup label="'.$pad.'&nbsp;'.$catname.'" >'.$catname.'</optgroup>';
				}
				else{	  
			 	$sel=($selectId==$res_arr['id']) ? "selected='selected'" : "";
			 
				$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.$catname.'  </option>'; 
			}
		   
		  }	
		}
	}
	 return $var;
	
}
function has_forum_children($catid){
	$num=mysqli_num_rows(db_query("select id from forum_category_tbl where parent_id='".$catid."' and status='1'"));
	
	if($num>=1){
		return TRUE;
	}
	else{
		return false;
	}
}
function get_forum_nlevel_drop_down($parent,$selectId="",$pad="|__"){
	$selId =($selectId!="") ? $selectId : "";
		 
	$var="";
	$qry=db_query("select * from forum_category_tbl where parent_id='".$parent."' and status='1'");
			
	$num_rows      =  mysqli_num_rows($qry);
	
	if ($num_rows > 0 ) {
		while($res_arr = mysqli_fetch_array($qry)){
			$catname=ucfirst(strtolower($res_arr['cat_name']));
			
			if ( has_forum_children($res_arr['id']) ) {
				 $var .= '<optgroup label="'.$pad.'&nbsp;'.$catname.'" >'.$catname.'</optgroup>'; 
				  
				 $var .= get_forum_nlevel_drop_down($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad); 
			}
			else{
					  
			 	$sel=($selectId==$res_arr['id']) ? "selected='selected'" : "";
			 
				$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.$catname.'  </option>'; 
		   
		  }	
		}
	}
	 return $var;
	
}
function product_list($parent,$selvalarr){
	$var="";
	$qry=db_query("select product_name,product_code,id from product_tbl where parent_id='".$parent."' and status='1'");
			
	$num_rows      =  mysqli_num_rows($qry);
	
	if ($num_rows > 0 ) {
		while($res_arr = mysqli_fetch_array($qry)){
			
			$pname=ucfirst(strtolower($res_arr['product_name']));
			$pcode=$res_arr['product_code'];
			
			$sel='';
			if(is_array($selvalarr)){
				$sel=(in_array($res_arr['id'],$selvalarr)) ? "selected='selected'" : "";
			}
			$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pname.'( '.$pcode.' )  </option>';
		}
		
	}
	return $var;
}
function calculate_discount($pidstr){
	$oprice=0;
	if(strlen($pidstr)){
		$coup_prod_id=explode(",",$pidstr);
	}
	if(strlen($_SESSION['prod'])){
		$sess_prod_id=explode("^",$_SESSION['prod']);
	}
	if(is_array($sess_prod_id) && is_array($coup_prod_id)){
		
		for($i=0;$i<count($sess_prod_id);$i++){
			if(in_array($sess_prod_id[$i],$coup_prod_id)){
				$prodDtl=mysqli_fetch_array(db_query("select display_price from product_tbl where id='".$sess_prod_id[$i]."'"));
				$price=$prodDtl['display_price'];
				
				$oprice+=$price;
			}
		}
	}
	return $oprice;
}
function get_cat_links($catid){
	$pid=get_title_by_id("forum_category_tbl","parent_id","id",$catid);
	
	$link=$pid.",".$catid;
	return $link;	
}
function get_time_ago($time_stamp)
{
    $time_difference = strtotime(date("Y-m-d H:i:s")) - $time_stamp;
    if ($time_difference >= 60 * 60 * 24 * 365.242199)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 365.242199 days/year
         * This means that the time difference is 1 year or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 365.242199, 'year');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 30.4368499)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 30.4368499 days/month
         * This means that the time difference is 1 month or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 30.4368499, 'month');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 7)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 7 days/week
         * This means that the time difference is 1 week or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'week');
    }
    elseif ($time_difference >= 60 * 60 * 24)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day
         * This means that the time difference is 1 day or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24, 'day');
    }
    elseif ($time_difference >= 60 * 60)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour
         * This means that the time difference is 1 hour or more
         */
        return get_time_ago_string($time_stamp, 60 * 60, 'hour');
    }
    else
    {
        /*
         * 60 seconds/minute
         * This means that the time difference is a matter of minutes
         */
        return get_time_ago_string($time_stamp, 60, 'minute');
    }
}
function get_time_ago_string($time_stamp, $divisor, $time_unit)
{
    $time_difference = strtotime("now") - $time_stamp;
    $time_units      = floor($time_difference / $divisor);
    settype($time_units, 'string');
    if ($time_units === '0')
    {
        return 'less than 1 ' . $time_unit . ' ago';
    }
    elseif ($time_units === '1')
    {
        return '1 ' . $time_unit . ' ago';
    }
    else
    {
        /*
         * More than "1" $time_unit. This is the "plural" message.
         */
        // TODO: This pluralizes the time unit, which is done by adding "s" at the end; this will not work for i18n!
        return $time_units . ' ' . $time_unit . 's ago';
    }
}
/****************** End of code block ****************************/
function insert_view_counter($cat_id){
	if(strlen($cat_id) && is_numeric($cat_id)){
		$num=mysqli_num_rows(db_query("select id from view_counter_tbl where cat_id='".$cat_id."'"));
		if($num>0){
			$view_r=mysqli_fetch_array(db_query("select view from view_counter_tbl where cat_id='".$cat_id."'"));
			$view=$view_r['view']+1;
			db_query("update view_counter_tbl set view='".$view."' where cat_id='".$cat_id."'");
		}
		else{
			db_query("insert into view_counter_tbl set view='1', cat_id='".$cat_id."'");
		}
	}
}
function view_counter($cat_id){
	$num=mysqli_num_rows(db_query("select id from view_counter_tbl where cat_id='".$cat_id."'"));
	if($num>0){
		$view_r=mysqli_fetch_array(db_query("select view from view_counter_tbl where cat_id='".$cat_id."'"));
		return $view_r['view'];
	}
	else{
		return '0';	
	}
}
function total_comments($user_id){
		$num=mysqli_num_rows(db_query("select id from comment_tbl where user_id='".$user_id."'"));
		
		return "Total Comments : ".$num;
}
function price_format($price){
	$p= number_format($price,'2','.','');	
	return $p;
	//return round($p);
}
function url_title($name){
	$name1=trim(stripslashes($name));
	$pname=str_replace("#","",$name1);
	$pname=str_replace("-","",$pname);
	$pname=str_replace(".","",$pname);
	$pname=str_replace("/","",$pname);
	$pname=str_replace("&","",$pname);
	$pname=str_replace("$","",$pname);
	$pname=str_replace("  ","-",$pname);
	$pname=str_replace(" ","-",$pname);
	$pname=str_replace("(","",$pname);
	$pname=str_replace(")","",$pname);
	$pname=str_replace("[","",$pname);
	$pname=str_replace("]","",$pname);
	$pname=str_replace('"',"",$pname);
	$pname=str_replace("'","",$pname);
	$pname=str_replace("?","",$pname);
	$pname=str_replace("%","",$pname);
	return $pname;	
}
function reduse_qty($prodID,$val){
	$res=mysqli_fetch_array(db_query("select product_qty from product_tbl where id='$prodID'"));
	if($res[product_qty]>=$val){
		$resetval=$res[product_qty]-$val;	
	}
	else
	{
		$resetval=0;
	}
	db_query("update product_tbl set product_qty='$resetval' where id='$prodID'");
		
}
/*function reduce_qty($order_id){
	$qry=db_query("select od.* from order_detail_tbl as od JOIN order_tbl as o ON od.order_id=o.id where od.order_id='".$order_id."'");
	if(mysqli_num_rows($qry)>0)
	{
		while($res=mysqli_fetch_array($qry))
		{
			$pid=$res['product_id'];				
			$qty=$res['product_quantity'];
			
			reduse_qty($pid,$qty);
			
			$product_qty=get_title_by_id("product_tbl","product_qty","id",$pid);
			if($product_qty<=3){
				admin_outof_stock_product_notification($pid);
			}
		}	
	}
	
}*/
function reduce_qty($order_id){
	$qry=db_query("select od.* from order_detail_tbl as od JOIN order_tbl as o ON od.order_id=o.id where od.order_id='".$order_id."'");
	if(mysqli_num_rows($qry)>0)
	{
		while($res=mysqli_fetch_array($qry))
		{
			$pid=$res['product_id'];	
			$psize=$res['prod_size'];
			$qty=$res['product_quantity'];
			
			$r=mysqli_fetch_array(db_query("select * from product_size_tbl where product_id='".$pid."' and size_id='".$psize."' "));
			
			$qty_avl=$r['qty_avl'];
			$qty_used=$r['qty_used'];
			
			$new_avl_qty=$qty_avl-$qty;
			$new_avl_used=$qty_used+$qty;
			
			db_query("update product_size_tbl set qty_avl='".$new_avl_qty."',qty_used='".$new_avl_used."' where product_id='".$pid."' and size_id='".$psize."'");
		}	
	}
	
}
/*
function reduce_qty($id,$qty){
	$res=mysqli_fetch_array(db_query("select product_qty from product_tbl where id='".$id."'"));
	if($qty>$res['product_qty'])
	{
		$qty=0;
	}
	else{
		$qty=$res['product_qty']-$qty;
	}
	
	//product out of stock notification
		$product_qty=$qty;
		if($product_qty==0)
		{
			$sql="select id,name,email from notify_tbl where product_id='".$id."' and mail_status='0'";
			
			if(mysqli_num_rows(db_query($sql)) > 0)
			{
				$sql .=" order by id limit 0,$product_qty";
				$qry=db_query($sql);
				while($r=mysqli_fetch_array($qry))
				{
					
					$success=outof_stock_product_notification($r['name'],$r['email'],$id);
					
					db_query("update notify_tbl set mail_status='1' where id='".$r['id']."' ");
					
				}
			}
		}
		//end of code
	
	db_query("update product_tbl set product_qty='".$qty."' where id='".$id."'");
	
}
*/
function recover_qty($orderid){
	$qry=db_query("select product_quantity,product_id from order_detail_tbl where order_id='".$orderid."'");
	while($r=mysqli_fetch_array($qry)){
		$res=mysqli_fetch_array(db_query("select product_qty from product_tbl where id='".$r['product_id']."'"));
		
		$qty=$res['product_qty']+$r['product_quantity'];
		
		db_query("update product_tbl set product_qty='".$qty."' where id='".$r['product_id']."'");
	}
	
}
function currency_list_dropdown($val){
	$qry=db_query("select * from currency_tbl where status='1' and id!='2' order by curr");
	$var='<option value="">USD</option>';
	while($res=mysqli_fetch_array($qry)){
			$ccsel =(trim($res['id'])==$val)?$ccsel="selected":$ccsel="";
		$var .='<option value="'.$res['id'].'" '.$ccsel.'>'.$res['curr'].'</option>';
	}
	return $var;
}
function is_retailer()
{
	$flag=FALSE;
	if($_SESSION['member']!='')
	{
  	$sess_arr=explode("~",$_SESSION['member']);
  	if($sess_arr['3']==2)
  	{
    	$flag=TRUE;
  	}
	}
	return $flag;	
}
function price_by_curr($price,$showcurr='')
{
	$original_price='';
	$original_price=$price;
	$curr_symbol="USD ";
	
	$basecurr_val=mysqli_fetch_array($qry=db_query("select curr_value,curr from currency_tbl where id='2'"));
	
	
	
	$curr_id=$_SESSION['current_currency'];
	if($curr_id!='' && $curr_id>0 && $original_price>0)
	{
		$qry=db_query("select curr_value,curr from currency_tbl where id='".$curr_id."'");
		if($curr_id!=2)
		{
			$price=$price*$basecurr_val['curr_value'];	
		}
		
		$res=mysqli_fetch_array($qry);
		$curr_price=$res['curr_value'];
		if($curr_price>0)
		{
			$curr_symbol=$res['curr']."&nbsp;";
			$original_price=number_format(($price/$curr_price),2,'.','');
		}
	}
	
	if($showcurr!=''){ 
		$original_price=$curr_symbol.$original_price;
	}
	
	return $original_price;
}
function available_product_notification($name,$email,$id)
{
	$flag=FALSE;
	$product_name=get_title_by_id("product_tbl","product_name","id",$id);
	 $proddtl_url=SITE_URL."/detail-".url_title($product_name)."-".$id.".htm";	
	 
	 #mail for clients
	 $To1=$email;
	 $From1=admin_email();
	 $Subject1="Now $product_name available at ".SITE_NAME;
	 $Msg1="Dear <b>$name</b>,<br><br>"; 
	
	 $Msg1 .='Product <b>'.$product_name.'</b> is available at '.SITE_NAME.'. Now <a href="'.$proddtl_url.'">Click here</a> to view product details and buy.<br><br>';
	 $Msg1 .="Thanks & Regards,<br>";
	 $Msg1 .=SITE_NAME." Team<br><br>";
	 //echo $Msg1;exit;
	 //$Headers1 = "From: ".SITE_NAME."<$From1>\n";
	 $Headers1 = "From: ".SITE_NAME."\n";
	 $Headers1 .= "X-Mailer: PHP/". phpversion();
	 $Headers1 .= "X-Priority: 3 \n";
	 $Headers1 .= "MIME-version: 1.0\n";
	 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	 if(@mail("$To1", "$Subject1", "$Msg1","$Headers1")){
		 $flag=TRUE;
	 }
	 return $flag;
	/*End mailing*/
}
function outof_stock_product_notification($name,$email,$id)
{
	$flag=FALSE;
	$product_name=get_title_by_id("product_tbl","product_name","id",$id);
	 
	 
	 #mail for clients
	 $To1=$email;
	 $From1=admin_email();
	 $Subject1="Now $product_name available at ".SITE_NAME;
	 $Msg1="Dear <b>$name</b>,<br><br>"; 
	
	 $Msg1 .='Product <b>'.$product_name.'</b> has out of stock at '.SITE_NAME.'. When product will be available you will get notification.<br><br>';
	 $Msg1 .="Thanks & Regards,<br>";
	 $Msg1 .=SITE_NAME." Team<br><br>";
	 //echo $Msg1;exit;
	 //$Headers1 = "From: ".SITE_NAME."<$From1>\n";
	 $Headers1 = "From: ".SITE_NAME."\n";
	 $Headers1 .= "X-Mailer: PHP/". phpversion();
	 $Headers1 .= "X-Priority: 3 \n";
	 $Headers1 .= "MIME-version: 1.0\n";
	 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	 if(@mail("$To1", "$Subject1", "$Msg1","$Headers1")){
		 $flag=TRUE;
	 }
	 return $flag;
	/*End mailing*/
}
function new_order_count($ord_type='1')
{
	$num=mysqli_num_rows(db_query("select o.id from order_tbl as o JOIN order_detail_tbl as od on o.id=od.order_id where o.status!='2' and o.read_status='0' and o.order_type='".$ord_type."' group by o.id"));
	return $num;
}
function my_order_count($ord_type='1',$salemanid)
{
	$num=mysqli_num_rows(db_query("select o.id from order_tbl as o JOIN order_detail_tbl as od on o.id=od.order_id where o.status!='2' and o.read_status='0' and o.order_type='".$ord_type."' and o.salesman_id='".$salemanid."' group by o.id"));
	return $num;
}
function cat_link($catid)
{
	$num=mysqli_num_rows(db_query("select id from category_tbl where status='1' and parent_id='".$catid."'"));	
	if($num>0)
	{
		//$link=SITE_URL."/sub-categories.htm?cat_id=".$catid;
		$url_title=url_title(strtolower(get_title_by_id("category_tbl","cat_name","id",$catid)));
		$link=SITE_URL."/cat-$url_title-$catid.htm";
		$_SESSION['cat_link']=$link;		
	}
	else
	{
		$url_title=url_title(strtolower(get_title_by_id("category_tbl","cat_name","id",$catid)));
		$link=SITE_URL."/prod-$url_title-$catid.htm";	
		//$link=SITE_URL."/listing.htm?cat_id=".$catid;	
	}
	return $link;
}
function get_prod_dtl_link($id)
{
	$url_title=url_title(strtolower(get_title_by_id("product_tbl","product_name","id",$id)));
	//$link=SITE_URL."/product-details.htm?id=".$id;	
	$link=SITE_URL."/detail-$url_title-$id.htm";	
	return $link;
}
function brand_link($id)
{
	$url_title=url_title(strtolower(get_title_by_id("brand_tbl","brand_name","id",$id)));
	$link=SITE_URL."/brand-$url_title-$id.htm";	
	
	return $link;
}
function get_category_links($catID){
	$res=mysqli_fetch_array(db_query("select * from category_tbl where id='$catID'"));
	$flag=0;
	$catparent=$catID;
	while($flag!=1){
		$res1=db_query("select * from category_tbl where id='$catparent'");
		$record=mysqli_fetch_array($res1);
		if($record[parent_id]!=0){
			$catparent=$record[parent_id];
			$array.="$record[id],";
		}else{
			if($record[id]!=""){
				$array.="$record[id],";
			}
			$flag=1;
		}
	}
	return substr($array,0,-1);
}
function get_offer_price($price,$dprice)
{
	if($dprice>0){
		$save=$price-$dprice;
		$percent=($save*100)/$price;
		
		//return 	number_format($percent,2,'.','');
		return 	round($percent);
	}
	else
	{
		return '0';	
	}
}
function shipping_dropdown($val){
	$qry=db_query("select * from shipping_tbl where status='1' order by contName");
	//echo "select * from shipping_tbl where status='1' order by contName";
	//echo "==".mysqli_num_rows($qry);exit;
	if(mysqli_num_rows($qry) > 0)
	{
		$var='<option value="">Choose Country</option>';
		while($res=mysqli_fetch_array($qry)){
			if(strlen($val)){
				$ccsel =(trim($res['id'])==$val)?$ccsel="selected":$ccsel="";
			}
			else{
				//$ccsel =(trim($res['id'])=="98")?$ccsel="selected":$ccsel="";
			}
			$price = ($res['shipping_price']>0)?$res['shipping_price']:"Free";
			$var .='<option value="'.$res['id'].'" '.$ccsel.'>'.$res['contName'].' ('.CURRANCY_SYMBOL.$price.')</option>';
		}
	}
	else
	{
		$var='<option value="">Free Shipping</option>';
	}
	return $var;
}
//ccavenue support methods
function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
{
	$str ="$MerchantId|$OrderId|$Amount|$URL|$WorkingKey";
	$adler = 1;
	$adler = adler32($adler,$str);
	return $adler;
}
function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
{
	$str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
	$adler = 1;
	$adler = adler32($adler,$str);
	
	if($adler == $CheckSum)
		return "true" ;
	else
		return "false" ;
}
function adler32($adler , $str)
{
	$BASE =  65521 ;
	$s1 = $adler & 0xffff ;
	$s2 = ($adler >> 16) & 0xffff;
	for($i = 0 ; $i < strlen($str) ; $i++)
	{
		$s1 = ($s1 + Ord($str[$i])) % $BASE ;
		$s2 = ($s2 + $s1) % $BASE ;
			//echo "s1 : $s1 <BR> s2 : $s2 <BR>";
	}
	return leftshift($s2 , 16) + $s1;
}
function leftshift($str , $num)
{
	$str = DecBin($str);
	for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
		$str = "0".$str ;
	for($i = 0 ; $i < $num ; $i++) 
	{
		$str = $str."0";
		$str = substr($str , 1 ) ;
		//echo "str : $str <BR>";
	}
	return cdec($str) ;
}
function cdec($num)
{
	for ($n = 0 ; $n < strlen($num) ; $n++)
	{
	   $temp = $num[$n] ;
	   $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
	}
	return $dec;
}
function folder_url()
{
	$sess_arr=explode("~",$_SESSION['member']);
	$folder_url=($sess_arr[3]==2)?SITE_URL.'/retailer':SITE_URL.'/dashboard.htm';	
	return $folder_url;
}
function protect_salesman_page(){
	if($_SESSION['sess_salesman_id']==''){
		header("Location:".SALES);
		exit;	
	}	
}
function size_type_dropdown($name,$selected,$extra='')
{
	$var='<select name="'.$name.'" '.$extra.'>';
	$var .='<option value="">Choose Size Country</option>';
	
	$qry=db_query("select * from size_country_tbl where status='1' order by title");
	
	while($res=mysqli_fetch_array($qry)){
		$ccsel =(trim($res['id'])==$selected)?"selected":"";
		$var .='<option value="'.$res['id'].'" '.$ccsel.'>'.$res['title'].'</option>';
	}
	$var .='</select>';
	return $var;
}
function has_children_search($catid){
	$num=mysqli_num_rows(db_query("select id from category_tbl where parent_id='".$catid."' and status='1'"));
	
	if($num>=1){
		return TRUE;
	}
	else{
		return false;
	}
}
function get_nlevel_drop_down_search($parent,$selectId="",$pad="|__"){
	$selId =($selectId!="") ? $selectId : "";
		 
	$var="";
	$qry=db_query("select * from category_tbl where parent_id='".$parent."' and status='1'");
			
	$num_rows      =  mysqli_num_rows($qry);
	
	if ($num_rows > 0 ) {
		while($res_arr = mysqli_fetch_array($qry)){
			$catname=ucfirst(strtolower($res_arr['cat_name']));
			
			if ( has_children_search($res_arr['id']) ) {
				 //$var .= '<optgroup label="'.$pad.'&nbsp;'.$catname.'" >'.$catname.'</optgroup>'; 
				 $sel=($selectId==$res_arr['id']) ? "selected='selected'" : "";
				  $var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.'&nbsp;'.$catname.'  </option>';
				 $var .= get_nlevel_drop_down_search($res_arr['id'],$selId,'&nbsp;&nbsp;&nbsp;'.$pad); 
			}
			else{
					  
			 	$sel=($selectId==$res_arr['id']) ? "selected='selected'" : "";
			 
				$var .= '<option value="'.$res_arr['id'].'" '.$sel.'>'.$pad.$catname.'  </option>'; 
		   
		  }	
		}
	}
	 return $var;
	
}
function seller_dropdown($selval)
{
	$var='';
	
	$sql=db_query("select id,fullname,email from user_tbl where status!='2' and user_type='2' order by fullname");
	if(mysqli_num_rows($sql) > 0)
	{
		while($res=mysqli_fetch_array($sql)){
			$sel = ($res['id']==$selval)?"selected":"";
			$var .='<option value="'.$res['id'].'" '.$sel.'>'.$res['fullname'].'( '.$res['email'].' )</option>';	
		}
	}
	return $var;
	
}
function brand_dropdown($selval)
{
	$var='';
	
	$sql=db_query("select id,brand_name from brand_tbl where status!='2' order by brand_name");
	if(mysqli_num_rows($sql) > 0)
	{
		while($res=mysqli_fetch_array($sql)){
			$sel = ($res['id']==$selval)?"selected":"";
			$var .='<option value="'.$res['id'].'" '.$sel.'>'.$res['brand_name'].'</option>';	
		}
	}
	return $var;
	
}
function traveltalk_cat_dropdown($selval)
{
	$var='';
	
	$sql=db_query("select id,traveltalk_cat_name from traveltalk_cat_tbl where status!='2' order by id");
	if(mysqli_num_rows($sql) > 0)
	{
		while($res=mysqli_fetch_array($sql)){
			$sel = ($res['id']==$selval)?"selected":"";
			$var .='<option value="'.$res['id'].'" '.$sel.'>'.$res['traveltalk_cat_name'].'</option>';	
		}
	}
	return $var;
	
}
function admin_outof_stock_product_notification($id)
{
	$flag=FALSE;
	$product_name=get_title_by_id("product_tbl","product_name","id",$id);
	$product_code=get_title_by_id("product_tbl","product_code","id",$id);
	 
	 
	 #mail for admin
	 $To1=admin_email();
	 $From1=admin_email();
	 $Subject1="Now $product_name ($product_code) out of stock at ".SITE_NAME;
	 $Msg1="Dear <b>".SITE_NAME." Team</b>,<br><br>"; 
	
	 $Msg1 .='Your Product <b>'.$product_name.' ( '.$product_code.' )</b> has been out of stock at '.URL_TEXT.'. Please take the necessary action.<br><br>';
	 $Msg1 .="Thanks & Regards,<br>";
	 $Msg1 .=SITE_NAME." Admin<br><br>";
	 //echo $Msg1;exit;
	 $Headers1 = "From: ".SITE_NAME."<$From1>\n";
	 //$Headers1 = "From: ".SITE_NAME."\n";
	 $Headers1 .= "X-Mailer: PHP/". phpversion();
	 $Headers1 .= "X-Priority: 3 \n";
	 $Headers1 .= "MIME-version: 1.0\n";
	 $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	 if(@mail("$To1", "$Subject1", "$Msg1","$Headers1")){
		 $flag=TRUE;
	 }
	 return $flag;
	/*End mailing*/
}
function send_mobile_sms($mobile_no='7827557794',$msg)
{
	$url="http://alerts.sinfini.com/api/web2sms.php?workingkey=14134osd71gff018jq1d&to=".$mobile_no."&sender=FLASHP&message=".urlencode($msg);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$result = curl_exec($curl);
	//echo $result; 	
}
function display_price($price)
{
	if($price>0)
	{
		return round($price);
	}
	else
	{
		
		return '0';	
	}	
}
function show_barcode($awbno)
{
	return '<img alt="Barcode Image" src="'.SITE_URL.'/barcode/html/image.php?filetype=PNG&amp;dpi=72&amp;scale=1&amp;rotation=0&amp;font_family=Arial.ttf&amp;font_size=8&amp;text='.$awbno.'&amp;thickness=30&amp;checksum=&amp;code=BCGcode39">';	
}
function category_name($id)
{
	$cat_name=get_title_by_id('category_tbl','cat_name','id',$id);	
	return $cat_name;
}
function city_name($id)
{
	$cat_name=get_title_by_id('cities','name','id',$id);	
	return $cat_name;
}
function state_name($id)
{
	$cat_name=get_title_by_id('states','name','id',$id);	
	return $cat_name;
}
function category_dropdown($selval)
{
	$var='<option value="">Category</option>';
	
	$sql=db_query("select id,cat_name from category_tbl where status='1' and parent_id='0' order by cat_name");
	if(mysqli_num_rows($sql) > 0)
	{
		while($res=mysqli_fetch_array($sql)){
			$sel = ($res['id']==$selval)?"selected":"";
			$var .='<option value="'.$res['id'].'" '.$sel.'>'.$res['cat_name'].'</option>';	
		}
	}
	return $var;
	
}
function total_cat_product_price($catid)
{
	$total_price=0;
	$sub_total=0;
	if(strlen($_SESSION['prod']))
	{
		$item_id=explode("^",$_SESSION['prod']);
		$item_qty=explode("^",$_SESSION['quantity']);
		$chk_arr=explode("^",$_SESSION['chk_str']);
		for($j=1;$j<count($item_id);$j++)
	    {	
	      $prodDtl=mysqli_fetch_array(db_query("select display_price from product_tbl where id='$item_id[$j]' and FIND_IN_SET($catid,product_cat_links)"));
	      if(is_array($prodDtl) && count($prodDtl) > 0)
	      {
		      $cartprice=$prodDtl['display_price'];
				
				
			
				//Cart price calculation
				$total_price=$cartprice*$item_qty[$j];
				$sub_total+=$total_price;
				
				//End of Code Block
			}
				
				
			
		}
	}
	
	return $sub_total;
} 
?>
