<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$tour_id = $_GET['tour_id'];
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$query = mysql_query("SELECT
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
						tour_photo.url,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.id = '".$tour_id."' GROUP BY tour.id");
	while ($record = mysql_fetch_array($query))
		{
			$tour_title =  $record['title'];
			// echo $tour_title;
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

			$tour_currency_id =  $record['currency_id'];
			$tour_pic_url =  $record['url'];
			// echo $tour_pic_url;
			$tour_price_per_person =  $record['price_per_person'];
			// echo $tour_price_per_person;
			$tour_price_child =  $record['price_child'];

		}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="css/example.css">
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

  <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

	<script type="text/javascript">
    $(document).ready( function() {
	   // alert('comments');
	   var therate ="";
	   $('.rate-btn').click(function(){    
                therate = $(this).attr('id');
				alert(therate);
				
				});
					
	  $('#comments_button').click(function(){
	
		
			var tour_id = '<?php echo $tour_id; ?>';
			var rate = therate;
			var comments_box = $('#comments_box').val();
			  alert(rate);
			if( comments_box == "") {
				alert('please Enter Comment');
				return false;
			}
		else {
			
						
						 $.ajax({
								type:  'post',
								url:  'ajax_request_function/ajax_add_reviews.php',
								data: {tour_id:tour_id,rate:rate,comments_box:comments_box},
								success: function(mesg) {
								  alert(mesg);

								   
								}
							});
			}
						
	  }); 
	  
    });
    </script>
    <script>
        // rating script
        $(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            // $('.rate-btn').click(function(){    
                // var therate = $(this).attr('id');
                // var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
				// alert(dataRate);
                // $('.rate-btn').removeClass('rate-btn-active');
                // for (var i = therate; i >= 0; i--) {
                    // $('.rate-btn-'+i).addClass('rate-btn-active');
                // };
                // $.ajax({
                    // type : "POST",
                    // url : "ajax.php",
                    // data: dataRate,
                    // success:function(){}
                // });
                
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
    	<div class="center_body fl">
		<!--<form action="add_to_cart.php" method="post">-->
           	<div class="left_penal background fl">
                    	<div class="price_calender fl">
                          <p>From USD</p>
                          <h1><span>$</span><?php echo $tour_price_per_person; ?></h1>
                          <a href="#">View price calendar</a>
                          <a href="#">$ Low  Price Guarantee</a>

               	</div>
				<?php 
					echo '<form method="post" action="cart_update.php">';
					
					?>
                        <div class="select_travel_date fl">
                        	<h2>Select Travel Date</h2>
							<div style="width:116px; float:left; margin-right:10px;">
								<label>Departing</label>
								<input type="text" class="mySelectCalendar" id="datepicker3" name="datepicker3" placeholder="mm/dd/yyyy"/>
							</div>
                            <a href="#" class="mrgn_top">What's this, and can I change it?</a>
                    	</div>
                        <div class="select_travel_date fl">
                       	  <h2 class="mrgn_top">Enter Total Number of Travelers</h2>
                        <div style="width:116px; float:left; margin-right:10px;">
                            <label>Adult</label>
							<input type="text" name="adult" id="adult"/>
                        </div>
                        <div style="width:116px; float:left;">
                            <label>Child</label>
							<input type="text" name="child" id="child"/>
                        </div>


                        <a href="#" class="mrgn_top">What's this, and can I change it?</a>
                        <div class="update_option mrgn_top fl">
						<input type="hidden" name="tour_id" value="<?php echo $_GET['tour_id'] ; ?>"/>
						<input type="hidden" name="tour_title" value="<?php echo $tour_title ; ?>" />
						<a href="#">
							<input class="submit_button" id="add_to_itinerary" type="submit" value="Add to my Itinerary"/>
						</a>
                            <p>Please note: After your purchase is
								confirmed we will email you a link to
								your voucher.
							</p>
                        </div>
                    	</div>
					<?php
					echo '<input type="hidden" name="product_code" value="'.$tour_id.'" />';
					echo '<input type="hidden" name="type" value="add" />';
					echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
					echo '</form>';
					?>
                    </div>
                    	<div class="right_penal fl">

                          <div class="picks_head fl">
                            <h2 ><?php echo $tour_title ; ?></h2>
							
                          </div>

                          <div class="zoo_night fl">
                          	<span class="fl"><img src="supplier/uploads/<?php echo $tour_pic_url; ?>" alt="" width="380" height="329"></span>

                            <div class="rating fl">
                            	<p><a href="review.php?tour_id=<?php echo $tour_id; ?>">
								<div class="rate-bg" style="width:6%"></div>
									<div class="rate-stars"></div>
								<span style="margin-left: 85px;">
								<?php
									$qry_count = mysql_query("SELECT COUNT(*)
													FROM
													tour_feedback WHERE tour_id = '".$tour_id."'");
													$count_row = mysql_fetch_array($qry_count);
								echo $count_row[0]; ?> Reviews
								</span>
								
								</a></p>
                                <ul>
								<?php
									// $qry_count1 = mysql_query("SELECT  rating , CONCAT(COUNT(*)) AS  result
														// FROM     tour_feedback WHERE tour_id = '".$tour_id."'
														// GROUP BY rating"); 
											
											
											
										
									// $query = "SELECT columnname,count(*) AS col_num FROM tablename GROUP BY columnname ASC";
									$query = "SELECT  rating , CONCAT(COUNT(*)) AS  col_num
														FROM     tour_feedback WHERE tour_id = '".$tour_id."'
														GROUP BY rating";
									$result = mysql_query($query);
									while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
									while(list($key, $value) = each($row)) 
									{ 
									if($key!="col_num") $name = $value;
									else $count[$name]=$value;
									}
									}
									while(list($key, $value) = each($count))
									// echo "$key = $value<br>"; 
										
										echo '<li>
										   <p>Star '.$key.' </p>
										  <progress value="'.$value.'" max="100"></progress>
										  <a href="#">'.$value.'</a>
										</li>';
							
								
								
											
											
					// $qry_count = mysql_query("SELECT CONCAT('Start',rating, '<progress value=', COUNT(rating),'max='100'></progress>',COUNT(rating))  result
											// FROM     tour_feedback
											// GROUP BY rating ");
																	
											// $c =1;
									// $count_row1 = mysql_free_result($qry_count1);
									// $count_row1 = mysql_fetch_field($qry_count1);
									// for($i=1 ; $i<6; $i++)
									// {
										// echo $count_row[0]; 
										
										
										// echo '<li>
										  // <p>Star '.$i.'</p>
										  // <progress value="'.$count_row1.'" max="100"></progress>
										  // <a href="#">'.$count_row1.'</a>
										// </li>';
										
										// $c++;
									
									
									// }
									// echo '<li>
										  // <p>Star '.$i.'</p>
										  // <progress value="'.$count_row1[0].'" max="100"></progress>
										  // <a href="#">'.$count_row1[0].'</a>
										// </li>';
										// echo '<li>
										  // <p>Star '.$i.'</p>
										  // <progress value="'.$count_row2[0].'" max="100"></progress>
										  // <a href="#">'.$count_row2[0].'</a>
										// </li>';
										// echo '<li>
										  // <p>Star '.$i.'</p>
										  // <progress value="'.$count_row3[0].'" max="100"></progress>
										  // <a href="#">'.$count_row3[0].'</a>
										// </li>';
										// echo '<li>
										  // <p>Star '.$i.'</p>
										  // <progress value="'.$count_row3[0].'" max="100"></progress>
										  // <a href="#">'.$count_row3[0].'</a>
										// </li>';
								
								?>
                                
                                </ul>
                            </div>

                            <div class="rating border fl">
								  <p>Location: Singapore, Singapore <br>
									Duration: 4 hours (approx)</p>
								<img src="images/share_this.jpg" alt="" width="140" height="55" class="mrgn_top">
								<span><a href="wish_list.php?tour_id=<?php echo $tour_id; ?>">save</a></span>
							</div>

                          </div>
							<div style="clear:both;"></div>
                          	<div id="tab-container">
								<h2>Reviews</h2>
								<?php
									
									$feedback_sql = mysql_query("SELECT
																tour_feedback.rating,
																tour_feedback.customer_id,
																tour_feedback.review
																FROM
																tour_feedback
																WHERE tour_feedback.tour_id ='".$tour_id."'");
													while($feedback_row = mysql_fetch_array($feedback_sql))
													{
													
													    // $rate_db[] = $feedback_row;
														// $sum_rates[] = $feedback_row['rating'];
													  if(@count($feedback_row)){
															$rate_times = count($feedback_row);
															// $sum_rates = array_sum($sum_rates);
															$rate_value = $feedback_row['rating']/$rate_times;
															$rate_bg = (($rate_value)/4)*100;
														}else{
															$rate_times = 0;
															$rate_value = 0;
															$rate_bg = 0;
														}
														echo'<div style="width: 383px;margin-top: 12px;margin-bottom: 12px;position: relative; id="comments_show">
																<div class="user_pic" style="float:left;width: 340px;width: 40px;height: 52px;">
																	<img style="width: 32px;height: 32px;" src="supplier/uploads/no_preview.png" alt="" />
																</div>
																<div style="float:left;" class="comments_text">
																	<div class="comment_title">
																<div class="rate-bg" style="width:'.$rate_bg.'%"></div>
																<div class="rate-stars"></div>
																	</div>
																	<div style="margin-top: 22px;" class="comment_message">
																		'.$feedback_row['review'].'
																	</div>
																</div>
														
															</div>
															<div style="clear:both;"></div>
															';
													
													}
								
								  
																$post_id = '1'; 
															?>
								<div style="margin-top: 60px;" class="comment">
									<div class="comments_rating">
									<div style="padding-bottom: 5px;">Rate from (1 to 5)</div>
										<div  class="rate-ex3-cnt">
											<div id="1" class="rate-btn-1 rate-btn"></div>
											<div id="2" class="rate-btn-2 rate-btn"></div>
											<div id="3" class="rate-btn-3 rate-btn"></div>
											<div id="4" class="rate-btn-4 rate-btn"></div>
											<div id="5" class="rate-btn-5 rate-btn"></div>
										</div>
										
									</div>
									<div style="margin-top: 20px;"  class="comments_box">
									 <div  style="padding-bottom: 5px;">Comment:</div>
										<textarea name="comments" id="comments_box" cols="50" rows="7"></textarea>
									</div>
									<div style="margin-top:10px;" class="comments_button">
										<a id="comments_button"  style="background:#fd8900;padding: 10px;color:#fff;">Comment</a>
									</div>
								</div>
                            </div>

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
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

    <!-- CarouFredSel -->
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>
  </body>
</html>