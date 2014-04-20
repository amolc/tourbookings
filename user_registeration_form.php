<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//alert('razamalik');

	// $('#registeration_button').click(function(){


		// var first_name = $('#first_name').val();
		// var last_name = $('#last_name').val();
		// var phone = $('#phone').val();
		// var email =	$('#email').val();
		// var gender =	$('#gender').val();
		// var age =	$('#age').val();
		// var country =	$('#country').val();
		// var city =	$('#city').val();
		// var address =	$('#address').val();
		// var password =	$('#password').val();

		// if(first_name == "" || last_name == "" || phone == ""|| email == ""|| password == ""|| address == ""|| gender == ""|| age == ""|| city == "" || country == "") {
				// alert('All fields are required');
		// }
		// else {
			   // $.ajax({
					// type:  'post',
					// url:  'ajax_request_function/ajax_user_registeration.php',
					// data: {first_name:first_name,last_name:last_name,phone:phone,email:email,password:password,
							// address:address,city:city,country:country,gender:gender,age:age
						  // },
					// success: function(mesg) {
					

					   // if(mesg == 'registration successful'){
						 // $('.success_mesg').empty().append('registration successful!');
						// $('#name').val("");
						// $('#phone').val("");
						// $('#email').val("");
						// $('#password').val("");
						// $('#address').val("");
						// $('#city').val("");
						// $('#age').val("");
						// $( "#country option:selected" ).empty();
						// $( "#gender option:selected" ).empty();

						// }
					// }
				// });
			// }

	// });

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

        	<div style="display:none;" class="banner fl"><img src="images/corporate_group.jpg" alt="" width="1002" height="240"></div>

            	<div class="center_body fl">
                	<div style="background:none;width: 170px;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                        	<!--<h1>Insider's Guide to Singapore</h1>
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

                            <div style="display:none;" class="chat_now fl"><img src="images/chat_now.jpg" alt="" width="296" height="186"></div>

                    </div>

                    	<div class="right_penal fl">
						<form method="post" action="insert_user_registration.php">
							<div class="register_head fl">
                            	<h2>Register to create an account</h2><br>
                                <p>Note - All fields are required</p>
                            </div>

                            <div class="administrator_details fl">

                                <h4>User details</h4>

                                <div class="register_form fl">
                                  <label> First name:</label>
                                  <input name="first_name" id="first_name" type="text" placeholder="First Name" required>
                                  <label> Last name:</label>
                                  <input name="last_name" id="last_name" type="text" placeholder="Last Name" required>
                                <label>  Email:</label>
                                  <input name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  type="text" placeholder="Email" required>
                                
                                <label> Password:</label>
                                <input name="password" id="password" type="password" placeholder="Password" required>
                                <label> Confirm Password:</label>
                                  <input name="password" type="password" placeholder="Confirm Password" required>
                              </div>
                            </div>

                            <!--<div style="display:none;" class="administrator_details fl">-->
                            <div class="administrator_details fl">

                                <h4>Personal details</h4>

                              <div class="register_form fl" required>
                                <label> Gender:</label>
                                <select name="gender" id="gender">
									<option value="Male">Male</option>
							
									<option value="Female">Female</option>
                                </select>

                                <label> Age:</label>
								<input name="age" id="age" type="text" placeholder="Age" required>

                                  <label> Country:</label>
                                  <select name="country" id="country"  required>
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
                                <label> City:</label>
                                  <input name="city" id="city" type="text" placeholder="city" required>
								
                                <label> Contact Number:</label>
                                  <input name="phone" id="phone" type="text" placeholder="Contact Number" required>
                                <label> Address:</label>
                                  <input name="address" id="address" type="text" placeholder="Address" required>

                            </div>
                            </div>

                            <div class="administrator_details fl">


                              <div class="register_form fl">
                                <input name="submit" value="Sign Up" id="registeration_button" type="submit">
								<h2 style="padding-left: 360px;" class="success_mesg"></h2>
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
