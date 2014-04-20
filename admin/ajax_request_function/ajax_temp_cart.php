<?php
$tour_title = mysql_real_escape_string($_POST['tour_title']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$price_per_person = mysql_real_escape_string($_POST['price_per_person']);
$temp_product_code = mysql_real_escape_string($_POST['temp_product_code']);
$temp_return_url = mysql_real_escape_string($_POST['temp_type']);
echo $tour_title.'<br>';
echo $supplier_id.'<br>';
echo $price_per_person.'<br>';
?>