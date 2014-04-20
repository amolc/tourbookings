<?php
 include('../include/database/db.php'); 
 
 
 $que_res = mysql_query("select * from que where status='pending'")or die(mysql_error());
 $counter =1;
 while($que_row = mysql_fetch_array($que_res))
 {
     if($counter <= 15){
	 $que_from = $que_row['message_from'];
	 $que_subject = $que_row['message_subject'];
	 $que_message = $que_row['text'];
	 $to = $que_row['message_to'];
	 $id = $que_row['id'];
	 $enter_date = date('m/d/Y H:i:s');

			//sending mail via mail gun
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
			curl_setopt($ch, CURLOPT_HEADER, false); 
			curl_setopt($ch, CURLOPT_URL, $mg_message_url);
			curl_setopt($ch, CURLOPT_POSTFIELDS,                
					array(  'from'      => '<' .$que_from. '>',
							'to'        => $to,
							'subject'   => $que_subject,
							'html'      => $que_message
						));
			$result = curl_exec($ch);
			curl_close($ch);
			$res = json_decode($result,TRUE);
			 	 
	 mysql_query("UPDATE que set status='sent',sent_date='$enter_date' where id ='$id'") or die(mysql_error());
	 $counter ++;
	 }
	
	 
 }  //end of while 
 
 header("Location:que.php?que=ok");
 
?>