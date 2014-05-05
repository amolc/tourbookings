<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

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

        	<div class="banner fl"><img src="images/banner.jpg" alt="" width="1002" height="391"></div>

            	<div class="center_body fl">
                	<div style="background:none;width: 200px" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                        	<!--<h1>Insider's Guide to Singapore</h1>
                            <p>Major attractions, tips and our top<br>
							things to see and do.</p>
                            <a href="#">Look Inside</a>-->
                        </div>

                        	<div style="display:none;" class="singapore_things fl">
                            	<h2>Singapore Things To Do</h2>

                                	<ul>
                                    	<li><a href="#">All Things to Do...</a></li>
                                        <li><a href="#">Cruises, Sailing & Water Tours</a></li>
                                        <li><a href="#">Cultural & Theme Tours</a></li>
                                        <li><a href="#">Day Trips & Excursions</a></li>
                                        <li><a href="#">Food, Wine & Nightlife</a></li>
                                        <li><a href="#" class="active">Multi-day & Exttended Tours</a></li>
                                        <li><a href="#">Outdoor Activities</a></li>
                                        <li><a href="#">Private & Custom Tours</a></li>
                                        <li><a href="#">Shore Excursions</a></li>
                                        <li><a href="#">Shows, Concerts & Sports</a></li>
                                        <li><a href="#">Sightseeing Tickets & Passes</a></li>
                                        <li><a href="#">Theme Parks</a></li>
                                        <li><a href="#">Tours & Sightseeing</a></li>
                                        <li><a href="#">Transfers & Ground Transport</a></li>
                                        <li><a href="#">Walking & Biking Tours</a></li>
                                        <li><a href="#">Water Sports</a></li>
                                        <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                    </ul>

                            </div>

                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Recommended</h2>

                                	<ul>
                                    	<li><a href="#">All Recommendations... </a></li>
                                        <li><a href="#">Our Top 10 Insider's Picks</a></li>
                                        <li><a href="#">Deals & Discounts </a></li>
                                        <li><a href="#">Family Friendly </a></li>
                                        <li><a href="#">Luxury & Special Occasions </a></li>
                                        <li><a href="#" class="active">Singapore Quays </a></li>
                                        <li><a href="#">Malaysia Tours from Singapore </a></li>
                                        <li><a href="#">Cruises from Singapore</a></li>
                                        <li class="border"><a href="#" class="active">See all recommendations...</a></li>
                                    </ul>

                            </div>

                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Top Attractions</h2>

                                	<ul>
                                    	<li><a href="#">All Attractions...</a></li>
                                        <li><a href="#">Singapore Zoo Breakfast</a></li>
                                        <li><a href="#">Singapore Zoo</a></li>
                                        <li><a href="#">Singapore Chinatown</a></li>
                                        <li><a href="#">Sentosa Island</a></li>
                                        <li><a href="#" class="active">Universal Studios Singapore</a></li>
                                        <li><a href="#">Orchard Road</a></li>
                                        <li><a href="#">Marina Bay Sands</a></li>
                                        <li class="border"><a href="#" class="active">See all attractions...</a></li>
                                    </ul>

                      </div>

                            <div style="display:none;" class="chat_now fl"><img src="images/chat_now.jpg" alt="" width="296" height="186"></div>

                    </div>

                    	<div class="right_penal fl">

                          <div class="register_head fl">
                            	<h2>Registration Successful</h2><br>
                                <p></p>
                            </div>
<?php 

 include('include/database/db.php'); 

