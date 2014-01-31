<!doctype html>
<?php

 include('include/database/db.php'); 
  
?>

<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->	
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->
	<script type="text/javascript">
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});
</script>
	<script type="text/javascript">
$(document).ready(function(){
	

	   // $.ajax({
			// type:  'post',
			// url:  'ajax_request_function/ajax_landing_tour.php',
			// data: {},
			// success: function(mesg) {
			  // alert(mesg);
			  // $('.different_city').empty().append(mesg);

			// }
		// });	  

	// $('.go').click(function(){
	
	// var country_id  = $('#country option:selected').text();

	
		// $.ajax({
			// type:  'post',
			// url:  'ajax_request_function/ajax_country_change_tour.php',
			// data: {country_id:country_id},
			// success: function(mesg) {
			  // $('.different_city').empty().append(mesg);

			// }
		// });
		
	// });
	
		
		// $('#city').prop('disabled', true);
		// $('#country').change(function(){
		
			// alert('ok');
			// $('#city').prop('disabled', false);
		
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
        	<div class="banner fl">
            	<div class="flexslider">
          <ul class="slides">
            <li>
  	    	    <img src="images/Hongkong.jpg" width="1002" height="391">
				<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
					<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=Hongkong">Hongkong</a></h1>
				<!--	<p>For all you shopaholics, you cannot miss out on the plethora of markets that Hong Kong has to offer</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/India.jpg" width="1002" height="391">
				<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
			<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=India">	India</a></h1>
					<!--<p>Visit the famous Taj Mahal, the ruins of Hampi or try Camel trekking!</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/Indonesia.jpg" width="1002" height="391">
					<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
				<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=Indonesia">Indonesia</a></h1>
					<!--<p>Hosting some of the world’s most beautiful beaches</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/Malaysia.jpg" width="1002" height="391">
					<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
				<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=Malaysia">Malaysia</a></h1>
					<!--<p>Playing host to one of the world’s tallest towers</p>-->
					
				</div>
  	    		</li>
                <li>
  	    	    <img src="images/Philippines.jpg" width="1002" height="391">
					<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
				<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=Philippines">Philippines</a></h1>
					<!--<p>the Banaue Rice Terraces, numerous diving spots and beaches</p>-->
				</div>
  	    		</li>
                <li>
  	    	    <img src="images/Singapore.jpg" width="1002" height="391">
					<div style="position: absolute;background: rgba(255, 255, 255, 0.8);margin-top: -78px;z-index: 9999;margin-left: 17px;padding-left: 11px;padding-top: 2px;padding-bottom: 6px;padding-right: 10px;">
				<h1 style="color: #fd8900;font-size: 30px;"><a href="index_city.php?location=Singapore">Singapore</a></h1>
					<!--<p>A cosmopolitan city-state that got to where it is today in just half a decade</p>-->
				</div>
  	    		</li>
          </ul>
        </div>
      </div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                    	<div class="latest_offers">
                        	<h1>Welcome to TourBookings!</h1>
                            <p>
						Through the hard work of our staff here at Tour Bookings, we are able to bring to you these irresistible deals at highly affordable prices. With a wide range of tours and deals available for all ages at these six beautifully unique countries, what are you waiting for? It doesn’t get anymore Asian than this!

							</p>
                        </div>
					<div class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:20px; width:188px;">
                        	<h2></h2>
                            <ul>
                            	<li><a href="index_city.php?location=Bali"><span class="country_index">Bali</span></a></li>
                                <li><a href="index_city.php?location=Delhi"><span class="country_index">Delhi</span></a></li>
                                <li><a href="index_city.php?location=Singapore"><span class="country_index">Singapore</span></a></li>
                                <li><a href="index_city.php?location=Kuala Lumpur"><span class="country_index">Kuala Lumpur</span></a></li>
                                <li><a href="index_city.php?location=Boracay"><span class="country_index">Boracay</span></a></li>
                                
                            </ul>
                            
                    </div>

					<div class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:61px; width:150px;">
                        	<h2></h2>
                            <ul>
                            	<li><a href="index_city.php?location=Egypt"><span class="country_index">Egypt</span></a></li>
                                <li><a href="index_city.php?location=Greece"><span class="country_index">Greece</span></a></li>
                                <li><a href="index_city.php?location=Malaysia"><span class="country_index">Malaysia</span></a></li>
                                <li><a href="index_city.php?location=Malta"><span class="country_index">Malta</span></a></li>
                                <li><a href="index_city.php?location=Luxembourg"><span class="country_index">Luxembourg</span></a></li>
                                
                            </ul>
                            
                    </div>			

					
						<div class="hot_destinations fl" style="margin:0px 0px 0px 0px; width:205px; padding-left:123px;">
                        	<h2></h2>
                            <ul>
                            	<li><a href="index_city.php?location=Japan"><span class="country_index">Japan</span></a></li>
                                <li><a href="index_city.php?location=Korea"><span class="country_index">Korea</span></a></li>
                                <li><a href="index_city.php?location=Taiwan"><span class="country_index">Taiwan</span></a></li>
                                <li><a href="index_city.php?location=Australia"><span class="country_index">Australia</span></a></li>
                                <li><a href="index_city.php?location=New Zealand"><span class="country_index">New Zealand</span></a></li>
                                
                            </ul>
                            <!--<ul class="mrgn_right">
								<li><a href='category_view.php?cat_name=Outdoor Activities'>Outdoor Activities</a></li>
                                <li><a href='category_view.php?cat_name=Day Trips & Excursions'>Day Trips & Excursions</a></li>
                                <li><a href='category_view.php?cat_name=Food, Wine & Nightlife'>Food, Wine & Nightlife</a></li>
                                <li><a href='category_view.php?cat_name=Water Sports'>Water Sports</a></li>
                                <li><a href='category_view.php?cat_name=Private & Custom Tours'>Private & Custom Tours</a></li>
                                <li><a href='category_view.php?cat_name=Multi-day & Extended Tours'>Multi-day & Extended Tours</a></li>
                            </ul>-->
                        </div>	
						
						<div class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:41px; width:150px;">
                        	<h2></h2>
                            <ul>
                            	<li><a href="index_city.php?location=Hong Kong"><span class="country_index">Hong Kong</span></a></li>
                                <li><a href="index_city.php?location=Myanmar"><span class="country_index">Myanmar</span></a></li>
                                <li><a href="index_city.php?location=India"><span class="country_index">India</span></a></li>
                                <li><a href="index_city.php?location=China"><span class="country_index">China</span></a></li>
                                <li><a href="index_city.php?location=Nepal"><span class="country_index">Nepal</span></a></li>
                                
                            </ul>
                            <!--<ul class="mrgn_right">
								<li><a href='category_view.php?cat_name=Outdoor Activities'>Outdoor Activities</a></li>
                                <li><a href='category_view.php?cat_name=Day Trips & Excursions'>Day Trips & Excursions</a></li>
                                <li><a href='category_view.php?cat_name=Food, Wine & Nightlife'>Food, Wine & Nightlife</a></li>
                                <li><a href='category_view.php?cat_name=Water Sports'>Water Sports</a></li>
                                <li><a href='category_view.php?cat_name=Private & Custom Tours'>Private & Custom Tours</a></li>
                                <li><a href='category_view.php?cat_name=Multi-day & Extended Tours'>Multi-day & Extended Tours</a></li>
                            </ul>-->
                        </div>	
						
                        
                   	  <div class="different_city fl">
						 <?php
									 // include('../include/database/db.php'); 
										$sql = mysql_query("SELECT
															country.id,
															country.country_name,
															country.country_desc,
															country.country_image
															FROM
															country  LIMIT 6
															");		
										while ($row = mysql_fetch_array($sql)) 
											{ 
											  if($row['country_image']==""){
												  $no_pic = 'no_preview.png';
												  }
												  else {
												  $no_pic = $row['country_image'].'.jpg';
												  }
										echo'
											  <div id="onload_id" class="city_tour fl">
												<span>
												  <img src="images/'.$no_pic.'" alt="" width="310" height="169">  
												  </span>
												  <h1>'.$row['country_name'].'</h1>
												  <p>'.$row['country_desc'].'</p>
												  <a href="index_city.php?location='.$row['country_name'].'">View All</a>
											  </div>
											';
											
											}
									?>
					  

                        <!--  <div class="city_tour fl">
                              <span><img src="images/city_pic_4.jpg" alt="" width="310" height="169"></span>
                              <h1>Lorem ipsum dolor sit amet</h1>
                              <p>Lorem ipsum dolor sit amet, consec tetuer adipiscing. Praesent vestibu lum molestie lacuiirhs.</p>
                              <a href="tour_list.html">View All</a>
                          </div>-->

                      </div>
                      
                      	<div class="hot_destinations fl">
                        	<h2>Hot Destinations</h2>
                            <ul>
                            	<li><a href='tour_list.php?location=Bali'>Bali</a></li>
                                <li><a href='tour_list.php?location=Delhi'>Delhi</a></li>
                                <li><a href='tour_list.php?location=Singapore'>Singapore</a></li>
                                <li><a href='tour_list.php?location=Kuala Lumpur'>Kuala Lumpur</a></li>
                                <li><a href='tour_list.php?location=Boracay'>Boracay</a></li>
                                <li><a href='tour_list.php?location=Hong Kong'>Hong Kong</a></li>
                            </ul>
                            <!--<ul class="mrgn_right">
								<li><a href='category_view.php?cat_name=Outdoor Activities'>Outdoor Activities</a></li>
                                <li><a href='category_view.php?cat_name=Day Trips & Excursions'>Day Trips & Excursions</a></li>
                                <li><a href='category_view.php?cat_name=Food, Wine & Nightlife'>Food, Wine & Nightlife</a></li>
                                <li><a href='category_view.php?cat_name=Water Sports'>Water Sports</a></li>
                                <li><a href='category_view.php?cat_name=Private & Custom Tours'>Private & Custom Tours</a></li>
                                <li><a href='category_view.php?cat_name=Multi-day & Extended Tours'>Multi-day & Extended Tours</a></li>
                            </ul>-->
                        </div>
                        
                   	  <div class="welcome fl">
                            	<h1>Our Featured Tours</h1>
                          <p><img src="images/welcome_pic.jpg" width="238" height="200">
		
<br>
Here at Tour Bookings, every customer is our VIP! There is no need for you to scour the web to search for things to do on your vacation, no need to rummage through the tons of information on the Internet. We have done all of that for you! Everything is made available to your in the comfort of your home, on a single site. What’s more, we have a dedicated team that will be available to tend to your every query 24/7!
<br />
<a href="about_us.php">View More...</a></p>
							

                        </div>
                        
                    </div>
                
            	  <?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
   
    <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>
</body>
</html>
