<?php 
 include('include/database/db.php'); 

if(isset($_POST['submit']))
{
	    session_start();
		$email = $_SESSION['user_name'];
		$new_pass = $_POST['con_pass'];
		$update_query = "update user set password = '$new_pass' where email = '$email'";
		//echo $update_query;exit;
		$responce = mysql_query($update_query)or die(mysql_error());
if($responce) {
		
		$to = $email;
				$subject = " Password Changed";
				$message = '<!doctype html>
					<html>
					<head>
					<meta charset="utf-8">
					<title>Tour bookings</title>
					<style>
					body { margin:0px; padding:0px;}
					</style>
					</head>

					<body>
					 <div style="width:500px; min-height:450px; margin:0 auto; background:#e2e2e2;">
						
						 <div style="width:440px; min-height:390px; margin:30px; float:left; background:white;">
							 <div style="width:440px; height:80px; border-bottom:#e1e1e1 solid 1px; background:#f5f5f5;">
								 <a href="#" style="float:left; margin:18px 20px 0px 19px;"><img width="112" height="45 " alt="" src="http://tourbookings.co/images/tourbooking_logo.png"></a>
								 <h1 style="float:left; font-family:Arial, Helvetica, sans-serif; line-height:80px; color:#fd8900 !important; font-size:24px; letter-spacing:2px; font-weight:bold; display:block; margin:0px; text-decoration:none;">TOURBOOKINGS.CO</h1>
								</div>
					   
								
								<div style="width:440px; float:left;">
								 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span> Member</h1>
									
									<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">Your Password hase been changed  . 
									Password:'.$new_pass.'
									<br /></p>
								</div>
								
								<div style="width:440px; float:left;">
								 <h1 style="float:left; border-top:#e1e1e1 solid 1px; width:420px; font-family:Arial, Helvetica, sans-serif; height:53px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none; padding:15px 0px 0px 20px;">Best Wishes,<br>

					<a href="#" style="color:#fb8900; text-decoration:none;">TourBookings</a></h1>
								</div>


							</div>
							<div style="clear:both;"></div>
					   </div>
					</body>
					</html>';								
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'To: '.$email.'' . "\r\n";
					$headers .= 'From: admin@tourbookings.co' . "\r\n";
					$mail_sent = mail( $to, $subject, $message, $headers );
					
	echo "<div style='position: absolute;top: 204px;right: 232px; color:#fd8900;'><h2>Your Password changed and  sent to Your Email.</h2></div> ";
		}
		else {
		
		}
      //echo '<script type="text/javascript">$('."'.old_error'".').empty().append('."'Password Changed'".');</script>';
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
$(document).ready(function () {

      // old password checking
		$('#old_pass').blur(function(){ 
			var old_pass = $('#old_pass').val();
			 $.ajax({
			 type:  'post',
			 url:  'ajax_request_function/ajax_check_password.php',
			 data: {old_pass:old_pass},
			 success: function(mesg) {
			 if(mesg == '1') {
			 $('.old_error').empty().append('Old Password Does not match');
			$('#old_pass').val('');
			 }
			
			}
			});
	 });
	 
     // password match checking
    $('#con_pass').blur(function(){ 
	var con_pass = $('#con_pass').val();
	var new_pass = $('#new_pass').val();
	if (con_pass != new_pass){
	$('.error_mesg').empty().append("New Password Don't Match with Confirm Password");
	$('#con_pass').val('');
	 $('#new_pass').val('');
	//$('.error_mesg').html('New & Confirm Password does not match');
	return false;
	}
    });
	
	// show pass while click on check box
	$('#show_pass').click(function (){ 
	if  ($(this).is(':checked')){
	$('#old_pass').attr('type', 'text');
    $('#con_pass').attr('type', 'text');
	$('#new_pass').attr('type', 'text');
	}
	else
	{
	$('#old_pass').attr('type', 'password');
	$('#con_pass').attr('type', 'password');
	$('#new_pass').attr('type', 'password');
	}
    });

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

            	<div class="center_body fl">
                	<div style="background:#fd8900;" class="left_penal fl">
						<div style="background:none;" class="insider_guide fl">
                    	
                        </div>

                            <div style="display:none;" class="chat_now fl"><img src="images/chat_now.jpg" alt="" width="296" height="186"></div>

                    </div>

                    	<div class="right_penal fl">
							<form method="POST" action="">
                            <div class="administrator_details fl">
							
                                <h4>Change Password</h4>

                                <div class="register_form fl">
                                  <label>* Old Password:</label>
                                  <input name="old_pass" id="old_pass" type="password" required>
                                  <span style="float: left;margin-left: 242px;color: red;" class="old_error"></span>								  
                              </div>
							  <div class="register_form fl">
                                  <label>* New Password:</label>
                                  <input name="new_pass" id="new_pass" type="password" required>	
                              </div>
							  <div class="register_form fl">
                                  <label>* Confirm Password:</label>
                                  <input name="con_pass" id="con_pass" type="password" required>	
                              </div>
							  <div class="register_form fl">
                                  <label>Show Password:</label>
                                  <input name="show_pass" id="show_pass" type="checkbox">	
                              </div>
							  
							  <span style="float: left;margin-left: 242px;color: red;" class="error_mesg"></span>
							  <h2 style="float: left;margin-left: 242px;color: green;" class="success_mesg"></h1>
							 
                            </div>

                            <div class="administrator_details fl">


                              <div class="register_form fl">
                                <input name="submit" value="Submit" id="registeration_button" type="submit">
								
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
