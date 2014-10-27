<?php
	require_once __DIR__.'/rest-api-sdk-php-master/vendor/autoload.php';
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\CreditCard;
	use PayPal\Api\FundingInstrument;
	use PayPal\Api\Transaction;
	use PayPal\Rest\ApiContext;
        use PayPal\Auth\OAuthTokenCredential;
       
	session_start();

	$name = $_POST['credit_card_name'];
	$expiry_date = $_POST['expiry_date'];

	$split_name = explode(" ",$name);
	$split_expiry_date = explode("/",$expiry_date);

	$month = $split_expiry_date[0];
	$year = $split_expiry_date[2];

	$fname = $split_name[0];
	$lname = $split_name[1];

	$card_type = $_POST['card_type'];
	$card_number = $_POST['card_number'];
	$total_price = $_POST['total_price'];

	//$clientID = '';
	//$secret = '';

	$sdkConfig = array('mode'=>'sandbox');

	$credentials = new PayPal\Auth\OAuthTokenCredential("AVaSGhDenSYI88HlIRlZxCpDnthotIX53x4xk1avgAI1wTK-zdcCBOto7Xvn", "EHSa3BBMTJ4wqL2apuPEUQ9ljEvLN51SNxjNEF5u9onWn21-vwjFLZaOpHkP",$sdkConfig);

	$api = new ApiContext($credentials, 'Request' . time());
	$api->setConfig($sdkConfig);

	$card = new CreditCard();
	$card->setFirst_name($fname);
	$card->setLast_name($lname);
	$card->setType("visa");
	$card->setNumber($card_number);
	$card->setExpire_month($month);
	$card->setExpire_year($year);

	$funding_instrument = new FundingInstrument();
	$funding_instrument->setCredit_card($card);

	$payer = new Payer();
	$payer->setPayment_method("credit_card");
	$payer->setFunding_instruments(array($funding_instrument));

	$amount = new Amount();
	$amount->setCurrency("SGD");
	$amount->setTotal($total_price);

	$transaction = new Transaction();
	$transaction->setAmount($amount);
	$transaction->setDescription("Buy a tour in tourbookings");

	$payment = new Payment();
	$payment->setIntent("sale");
	$payment->setPayer($payer);
	$payment->setTransactions(array($transaction));

	$response = $payment->create($api);
	if($response){
		echo 'Success';
	}

?>