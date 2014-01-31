
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE tour SET status = 'accepted' WHERE  id = $tour_id");
	if($sql)
	{
		echo "accepted";
	}
	else {
		echo "error";
	}

?>