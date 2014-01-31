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
                	<div style="background:#fd8900;" class="left_penal fl">
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
$age = mysql_real_escape_string($_POST['age']);
$country = mysql_real_escape_string($_POST['country']);
$city = mysql_real_escape_string($_POST['city']);
$address = mysql_real_escape_string($_POST['address']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

	$sql   = "insert into user(first_name,last_name,password,gender,age,country,city,address,phone,email) values ('$first_name','$last_name','$password','$gender','$age','$country','$city','$address','$phone','$email')";
	$query = mysql_query($sql);
	 if($query){
		
					$to = $email;
					$subject = "<h3>Successfull Registration</h3>"; 
					$message = "<b>Dear '".$first_name."' '".$last_name."'</b>
				
								<p>Thank you for successfully registering in our Travel Program</p>
								<p>Your Login Information :</p>
								<p>User name: '".$email."'</p>
								<p>Password:  '".$password."'</p>
								
								
								
								<h2>Best Wishes</h2>
								<p>http://tourbookings.co/</p>
								"; 
								// '.$email.' and  password  '".$password."'"; 
									
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'To: '.$email.'' . "\r\n";
					$headers .= 'From: apache@iamamol.com' . "\r\n";

					$mail_sent = mail( $to, $subject, $message, $headers );
		
		echo "<h3>Thank you for signing up with us. We have sent you a confirmation email.
		<a href='user_login.php'>Click here</a> to proceed to the login page </h3>";
	}else {
		echo "error";
	} 

?>




               	  </div>

                     <?php include('footer.php'); ?>
                </div>

      <div style="clear:both"></div>
   </div>

</body>
</html>
