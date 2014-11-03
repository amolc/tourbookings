
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE booking SET status = 'confirm' WHERE  id = $tour_id");
	$result = mysql_query("SELECT
									booking.id,
									booking.tour_id,
									booking.user_id,
									booking.start_date,
									booking.status,
									payment.total_price,
									booking.supplier_id,
									tour_price.price_per_person,
									tour.title,
									tour.overview,
                                                                        tour.duration,
									tour.city AS tour_city,
									tour.location_id AS tour_country,
									supplier.first_name AS supplier_first_name,
									supplier.last_name AS supplier_last_name,
									supplier.company_name,
									supplier.email AS supplier_email,
									supplier.city AS supplier_city,
									supplier.country AS supplier_country,
									user.first_name AS user_first_name,
									user.last_name AS user_last_name,
									user.country AS user_country,
									user.city AS user_city,
									user.email AS user_email,
									user.phone AS user_phone,
									user.address AS user_address,
									traveler.last_name as traveler_last_name ,
									traveler.first_name as traveler_first_name
									FROM
									booking
									INNER JOIN tour ON tour.id = booking.tour_id
									INNER JOIN tour_price ON tour_price.tour_id = tour.id
									INNER JOIN user ON user.id = booking.user_id
									INNER JOIN supplier ON supplier.id = booking.supplier_id
									INNER JOIN payment ON payment.id = booking.payment_id
									INNER JOIN traveler ON user.id = traveler.user_id AND tour.id = traveler.tour_id
									WHERE booking.status = 'confirm' AND booking.supplier_id = '".$supplier_id."'
									AND booking.withdraw !='true'
									GROUP BY booking.id
									ORDER BY booking.id DESC
									");

                
		while ($row = mysql_fetch_array($result)) 
		{
			$amount_deposit = $row['total_price'];

		}

	
			$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$current_date = date("m/d/Y", $today_date);
			$sql4 = mysql_query("UPDATE booking SET withdraw = 'true' WHERE  supplier_id = '".$supplier_id."'");
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
				$total = $amount_deposit + $supplier_balance;
			// echo $total;
			// $sql4 = mysql_query("DELETE  from supplier_balance  WHERE  supplier_id = '".$supplier_id."'");
			
		$sql2   = "insert into supplier_balance(supplier_id,available_balance,amount_deposit,type,description,status,insert_date) values ('$supplier_id','$total','$amount_deposit','deposit','earning from booking','accepted','$current_date')";
			$query = mysql_query($sql2);
			
			if($query)
			{
				// echo "true";
			}
			else {
				echo "error";
			}
	if($sql)
	{
		echo "confirm";
	}
	else {
		echo "error";
	}

?>