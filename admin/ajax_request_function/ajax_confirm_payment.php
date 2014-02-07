
<?php
 include('../../include/database/db.php'); 

$payment_id = mysql_real_escape_string($_POST['payment_id']);
$supplier_email = mysql_real_escape_string($_POST['supplier_email']);
echo $$supplier_email;

	$sql = mysql_query("UPDATE payment SET status = 'confirm' WHERE  id = $payment_id");
	if($sql)
	{
			$to1 = $supplier_email;
			$subject1 = '<h2>Booking Confirmation</h2>'; 
			$message1 = '<h6>Dear Partner,</h6>

							<p>
								Congratulation. Your Tour Has Been Booked Recently 
								Please Login with Your Credential And Confirm Your Pending Booking
						
							</p>

							<p>Best Regards,</p>

							<p>Tour Bookings</p>';
						
			$headers1  = 'MIME-Version: 1.0' . "\r\n";
		$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers1 .= 'To: '.$email.'' . "\r\n";
		$headers1 .= 'From: apache@iamamol.com' . "\r\n";

		$mail_sent1 = mail( $to1, $subject1, $message1, $headers1 );
	
		echo $mail_sent1 ? " confirm &  Email Has Been Sent To Supplier" : "Mail failed";
		// echo "confirm";
	}
	else {
		echo "error";
	}

?>