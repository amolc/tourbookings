<?php
session_start();
 include('include/database/db.php');
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
            	<p>Pricing based on <?php echo $adult ; ?> Adult on <?php echo $datepicker3; ?></p>
                <h6>Singapore Zoo Night Safari Tour with optional Buffet Dinner
Tour/Activity Options</h6>
            </div>
            
            	<div class="center_body fl">
                	    
               	  <div class="right_penal mrgn_top fl">

					<div style="display:block;" class="shopping-cart">
					
						
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = mysql_query("SELECT id, title,hilight FROM tour WHERE id='$product_code' LIMIT 1");
		   $obj = mysql_fetch_array($results);
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj['id'].'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj['title'].' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj['hilight'].'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj['title'].'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_price['.$cart_items.']" value="'.$obj['id'].'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<input type="submit" value="Pay Now" />';
		echo '</form>';
		echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong></span>';
    }else{
		echo 'Your Cart is empty';
	}
	
    ?>



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
