
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$sql = mysql_query("UPDATE Supplier_Booking SET status = 'confirm' WHERE  id = $tour_id");

$supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
			   while ($supplier_row = mysql_fetch_array($supplier_result)) {
						
						$supplier_email = $supplier_row ['email'];
							
			   }
			
						// $email ="raza.malik@fountaintechies.com";
						$to1 = $supplier_email;
						// $to1 ='';
						$subject1 = "email confirmation of booking"; 
						// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
						$message1 = '
									email confirmation of booking

										Dear Supplier,

										Your booking has been confirmed. All the information that you will require can 

										be found below. Kindly retain a copy of this email for future reference.
										
										Best Regards,

										Tour Bookings ';
									
						$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Additional headers
					$headers1 .= 'To: '.$email.'' . "\r\n";
					$headers1 .= 'From: apache@iamamol.com' . "\r\n";

						
						

						

						$mail_sent1 = mail( $to1, $subject1, $message1, $headers1 );
						
						//echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
		
	
	if($sql)
	{
		echo "confirm tour booking";
	}
	else {
		echo "error";
	}

?>