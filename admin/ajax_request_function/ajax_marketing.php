<?php 

 include('../../include/database/db.php'); 

$name = mysql_real_escape_string($_POST['name']);
// echo $name;
$email = mysql_real_escape_string($_POST['email']);
$contact_number = mysql_real_escape_string($_POST['contact_number']);
$company_name = mysql_real_escape_string($_POST['company_name']);

$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$country = mysql_real_escape_string($_POST['country']);

	$sql   = "insert into marketing(name,email,contact_number,company_name,address,city,country) values ('$name','$email','$contact_number','$company_name','$address','$city','$country')";
	$query = mysql_query($sql);
	 if($query){
		echo "create marketing successful";
	}else {
		echo "error";
	} 

?>
