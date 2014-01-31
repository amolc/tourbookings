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

 include('include/database/db.php'); 
 
 
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
$language = mysql_real_escape_string($_POST['language']);

	$sql   = "insert into supplier(first_name,last_name,phone,email,password,company_name,
				web_address,business_type,street_address,city,state,postcode,
				country,currency,language,year_founded,staff,office_timing,emergency_no,local_trip_date)
				values ('$first_name','$last_name','$phone','$email','$password','$company_name','$web_address','$business_type','$street_address','$city','$state','$postcode','$country','$currency','$language','$year_founded','$staff','$office_timing','$emergency_phone','$local_trips')";
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
					$subject = "<h3>Partner Membership</h3>"; 
					$message = "<b>Dear '".$first_name."' '".$last_name."'</b>
				
								<p>Thank you for successfully registering in our Travel Partner Program</p>
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
					
					// echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
	 
		echo "<h3>Thank you for joining our Travel Partner Program. <a href='index.php'> Click here</a> to go your homepage.  </h3>";
	}else {
		echo "error";
	} 

?>

				</p>		

						 </div>
                            
                   
               	  </div>

                     <?php include('footer.php'); ?>
                </div>
        			
      <div style="clear:both"></div>
   </div>

</body>
</html>
