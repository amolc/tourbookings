<?php

	session_start(); 
	include('../../../include/database/db.php'); 
	$user_id ="";
	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else
	{
		// header("Location: user_login.php");
		// $user_id_get =0;
		$user_query = mysql_query("SELECT * FROM user");
		while($user_rocord = mysql_fetch_array($user_query))
		{

			$user_id_get = $user_rocord['id'];	

		}
		$user_id =$user_id_get +1 ;
		
		
		// echo $user_id;
	}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../../../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="main_container">
    	    	<div class="header_main fl">
        	<div class="header_top fl">
           	   <?php include('../../../navigation.php'); ?>
            </div>
            <div class="header_logo fl">
            	<div class="logo fl" style="margin-top:7px;">
					<a href="index.php">
						<img src="../../../images/tourbooking_logo.png" width="256" height="105">
					</a>
				</div>      
				<form action="search_filter.php" method="post" ></form>
				<div class="header_form fr">

				<form action="search.php" method="post" >
					<input type="text" value="Keyword Search" name="Keyword" onblur="if(this.value=='') this.value='Keyword Search'" onfocus="this.value=''" required>
					<input type="submit" name="button" id="search" value="GO">
				</form>
				</div>

            </div>
    	</div>
    	<div class="center_body fl">
             	<div style="background:none;width:200px;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                           <!--	<h1>Insider's Guide to Singapore</h1>
                            <p>Major attractions, tips and our top<br>
							things to see and do.</p>
                            <a href="#">Look Inside</a>-->
                        </div>
                        
                        	<div style="display:none;" class="singapore_things fl">
                            	<h2>Singapore Things To Do</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Things to Do...</a></li>
                                        <li><a href="#">Cruises, Sailing & Water Tours</a></li>
                                        <li><a href="#">Cultural & Theme Tours</a></li>
                                        <li><a href="#">Day Trips & Excursions</a></li>
                                        <li><a href="#">Food, Wine & Nightlife</a></li>
                                        <li><a href="#" class="active">Multi-day & Exttended Tours</a></li>
                                        <li><a href="#">Outdoor Activities</a></li>
                                        <li><a href="#">Private & Custom Tours</a></li>
                                        <li><a href="#">Shore Excursions</a></li>
                                        <li><a href="#">Shows, Concerts & Sports</a></li>
                                        <li><a href="#">Sightseeing Tickets & Passes</a></li>
                                        <li><a href="#">Theme Parks</a></li>
                                        <li><a href="#">Tours & Sightseeing</a></li>
                                        <li><a href="#">Transfers & Ground Transport</a></li>
                                        <li><a href="#">Walking & Biking Tours</a></li>
                                        <li><a href="#">Water Sports</a></li>
                                        <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                    </ul>
                                
                            </div>
                            
                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Recommended</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Recommendations... </a></li>
                                        <li><a href="#">Our Top 10 Insider's Picks</a></li>
                                        <li><a href="#">Deals & Discounts </a></li>
                                        <li><a href="#">Family Friendly </a></li>
                                        <li><a href="#">Luxury & Special Occasions </a></li>
                                        <li><a href="#" class="active">Singapore Quays </a></li>
                                        <li><a href="#">Malaysia Tours from Singapore </a></li>
                                        <li><a href="#">Cruises from Singapore</a></li>
                                        <li class="border"><a href="#" class="active">See all recommendations...</a></li>
                                    </ul>
                                
                            </div>
                            
                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Top Attractions</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Attractions...</a></li>
                                        <li><a href="#">Singapore Zoo Breakfast</a></li>
                                        <li><a href="#">Singapore Zoo</a></li>
                                        <li><a href="#">Singapore Chinatown</a></li>
                                        <li><a href="#">Sentosa Island</a></li>
                                        <li><a href="#" class="active">Universal Studios Singapore</a></li>
                                        <li><a href="#">Orchard Road</a></li>
                                        <li><a href="#">Marina Bay Sands</a></li>
                                        <li class="border"><a href="#" class="active">See all attractions...</a></li>
                                    </ul>

                      </div>
                            
                                 
                </div>
                    
                    	<div class="right_penal fl">
                        	
                                             	
                         
