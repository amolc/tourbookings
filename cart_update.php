<?php
session_start();
 include('include/database/db.php');
 // if($_GET['temp'] =='1')
 // {
	// $tour_id = $_GET['tour_id'];
	// $adult = $_GET['price'];

	// $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
// $datepicker3 = date("m/d/Y", $today_date);

 // }
 // else {

	$tour_id = mysql_real_escape_string($_POST['tour_id']);
	$adult = mysql_real_escape_string($_POST['adult']);
	$child = mysql_real_escape_string($_POST['child']);
		$datepicker3 = mysql_real_escape_string($_POST['datepicker3']);
	$datepicker4 = mysql_real_escape_string($_POST['datepicker4']);
	$tour_title = mysql_real_escape_string($_POST['tour_title']);
	$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
	$price_per_person = mysql_real_escape_string($_POST['price_per_person']);

 // }
	// $total_price_c = mysql_real_escape_string($_POST['total_price_c']);

?>


<?php
//add item in shopping cart
if($_POST["type"]=='add')
{
	$product_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
	$return_url 	= base64_decode($_POST["return_url"]); //return url

	//MySqli query - get details of item from db using product code
	// $results = mysql_query("SELECT id,title,hilight FROM tour WHERE id='$product_code' LIMIT 1");
	$results = mysql_query("SELECT
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
						tour_price.currency_id,
						tour_price.price_customer_adult,
						tour_price.price_customer_child,
						tour_price.price_per_person,
						tour_price.price_child,
						tour_price.price_adult,
						tour_photo.url,
						tour_photo.description
						FROM
						tour
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.id='$product_code' GROUP BY tour.id  LIMIT 1");
	$obj = mysql_fetch_array($results);

	if ($results) { //we have the product info
$ad = $adult;
$ch = "";
								if($child=="") 
								{
									
									$ch = '0';
								}
								else {
									$ch = $child;
								}

$ch_price = $child * $obj['price_customer_child'];
$date = $datepicker3;
$ad_price = $obj['price_customer_adult'] * $adult;
$price = $ad_price + $ch_price;

		//prepare array for the session variable
		$new_product = array(array('supplier_id'=>$obj['supplier_id'],'location_id'=>$obj['location_id'],'tour_id'=>$obj['id'],'name'=>$obj['title'],'deparchture_time'=>$obj['deparchture_time'],'date'=>$date,'ad'=>$adult,'ch'=>$ch,'url'=>$obj['url'], 'code'=>$product_code, 'qty'=>1, 'price'=>$price, 'id'=>$obj['id']));

		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false

			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array
					$qty = $cart_itm["qty"]+1; //increase the quantity
					$product[] = array('supplier_id'=>$cart_itm["supplier_id"],'location_id'=>$cart_itm["location_id"],'tour_id'=>$cart_itm["tour_id"],'deparchture_time'=>$cart_itm["deparchture_time"],'date'=>$cart_itm["date"],'ad'=>$cart_itm["ad"],'ch'=>$cart_itm["ch"],'name'=>$cart_itm["name"],'url'=>$cart_itm["url"], 'code'=>$cart_itm["code"], 'qty'=>$qty, 'price'=>$cart_itm["price"], 'id'=>$cart_itm["id"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('supplier_id'=>$cart_itm["supplier_id"],'location_id'=>$cart_itm["location_id"],'tour_id'=>$cart_itm["tour_id"],'deparchture_time'=>$cart_itm["deparchture_time"],'date'=>$cart_itm["date"],'ch'=>$cart_itm["ch"],'ad'=>$cart_itm["ad"],'name'=>$cart_itm["name"],'url'=>$cart_itm["url"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"], 'id'=>$cart_itm["id"]);
				}
			}

			// if($found == false) //we didn't find item in array
			// {
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			// }else{
				//found user item in array list, and increased the quantity
				// $_SESSION["products"] = $product;
			// }

		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}

	}

	//redirect back to original page
	// header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url = base64_decode($_GET["return_url"]); //get return url

	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]==$product_code){ //item exist in the list

			//continue only if quantity is more than 1
			//removing item that has 0 qty
			if($cart_itm["qty"]>1)
			{
			$qty = $cart_itm["qty"]-1; //just decrese the quantity
			//prepare array for the products session
			$product[] = array('supplier_id'=>$cart_itm["supplier_id"],'location_id'=>$cart_itm["location_id"],'tour_id'=>$cart_itm["tour_id"],'deparchture_time'=>$cart_itm["deparchture_time"],'date'=>$cart_itm["date"],'ad'=>$cart_itm["ad"],'ch'=>$cart_itm["ch"],'name'=>$cart_itm["name"], 'url'=>$cart_itm["url"], 'code'=>$cart_itm["code"], 'qty'=>$qty, 'price'=>$cart_itm["price"], 'id'=>$cart_itm["id"]);
			}

		}else{
			$product[] = array('supplier_id'=>$cart_itm["supplier_id"],'location_id'=>$cart_itm["location_id"],'tour_id'=>$cart_itm["tour_id"],'deparchture_time'=>$cart_itm["deparchture_time"],'date'=>$cart_itm["date"],'ad'=>$cart_itm["ad"],'ch'=>$cart_itm["ch"],'name'=>$cart_itm["name"], 'url'=>$cart_itm["url"],  'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"], 'id'=>$cart_itm["id"]);
		}

		//set session with new array values
		$_SESSION["products"] = $product;
	}

	//redirect back to original page
	// header('Location:'.$return_url);
}
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->
	<script type="text/javascript">
	$(document).ready(function(){

		var total_price = $('.t_price').text();
		// alert(total_price);
		var t = $('.top_total_price').text(total_price);
	// alert(t);


$(".adult").keyup(function(){
// alert()

	var price_session = $('.price_session').val();
	var adult_oprice = $('.adult').val();
	// alert(price_session)
		var m = adult_oprice * price_session;
		var t ="USD $" + m ;
	// alert(m);
	// alert(t);
		 $(this).parent().parent().parent().next().next().next().children('.price_session_p').text(t);
		 $('.total_price_c').val(t);
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

        	<div class="black_banner fl">
            	<p>Current Cart  Total &nbsp;<span style="font-size: 20px;" class="top_total_price"></span></p>
                <h6>Review Your Order</h6>
            </div>

            	<div class="center_body fl">
<div class="wishlist_head fl">
                        	<h1>Shopping Cart</h1>
                    	</div>
                        <div class="wishlist_cotnt fl">
                        	<div class="wishlist_cotnt_head fl">
                            	<h2 class="width-1">Remove</h2>
                                <h2 class="width-2">Product</h2>
                                <h2 class="width-3">Date</h2>
                                <h2 class="width-4">Qty.</h2>
                                <h2 class="width-5 border">Price</h2>
                            </div>
                        </div>
                        <div class="wishlist_list_main fl">
									
							<?php
							if(isset($_SESSION["products"]))
							{
								$total = 0;
								echo '<form method="post" action="payment.php">';
								foreach ($_SESSION["products"] as $cart_itm)
								{
								
								
								
										echo'<div class="wishlist_list fl">
												<div class="remove fl"> <a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"><img src="images/remove_icon.jpg" width="27" height="27"></a>
												
												</div>
											  <div class="product fl">
												<h1><img src="supplier/uploads/'.$cart_itm['url'].'" alt="" width="136" height="118">
												'.$cart_itm["name"].'</h1>
												</div>
												 <div class="date fl">'.$cart_itm['date'].'</div>
											
											  <div class="qty_adult fl">
											  <div class="adult fl"><p>Adult</p>'.$cart_itm['ad'].'</div>
											  <div class="adult fl"><p>Child</p>'.$cart_itm['ch'].'</div>
											  </div>
													  <div class="price fl">
													USD $'.$cart_itm["price"].'
												</div>
												
											  
											  
										  </div>';
											
											
									
				 // echo '<div class="add_cart fl">
                    	// <div class="tour_img fl"><img src="supplier/uploads/'.$cart_itm['url'].'" alt="" width="155" height="139"> </div>

                        	// <div class="departs fl">
                            	// <div class="departs_head fl">
                                	// <h5>Departs '.$cart_itm['deparchture_time'].':00 PM</h5>
                                    // <p class="trip_title">'.$cart_itm["name"].' </p>
                                // </div>';
								
									// echo '<div style="width: 690px;">
									  // <div style="border-bottom: none;margin-left: -40px;" class="select_travel_date fl">
										// <div style="width: 256px; float:left; margin-right:10px;">
											// <label style="margin-right: -39px;">Travel Date</label>
											// <p style="padding-top: 7px;">'.$cart_itm['date'].'</p>
											// </div>
										// </div>
										// <div style="margin-left: -39px;" class="fl">
											 // <div style="width:116px; float:left; margin-right:10px;">
												// <label>Adult</label>
												// <p style="padding-left: 13px;">'.$cart_itm['ad'].'</p>
											// </div>
											// <div style="width:116px; float:left; ">
												// <label>Child</label>
												// <p style="padding-left: 13px;">'.$cart_itm['ch'].'</p>
											// </div>
										// </div>
										// <div style="clear:both;"></div>
									// </div>';
							// echo '<div class="remove-itm"><a style="font-size: 40px;float: left;margin-left: 742px;position: absolute;margin-top: -93px;" href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></div>';

                                // echo'<div class="lowest_price fl">
                                	// <p>Departs '.$cart_itm["qty"].' PM</p>
                                    // <span>How was this calculated?</span>
                                // </div><div style="clear:both;"></div>

                                // <div style="width: 760px;margin-top: -28px;" class="price_guarantee">

                                	// <p style="width: 182px;margin-top: 7px;" class="price_session_p">USD $'.$cart_itm["price"].'</p>
                           

                                    // <span>Low  Price Guarantee</span>
                                // </div>

                            // </div>

                    // </div> <div style="clear:both;"></div>';
					
						$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
									$total = ($total + $subtotal);



								}
								// echo '</ol>';  // <p class="">USD $'.//$currency.$cart_itm["price"]* $adult.'</p>
								// echo '<div class="check-out-txt"><strong class="total_price">Total : <span class="t_price">$USD '.$currency.$total.'</span></strong> <a class="checkout" href="view_cart.php">Proceed To  Check-out!</a></div>';
								echo '
								
								<div class="wishlist_cotnt_head fl" style="height:15px !important;"></div>
								
								<div style="height:150px;width"1000px;" class="check-out-txt">
									<div class="total_price">Total : <span class="t_price">USD $'.$currency.$total.'</span></div>
										<input type="hidden" class="price_session" name="supplier_id" value="'.$cart_itm["supplier_id"].'">
										<input type="hidden" class="price_session" name="tour_id" value="'.$cart_itm["tour_id"].'">
									<input type="hidden" class="price_session" name="price" value="'.$cart_itm["price"].'">
                                	<input type="hidden" class="price_session" name="deparchture_time" value="'.$cart_itm["deparchture_time"].'">
                                	<input type="hidden" class="price_session" name="name" value="'.$cart_itm["name"].'">
                                	<input type="hidden" class="price_session" name="date" value="'.$cart_itm["date"].'">
                                	<input type="hidden" class="price_session" name="ad" value="'.$cart_itm["ad"].'">
                                	<input type="hidden" class="price_session" name="ch" value="'.$cart_itm["ch"].'">
                                	<input type="hidden" class="price_session" name="country" value="'.$cart_itm["location_id"].'">
                                	<input type="hidden" class="price_session" name="total" value="'.$currency.$total.'">
									<div class="submit_cart">
										<input type="submit" value="Proceed To Check-Out"/>
									</div>
									<div class="submit_cart">
									<a class="more" href="index.php">Continue Browsing</a>
									</div>
									</form>

								</div>';
							}else{
								echo '<span class="update_cart_message" class="cart_message" >Your Cart is empty</span>';
							}
							
											
									
									?>
									
									
									
									
						  
                        </div>
						

               	<!--  <div style="width: 970px;margin-left: 12px;margin-right: 12px;position: relative;overflow-x: hidden;" class="right_penal mrgn_top fl">
				-->

							<?php
							// if(isset($_SESSION["products"]))
							// {
								// $total = 0;
								// echo '<form method="post" action="payment.php">';
								// foreach ($_SESSION["products"] as $cart_itm)
								// {
									
				 // echo '<div class="add_cart fl">
                    	// <div class="tour_img fl"><img src="supplier/uploads/'.$cart_itm['url'].'" alt="" width="155" height="139"> </div>

                        	// <div class="departs fl">
                            	// <div class="departs_head fl">
                                	// <h5>Departs '.$cart_itm['deparchture_time'].':00 PM</h5>
                                    // <p class="trip_title">'.$cart_itm["name"].' </p>
                                // </div>';
								
									// echo '<div style="width: 690px;">
									  // <div style="border-bottom: none;margin-left: -40px;" class="select_travel_date fl">
										// <div style="width: 256px; float:left; margin-right:10px;">
											// <label style="margin-right: -39px;">Travel Date</label>
											// <p style="padding-top: 7px;">'.$cart_itm['date'].'</p>
											// </div>
										// </div>
										// <div style="margin-left: -39px;" class="fl">
											 // <div style="width:116px; float:left; margin-right:10px;">
												// <label>Adult</label>
												// <p style="padding-left: 13px;">'.$cart_itm['ad'].'</p>
											// </div>
											// <div style="width:116px; float:left; ">
												// <label>Child</label>
												// <p style="padding-left: 13px;">'.$cart_itm['ch'].'</p>
											// </div>
										// </div>
										// <div style="clear:both;"></div>
									// </div>';
// echo '<div class="remove-itm"><a style="font-size: 40px;float: left;margin-left: 742px;position: absolute;margin-top: -93px;" href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></div>';

                                // echo'<div class="lowest_price fl">
                                	// <p>Departs '.$cart_itm["qty"].' PM</p>
                                    // <span>How was this calculated?</span>
                                // </div><div style="clear:both;"></div>

                                // <div style="width: 760px;margin-top: -28px;" class="price_guarantee">

                                	// <p style="width: 182px;margin-top: 7px;" class="price_session_p">USD $'.$cart_itm["price"].'</p>
                           

                                    // <span>Low  Price Guarantee</span>
                                // </div>

                            // </div>

                    // </div> <div style="clear:both;"></div>';
						// $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
									// $total = ($total + $subtotal);



								// }
								////echo '</ol>';  // <p class="">USD $'.//$currency.$cart_itm["price"]* $adult.'</p>
								////echo '<div class="check-out-txt"><strong class="total_price">Total : <span class="t_price">$USD '.$currency.$total.'</span></strong> <a class="checkout" href="view_cart.php">Proceed To  Check-out!</a></div>';
								// echo '<div style="height:150px;width"1000px;" class="check-out-txt">
									// <div class="total_price">Total : <span class="t_price">USD $'.$currency.$total.'</span></div>
									// <input type="hidden" class="price_session" name="tour_id" value="'.$cart_itm["tour_id"].'">
									// <input type="hidden" class="price_session" name="price" value="'.$cart_itm["price"].'">
                                	// <input type="hidden" class="price_session" name="deparchture_time" value="'.$cart_itm["deparchture_time"].'">
                                	// <input type="hidden" class="price_session" name="name" value="'.$cart_itm["name"].'">
                                	// <input type="hidden" class="price_session" name="date" value="'.$cart_itm["date"].'">
                                	// <input type="hidden" class="price_session" name="ad" value="'.$cart_itm["ad"].'">
                                	// <input type="hidden" class="price_session" name="ch" value="'.$cart_itm["ch"].'">
                                	// <input type="hidden" class="price_session" name="total" value="'.$currency.$total.'">
									
									// <div class="submit_cart">
										// <input type="submit" value="Proceed To  Check-Out!"/>
									// </div>
									// <div class="submit_cart">
									// <a class="more" href="index.php">Continue Browsing</a>
									// </div>
									// </form>

								// </div>';
							// }else{
								// echo 'Your Cart is empty';
							// }
							// ?>

				 <!-- </div>-->




               	  </div>
				  <div style="clear:both;"></div>
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
	<script src="js/jquery.nicescroll.min.js"></script>

    <!-- CarouFredSel -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>
  </body>
</html>