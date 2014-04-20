<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['blog_id']);

$blog_id = $_GET['blog_id'];

$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/y", $today_date);
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$query = mysql_query("SELECT
						blog.title,
						blog.description,
						
						blog.image_url
						
						FROM
						blog
						WHERE  blog.id = '".$blog_id."' ");
						
	while ($record = mysql_fetch_array($query))
		{
			$title =  $record['title'];
			 //echo $blog_id;
			$description =  $record['description'];
			
			$image_url =  $record['image_url'];
			//echo $tour_pic_url;
			

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
           	
                    	<div class="right_penal fl">

                          <div class="picks_head fl">
                            <h2 ><?php echo $title ; ?></h2>
							
                          </div>
						<div>
                          <div class="zoo_night fl">
						  <?php		$no_pic="";
								 if($image_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $image_url;
									  }
						  ?>
                          	<span class="fl first_image"><img src="admin/upload/<?php echo $no_pic; ?>" alt="" width="380" height="329"></span>
                            <span  class="fl next"><img class="next_image" src="" alt="" width="380" height="329"></span>
                             <div class="rating fl"> 
                            	<p><a href="review.php?Bog_id=<?php echo $id; ?>">
								<div class="rate-bg" style="width:6%"></div>
									<div class="rate-stars"></div>
								<span class="Reviews_tour_detail">
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
								 
								<div class="social">
								<div id="google">
									<!-- Place this tag where you want the +1 button to render. -->
									<div class="g-plusone" data-size="tall"></div>

									<!-- Place this tag after the last +1 button tag. -->
									<script type="text/javascript">
									  (function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/platform.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									  })();
									</script>
								</div>
	
									<div id="twitter">
										<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bit.ly/twitter-api-announce" data-counturl="http://groups.google.com/group/twitter-api-announce" data-lang="en" data-count="vertical">Tweet</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									</div>
	
									<div style="float:left;margin-left:10px;" class="fb-like" data-href="http://tourbookings.co/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
									<div class="save">
                                	<a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/save.jpg" alt="" width="13" height="13">save</a>
                                    <!--<a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/email.jpg" alt="" width="13" height="13">Email</a>
                                    <a href="wish_list.php?tour_id=<?php echo $tour_id; ?>"><img src="images/print.jpg" alt="" width="13" height="13">Print</a>
										-->
									</div>
								</div>		
							</div>

                          </div>
						 
						

                          	<div id="tab-container">
                              <ul class='etabs'>
                                <li class='tab'><a href="#tabs1">Description</a></li>
                                
                              </ul>
                              <div id="tabs1" class=" three_tabs fl">
                                <div class="overview fl">
                                	<p class="border-bottom">
										<?php echo $description ; ?>
									</p>
                                 
                                </div>
                               
                              </div>
                            </div>
                         <?php include('footer.php'); ?>
                        </div>
                     
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