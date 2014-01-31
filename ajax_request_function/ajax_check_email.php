<?php 

include('../include/database/db.php'); 

$email = mysql_real_escape_string($_POST['email']);
// echo $email;
$sql = mysql_query("SELECT * FROM supplier WHERE email='".$email."'");


$username_exist = mysql_num_rows($sql); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) {
		echo 'Email Already Exit';
	}else{
		// die('<img src="imgs/available.png" />');
	}
// $row = mysql_fetch_array($sql);

// if($row['email'] == $email){

		// echo "Email Already Exit";
	// }else {
		// echo "0";
	// } 
	
	
	/*//check we have username post var
if(isset($_POST["email"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//try connect to db
	// $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
	
	//trim and lowercase username
	$email =  strtolower(trim($_POST["email"])); 
	
	//sanitize username
	$email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	//check username in db
	// $results = mysqli_query($connecDB,"SELECT id FROM username_list WHERE email='$email'");
	$results = mysql_query("SELECT * FROM supplier WHERE email='$email'");
	
	//return total count
	$username_exist = mysql_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) {
		die('Email Already Exit');
	}else{
		// die('<img src="imgs/available.png" />');
	}
	
	//close db connection
	// mysqli_close($connecDB);
}*/

?>