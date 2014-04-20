<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		/**
		* admin login apdmin panel
		*@author:	razamalik@outlook.com
		*@date:	17 April 2014 12:00PM GM+5
		*/ 
		
		// alert(name);
		// alert(admin_pass); 
		$('#Login').click(function(){
			var name = $('#username').val();
			var password = $('#password').val();
			
			$.ajax({
					type: 'post',
					url: 'ajax_request_function/ajax_login.php',
					data: {name:name,password:password},
					
					success: function(mesg) {
					if(mesg =='1'){
						window.location.href = 'dashboard.php';
					}
					else {
						$('.mesg').empty().append(mesg);
						// $('#username').focus();
					}
					
					}
			
			});
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
	/**
	*raza malik <razamalik@outlook.com>
	*/

	$( "#confirm_password" ).blur(function() {
			var password =	$('#signup_password').val();
			var confirm_password =	$('#confirm_password').val();
			// alert(password);
			// alert(confirm_password);
			if(password != confirm_password) {
				$('.password_match').empty().append("Password Don't Match");
				$('#registeration_button').prop("disabled", true);
			}
			if(password == confirm_password) {
				$('.password_match').empty();
				$('#registeration_button').prop("disabled", false);
			}
			
	});
		
	
	$("#email").blur(function(){

		 var email = $('#email').val();
		 $.ajax({
					type:  'post', 
					url:  'ajax_request_function/ajax_check_email.php',
					data: { email:email }, 
					success: function(mesg) {
					if(mesg!="") {
						$("#email").focus();
						$('#registeration_button').prop("disabled", true);
						 $('.email_exit').append(mesg);
					  } else  {
					 
						$('#registeration_button').prop("disabled", false);
						
					  }
					  
					}                    
				});
				$('.email_exit').empty();
		
	});
});
</script>
  <SCRIPT language="Javascript">
       
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    </SCRIPT>

</head>

<body>
	<div id="main_container">
    	<div class="header_main fl">
    	  <div class="header_top fl">
    	    <?php include('../navigation.php'); ?>
  	    </div>
    	  <div class="header_logo fl">
           	<div class="logo fl" style="margin-top:7px;">
            <a href="index.php"><img src="../images/tourbooking_logo.png" width="256" height="105"></a>
