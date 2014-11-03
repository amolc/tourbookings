
<?php
 include('../../include/database/db.php');

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$amount_deposit = mysql_real_escape_string($_POST['amount_deposit']);
// echo $amount_deposit;
	$sql = mysql_query("UPDATE Supplier_Booking SET status = 'confirm' WHERE  id = $tour_id");

			$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$current_date = date("m/d/Y", $today_date);
		
 session_start();
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
			$sql3 = mysql_query("SELECT
									available_balance
									FROM
									supplier_balance
									WHERE  supplier_id = '".$supplier_id."'
									");
			while ($row = mysql_fetch_array($sql3))
				{
					$supplier_balance = $row['available_balance'];

				}
				$total = $supplier_balance +  $amount_deposit;
			// echo $amount_deposit;
			// echo $total;
			

		$sql2   = "insert into supplier_balance(supplier_id,available_balance,amount_deposit,type,description,insert_date) values ('$supplier_id','$total','$amount_deposit','deposit','earning from booking','$current_date')";
			$query = mysql_query($sql2);

			if($query)
			{
				echo "true";
			}
			else {
				echo "error";
			}
	if($sql)
	{

		echo "confirm tour booking";
	}
	else {
		echo "error";
	}

?>