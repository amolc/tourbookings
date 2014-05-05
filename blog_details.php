<?php
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$blog_id = $_GET['blog_id'];
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
			$tour_title =  $record['title'];
			// echo $tour_title;
			$description  =  $record['description'];
                        $image_url = $record['image_url'];
			
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
	
		
			var blog_id = '<?php echo $blog_id; ?>';
			var rate = therate;
			var comments_box = $('#comments_box').val();
			  // alert(rate);
                        // alert(blog_id);
			if( comments_box == "") {
				alert('please Enter Comment');
				return false;
			}
		else {
			
						
						 $.ajax({

								type:  'post',
								url:  'ajax_request_function/ajax_add_blog_reviews.php',
								data: {blog_id:blog_id,rate:rate,comments_box:comments_box},
								success: function(mesg) {
								  alert(mesg);
									location.reload();
								   
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
           	<div class="left_penal fl">
                    	<div class="insider_guide fl">
                          <h1>Insider's Guide to &nbsp;&nbsp;&nbsp;</h1>
                          <p>Major attractions, tips and our top<br>
                          things to see and do.</p>
                          <a href="javascript:void(0)">Look Inside</a>
                        </div>
                        	<div class="singapore_things fl">
                              <h2 style="display:none;">Singapore Things To Do</h2>
                                <ul>
                                    <li style="display:none;"><a href="#">All Things to Do...</a></li>
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
                    	<div class="right_penal fl">

                          

                          <div class="zoo_night fl">
                          	 <?php		$no_pic="";
								 if($image_url==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $image_url;
									  }
						  ?>
                          	<span class="fl first_image"><img src="admin/upload/<?php echo $no_pic; ?>" alt="" width="665" height="329"></span>
                              
                             
                                 
                              
                              <div class="picks_head fl">
                            <h2 ><?php echo $tour_title ; ?></h2>
							
                          </div>

							<div style="clear:both;"></div>
                          	
                                
                                	<p class="border-bottom" >
										<?php echo $description ; ?>
									</p>
                                 
                                
                              
                            

<div style="clear:both;"></div>
 <h2 style="margin-top: 60px;">Comment</h2>
								
								<?php
									
									$feedback_sql = mysql_query("SELECT
																blog_feedback.rating,
																blog_feedback.customer_id,
																blog_feedback.review
																FROM
																blog_feedback
																WHERE blog_feedback.blog_id ='".$blog_id."'");
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
																
																	<div style="margin-top: 22px;" class="comment_message">
																		'.$feedback_row['review'].'
																	</div>
																</div>
														
															
															
															<div style="clear:both;"></div>';
													
													}
								
								  
																$post_id = '1'; 
														?>
								<div style="margin-top: 60px;" class="comment">
                                                                         <h2> Post Comment</h2>
									<!--<div class="comments_rating">
									<div style="padding-bottom: 5px;">Rate from (1 to 5)</div>
										<div  class="rate-ex3-cnt">
											<div id="1" class="rate-btn-1 rate-btn"></div>
											<div id="2" class="rate-btn-2 rate-btn"></div>
											<div id="3" class="rate-btn-3 rate-btn"></div>
											<div id="4" class="rate-btn-4 rate-btn"></div>
											<div id="5" class="rate-btn-5 rate-btn"></div>
										</div>
										
									</div> -->
									<div style="margin-top: 20px;"  class="comments_box">
									 <div  style="padding-bottom: 5px;">Comment:</div>
										<textarea name="comments" id="comments_box" cols="50" rows="7"></textarea>
									</div>
									<div id="comments_button">
										<a id="comments_button">Comment</a>
									</div>
								</div>
</div>
                          </div>
<div style="clear:both"></div>
<?php include('footer.php'); ?>
</div>
  
                        
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