<?php include('../../include/database/db.php'); 

$select_currency_id = mysql_real_escape_string($_POST['select_currency_id']);
// echo $select_currency_id;
$sql = mysql_query('SELECT * FROM tour_price where currency_id = "'.$select_currency_id.'"');
     $count = mysql_fetch_array($sql);
	 echo $count['price_per_person'].",".$count['price_child'].",".$count['price_adult'];
	  
?>
