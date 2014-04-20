
<?php
 include('../../include/database/db.php'); 

$user_id = mysql_real_escape_string($_POST['user_id']);
 //echo $tour_id;exit;
	$sql = mysql_query("DELETE from user WHERE  id = $user_id");
	if($sql)
	{
		echo "DELETE";
	}
	else {
		echo "error";
	}

?>