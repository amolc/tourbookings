<?php
 include('include/database/db.php');

if (isset($_POST["submit"]))
  {
	$contactGroup = mysql_real_escape_string($_POST['contactGroup']);
	$email = mysql_real_escape_string($_POST['email']);
	$phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
	$bestTime = mysql_real_escape_string($_POST['bestTime']);
	$travMonths = mysql_real_escape_string($_POST['travMonths']);
	$travDays = mysql_real_escape_string($_POST['travDays']);
	$travYears = mysql_real_escape_string($_POST['travYears']);
	$numbersAdult = mysql_real_escape_string($_POST['numbersAdult']);
	$numbersChildren = mysql_real_escape_string($_POST['numbersChildren']);
	$lookingFor = mysql_real_escape_string($_POST['lookingFor']);
	
$to = "apache@iamamol.com" ;
					$subject =  "Partner Membership"; 
					$message = "Dear Admin
								
								MY Login Information :
								Name: $contactGroup
								Email: $email
								Phone: $phoneNumber 
								Best Time: $bestTime 
								Travel Months: $travMonths 
								Travel Days: $travDays 
								Travel Years: $travYears 
								Adults: $numbersAdult 
								Children: $numbersChildren 
								Description: $lookingFor							
								Best Wishes</h2>
								http://tourbookings.co/
								"; 
						
    // message lines should not exceed 70 characters (PHP rule), so wrap it
   // $message = wordwrap($message, 70);
    // send mail
    mail($to,$subject,$message,"From: $email\n");
    
    }
  
 
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
        	<div class="banner fl"><img src="images/corporate_group.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                    <div class="about_us" style="border-bottom:none;">
                       	  <h1>Corporate / Group</h1>
                          <p><div class="main-wide unitRight">
            <div class="mod basic viamod man mbl">
                <b class="top"><b class="tl"></b><b class="tr"></b></b>
                <div class="inner">              
                    <p class="pbl mhl h3 inverse-txt strong">Book your next group or corporate event with Tour Bookings</p>                    
                </div>
                <b class="bottom"><b class="bl"></b><b class="br"></b></b>
            </div>

           
            <div class="omniture">
                


                
                
                
<!-- SiteCatalyst code version: H.24.4.
Copyright 1996-2012 Adobe, Inc. All Rights Reserved
More info available at http://www.omniture.com -->




<script type="text/javascript" language="JavaScript" src="/analytics/s_code.js?v=ATLAS_3.2.1.23-20131211"></script>




