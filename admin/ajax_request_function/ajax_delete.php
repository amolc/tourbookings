
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
 //echo $tour_id;exit;
	$sql = mysql_query("DELETE from tour WHERE  id = $tour_id"
	);
	$sql2 = mysql_query("DELETE from tour_price WHERE  tour_id = $tour_id"
	);
	$sql3 = mysql_query("DELETE from tour_photo WHERE  tour_id = $tour_id"
	);
	if($sql && $sql2 && $sql3 )
	{
		echo "DELETE";
	}
	else {
		echo "error";
	}

?>