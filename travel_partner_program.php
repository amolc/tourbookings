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
                          <p>Welcome to our Travel Partner Program. By signing up, you will receive access to our entire database of hotels, tours, activities, travel partners, and customers. Our custom made dashboard and marketplace will let you sell, create, and purchase hotels, tours, and activities of your choice.</p>

<h2>Benefits of joining us:</h2><br>

<ul>
<li style="list-style:disc inside !important">Large network of travel partners and customers</li>
<li style="list-style:disc inside !important">Purchase tours at very low rates</li>
<li style="list-style:disc inside !important">Become a supplier for your country</li>
</ul>
<p>We are constantly on the lookout for operators who have a strong track record and a good reputation in their city. We evaluate the customer-service procedures of the operator, and make sure that they meet our high standards of quality and safety.</p>

                        </div>
                        
                        
                        
                        
                        
                        <div class="about_us_category border fl">
                          <div class="handpicked fl">
                            <h2>Interested in Becoming a Tourbookings Travel Partner?</h2>
		<br>
					
Tourbookings is alwaysinterestedto find new, quality products from local operators who provide attraction passes,sightseeing and guided tours,outdoor activities,events,or any specialty offerings to tourists.
Please notethatwe try not to contract duplicate products. If you are interested in distributing your products through our Tourbookings, and through our global network of affiliates, please sign up through our Travel Partner Sign Up.<br><br>


<p><a href="<?php echo SITE_URL; ?>/supplier/index.php">Sign up now!</a></p>

	<br>
					</div>
                        
                      </div>

                              <div class="register_form fl" style="width:auto; margin:0px 0px 0px 20px;">
                                <a href="supplier/index.php"><input style="margin-left:0px;" name="submit" value="Sign Up" id="registeration_button" type="submit"></a>
                              </div>
							
                     <?php include('footer.php'); ?>
                            </div>
                </div>

      <div style="clear:both"></div>
</body>
</html>
