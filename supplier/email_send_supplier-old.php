<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//alert('razamalik');

	// $('#registeration_button').click(function(){
	
	
		// var first_name = $('#first_name').val();
		// var last_name = $('#last_name').val();
		// var phone = $('#phone').val();
		// var email =	$('#email').val();
		// var confirm_email =	$('#confirm_email').val();
		// var password =	$('#password').val();
		// var confirm_password =	$('#confirm_password').val();
		// var company_name =	$('#company_name').val();
		// var web_address =	$('#web_address').val();
		// var country = $( "#country option:selected" ).val();
		// var state =	$('#state').val();
		// var city =	$('#city').val();
		// var street_address =	$('#street_address').val();
		// var business_type = $( "#business_type option:selected" ).val();
		// var contact_number =	$('#contact_number').val();
		// var postcode =	$('#postcode').val();
		// var year_founded =	$('#year_founded').val();
		// var staff =	$('#staff').val();
		// var office_timing =	$('#office_timing').val();
		// var emergency_phone =	$('#emergency_phone').val();
		// var local_trips =	$('#local_trips').val();
		
		// var currency = $( "#currency option:selected" ).val();
		// var language = $( "#language option:selected" ).val();
		
		// if(first_name == "" || last_name == "" || confirm_password == "" || confirm_email == "" || last_name == "" || local_trips == "" || emergency_phone == "" || office_timing == "" || staff == "" || year_founded == "" || phone == ""|| email == ""|| contact_number == "" || password == ""|| company_name == ""|| web_address == ""|| business_type == ""|| street_address == ""|| city == "" || state == ""|| postcode == ""|| country == ""|| currency == ""|| language == "") {
				// alert('please fill the field');
		// }
		// else {
			   // $.ajax({
					// type:  'post', 
					// url:  'ajax_request_function/ajax_registeration.php',
					// data: {first_name:first_name,last_name:last_name,phone:phone,email:email,password:password,
							// company_name:company_name,web_address:web_address,country:country,
							// state:state,city:city,street_address:street_address,business_type:business_type,
							// contact_number:contact_number,postcode:postcode,
							// year_founded:year_founded,staff:staff,office_timing:office_timing,
							// emergency_phone:emergency_phone,local_trips:local_trips,
							// currency:currency,language:language,
							
						  // }, 
					// success: function(mesg) {
					  
					   // if(mesg == 'registration successful'){
						 // $('.success_mesg').empty().append('registration successful!');	
						// $('#first_name').val("");
						// $('#last_name').val("");
						// $('#phone').val("");
						// $('#email').val("");
						// $('#password').val("");
						// $('#company_name').val("");
						// $( "#business_type option:selected" ).empty();
						// $('#street_address').val("");
						// $('#city').val("");
						// $('#state').val("");
						// $('#postcode').val("");
						// $( "#country option:selected" ).empty();
						// $( "#currency option:selected" ).empty();
						// $( "#language option:selected" ).empty();
						 
						// }
					// }                    
				// });
			// }

	// });

});
</script>

</head>

