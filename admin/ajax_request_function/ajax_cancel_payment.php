
<?php
 include('../../include/database/db.php'); 

$payment_id = mysql_real_escape_string($_POST['payment_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE payment SET status = 'cancel' WHERE  id = $payment_id");
	if($sql)
	{
		echo "cancel ";
	}
	else {
		echo "error";
	}

?>