<script type="text/javascript" language="JavaScript"><!--
/* You may give each page an identifying name, server, and channel on
the next lines. */
s.pageName="Group Booking"
s.server=""
s.channel=""
s.pageType=""
s.prop1=""
s.prop2=""
s.prop3="GroupBooking"
s.prop4=""
s.prop5=""
s.prop6=""
s.prop7=""
s.prop8=""
/* Conversion Variables */
s.campaign=""
s.state=""
s.zip=""
s.events=""
s.products=""
s.purchaseID=""
s.currencyCode=""
s.eVar1=""
s.eVar2=""
s.eVar3=""
s.eVar4=""
s.eVar5=""
s.eVar6=""
s.eVar7=""
s.eVar8="" // Supplier Product Search Pages
//s.eVar9="" // Reset eVar
s.eVar10=""
//s.eVar11="" // Reset eVar
//s.eVar12="" //Visitor Type (omniture backend)
//s.eVar13="" //Paid Search
//s.eVar14="" //Product City (Merchandising)
s.eVar15=""
s.eVar16=""
//s.eVar17="" // Reset eVar
s.eVar18=""
s.eVar19=""
s.eVar20="" // Reset eVar
s.eVar21="" // Reset eVar
s.eVar22=""
s.eVar23=""
s.eVar24=""
s.eVar25=""
s.eVar26="" // Reset eVar
//s.eVar27="" //Booking Engines (Merchandising)
//s.eVar28="" //VISTA - Natural Search Keywords (omniture backend)
//s.eVar29="" //VISTA - Paid Search Keywords (omniture backend)
s.eVar30="" // Reset eVar
s.eVar31="" // Reset eVar
//s.eVar32="" //Order Summary PRE (Merchandising)
s.eVar33=""
s.eVar34="" // Reset eVar
s.eVar35=""
s.eVar36="" // Reset eVar
s.eVar37=""
s.eVar38=""
s.eVar39=""
s.eVar40=""
s.eVar41=""
//s.eVar42="" //Site Type (Merchandising)
s.eVar43=""
s.eVar44=""
s.eVar45=""
s.eVar46="Guest"
s.eVar47="" // Reset eVar
s.eVar48=""
s.eVar49=""
s.eVar50=""
s.eVar51=""
s.eVar52=""
//s.eVar53="" //Natural Search Landing URL
//s.eVar54="" //Reset eVar
//s.eVar55="" //Product Travel Date (Merchandising)
s.eVar56=""
s.eVar57=""
s.eVar58=""
s.eVar59=""//Referral Blog URL (thingstodo)
//s.eVar60="" //Campaign (First touch) omniture backend implement
s.eVar61=""//Referral Blog URL (travelblog)
//s.eVar62="" //Campaign Stacking omniture backend implement
//s.eVar63="" //Optimizely1
//s.eVar64="" //FB Like
//s.eVar65="" //FB Share
s.eVar66=""//Referral Google Plus URL (googleplus)
//s.eVar67=""//Reset eVars for future use
//s.eVar68=""//Reset eVars for future use
//s.eVar69=""//Reset eVars for future use
//s.eVar70=""//Reset eVars for future use
//s.eVar71="" //Optimizely2
//s.eVar72="" //Optimizely3
//s.eVar73="" //Optimizely4
//s.eVar74="" //Optimizely5
s.eVar75="" //Tracking different page type
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=s.t();if(s_code)document.write(s_code)//--></script>
<script language="JavaScript" type="text/javascript"><!--
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
//--></script>
<noscript>
 &lt;!-- from general JSP --&gt;
    
    &lt;img src="http://Tour Booking.122.2o7.net/b/ss/Tour Bookingprd/1/H.24.4--NS/0" height="0" width="0" border="0" alt="" /&gt;
    
</noscript><!--/DO NOT REMOVE/-->

            </div><!-- End of Omniture Code -->
			
			For groups 18 or larger, Tour Bookings can plan an itinerary that is tailored to your needs. With our uniquely authentic Asian destinations, we are sure to be able to find the tours that you are looking for regardless of age.
            
            <form action="group_services.php" id="groupBooking" method="post">
                <p class="xsmall note mhn">All fields marked <span class="required">*</span> are mandatory .</p>
                
                
                
                <div class="corporate_group fl">

                    <label for="contactgroup">* Contact Person (point of contact)</label>
                    <input type="text" id="contactgroup"  name="contactgroup" value="" required>

                    <label for="email">* Email address</label>
                    <input type="text" id="email" name="email" value="" required>
                    
                    <label for="phonenumber">* Contact number</label>
                    <input type="text" id="phonenumber" name="phonenumber" value="" required>

                    <label for="contact_time">* Best time to contact:</label>
                    <select id="bestTime" name="bestTime">
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="Evening">Evening</option>
                    </select>
                

                <label for="travDate">* Date you wish to go on the tour</label>
                    <select id="travMonths" name="travMonths" style="width:133px; margin-right:10px;">
                    <option value="01">January</option>
                    <option selected="" value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    
                    <select id="travDays" name="travDays" style="width:80px; margin-right:10px;">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option selected="" value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    </select>
                    
                    <select id="travYears" name="travYears" style="width:80px;">
                    <option selected="" value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    </select>
                
                <label for="numGroup">* Number of people </label>
                
                <input type="text" id="numbersAdult" name="numbersAdult" value="" size="3" placeholder="Adults" style="width:140px; margin-right:5px;" required>
                
                <input type="text" value="" id="numbersChildren" name="numbersChildren" size="3" placeholder="Children" style="width:140px; margin-left:5px;" required>
                      

                    <label for="lookingFor" style="line-height:20px;">* Tours that you would be interested in This is the text located at the top of every product page.</label>
                    <textarea rows="5" cols="40" id="lookingFor" name="lookingFor"></textarea>
					<input name="submit" type="submit" value="Submit">
					
					</div>
            </form>
        </div>
                      </div>
                	</div>
                	<?php include('footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
