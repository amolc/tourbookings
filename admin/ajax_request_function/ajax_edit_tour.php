<?php 
 include('../../include/database/db.php'); 


	$tour_id = mysql_real_escape_string($_POST['tour_id']);
		// echo $tour_id;
$title = mysql_real_escape_string($_POST['title']);
// echo $title;
$overview = mysql_real_escape_string($_POST['overview']);
$hilight = mysql_real_escape_string($_POST['hilight']);
$why_this = mysql_real_escape_string($_POST['why_this']);
$location_id = mysql_real_escape_string($_POST['location_id']);
$duration = mysql_real_escape_string($_POST['duration']);

$deparchture_point = mysql_real_escape_string($_POST['deparchture_point']);
$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
$return_detail = mysql_real_escape_string($_POST['return_detail']);
$inclusions = mysql_real_escape_string($_POST['inclusions']);
$exclusions = mysql_real_escape_string($_POST['exclusions']);
$voucher_info = mysql_real_escape_string($_POST['voucher_info']);
$local_operator_info = mysql_real_escape_string($_POST['local_operator_info']);
// echo $local_operator_info;
// $supplier_id = mysql_real_escape_string($_POST['supplier_id']);

	
	// $query ="SELECT * FROM tour WHERE id = '".$tour_id."'";
// $testResult = mysql_query($query) or die('Error, query failed');    

// if(mysql_fetch_array($testResult) == NULL){

// }else{
    //update...
    $query_update = "UPDATE tour
        SET title='".$title."', overview='".$overview."', 
		hilight='".$hilight."', why_this='".$why_this."',
		location_id='".$location_id."', duration='".$duration."',
		deparchture_point='".$deparchture_point."', deparchture_time='".$deparchture_time."', 
		return_detail='".$return_detail."', inclusions='".$inclusions."',
		exclusions='".$exclusions."', voucher_info='".$voucher_info."',
		local_operator_info='".$local_operator_info."'
        WHERE id='".$tour_id."'";
        $result = mysql_query($query_update) or die('Error, query failed');        
// }
		 if($result){
			echo "Successfull";
		}else {
			echo "error";
		} 
      


?>