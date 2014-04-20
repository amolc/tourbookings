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

        	<div class="banner fl"><img src="images/partner_banner.jpg" class="fl" alt="" width="1002" height="240"></div>

            	<div class="center_body fl">
						
                	<div class="body_content fl">
                   	  <div class="left_colm fl">
                        	<div class="convenience fl">
                            	<span class="fl"><img src="images/convenience_icon.png" width="45" height="45"></span>
                                <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/rates_icon.png" width="45" height="45"></span>
                                <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/saas_icon.png" width="52" height="45"></span>
                            <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/contact_icon.png" width="45" height="45"></span>
                            <h1>CONTACT US</h1>
                                <p><a href="#">Tourbookings.co</a><br>
                                  <a href="#">support@tourbookings.co</a><br>
                                  10th Floor, Collective Works,<br>
                                  100 Cecil Street, <br>
                            Singapore - 069532 </p>
                        </div>
                          
                      </div>
                        
                        <div class="right_colm fr">
                       	  <div class="partner_form fl">
                           	<h1>Join Us as a partner</h1>
                                  <label>Company Name:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Email:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Phone Number:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Contact Person:</label>
                            <input name="first_name" id="first_name" type="text"/>
                            <label>City:</label>
                                  <input name="first_name" id="first_name" type="text"/>
                                  
                                <input id="registeration_button" type="submit" value="SIGN UP" name="Submit">
                                <input id="registeration_button" type="submit" value="LOGIN" name="Submit">
                                
                          </div>
                        </div>
                        
                	</div>
							
                     <?php include('footer.php'); ?>
                            </div>
                </div>

      <div style="clear:both"></div>
</body>
</html>
