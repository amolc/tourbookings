
<?php
 include('../../include/database/db.php'); 

$id = mysql_real_escape_string($_POST['id']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$withdraw_amount = mysql_real_escape_string($_POST['withdraw_amount']);
	$sql4 = mysql_query("SELECT   available_balance
											FROM
											supplier_balance
											WHERE  supplier_id = '".$supplier_id."'
											");
						while ($row4 = mysql_fetch_array($sql4)) 
							{
								$supplier_balance4 = $row4['available_balance'];
							
							}
								// if($withdraw_amount > $supplier_balance4 || $withdraw_amount < 0)
							// {
								// echo"Amount Withdraw can't be more then availabe balance";
							// }
							// else 
							// {
								$total = "";
								// $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
								// $current_date = date("m/d/Y", $today_date);
								$total = $supplier_balance4 - $withdraw_amount; 
								// $sql2   = "insert into supplier_balance(supplier_id,account_id,available_balance,amount_deposit,type,description,amount_withdraw,status,insert_date) values ('$supplier_id','$account_id','$total','0','withdraw','withdraw','$withdraw_amount','pending','$current_date')";
								// $query = mysql_query($sql2);
								
								// if($query)
								// {
									// echo "Thank You withdraw Successfully!";
								// }
								// else {
									// echo "error";
								// }
							// }
	$sql = mysql_query("UPDATE supplier_balance SET available_balance ='$total' , status = 'accepted' WHERE  id = $id");
	if($sql)
	{
	
		
		echo "confirm tour Withdraw";
	}
	else {
		echo "error";
	}

// $id = mysql_real_escape_string($_POST['id']);

	// $sql = mysql_query("UPDATE supplier_balance SET status = 'accepted' WHERE  id = $id");
	// if($sql)
	// {
		// echo "confirm tour Withdraw";
	// }
	// else {
		// echo "error";
	// }

?>