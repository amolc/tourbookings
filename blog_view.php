<?php
 include('include/database/db.php'); 
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);
		
//$cat_name = $_GET['cat_name'];
// $cat_name = $_GET['cat_name'];
$query1 = mysql_query("SELECT
						id,
						title
						FROM
						blog
						");
						
						
// echo $cat_name;
$query = mysql_query("SELECT
						blog.id,
						
						blog.title,
						blog.description,
						
						blog.image_url
						
						FROM
						blog
						
						");



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
        	<div class="banner fl"><img src="images/banner-2.jpg" alt="" width="1002" height="260"></div>
            	<div class="center_body fl">
                	<div class="left_penal fl">
                    	<div class="insider_guide fl">
                          <h1>Insider's Guide to &nbsp;&nbsp;&nbsp;<?php echo $location; ?></h1>
                          <p>Major attractions, tips and our top<br>
                          things to see and do.</p>
                          <a href="javascript:void(0)">Look Inside</a>
                        </div>
                        	<div class="singapore_things fl">
                              <h2 style="display:none;">Singapore Things To Do</h2>
                                <ul>
                                    <li style="display:none;"><a href="#">All Things to Do...</a></li>
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
                                    <li class="border" style="display:none;"><a href="#" class="active">See all things to do...</a></li>
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Recommended</h2>
                                <ul>
                                    <li style="display:none;"><a href="#">All Recommendations... </a></li>
                                	<?php
											$sql_cat_city = mysql_query("SELECT
													blog.id,
													blog.title
													
													FROM
													blog
													
													ORDER BY id DESC LIMIT 6
													");	
											while ($row_cat_city = mysql_fetch_array($sql_cat_city)) 
												{ 
													echo'<li><a href="blog_details.php?blog_id='.$row_cat_city['id'].'">'.$row_cat_city['title'].'</a></li>';
												}
									
									?>
                                    <!--<li class="border"><a href="#" class="active">See all recommendations...</a></li>-->
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Blog List</h2>
                                <ul>
                                    <li style="display:none;"><a href="#">All Blogs...</a></li>
                               <?php
											$sql_cat_city = mysql_query("SELECT
													blog.id,
													blog.title
													
													FROM
													blog
													
													ORDER BY id DESC 
													");	
											while ($row_cat_city = mysql_fetch_array($sql_cat_city)) 
												{ 
													echo'<li><a href="blog_details.php?blog_id='.$row_cat_city['id'].'">'.$row_cat_city['title'].'</a></li>';
												}
									
									?>
                                    <!--<li class="border"><a href="#" class="active">See all attractions...</a></li>-->
                                </ul>
                          </div>
                        <div class="chat_now fl" style="display:none;"><a href="javascript:void(0)"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                    </div>
					
			                          <div class="picks_head fl">
                            <h2><?php echo $name_cat ; ?></h2>
                          </div>
               	  <div class="right_penal mrgn_top fl">
                    <?php
						while ($record = mysql_fetch_array($query))
							{	
 													$string = strip_tags($record['description']);
														if (strlen($string) > 250) {

														// truncate string
														$stringCut = substr($string, 0, 250);

														// make sure it ends in a word so assassinate doesn't become ass...
														// $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
														 $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
													}					

										echo '<div class="add_cart fl" style="width:666px;">
											<div class="tour_img fl"><img src="admin/upload/'.$record['image_url'].'" alt="" width="200" height="139"> </div>
											
												<div class="departs fl">
													<div class="departs_head fl">
														<h5>'.$record['title'].'</h5>

														<p style="line-height: 18px;">'.$string.'</p>
													</div>
													
													
													
													<div class="price_guarantee fr">
														
														<a href="blog_details.php?blog_id='.$record['id'].'" class=" view_detail fl">View Details</a>
														
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
                    <?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
