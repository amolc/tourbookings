<?php 

	 include('../../include/database/db.php'); 
	// $to = $_POST['to'];
	// print_r($_POST['to']);
	// echo [0];
	
	$postData = $_POST['to'];
	$subject = mysql_real_escape_string($_POST['subject']); 
	$message = mysql_real_escape_string($_POST['message']); 
	$headers = 'razamalik@outlook.com';
	if(is_array($postData)){
		foreach($postData as $key=>$value){
			$postData[$key] =  mysql_real_escape_string(trim($value));
			// echo $postData[$key].',';
				

	$to = $postData[$key];
	

	

	$mail_sent = mail( $to, $subject, $message, $headers );
	
	echo $mail_sent ? "Mail sent" : "Mail failed";
			
		}
	}
	// $ids = array_map('intval', $_POST['to']);
// print_r($ids);

// echo $to;
	// $subject = mysql_real_escape_string($_POST['subject']); 

	//define the message to be sent. Each line should be separated with \n
	// $message = mysql_real_escape_string($_POST['message']); 

	//define the headers we want passed. Note that they are separated with \r\n
	// $headers = 'razamalik@outlook.com';

	//send the email
	// $mail_sent = mail( $to, $subject, $message, $headers );
	//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
	// echo $mail_sent ? "Mail sent" : "Mail failed";

?>