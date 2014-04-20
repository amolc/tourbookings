
<?php
 include('../../include/database/db.php'); 

$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
 //echo $tour_id;exit;
	$sql = mysql_query("DELETE from supplier WHERE  id = $supplier_id");
	$sql2 = mysql_query("DELETE from tour WHERE  supplier_id = $supplier_id");
	// $sql2 = mysql_query("DELETE from tour_price WHERE  supplier_id = $supplier_id");
	// $sql3 = mysql_query("DELETE from tour_photo WHERE  tour_id = $tour_id"); 
	if($sql && $sql2 )
	{
		echo "DELETE Successful";
	}
	else {
		echo "error";
	}

?>