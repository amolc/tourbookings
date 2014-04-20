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
           	<div class="logo fl" style="margin-top:7px;">
            <a href="index.php"><img src="images/tourbooking_logo.png" width="256" height="105"></a>
</div>      
            <div class="header_login fr">
            
            <form action="search.php" method="post" >
                <label>* Username:</label>
				<input id="name" type="text" name="name">
                <input type="submit" name="button" id="Login" value="Login">
                <label>* Password:</label>
				<input style="margin-bottom:0px;" id="name" type="password" name="name">
                <a href="#" style="float: right; margin: 10px 23px 0px 0px;">Forgot Password</a>
                
            </form>
            </div>
            </div>
    	</div>
        	<div class="banner fl"><img src="images/partner_signup_banner.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                   	  <div class="left_colm fl">
                        	<div class="convenience fl">
                            	<span class="fl"><img src="images/convenience_icon.png" alt="" width="45" height="45"></span>
                              <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/rates_icon.png" alt="" width="45" height="45"></span>
                            <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/saas_icon.png" alt="" width="52" height="45"></span>
                            <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/contact_icon.png" alt="" width="45" height="45"></span>
                            <h1>CONTACT US</h1>
                                <p><a href="index.php">Tourbookings.co</a><br>
                                  <a href="mailto:support@tourbookings.co">support@tourbookings.co</a><br>
                                  10th Floor, Collective Works,<br>
                                  100 Cecil Street, <br>
                            Singapore - 069532 </p>
                        </div>
                          
                      </div>
                        
                        <div class="right_colm fr">
                       	  <div class="partner_form fl">
                           	<h1>Join Us as a partner</h1>
                                  <label>Company Name:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Email:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Phone Number:</label>
                            <input name="first_name" id="first_name" type="text"/>
                                  <label>Contact Person:</label>
                            <input name="first_name" id="first_name" type="text"/>
                            <label>City:</label>
                                  <input name="first_name" id="first_name" type="text"/>
                                  
                                <input id="registeration_button" type="submit" value="SIGN UP" name="Submit">
                       	  </div>
                        </div>
                        
                	</div>
                	<?php include('footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>
</body>
</html>
