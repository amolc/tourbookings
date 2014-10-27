<?php
	include('include/database/db.php');

	if(isset($_POST)){
		$fname = $_POST['credit_card_fname'];
        $lname = $_POST['credit_card_lname'];
		$card_number = $_POST['card_number'];
		$card_security_number = $_POST['card_security_number'];
		$expiry_date = $_POST['expiry_date'];
		$total_price = $_POST['total_price']; 

        $fullname = $fname.' '.$lname;

		if($fname!='' && $lname!='' && $card_number!='' && $card_security_number!='' && $expiry_date!=''){


			$sql = "INSERT INTO payment(name,credit_card_no,security_code,expired_date,total_price) VALUES('$fullname','$card_number','$card_security_number','$expiry_date','$total_price') ";
			$result = mysql_query($sql);

			if(!$result)die('Error Query'.mysql_error());
		}
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
                <div class="header_menu">
                    <ul>
                        <li>
                            <a href="#">Category</a>
                        </li>
                        <li>
                            <a href="#">Destinations</a>
                        </li>
                        <li>
                            <a href="#">Deals</a>
                        </li>
                    </ul>
                </div>
        	<div class="payment_thank_you">
        		<div class="msg">Thank You!</div>
        		<p>
        			You have paid successfully.
        		</p>
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
