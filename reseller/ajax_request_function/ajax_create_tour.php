<?php 

 include('../../include/database/db.php'); 

$tour_type = mysql_real_escape_string($_POST['tour_type']);
$title = mysql_real_escape_string($_POST['title']);
// echo $name;
$overview = mysql_real_escape_string($_POST['overview']);
$hilight = mysql_real_escape_string($_POST['hilight']);
$why_this = mysql_real_escape_string($_POST['why_this']);
$location_id = mysql_real_escape_string($_POST['location_id']);
$city = mysql_real_escape_string($_POST['city']);
$duration = mysql_real_escape_string($_POST['duration']);

$deparchture_point = mysql_real_escape_string($_POST['deparchture_point']);
$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
$return_detail = mysql_real_escape_string($_POST['return_detail']);
$inclusions = mysql_real_escape_string($_POST['inclusions']);
$exclusions = mysql_real_escape_string($_POST['exclusions']);
$voucher_info = mysql_real_escape_string($_POST['voucher_info']);
$local_operator_info = mysql_real_escape_string($_POST['local_operator_info']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$status = "pending";


	$sql   = "insert into tour(tour_type,title,overview,hilight,why_this,location_id,city,duration,deparchture_point,deparchture_time,return_detail,inclusions,exclusions,voucher_info,local_operator_info,supplier_id,status) values ('$tour_type','$title','$overview','$hilight','$why_this','$location_id','$city','$duration','$deparchture_point','$deparchture_time','$return_detail','$inclusions','$exclusions','$voucher_info','$local_operator_info','$supplier_id','$status')";
	$query = mysql_query($sql);
	 if($query){
		echo "create tour successful";
	}else {
		echo "error";
	} 

?>
