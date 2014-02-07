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
	// echo $tour_id;

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
    	<div class="center_body fl">
           	<div style="background:#fd8900;" class="left_penal fl">
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

                            <div style="display:none;"  class="singapore_things fl">
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

                            <div style="display:none;"  class="singapore_things fl">
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

                            <div  style="display:none;" class="chat_now fl"><a href="#"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>

                    </div>

                    	<div class="right_penal fl">
                        	<form method="post" action="ajax_payment_add.php">
							<input type="hidden" class="price_session" name="name" value="<?php echo $trip_title; ?>">
<input type="hidden" class="price_session" name="supplier_id" value="<?php echo $supplier_id; ?>">
<input type="hidden" class="price_session" name="tour_id" value="<?php echo $tour_id; ?>">
<input type="hidden" class="price_session" name="date" value="<?php echo $start_date; ?>">
<input type="hidden" class="price_session" name="price" value="<?php echo $price; ?>">
<input type="hidden" class="price_session" name="deparchture_time" value="<?php echo $deparchture_time; ?>">
<input type="hidden" class="price_session" name="total" value="<?php echo $total; ?>">
<input type="hidden" class="price_session" name="country" value="<?php echo $country; ?>">
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

								echo '<label> Full Name:</label>
                                <input name="txt[]" type="text" required>';
								$c++;


							}
							if($ch=="") {
							}

							else {
							{
							for($i=0; $i<$ch ;$i++)
								    echo '<label>* Child Name:</label>
                                <input name="txt1[]" type="text" required>';
							$cc++;

							}
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
                                <label> Name:</label>
                                  <input name="user_name"  type="text" required>

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
                                  <input name="security_code" type="text" style="width:129px; margin-right:150px;" required>
                              </div>
                            </div>

                           <!-- <div class="administrator_details fl">

                                <h4>Sign UP</h4>

                              <div class="register_form fl">
                                  <label>* Location:</label>
                                  <select name="country">
                                    <option value="">Select Country</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brazil</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central Africa</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote D'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Island</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Monserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="KN">Nevis- St Kitts</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="YU">Serbia and Montenegro</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="KR">South Korea</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="PM">St Pierre Miquelon</option>
                                    <option value="VC">St Vincent and Grenadines</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">US Minor Outlying Islands</option>
                                    <option value="US">USA</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands-British</option>
                                    <option value="VI">Virgin Islands-US</option>
                                    <option value="WF">Wallis and Futuna Islands</option>
                                    <option value="WS">Western Samoa</option>
                                    <option value="YE">Yemen Republic</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                  </select>
                                  <label>Company:</label>
                                  <input name="company" type="text">

                                <label>* Street address:</label>
                                  <input name="street_address" type="text">
                                <label>* City:</label>
                                  <input name="city" type="text">
                                <label>* State/Province:</label>
                                  <input name="state" type="text">
                                  <label>* Postcode/ZIP:</label>
                                  <input name="postcode" type="text">
                                  <label>* Phone:</label>
                                  <input name="phone" type="text">-->

                              <!--</div>
                            </div>-->
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
