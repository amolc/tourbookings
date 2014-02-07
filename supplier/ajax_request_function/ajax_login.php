<?php 

 include('../../include/database/db.php'); 

$name = mysql_real_escape_string($_POST['name']);
$password = mysql_real_escape_string($_POST['password']);
// echo $name;
	$sql = mysql_query('SELECT * FROM supplier where email ="'.$name.'" AND password ="'.$password.'"');

// Mysql_num_row is counting table row
$row = mysql_fetch_array($sql);

if($row['email'] == $name && $row['password'] == $password){
		echo "1";
		session_start();
		// store session data
		$_SESSION['supplier_id'] = $row['id'];
		$_SESSION['company_name'] = $row['company_name'];
		
	}else {
		echo "0";
	} 
// if($email == "" || $admin_pass == "")
// {
	// echo "0";
// }
?>