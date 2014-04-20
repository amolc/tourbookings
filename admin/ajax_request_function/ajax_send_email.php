<?php 

	 include('../../include/database/db.php'); 
	 #include mailgun libraries
	 include('../vendor/autoload.php');
	 use Mailgun\Mailgun;
	// $to = $_POST['to'];
	// print_r($_POST['to']);
	// echo [0]; 
	$postData = $_POST['to'];
	$subject = mysql_real_escape_string($_POST['subject']); 
	$message = mysql_real_escape_string($_POST['message']); 
	$from = "marketing@fountaintechies.com";
	if(is_array($postData)){
		foreach($postData as $key=>$value){
		
			$postData[$key] =  mysql_real_escape_string(trim($value));
			$to = $postData[$key];
			
			$mg_api = 'key-4vyeldmso9oe3t8gitphksdwz9p0tpw5';
			$mg_version = 'api.mailgun.net/v2/';
			$mg_domain = "fountaintechies.com";
			$mg_from_email = "info@samples.com";
			$mg_message_url = "https://".$mg_version.$mg_domain."/messages";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
			curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_VERBOSE, 0);
			curl_setopt ($ch, CURLOPT_HEADER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true); 
			//curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
			curl_setopt($ch, CURLOPT_HEADER, false); 
			//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_URL, $mg_message_url);
			curl_setopt($ch, CURLOPT_POSTFIELDS,                
					array(  'from'      => '<' . $from . '>',
							'to'        => $to,
							'subject'   => $subject,
							'text'      => $message

						));
			$result = curl_exec($ch);
			curl_close($ch);
			$res = json_decode($result,TRUE);
			if (!empty($res)){
			echo "Mail Sent ";
			}
			else
			{
			echo "Mail Failed ";
			}			
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