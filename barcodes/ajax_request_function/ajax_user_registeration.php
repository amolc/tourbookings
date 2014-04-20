<?php 

 include('../include/database/db.php'); 

$first_name = mysql_real_escape_string($_POST['first_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);

$password = mysql_real_escape_string($_POST['password']);
$gender = mysql_real_escape_string($_POST['gender']);
$age = mysql_real_escape_string($_POST['age']);
$country = mysql_real_escape_string($_POST['country']);
$city = mysql_real_escape_string($_POST['city']);
$address = mysql_real_escape_string($_POST['address']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

	$sql   = "insert into user(first_name,last_name,password,gender,age,country,city,address,phone,email) values ('$first_name','$last_name','$password','$gender','$age','$country','$city','$address','$phone','$email')";
	$query = mysql_query($sql);
	 if($query){
		echo "registration successful";
	}else {
		echo "error";
	} 

?>
