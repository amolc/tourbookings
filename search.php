<?php
 include('include/database/db.php'); 
 // if(isset($_POST["filter"]))
// {
	// $Keyword = mysql_real_escape_string($_POST['Keyword1']);
	// }
	// else {
	$Keyword = mysql_real_escape_string($_POST['Keyword']);
	// }
	// $country = mysql_real_escape_string($_POST['country']);
	// $city = mysql_real_escape_string($_POST['city']);
		
// $location = $_GET['location'];
// echo $Keyword;


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
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">

<script src="admin/include/resource/js/jquery-1.10.2.min.js"></script>
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>

<!-- Add fancyBox main JS and CSS files -->
 <script type="text/javascript" src="admin/fancybox/jquery.fancybox.js?v=2.1.5"></script>
 <link rel="stylesheet" type="text/css" href="admin/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />


 <script type="text/javascript">
  $(document).ready(function() {
  // alert('oddk');
    //for update cart data start
		  $('#add_to_itinerary').click(function(){
		
			var adult = $('#adult').val();
			var child = $('#child').val();
			
			var curent_d = $('.ui-datepicker-today').children().text();
			var c = '<?php echo $current_date; ?>';
				var datepicker3 = $('#datepicker3').val();
				var datepicker4 = $('#datepicker4').val();
		if(datepicker3 > c || datepicker3 == c )	{
			
			
				if(datepicker3 == "" || datepicker4 == "") {
					alert('please select date');
					return false;
				}
				
				if(adult == "" || adult == "0") {
					alert('Number of Adults cannot be blank');
					return false;
					adult.focus();
				}
			
			}
			else {
			 alert('Please Select Current Date Or Next Date');
			 $('#datepicker3').val('');
			 return false ;
			}
			
			
			
	  });
 $('.fancybox').click(function(){
					 // alert('ok');
				// var tour_title = $('#temp_tour_title').val();
				// var supplier_id = $('#temp_supplier_id').val();
				// var price_per_person = $('#temp_price_per_person').val();
				// var product_code = $('#temp_product_code').val();
				// var temp_type = $('#temp_type').val();
				// var temp_return_url = $('#temp_return_url').val();

				// $.ajax({
						// type: 'post',
						// url: 'admin/ajax_request_function/ajax_temp_cart.php',
						// data: {tour_title:tour_title,supplier_id:supplier_id,price_per_person:price_per_person,product_code:product_code,temp_type:temp_type,temp_return_url:temp_return_url},

						// success: function(mesg) {
							// alert(mesg);

						// }

				// });

			});
	// for update cart data end
	
   $('.fancybox').fancybox();
//alert('ok'); 
   /*
    *  Different effects
    */

   // Change title type, overlay closing speed
   $(".fancybox-effects-a").fancybox({
    helpers: {
     title : {
      type : 'outside'
     },
     overlay : {
      speedOut : 0
     }
    }
   });

   // Disable opening and closing animations, change title type
   $(".fancybox-effects-b").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',

    helpers : {
     title : {
      type : 'over'
     }
    }
   });

   // Set custom style, close if clicked, change title type and overlay color
   $(".fancybox-effects-c").fancybox({
    wrapCSS    : 'fancybox-custom',
    closeClick : true,

    openEffect : 'none',

    helpers : {
     title : {
      type : 'inside'
     },
     overlay : {
      css : {
       'background' : 'rgba(238,238,238,0.85)'
      }
     }
    }
   });

   // Remove padding, set opening and closing animations, close if clicked and disable overlay
   $(".fancybox-effects-d").fancybox({
    padding: 0,

    openEffect : 'elastic',
    openSpeed  : 150,

    closeEffect : 'elastic',
    closeSpeed  : 150,

    closeClick : true,

    helpers : {
     overlay : null
    }
   });

   /*
    *  Button helper. Disable animations, hide close button, change title type and content
    */

   $('.fancybox-buttons').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',

    prevEffect : 'none',
    nextEffect : 'none',

    closeBtn  : false,

    helpers : {
     title : {
      type : 'inside'
     },
     buttons : {}
    },

    afterLoad : function() {
     this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
    }
   });


   /*
    *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
    */

   $('.fancybox-thumbs').fancybox({
    prevEffect : 'none',
    nextEffect : 'none',

    closeBtn  : false,
    arrows    : false,
    nextClick : true,

    helpers : {
     thumbs : {
      width  : 50,
      height : 50
     }
    }
   });

   /*
    *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
   */
   $('.fancybox-media')
    .attr('rel', 'media-gallery')
    .fancybox({
     openEffect : 'none',
     closeEffect : 'none',
     prevEffect : 'none',
     nextEffect : 'none',

     arrows : false,
     helpers : {
      media : {},
      buttons : {}
     }
    });

   /*
    *  Open manually
    */

   $("#fancybox-manual-a").click(function() {
    $.fancybox.open('1_b.jpg');
   });

   $("#fancybox-manual-b").click(function() {
    $.fancybox.open({
     href : 'iframe.html',
     type : 'iframe',
     padding : 5
    });
   });

   $("#fancybox-manual-c").click(function() {
    $.fancybox.open([
     {
      href : '1_b.jpg',
      title : 'My title'
     }, {
      href : '2_b.jpg',
      title : '2nd title'
     }, {
      href : '3_b.jpg'
     }
    ], {
     helpers : {
      thumbs : {
       width: 75,
       height: 50
      }
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
                          <h1>Tour Bookings Guide to Tours</h1>
                          <p>Major attractions, tips and our top<br>
                          things to see and do.</p>
                          <a href="javascript:void(0)">Look Inside</a>
                        </div>
                        	<div style="display:none;" class="singapore_things fl">
                              <h2>All Things To Do</h2>
                                <ul>
                                   							<?php
									// $category[] ="";
										$alla = array();
												$i=0;
									$result = mysql_query("SELECT
															tour.id,
															tour.tour_type
															FROM
															tour
															WHERE status = 'accepted' GROUP BY tour.tour_type");


										while ($result_row = mysql_fetch_array($result))
											{
												echo'<li><a href="category_view.php?cat_name='.$result_row['id'].'">"'.$result_row['tour_type'].'"</a></li>';
													// $idd=$result_row['tour_type'];
													// $data = $result_row['tour_type'];
													// $alla[$i] =$data;
													// $i++;

													// $category[] = $result_row['tour_type'];
													// echo'<li><a href="#">"'.$category.'"</a></li>';
											}
									?>
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Recommended</h2>
                                <ul>
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
													echo'<li><a href="category_view.php?cat_name='.$row_cat_city['id'].'">'.$row_cat_city['city'].'</a></li>';
												}
									?>
                                </ul>
                            </div>
                            <div class="singapore_things fl">
                              <h2>Top Attractions</h2>
                                <ul>
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
                                </ul>
                          </div>
                        <div style="display:none;" class="chat_now fl"><a href="javascript:void(0)"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                    </div>
                    	<div class="right_penal fl">
                          <div class="picks_head fl">
                            <h2>Search Result</h2>
                          <!--  <a href="#">See All</a>-->
                          </div>
                          <div class="tour_picks_main fl">
						  
						  <?php
						      //current URL of the Page. cart_update.php redirects back to this URL
	// $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/Y", $today_date);
$counter =0;

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
						tour_photo.url,
						tour_price.price_per_person,
						tour_price.price_customer_adult,
						tour_price.price_customer_child,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE 
						tour.location_id LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR tour.city LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR
						tour.overview LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR tour.hilight LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR
						tour_photo.description LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR tour_photo.title LIKE '%$Keyword%' AND
						 tour.status = 'accepted' OR
						 tour.title LIKE '%$Keyword%' AND
						 tour.status = 'accepted'
						 GROUP BY tour.id
						 ");
						 if(mysql_num_rows($query)){
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
									$price_customer_adult =  $record['price_customer_adult'];
									$price_customer_child =  $record['price_customer_child'];
									// $tour_price_child =  $record['price_child'];
								 if($tour_image_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_image_url;
									  }
									  $string = strip_tags($record['title']);

													if (strlen($string) > 40) {

														$stringCut = substr($string, 0, 40);

														// $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
														  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}
													
													if (strlen($string2=$record["overview"]) > 110) {

														$stringCut = substr($string2, 0, 110);

														// $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
														  $string2 = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}

													echo '<div class="tour_picks fl">
													<img src="supplier/uploads/'.$no_pic.'" alt="" width="210" height="179">
													<h3>'.$string.'</h3>';
													echo '<p  name="tour_title"  />'.$string2.'</p>';
													// echo'
													// <p><a href="#" class="reviews"><img src="images/rating_star.jpg" alt="" width="79" height="13"> 886 Reviews</a> <br>
												  // '.$tour_location.'</p>';
												  
												  echo'<span>USD $'.$price_customer_adult.'</span>
													<div class="detail_buttons fl">
													<a href="tour_detail.php?tour_id='.$record['id'].'" class=" view_detail fl">View Details</a>
													
													<a id="temperary_cart" class="fancybox add_cart fr" href="#inline'.$counter.'">Add To Cart</a>
														
													</div>
												</div>';
												
												 echo '<div id="inline'.$counter.'" style="width:600px;display: none;">';
											 echo '<form method="post" action="cart_update.php">
													<div  style ="margin-left:144px;"class="left_penal background fl">
														<div class="price_calender fl">
														  <h1 style="font-size:30px;"><p style="font-size:30px; margin:0px;">Adult</p>$'.$price_customer_adult.' </h1>
                          
                          <h1 style="border:none; margin-bottom:0px; padding-bottom:0px; font-size:30px;"><p style="font-size:30px; margin:0px;">Child</p>$'.$price_customer_child.' </h1>

														</div>
														<div class="select_travel_date fl">
															<h2>Select Travel Date</h2>
															<div class="Departing_tour_detail">
																<label>Travel Date</label>
																<input type="text" class="mySelectCalendar" id="datepicker3" name="datepicker3" placeholder="mm/dd/yyyy"/>
															</div>
														  
														</div>
														<div class="select_travel_date fl">
															<h2 class="mrgn_top">Enter Total Number of Travelers</h2>
															<div class="Adult_tour_detail">
																<label>Adult</label>
																<input type="text" name="adult" id="adult"/>
															</div>
															<div class="Child_tour_detail" >
																<label>Child</label>
																<input type="text" name="child" id="child"/>
															</div>';
															echo '<input type="hidden" name="supplier_id" id="temp_supplier_id" value="'.$record['supplier_id'].'" />';
															echo '<input type="hidden" id="temp_tour_title" name="tour_title" value="'.$record['title'].'" />';
															echo '<input type="hidden" id="temp_price_per_person" name="price_per_person" value="'.$record['price_customer_adult'].'" />';
															echo '<input type="hidden" id="temp_price_per_person" name="price_per_person" value="'.$record['price_customer_child'].'" />';
															echo '<input type="hidden" id="temp_product_code" name="product_code" value="'.$record['id'].'" />';
															echo '<input type="hidden" id="temp_type" name="type" value="add" />';
															echo '<input type="hidden" id="temp_return_url" name="return_url" value="'.$current_url.'" />';
															echo '<div class="update_option mrgn_top fl">
																<input type="hidden" name="tour_id" value="'.$_GET['tour_id'].'"/>
																<input type="hidden" name="tour_title" value="'.$tour_title.'" />
																<a>
																	<input class="submit_button" id="add_to_itinerary" type="submit" value="Add to my Itinerary"/>
																</a>
																<p>Please note: After your purchase is
																	confirmed we will email you a link to
																	your voucher.
																</p>
															</div>
														</div>
													</div>
													</form>
												 </div>';

							// echo '<a id="temperary_cart" class="fancybox add_cart fr" href="#inline'.$counter.'">Add To Cart</a>';
								$counter++; 
								
								}
							}
							else 
							{
								echo "No Results Found. Try using more general terms or fewer words";
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
                    <?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
   
   
    <!-- jQuery -->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>-->

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
    <!-- This page JS -->
	<script src="js/js-index.js"></script>

    <!-- Custom functions -->
    <script src="js/functions.js"></script>

    <!-- Picker UI-->
	<script src="js/jquery-ui.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>
</body>
</html>
