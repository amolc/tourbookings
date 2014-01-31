<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//alert('razamalik');

	// $('#registeration_button').click(function(){


		// var first_name = $('#first_name').val();
		// var last_name = $('#last_name').val();
		// var phone = $('#phone').val();
		// var email =	$('#email').val();
		// var gender =	$('#gender').val();
		// var age =	$('#age').val();
		// var country =	$('#country').val();
		// var city =	$('#city').val();
		// var address =	$('#address').val();
		// var password =	$('#password').val();

		// if(first_name == "" || last_name == "" || phone == ""|| email == ""|| password == ""|| address == ""|| gender == ""|| age == ""|| city == "" || country == "") {
				// alert('All fields are required');
		// }
		// else {
			   // $.ajax({
					// type:  'post',
					// url:  'ajax_request_function/ajax_user_registeration.php',
					// data: {first_name:first_name,last_name:last_name,phone:phone,email:email,password:password,
							// address:address,city:city,country:country,gender:gender,age:age
						  // },
					// success: function(mesg) {
					

					   // if(mesg == 'registration successful'){
						 // $('.success_mesg').empty().append('registration successful!');
						// $('#name').val("");
						// $('#phone').val("");
						// $('#email').val("");
						// $('#password').val("");
						// $('#address').val("");
						// $('#city').val("");
						// $('#age').val("");
						// $( "#country option:selected" ).empty();
						// $( "#gender option:selected" ).empty();

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
           	  <?php include('navigation.php'); ?>
            </div>
            <div class="header_logo fl">
				<?php include('header_logo.php'); ?>
            </div>
    	</div>

        	<div class="banner fl"><img src="images/partner_signup.jpg" alt="" width="1002" height="391"></div>

            	<div style="padding-left:20px;" class="center_body fl">
                	<div style="background:#fd8900; display:none;" class="left_penal fl">
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
                            	<h2>Travel Partner Program</h2><br/>
                                <p>Our Travel Partner Program allows you access to our wealth of customers that visits TourBookings on a regular basis to plan their vacation. Specialising in Asia, our travel portal will serve to advertise and market the tours that you have.</p>
                            </div>
							
							<div class="administrator_details fl">
								<h2>Why TourBookings?</h2><br/>
								<p>Refer to <a href="about_us.php">About Us.</a></p>
							</div>	
							
							
                            <div class="administrator_details fl">
								<h2>How to join us?</h2><br/>
								<p>Simply sign up for an account by clicking on the Sign Up tab below and follow the steps provided.</p>
							
							</div>
                            
                           
							
							<div class="administrator_details fl">
								<h2>How much will this cost?</h2><br/>
								<p>At TourBookings, we strive to bring you the best at an affordable price. With our Travel Partner Program, you will only have to pay for a monthly administrative fee of $50, with a minimal commitment period of three months.</p>
                            
							</div>

                            <div class="administrator_details fl">


                              <div class="register_form fl">
                                <a href="supplier_registration.php"><input name="submit" value="SignUp" id="registeration_button" type="submit"></a>
								<h2 style="padding-left: 360px;" class="success_mesg"></h2>
                              </div>
                            </div>
 

							
					</div>
                     <?php include('footer.php'); ?>
                </div>

      <div style="clear:both"></div>
   </div>

</body>
</html>
