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

        	<div class="banner fl"><img src="images/partner_signup.jpg" alt="" width="1002" height="260"></div>

            	<div class="center_body fl">
						
                        <div class="about_us">
                       	  <h1>Travel Partner Program</h1>
                          <p>Our Travel Partner Program allows you access to our wealth of customers that visits TourBookings on a regular basis to plan their vacation. Specialising in Asia, our travel portal will serve to advertise and market the tours that you have.</p>
                        </div>
                        
                        
                        
                        
                        
                        <div class="about_us_category border fl">
                          <div class="handpicked fl">
                            <h1>Why TourBookings?</h1>
							<p>Refer to <a href="about_us.php">About Us.</a></p>
						</div>
                        
                        <div class="handpicked fl">
                            <h1>How to join us?</h1>
                           <p>Simply sign up for an account by clicking on the Sign Up tab below and follow the steps provided.</p>
                          </div>
                          
                          <div class="handpicked fl">
                            <h1>How much will this cost?</h1>
                            <p>At TourBookings, we strive to bring you the best at an affordable price. With our Travel Partner Program, you will only have to pay for a monthly administrative fee of $50, with a minimal commitment period of three months.</p>
                          </div>
                      </div>

                              <div class="register_form fl" style="width:auto; margin:0px 0px 0px 20px;">
                                <a href="partner/partner_signup.php"><input style="margin-left:0px;" name="submit" value="Sign Up" id="registeration_button" type="submit"></a>
                              </div>
							
                     <?php include('footer.php'); ?>
                            </div>
                </div>

      <div style="clear:both"></div>
</body>
</html>
