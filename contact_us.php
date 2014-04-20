<?php
	
	if(isset($_REQUEST['Submit']))
	{
	$name = ($_POST['name']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);
	$Description = ($_POST['Description']);
	
					//mail to admin
					$to = "apache@iamamol.com" ;
					$subject =  "Partner Membership"; 
					$message = "<b>Dear Admin</b>
								<p></p>
								<p>MY Login Information :</p>
								<p>Name: $name</p>
								<p>Email: $email</p>
								<p>Phone: $phone </p>
								<p>Description: $Description </p>							
								<h2>Regards</h2>
								<p>$name</p>
								"; 									
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: '.$email. "\r\n";
					$mail_sent = mail( $to, $subject, $message, $headers );
					
					
	               //mail to member
		        $to_admin = $email ;					
				$subject = " No reply";
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
								 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$name.'</h1>
									
									<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">Thank you for contacting us. We have received your mail and will reply to at as soon as we can.</p>
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
					mail( $to_admin, $subject, $message, $headers );
					
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="main_container">
    			<div class="header_main fl">
    	  <div class="header_top fl">
    	    <?php include('navigation.php'); ?>
  	    </div>
    	  <div class="header_logo fl">
           	<?php include('header_logo.php'); ?>
            </div>
    	</div>
        	<div class="banner fl"><img src="images/contact_us.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                    <div class="about_us">
                       	  <h1>Contact Us</h1>
                          <p>Your email address will not be published. Required fields are marked *</p>
                      </div>
                   	  <div class="contact_form fl">
					  <form action="" method="post">
                                  <label>* Full Name:</label>
                                  <input name="name" type="text" required>
                                <label>* Email Address:</label>
                                  <input name="email" type="text" required>
                                <label>* Contact Number:</label>
                                  <input name="phone" type="text" required> 
                                <label>* Description:</label>
                                  <textarea name="Description" cols="" rows="" required></textarea>
                        <input name="Submit" value="Submit" type="submit">
						<?php
	
							if(isset($_POST['Submit']))
							{
							echo "<div style='position: absolute;top: 918px; left: 378px; color:#fd8900;'><h2 style='width:400px;'>Your Email has been Sent.</h2></div> ";
	
							}
						?>
						</form>
						
                              </div>
                      <div class="address">
                              <h2>Headquarters</h2>
                              <p>Fountain Technologies<br>
1 Raffles Place #44-02<br>
One Raffles Place Tower One<br>
Singapore 048&nbsp616<br>  
<br>
<strong>Contact Number: +65&nbsp8606&nbsp5620</strong></p></div>
                	</div>
                	 <?php include('footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
