<?php 

 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$photo_title = mysql_real_escape_string($_POST['photo_title']);

$photo_url = mysql_real_escape_string($_POST['photo_url']);
$description = mysql_real_escape_string($_POST['description']);

	$sql   = "insert into tour_photo(tour_id,title,url,description) values ('$tour_id','$photo_title','$photo_url','$description')";
	$query = mysql_query($sql);
	 if($query){
		echo "upload tour successful";
	}else {
		echo "error";
	} 

?>