<body>
	<div id="main_container">
    	<div class="header_main fl">
        	<div class="header_top fl">
				<?php include('../navigation.php'); ?>
            </div>
                     <div class="header_logo fl">
            	<?php //include('../header_logo.php'); ?>
				            	<div class="logo fl"><a href="index.php"><img src="../images/tourbooking_logo.png" alt="" width="256" height="105"></a></div>
              <!--<div class="tour_bookings fr">What's so great about
					<span>Tour Bookings</span>
                </div>-->
				<form action="search_filter.php" method="post" >
                	<div class="header_form fr">
						<!--<select name="keyword2" id="country" required>
							<option value="">Select a country</option>
							<option value="Antarctica">Antarctica</option>
							<option value="Antigua and Barbuda">Antigua and Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Barbados">Barbados</option>
							<option value="Belgium">Belgium</option>
							<option value="Belize">Belize</option>
							<option value="Bermuda">Bermuda</option>
							<option value="Brazil">Brazil</option>
							<option value="British Virgin Islands">British Virgin Islands</option>
							<option value="Cambodia">Cambodia</option>
							<option value="Canada">Canada</option>
							<option value="Cayman Islands">Cayman Islands</option>
							<option value="Chile">Chile</option>
							<option value="China">China</option>
							<option value="Colombia">Colombia</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Croatia">Croatia</option>
							<option value="Curacao">Curacao</option>
							<option value="Cyprus">Cyprus</option>
							<option value="Czech Republic">Czech Republic</option>
							<option value="Denmark">Denmark</option>
							<option value="Dominica">Dominica</option>
							<option value="Dominican Republic">Dominican Republic</option>
							<option value="Ecuador">Ecuador</option>
							<option value="Egypt">Egypt</option>
							<option value="England">England</option>
							<option value="Estonia">Estonia</option>
							<option value="Fiji">Fiji</option>
							<option value="Finland">Finland</option>
							<option value="France">France</option>
							<option value="French Polynesia">French Polynesia</option>
							<option value="Germany">Germany</option>
							<option value="Greece">Greece</option>
							<option value="Grenada">Grenada</option>
							<option value="Guatemala">Guatemala</option>
							<option value="Honduras">Honduras</option>
							<option value="Hong Kong">Hong Kong</option>
							<option value="Hungary">Hungary</option>
							<option value="Iceland">Iceland</option>
							<option value="India">India</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Ireland">Ireland</option>
							<option value="Israel">Israel</option>
							<option value="Italy">Italy</option>
							<option value="Jamaica">Jamaica</option>
							<option value="Japan">Japan</option>
							<option value="Jordan">Jordan</option>
							<option value="Kenya">Kenya</option>
							<option value="Lebanon">Lebanon</option>
							<option value="Lithuania">Lithuania</option>
							<option value="Malaysia">Malaysia</option>
							<option value="Malta">Malta</option>
							<option value="Mexico">Mexico</option>
							<option value="Monaco">Monaco</option>
							<option value="Morocco">Morocco</option>
							<option value="Myanmar">Myanmar</option>
							<option value="Nepal">Nepal</option>
							<option value="Netherlands">Netherlands</option>
							<option value="New Zealand">New Zealand</option>
							<option value="Nicaragua">Nicaragua</option>
							<option value="Norway">Norway</option>
							<option value="Oman">Oman</option>
							<option value="Panama">Panama</option>
							<option value="Peru">Peru</option>
							<option value="Philippines">Philippines</option>
							<option value="Poland">Poland</option>
							<option value="Portugal">Portugal</option>
							<option value="Puerto Rico">Puerto Rico</option>
							<option value="Russia">Russia</option>
							<option value="Scotland">Scotland</option>
							<option value="Singapore">Singapore</option>
							<option value="Slovenia">Slovenia</option>
							<option value="South Africa">South Africa</option>
							<option value="South Korea">South Korea</option>
							<option value="Spain">Spain</option>
							<option value="St Kitts and Nevis">St Kitts and Nevis</option>
							<option value="St Lucia">St Lucia</option>
							<option value="St Maarten">St Maarten</option>
							<option value="Sweden">Sweden</option>
							<option value="Switzerland">Switzerland</option>
							<option value="Taiwan">Taiwan</option>
							<option value="Thailand">Thailand</option>
							<option value="Trinidad and Tobago">Trinidad and Tobago</option>
							<option value="Turkey">Turkey</option>
							<option value="Turks and Caicos">Turks and Caicos</option>
							<option value="United Arab Emirates">United Arab Emirates</option>
							<option value="Uruguay">Uruguay</option>
							<option value="USA">USA</option>
							<option value="US Virgin Islands">US Virgin Islands</option>
							<option value="Vietnam">Vietnam</option>
							<option value="Wales">Wales</option>
							<option value="Zambia">Zambia</option>
							<option value="Zimbabwe">Zimbabwe</option>

						  </select>-->

                	   <!--<select name="" id="city">
                	    <option>Select One</option>
                	    <option>Anaheim & Buena Park</option>
                	  </select>-->
					 <!-- <input type="text" name="Keyword1" id="city" style="margin-left: 2px;" placeholder="City Name" class="" required>
						
					  <input type="hidden" name="check" value="filter">
					  <input type="submit" name="filter" id="button1" class="go" value="GO">-->
					  </form>
					  <form action="search.php" method="post" >
						
						  <input type="text" value="Keyword Search" name="Keyword" onblur="if(this.value=='') this.value='Keyword Search'" onfocus="this.value=''">
						  <input type="submit" name="button" id="search" value="GO">
						</form>
                	</div>

            </div>
    
    	</div>
        
        	<div class="banner fl"><img src="../images/banner.jpg" alt="" width="1002" height="391"></div>
            
            	<div class="center_body fl">
                	<div style="background:none;width:160px;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                        	
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
                            
                            <div class="chat_now fl" style="display:none;"><img src="images/chat_now.jpg" alt="" width="296" height="186"></div>
                        
                    </div>
                    
                    	<div class="right_penal fl">
                        	<!--<form action="<?php //$_SERVER['PHP_SELF']?>"  method="post">-->
                          <div class="register_head fl">
						  <p>
						  <?php 

 include('../include/database/db.php'); 
 
 
