
<?php
 include('../../include/database/db.php'); 

$id = mysql_real_escape_string($_POST['id']);

	$sql = mysql_query("UPDATE supplier_balance SET status = 'accepted' WHERE  id = $id");
	if($sql)
	{
		echo "confirm tour Withdraw";
	}
	else {
		echo "error";
	}

?>