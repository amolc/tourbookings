<?php 

include('../include/database/db.php'); 
session_start();
		$name = $_SESSION['user_name']; 
        $old_pass = mysql_real_escape_string($_POST['old_pass']);


	$sql = mysql_query('SELECT * FROM user where email ="'.$name.'" AND password ="'.$old_pass.'"');
    $row = mysql_fetch_array($sql);

if($row['email'] != $name && $row['password'] != $old_pass){

		echo "1";
	}
?>