<?php
session_start();
 include('../include/database/db.php'); 
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
else {
	header('Location: index.php');
}
if(isset($_REQUEST['submit'])){
$supplier_id = $_SESSION['supplier_id'];
 
 $email = $_REQUEST['email'];
 $phone = $_REQUEST['phone'];
 $street_address = $_REQUEST['street_address'];
 //echo $supplier_id;
// echo "<br>$old_pass ";exit; 
 $res = mysql_query("select * from supplier where id='$supplier_id'") or die(mysql_error());
 if(mysql_num_rows($res)>0){
 mysql_query("update supplier set email='$email',phone='$phone',street_address='$street_address' where id='$supplier_id'") or die(mysql_error());
 header("Location:change_contact_detail.php?set=ok");
 }
 else
 {
 header("Location:change_contact_detail.php?wrong=ok");
 }
 
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tourbooking.co" />
	<meta name="author" content="Laborator.co" />

	<title>Tourbooking.co</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">
	<script src="include/resource/js/jquery-1.10.2.min.js"></script>

	<!--<link rel="stylesheet" href="include/resource/css/easyWizardSteps.css"  id="style-resource-6">-->
<style type="text/css">

	.submit {
	display:none!important;
	}

	div.upload {
	margin-top: -10px;
    width: 157px;
    height: 57px;
    background: url(https://lh6.googleusercontent.com/-dqTIJRTqEAQ/UJaofTQm3hI/AAAAAAAABHo/w7ruR1SOIsA/s157/upload.png);
    overflow: hidden;
}

div.upload input {
    display: block !important;
    width: 157px !important;
    height: 57px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px;
}
#change_password:hover {
background: #373E4A;
color: #FFF;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/
//alert('qqq');
			// old password checking
			$('#old_pass').blur(function(){ 
			var old_pass = $('#old_pass').val();
			 $.ajax({
			 type:  'post',
			 url:  'ajax_request_function/ajax_check_supplier_password.php', 
			 data: {old_pass:old_pass},
			 success: function(mesg) {
			 if(mesg == '1') {
			 $('.old_error').empty().html('Old Password Does not match').show('fast').animate({opacity: 1.0}, 3000).fadeOut('slow');
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
			$('.error_mesg').empty().html("New Password Don't Match with Confirm Password").show('fast').animate({opacity: 1.0}, 3000).fadeOut('slow');
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

<body class="page-body">

<div class="page-container">

<?php include('include/side_menu/side_menu.php'); ?>
	<div class="main-content">
<?php include('include/header/header.php'); ?>

			<ol class="breadcrumb bc-3">
				<li>
					<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Account Detail</strong>
				</li>
			</ol>
<?php if(isset($_REQUEST['wrong'])){
echo '<h2 style="color:red;">contact detail not change </h2>';
} 
if(isset($_REQUEST['set'])){
echo '<h2 style="color:green;">Contact Detail changed ! </h2>';
} 

 $result = mysql_query("select * from supplier where id='$supplier_id'") or die(mysql_error());
 while ($fetch_row = mysql_fetch_array($result))
 {
	$sup_address = $fetch_row['street_address'];
	$sup_phone = $fetch_row['phone'];
	$sup_email = $fetch_row['email'];
 }
?>
			<h2>Account Detail</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading"> 
				<div style="padding-right: 0;" class="panel-title">
					<a id="change_password" style="padding: 11px;" href="changepassword.php">Change Password</a>
				</div>
				<div style="padding-left: 1px;" class="panel-title">
					<a  id="contact_detail" style="background: #373E4A;padding: 11px;color: #FFF;"  href="change_contact_detail.php">Change Contact Detail</a>
				</div>


				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>


			<div class="panel-body">


			
				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action=''>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Email</label>

							<div class="col-sm-5">
								<input type="email" style="width:45%" class="form-control" id="email" value="<?php echo $sup_email; ?>" name="email" placeholder="Email">
							</div>
							<div class="old_error" style="color:red;"></div>
						</div><div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Phone</label>

							<div class="col-sm-5">
								<input type="text" style="width:45%" class="form-control" id="phone" name="phone" value="<?php echo $sup_phone; ?>" placeholder="Phone">
							</div>
							<div class="old_error" style="color:red;"></div>
						</div><div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Address</label>

							<div class="col-sm-5">
								<input type="text" style="width:45%" class="form-control" id="street_address" value="<?php echo $sup_address; ?>" name="street_address" placeholder="Address">
							</div>
							<div class="old_error" style="color:red;"></div>
						</div>						
						<span style="padding-left: 258px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 0px;margin-top: 10px;" type="submit" name="submit" value="Submit" class="btn btn-info ok" />


				</form>

			</div>

		</div>

	</div>
</div>

<?php include('include/footer/footer.php'); ?>


</div>


<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

	<div class="chat-inner">


		<h2 class="chat-header">
			<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
		</h2>


		<div class="chat-group" id="group-1">
			<strong>Favorites</strong>

			<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
			<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
		</div>


		<div class="chat-group" id="group-2">
			<strong>Work</strong>

			<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
			<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
		</div>


		<div class="chat-group" id="group-3">
			<strong>Social</strong>

			<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
		</div>

	</div>

	<!-- conversation template -->



	<div class="chat-conversation">

		<div class="conversation-header">
			<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

			<span class="user-status"></span>
			<span class="display-name"></span>
			<small></small>
		</div>

		<ul class="conversation-body">
		</ul>

		<div class="chat-textarea">
			<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
		</div>

	</div>

</div>


<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Art Ramadani</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>

	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>

	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul></div>



<!--
	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>-->
	
		<link rel="stylesheet" href="include/resource/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="include/resource/js/ckeditor/ckeditor.js" id="script-resource-9"></script>
	<script src="include/resource/js/ckeditor/adapters/jquery.js" id="script-resource-10"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-11"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-12"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-13"></script>
	
	
															
</body>
</html>