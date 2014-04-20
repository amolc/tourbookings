<?php 

 include('../include/database/db.php'); 

$user_id = mysql_real_escape_string($_POST['user_id']);

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$poi_id = mysql_real_escape_string($_POST['poi_id']);
$trip_title = mysql_real_escape_string($_POST['trip_title']);
$is_public = mysql_real_escape_string($_POST['is_public']);
$start_date = mysql_real_escape_string($_POST['start_date']);
$end_date = mysql_real_escape_string($_POST['end_date']);
$tags = mysql_real_escape_string($_POST['tags']);
$user_status = mysql_real_escape_string($_POST['user_status']);
$supplier_status = mysql_real_escape_string($_POST['supplier_status']);

$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/Y", $today_date);
// $current_date = mysql_real_escape_string($_POST['current_date']);
// echo $poi_id;
	$sql   = "insert into intinerary(user_id,tour_id,poi_id,trip_title,is_public,start_date,end_date,tags,user_status,supplier_status,insert_date) values('".$user_id."','".$tour_id."','".$poi_id."','".$trip_title."','".$is_public."','".$start_date."','".$end_date."','".$tags."','".$user_status."','".$supplier_status."','".$current_date."')";
	// print_r($sql);
	$query = mysql_query($sql);
	 if($query){
		echo "successful";
	}else {
		echo "error";
	} 

?>
