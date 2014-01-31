
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE booking SET status = 'confirm' WHERE  id = $tour_id");
	if($sql)
	{
		echo "confirm";
	}
	else {
		echo "error";
	}

?>