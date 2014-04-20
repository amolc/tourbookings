<?php 

	include('../include/database/db.php'); 
	 function NewUser()
	 {
		 $phone = $_POST['phone'];
		 $email = $_POST['email'];
		 $company_name = $_POST['company_name']; 
		 $contact_person = $_POST['contact_person']; 
		 $city = $_POST['city']; 
		 $password = $_POST['password']; 
		 
		 // $sql   = "insert into supplier(phone,email,password,company_name,street_address,city)
				// values ('$phone','$email','$password','$company_name','$street_address','$city')";

		 $query = "INSERT INTO supplier (phone,email,password,company_name,street_address,city) VALUES ('$phone','$email','$password','$company_name','$contact_person','$city')";
		 $data = mysql_query ($query)or die(mysql_error());
		 if($data)
		 { 
			echo "YOUR REGISTRATION IS COMPLETED...";
		}
	} 
	 function SignUp()
	 { 
		if(!empty($_POST['email'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
		 { 
			$query = mysql_query("SELECT * FROM supplier WHERE email = '$email'") or die(mysql_error()); 
			
			if(!$row = mysql_fetch_array($query) or die(mysql_error()))
			{
				newuser();
			}
			 else
			{ 
				echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
			} 
		 }

	 } 
	if(isset($_POST['signup']))
	{ 
		SignUp();
	}
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="main_container">
    	<div class="header_main fl">
    	  <div class="header_top fl">
    	    <?php include('../navigation.php'); ?>
  	    </div>
    	  <div class="header_logo fl">
           	<div class="logo fl" style="margin-top:7px;">
            <a href="index.php"><img src="../images/tourbooking_logo.png" width="256" height="105"></a>
</div>      
            <div class="header_login fr">
            
            <form action="" method="post" >
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
        	<div class="banner fl"><img src="../images/partner_signup_banner.jpg" class="fl" alt="" width="1002" height="240"></div>
            	<div class="center_body fl">
                
                	<div class="body_content fl">
                   	  <div class="left_colm fl">
                        	<div class="convenience fl">
                            	<span class="fl"><img src="../images/convenience_icon.png" alt="" width="45" height="45"></span>
                              <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/rates_icon.png" alt="" width="45" height="45"></span>
                            <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/saas_icon.png" alt="" width="52" height="45"></span>
                            <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                        </div>
                          <div class="convenience fl">
                            	<span class="fl"><img src="../images/contact_icon.png" alt="" width="45" height="45"></span>
                            <h1>CONTACT US</h1>
                                <p><a href="index.php">Tourbookings.co</a><br>
                                  <a href="mailto:support@tourbookings.co">support@tourbookings.co</a><br>
                                  10th Floor, Collective Works,<br>
                                  100 Cecil Street, <br>
                            Singapore - 069532 </p>
                        </div>
                          
                      </div>
                        <form action="partner_landing.php" method="post">
							<div class="right_colm fr">
							  <div class="partner_form fl">
								<h1>Join Us as a partner</h1>
									  <label>Company Name:</label>
								<input name="company_name" id="first_name" type="text" required/>
									  <label>Email:</label>
								<input name="email" id="first_name" type="text" required/>
									  <label>Phone Number:</label>
								<input name="phone" id="first_name" type="text" required/>
									  <label>Contact Person:</label>
								<input name="contact_person" id="first_name" type="text" required/>
								<label>City:</label>
									  <input name="city" id="first_name" type="text" required/>
									  
									<input id="registeration_button" type="submit" value="SIGN UP" name="signup">
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
