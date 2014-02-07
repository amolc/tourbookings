<?php 

 include('../../include/database/db.php'); 

$currency_id = mysql_real_escape_string($_POST['currency_id']);
// echo $currency_id;
$tour_id = mysql_real_escape_string($_POST['tour_id']);
// $tour_id = $tour_id2 - 1;
// $price_partner_adult = mysql_real_escape_string($_POST['price_partner_adult']);
// $price_partner_child = mysql_real_escape_string($_POST['price_partner_child']);
$price_per_person = mysql_real_escape_string($_POST['price_per_person']);
$price_child = mysql_real_escape_string($_POST['price_child']);
$price_adult = mysql_real_escape_string($_POST['price_adult']);

	$sql   = "insert into tour_price(currency_id,tour_id,price_per_person,price_child,price_adult) values ('$currency_id','$tour_id','$price_per_person','$price_child','$price_adult')";
	$query = mysql_query($sql);
	 if($query){
		echo "price tour successful";
	} else {
		echo "error";
	} 

?>
