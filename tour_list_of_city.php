<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$location = $_GET['location'];
// echo $location;

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
						tour_photo.title,
						tour_price.price_per_person,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.location_id = '".$location."'");

// $query = mysql_query("SELECT
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
						// tour_price.currency_id,
						// tour_price.price_per_person,
						// tour_price.price_child,
						// tour_price.price_adult,
						// tour_photo.title,
						// tour_photo.url,
						// tour_photo.description
						// FROM
						// tour
						// INNER JOIN tour_price ON tour.id = tour_price.tour_id
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' AND tour.id = '".$location."'");



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="css/example.css">
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
                         <h1>Insider's Guide to <?php echo $location; ?></h1>
                           <p>Major attractions, tips and our top<br>
                          things to see and do.</p>
                          <a href="#">Look Inside</a>
                        </div>
                        	<div class="singapore_things fl">
                              <h2><?php echo $location; ?> Things To Do</h2>
                                <ul>
                                    <li><a href="#">All Things to Do...</a></li>
									<?php
									// $category[] ="";
										$alla = array();
												$i=0;
									$result = mysql_query("SELECT
															tour.id,
															tour.location_id,
															tour.city,
															tour.tour_type
															FROM
															tour
															WHERE status = 'accepted' AND location_id = '".$location."' GROUP BY tour.city");


										while ($result_row = mysql_fetch_array($result))
											{
												echo'<li><a href="category_view.php?cat_name='.$result_row['id'].'">"'.$result_row['tour_type'].'"</a></li>';
													// $idd=$result_row['tour_type'];
													$data = $result_row['tour_type'];
													$alla[$i] =$data;
													$data1 = $result_row['city'];
													$alla1[$i] =$data1;
													$i++;

													// $category[] = $result_row['tour_type'];
													// echo'<li><a href="#">"'.$category.'"</a></li>';
											}
									?>
                                    <!--<li><a href="#">Cruises, Sailing & Water Tours</a></li>
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
                                    <li><a href="#">Water Sports</a></li>-->
                                    <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Recommended</h2>
                                <ul>
                                    <li><a href="#">All Recommendations... </a></li>
									<?php
											$sql_cat_city = mysql_query("SELECT
													tour.id,
													tour.tour_type,
													tour_photo.tour_id,
													tour.title,
													tour.city,
													tour.overview,
													tour.location_id,
													tour_photo.url
													FROM
													tour
													INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
													WHERE tour.status = 'accepted' GROUP BY tour.city ORDER BY id DESC LIMIT 6
													");	
											while ($row_cat_city = mysql_fetch_array($sql_cat_city)) 
												{ 
													echo'<li><a href="category_view.php?cat_name='.$row_cat_city['id'].'">'.$row_cat_city['tour_type'].'</a></li>';
												}
									
									?>
                                    <!--<li class="border"><a href="#" class="active">See all recommendations...</a></li>-->
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Top Attractions</h2>
                                <ul>
                                    <li><a href="#">All Attractions...</a></li>
                                 			<?php
											$sql_cat_city = mysql_query("SELECT
													tour.id,
													tour.tour_type,
													tour_photo.tour_id,
													tour.title,
													tour.city,
													tour.overview,
													tour.location_id,
													tour_photo.url
													FROM
													tour
													INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
													WHERE tour.status = 'accepted' GROUP BY tour.city ORDER BY id DESC LIMIT 6
													");	
											while ($row_cat_city = mysql_fetch_array($sql_cat_city)) 
												{ 
													echo'<li><a href="category_view.php?cat_name='.$row_cat_city['id'].'">'.$row_cat_city['title'].'</a></li>';
												}
									
									?>
                                    <!--<li class="border"><a href="#" class="active">See all attractions...</a></li>-->
                                </ul>
                          </div>
                        <div class="chat_now fl"><a href="#"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                    </div>
                    	<div class="right_penal fl">
                         <!-- <div class="picks_head fl">
                            <h2>Top 10 Insider's Picks</h2>
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

                           <!-- </div>-->
						<?php
	$yourVariable="";
	for ($j=0;$j<$i;$j++)
	{
							 ?>
							<div class="picks_head fl">
							<?php
										echo"<h2>";
										 echo $alla1[$j];
										 echo"</h2>";
										 // echo $yourVariable;


							?>

							<a href="see_all_tour_cat.php?cat_name=<?php echo $alla[$j];?>&city=<?php echo $alla1[$j];?>">See All</a>
                          </div>
                          <div class="tour_picks_main fl">

						  <?php

    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/Y", $today_date);

$query1 = mysql_query("SELECT
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
						WHERE tour.status = 'accepted' AND tour.location_id = '".$location."'");
						
						
						  	while ($record = mysql_fetch_array($query1))
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

									$tour_currency_id =  $record['currency_id'];

									$tour_price_per_person =  $record['price_per_person'];
									$tour_price_child =  $record['price_child'];
									
										$qry_count = mysql_query("SELECT COUNT(*)
																		FROM
																		tour_feedback WHERE tour_id = '".$record['id']."'");
																		$count_row = mysql_fetch_array($qry_count);
									
									
								  if($tour_image_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_image_url;
									  }

										echo '<form method="post" action="cart_update.php">';
												echo '<div class="tour_picks fl">
													<img src="supplier/uploads/'.$no_pic.'" alt="" width="210" height="179">
													<h3>'.$tour_title.'</h3>
													<p>
													
																<a href="review.php?tour_id='.$record['id'].'" class="reviews">
															<img src="images/rating_star.jpg" alt="" width="79" height="13">
															'.$count_row[0].' Reviews
															
													</a> <br>
												  '.$tour_location.'</p>
													<span>USD $'.$tour_price_per_person.'</span>
													<div class="detail_buttons fl">
													<a href="tour_detail.php?tour_id='.$record['id'].'" class=" view_detail fl">View Details</a>
														<a class="add_cart fr">
														<input class="submit_button2 add_to_cart" id="add_to_itinerary" type="submit" value="Add To Cart">
													</a>
													</div>
												</div>';

												echo '<input type="hidden" name="tour_title" value="'.$record['title'].'" />';
												echo '<input type="hidden" name="price_per_person" value="'.$record['price_per_person'].'" />';
												echo '<input type="hidden" name="adult" value="1" />';
												echo '<input type="hidden" name="datepicker3" value="'.$current_date.'" />';
												echo '<input type="hidden" name="product_code" value="'.$record['id'].'" />';
												echo '<input type="hidden" name="type" value="add" />';
												echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
											echo '</form>';

							// echo '<a href="add_to_cart.php?price='.$record['tour_price_per_person'].'&tour_id='.$record['id'].'&temp=1" class=" add_cart fr">Add To Cart</a>';
								}
								?>

                            </div>

							<?php
									}
							?>



							<!---->

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
					<?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
