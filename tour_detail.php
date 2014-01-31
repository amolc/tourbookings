<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$tour_id = $_GET['tour_id'];

$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/y", $today_date);
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
						$tour_pic_url=="";
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
<link type="text/css" rel="stylesheet" href="css/example.css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

  <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
	  
	  $('#add_to_itinerary').click(function(){
		
			var adult = $('#adult').val();
			var child = $('#child').val();
			
			var curent_d = $('.ui-datepicker-today').children().text();
			var c = '<?php echo $current_date; ?>';
				var datepicker3 = $('#datepicker3').val();
				var datepicker4 = $('#datepicker4').val();
		if(datepicker3 > c)	{
			
			
				if(datepicker3 == "" || datepicker4 == "") {
					alert('please select date');
					return false;
				}
				
				if(adult == "" || adult == "0") {
					alert('please Enter');
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
	  
	  // $('#datepicker3').keyup(function() {
				  // alert('ss');
			   // if ($(this).val() === '<?php echo $current_date; ?>')
			   // {
				  // alert('Please Select Current Date Or Next Date');
			   // }    
			// }); 

			$('#adult').keyup(function() {
				  // alert('ss');
			   if ($(this).val() === '0')
			   {
				  $(this).val('1');
			   }    
			});
	   // var today = new Date();
    // var tomorrow = new Date();
    // tomorrow.setDate(today.getDate() + 1);

        // $("#minDate").datepicker({
            // showOn: "none",
            // minDate: tomorrow,
            // dateFormat: "DD dd-mm-yy",
            // onSelect: function(dateText) {
                // minDateChange;
            // },
            // inputOffsetX: 5,
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
                          <h1 style="text-align: center;"><?php echo"$". $tour_price_per_person; ?></h1>
                          <!--<a href="#">View price calendar</a>-->
                          <a href="low_price_guarantee.php">$Lowest Prices Guaranteed</a>

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
                            <a   style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
                    	</div>
                        <div class="select_travel_date fl">
                       	  <h2 class="mrgn_top">Enter Total Number of Travelers</h2>
                        <div style="width:130px; float:left; margin-right:10px;">
                            <label>Adult</label>
							<input type="text" name="adult" id="adult"/>
                        </div>
                        <div style="width:116px; float:left;">
                            <label>Child</label>
							<input type="text" name="child" id="child"/>
                        </div>


                        <a  style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
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
						  <?php		$no_pic="";
								 if($tour_pic_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_pic_url;
									  }
						  ?>
                          	<span class="fl"><img src="supplier/uploads/<?php echo $no_pic; ?>" alt="" width="380" height="329"></span>

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
								
									$query = "SELECT  rating , CONCAT(COUNT(*)) AS  col_num
														FROM     tour_feedback WHERE tour_id = '".$tour_id."'
														GROUP BY rating";
														
									$result = mysql_query($query);
									if(mysql_num_rows($result)){
									
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
								}
								
								else {
								
								}
									// $qry_count = mysql_query("SELECT   CONCAT(COUNT(rating)) result
																// FROM     tour_feedback
																// GROUP BY rating"); 
						// $qry_count1 = mysql_query("SELECT  rating , CONCAT(COUNT(*)) AS  result
														// FROM     tour_feedback WHERE tour_id = '".$tour_id."'
														// GROUP BY rating"); 
											
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
								<div class="save">
                                	<a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/save.jpg" alt="" width="13" height="13">save</a>
                                    <!--<a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/email.jpg" alt="" width="13" height="13">Email</a>
                                    <a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/print.jpg" alt="" width="13" height="13">Print</a>
										-->
								</div>
							</div>

                          </div>

                          	<div id="tab-container">
                              <ul class='etabs'>
                                <li class='tab'><a href="#tabs1">Overview</a></li>
                                <li class='tab'><a href="#tabs2">Schedule</a></li>
                                <li class='tab'><a href="#tabs3">Hotel Pick-up</a></li>
                              </ul>
                              <div id="tabs1" class=" three_tabs fl">
                                <div class="overview fl">
                                	<p class="border-bottom">
										<?php echo $tour_overview ; ?>
									</p>
                                  <h1>Highlights</h1>
                                  <ul class="border-bottom">
                                    	<!--<li>Award-winning nighttime jungle safari by open tram</li>
                                        <li>Close-up views of the animals on a guided trail walk</li>
                                        <li>Optional dinner at the Ulu Ulu Safari Restaurant</li>
                                        <li>Close-up views of the animals on a guided trail walk</li>
                                        <li>Optional dinner at the Ulu Ulu Safari Restaurant</li>-->
										<?php echo $tour_hilight ; ?>
                                    </ul>
                                  <h1>Why Our Insiders Chose This Tour</h1>
                                  <p>
									<?php echo $tour_why_this ; ?>
								  </p>
                                </div>
                                <!-- content -->
                              </div>
                              <div id="tabs2" class=" three_tabs fl">

									<p><?php echo $tour_deparchture_point ;?> </p>
									<p><?php echo	$tour_deparchture_time ;?> </p>
									<p><?php echo$tour_return_detail ;?> </p>

                                <!-- content -->
                              </div>
                              <div id="tabs3" class=" three_tabs fl">

									<p><?php echo $tour_inclusions ;?> </p>
									<p><?php echo $tour_exclusions ;?> </p>
									<p><?php echo $tour_voucher_info ;?> </p>
									<p><?php echo $tour_local_operator_info ;?> </p>

                                <!-- content -->
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