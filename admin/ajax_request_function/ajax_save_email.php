<?php 

	 include('../../include/database/db.php'); 
	
	$to = mysql_real_escape_string($_POST['to']);
	$subject = mysql_real_escape_string($_POST['subject']); 
	$message = mysql_real_escape_string($_POST['message']);
	$from = mysql_real_escape_string($_POST['from']); 
	
	$query = "insert into email_template(message_from,message_to,message_subject,text) values('$from','$to','$subject','$message')";
		mysql_query($query)or die(mysql_error());
          
?>