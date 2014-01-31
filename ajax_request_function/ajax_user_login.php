<?php 

include('../include/database/db.php'); 

$name = mysql_real_escape_string($_POST['name']);
$password = mysql_real_escape_string($_POST['password']);

	$sql = mysql_query('SELECT * FROM user where email ="'.$name.'" AND password ="'.$password.'"');


$row = mysql_fetch_array($sql);

if($row['email'] == $name && $row['password'] == $password){
		
		session_start();
		// store session data
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['email'];
		// header(location:'index.php');
		echo "1";
	}else {
		echo "0";
	} 
// if($email == "" || $admin_pass == "")
// {
	// echo "0";
// }
?>