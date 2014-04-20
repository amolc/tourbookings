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
						tour_price.price_customer_adult,
						tour_price.price_customer_child,
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
			$price_customer_adult =  $record['price_customer_adult'];
			$price_customer_child =  $record['price_customer_child'];
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
<style type="text/css">
.tour_detail_calendr > #ui-datepicker-div {
	top: 427px!important;
	left: 202px!important;
}

</style>
	<script type="text/javascript">
    $(document).ready( function() {
	$(".next").hide();
	
	$(".change").click(function(){
	var source = $(this).attr('src');
  $(".first_image").hide();
  $(".next_image").attr('src',source) ;
  $(".next").show();
});

      $('#tab-container').easytabs();
	  
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
<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=784941191519375";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
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
                    	<div class="price_calender fl" style="height:160px;">
                          
                          <h1 style="font-size:30px;"><p style="font-size:30px; margin:0px;">Adult</p><?php echo"$". $price_customer_adult; ?></h1>
                          
                          <h1 style="border:none; margin-bottom:0px; padding-bottom:0px; font-size:30px;"><p style="font-size:30px; margin:0px;">Child</p><?php echo"$". $price_customer_child; ?></h1>
                          <!--<a href="#">View price calendar</a>-->
                          <a href="low_price_guarantee.php"></a>

               	</div>
				<?php 
					echo '<form method="post" action="cart_update.php">';
					
					?>
                        <div class="select_travel_date fl tour_detail_calendr">
                        	<h2>Select Travel Date</h2>
							<div class="Departing_tour_detail">
								<label>Travel Date</label>
								<input type="text" class="mySelectCalendar" id="datepicker3" name="datepicker3" placeholder="mm/dd/yyyy"/>
							</div>
                            <a   style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
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
                            <span></span>
							
                          </div>
						<div>
                          <div class="zoo_night fl">
						  <?php		$no_pic="";
								 if($tour_pic_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_pic_url;
									  }
						  ?>
                          	<span class="fl first_image"><img src="supplier/uploads/<?php echo $no_pic; ?>" alt="" width="665" height="329"></span>
                          <span  class="fl next"><img class="next_image" src="" alt="" width="665" height="329"></span></div>
						  <div style="float:left;width:380px; height:89px; overflow-x: auto; white-space: nowrap; margin-bottom:20px;">
						  <?php
						  $img_query = "select url from tour_photo where tour_id = '$tour_id'";
						  $img_result = mysql_query($img_query) or die (mysql_error());
						  while($img_row = mysql_fetch_array($img_result)){$no_pic="";
								 if($img_row['url']==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $img_row['url'];
									  }
						  ?>
						  <a class="change" src="supplier/uploads/<?php echo $no_pic; ?>" href="#"><img  class="preview change_image" src="supplier/uploads/<?php echo $no_pic; ?>" alt="" width="69" height="69"></a>
						  <?php
						  }
						  ?>
						</div>
						

                          	<div id="tab-container">
                              <ul class='etabs'>
                                <li class='tab'><a href="#tabs1">Overview</a></li>
                                <li class='tab'><a href="#tabs2">Schedule</a></li>
                                <li class='tab'><a href="#tabs3">Additional Info</a></li>
                              </ul>
                              <div id="tabs1" class=" three_tabs fl">
                                <div class="overview fl">
                                	<p class="border-bottom">
										<?php echo $tour_overview ; ?>
									</p>
                                  <h1>Highlights</h1>
                                  <ul class="border-bottom">
                                    	
										<?php echo $tour_hilight ; ?>
                                    </ul>
                                  <h1>Why Travelers Chose this Tour</h1>
                                  <p>
									<?php echo $tour_why_this ; ?>
								  </p>
                                </div>
                                <!-- content -->
                              </div>
                              <div id="tabs2" class=" three_tabs fl">
									  	 <div class="overview fl">
									<h1>Departure </h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_deparchture_point ; ?>
                                    </ul>
                                    <h1>Return </h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_return_detail ; ?>
                                    </ul>
                                   </div>

                                <!-- content -->
                              </div>
                              <div id="tabs3" class=" three_tabs fl">
                              	 <div class="overview fl">
									<h1>Inclusions</h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_inclusions ; ?>
                                    </ul>
                                    
                                   <h1>Exclusions</h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_exclusions ; ?>
                                    </ul>
                                   
                                    </div>
								
                                <!-- content -->
                              </div>
                            </div>

                        </div>
                     
                </div>
                <?php include('footer.php'); ?>
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