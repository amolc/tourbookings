<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});
</script>
</head>

<body>
	<div id="main_container">
    	<div class="header_main fl">
    	  <div class="header_top fl">
    	    <div class="top_nav fr">
    	      <ul>
    	        <li><a href="contact_us.html">Contact&nbsp;Us</a></li>
    	        <li><a href="supplier_registration.html">Sign&nbsp;up</a></li>
    	        <li><a href="#">Login</a></li>
    	        <li><a href="#">Help</a></li>
  	        </ul>
    	      <div class="wish_list"> <a href="#">0</a> </div>
  	      </div>
  	    </div>
    	  <div class="header_logo fl">
           	<div class="logo fl"><a href="index.html"><img src="images/logo.gif" alt="" width="330" height="45"></a></div>
                  <div class="tour_bookings fr">What’s so great about 
                        <span>Tour Bookings</span>
                  </div>
                <div class="header_form fl">
                  <select name="">
                    <option>Select One</option>
                  </select>

                  <select name="">
                    <option>Select One</option>
                  </select>

                  <input type="submit" name="button" id="button" value="GO">
                  
                  <input type="text" value="Keyword Search" onblur="if(this.value=='') this.value='Keyword Search'" onfocus="this.value=''">
                  <input name="" type="button">
                </div>
            </div>
    	</div>
        	<div class="banner fl"><img src="images/partner_banner.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                   	  <div class="left_colm fl">
                        	<div class="convenience fl">
                            	<span class="fl"><img src="images/convenience_icon.png" width="45" height="45"></span>
                                <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/rates_icon.png" width="45" height="45"></span>
                                <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/saas_icon.png" width="52" height="45"></span>
                            <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                          </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="images/contact_icon.png" width="45" height="45"></span>
                            <h1>CONTACT US</h1>
                                <p><a href="#">Tourbookings.co</a><br>
                                  <a href="#">support@tourbookings.co</a><br>
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
                                <input id="registeration_button" type="submit" value="LOGIN" name="Submit">
                                
                          </div>
                        </div>
                        
                	</div>
                	<div class="footer mrgn fl">
                	  <div class="footer_links fl">
                	    <h2>Support</h2>
                	    <ul>
                	      <li><a href="customer_care.html">Customer Care</a></li>
                	      <li><a href="privacy_policy.html">Privacy Policy</a></li>
                	      <li class="border"><a href="low_price_guarantee.html">Low Price Guarantee</a></li>
              	      </ul>
                	    <ul>
                	      <li><a href="group_services.html">Group Services</a></li>
                	      <li><a href="mileage_program.html">Mileage Program</a></li>
                	      <li class="border"><a href="gift_certificates.html">Gift Certificates</a></li>
              	      </ul>
              	    </div>
                	  <div class="footer_links mrgn_left fl">
                	    <h2>Company</h2>
                	    <ul>
                	      <li><a href="about_us.html">About Us</a></li>
                	      <li><a href="corporate_info.html">Corporate Info</a></li>
                	      <li class="border"><a href="media_center.html">Media Center</a></li>
              	      </ul>
                	    <ul>
                	      <li><a href="careers.html">Careers</a></li>
                	      <li><a href="site_map.html">Site Map</a></li>
                	      <li class="border"><a href="free_newsletter.html">Free Newsletter</a></li>
              	      </ul>
              	    </div>
                	  <div class="social_media fl"> <a href="#" class="twitter"></a> <a href="#" class="facebook"></a> <a href="#" class="youtube"></a> <a href="#" class="rss"></a> <a href="#" class="gplus"></a> <a href="#" class="pinterest"></a> </div>
              	  </div>
            	</div>
      <div style="clear:both"></div>
   </div>
   <article>
    <a href="#" class="scrollup"></a>
  </article>
</body>
</html>
