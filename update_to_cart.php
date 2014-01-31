<?php
session_start();
 include('include/database/db.php');
 if($_GET['temp'] =='1')
 {
	$tour_id = $_GET['tour_id'];
	$adult = $_GET['price'];
	
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$datepicker3 = date("m/d/Y", $today_date);
	
 }
 else {
  
	$tour_id = mysql_real_escape_string($_POST['tour_id']);
	$adult = mysql_real_escape_string($_POST['adult']);
	$child = mysql_real_escape_string($_POST['child']);
		$datepicker3 = mysql_real_escape_string($_POST['datepicker3']);
	$datepicker4 = mysql_real_escape_string($_POST['datepicker4']);
	$tour_title = mysql_real_escape_string($_POST['tour_title']);
 }
 
 

	// echo $tour_title;

// $tour_id = $_GET['tour_id'];

$query = mysql_query("SELECT
						tour.id,
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
						tour.status,
						tour.supplier_id,
						tour_price.currency_id,
						tour_price.price_per_person,
						tour_price.price_child,
						tour_price.price_adult,
						tour_photo.title,
						tour_photo.url,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.id = '".$tour_id."' GROUP BY tour.id");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->	
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->
	
	<script type="text/javascript">
$(document).ready(function(){
	//alert('razamalik');
// add_cart_button
	$('.df').click(function(){
			
			
			var user_id = '1';

			var tour_id = '<?php echo $tour_id;  ?>';
			var poi_id = '1';
			var trip_title = '<?php echo $tour_title;  ?>';
			// var trip_title = $('.trip_title').val();
			var is_public = '';
			var start_date = $('#datepicker3').val();
			var end_date = $('#datepicker3').val();
			var tags = '';
			var user_status = '';
			var supplier_status = '';

			   $.ajax({
					type:  'post',
					url:  'ajax_request_function/ajax_add_intinerary.php',
					data: {user_id:user_id,tour_id:tour_id,poi_id:poi_id,trip_title:trip_title,is_public:is_public,start_date:start_date,end_date:end_date,tags:tags,user_status:user_status,supplier_status:supplier_status},
					success: function(mesg) {
					  alert(mesg);

					}
				});

	});

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
        
        	<div class="black_banner fl">
            	<p>Pricing based on <?php echo $adult ; ?> Adult on <?php echo $datepicker3; ?></p>
                <h6>Singapore Zoo Night Safari Tour with optional Buffet Dinner
Tour/Activity Options</h6>
            </div>
            
            	<div class="center_body fl">
                	<div class="left_penal mrgn_top background fl">
                   	  <div class="select_travel_date fl">
                        	<h2>Select Travel Date</h2>
                        <div style="width:116px; float:left; margin-right:10px;">
                            <label>Departing</label>
                            <input type="text" class="mySelectCalendar" id="datepicker3" value="<?php echo $datepicker3; ?>" placeholder="mm/dd/yyyy"/>
                            </div>
                    	</div>
                        <div class="select_travel_date fl">
                       	  <h2 class="mrgn_top">Enter Total Number of Travelers</h2>
                        <div style="width:116px; float:left; margin-right:10px;">
                            <label>Adult</label>
							<input type="text" value="<?php echo $adult ; ?>" name="adult"/>
                        </div>
                        <div style="width:116px; float:left;">
                            <label>Child</label>
                            <input type="text" value="<?php echo $child ; ?>" name="child"/>
                        </div>
                        
                        <a href="#" class="mrgn_top">What's this, and can I change it?</a>
                        <div class="update_option mrgn_top fl">
                        	<a href="#" id="update_option">Update Options</a>
                        </div>
                    	</div>
                        
                        
                        
                    </div>
    
               	  <div class="right_penal mrgn_top fl">
				      <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	// $results = mysql_query("SELECT * FROM tour WHERE status = 'accepted' AND id = '".$tour_id."' ORDER BY id ASC LIMIT 2");
	$results = mysql_query("SELECT
						tour.id,
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
						tour.status,
						tour.supplier_id,
						tour_price.currency_id,
						tour_price.price_per_person,
						tour_price.price_child,
						tour_price.price_adult,
						tour_photo.title,
						tour_photo.url,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.id = '".$tour_id."' GROUP BY tour.id");
    if ($results) { 
        //output results from database
        while($obj = mysql_fetch_array($results))
        {
			
			// echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			
			/*echo '<div class="product-thumb"><img src="images/'.$obj['title'].'"></div>';
            echo '<div class="product-content"><h3>'.$obj['title'].'</h3>';
            echo '<div class="product-desc">'.$obj['title'].'</div>';
            echo '<div class="product-info">Price '.$currency.$obj['hilight'].' <button class="add_to_cart">Add To Cart</button></div>';
            echo '</div>';*/
			//start
			
				 echo '<div class="add_cart fl">
                    	<div class="tour_img fl"><img src="supplier/uploads/'.$obj['url'].'" alt="" width="155" height="139"> </div>
                        
                        	<div class="departs fl">
                            	<div class="departs_head fl">
                                	<h5>Departs '.$obj['deparchture_time'].' PM</h5>
                                    <p class="trip_title">'.$obj['title'].' </p>
                                </div>
                                
                                <div class="lowest_price fl">
                                	<p>Departs '.$obj['deparchture_time'].' PM</p>
                                    <span>How was this calculated?</span>
                                </div>
                                
                                <div class="price_guarantee fr">
                                	<p class="">USD $'.$obj['price_per_person'] * $adult.'</p>
                                  									
									<a class="add_to_cart">
										<input class="submit_button2 add_to_cart" id="add_to_itinerary" type="submit" value="Add To Cart">
									</a>
                                    <span>Low  Price Guarantee</span>
                                </div>
                                
                            </div>
                        
                    </div>';
					
			
			//end
			
			
            echo '<input type="hidden" name="product_code" value="'.$obj['id'].'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            // echo '</div>';
        }
    
    }
    ?>
    </div>
    
							
                    <?php
					// $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
						// while ($record = mysql_fetch_array($query))
							// {
								
								// $record['overview'];
								// $record['hilight'];
								// $record['why_this'];
								// $record['location_id'];
								// $record['city'];
								// $record['duration'];
								// $record['deparchture_point'];
								
								// $record['return_detail'];
								// $record['inclusions'];
								// $record['exclusions'];
								// $record['voucher_info'];
								// $record['local_operator_info'];
								// $record['currency_id'];
								
								// $record['price_per_person'];
								// $record['price_child'];

							// echo '<form method="post" action="cart_update.php">';
                    // echo '<div class="add_cart fl">
                    	// <div class="tour_img fl"><img src="supplier/uploads/'.$record['url'].'" alt="" width="155" height="139"> </div>
                        
                        	// <div class="departs fl">
                            	// <div class="departs_head fl">
                                	// <h5>Departs '.$record['deparchture_time'].' PM</h5>
                                    // <p class="trip_title">'.$record['title'].' </p>
                                // </div>
                                
                                // <div class="lowest_price fl">
                                	// <p>Departs '.$record['deparchture_time'].' PM</p>
                                    // <span>How was this calculated?</span>
                                // </div>
                                
                                // <div class="price_guarantee fr">
                                	// <p class="price">USD $'.$record['price_per_person'] * $adult.'</p>
                                    // <button class="add_cart_button add_to_cart">Add To Cart</button>
                                    // <span>Low  Price Guarantee</span>
                                // </div>
                                
                            // </div>
                        
                    // </div>';
		   // echo '<input type="hidden" name="product_code" value="'.$record['id'].'" />';
            // echo '<input type="hidden" name="type" value="add" />';
			// echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
			  // echo '</form>';
					// }
					?>
                    
                  <!--  <div class="add_cart fl">   <a class="add_cart_button add_to_cart">Add To Cart</a>
                    	<div class="tour_img fl"><img src="images/night+safari.jpg" alt="" width="155" height="139"> </div>
                        
                        	<div class="departs fl">
                            	<div class="departs_head fl">
                                	<h5>Departs 6:30 PM</h5>
                                    <p>Singapore Night Safari Tour at Singapore Zoo including open tram ride </p>
                                </div>
                                
                                <div class="lowest_price fl">
                                	<p>Departs 6:30 PM</p>
                                    <span>How was this calculated?</span>
                                </div>
                                
                                <div class="price_guarantee fr">
                                	<p>USD $41.17</p>
                                    <a href="#">Add To Cart</a>
                                    <span>Low  Price Guarantee</span>
                                </div>
                                
                            </div>
                        
                    </div>
                    
                    <div class="add_cart fl">
                    	<div class="tour_img fl"><img src="images/night+safari.jpg" alt="" width="155" height="139"> </div>
                        
                        	<div class="departs fl">
                            	<div class="departs_head fl">
                                	<h5>Departs 6:30 PM</h5>
                                    <p>Singapore Night Safari Tour at Singapore Zoo including open tram ride </p>
                                </div>
                                
                                <div class="lowest_price fl">
                                	<p>Departs 6:30 PM</p>
                                    <span>How was this calculated?</span>
                                </div>
                                
                                <div class="price_guarantee fr">
                                	<p>USD $41.17</p>
                                    <a href="#">Add To Cart</a>
                                    <span>Low  Price Guarantee</span>
                                </div>
                                
                            </div>
                        
                    </div>
                    
                    <div class="add_cart fl">
                    	<div class="tour_img fl"><img src="images/night+safari.jpg" alt="" width="155" height="139"> </div>
                        
                        	<div class="departs fl">
                            	<div class="departs_head fl">
                                	<h5>Departs 6:30 PM</h5>
                                    <p>Singapore Night Safari Tour at Singapore Zoo including open tram ride </p>
                                </div>
                                
                                <div class="lowest_price fl">
                                	<p>Departs 6:30 PM</p>
                                    <span>How was this calculated?</span>
                                </div>
                                
                                <div class="price_guarantee fr">
                                	<p>USD $41.17</p>
                                    <a href="#">Add To Cart</a>
                                    <span>Low  Price Guarantee</span>
                                </div>
                                
                            </div>
                        
                    </div>    	-->
               	  </div>
                    	 <?php include('footer.php'); ?>
            	</div>
        			
      <div style="clear:both"></div>
   </div>

    <!-- Javascript -->
	
    <!-- This page JS -->
	<script src="js/js-index.js"></script>	
	
    <!-- Custom functions -->
    <script src="js/functions.js"></script>
	
    <!-- Picker UI-->	
	<script src="js/jquery-ui.js"></script>		
	
	<!-- Easing -->
    <script src="js/jquery.easing.js"></script>
	
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
	
   <!-- Nicescroll  -->	
	<script src="js/jquery.nicescroll.min.js"></script>
	
    <!-- CarouFredSel -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>	

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>
  </body>
</html>