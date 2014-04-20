
<?php
 include('../../include/database/db.php'); 

$id = mysql_real_escape_string($_POST['id']);
$sid = mysql_real_escape_string($_POST['sid']);

	$sql = mysql_query("UPDATE supplier_balance SET status = 'accepted' WHERE  id = $id");
	if($sql)
	{
	$supplier_result = mysql_query("select * from supplier where id ='".$sid."'");
							$supplier_row = mysql_fetch_array($supplier_result); 					
							$supplier_email = $supplier_row ['email'];
							$supplier_fname = $supplier_row ['first_name'];
							$supplier_lname = $supplier_row ['last_name'];
									   
								$to = $supplier_email ;					
								$subject = "Deposit Confirmation";
								$message = '<!doctype html>
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
												 <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
												 <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
												</div>
									   
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">We have received your deposit made.
													<br />
													You will now be able to view and utilise the amount in your account with us to purchase other tours through the My Shop feature in your portal.
													</p>
												</div>
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

									<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
												</div>
											</div>
											<div style="clear:both;"></div>
									   </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$email.'' . "\r\n";
									$headers .= 'From: apache@iamamol.com' . "\r\n";					
									mail( $to, $subject, $message, $headers );
		echo "confirm tour Deposit";
	}
	else {
	
	$supplier_result = mysql_query("select * from supplier where id ='".$sid."'");
							$supplier_row = mysql_fetch_array($supplier_result); 					
							$supplier_email = $supplier_row ['email'];
							$supplier_fname = $supplier_row ['first_name'];
							$supplier_lname = $supplier_row ['last_name'];
									   
								$to = $supplier_email ;					
								$subject = "Deposit Failed";
								$message = '<!doctype html>
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
												 <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
												 <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
												</div>
									   
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">We regret to inform you that your recent deposit has failed to reach us.
													<br />
													Kindly try again and contact us if this issue persists .

													</p>
												</div>
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

									<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
												</div>
											</div>
											<div style="clear:both;"></div>
									   </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$email.'' . "\r\n";
									$headers .= 'From: apache@iamamol.com' . "\r\n";					
									mail( $to, $subject, $message, $headers );
		echo "error";
	}

?>