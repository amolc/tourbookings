<?php
session_start()

?>

<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/**
	*raza malik <razamalik@outlook.com>
	*/

	$( "#confirm_password" ).blur(function() {
			var password =	$('#password').val();
			var confirm_password =	$('#confirm_password').val();
			if(password != confirm_password) {
				$('.password_match').empty().append("Password Don't Match");
				$('#registeration_button').prop("disabled", true);
			}
			if(password == confirm_password) {
				$('.password_match').empty();
				$('#registeration_button').prop("disabled", false);
			}
			
	});
		
	
	$("#email").blur(function(){

		 var email = $('#email').val();
		 $.ajax({
					type:  'post', 
					url:  'ajax_request_function/ajax_check_email.php',
					data: { email:email }, 
					success: function(mesg) {
					if(mesg!="") {
						$("#email").focus();
						$('#registeration_button').prop("disabled", true);
						 $('.email_exit').append(mesg);
					  } else  {
					 
						$('#registeration_button').prop("disabled", false);
						
					  }
					  
					}                    
				});
				$('.email_exit').empty('');
		
	});
});
</script>
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
				<?php include('../navigation.php'); ?>
            </div>
            <div class="header_logo fl">
            	<?php //include('../header_logo.php'); ?>
				            	<div class="logo fl"><a href="index.php"><img src="../images/tourbooking_logo.png" alt="" width="256" height="105"></a></div>
              <!--<div class="tour_bookings fr">What's so great about
					<span>Tour Bookings</span>
                </div>-->
				<form action="search_filter.php" method="post" >
                	<div class="header_form fr">
						<!--<select name="keyword2" id="country" required>
							<option value="">Select a country</option>
							<option value="Antarctica">Antarctica</option>
							<option value="Antigua and Barbuda">Antigua and Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Barbados">Barbados</option>
							<option value="Belgium">Belgium</option>
							<option value="Belize">Belize</option>
							<option value="Bermuda">Bermuda</option>
							<option value="Brazil">Brazil</option>
							<option value="British Virgin Islands">British Virgin Islands</option>
							<option value="Cambodia">Cambodia</option>
							<option value="Canada">Canada</option>
							<option value="Cayman Islands">Cayman Islands</option>
							<option value="Chile">Chile</option>
							<option value="China">China</option>
							<option value="Colombia">Colombia</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Croatia">Croatia</option>
							<option value="Curacao">Curacao</option>
							<option value="Cyprus">Cyprus</option>
							<option value="Czech Republic">Czech Republic</option>
							<option value="Denmark">Denmark</option>
							<option value="Dominica">Dominica</option>
							<option value="Dominican Republic">Dominican Republic</option>
							<option value="Ecuador">Ecuador</option>
							<option value="Egypt">Egypt</option>
							<option value="England">England</option>
							<option value="Estonia">Estonia</option>
							<option value="Fiji">Fiji</option>
							<option value="Finland">Finland</option>
							<option value="France">France</option>
							<option value="French Polynesia">French Polynesia</option>
							<option value="Germany">Germany</option>
							<option value="Greece">Greece</option>
							<option value="Grenada">Grenada</option>
							<option value="Guatemala">Guatemala</option>
							<option value="Honduras">Honduras</option>
							<option value="Hong Kong">Hong Kong</option>
							<option value="Hungary">Hungary</option>
							<option value="Iceland">Iceland</option>
							<option value="India">India</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Ireland">Ireland</option>
							<option value="Israel">Israel</option>
							<option value="Italy">Italy</option>
							<option value="Jamaica">Jamaica</option>
							<option value="Japan">Japan</option>
							<option value="Jordan">Jordan</option>
							<option value="Kenya">Kenya</option>
							<option value="Lebanon">Lebanon</option>
							<option value="Lithuania">Lithuania</option>
							<option value="Malaysia">Malaysia</option>
							<option value="Malta">Malta</option>
							<option value="Mexico">Mexico</option>
							<option value="Monaco">Monaco</option>
							<option value="Morocco">Morocco</option>
							<option value="Myanmar">Myanmar</option>
							<option value="Nepal">Nepal</option>
							<option value="Netherlands">Netherlands</option>
							<option value="New Zealand">New Zealand</option>
							<option value="Nicaragua">Nicaragua</option>
							<option value="Norway">Norway</option>
							<option value="Oman">Oman</option>
							<option value="Panama">Panama</option>
							<option value="Peru">Peru</option>
							<option value="Philippines">Philippines</option>
							<option value="Poland">Poland</option>
							<option value="Portugal">Portugal</option>
							<option value="Puerto Rico">Puerto Rico</option>
							<option value="Russia">Russia</option>
							<option value="Scotland">Scotland</option>
							<option value="Singapore">Singapore</option>
							<option value="Slovenia">Slovenia</option>
							<option value="South Africa">South Africa</option>
							<option value="South Korea">South Korea</option>
							<option value="Spain">Spain</option>
							<option value="St Kitts and Nevis">St Kitts and Nevis</option>
							<option value="St Lucia">St Lucia</option>
							<option value="St Maarten">St Maarten</option>
							<option value="Sweden">Sweden</option>
							<option value="Switzerland">Switzerland</option>
							<option value="Taiwan">Taiwan</option>
							<option value="Thailand">Thailand</option>
							<option value="Trinidad and Tobago">Trinidad and Tobago</option>
							<option value="Turkey">Turkey</option>
							<option value="Turks and Caicos">Turks and Caicos</option>
							<option value="United Arab Emirates">United Arab Emirates</option>
							<option value="Uruguay">Uruguay</option>
							<option value="USA">USA</option>
							<option value="US Virgin Islands">US Virgin Islands</option>
							<option value="Vietnam">Vietnam</option>
							<option value="Wales">Wales</option>
							<option value="Zambia">Zambia</option>
							<option value="Zimbabwe">Zimbabwe</option>

						  </select>-->

                	   <!--<select name="" id="city">
                	    <option>Select One</option>
                	    <option>Anaheim & Buena Park</option>
                	  </select>-->
					 <!-- <input type="text" name="Keyword1" id="city" style="margin-left: 2px;" placeholder="City Name" class="" required>
						
					  <input type="hidden" name="check" value="filter">
					  <input type="submit" name="filter" id="button1" class="go" value="GO">-->
					  </form>
					  <form action="search.php" method="post" >
						
						  <input type="text" value="Keyword Search" name="Keyword" onBlur="if(this.value=='') this.value='Keyword Search'" onFocus="this.value=''">
						  <input type="submit" name="button" id="search" value="GO">
						</form>
                	</div>

            </div>
    	</div>
        
        	<div style="display:none;" class="banner fl"><img src="../images/partner_signup.jpg" alt="" width="1002" height="240"></div>
            
            	<div class="center_body fl">
                	<div style="background:none;width: 200px;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                        	
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
                            
                            <div class="chat_now fl" style="display:none;"><img src="../images/chat_now.jpg" alt="" width="296" height="186"></div>
                        
                    </div> 
                    
                    	<div class="right_penal fl">
                        	<form action="email_send_supplier.php"  method="post">
                          <div class="register_head fl">
                            	<h2>Register to become a Travel Partner</h2><br>
                                <p>Simply fill out the form to join our Travel Partner Program. All fields marked with * are required.</p>
                               <p style="padding-top: 5px;">Note: Your email address will be your username for logging in to your account </p>
                            </div>
                            
                            <div class="administrator_details fl">
                            	
                                <h4>Contact Details</h4>
                                
                                <div class="register_form fl">
                                  <label>* First Name:</label>
                                  <input name="first_name" id="first_name" type="text" required>
								  <label>*  Last Name:</label>
                                  <input name="last_name" id="last_name" type="text" required>
                                <label>*  Contact Number:</label>
                                  <input name="phone" id="phone" type="text" required>
                                <label> * Email:</label>
                                  <input name="email"  id="email" placeholder="" type="email" required>
                                    <span style="margin-right: 231px;float: right;color: red;padding-bottom: 5px;" class="email_exit"></span>
                                <label>* Password:</label>
                                <input name="password" id="password" type="password" required>
                                <label>* Confirm Password:</label>
                                  <input name="confirm_password"  id="confirm_password" type="password" required>
								  <span style="margin-right: 231px;float: right;color: red;padding-bottom: 5px;" class="password_match"></span>
                              </div>
                            </div>
                            
                            <div class="administrator_details fl">
                            	
                                <h4>Company Details</h4>
                                
                              <div class="register_form fl">
                                <label>* Company Name:</label>
									<input name="company_name" id="company_name" type="text" required>
								<label>* Website Address:</label>
                                  <input name="web_address" id="web_address" type="text" required>
								<label>* Country:</label>
                                  <select name="country" id="country" required>
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
                                  
								
								<label> State/Province:</label>
                                  <input name="state" id="state" type="text">
								
								<label>*  City:</label>
                                  <input name="city" id="city" type="text" required>
								  
								<label>* Street Address:</label>
                                  <input name="street_address" id="street_address" type="text" required>  
                                
								
								  
								<label>* Postcode/ZIP:</label>
                                <input name="postcode" id="postcode" type="text" required>
                               <!-- <label>* Year Founded:</label>
                                  <input name="year_founded" id="year_founded" onkeypress="return isNumberKey(event)" type="text">  
                                <label>* Staff:</label>
                                  <input name="staff" id="staff" type="text">  
								<label>* Office Timing:</label>
                                  <input name="office_timing" id="office_timing" type="text"> 
								<label>* Emergency Phone Number:</label>
                                  <input name="emergency_phone" id="emergency_phone" type="text"> 
								<label>* Number of Local Trips till Date:</label>
                                  <input name="local_trips" id="local_trips" type="text"> -->
								
								
                                                                 
                                  </div>
                            </div>
                          
							
							       <div class="administrator_details fl">
                            	
                                <h4>Tour/Product Details</h4>
                                
                                <div class="register_form fl">
                                  <label>*Description:</label>
								  
									<textarea rows="" cols="" name="tour_product_description" maxlength="100" style="width: 306px;height: 80px;margin-bottom: 15px;" placeholder="Briefly describe the product or tour you wish to sell through Tourbookings..." required></textarea>
								 
								 <label>Countries/Cities:</label>
                                  <input name="tour_product_country" id="last_name" placeholder="Other Countries or Cities you operate in" type="text">
                                
                                <label>* Business Type:</label>
							
                                <select name="business_type" id="business_type" required>
                                  <option value="">Please select</option>
									<option value="Tour Operator">Tour Operator</option>
									<option value="Travel Agency">Travel Agency</option>
									<option value="Travel Aggregator">Travel Aggregator</option>
									<option value="Hotel">Hotel</option>
                                </select>
                                
                                
                              </div>
                            </div>
                            <div class="administrator_details fl">
                            	
								
                                <h4>Currency Details</h4>
                                
                              <div class="register_form fl">
                                <label>* Currency:</label>
                                  <select name="currency" id="currency" required>
                                    <option value="" selected="selected">Please select</option>
										<option value="USD">United States Dollar (USD)</option>
									<option value="GBP">	Great British Pound (GBP)</option>
								<option value="CAD">Canadian Dollar (CAD)</option>
								<option value="EU">Euros (EU) </option>
								<option value="PHP">Philippine Peso (PHP)</option>
								<option value="SGD">Singapore Dollar (SGD)</option>
								<option value="MYR">Malaysian Ringgit (MYR)</option>
								<option value="IDR">Indonesian Rupiah (IDR)</option>
								<option value="INR">Indian Rupee (INR)</option>
								<option value="HKD">Hong Kong Dollar (HKD)</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="administrator_details fl">
                            	
                                <h4>Language Details</h4>
                                
                              <div class="register_form fl">
                                <label>* Site Language:</label>
                                <select name="language" id="language" required>
                                  <option value="da">Danish</option>
                                  <option value="nl">Dutch</option>
                                  <option value="en" selected="selected">English</option>
                                  <option value="fr">French</option>
                                  <option value="de">German</option>
                                  <option value="ja">Japanese</option>
                                  <option value="no">Norwegian</option>
                                  <option value="pt">Portuguese</option>
                                  <option value="es">Spanish</option>
                                  <option value="sv">Swedish</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="administrator_details fl">
                            	
                                
                              <div class="register_form fl">
                                <input name="Submit" value="Submit" id="registeration_button" type="submit">
								<h2 style="padding-left: 360px;" class="success_mesg"></h2>
                              </div>
                            </div>
                            
                            </form>
               	  </div>

                     <?php include('../footer.php'); ?>
                </div>
        			
      <div style="clear:both"></div>
   </div>

</body>
</html>
