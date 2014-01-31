<?php 

 session_start(); 
 include('include/database/db.php');
if(isset($_SESSION['user_id'])){
 $user_id = $_SESSION['user_id'];
 $tour_id = $_GET['tour_id'];

	$sql   = "insert into wish_list(tour_id,user_id) values ('$tour_id','$user_id')";
	$query = mysql_query($sql);
	 if($query){
		// echo "registration successful";
	}else {
		// echo "error";
	} 
// echo $tour_id;
}
else {
	header('Location: index.php');
}

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
        	<div class="banner fl"><img src="images/small_banner.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                    	<div class="wishlist_head fl">
                        	<h1>Your Wishlist</h1>
                    	</div>
                        <div class="wishlist_cotnt fl">
                        	<div class="wishlist_cotnt_head fl">
                            	<h2 class="width-1">Remove</h2>
                                <h2 class="width-2">Product</h2>
                                <h2 class="width-3">Price</h2>
                                <h2 class="width-4">Qty.</h2>
                                <h2 class="width-5 border">Date</h2>
                            </div>
                        </div>
                        <div class="wishlist_list_main fl">
									<?php
									
									$query = mysql_query("SELECT
															tour_photo.tour_id,
															tour_price.price_per_person,
															tour.tour_type,
															tour.title,
															tour.overview,
															tour.location_id,
															tour.city,
															tour_photo.url,
															tour.duration
															FROM
															tour
															INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
															INNER JOIN tour_price ON tour.id = tour_price.tour_id
															INNER JOIN wish_list ON tour.id = wish_list.tour_id
															WHERE 
															tour.status = 'accepted' AND wish_list.user_id = '".$user_id."' GROUP BY tour.id");
										while ($record = mysql_fetch_array($query))
											{
											
											echo'<div class="wishlist_list fl">
												<div class="remove fl"> <a href="#"><img src="images/remove_icon.jpg" width="27" height="27"></a>
												</div>
											  <div class="product fl">
												<h1><img src="supplier/uploads/'.$record['url'].'" alt="" width="136" height="118">
												'.$record['title'].'</h1>
												</div>
											  <div class="price fl">
													'.$record['price_per_person'].'
												</div>
											  <div class="qty fl">
													<input type="text" style=" width:30px; height:30px; border:#cbcbcb solid 1px; text-align:center;" value="2">
												</div>
											  <div class="date fl">15-01-14<br>
											  <a href="#">Add to Cart</a></div>
										  </div>';
											
											}
											
									
									?>
						
						
                        	
                          <!--<div class="wishlist_list fl">
                            	<div class="remove fl"> <a href="#"><img src="images/remove_icon.jpg" width="27" height="27"></a>
                                </div>
                              <div class="product fl">
                                <h1><img src="images/products_pic.jpg" alt="" width="136" height="118">
                                Singapore Zoo Morning Tour with optional Jungle Breakfast amongst Orangutans</h1>
                                </div>
                              <div class="price fl">
                                	$ 33.54
                                </div>
                              <div class="qty fl">
                                	<input type="text" style=" width:30px; height:30px; border:#cbcbcb solid 1px; text-align:center;" value="2">
                                </div>
                              <div class="date fl">15-01-14<br>
                              <a href="#">Add to Cart</a></div>
                          </div>-->
						  
                        </div>
                	</div>
                	<?php include('footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
