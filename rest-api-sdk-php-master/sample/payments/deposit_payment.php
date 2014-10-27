<?php

	session_start();
	include('../../../include/database/db.php'); 
	if(isset($_SESSION['supplier_id']))
	{
		$supplier_id = $_SESSION['supplier_id'];
	}
	else 
	{
		header('Location: index.php');
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tourbooking.co" />
	<meta name="author" content="Laborator.co" />

	<title>Tourbooking.co</title>

	<link rel="stylesheet" href="../../../supplier/include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="../../../supplier/include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="../../../supplier/include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="../../../supplier/include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="../../../supplier/include/resource/css/custom.css"  id="style-resource-6">
	<script src="../../../supplier/include/resource/js/jquery-1.10.2.min.js"></script>

	<!--<link rel="stylesheet" href="include/resource/css/easyWizardSteps.css"  id="style-resource-6">-->
<style type="text/css">

	.submit {
	display:none!important;
	}

	div.upload {
	margin-top: -10px;
    width: 157px;
    height: 57px;
    background: url(https://lh6.googleusercontent.com/-dqTIJRTqEAQ/UJaofTQm3hI/AAAAAAAABHo/w7ruR1SOIsA/s157/upload.png);
    overflow: hidden;
}

div.upload input {
    display: block !important;
    width: 157px !important;
    height: 57px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/


});
</script>

</head>



<body class="page-body">

<div class="page-container">


<div class="sidebar-menu">

	<header class="logo-env">

		<!-- logo -->
		<div class="logo">
			<a href="dashboard.php">
				<h3 style="color:#fff;">Tourbooking.co</h3>
			</a>
		</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>


		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>

	</header>


	<ul id="main-menu" class="">
		<li id="search">
			<form method="get" action="#">
				<input type="text" name="q" class="search-input" placeholder="Search something..." />
				<button type="submit"><i class="entypo-search"></i></button>
			</form>
		</li>
		<li class="opened active">
			<a href="../../../supplier/dashboard.php"><i class="entypo-gauge"></i><span>Dashboard</span></a>
		</li> 
		<li>
			<a href=""><i class="entypo-layout"></i><span>Tour</span></a>
			<ul>
				<li>
					<a href="../../../supplier/supplier_create_tour.php"><span>Create Tour</span></a>
				</li>
				<li>
					<a href="../../../supplier/show_tour.php"><span>Show Tour</span></a>
				</li>
			</ul>
		</li>

		<li>
			<a href="../../../supplier/membership.php"><i class="entypo-layout"></i><span>Membership</span></a>


		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>B2C Booking</span></a>
			<ul>
			<!--	<li>
					<a href="today_booking.php"><span>Today's Booking</span></a>
				</li>	-->
				<li>
					<a href="../../../supplier/recent_booking.php"><span>Pending Booking</span></a>
				</li>
				<li>
					<a href="../../../supplier/confirm_booking.php"><span>Confirm Booking</span></a>
				</li>
				<li>
					<a href="../../../supplier/cancel_booking.php"><span>Cancel Booking</span></a>
				</li>
				<!--<li>
					<a href="booking_list.php"><span>Booking List</span></a>
				</li>	-->
			</ul>
		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>B2B Booking</span></a>
			<ul>	
				<!--<li>
					<a href="today_booking.php"><span>Today's Booking</span></a>
				</li>-->		
				<li>
					<a href="../../../supplier/supplier_pending_booking.php"><span>Pending Booking</span></a>
				</li>			
				<li>
					<a href="../../../supplier/supplier_confirm_booking.php"><span>Confirm Booking</span></a>
				</li>				
				<li>
					<a href="../../../supplier/supplier_cancel_booking.php"><span>Cancel Booking</span></a>
				</li>	
			</ul>
		</li>

		<li>
			<a href=""><i class="entypo-layout"></i><span>Account</span></a>
				<ul>
					<li>
						<a href="../../../supplier/my_balance.php"><span>My Transactions</span></a>
					</li>
					<li>
						<a href="../../../supplier/payment_due.php"><span>My Earnings</span></a>
					</li>
					<li>
						<a href="../../../supplier/payment_deposit.php"><span>Deposit</span></a>
					</li>
					<li>
						<a href="../../../supplier/cc_paypal_payment_deposit.php"><span>CreditCard/ Paypal Deposit</span></a>
					</li>
					<li>
						<a href="../../../supplier/withdraw.php"><span>Withdraw</span></a>
					</li>
					<li>
						<a href="../../../supplier/account_list.php"><span>Bank Account</span></a>
					</li>
					<li>
						<a href="../../../supplier/changepassword.php"><span>Account Details</span></a>
					</li>
					
				</ul>

		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>My Shop</span></a>
				<ul>
					<li>
						<a href="../../../supplier/myshop_tours.php"><span>Tours</span></a>
					</li>
					<li>
						<a href="../../../supplier/voucher.php"><span>Voucher</span></a>
					</li>
				</ul>

		</li>

	</ul>

</li>


		</ul>


</div>

	<div class="main-content">
<?php
 // session_start();
 //include('db.php');
// if(isset($_SESSION['supplier_id'])){
 // $supplier_id = $_SESSION['supplier_id'];
 
 // $res = mysql_query("select id from booking where supplier_id = '$supplier_id'") or die(mysql_error());
 // $notification = mysql_num_rows($res) or die (mysql_error());
 //echo "total ".$notification;
// }
 
?> 
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
			<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="../../../supplier/include/resource/images/thumb-1.png" alt="" class="img-circle" />
					<?php 
						if(isset($_SESSION['supplier_name'])){
								$supplier_name = $_SESSION['supplier_name'];
						}
						echo $supplier_name;
					?>
				</a>
				
				<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="../../../supplier/edit_profile.php">
							<i class="entypo-user"></i>
							Edit Profile
						</a>
					</li>
					
					<li>
						<a href="../../../supplier/changepassword.php">
							<i class="entypo-mail"></i>
							Change Password
						</a>
					</li>
					
					<!--<li>
						<a href="../../../neon-x/extra/calendar/index.html">
							<i class="entypo-calendar"></i>
							Calendar
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-clipboard"></i>
							Tasks
						</a>
					</li>-->
				</ul>
			</li>
		
		</ul>
		
		<ul class="user-info pull-left pull-right-xs pull-none-xsm">
			
			<!-- Raw Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-attention"></i>
					<span class="badge badge-info">6</span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
	<p class="small">
		<a href="#" class="pull-right">Mark all Read</a>
		You have <strong>3</strong> new notifications.
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-user-add pull-right"></i>
				
				<span class="line">
					<strong>New user registered</strong>
				</span>
				
				<span class="line small">
					30 seconds ago
				</span>
			</a>
		</li>
		
		<li class="unread notification-secondary">
			<a href="#">
				<i class="entypo-heart pull-right"></i>
				
				<span class="line">
					<strong>Someone special liked this</strong>
				</span>
				
				<span class="line small">
					2 minutes ago
				</span>
			</a>
		</li>
		
		<li class="notification-primary">
			<a href="#">
				<i class="entypo-user pull-right"></i>
				
				<span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>
				
				<span class="line small">
					3 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-danger">
			<a href="#">
				<i class="entypo-cancel-circled pull-right"></i>
				
				<span class="line">
					John cancelled the event
				</span>
				
				<span class="line small">
					9 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-info">
			<a href="#">
				<i class="entypo-info pull-right"></i>
				
				<span class="line">
					The server is status is stable
				</span>
				
				<span class="line small">
					yesterday at 10:30am
				</span>
			</a>
		</li>
		
		<li class="notification-warning">
			<a href="#">
				<i class="entypo-rss pull-right"></i>
				
				<span class="line">
					New comments waiting approval
				</span>
				
				<span class="line small">
					last week
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">View all notifications</a>
</li>				</ul>
				
			</li>
			
			<!-- Message Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-mail"></i>
					<span class="badge badge-secondary">6<?php //echo $notification; ?></span>
				</a>
				
				<ul class="dropdown-menu">
					<li>
	<ul class="dropdown-menu-list scroller">
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="../../../supplier/include/resource/images/thumb-1.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>
				
				<span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
			</a>
		</li>
		
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="include/resource/images/thumb-2.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>
				
				<span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="include/resource/images/thumb-3.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Hayden Cartwright
					- a week ago
				</span>
				
				<span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="include/resource/images/thumb-4.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>
				
				<span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="../../../neon-x/mailbox/main/index.html">All Messages</a>
</li>				</ul>
				
			</li>
			
			<!-- Task Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-list"></i>
					<span class="badge badge-warning">1</span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
	<p>You have 6 pending tasks</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Procurement</span>
					<span class="percent">27%</span>
				</span>
			
				<span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">App Development</span>
					<span class="percent">83%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">HTML Slicing</span>
					<span class="percent">91%</span>
				</span>
				
				<span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Database Repair</span>
					<span class="percent">12%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Backup Create Progress</span>
					<span class="percent">54%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Upgrade Progress</span>
					<span class="percent">17%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
					</span>
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">See all tasks</a>
</li>				</ul>
				
			</li>
		
		</ul>
	
	</div>
	
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
			<!--<li>
				<a href="#">Live Site</a>
			</li>
			
			<li class="sep"></li>
			
			<li>
				<a href="#" data-toggle="chat" data-animate="1" data-collapse-sidebar="1">
					<i class="entypo-chat"></i>
					Chat
					
					<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
				</a>
			</li>
			
			<li class="sep"></li>-->
			
			<li>
				<a href="index.php">
					Log Out <i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
		
	</div>
	
</div>

<hr />

			<ol class="breadcrumb bc-3">
				<li>
					<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Account</strong>
				</li>
				<li class="active">
					<strong>Payment Deposit</strong>
				</li>
			</ol>

			<h2>Payment Deposit</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Over View
				</div>

				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>


			<div class="panel-body">
			
			
				<?php 
			
// echo $amount_deposit ;
// echo $$description ;
// # CreatePaymentSample
//rest-api-sdk-php-master/sample/payments/deposit_payment.php
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


		$amount_deposit = $_POST['amount_deposit'];
		$description1 = $_POST['description'];
		$description = '"'.$description1.'"';
		$credit_card_no = $_POST['credit_card_no'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		// echo $description;
	$type = $_POST['type'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$credit_card_no = $_POST['credit_card_no'];
	// $exp_month = $_POST['exp_month'];
	// $exp_year = $_POST['exp_year'];
	$exp_date = $_POST['exp_date'];
	$exp_date = explode('/', $exp_date);
	$exp_month = $exp_date[0];
	$exp_year  = $exp_date[1];
	// echo $exp_month;
	// echo $exp_year;
	// exit();
	$security_code = $_POST['security_code'];
	// $exp_month = $_POST['month'];
	// $exp_year = $_POST['year'];
	// $exp_month = "11";
	 // $exp_year = "2019";
	$tile_name = $_POST['name'];
	$qty = $_POST['qty'];
	
// ### CreditCard
// A resource representing a credit card that can be
// used to fund a payment.
// $card = new CreditCard();
// $card->setType("visa")
	// ->setNumber("4417119669820331")
	// ->setExpireMonth("11")
	// ->setExpireYear("2019")
	// ->setCvv2("012")
	// ->setFirstName("Joe")
	// ->setLastName("Shopper");
	
	$card = new CreditCard();
$card->setType("visa")
	->setNumber($credit_card_no)
	->setExpireMonth($exp_month)
	->setExpireYear($exp_year)
	->setCvv2($security_code)
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
	->setTotal($amount_deposit);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.  ->setItemList($itemList)
$transaction = new Transaction();
$transaction->setAmount($amount)
	->setDescription($description);

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
try {
	$payment->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	// echo "Exception: " . $ex->getMessage() . PHP_EOL;
	// var_dump($ex->getData());
	// exit(1);
	echo "Oops ! Something went wrong. please  Back  to navigate to the page you have previously come";
}


		

	 // var_dump($payment->toArray());


					if($payment->getId()) 
					{
						$deposit_key = $payment->getId();
						$amount_deposit = mysql_real_escape_string($_POST['amount_deposit']);
						$description = mysql_real_escape_string($_POST['description']);
						$sql3 = mysql_query("SELECT
							available_balance
							FROM
							supplier_balance
							WHERE  supplier_id = '".$supplier_id."'
							");
							while ($row = mysql_fetch_array($sql3)) 
								{
									$supplier_balance = $row['available_balance'];
								
								}

								$total = $amount_deposit + $supplier_balance;
									$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
								$current_date = date("m/d/Y", $today_date);
								$deposit_type = "credit card";
								
							// echo $total;
							
						$sql2   = "insert into supplier_balance(supplier_id,available_balance,amount_deposit,type,currency,description,deposit_type,deposit_key,status,insert_date) values ('$supplier_id','$total','$amount_deposit','deposit','USA Doller','$description','$deposit_type','$deposit_key','pending','$current_date')";
							$query = mysql_query($sql2);
							
							if($query)
							{
								$supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
								$supplier_row = mysql_fetch_array($supplier_result); 					
								$supplier_email = $supplier_row ['email'];
								$supplier_fname = $supplier_row ['first_name'];
								$supplier_lname = $supplier_row ['last_name'];
								
			   
								$to = $supplier_email ;					
								$subject = "Deposit Pending";
								$message = '<!doctype html>
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
												 <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
												 <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
												</div>
									   
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">This is to inform you that we have received notice of the deposit you make and will credit the funds to your account shortly.
													<br />
													Do check out the My Shop feature in the mean time!
													</p>
												</div>
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

									<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
												</div>
											</div>
											<div style="clear:both;"></div>
									   </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$email.'' . "\r\n";
									$headers .= 'From: admin@tourbookings.co' . "\r\n";					
									mail( $to, $subject, $message, $headers );
					
								echo "Deposit Successful Your Deposit Key is ".$payment->getId();
							}
							else {
							$supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
							$supplier_row = mysql_fetch_array($supplier_result); 					
							$supplier_email = $supplier_row ['email'];
							$supplier_fname = $supplier_row ['first_name'];
							$supplier_lname = $supplier_row ['last_name'];
							
			   
								$to = $supplier_email ;					
								$subject = "Deposit Failed";
								$message = '<!doctype html>
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
												 <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
												 <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
												</div>
									   
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">We regret to inform you that your recent deposit has failed to reach us.
													<br />
													Kindly try again and contact us if this issue persists .

													</p>
												</div>
												
												<div style="width:440px; float:left;">
												 <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

									<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
												</div>
											</div>
											<div style="clear:both;"></div>
									   </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$email.'' . "\r\n";
									$headers .= 'From: admin@tourbookings.co' . "\r\n";					
									mail( $to, $subject, $message, $headers );
								// echo "error";
							}
										
					}
					else 
					{
						// echo"payment deposit error";
					}
			

				?>
			
			</div>

		</div>

	</div>
</div>

<?php include('../../../supplier/include/footer/footer.php'); ?>


</div>


<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

	<div class="chat-inner">


		<h2 class="chat-header">
			<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
		</h2>


		<div class="chat-group" id="group-1">
			<strong>Favorites</strong>

			<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
			<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
		</div>


		<div class="chat-group" id="group-2">
			<strong>Work</strong>

			<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
			<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
		</div>


		<div class="chat-group" id="group-3">
			<strong>Social</strong>

			<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
		</div>

	</div>

	<!-- conversation template -->



	<div class="chat-conversation">

		<div class="conversation-header">
			<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

			<span class="user-status"></span>
			<span class="display-name"></span>
			<small></small>
		</div>

		<ul class="conversation-body">
		</ul>

		<div class="chat-textarea">
			<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
		</div>

	</div>

</div>


<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Art Ramadani</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>

	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>

	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul></div>



<!--
	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>-->
	
		<link rel="stylesheet" href="../../../supplier/include/resource/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="../../../supplier/include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="../../../supplier/include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="../../../supplier/include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="../../../supplier/include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="../../../supplier/include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="../../../supplier/include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="../../../supplier/include/resource/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="../../../supplier/include/resource/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="../../../supplier/include/resource/js/ckeditor/ckeditor.js" id="script-resource-9"></script>
	<script src="../../../supplier/include/resource/js/ckeditor/adapters/jquery.js" id="script-resource-10"></script>
	<script src="../../../supplier/include/resource/js/neon-chat.js" id="script-resource-11"></script>
	<script src="../../../supplier/include/resource/js/neon-custom.js" id="script-resource-12"></script>
	<script src="../../../supplier/include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="../../../supplier/include/resource/js/neon-demo.js" id="script-resource-13"></script>
	
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>
															
					<!--			<script>
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			CKEDITOR.replace( 'editor1', {
				on: {
					focus: onFocus,
					blur: onBlur,

					// Check for availability of corresponding plugins.
					pluginsLoaded: function( evt ) {
						var doc = CKEDITOR.document, ed = evt.editor;
						if ( !ed.getCommand( 'bold' ) )
							doc.getById( 'exec-bold' ).hide();
						if ( !ed.getCommand( 'link' ) )
							doc.getById( 'exec-link' ).hide();
					}
				}
			});
		</script>-->
</body>
</html>