
<?php
 include('../../include/database/db.php'); 

$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
// echo $tour_id;
$timestamp = time()-86400;
$date = strtotime("+30 day", $timestamp);
$exp_date = date("m/d/Y", $date);
	$sql = mysql_query("UPDATE supplier_payment SET status = 'extended' , exp_date ='$exp_date' WHERE  supplier_id = $supplier_id");
	if($sql)
	{
		echo "Your Date Extended";
	}
	else {
		echo "error";
	}

?>