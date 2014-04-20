<?php
session_start();
$temp = false;
if(isset($_SESSION['user_id'])){
 $user_id = $_SESSION['user_id'];
}
else {
// header("Location: user_login.php");
$temp = true;

}
 include('include/database/db.php');

	 // $user_id = mysql_real_escape_string($_POST['user_id']);
	$trip_title = mysql_real_escape_string($_POST['name']);
	$tour_id = mysql_real_escape_string($_POST['tour_id']);
	$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
	$start_date = mysql_real_escape_string($_POST['date']);
	$adult_name = mysql_real_escape_string($_POST['adult_name']);
	$child_name = mysql_real_escape_string($_POST['child_name']);
	$country = mysql_real_escape_string($_POST['country']);

 	$price = mysql_real_escape_string($_POST['price']);
 	$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
 	// $name = mysql_real_escape_string($_POST['name']);
 	// $date = mysql_real_escape_string($_POST['date']);
 	$ad = mysql_real_escape_string($_POST['ad']);
 	$ch = mysql_real_escape_string($_POST['ch']);
 	$total = mysql_real_escape_string($_POST['total']);
 	$qty = mysql_real_escape_string($_POST['qty']);
	// echo $tour_id;

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT language="Javascript">
       
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    </SCRIPT>
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
    	  <div class="right_penal" style="margin:0 auto;">
    	    <form method="post" action="rest-api-sdk-php-master/sample/payments/CreatePayment.php">
						  <input type="hidden" class="price_session" name="name" value="<?php echo $trip_title; ?>">
							<input type="hidden" class="price_session" name="supplier_id" value="<?php echo $supplier_id; ?>">
							<input type="hidden" class="price_session" name="tour_id" value="<?php echo $tour_id; ?>">
							<input type="hidden" class="price_session" name="date" value="<?php echo $start_date; ?>">
							<input type="hidden" class="price_session" name="price" value="<?php echo $price; ?>">
							<input type="hidden" class="price_session" name="deparchture_time" value="<?php echo $deparchture_time; ?>">
							<input type="hidden" class="price_session" name="total" value="<?php echo $total; ?>">
							<input type="hidden" class="price_session" name="country" value="<?php echo $country; ?>">
							<input type="hidden" class="price_session" name="qty" value="<?php echo $qty; ?>">
                          <div class="register_head fl">
                            	<h2>Payment </h2><br>
								<p>All Fields are Required.</p>
                          </div>


							<div class="administrator_details fl">

                                <h4>Traveler Details</h4>
                              <div class="register_form fl">
                                <?php
								$c=0;
								$cc=0;
							for($i=0; $i<$ad ;$i++)
							{

								echo '<label> Adult Name:</label>
                                <input name="txt[]" type="text" required>';
								$c++;

							}
							if($ch=="") {
							}

							else 
							{
								for($i=0; $i<$ch ;$i++)
										echo '<label>* Child Name:</label> 
									<input name="txt1[]" type="text" required><span style="float: right;margin-right: -35px;margin-top: 9px;">(ages 4-12)</span>';
								$cc++;

							}
							


							?>
                            </div>
                            </div>

							<div class="administrator_details fl">

									<h4>Contact Details</h4>
								  <div class="register_form fl">
								   <label> Email:</label>
							  <input name="email" value="<?php echo  $user_id; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" required>
							  <label> Contact Number:</label>
							  <input name="phone" type="text" required>
								</div>
							</div>

							  <?php
									  if($temp == true)
										{

											// echo'<div class="administrator_details fl">

													// <h4>Sign Up Details</h4>
												  // <div class="register_form fl">
												   // <label>* Email:</label>
											  // <input name="email" type="text">
											  // <label>* Password:</label>
											  // <input name="password" type="password">
												// </div>
												// </div>';


										}
										///rest-api-sdk-php-master/sample
								  ?>

			    <div class="administrator_details mrgn fl">
				<h4>Credit Card Details</h4>
                            	<div class="register_form fl" style="text-indent:200px; margin-bottom:15px;">
                                	<a href="#" style="margin-right:5px;"><img src="images/mastercard.png" width="51" height="32"></a>
                                    <a href="#" style="margin-right:5px;"><img src="images/visa.png" width="51" height="32"></a>
                                    <a href="#" style="margin-right:5px;"><img src="images/discover.png" width="51" height="32"></a>
                                    <a href="#" style="margin-right:5px;"><img src="images/american-express.png" width="51" height="32"></a>
                                </div>
                              <div class="register_form fl">
                                <!--<label>Pay With:</label>
                                  <div class="fl" style="width:300px; line-height:30px;">
                                  <input name="credit_card" type="radio" value="Credit Card" checked>Credit Card
                                  <input name="credit_card" type="radio" value="Online Check">Online Check
                                  </div>-->
								  <label> Card Type:</label>
				<select name="type" style="width:141px;" required>
								<option value="">Select Card</option>
                                  <option value="visa">Visa</option>

									<option value="mastercard">MasterCard</option>

									<option value="amex">Amex</option>

									<option value="discover">Discover</option>

									

                                </select>
				 <div style="clear:both"></div>
                                   <!--<input name="type"  type="text" required>-->

                                <label>First Name:</label>
                                  <input name="first_name"  type="text" required>

                                <label> Last Name:</label>
                                  <input name="last_name"  type="text" required>

                                
								  <label> Credit Card Number:</label>
                                  <input name="credit_card_no"  type="text" required>
                                <label> Expiration Date:</label>
                                <select name="month" style="width:140px;" required>
                                   <option value="">Select month</option>

										<option value="1">1</option>

										<option value="2">2</option>

										<option value="3">3</option>

										<option value="4">4</option>

										<option value="5">5</option>

										<option value="6">6</option>

										<option value="7">7</option>

										<option value="8">8</option>

										<option value="9">9</option>

										<option value="10">10</option>

										<option value="11">11</option>

										<option value="12">12</option>
                                </select>
                                <label style="width:30px; text-align:center; margin:0px;">To</label>
                                <select name="year" style="width:141px;" required>
								<option value="">Select year</option>
                                  <option value="2014">2014</option>

									<option value="2015">2015</option>

									<option value="2016">2016</option>

									<option value="2017">2017</option>

									<option value="2018">2018</option>

									<option value="2019">2019</option>

									<option value="2020">2020</option>

									<option value="2021">2021</option>

									<option value="2022">2022</option>

									<option value="2023">2023</option>

									<option value="2024">2024</option>

									<option value="2025">2025</option>

                                </select>
                                <label> Security Code:</label>
                                  <input name="security_code" type="text" maxlength="3" onkeypress="return isNumberKey(event)" style="width:129px; margin-right:150px;" required>
                              </div>
                            </div>
							
								<div class="administrator_details fl">

								   <label> I want to receive emails from Tourbookings about marketing, deals, promotions and news.</label>
							  <input name="checkbox"  type="checkbox" checked>
							 
							</div>

                            <div class="administrator_details fl">


                              <div class="register_form fl">
                                <input name="Submit" value="Submit" type="submit">
                              </div>
                            </div>
                            </form>

               	  </div>
                    	<?php include('footer.php'); ?>
    	</div>

      <div style="clear:both"></div>
   </div>

</body>
</html>
