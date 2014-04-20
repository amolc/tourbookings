<?php 

	include('../../include/database/db.php'); 

	$name = mysql_real_escape_string($_POST['name']);
	$password = mysql_real_escape_string($_POST['password']);
	// echo $name;
	if($name =='' || $password =='')  
	{
		echo"Please Fill The Required Fields";
	}		
	else
	{
		$sql = mysql_query('SELECT * FROM supplier where email ="'.$name.'" AND password ="'.$password.'"');

		// Mysql_num_row is counting table row
		$row = mysql_fetch_array($sql); 

		if($row['email'] == $name && $row['password'] == $password)
		{
			echo "1";
			session_start();
			// store session data 
			$_SESSION['supplier_id'] = $row['id'];
			$_SESSION['supplier_name'] = $row['first_name'];
			$_SESSION['company_name'] = $row['company_name'];
			// header("Location:dashboard.php");

		}
		else
		{
			echo "username and password wrong";
		} 
	}
?>