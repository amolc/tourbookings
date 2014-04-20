<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$location = $_GET['location'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
 
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
			
			// var curent_d = $('.ui-datepicker-today').children().text();
			// var c = '<?php echo $current_date; ?>';
				var datepicker3 = $('#datepicker3').val();
				var datepicker4 = $('#datepicker4').val();
		// if(datepicker3 > c || datepicker3 == c )	{
			
			
				if(datepicker3 == "" || datepicker4 == "") {
					alert('please select date');
					return false;
				}
				
				if(adult == "" || adult == "0") {
					alert('Number of Adults cannot be blank');
					return false;
					adult.focus();
				}
			
			// }
			// else {
			 // alert('Please Select Current Date Or Next Date');
			 // $('#datepicker3').val('');
			 // return false ;
			// }
			
			
			
	  });
 $('.fancybox').click(function(){
				
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
        	
            	<div class="center_body fl">
                	<div  class="left_penal fl">
                    	<div  class="insider_guide fl">
                         <h1>Tour Bookings Guide to <?php echo $location; ?></h1>
                           <p>Major attractions, tips and our top<br>
                          things to see and do.</p>
                          <a href="#">Look Inside</a>
                        </div>
                        	<div style="display:none;" class="singapore_things fl">
                              <h2><?php echo $location; ?> Things To Do</h2>
                                <ul>
                                    <li><a href="#">All Things to Do...</a></li>
									<?php
									// $category[] ="";
										$alla = array();
												$i=0;
									$result = mysql_query("SELECT
															tour.id,
															tour.tour_type
															FROM
															tour
															WHERE status = 'accepted' AND city = '".$location."' GROUP BY tour.tour_type");


										while ($result_row = mysql_fetch_array($result))
											{
												echo'<li><a href="category_view.php?cat_name='.$result_row['id'].'">"'.$result_row['tour_type'].'"</a></li>';
													// $idd=$result_row['tour_type'];
													$data = $result_row['tour_type'];
													$alla[$i] =$data;
													$i++;
											}
									?>
                                  
                                    <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                </ul>
                            </div>
                            <div  class="singapore_things fl">
                              <h2>Recommended</h2>
                                <ul>
                                    
									<?php
											
													$sql_cat_city = mysql_query("SELECT
															country.id,
															country.country_name,
															country.country_desc,
															country.country_image
															FROM
															country  LIMIT 6
													");	
											while ($row_cat_city = mysql_fetch_array($sql_cat_city)) 
												{ 
													// echo'<li><a href="category_view.php?cat_name='.$row_cat_city['id'].'">'.$row_cat_city['city'].'</a></li>';
													echo'<li><a href="index_city.php?location='.$row_cat_city['country_name'].'">'.$row_cat_city['country_name'].'</a></li>';
												}
									
									?>
                                    <!--<li class="border"><a href="#" class="active">See all recommendations...</a></li>-->
                                </ul>
                            </div>
                            <div  class="singapore_things fl">
                              <h2>Top Attractions</h2>
                                <ul>
                                    <!--<li><a href="#">All Attractions...</a></li>-->
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
                        <div style="display:none;" class="chat_now fl"><a href="#"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                    </div>
                    	<div class="right_penal fl">
                        	
                          <div class="register_head fl">
                            	<h2>Request Tour</h2>
                          </div>
                            
                            <div class="administrator_details fl">
                              <div class="register_form fl">
                                <label>Tour Title *</label>
                                <input name="tourtitle" type="text">
                                <label>Number Of Fax *</label>
                                <input name="tax" type="text">
                                <label>Adult *</label>
                                <input name="adult" type="text" style="width:130px; margin-right:100px;">
                                <label>Child *</label>
                                <input name="child" type="text" style="width:130px; margin-right:100px;">
                                <label>Start Date *</label>
                                <input name="startdate" type="text" style="width:130px; margin-right:100px;">
                                <label>End Date *</label>
                                <input name="enddate" type="text" style="width:130px; margin-right:100px;">
                                <label>Tour Details *</label>
                                  <textarea name="" cols="" rows=""></textarea>
                                  <label>Budget *</label>
                                <input name="budget" type="text" style="width:130px; margin-right:100px;">
                              </div>
                          </div>
                            <div class="administrator_details fl">
                            	
                                
                              <div class="register_form fl">
                                <input name="Submit" value="Submit" type="submit">
                              </div>
                          </div>
                            
                            
               	  </div>
					<?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
     

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

  <script defer src="js/demo.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
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