// echo $name;
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

	 if($query){
					
 	$result = mysql_query("SELECT MAX(id) FROM supplier");
    $row = mysql_fetch_row($result);
    $sup_id = $row[0];
		//fetch tha data from the database 
		// $sup_id1 ="";
		// while ($row = mysql_fetch_array($result)) 
		// { 
				// $sup_id1 = $row['id'];
		// }
		
				// $sup_id = $sup_id1 + 1;
				// echo  $sup_id ;
				
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
					// $message = '<!doctype html>
					// <html>
					// <head>
					// <meta charset="utf-8">
					// <title>Tour bookings</title>
					// <style>
					// body { margin:0px; padding:0px;}
					// </style>
					// </head>

					// <body>
					 // <div style="width:500px; min-height:450px; margin:0 auto; background:#e2e2e2;">
						
						 // <div style="width:440px; min-height:390px; margin:30px; float:left; background:white;">
							 // <div style="width:440px; height:80px; border-bottom:#e1e1e1 solid 1px; background:#f5f5f5;">
								 // <a href="#" style="float:left; margin:18px 20px 0px 19px;">
								 // <img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
								      // <p style="margin: 15px;margin-top: 2px;font-family:Arial, Helvetica, sans-serif;color:#fd8900 !important;">
				// <b>Bringing out the traveler in you!</b> 
			 // </p>
								// </div>
					   
								
								// <div style="width:440px; float:left;">
								 // <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$first_name.' '.$last_name.'</h1>
									
									// <p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
									// Thank you for joining Tourbooking! We welcome you into Travel Partner Program! <br /><br />
									// User name: '.$email.' <br />
									// Password:  '.$password.'
																	
									// </p>
									// <br />
				// <p>The Tourbookings Team</p>
				// <p>Follow us on <a href="https://www.facebook.com/">Facebook</a> or <a href="http://instagram.com/">instagram</a> </p>
				// <br />
				// <br />
				// <span><a href="http://tourbookings.co/about_us.php">About Us</a>|</span>
				// <span><a href="http://tourbookings.co/customer_care.php">Customer Care</a>|</span>
				// <span><a href="http://tourbookings.co/privacy_policy.php">Privacy Policy</a></span>
				// <br />
				// <p>
					// Please do not reply to this message. To contact our Customer Care team directly, please 
					// visit our website.
				// </p>
				// <p>&copy; 2014 Tourbookings.co Pte. Ltd.</p>
				// <p>100 Cecil Street, Collective Works, Singapore - 069532</p>
								// </div>
								
								// <div style="display:none;width:440px; float:left;">
								 // <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

					// <a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
								// </div>
							// </div>
							// <div style="clear:both;"></div>
					   // </div>
					// </body>
					// </html>';								
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					//$headers .= 'To: '.$email.'' . "\r\n";
					// $headers .= 'From Name:Tourbookings Support' . "\r\n";	
					// $headers .= 'From Email:support@tourbookings.co' . "\r\n";	
					$from_name ='Tourbookings Support';
					$from_email ='support@tourbookings.co';
					$headers .= "From: ". $from_name . " <" . $from_email . ">\r\n";
					$headers .= 'Cc: support@tourbookings.co' . "\r\n";

					$mail_sent = mail( $to, $subject, $message, $headers );
					
					// echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
	 
		echo "<h3 style='padding-top: 13px;width: 670px;'><span style='font-size: 17px; '>Thank you for joining our Travel Partner Program. <a href='http://tourbookings.co/supplier' style='font-size:20px;'> Click here</a> to proceed to the login page. </span> </h3>";
	}else {
		echo "error";
	} 

?>

				</p>		

						 </div>
                            
                   
               	  </div>

                     <?php include('../footer.php'); ?>
                </div>
        			
      <div style="clear:both"></div>
   </div>

</body>
</html>