$first_name = mysql_real_escape_string($_POST['first_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);

$password = mysql_real_escape_string($_POST['password']);
$gender = mysql_real_escape_string($_POST['gender']);
$day = mysql_real_escape_string($_POST['day']);
$month = mysql_real_escape_string($_POST['month']);
$year = mysql_real_escape_string($_POST['year']);
$age = $day."/".$month."/".$year;
$country = mysql_real_escape_string($_POST['country']);
$city = mysql_real_escape_string($_POST['city']);
$address = mysql_real_escape_string($_POST['address']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

	$sql   = "insert into user(first_name,last_name,password,gender,age,country,city,address,phone,email) values ('$first_name','$last_name','$password','$gender','$age','$country','$city','$address','$phone','$email')";
	$query = mysql_query($sql);
	 if($query){
		
					$to = $email;
					$subject = "Registration Confirmation"; 
					// $message = "<b>Dear ".$first_name." ".$last_name."</b>
				
								// <p>Thank you for successfully registering in our Travel Program</p>
								// <p>Your Login Information :</p>
								// <p>User name: '".$email."'</p>
								// <p>Password:  '".$password."'</p>
								
								// -*
								
								// <h2>Best Wishes</h2>
								// <p>http://tourbookings.co/</p>
								// "; 
								// '.$email.' and  password  '".$password."'"; '.$first_name.'&nbsp'.$last_name.'
								
$message = '<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>TourBookings Email</title>
									<style type="text/css">
									body {
										margin: 0px;
										padding:0px;
									}
									</style>
									</head>

									<body>

										<div style=" width:100%; height:100%; padding:30px 0px 0px 0px; background:#ececec; float:left;">
											<div style="float:left; width:100%; margin:0px 0px 0px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c; -moz-box-shadow:0px 2px 5px #7d7c7c; -ms-box-shadow:0px 2px 5px #7d7c7c; -o-box-shadow:0px 2px 5px #7d7c7c; -webkit-box-shadow:0px 2px 5px #7d7c7c;">
												<div style=" float:left; width:100%; height:182px; border-bottom:#fd8900 solid 5px; background:url(http://tourbookings.co/images/header_bg.jpg) repeat-x  center top;">
													<div style=" width:100%; float:right;">
														<ul style=" width:155px; float:right; margin:20px 30px 15px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Visit Our Site</a></li>
														<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/user_login.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
													  </ul>
													</div>
													<div style="width:539px; height:64px; float:left; margin-left:30px;">
														<img src="http://tourbookings.co/images/email_logo.png" width="539" height="64" />
													</div>
												</div>
												<div style="width:90%; float:left; padding:0px 30px;">
													<div style="width:100%; float:left;">
														<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
															
															<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">Thank you for joining Tourbookings!</h2>
														
															
														</div>
														<div style="width:100%; float:left;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">User Details</h1>
															
															<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Username: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$email.'</a></p>
															
															<p style="width:100%; float:left; margin:0px 0px 45px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Password: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$password.'</a></p>
															
											<p style="width:100%; float:left; margin:0px 0px 20px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Best Wishes, <br /> The Tourbooking Teams</p>
<br>
<br>
										
											<p style="width:100%; float:left; margin:0px 0px 45px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">If you are searching for your next vacation, try using our marketplace. Simply log in to your account, fill up where you want to go and what you want to do, then send it. Our vast network of suppliers will send you offers based on what you want and then you can select the one you like best!</p>															
															
														</div>
													</div>
												</div>
											</div>
											
											

											
											
											<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
											<div style="width:100%; float:left; padding:25px 0px; border-bottom:#cecece solid 1px; font-family:Arial, Helvetica, sans-serif; color:#323232; font-size:14px;">Here at Tour Bookings, every customer is our VIP! There is no need for you to scour the web to search for things to do on your vacation, no need to rummage through the tons of information on the Internet.</div>
											
											<div style="float:left; margin:0px; width:70%;">
													  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
														<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
														<a href="http://tourbookings.co/user_login.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																								
														<li style="	float:left; list-style-type: none; margin:0px;">
														<a href="http://tourbookings.co/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
													  </ul>
													  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
													  <p style=" line-height: 0px;padding: 0;margin: 0;float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232;">100 Cecil Street, Collective Works, Singapore - 069532.</p>
											  </div>
											  
											  <div style="float:right; width:30%; text-align:right;">
												<h3 style="width:100%; float:left; color:#323232; font-family:Arial, Helvetica, sans-serif; font-size:20px; display:block; margin:20px 0px 10px 0px; padding:0px;">Follow Us</h3>
												<div style="width:100%; float:left; margin:0px;">
												<a href="https://twitter.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-1.jpg"></a>
													<a href="https://www.facebook.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-2.jpg"></a>
													<a href="http://www.youtube.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-3.jpg"></a>
													<a href="#"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-4.jpg"></a>
													<a href="https://plus.google.com" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-5.jpg"></a>
													<a href="https://www.pinterest.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-6.jpg"></a>
												</div>
											  </div>
											
										  </div>
											
											<div style="clear:both;"></div>
									</div>

									</body>
									</html>';

/*$message = '<!doctype html>
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
             <p style="margin: 15px;margin-top: 2px;font-family:Arial, Helvetica, sans-serif;color:#fd8900 !important;">
				<b>Bringing out the traveler in you!</b>
			 </p>
            </div>
   
            
            <div style="width:440px; float:left;">
             <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;">
				<span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$first_name.' '.$last_name.'
			</h1>
                
                <p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
					Thank you for joining Tourbookings!
				</p>
				<br />
					<p>User Information :</p>
				<p>User Name:'.$email.'</p>
				<p>User password: '.$password.'</p>
				<br /> 
				<p>The Tourbookings Team</p>
				<p>Follow us on <a href="https://www.facebook.com/">Facebook</a> or <a href="http://instagram.com/">instagram</a> </p>
				<br />
				<br />
				<span><a href="http://tourbookings.co/about_us.php">About Us</a>|</span>
				<span><a href="http://tourbookings.co/customer_care.php">Customer Care</a>|</span>
				<span><a href="http://tourbookings.co/privacy_policy.php">Privacy Policy</a></span>
				<br />
				<p>
					Please do not reply to this message. To contact our Customer Care team directly, please 
					visit our website.
				</p>
				<p>&copy; 2014 Tourbookings.co Pte. Ltd.</p>
				<p>100 Cecil Street, Collective Works, Singapore - 069532</p>
		   </div>
            
            <div style="display:none;width:440px; float:left;">
				<h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">
					Best Wishes,
					<br>
					<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a>
				</h1>
            </div>


        </div>
        <div style="clear:both;"></div>
   </div>
</body>
</html>';		*/						

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$from_name ='Tourbookings Support Team';
					$from_email ='support@tourbookings.co';
					$headers .= "From: ". $from_name . " <" . $from_email . ">\r\n";
					$headers .= 'Cc: support@tourbookings.co' . "\r\n";

					$mail_sent = mail( $to, $subject, $message, $headers );


$to1 = "amol@fountaintechies.com";
					$subject1 = "Registration Confirmation"; 
					// $message = "<b>Dear Admin </b>
				
								// <p>Thank you for successfully registering in our Travel Program</p>
								// <p>Your Login Information :</p>
								// <p>User name: '".$email."'</p>
								// <p>Password:  '".$password."'</p>
								
								// -*
								
								// <h2>Best Wishes</h2>
								// <p>http://tourbookings.co/</p>
								// "; 
								// '.$email.' and  password  '".$password."'"; '.$first_name.'&nbsp'.$last_name.'
								
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
             <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
             <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
            </div>
   
            
            <div style="width:440px; float:left;">
				<h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;">
					<span style="color:#fd8900; margin-right:5px;">Dear,</span>Admin
				</h1>
                
                <p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
					A new user successfully registerd with folowwing details - 
				</p>
				<p style="padding:0px 20px;">User Details :</p>
				<p style="padding:0px 20px;">Name: '.$first_name.' '.$last_name.'</p>
				<p style="padding:0px 20px;">Email: '.$email.'</p>
								
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
					$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers1 .= 'To: '.$to1.'' . "\r\n";
					$headers1 .= 'From:  support@tourbookings.co' . "\r\n";

					$mail_sent = mail( $to1, $subject1, $message1, $headers1 );

		
		echo "<h3>Thank you for signing up with us. We have sent you a confirmation email.
		<a href='user_login.php'>Click here</a> to proceed to the login page </h3>";
		
	}
	else 
	{
		
					$to = $email;
					$subject = "Registration Failed"; 			
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
								 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$first_name.' '.$last_name.'</h1>
									
									<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">We regret to inform you that your recent booking(s) has failed. Do contact us if this issue persist.</p>
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

										$mail_sent = mail( $to, $subject, $message, $headers );	
										echo "<h3>Failed</h3>";
	} 

?>




               	  </div>

                     <?php include('footer.php'); ?>
                </div>

      <div style="clear:both"></div>
   </div>

</body>
</html>
