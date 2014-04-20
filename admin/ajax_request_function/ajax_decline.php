
<?php
 include('../../include/database/db.php'); 

$tour_id = mysql_real_escape_string($_POST['tour_id']);
$reason_mesg = mysql_real_escape_string($_POST['reason_mesg']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
// echo $tour_id;
	$sql = mysql_query("UPDATE tour SET status = 'declined' WHERE  id = $tour_id");
	if($sql)
	{

	
	$sql3 = mysql_query("SELECT *
							FROM
							supplier
							WHERE  id = '".$supplier_id."'
							");
	while ($row = mysql_fetch_array($sql3)) 
		{
			$supplier_first_name = $row['first_name'];
			$supplier_last_name = $row['last_name'];
			$supplier_email = $row['email'];
		
		}
		
		echo "declined";
		$to2 = $supplier_email; 
						// $to1 ='';
						$subject2 = "Declined"; 
						// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
						$message2 = '
										<b>Dear '.$supplier_first_name.' '.$supplier_last_name.',</b>
										<div>
										Your Tour Declined due that reason <br />
										'.$reason_mesg.'
										</div>
										<br />
										<br />
										
										<br /><br /><br />
										<div>
											<b>Best Regards,</b>
										</div>
										<div>
											Tour Bookings 
										</div>
										';
										
									
						$headers2  = 'MIME-Version: 1.0' . "\r\n";
					$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Additional headers 
					$headers2 .= 'To: support@tourbookings.co' . "\r\n";
					$headers2 .= 'From: support@tourbookings.co' . "\r\n";

					// $headers2 .= 'Cc: '.$customer_email.'' . "\r\n"; 

						$mail_sent1 = mail( $to2, $subject2, $message2, $headers2 );
						
						// echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
	}
	else {
		echo "error";
	}

?>