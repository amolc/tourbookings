<?php
 include('include/database/db.php'); 
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);
		
$cat_name = $_GET['cat_name'];
// echo $cat_name;
$city = $_GET['city'];
// $cat_name = $_GET['cat_name'];
$query1 = mysql_query("SELECT
						tour_type,
						title
						FROM
						tour
						WHERE status = 'accepted' AND id = '".$cat_name."'");
						while ($record1 = mysql_fetch_array($query1))
							{
								$name_cat = $record1['tour_type'];
							
							}
						
// echo $cat_name;
$query = mysql_query("SELECT
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
						tour.status,
						tour.supplier_id,
						tour_photo.url,
						tour_price.price_per_person,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.tour_type LIKE '%$cat_name%' AND tour.city = '".$city."'");



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
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
									<?php
									
									// $result = mysql_query("SELECT
															// tour.id,
															// tour.tour_type
															// FROM
															// tour
															// WHERE status = 'accepted' AND location_id = '".$cat_name."'");
											    
											
										// while ($result_row = mysql_fetch_array($result))
											// {
												// echo'<li><a href="#">"'.$result_row['tour_type'].'"</a></li>';
												
											
											// }
									?>
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
					
			                          <div class="picks_head fl">
                            <h2><?php echo $name_cat ; ?></h2>
                          </div>
               	  <div class="right_penal mrgn_top fl">
                    <?php
						while ($record = mysql_fetch_array($query))
							{						

										echo '<div class="add_cart fl">
											<div class="tour_img fl"><img src="supplier/uploads/'.$record['url'].'" alt="" width="155" height="139"> </div>
											
												<div class="departs fl">
													<div class="departs_head fl">
														<h5>'.$record['title'].'</h5>
														<p>&nbsp;</p>
														<p>&nbsp;</p>
														<p>'.$record['overview'].'</p>
													</div>
													
													<div class="lowest_price fl">
														<p><span>Location: </span><span>'.$record['location_id'].'</span></p>
														<p><span>Duration: </span><span>'.$record['deparchture_time'].'PM</span></p>
													</div>
													
													<div class="price_guarantee fr">
														<p class="price">USD $'.$record['price_per_person'].'</p>
														<a href="tour_detail.php?tour_id='.$record['id'].'" class=" view_detail fl">View Details</a>
														
													</div>
													
												</div>
											
										</div>';
					}
					?>
                 
                  
               	  </div>
					
                    	<!--<div class="right_penal fl">
                          <div class="picks_head fl">
                            <h2><?php //echo $cat_name ; ?></h2>
                            <a href="#">See All</a>
                          </div>
                          <div class="tour_picks_main fl">
						  
						  <?php
						  	// while ($record = mysql_fetch_array($query))
								// {
									// $record['id'];
									// $tour_title =  $record['title'];
									// $tour_overview =  $record['overview'];
									// $tour_hilight =  $record['hilight'];
									// $tour_why_this =  $record['why_this'];
									// $tour_location =  $record['location_id'];
									// $tour_city =  $record['city'];
									// $tour_duration =  $record['duration'];
									// $tour_deparchture_point =  $record['deparchture_point'];
									// $tour_deparchture_time =  $record['deparchture_time'];
									// $tour_return_detail =  $record['return_detail'];
									// $tour_inclusions =  $record['inclusions'];
									// $tour_exclusions =  $record['exclusions'];
									// $tour_voucher_info =  $record['voucher_info'];
									// $tour_local_operator_info =  $record['local_operator_info'];
									// $tour_image_url =  $record['url'];
									
									// $tour_currency_id =  $record['currency_id'];
									
									// $tour_price_per_person =  $record['price_per_person'];
									// $tour_price_child =  $record['price_child'];
								  // if($tour_image_url==""){
									  // $no_pic = 'no_preview.png';
									  // }
									  // else {
									  // $no_pic = $tour_image_url;
									  // }
													
								// echo '<div class="tour_picks fl">
                                    // <img src="supplier/uploads/'.$no_pic.'" alt="" width="210" height="179">
                                    // <h3>'.$tour_title.'</h3>
                                    // <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  // '.$tour_location.'</p>
                                    // <span>USD $'.$tour_price_per_person.'</span>
                                    // <div class="detail_buttons fl">
									// <a href="tour_detail.php?tour_id='.$record['id'].'" class=" view_detail fl">View Details</a>
                                        // <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    // </div>
                                // </div>';
								
								// }
								// ?>
                            </div>

					
                  </div>-->
                    <div class="footer fl">
                        <div class="footer_links fl">
                        	<h2>Support</h2>
                            <ul>
                                <li><a href="#">Customer Care</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li class="border"><a href="#">Low Price Guarantee</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Group Services</a></li>
                                <li><a href="#">Mileage Program</a></li>
                                <li class="border"><a href="#">Gift Certificates</a></li>
                            </ul>
                        </div>
                        <div class="footer_links mrgn_left fl">
                          <h2>Company</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Corporate Info</a></li>
                                <li class="border"><a href="#">Media Center</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Site Map</a></li>
                                <li class="border"><a href="#">Free Newsletter</a></li>
                            </ul>
                        </div>
                        <div class="social_media fl">
                        	<a href="#" class="twitter"></a>
                            <a href="#" class="facebook"></a>
                            <a href="#" class="youtube"></a>
                            <a href="#" class="rss"></a>
                            <a href="#" class="gplus"></a>
                            <a href="#" class="pinterest"></a>
                        </div>
                    </div>
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
