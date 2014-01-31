<?php 
 // include('include/database/db.php'); 
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
    	<div class="center_body fl">
           	<div class="left_penal fl">
                    	<div class="insider_guide fl">
                        	<h1>Insider's Guide to Singapore</h1>
                            <p>Major attractions, tips and our top<br>
							things to see and do.</p>
                            <a href="#">Look Inside</a>
                        </div>
                        
                        	<div class="singapore_things fl">
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
                            
                            <div class="singapore_things fl">
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
                            
                            <div class="singapore_things fl">
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
                            
                            <div class="chat_now fl"><a href="#"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                        
                    </div>
                    
                    	<div class="right_penal fl">
                        	
                          <div class="register_head fl">
                            	<h2>Payment Method</h2><br>
                          </div>
<?php 

$credit_card = mysql_real_escape_string($_POST['credit_card']);

$online_check = mysql_real_escape_string($_POST['online_check']);
$credit_card_no = mysql_real_escape_string($_POST['credit_card_no']);
$expired_date_start = mysql_real_escape_string($_POST['select3']);
$expired_date_end = mysql_real_escape_string($_POST['select33']);
$security_code = mysql_real_escape_string($_POST['security_code']);

$country = mysql_real_escape_string($_POST['country']);
$company = mysql_real_escape_string($_POST['company']);
$name = mysql_real_escape_string($_POST['name']);
$street_address = mysql_real_escape_string($_POST['street_address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$postcode = mysql_real_escape_string($_POST['postcode']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

	$sql   = "insert into payment(credit_card,online_check,credit_card_no,expired_date_start,expired_date_end,security_code,country,company,name,street_address,city,state,postcode,phone,email) values ('$credit_card','$online_check','$credit_card_no','$expired_date_start','$expired_date_end','$security_code','$country','$company','$name','$street_address','$city','$state','$postcode','$phone','$email')";
	$query = mysql_query($sql);
	 if($query){
		echo "payment successful";
	} else {
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
