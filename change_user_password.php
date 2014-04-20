<?php 
 include('include/database/db.php'); 

if(isset($_POST['submit']))
{
	    session_start();
		$name = $_SESSION['user_name'];
		$new_pass = $_POST['con_pass'];
		$update_query = "update user set password = '$new_pass' where email = '$name'";
		//echo $update_query;exit;
		mysql_query($update_query)or die(mysql_error());
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
