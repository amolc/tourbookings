
<?php
 include('../../include/database/db.php'); 

$payment_id = mysql_real_escape_string($_POST['payment_id']);
$supplier_email = mysql_real_escape_string($_POST['supplier_email']);
echo $$supplier_email;

	$sql = mysql_query("UPDATE payment SET status = 'confirm' WHERE  id = $payment_id");
	if($sql)
	{
			$to1 = $supplier_email;
			$subject1 = 'Booking Confirmation'; 
			$message1 = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<style>
body { margin:0px; padding:0px;}
</style>
</head>

<body>
 <div style="width:500px; min-height:450px; margin:0 auto; background:#e2e2e2;">
    
     <div style="width:440px; min-height:390px; margin:30px; float:left; background:white;">
         <div style="width:440px; height:80px; border-bottom:#e1e1e1 solid 1px; background:#f5f5f5;">
             <a href="#" style="margin:18px 20px 0px 19px;">
				<img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
             <p style="margin: 15px;margin-top: 2px;font-family:Arial, Helvetica, sans-serif;color:#fd8900 !important;"><b>Bringing out the traveler in you!</b></p>
            </div>
   
            
            <div style="width:440px; float:left;">
             <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;">
				<span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$first_name.' '.$last_name.'
			</h1>
                
                <p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
					Congratulation! A customer has just booked your through Tourbookings!
				</p>
				<br />
					<table width="442" height="244" border="1">
					  <tr>
						<td>Destination:'.$country.'</td>
						<td colspan="2">Travel Date: '.$start_date.'</td>
					  </tr>
					  <tr>
						<td>'.$trip_title.'</td>
						<td>Adult:'.$N.'</td>
						<td>Child'.$N1.'</td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td colspan="2">Total: $'.$total.'</td>
					  </tr>
					</table>
					<br />
					<p>The Tourbookings Team</p>
				<p>Follow us on <a href="https://www.facebook.com/">Facebook</a> or <a href="http://instagram.com/">instagram</a> </p>
				<br />
				<p>If you have any problems,please feel free to contact us at support@tourbookings.co
				</p>
				
		   </div>


        </div>
        <div style="clear:both;"></div>
   </div>
</body>
</html>;
						
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


			// $message1 = '<h6>Dear Partner,</h6>

							// <p>
								// Congratulation. Your Tour Has Been Booked Recently 
								// Please Login with Your Credential And Confirm Your Pending Booking
						
							// </p>

							// <p>Best Regards,</p>

							// <p>Tour Bookings</p>';
							?>