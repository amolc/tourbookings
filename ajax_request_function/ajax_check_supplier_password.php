<?php 

include('../../include/database/db.php'); 
session_start();
		$id = $_SESSION['supplier_id']; 
		print_r($id);exit;
        $old_pass = mysql_real_escape_string($_POST['old_pass']);


	$sql = mysql_query('SELECT * FROM supplier where id ="'.$id.'" AND password ="'.$old_pass.'"');
    $row = mysql_fetch_array($sql);
	

if($row['email'] != $name && $row['password'] != $old_pass){

		echo "1";
	}
?>