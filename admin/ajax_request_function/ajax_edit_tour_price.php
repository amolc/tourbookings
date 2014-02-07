<?php 
 include('../../include/database/db.php'); 


	$tour_id = mysql_real_escape_string($_POST['tour_id']);
		echo $tour_id;
$currency_id = mysql_real_escape_string($_POST['currency_id']);
echo $currency_id;
$price_per_person = mysql_real_escape_string($_POST['price_per_person']);
$price_child = mysql_real_escape_string($_POST['price_child']);
// $price_partner_adult = mysql_real_escape_string($_POST['price_partner_adult']);
// $price_partner_child = mysql_real_escape_string($_POST['price_partner_child']);


    $query_update = "UPDATE tour_price
	SET currency_id='".$currency_id."',  price_per_person='".$price_per_person."', 
		price_child='".$price_child."'
        WHERE tour_id='".$tour_id."'";
        $result = mysql_query($query_update) or die('Error, query failed');        

		 if($result){
			echo "Successfull";
		}else {
			echo "error";
		} 
      


?>