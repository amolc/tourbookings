<?php 

	include('../../include/database/db.php'); 

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	// echo $name;
	if($username =='' || $password =='')  
	{
		echo"Please Fill The Required Fields";
	}		
	else
	{
		$sql = mysql_query('SELECT * FROM supplier where user_name ="'.$username.'" AND password ="'.$password.'"');

		// Mysql_num_row is counting table row
		$row = mysql_fetch_array($sql); 

		if($row['user_name'] == $username && $row['password'] == $password)
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