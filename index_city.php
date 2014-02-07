
<?php

 include('include/database/db.php'); 
 $location = $_GET['location'];
 if($location=='Singapore')
 {
 header("Location: singapore_city.php?location=Singapore");
 }
 else if($location=='Hongkong')
 {
 header("Location: hongkong_city.php?location=Hong Kong");
 // echo rawurlencode('Hong kong')
 }
	// $sql = mysql_query('SELECT * FROM tour_photo where tour_id ="23"');
	// $sql = mysql_query("SELECT
						// tour.id,
						// tour_photo.tour_id,
						// tour.title,
						// tour.city,
						// tour.overview,
						// tour.location_id,
						// tour_photo.url
						// FROM
						// tour
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' GROUP BY tour.location_id ORDER BY id DESC LIMIT 6
						// ");		
	// $sql = mysql_query("SELECT
						// tour.id,
						// tour_photo.tour_id,
						// tour.title,
						// tour.overview,
						// tour.city,
						// tour_photo.url,
						// tour.location_id
						// FROM
						// tour
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' AND location_id = '".$location."'
						// GROUP BY tour.city
						// ORDER BY id DESC
						// ");	
						
		$sql = mysql_query("SELECT
							tour.id,
							tour.tour_type,
							tour.title,
							tour.overview,
							tour.hilight,
							tour.why_this,
							tour.location_id,
							tour.city,
							tour.duration,
							tour.deparchture_point,
							tour.deparchture_time,
							tour.return_detail,
							tour.inclusions,
							tour.exclusions,
							tour.voucher_info,
							tour.local_operator_info,
							tour.supplier_id,
							tour.`status`,
							tour.insert_date,
							tour.update_date,
							supplier.first_name,
							supplier.last_name,
							supplier.phone,
							supplier.email,
							supplier.`password`,
							supplier.company_name,
							supplier.web_address,
							supplier.business_type,
							supplier.street_address,
							supplier.state,
							supplier.postcode,
							supplier.country,
							supplier.currency,
							supplier.`language`,
							supplier.year_founded,
							supplier.staff,
							supplier.office_timing,
							supplier.emergency_no,
							supplier.local_trip_date,
							supplier.`status`,
							supplier_payment.supplier_id,
							supplier_payment.card,
							supplier_payment.exp_date,
							supplier_payment.`code`,
							supplier_payment.total_price,
							supplier_payment.`status`,
							supplier_payment.insert_date,
							tour_photo.url
							FROM
							tour
							INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
							INNER JOIN supplier ON supplier.id = tour.supplier_id
							INNER JOIN supplier_payment ON supplier.id = supplier_payment.supplier_id
							WHERE tour.status = 'accepted' AND tour.location_id = '".$location."' AND supplier_payment.`status` != 'suspend'
							GROUP BY tour.city
							ORDER BY id DESC
							");

?>
<!doctype html>
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
  	    	    <img  src="images/Hongkong.jpg" width="1002" height="391">
				<div class="Hongkong_index_city">
					<h1><a href="index_city.php?location=Hongkong">Hongkong</a></h1>
				<!--	<p>For all you shopaholics, you cannot miss out on the plethora of markets that Hong Kong has to offer</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/India.jpg" width="1002" height="391">
				<div class="India_index_city">
			<h1><a href="index_city.php?location=India">	India</a></h1>
					<!--<p>Visit the famous Taj Mahal, the ruins of Hampi or try Camel trekking!</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/Indonesia.jpg" width="1002" height="391">
					<div class="indonesia_index_city">
				<h1><a href="index_city.php?location=Indonesia">Indonesia</a></h1>
					<!--<p>Hosting some of the world’s most beautiful beaches</p>-->
				</div>
  	    		</li>
  	    		<li>
  	    	    <img src="images/Malaysia.jpg" width="1002" height="391">
					<div class="malaysia_index_city">
				<h1><a href="index_city.php?location=Malaysia">Malaysia</a></h1>
					<!--<p>Playing host to one of the world’s tallest towers</p>-->
					
				</div>
  	    		</li>
                <li>
  	    	    <img src="images/Philippines.jpg" width="1002" height="391">
					<div class="Philippines_index_city">
				<h1><a href="index_city.php?location=Philippines">Philippines</a></h1>
					<!--<p>the Banaue Rice Terraces, numerous diving spots and beaches</p>-->
				</div>
  	    		</li>
                <li>
  	    	    <img src="images/Singapore.jpg" width="1002" height="391">
					<div class="Singapore_index_city" >
				<h1><a href="index_city.php?location=Singapore">Singapore</a></h1>
					<!--<p>A cosmopolitan city-state that got to where it is today in just half a decade</p>-->
				</div>
  	    		</li>
          </ul>
        </div>
      </div>
          
							<?php
									 // include('../include/database/db.php'); 
										$sql2 = mysql_query("SELECT country_desc
															
															FROM country WHERE country_name='".$location."'
															
															");		
										while ($row2 = mysql_fetch_array($sql2)) 
											{ 
											$des = $row2['country_desc'];
											  
											}
									?>

		  <div class="center_body fl">
                
                	<div class="body_content fl">
                    	<div class="latest_offers">
                        	<h1><?php echo $location; ?></h1>
                            <p><?php echo $des; ?></p>
                        </div>
                        
                   	  <div class="different_city fl">
						<?php
						 if(mysql_num_rows($sql)){
						
							while ($row = mysql_fetch_array($sql)) 
		{ 
		  if($row['url']==""){
			  $no_pic = 'no_preview.png';
			  }
			  else {
			  $no_pic = $row['url'];
			  }
	echo'
		  <div id="onload_id" class="city_tour fl">
			<span>
			  <img src="supplier/uploads/'.$no_pic.'" alt="" width="310" height="169">  
			  </span>
			  <h1>'.$row['city'].'</h1>
			  <p>'.$row['overview'].'</p>
			  <a href="tour_list.php?location='.$row['city'].'">View All</a>
		  </div>
		';
		
		}
			}
else {

	echo "<span style='font-size: 20px; font-weight: bold;padding-left: 20px;'>Uh No! No tours at the moment, maybe contact <span style='color:#fd8900;'>support@tourbookings.co</span></span>";
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
                            	<h1>Welcome to Tour Bookings!</h1>
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
