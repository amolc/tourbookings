<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PayPal REST API Samples</title>
<style>
	.imagelink {
		padding: 5px 0px 5px 28px;	
	}
	.execute {
		background: url('images/play_button.png') no-repeat left top;			
	}	
	.source {
		background: url('images/edt-format-source-button.png') no-repeat left top;		
	}
	.header {
		font-weight: bold;
	}
	.header td {
		padding: 10px 0px 10px 0px;
	}
</style>
</head>
<body>
    <center>
        <h3>PayPal REST API Samples</h3>
    </center>
	<table cellspacing="5" width="85%">
		<tbody>
			<tr valign="top" class='header'>
				<td>Payments</td>
			</tr>
			<tr valign="top">
				<td>Direct credit card payments</td>
				<td width="30%" ><a href="payments/test_create_payment.php" class="execute imagelink">Execute</a></td>
				<td width="30%"><a href="source/CreatePayment.html" class="source imagelink">Source</a></td>
			</tr>
			<tr>
				<td>PayPal account payments</td>
				<td><a href="payments/CreatePaymentUsingPayPal.php" class="execute imagelink">Execute</a></td>
				<td><a href="source/CreatePaymentUsingPayPal.html" class="source imagelink">Source</a></td>
			</tr>
			<tr>
				<td>Stored credit card payments</td>
				<td><a href="payments/CreatePaymentUsingSavedCard.php" class="execute imagelink">Execute</a></td>
				<td><a href="source/CreatePaymentUsingSavedCard.html" class="source imagelink">Source</a></td>
			<tr>
				<td>Get payment details</td>
				<td><a href="payments/GetPayment.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/GetPayment.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Get payment history</td>
				<td><a href="payments/ListPayments.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/ListPayments.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Get sale details</td>
				<td><a href="sale/GetSale.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/GetSale.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Refund a payment</td>
				<td><a href="sale/RefundSale.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/RefundSale.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr valign="top" class='header'>
				<td>Vault</td>
			</tr>
			<tr>
				<td>Save a credit card</td>
				<td><a href="vault/CreateCreditCard.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/CreateCreditCard.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Retrieve saved credit card</td>
				<td><a href="vault/GetCreditCard.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/GetCreditCard.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Delete saved credit card</td>
				<td><a href="vault/DeleteCreditCard.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/DeleteCreditCard.html" class="source imagelink" >Source</a></td>
			</tr>			
			<tr valign="top" class='header'>
				<td>Authorization and capture</td>
			</tr>
			<tr>
				<td>Get details of an authorized payment</td>
				<td><a href="payments/GetAuthorization.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/GetAuthorization.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Capture an authorized payment</td>
				<td><a href="payments/AuthorizationCapture.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/AuthorizationCapture.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Void an authorized payment</td>
				<td><a href="payments/VoidAuthorization.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/VoidAuthorization.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Reauthorize a payment</td>
				<td><a href="payments/Reauthorization.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/Reauthorization.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Get details of a captured payment</td>
				<td><a href="payments/GetCapture.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/GetCapture.html" class="source imagelink" >Source</a></td>
			</tr>
			<tr>
				<td>Refund captured payment</td>
				<td><a href="payments/RefundCapture.php" class="execute imagelink" >Execute</a></td>
				<td><a href="source/RefundCapture.html" class="source imagelink" >Source</a></td>
			</tr>
		</tbody>
	</table>
</body>
</html>