<?php 

		// # CreatePaymentSample
		//
		// This sample code demonstrate how you can process
		// a direct credit card payment. Please note that direct 
		// credit card payment and related features using the 
		// REST API is restricted in some countries.
		// API used: /v1/payments/payment

		require __DIR__ . '/../bootstrap.php';
		use PayPal\Api\Amount;
		use PayPal\Api\Details;
		use PayPal\Api\Item;
		use PayPal\Api\ItemList;
		use PayPal\Api\CreditCard;
		use PayPal\Api\Payer;
		use PayPal\Api\Payment;
		use PayPal\Api\FundingInstrument;
		use PayPal\Api\Transaction;
	if(isset($_POST['Submit']))
	{
			$type = $_POST['type'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$credit_card_no = $_POST['credit_card_no'];
			$exp_month = $_POST['month'];
			$exp_year = $_POST['year'];
			$security_code = $_POST['security_code'];
			
			$tile_name = $_POST['name'];
			$total_price = $_POST['total'];
				// $total = "'".$total_price . ".00'";
			// echo $total;
			$qty = $_POST['qty'];
			 
			// echo $type."<br />";
			// echo $first_name."<br />";
			// echo $last_name."<br />";
			// echo $credit_card_no."<br />";
			// echo $exp_month."<br />";
			// echo $exp_year."<br />";
			// echo $security_code."<br />";
			// echo $tile_name."<br />";
			// echo $total_price."<br />";
			// echo $qty."<br />";
		// ### CreditCard
		// A resource representing a credit card that can be
		// used to fund a payment. 4417119669820331
		$card = new CreditCard();
		$card->setType($type)
			->setNumber($credit_card_no)
			->setExpireMonth($exp_month)
			->setExpireYear($exp_year)
			->setCvv2("012")
			->setFirstName($first_name)
			->setLastName($last_name);

		// ### FundingInstrument
		// A resource representing a Payer's funding instrument.
		// For direct credit card payments, set the CreditCard
		// field on this object.
		$fi = new FundingInstrument();
		$fi->setCreditCard($card);

		// ### Payer
		// A resource representing a Payer that funds a payment
		// For direct credit card payments, set payment method
		// to 'credit_card' and add an array of funding instruments.
		$payer = new Payer();
		$payer->setPaymentMethod("credit_card")
			->setFundingInstruments(array($fi));

		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information

		// $item1 = new Item();
		// $item1->setName($tile_name)
			// ->setCurrency('USD')
			// ->setQuantity($qty)
			// ->setPrice('7.50');
		// $item2 = new Item();
		// $item2->setName('Granola bars')
			// ->setCurrency('USD')
			// ->setQuantity(5)
			// ->setPrice('2.00');
			
			// $item1 = new Item();
		// $item1->setName('Ground Coffee 40 oz')
			// ->setCurrency('USD')
			// ->setQuantity(1)
			// ->setPrice('7.50');
		// $item2 = new Item();
		// $item2->setName('Granola bars')
			// ->setCurrency('USD')
			// ->setQuantity(5)
			// ->setPrice('2.00');
			
		// $itemList = new ItemList();
		// $itemList->setItems(array($item1, $item2));

		// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		// $details = new Details();
		// $details->setShipping('1.20')
			// ->setTax('1.30')
			// ->setSubtotal('17.50');

		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.

		$amount = new Amount();
		$amount->setCurrency("USD")
			->setTotal($total_price);

		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it. 
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setDescription("Payment description");

		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to sale 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setTransactions(array($transaction));

		// ### Create Payment
		// Create a payment by calling the payment->create() method
		// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state.
		try
		{
			$payment->create($apiContext);
		} 
		catch (PayPal\Exception\PPConnectionException $ex)
		{
			 // header( 'Location: CreatePayment.php?error=ok' ) ;
			echo '  <div class="register_head fl">
                            	<h2 style="text-align:center;">Paymant Failed</h2><br>
                          </div> <br />  ';
			echo "Oops ! Something went wrong. please click Back  to navigate to the page you have previously come";
			// echo "Exception: " . $ex->getMessage() . PHP_EOL;
			// var_dump($ex->getData());
			
			// exit(1);
		}

		$paypal_payment_id = $payment->getId();
if($paypal_payment_id) 
{

	$credit_card = mysql_real_escape_string($_POST['credit_card']);
	$user_name = mysql_real_escape_string($_POST['user_name']);

	$online_check = mysql_real_escape_string($_POST['online_check']);
	$credit_card_no = mysql_real_escape_string($_POST['credit_card_no']);
	$month = mysql_real_escape_string($_POST['month']);
	$year = mysql_real_escape_string($_POST['year']);
	$exp_date = $month ."-".$year;
	$security_code = mysql_real_escape_string($_POST['security_code']);

	$country = mysql_real_escape_string($_POST['country']);
	$company = mysql_real_escape_string($_POST['company']);

	$street_address = mysql_real_escape_string($_POST['street_address']);
	$city = mysql_real_escape_string($_POST['city']);
	$state = mysql_real_escape_string($_POST['state']);
	$postcode = mysql_real_escape_string($_POST['postcode']);
	$phone = mysql_real_escape_string($_POST['phone']);


	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);

	// $user_id = mysql_real_escape_string($_POST['user_id']);
	$trip_title = mysql_real_escape_string($_POST['name']);
	$tour_id = mysql_real_escape_string($_POST['tour_id']);
	$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
	$start_date = mysql_real_escape_string($_POST['date']);
	$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
	$total = mysql_real_escape_string($_POST['total']);

	// $payment_id = '1';
	// $supplier_id ='1';
	// $adult_name = mysql_real_escape_string($_POST['adult_name']);
	$child_name = mysql_real_escape_string($_POST['child_name']);
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$current_date = date("m/d/Y", $today_date);

	$payment_sql   = "insert into payment(user_id,name,credit_card_no,paypal_payment_id,expired_date,security_code,total_price,status,email,phone) values ('$user_id','$first_name','$credit_card_no','$paypal_payment_id','$exp_date','$security_code','$total','pending','$email','$phone')";
	$payment_query = mysql_query($payment_sql);
	if($payment_query)
	{
		echo " <div class='register_head fl'>
                            	<h2 style='text-align:center;'>Payment Method</h2><br> 
                          </div><ol>
				<li style='font-size:16px;'> <span style='color:green;'>Payment Successful!</span>Thanks you for purchasing through <br /> Tourbooking! You will receive an email confirmation shortly. <br />";
	}
	else
	{
		echo "error in payment";
	}
		$user_query3 = mysql_query("SELECT * FROM payment");
	while($user_rocord3 = mysql_fetch_array($user_query3))
	{

		$payment_id3 = $user_rocord3['id'];	

	}	
	$payment_id = $payment_id3;
		
	$sql   = "insert into booking(user_id,tour_id,supplier_id,payment_id,start_date,end_date,status,insert_date) values('".$user_id."','".$tour_id."','".$supplier_id."','".$payment_id."','".$start_date."','".$end_date."','pending','".$current_date."')";
	
	$query = mysql_query($sql);
	if($query)
	{
		// echo "payment successful";
	} 
	else
	{
		echo "error";
	}
	
	$alTxt= $_POST['txt'];
	$alTxt1= $_POST['txt1'];
	$N = count($alTxt);
	$booking_query = mysql_query("SELECT * FROM booking");
	while($booking_rocord = mysql_fetch_array($booking_query))
	{

	$booking_id_last = $booking_rocord['id'];	

	}	
	$booking_id = $booking_id_last;

	for($i=0; $i < $N; $i++)
    {
		// echo($alTxt[$i]);
		$sql1   = "insert into traveler(user_id,tour_id,booking_id,first_name,adult_child_status) values ('$user_id','$tour_id','$booking_id','$alTxt[$i]','adult')";
		$query1 = mysql_query($sql1);
		if($query1)
		{
			// echo "payment successful";
		} 
		else
		{
			echo "error in traveler ad";
		} 
    }
	
	$N1 = count($alTxt1);
    for($j=0; $j < $N1; $j++)
    { 
		// $sql2   = "insert into traveler(user_id,tour_id,name,sex,age,	proof_id) values ('$user_id','$tour_id','$alTxt1[$j]')";
		$sql2   = "insert into traveler(user_id,tour_id,booking_id,first_name,adult_child_status) values ('$user_id','$tour_id','$booking_id','$alTxt1[$j]','child')";
	  	$query2 = mysql_query($sql2);
		if($query2)
		{
			// echo "payment successful";
		}
		else
		{
			echo "error in traveler ch";
		} 
	}
	



	function randomPassword() 
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++)
		{
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	if($password=="")
	 {
	$pass = randomPassword();

	}
	else
	{
	$pass = $password;
	}

	// $name = mysql_real_escape_string($_POST['name']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$age = mysql_real_escape_string($_POST['age']);
	// $country = mysql_real_escape_string($_POST['country']);
	$city = mysql_real_escape_string($_POST['city']);
	$address = mysql_real_escape_string($_POST['address']);
	// $phone = mysql_real_escape_string($_POST['phone']);

		$supplier_result = mysql_query("select * from supplier where id = '".$supplier_id."'");
					   while ($supplier_row = mysql_fetch_array($supplier_result)) {
								$supplier_email = $supplier_row['email'];
								$company_name = $supplier_row['company_name'];
								$street_address = $supplier_row['street_address'];
								$phone = $supplier_row['phone'];
						}
	
	$sql   = "insert into user(first_name,password,gender,age,country,city,address,phone,email) values ('$first_name','$pass','$gender','$age','$country1','$city','$address','$phone','$email')";
	$query = mysql_query($sql);
	if($query)
	{
		// echo "registration successful";
	}
	else
	{
		echo "error in user create";
	} 
	if(isset($_SESSION['user_id'])){

	}
	else 
	{

			$to = $email;
			$subject = "Membership confirmation "; 
			// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
			$message = '
				<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>TourBookings Email</title>
									<style type="text/css">
									body {
										margin: 0px;
										padding:0px;
									}
									</style>
									</head>

									<body>

										<div style=" width:100%; height:100%; padding:30px 0px 0px 0px; background:#ececec; float:left;">
											<div style="float:left; width:100%; margin:0px 0px 0px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c; -moz-box-shadow:0px 2px 5px #7d7c7c; -ms-box-shadow:0px 2px 5px #7d7c7c; -o-box-shadow:0px 2px 5px #7d7c7c; -webkit-box-shadow:0px 2px 5px #7d7c7c;">
												<div style=" float:left; width:100%; height:182px; border-bottom:#fd8900 solid 5px; background:url(http://tourbookings.co/images/header_bg.jpg) repeat-x  center top;">
													<div style=" width:100%; float:right;">
														<ul style=" width:155px; float:right; margin:20px 30px 15px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Visit Our Site</a></li>
														<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
													  </ul>
													</div>
													<div style="width:539px; height:64px; float:left; margin-left:30px;">
														<img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
													</div>
												</div>
												<div style="width:90%; float:left; padding:0px 30px;">
													<div style="width:100%; float:left;">
														<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
															
															<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">
																	Thank you for joining Tourbookings! </h2>
														
															
														</div>
														<div style="width:100%; float:left;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">User Information</h1>
															
															<p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Username: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$email.'</a></p>
															
															<p style="width:100%; float:left; margin:0px 0px 45px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Password: <a href="#" style="text-decoration:none; color:#fd8900; font-family:Arial, Helvetica, sans-serif;">'.$pass.'</a></p>
															
														</div>
                                                          <br>
														                                                   
                                                          <div><p>Please present this voucher to your tour company or hotel to redeem your booking.</p>
                                                           
                                                            <p>Best Wishes,</p>
                                                            <p>The Tourbooking Team</p>
                                                          </div>
														<br />
														</div>
													</div>
												</div>
											</div> 
											
											<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
											
											<div style="float:left; margin:0px; width:70%;">
													  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
														<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
														<a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																								
														<li style="	float:left; list-style-type: none; margin:0px;">
														<a href="http://tourbookings.co/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
													  </ul>
													  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
													  <p style=" line-height: 0px;padding: 0;margin: 0;float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232;">100 Cecil Street, Collective Works, Singapore - 069532.</p>
											  </div>
											  
											  <div style="float:right; width:30%; text-align:right;">
												<h3 style="width:100%; float:left; color:#323232; font-family:Arial, Helvetica, sans-serif; font-size:20px; display:block; margin:20px 0px 10px 0px; padding:0px;">Follow Us</h3>
												<div style="width:100%; float:left; margin:0px;">
												<a href="https://twitter.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-1.jpg"></a>
													<a href="https://www.facebook.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-2.jpg"></a>
													<a href="http://www.youtube.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-3.jpg"></a>
													<a href="#"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-4.jpg"></a>
													<a href="https://plus.google.com" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-5.jpg"></a>
													<a href="https://www.pinterest.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-6.jpg"></a>
												</div>
											  </div>
											
										  </div>
											
											<div style="clear:both;"></div>
									</div>

									</body>
									</html>
						';
			/*$message = '<!doctype html>
						<html>
						<head>
						<meta charset="utf-8">
						<title>Tour bookings</title>
						<style>
						body { margin:0px; padding:0px;}
						</style>
						</head>

						<body>
						 <div style="width:500px; min-height:450px; margin:0 auto; background:#e2e2e2;">
							
							 <div style="width:440px; min-height:390px; margin:30px; float:left; background:white;">
								 <div style="width:440px; height:80px; border-bottom:#e1e1e1 solid 1px; background:#f5f5f5;">
									 <a href="#" style="margin:18px 20px 0px 19px;">
										<img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
									 <p style="margin: 15px;margin-top: 2px;font-family:Arial, Helvetica, sans-serif;color:#fd8900 !important;">
										<b>Bringing out the traveler in you!</b>
									 </p>
									</div>
						   
									
									<div style="width:440px; float:left;">
									 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;">
										<span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$username.'
									</h1>
										
										<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
											Thank you for joining Tourbookings!
										</p>
										<br /> 
											<p>User Information :</p>
										<p>User Name:'.$email.'</p>
										<p>User password: '.$pass.'</p>
										<br /> 
										<p>The Tourbookings Team</p>
										<p>Follow us on <a href="https://www.facebook.com/">Facebook</a> or <a href="http://instagram.com/">instagram</a> </p>
										<br />
										<br />
										<span><a href="http://tourbookings.co/about_us.php">About Us</a>|</span>
										<span><a href="http://tourbookings.co/customer_care.php">Customer Care</a>|</span>
										<span><a href="http://tourbookings.co/privacy_policy.php">Privacy Policy</a></span>
										<br />
										<p>
											Please do not reply to this message. To contact our Customer Care team directly, please 
											visit our website.
										</p>
										<p>&copy; 2014 Tourbookings.co Pte. Ltd.</p>
										<p>100 Cecil Street, Collective Works, Singapore - 069532</p>
								   </div>
									
									<div style="display:none;width:440px; float:left;">
										<h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">
											Best Wishes,
											<br>
											<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a>
										</h1>
									</div>


								</div>
								<div style="clear:both;"></div>
						   </div>
						</body>
						</html>';	*/								
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'To: '.$email.'' . "\r\n";
						$headers .= 'From: support@tourbookings.co' . "\r\n";	
		
						$mail_sent = mail( $to, $subject, $message, $headers );
		
	}
				
				$to1 = $email;
				$subject1 = "email confirmation of booking"; 
				// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
					$message1 = '<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>TourBookings Email</title>
									<style type="text/css">
									body {
										margin: 0px;
										padding:0px;
									}
									</style>
									</head>

									<body>

										<div style=" width:100%; height:100%; padding:30px 0px 0px 0px; background:#ececec; float:left;">
											<div style="float:left; width:100%; margin:0px 0px 0px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c; -moz-box-shadow:0px 2px 5px #7d7c7c; -ms-box-shadow:0px 2px 5px #7d7c7c; -o-box-shadow:0px 2px 5px #7d7c7c; -webkit-box-shadow:0px 2px 5px #7d7c7c;">
												<div style=" float:left; width:100%; height:182px; border-bottom:#fd8900 solid 5px; background:url(http://tourbookings.co/images/header_bg.jpg) repeat-x  center top;">
													<div style=" width:100%; float:right;">
														<ul style=" width:155px; float:right; margin:20px 30px 15px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Visit Our Site</a></li>
														<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
													  </ul>
													</div>
													<div style="width:539px; height:64px; float:left; margin-left:30px;">
														<img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
													</div>
												</div>
												<div style="width:90%; float:left; padding:0px 30px;">
													<div style="width:100%; float:left;">
														<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
															
															<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">
															Thank you for booking with Tourbookings! Your booking is confirmed!  </h2>
														
															
														</div>
														<div style="width:100%; float:left;">
															
						<div style="width:100%;border: 1px solid #000;">								
															
                          <div style="width:100%;height:70px;background-color:#fd8900;border: 1px solid #000;">
 
    <h1 style="width:100%; float:left; margin:0px;text-align:center; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; font-weight:bold; display:block;">Tour Confirmation Voucher</h1>
                          </div>
                          <div>
                           <br>
                           <div style="padding-left: 10px;width:20%;float:left;">Reservation information:</div><div style="width:50%;float:left;"></div>
                            <div style="clear:both;"></div>
                            <br>
                            <div style="padding-left: 10px;width:20%;float:left;">Travel Name:</div><div style="width:25%;float:left;">'.$first_name.'</div><div style="width:5%;float:left;">Adult:</div><div style="width:20%;float:left;">'.$N.'</div><div style="width:5%;float:left;">Child:</div><div style="width:20%;float:left;">'.$N1.'</div><div style="clear:both;"></div>
                             <div style="padding-left: 10px;width:20%;float:left;">Sheduled Date:</div><div style="width:25%;float:left;">'.$start_date.'</div><div style="width:5%;float:left;">Total:</div><div style="width:20%;float:left;">'.$total.'</div>
                            <div style="clear:both;"></div>
                            <div style="padding-left: 10px;width:10%;float:left;">Destination:</div><div style="width:80%;float:left;">'.$country.'</div>
                            <div style="clear:both;"></div>
                           
													
													
													
													</div>
                                                          </div>
                                                          <br>
                                                          
                                                           <div style="width:100%;border: 1px solid #000;">								
							                          <div>
                                                     <br>
                                                        <div style="padding-left: 10px;width:20%;float:left;">Tour / Hotel information:</div><div style="width:50%;float:left;"></div>
                            <div style="clear:both;"></div>
                            <br>
                           
                            
                           
                            <div style="padding-left: 10px;width:10%;float:left;">Company:</div><div style="width:80%;float:left;"> '.$company_name.'</div>
                            <div style="clear:both;"></div>
						 <div style="padding-left: 10px;width:10%;float:left;">Address:</div><div style="width:80%;float:left;">'.$street_address.'</div>
                            <div style="clear:both;"></div>
                                                         <div style="padding-left: 10px;width:10%;float:left;">Phone:</div><div style="width:80%;float:left;">'.$phone.'</div>
                            <div style="clear:both;"></div>
                           
				
													
													
													</div>
                                                          </div>
                                                          <br>
															                                                   
                                                          <div><p>Please present this voucher to your tour company or hotel to redeem your booking.</p>
                                                           
                                                            <p>Best Wishes,</p>
                                                            <p>The Tourbooking Team</p>
                                                          </div>
														<br />
														</div>
													</div>
												</div>
											</div> 
											
											<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
											
											<div style="float:left; margin:0px; width:70%;">
													  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
														<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
														<a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																								
														<li style="	float:left; list-style-type: none; margin:0px;">
														<a href="http://tourbookings.co/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
													  </ul>
													  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
													  <p style=" line-height: 0px;padding: 0;margin: 0;float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232;">100 Cecil Street, Collective Works, Singapore - 069532.</p>
											  </div>
											  
											  <div style="float:right; width:30%; text-align:right;">
												<h3 style="width:100%; float:left; color:#323232; font-family:Arial, Helvetica, sans-serif; font-size:20px; display:block; margin:20px 0px 10px 0px; padding:0px;">Follow Us</h3>
												<div style="width:100%; float:left; margin:0px;">
												<a href="https://twitter.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-1.jpg"></a>
													<a href="https://www.facebook.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-2.jpg"></a>
													<a href="http://www.youtube.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-3.jpg"></a>
													<a href="#"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-4.jpg"></a>
													<a href="https://plus.google.com" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-5.jpg"></a>
													<a href="https://www.pinterest.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-6.jpg"></a>
												</div>
											  </div>
											
										  </div>
											
											<div style="clear:both;"></div>
									</div>

									</body>
									</html>
					
									';
					/*$message1 = '<!doctype html>
								<html>
								<head>
								<meta charset="utf-8">
								<title>Tour bookings</title>
								<style>
								body { margin:0px; padding:0px;}
								</style>
								</head>

								<body>
								 <div style="width:500px; min-height:450px; margin:0 auto; background:#e2e2e2;">
									
									 <div style="width:440px; min-height:390px; margin:30px; float:left; background:white;">
										 <div style="width:440px; height:80px; border-bottom:#e1e1e1 solid 1px; background:#f5f5f5;">
											 <a href="#" style="margin:18px 20px 0px 19px;">
												<img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
											 <p style="margin: 15px;margin-top: 2px;font-family:Arial, Helvetica, sans-serif;color:#fd8900 !important;"><b>Bringing out the traveler in you!</b></p>
											</div>
								   
											
											<div style="width:440px; float:left;">
											 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;">
												<span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$user_name.'
											</h1>
												
												<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">
													Thank you for booking with Tourbookings! Your booking is confirmed!
												</p>
												<br />
													<table width="442" height="244" border="1">
													  <tr>
														<td>Destination:'.$country.'</td>
														<td colspan="2">Travel Date: '.$start_date.'</td>
													  </tr>
													  <tr>
														<td>'.$trip_title.'</td>
														<td>Adult:'.$N.'</td>
														<td>Child'.$N1.'</td>
													  </tr>
													  <tr>
														<td>&nbsp;</td>
														<td colspan="2">Total: $'.$total.'</td>
													  </tr>
													</table>
													<br />
													<p>The Tourbookings Team</p>
												<p>Follow us on <a href="https://www.facebook.com/">Facebook</a> or <a href="http://instagram.com/">instagram</a> </p>
												<br />
												<p>If you have any problems,please feel free to contact us at support@tourbookings.co
												</p>
												
										   </div>


										</div>
										<div style="clear:both;"></div> 
								   </div>
								</body>
								</html>';*/
							
								$headers1  = 'MIME-Version: 1.0' . "\r\n";
								$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

								// Additional headers
								// $headers .= 'To: Ammar <ammar@fortsolution.com>' . "\r\n";
								// $headers .= 'From: MoreThanFriends <ammar@fortsolution.com>' . "\r\n";
								$headers1 .= 'To: '.$email.'' . "\r\n";
								$headers1 .= 'From: support@tourbookings.co' . "\r\n";

								$mail_sent1 = mail( $to1, $subject1, $message1, $headers1 );
									
									
					
			
			
							$to2 = 'support@tourbookings.co';
							$subject2 = "email confirmation of booking"; 
							// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
							$message2 = '
							<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>TourBookings Email</title>
									<style type="text/css">
									body {
										margin: 0px;
										padding:0px;
									}
									</style>
									</head>

									<body>

										<div style=" width:100%; height:100%; padding:30px 0px 0px 0px; background:#ececec; float:left;">
											<div style="float:left; width:100%; margin:0px 0px 0px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c; -moz-box-shadow:0px 2px 5px #7d7c7c; -ms-box-shadow:0px 2px 5px #7d7c7c; -o-box-shadow:0px 2px 5px #7d7c7c; -webkit-box-shadow:0px 2px 5px #7d7c7c;">
												<div style=" float:left; width:100%; height:182px; border-bottom:#fd8900 solid 5px; background:url(http://tourbookings.co/images/header_bg.jpg) repeat-x  center top;">
													<div style=" width:100%; float:right;">
														<ul style=" width:155px; float:right; margin:20px 30px 15px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Visit Our Site</a></li>
														<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
													  </ul>
													</div>
													<div style="width:539px; height:64px; float:left; margin-left:30px;">
														<img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
													</div>
												</div>
												<div style="width:90%; float:left; padding:0px 30px;">
													<div style="width:100%; float:left;">
														<div style="width:100%; float:left; border-bottom: 1px solid #cecece;">
															
															<h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Dear '.$first_name.' '.$last_name.',</h1>
															
															<h2 style="width:100%; float:left; margin:0px 0px 25px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#1c1c1c; font-weight:normal; display:block;">
																	A new booking has been confirmed. All the information that you will require can 

											be found below. Kindly retain a copy of this email for future reference.  </h2>
														
															
														</div>
														<div style="width:100%; float:left;">
															
						<div style="width:100%;border: 1px solid #000;">								
															
                          <div style="width:100%;height:70px;background-color:#fd8900;border: 1px solid #000;">
 
    <h1 style="width:100%; float:left; margin:0px;text-align:center; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; font-weight:bold; display:block;">Tour Confirmation Voucher</h1>
                          </div>
                          <div>
                           <br>
                           <div style="padding-left: 10px;width:20%;float:left;">Reservation information:</div><div style="width:50%;float:left;"></div>
                            <div style="clear:both;"></div>
                            <br>
                            <div style="padding-left: 10px;width:20%;float:left;">Travel Name:</div><div style="width:25%;float:left;">'.$first_name.'</div><div style="width:5%;float:left;">Adult:</div><div style="width:20%;float:left;">'.$N.'</div><div style="width:5%;float:left;">Child:</div><div style="width:20%;float:left;">'.$N1.'</div><div style="clear:both;"></div>
                             <div style="padding-left: 10px;width:20%;float:left;">Sheduled Date:</div><div style="width:25%;float:left;">'.$start_date.'</div><div style="width:5%;float:left;">Total:</div><div style="width:20%;float:left;">'.$total.'</div>
                            <div style="clear:both;"></div>
                            <div style="padding-left: 10px;width:10%;float:left;">Destination:</div><div style="width:80%;float:left;">'.$country.'</div>
                            <div style="clear:both;"></div>
                           
													
													
													
													</div>
                                                          </div>
                                                          <br>
                                                          
                                                           <div style="width:100%;border: 1px solid #000;">								
							                          <div>
                                                     <br>
                                                        <div style="padding-left: 10px;width:20%;float:left;">Tour / Hotel information:</div><div style="width:50%;float:left;"></div>
                            <div style="clear:both;"></div>
                            <br>
                           
                            
                           
                            <div style="padding-left: 10px;width:10%;float:left;">Company:</div><div style="width:80%;float:left;"> '.$company_name.'</div>
                            <div style="clear:both;"></div>
						 <div style="padding-left: 10px;width:10%;float:left;">Address:</div><div style="width:80%;float:left;">'.$street_address.'</div>
                            <div style="clear:both;"></div>
                                                         <div style="padding-left: 10px;width:10%;float:left;">Phone:</div><div style="width:80%;float:left;">'.$phone.'</div>
                            <div style="clear:both;"></div>
                           
				
													
													
													</div>
                                                          </div>
                                                          <br>
														                                                   
                                                          <div><p>Please present this voucher to your tour company or hotel to redeem your booking.</p>
                                                           
                                                            <p>Best Wishes,</p>
                                                            <p>The Tourbooking Team</p>
                                                          </div>
														<br />
														</div>
													</div>
												</div>
											</div> 
											
											<div style="width:90%; float:left; padding:0px 30px 25px 30px;">
											
											<div style="float:left; margin:0px; width:70%;">
													  <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																								
														<li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
														<li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
														<a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>
																								
														<li style="	float:left; list-style-type: none; margin:0px;">
														<a href="http://tourbookings.co/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
													  </ul>
													  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
													  <p style=" line-height: 0px;padding: 0;margin: 0;float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232;">100 Cecil Street, Collective Works, Singapore - 069532.</p>
											  </div>
											  
											  <div style="float:right; width:30%; text-align:right;">
												<h3 style="width:100%; float:left; color:#323232; font-family:Arial, Helvetica, sans-serif; font-size:20px; display:block; margin:20px 0px 10px 0px; padding:0px;">Follow Us</h3>
												<div style="width:100%; float:left; margin:0px;">
												<a href="https://twitter.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-1.jpg"></a>
													<a href="https://www.facebook.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-2.jpg"></a>
													<a href="http://www.youtube.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-3.jpg"></a>
													<a href="#"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-4.jpg"></a>
													<a href="https://plus.google.com" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-5.jpg"></a>
													<a href="https://www.pinterest.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-6.jpg"></a>
												</div>
											  </div>
											
										  </div>
											
											<div style="clear:both;"></div>
									</div>

									</body>
									</html>
							';
							
							/*$message2 = '
											Dear Admin,
											<br />
											A new booking has been confirmed. All the information that you will require can 

											be found below. Kindly retain a copy of this email for future reference.
											<br />
											<table width="621" height="244" border="1">
											  <tr>
												<td>Destination:'.$country.'</td>
												<td colspan="2">Travel Date: '.$start_date.'</td>
											  </tr>
											  <tr>
												<td>'.$trip_title.'</td>
												<td>Adult:'.$N.'</td>
												<td>Child'.$N1.'</td>
											  </tr>
											  <tr>
												<td>&nbsp;</td>
												<td colspan="2">Total: $'.$total.'</td>
											  </tr>
											</table>
											Best Regards,
											<br />

											Tour Bookings ';*/
										
							$headers2  = 'MIME-Version: 1.0' . "\r\n";
							$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							// Additional headers
							
							$headers2 .= 'To: amol@fountaintechies.com' . "\r\n";
							$headers2 .= 'From: support@tourbookings.co' . "\r\n";
							$headers2 .= 'Cc: '.$supplier_email.'' . "\r\n";  

							$mail_sent2 = mail( $to2, $subject2, $message2, $headers2 );



							//echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
							session_start();
						
							
							$_SESSION['user_name2']=$user_name;
							$_SESSION['country']=$country;
							$_SESSION['start_date']=$start_date;
							$_SESSION['trip_title']=$trip_title;
							$_SESSION['N']=$N;
							$_SESSION['N1']=$N1;
							$_SESSION['total']=$total;

							$_SESSION['products']=NULL;
								


			
					echo '<'.'?'.'xml version="1.0" encoding="UTF-8"'.'?'.'>';	

?>

			If you would like to see your booking, please  <a href="../../../example_001.php" title="PDF [new window]" target="_blank"> click here </a>.</li>
			<li>	Your Confirmation Code is :
		<?php 
			echo $payment->getId(); 
}
	}
	else {
			// header( 'Location: ../../../index.php?error=ok' )
			// if(isset($_REQUEST['error']))
			// {
				//echo '<h1 style="color:red;margin-left: 550px;margin-top: 20px;">Please Try Again</h1>';
			// }
			//	echo '<h1 style="color:red;margin-left: 550px;margin-top: 20px;">Error:Please Try Again </h1>';
		}
		?>
				
				
				</div>
				<pre>
					<?php
						/*var_dump($payment->toArray());*/
					?>
				</pre>
				<a href="javascript: history.go(-1)">Back</a>
			</li>
		</ol>

                         
                            
				</div>
				<?php include('../../../footer.php'); ?>
    	</div>
        			
      <div style="clear:both"></div>
   </div>

</body>
</html>

