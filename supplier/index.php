<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$('#Login').bind('click','keypress',function(){
			var username = $('#username').val();
			var password = $('#password').val();
			
			$.ajax({
					type: 'post',
					url: 'ajax_request_function/ajax_login.php',
					data: {username:username,password:password},
					
					success: function(mesg) {
					if(mesg =='1'){
						window.location.href = 'dashboard.php';
					}
					else {
						$('.mesg').empty().append(mesg);
						// $('#username').focus();
					}					
					}		
			});
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
	/**
	*raza malik <razamalik@outlook.com>
	*/

	$( "#confirm_password" ).blur(function() {
			var password =	$('#signup_password').val();
			var confirm_password =	$('#confirm_password').val();
			// alert(password);
			// alert(confirm_password);
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
		 if(email == ""){}
		 else  {
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
			}
				$('.email_exit').empty();		
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
<div id class="bg_container">
	<div id="main_container">
    	<div class="header_main fl">
    	  <div class="header_top fl">
    	    <?php include('../navigation.php'); ?>
  	    </div>
    	  <div class="header_logo fl">
           	<div class="logo fl" style="margin-top:7px;">
            <a href="../index.php"><img src="../images/tourbooking_logo.png" width="256" height="105"></a>
			</div> 
           </div>
    	</div>   	
  		<div class="banner fl">
            		<div class="center_body fl">

                    <div class="body_content fl">
                    <div class="latest_offers">
                            <h1>Join Us As Partner</h1> 
                  
                   	<div class="left_colm fl">
                   	<div class="header_signup fr">
          <?php
                error_reporting('e_all');
				include("../include/database/db.php");
				$name = $_POST['name'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				$username = $_POST['username'];
				$password = $_POST['password'];				
				if($_POST['submit'])
				{
					$insert="insert into users(first_name,email,phone,user_name,password)values('$name','$email','$mobile','$username','$password')";
					$exe=mysql_query($insert);
					if($exe)
					{
						header("location:../reseller/signup.php");
					}
				}
          ?>   
            <!--<form action="" method="post" >-->
            <form action=" " method="post">
            	<div class="customer_signup">SUPPLIER SIGNUP</div>
                <label>* Name:</label>
				<input id="name" type="text" name="name">
				<label>Email</label>
				<input id="email" type="text" name="email">
				<label>Mobile</label>
				<input id="mobile" type="text" name="mobile">
				<label>* Username</label>
				<input id="username" type="text" name="username">               
                <label>* Password:</label>
                <div style="margin-left: 42px;">
					<input style="margin-bottom:0px;" id="password" type="password" name="password">					 
					<input type="submit" name="submit" id="signup" value="signup"></a>
	            </div>
	            </div><!-- close latest offer  -->
            </form>
                   	<div class="header_login fr">
            <!--<form action="" method="post" >-->

            <form action="suppliersignaction.php " method="post">
	            <div class="customer_signup">SUPPLIER SIGNIN</div>
	                <label>* Username:</label>
					<input id="username" type="text" name="username">
	               
	                <label>* Password:</label>
	                <div style="margin-left: 42px;">
						<input style="margin-bottom:0px;" id="password" type="password" name="password">
						 <input type="submit" name="login" id="Login" value="Login">
						<div class="mesg" style="font-weight: bold;color: #F00;float: left; margin-left: 90px;width: 434px;"></div> 
						<input type="submit" name="signup" id="signup" value="signup"></a>
		                
		                <div><a href="forgot_password.php" style=" margin: 0px 22px 0px 47px;">Forgot Password</a></div>
		            </div>
		            </div><!-- close latest offer  -->
	        </form>
           <!-- </form>-->
                        <!-- <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">  -->
							<div style="height: auto;" class="right_colm fr">							 
                	</div>
     </div>
     </div>
     <div class="convenience-box">
     					 <div class="convenience fl">
     						<div class="box-1">
                            	<span class="convenience-icon"><img src="../images/convenience_icon.png" alt="" width="45" height="45" style="padding: 20px;"></span>
                             	 <h1>CONVENIENCE</h1>
                                <p>Everything is available at the click of the button. No need to go scurrying about to find an operator foractivities to fill your tour or to promote your own.</p>
                             </div>   
                       		 </div>
                           <div class="convenience fl">
     						<div class="box-1">
                            	<span class="convenience-icon"><img src="../images/convenience_icon.png" alt="" width="45" height="45" style="padding: 20px;"></span>
                             	 <h1>COMPETITIVE RATES</h1>
                                <p>We bring you competitive rates that you will not get elsewhere.</p>
                             </div>   
                       		 </div>
                          <div class="convenience fl">
     						<div class="box-1">
                            	<span class="convenience-icon"><img src="../images/saas_icon.png" alt="" width="45" height="45" style="padding: 20px;"></span>
                             	 <h1>SAAS</h1>
                                <p>Use the application for just a monthly fee. Competitive and easy.</p>
                             </div>   
                       		 </div>
                           <div class="convenience fl">
     						<div class="box-1">
                            	<span class="convenience-icon"><img src="../images/convenience_icon.png" alt="" width="45" height="45" style="padding: 20px;"></span>
                             	 <h1>CONTACT US</h1>
                                <p><a href="index.php">Tourbookings.co</a><br>
                                  <a href="mailto:support@tourbookings.co">support@tourbookings.co</a><br>
                                  10th Floor, Collective Works,
                                  100 Cecil Street, 
                            Singapore - 069532 </p>
                             </div>   
                       		 </div>
                   </div>
                	<?php include('../footer.php'); ?>
            	</div>
      <div style="clear:both"></div>
   </div>   
   <!-- Google Analytics-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50362006-1', 'tourbookings.co');
  ga('send', 'pageview');

  </script>
</body>
</html>
