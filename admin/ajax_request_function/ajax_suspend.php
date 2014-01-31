
<?php
 include('../../include/database/db.php'); 

$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE supplier_payment SET status = 'suspend' WHERE  supplier_id = $supplier_id");
	if($sql)
	{
		echo "Suspended";
	}
	else {
		echo "error";
	}

?>