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

    $query_update = "UPDATE marketing
	SET name='".$name."',  email='".$email."', 
		contact_number='".$contact_number."'
		company_name='".$company_name."'
		address='".$address."'
		city='".$city."'
		country='".$country."'
        WHERE id='".$id."'";
        $result = mysql_query($query_update) or die('Error, query failed');        

		 if($result){
			echo "Successfull";
		}else {
			echo "error";
		} 
      


?>