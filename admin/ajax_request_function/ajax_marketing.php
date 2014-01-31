<?php 

 include('../../include/database/db.php'); 

$name = mysql_real_escape_string($_POST['name']);
// echo $name;
$email = mysql_real_escape_string($_POST['email']);
$company_name = mysql_real_escape_string($_POST['company_name']);
$city = mysql_real_escape_string($_POST['city']);
$country = mysql_real_escape_string($_POST['country']);

	$sql   = "insert into marketing(name,email,company_name,city,country) values ('$name','$email','$company_name','$city','$country')";
	$query = mysql_query($sql);
	 if($query){
		echo "create marketing successful";
	}else {
		echo "error";
	} 

?>
