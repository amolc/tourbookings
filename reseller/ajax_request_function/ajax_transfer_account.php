
<?php
 include('../../include/database/db.php'); 

// $tour_id = mysql_real_escape_string($_POST['supplier_id']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$amount_receive = mysql_real_escape_string($_POST['total_payment']);
// echo $tour_id;
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/Y", $today_date);
	$sql = mysql_query("UPDATE booking SET withdraw = 'true' WHERE  supplier_id = '".$supplier_id."'");
	$sql3 = mysql_query("SELECT
							MAX(available_balance) as b
							FROM
							supplier_balance
							WHERE  supplier_id = '".$supplier_id."'
							");
	while ($row = mysql_fetch_array($sql3)) 
		{
			$supplier_balance = $row['b'];
		
		}
		$total = $amount_receive + $supplier_balance;
	echo $total;
	// $sql4 = mysql_query("DELETE  from supplier_balance  WHERE  supplier_id = '".$supplier_id."'");
	
$sql2   = "insert into supplier_balance(supplier_id,available_balance,amount_receive,insert_date) values ('$supplier_id','$total','$amount_receive','$current_date')";
	$query = mysql_query($sql2);
	
	if($sql)
	{
		echo "true";
	}
	else {
		echo "error";
	}

?>