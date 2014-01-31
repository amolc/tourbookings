<?php
 include('include/database/db.php'); 
 // if(isset($_POST["filter"]))
// {
	// $Keyword = mysql_real_escape_string($_POST['Keyword1']);
	// }
	// else {
	$Keyword2 = mysql_real_escape_string($_POST['Keyword2']);
	$Keyword1 = mysql_real_escape_string($_POST['Keyword1']);
// if($Keyword2 !="" && $Keyword1 !="") {
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
						tour_photo.title,
						tour_photo.url,
						tour_price.price_per_person,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.location_id LIKE '%$Keyword2%' AND tour.city LIKE '%$Keyword1%'");


// }

// else {
		// $query = mysql_query("SELECT
						// tour.id,
						// tour.title,
						// tour.overview,
						// tour.hilight,
						// tour.why_this,
						// tour.location_id,
						// tour.city,
						// tour.duration,
						// tour.deparchture_point,
						// tour.deparchture_time,
						// tour.return_detail,
						// tour.inclusions,
						// tour.exclusions,
						// tour.voucher_info,
						// tour.local_operator_info,
						// tour.status,
						// tour.supplier_id,
						// tour_photo.title,
						// tour_photo.url,
						// tour_price.price_per_person,
						// tour_photo.description
						// FROM
						// tour
						// INNER JOIN tour_price ON tour.id = tour_price.tour_id
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' AND tour.location_id LIKE '%$Keyword2%' OR tour.city LIKE '%$Keyword1%'");

// }

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
        	<div class="banner fl"><img src="images/banner.jpg" alt="" width="1002" height="391"></div>
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
                          <div class="picks_head fl">
                            <h2>Top 10 Insider's Picks</h2>
                            <a href="#">See All</a>
                          </div>
                          <div class="tour_picks_main fl">
						  
						  <?php
						  	while ($record = mysql_fetch_array($query))
								{
									$record['id'];
									$tour_title =  $record['title'];
									$tour_overview =  $record['overview'];
									$tour_hilight =  $record['hilight'];
									$tour_why_this =  $record['why_this'];
									$tour_location =  $record['location_id'];
									$tour_city =  $record['city'];
									$tour_duration =  $record['duration'];
									$tour_deparchture_point =  $record['deparchture_point'];
									$tour_deparchture_time =  $record['deparchture_time'];
									$tour_return_detail =  $record['return_detail'];
									$tour_inclusions =  $record['inclusions'];
									$tour_exclusions =  $record['exclusions'];
									$tour_voucher_info =  $record['voucher_info'];
									$tour_local_operator_info =  $record['local_operator_info'];
									$tour_image_url =  $record['url'];
									
									// $tour_currency_id =  $record['currency_id'];
									
									$tour_price_per_person =  $record['price_per_person'];
									// $tour_price_child =  $record['price_child'];
								  if($tour_image_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_image_url;
									  }
													
								echo '<div class="tour_picks fl">
                                    <img src="supplier/uploads/'.$no_pic.'" alt="" width="210" height="179">
                                    <h3>'.$tour_title.'</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  '.$tour_location.'</p>
                                    <span>USD $'.$tour_price_per_person.'</span>
                                    <div class="detail_buttons fl">
									<a href="tour_detail.php?tour_id='.$record['id'].'" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>';
								
								}
								?>
                                
                                <!--<div class="tour_picks mrgn fl">
                                    <img src="images/pic-1.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>-->
                                
                            </div>
                            
                            <!--<div class="picks_head fl">
                            	<h2>Outdoor Activities</h2>
                                <a href="#">See All</a>
                            </div>
                          <div class="tour_picks_main fl">
                                
                                <div class="tour_picks fl">
                                  <img src="images/pic-2.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                                <div class="tour_picks fl">
                                  <img src="images/pic-2.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                                <div class="tour_picks mrgn fl">
                                  <img src="images/pic-2.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="picks_head fl">
                            	<h2>Tours & Sightseeing</h2>
                                <a href="#">See All</a>
                            </div>
                          <div class="tour_picks_main fl">
                                
                                <div class="tour_picks fl">
                                  <img src="images/pic-3.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                                <div class="tour_picks fl">
                                  <img src="images/pic-3.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                                <div class="tour_picks mrgn fl">
                                  <img src="images/pic-3.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
								  Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="picks_head fl">
                            	<h2>Cultural & Theme Tours</h2>
                                <a href="#">See All</a>
                            </div>
                          <div class="tour_picks_main fl">
                            <div class="tour_picks fl">
                              <img src="images/pic-4.jpg" alt="" width="210" height="179">
                              <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                              <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
                              Singapore, Singapore</p>
                              <span>USD $33.87</span>
                              <div class="detail_buttons fl">
                                  <a href="#" class=" view_detail fl">View Details</a>
                                  <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                              </div>
                          </div>
                            <div class="tour_picks fl">
                                    <img src="images/pic-4.jpg" alt="" width="210" height="179">
                                    <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                                    <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
									Singapore, Singapore</p>
                                    <span>USD $33.87</span>
                                    <div class="detail_buttons fl">
                                    	<a href="#" class=" view_detail fl">View Details</a>
                                        <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                                    </div>
                                </div>
                            <div class="tour_picks mrgn fl">
                              <img src="images/pic-4.jpg" alt="" width="210" height="179">
                              <h3>Singapore Zoo Morning Tour with optional Jungle Breakfast amongst ...</h3>
                              <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
                              Singapore, Singapore</p>
                              <span>USD $33.87</span>
                              <div class="detail_buttons fl">
                                  <a href="#" class=" view_detail fl">View Details</a>
                                  <a href="add_to_cart.html" class=" add_cart fr">Add To Cart</a>
                              </div>
                          </div>
                            </div>-->
                  </div>
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
</body>
</html>
