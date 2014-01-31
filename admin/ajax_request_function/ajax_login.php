<?php 

 include('../../include/database/db.php'); 

$name = mysql_real_escape_string($_POST['name']);
$password = mysql_real_escape_string($_POST['password']);
// echo $name;
	$sql = mysql_query('SELECT * FROM admin where name ="'.$name.'" AND password ="'.$password.'"');

// Mysql_num_row is counting table row
$row = mysql_fetch_array($sql);

if($row['name'] == $name && $row['password'] == $password){
		echo "1";
		session_start();
		// store session data
		$_SESSION['admin'] = $row['name'];
	}else {
		echo "0";
	} 
// if($email == "" || $admin_pass == "")
// {
	// echo "0";
// }
?>