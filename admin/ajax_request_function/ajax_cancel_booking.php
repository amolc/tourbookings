
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE booking SET status = 'cancel' WHERE  id = $tour_id");
	if($sql)
	{
		echo "cancel tour booking ";
	}
	else {
		echo "error";
	}

?>