</div>      
            <div class="header_login fr">
            
            <!--<form action="" method="post" >-->
                <label>* Username:</label>
				<input id="username" type="text" name="username">
               
                <label>* Password:</label>
				<input style="margin-bottom:0px;" id="password" type="password" name="password">
				 <input type="submit" name="button" id="Login" value="Login">
					<div class="mesg" style="font-weight: bold;color: #F00;float: left; margin-left: 90px;width: 434px;"></div> 
                <a href="#" style="float: right; margin: 0px 22px 0px 0px;">Forgot Password</a>
           <!-- </form>-->
            </div>
            </div>
    	</div> 
			
        	<div class="banner fl"><img src="../images/partner_signup_banner.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                   	  <div class="left_colm fl">
                        	<div class="convenience fl">
                            	<span class="fl"><img src="../images/convenience_icon.png" alt="" width="45" height="45"></span>
                              <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/rates_icon.png" alt="" width="45" height="45"></span>
                            <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/saas_icon.png" alt="" width="52" height="45"></span>
                            <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/contact_icon.png" alt="" width="45" height="45"></span>
                            <h1>CONTACT US</h1>
                                <p><a href="index.php">Tourbookings.co</a><br>
                                  <a href="mailto:support@tourbookings.co">support@tourbookings.co</a><br>
                                  10th Floor, Collective Works,<br>
                                  100 Cecil Street, <br>
                            Singapore - 069532 </p>
                        </div>
                          
                      </div>
                        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post"> 
							<div style="height: auto;" class="right_colm fr">
							  <div class="partner_form fl">
								<h1>Join Us as a partner</h1>
								<?php
									error_reporting(0);
									
									if (isset($_REQUEST['exit']))
									{
										echo "<div style='font-weight: bold;color: #F00;margin-bottom: 22px;text-align: left;line-height: 20px;'>Sorry this email address is already register.</div>";
									}
										
									include('../include/database/db.php');
										function new_signup() 
										{
										
										$first_name = mysql_real_escape_string($_POST['first_name']);
										$last_name = mysql_real_escape_string($_POST['last_name']);
										$phone = mysql_real_escape_string($_POST['phone']);
										$email = mysql_real_escape_string($_POST['email']);

										$password = mysql_real_escape_string($_POST['password']);
										$company_name = mysql_real_escape_string($_POST['company_name']);
										$web_address = mysql_real_escape_string($_POST['web_address']);
										$country = mysql_real_escape_string($_POST['country']);

										$state = mysql_real_escape_string($_POST['state']);
										$city = mysql_real_escape_string($_POST['city']);
										$street_address = mysql_real_escape_string($_POST['street_address']);
										$business_type = mysql_real_escape_string($_POST['business_type']);
										$contact_number = mysql_real_escape_string($_POST['contact_number']);
										$postcode = mysql_real_escape_string($_POST['postcode']);
										$year_founded = mysql_real_escape_string($_POST['year_founded']);
										$staff = mysql_real_escape_string($_POST['staff']);
										$office_timing = mysql_real_escape_string($_POST['office_timing']);
										$emergency_phone = mysql_real_escape_string($_POST['emergency_phone']);
										$local_trips = mysql_real_escape_string($_POST['local_trips']);

										$currency = mysql_real_escape_string($_POST['currency']);
										$tour_product_description = mysql_real_escape_string($_POST['tour_product_description']);
										$tour_product_country = mysql_real_escape_string($_POST['tour_product_country']);
										$language = mysql_real_escape_string($_POST['language']);
											 $sql   = "insert into supplier(first_name,last_name,phone,email,password,company_name,
															web_address,business_type,street_address,city,state,postcode,
															country,tour_product_description,tour_product_country,currency,language,year_founded,staff,office_timing,emergency_no,local_trip_date)
															values ('$first_name','$last_name','$phone','$email','$password','$company_name','$web_address','$business_type','$street_address','$city','$state','$postcode','$country','$tour_product_description','$tour_product_country','$currency','$language','$year_founded','$staff','$office_timing','$emergency_phone','$local_trips')";
												
											   $query = mysql_query($sql);
												$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
												$current_date = date("m/d/Y", $today_date);
								
												$timestamp = time()-86400;
												$date = strtotime("+7 day", $timestamp);
												$exp_date = date("m/d/Y", $date);

												if($query)
												{
																	
													$result1 = mysql_query("SELECT MAX(id) FROM supplier");
													$row = mysql_fetch_row($result1);
													$sup_id = $row[0];
																
													$sql1   = "insert into supplier_payment(supplier_id,card,exp_date,code,total_price,status,insert_date) values ('$sup_id','','$exp_date','','','trial','$current_date')";
													$query1 = mysql_query($sql1);

													$to = $email;
													$subject = 'Welcome to Tourbookings!'; 
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
																						<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
																					  </ul>
																					</div>
																					<div style="width:539px; height:64px; float:left; margin-left:30px;">
																						<img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
																					</div>
																				</div>
																				<div style="width:90%; float:left; padding:0px 30px;">
																					<div style="width:100%; float:left;">
																						<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
																							
																							<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
																							
																							<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">
																							Thank you for joining Tourbookings! Welcome to our Travel Partner Program!</h2>
																						
																							
																						</div>
																						<div style="width:100%; float:left;">
																							
																							<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">User Information</h1>
																							
																							<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Company: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$company_name.'</a></p>
																							<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Username: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$email.'</a></p>
																							
																							<p style="width:100%; float:left; margin:0px 0px 45px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Password: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$password.'</a></p>
																							
																						</div>
																					</div>
																				</div>
																			</div> 
																			
																			<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
																			
																			<div style="float:left; margin:0px; width:70%;">
																					  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																																
																						<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
																						<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
																						<a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																																
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
													
													$headers  = 'MIME-Version: 1.0' . "\r\n";
													$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													$from_name ='Tourbookings Support Team';
													$from_email ='support@tourbookings.co';
													$headers .= "From: ". $from_name . " <" . $from_email . ">\r\n";
													$headers .= 'Cc: support@tourbookings.co' . "\r\n";

													$mail_sent = mail( $to, $subject, $message, $headers );
													
													//email send to admin 
													
													$to2 = 'support@tourbookings.co';
													$subject2 = 'Welcome to Tourbookings!'; 
													$message2 = '<!doctype html>
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
																						<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
																					  </ul>
																					</div>
																					<div style="width:539px; height:64px; float:left; margin-left:30px;">
																						<img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
																					</div>
																				</div>
																				<div style="width:90%; float:left; padding:0px 30px;">
																					<div style="width:100%; float:left;">
																						<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
																							
																							<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
																							
																							<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">
																							New Partner joining Tourbookings! Welcome to our Travel Partner Program!</h2>
																						
																							
																						</div>
																						<div style="width:100%; float:left;">
																							
																							<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">User Information</h1>
																							
																							<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Company: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$company_name.'</a></p>
																							<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Username: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$email.'</a></p>
																							
																							<p style="width:100%; float:left; margin:0px 0px 45px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Password: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$password.'</a></p>
																							
																						</div>
																					</div>
																				</div>
																			</div> 
																			
																			<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
																			
																			<div style="float:left; margin:0px; width:70%;">
																					  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																																
																						<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
																						<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
																						<a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																																
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
													
													$headers2  = 'MIME-Version: 1.0' . "\r\n";
													$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
												
													$headers2 .= "From: " . $email . ">\r\n";

													$mail_sent = mail( $to2, $subject2, $message2, $headers2 );
													
													
													echo "<h3 style='margin-bottom: 20px;'><span style='font-size: 17px; '>Thank you for registering as a partner with tourbookings. Please login using your username and password</span> </h3>";
													
												}
												else
												{
													echo "error";
												} 
										}
									
									if (isset($_POST['signup']))
									{
										$email = mysql_real_escape_string($_POST['email']);
										$today_date = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
										$current_date = date("m/d/Y", $today_date);

										$result = mysql_query("SELECT email FROM supplier WHERE email='$email'");
										if (mysql_num_rows($result) > 0)
										{
											//header("Location:partner_landing2.php?exit=ok");
											echo "<div style='font-weight: bold;color: #F00;margin-bottom: 22px;text-align: left;line-height: 20px;'>Sorry this email address is already register.</div>";
										}
										else
										{
											new_signup();
										   
										}
									}
								
								?> 
									 
							
								<input type="text" name="first_name" id="first_name" placeholder="First Name"  onblur="if(this.placeholder=='') this.placeholder='First Name'" onFocus="if(this.placeholder=='First Name') this.placeholder=''" required/>
									 
								<input type="text" name="last_name" id="last_name" placeholder='Last Name' onBlur="if(this.placeholder=='') this.placeholder='Last Name'" onFocus="if(this.placeholder=='Last Name') this.placeholder=''" required/>
								
									
								<input name="phone" id="phone" type="text" placeholder='Contact Number' onBlur="if(this.placeholder=='') this.placeholder='Contact Number'" onFocus="if(this.placeholder=='Contact Number') this.placeholder=''" required/>
									
								<input name="email" id="email" type="email" placeholder='Email' onBlur="if(this.placeholder=='') this.placeholder='Email'" onFocus="if(this.placeholder=='Email') this.placeholder=''" required/>
								 <span style="margin-right: 231px;float: right;color: red;padding-bottom: 5px;" class="email_exit"></span>
								
                                <input name="password" id="signup_password" type="password" placeholder='Password' onBlur="if(this.placeholder=='') this.placeholder='Password'" onFocus="if(this.placeholder=='Password') this.placeholder=''" required>
                                
							  <input name="confirm_password"  id="confirm_password" type="password" placeholder='Confirm Password' onBlur="if(this.placeholder=='') this.placeholder='Confirm Password'" onFocus="if(this.placeholder=='Confirm Password') this.placeholder=''" required>
								  <span style="margin-right: 231px;float: right;color: red;padding-bottom: 5px;" class="password_match"></span>
									 
									<input name="company_name" id="company_name" type="text" placeholder='Company Name' onBlur="if(this.placeholder=='') this.placeholder='Company Name'" onFocus="if(this.placeholder=='Company Name') this.placeholder=''">
								
                                  <input name="web_address" id="web_address" type="text"  placeholder='Website Address' onBlur="if(this.placeholder=='') this.placeholder='Website Address'" onFocus="if(this.placeholder=='Website Address') this.placeholder=''">
								
                                  <select name="country" id="country">
                                    <option value="">Select Country</option>
										
										<option value="AF">Afghanistan</option>
									
										<option value="AL">Albania</option>
									
										<option value="DZ">Algeria</option>
									
										<option value="AS">American Samoa</option>
									
										<option value="AD">Andorra</option>
									
										<option value="AO">Angola</option>
									
										<option value="AI">Anguilla</option>
									
										<option value="AQ">Antarctica</option>
									
										<option value="AG">Antigua and Barbuda</option>
									
										<option value="AR">Argentina</option>
									
										<option value="AM">Armenia</option>
									
										<option value="AW">Aruba</option>
									
										<option value="AU">Australia</option>
									
										<option value="AT">Austria</option>
									
										<option value="AZ">Azerbaijan</option>
									
										<option value="BS">Bahamas</option>
									
										<option value="BH">Bahrain</option>
									
										<option value="BD">Bangladesh</option>
									
										<option value="BB">Barbados</option>
									
										<option value="BY">Belarus</option>
									
										<option value="BE">Belgium</option>
									
										<option value="BZ">Belize</option>
									
										<option value="BJ">Benin</option>
									
										<option value="BM">Bermuda</option>
									
										<option value="BT">Bhutan</option>
									
										<option value="BO">Bolivia</option>
									
										<option value="BA">Bosnia Herzegovina</option>
									
										<option value="BW">Botswana</option>
									
										<option value="BR">Brazil</option>
									
										<option value="BN">Brunei</option>
									
										<option value="BG">Bulgaria</option>
									
										<option value="BF">Burkina Faso</option>
									
										<option value="BI">Burundi</option>
									
										<option value="KH">Cambodia</option>
									
										<option value="CM">Cameroon</option>
									
										<option value="CA">Canada</option>
									
										<option value="CV">Cape Verde</option>
									
										<option value="KY">Cayman Islands</option>
									
										<option value="CF">Central Africa</option>
									
										<option value="TD">Chad</option>
									
										<option value="CL">Chile</option>
									
										<option value="CN">China</option>
									
										<option value="CX">Christmas Island</option>
									
										<option value="CC">Cocos (Keeling) Islands</option>
									
										<option value="CO">Colombia</option>
									
										<option value="KM">Comoros</option>
									
										<option value="CK">Cook Islands</option>
									
										<option value="CR">Costa Rica</option>
									
										<option value="CI">Cote D'Ivoire</option>
									
										<option value="HR">Croatia</option>
									
										<option value="CY">Cyprus</option>
									
										<option value="CZ">Czech Republic</option>
									
										<option value="DK">Denmark</option>
									
										<option value="DJ">Djibouti</option>
									
										<option value="DM">Dominica</option>
									
										<option value="DO">Dominican Republic</option>
									
										<option value="EC">Ecuador</option>
									
										<option value="EG">Egypt</option>
									
										<option value="SV">El Salvador</option>
									
										<option value="GQ">Equatorial Guinea</option>
									
										<option value="ER">Eritrea</option>
									
										<option value="EE">Estonia</option>
									
										<option value="ET">Ethiopia</option>
									
										<option value="FK">Falkland Island</option>
									
										<option value="FO">Faroe Islands</option>
									
										<option value="FJ">Fiji</option>
									
										<option value="FI">Finland</option>
									
										<option value="FR">France</option>
									
										<option value="GF">French Guiana</option>
									
										<option value="PF">French Polynesia</option>
									
										<option value="GA">Gabon</option>
									
										<option value="GM">Gambia</option>
									
										<option value="GE">Georgia</option>
									
										<option value="DE">Germany</option>
									
										<option value="GH">Ghana</option>
									
										<option value="GI">Gibraltar</option>
									
										<option value="GR">Greece</option>
									
										<option value="GL">Greenland</option>
									
										<option value="GD">Grenada</option>
									
										<option value="GP">Guadeloupe</option>
									
										<option value="GU">Guam</option>
									
										<option value="GT">Guatemala</option>
									
										<option value="GN">Guinea</option>
									
										<option value="GW">Guinea Bissau</option>
									
										<option value="GY">Guyana</option>
									
										<option value="HT">Haiti</option>
									
										<option value="HN">Honduras</option>
									
										<option value="HK">Hong Kong</option>
									
										<option value="HU">Hungary</option>
									
										<option value="IS">Iceland</option>
									
										<option value="IN">India</option>
									
										<option value="ID">Indonesia</option>
									
										<option value="IQ">Iraq</option>
									
										<option value="IE">Ireland</option>
									
										<option value="IL">Israel</option>
									
										<option value="IT">Italy</option>
									
										<option value="JM">Jamaica</option>
									
										<option value="JP">Japan</option>
									
										<option value="JO">Jordan</option>
									
										<option value="KZ">Kazakhstan</option>
									
										<option value="KE">Kenya</option>
									
										<option value="KI">Kiribati</option>
									
										<option value="KW">Kuwait</option>
									
										<option value="KG">Kyrgyzstan</option>
									
										<option value="LA">Lao People's Democratic Republic</option>
									
										<option value="LV">Latvia</option>
									
										<option value="LB">Lebanon</option>
									
										<option value="LS">Lesotho</option>
									
										<option value="LR">Liberia</option>
									
										<option value="LY">Libyan Arab Jamahiriya</option>
									
										<option value="LI">Liechtenstein</option>
									
										<option value="LT">Lithuania</option>
									
										<option value="LU">Luxembourg</option>
									
										<option value="MO">Macau</option>
									
										<option value="MK">Macedonia</option>
									
										<option value="MG">Madagascar</option>
									
										<option value="MW">Malawi</option>
									
										<option value="MY">Malaysia</option>
									
										<option value="MV">Maldives</option>
									
										<option value="ML">Mali</option>
									
										<option value="MT">Malta</option>
									
										<option value="MQ">Martinique</option>
									
										<option value="MR">Mauritania</option>
									
										<option value="MU">Mauritius</option>
									
										<option value="YT">Mayotte</option>
									
										<option value="MX">Mexico</option>
									
										<option value="FM">Micronesia</option>
									
										<option value="MD">Moldova</option>
									
										<option value="MC">Monaco</option>
									
										<option value="MN">Mongolia</option>
									
										<option value="MS">Monserrat</option>
									
										<option value="MA">Morocco</option>
									
										<option value="MZ">Mozambique</option>
									
										<option value="MM">Myanmar</option>
									
										<option value="NA">Namibia</option>
									
										<option value="NR">Nauru</option>
									
										<option value="NP">Nepal</option>
									
										<option value="NL">Netherlands</option>
									
										<option value="AN">Netherlands Antilles</option>
									
										<option value="KN">Nevis- St Kitts</option>
									
										<option value="NC">New Caledonia</option>
									
										<option value="NZ">New Zealand</option>
									
										<option value="NI">Nicaragua</option>
									
										<option value="NE">Niger</option>
									
										<option value="NG">Nigeria</option>
									
										<option value="NU">Niue</option>
									
										<option value="NF">Norfolk Island</option>
									
										<option value="KP">North Korea</option>
									
										<option value="MP">Northern Mariana Islands</option>
									
										<option value="NO">Norway</option>
									
										<option value="OM">Oman</option>
									
										<option value="PK">Pakistan</option>
									
										<option value="PW">Palau</option>
									
										<option value="PS">Palestinian Territory, Occupied</option>
									
										<option value="PA">Panama</option>
									
										<option value="PG">Papua New Guinea</option>
									
										<option value="PY">Paraguay</option>
									
										<option value="PE">Peru</option>
									
										<option value="PH">Philippines</option>
									
										<option value="PN">Pitcairn</option>
									
										<option value="PL">Poland</option>
									
										<option value="PT">Portugal</option>
									
										<option value="PR">Puerto Rico</option>
									
										<option value="QA">Qatar</option>
									
										<option value="RE">Reunion</option>
									
										<option value="RO">Romania</option>
									
										<option value="RU">Russian Federation</option>
									
										<option value="RW">Rwanda</option>
									
										<option value="SH">Saint Helena</option>
									
										<option value="LC">Saint Lucia</option>
									
										<option value="SM">San Marino</option>
									
										<option value="ST">Sao Tome and Principe</option>
									
										<option value="SA">Saudi Arabia</option>
									
										<option value="SN">Senegal</option>
									
										<option value="YU">Serbia and Montenegro</option>
									
										<option value="SC">Seychelles</option>
									
										<option value="SL">Sierra Leone</option>
									
										<option value="SG">Singapore</option>
									
										<option value="SK">Slovakia</option>
									
										<option value="SI">Slovenia</option>
									
										<option value="SB">Solomon Islands</option>
									
										<option value="SO">Somalia</option>
									
										<option value="ZA">South Africa</option>
									
										<option value="KR">South Korea</option>
									
										<option value="ES">Spain</option>
									
										<option value="LK">Sri Lanka</option>
									
										<option value="PM">St Pierre Miquelon</option>
									
										<option value="VC">St Vincent and Grenadines</option>
									
										<option value="SR">Suriname</option>
									
										<option value="SZ">Swaziland</option>
									
										<option value="SE">Sweden</option>
									
										<option value="CH">Switzerland</option>
									
										<option value="SY">Syria</option>
									
										<option value="TW">Taiwan</option>
									
										<option value="TJ">Tajikistan</option>
									
										<option value="TZ">Tanzania</option>
									
										<option value="TH">Thailand</option>
									
										<option value="TL">Timor-Leste</option>
									
										<option value="TG">Togo</option>
									
										<option value="TK">Tokelau</option>
									
										<option value="TO">Tonga</option>
									
										<option value="TT">Trinidad and Tobago</option>
									
										<option value="TN">Tunisia</option>
									
										<option value="TR">Turkey</option>
									
										<option value="TM">Turkmenistan</option>
									
										<option value="TC">Turks and Caicos Islands</option>
									
										<option value="TV">Tuvalu</option>
									
										<option value="UG">Uganda</option>
									
										<option value="UA">Ukraine</option>
									
										<option value="AE">United Arab Emirates</option>
									
										<option value="GB">United Kingdom</option>
									
										<option value="UY">Uruguay</option>
									
										<option value="UM">US Minor Outlying Islands</option>
									
										<option value="US">USA</option>
									
										<option value="UZ">Uzbekistan</option>
									
										<option value="VU">Vanuatu</option>
									
										<option value="VE">Venezuela</option>
									
										<option value="VN">Vietnam</option>
									
										<option value="VG">Virgin Islands-British</option>
									
										<option value="VI">Virgin Islands-US</option>
									
										<option value="WF">Wallis and Futuna Islands</option>
									
										<option value="WS">Western Samoa</option>
									
										<option value="YE">Yemen Republic</option>
									
										<option value="ZM">Zambia</option>
									
										<option value="ZW">Zimbabwe</option>
                                  </select>
                                  
								
                                  <input name="state" id="state" type="text" placeholder='State/Province' onBlur="if(this.placeholder=='') this.placeholder='State/Province'" onFocus="if(this.placeholder=='State/Province') this.placeholder=''">
								
								
                                  <input name="city" id="city" type="text" placeholder='City' onBlur="if(this.placeholder=='') this.placeholder='City'" onFocus="if(this.placeholder=='City') this.placeholder=''"> 
								  
								
                                  <input name="street_address" id="street_address" type="text" placeholder='Street Address' onBlur="if(this.placeholder=='') this.placeholder='Street Address'" onFocus="if(this.placeholder=='Street Address') this.placeholder=''" required>  
                                
								
                                <input name="postcode" id="postcode" type="text" placeholder='Postcode/ZIP' onBlur="if(this.placeholder=='') this.placeholder='Postcode/ZIP'" onFocus="if(this.placeholder=='Postcode/ZIP') this.placeholder=''" required>
							
									<textarea rows="" cols="" name="tour_product_description" placeholder="Briefly describe the product or tour you wish to sell through Tourbookings..." maxlength="100" onBlur="if(this.placeholder=='') this.placeholder='Briefly describe the product or tour you wish to sell through Tourbookings...'" onFocus="if(this.placeholder=='Briefly describe the product or tour you wish to sell through Tourbookings...') this.placeholder=''"></textarea>
						
                                  <input name="tour_product_country" id="last_name"  placeholder='Other Countries or Cities you operate in' onBlur="if(this.placeholder=='') this.placeholder='Other Countries or Cities you operate in'" onFocus="if(this.placeholder=='Other Countries or Cities you operate in') this.placeholder=''" type="text">
							
                                <select name="business_type" id="business_type">
                                  <option value="">Select Business Type</option>
									<option value="Tour Operator">Tour Operator</option>
									<option value="Travel Agency">Travel Agency</option>
									<option value="Travel Aggregator">Travel Aggregator</option>
									<option value="Hotel">Hotel</option>
                                </select>
								
							
                                  <select name="currency" id="currency" required>
                                    <option value="" selected="selected">Select Currency</option>
										<option value="USD">United States Dollar (USD)</option>
									<option value="GBP">	Great British Pound (GBP)</option>
								<option value="CAD">Canadian Dollar (CAD)</option>
								<option value="EU">Euros (EU) </option>
								<option value="PHP">Philippine Peso (PHP)</option>
								<option value="SGD">Singapore Dollar (SGD)</option>
								<option value="MYR">Malaysian Ringgit (MYR)</option>
								<option value="IDR">Indonesian Rupiah (IDR)</option>
								<option value="INR">Indian Rupee (INR)</option>
								<option value="HKD">Hong Kong Dollar (HKD)</option>
                                  </select>
                               
                                <select name="language" id="language" required>
                                  <option value="">Select Language</option> 
                                  <option value="da">Danish</option>
                                  <option value="nl">Dutch</option>
                                  <option value="en" selected="selected">English</option>
                                  <option value="fr">French</option>
                                  <option value="de">German</option>
                                  <option value="ja">Japanese</option>
                                  <option value="no">Norwegian</option>
                                  <option value="pt">Portuguese</option>
                                  <option value="es">Spanish</option>
                                  <option value="sv">Swedish</option>
                                </select>
								
								
									  
									<input id="registeration_button" type="submit" value="SIGN UP" name="signup">
									
							  </div>
							</div>
                        </form>
                	</div>
                	<?php include('../footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
