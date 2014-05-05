<?php

session_start();
 include('../include/database/db.php'); 
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
else {
	header('Location: index.php');
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
	  <script type="text/javascript" src="timepicker/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="timepicker/jquery.timepicker.css" />
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
font-size:12px
}

</style>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/


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
					<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Account</strong>
				</li>
				<li class="active">
					<strong>Payment Deposit</strong>
				</li>
			</ol>

			<h2>Payment Deposit</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Overview
				</div>

				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>


			<div class="panel-body">
			
			
				<?php 
					if($_POST['Submit'] == 'Submit') 
					{
						$amount_deposit = mysql_real_escape_string($_POST['amount_deposit']);
						$description = mysql_real_escape_string($_POST['description']);
						$deposit_type = "Bank";
						$sql3 = mysql_query("SELECT
							available_balance
							FROM
							supplier_balance
							WHERE  supplier_id = '".$supplier_id."'
							");
							while ($row = mysql_fetch_array($sql3)) 
								{
									$supplier_balance = $row['available_balance'];
								
								}

								$total = $amount_deposit + $supplier_balance;
									$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
								$current_date = date("m/d/Y", $today_date);
							// echo $total;
							
						$sql2   = "insert into supplier_balance(supplier_id,available_balance,amount_deposit,type,currency,description,deposit_type,status,insert_date) values ('$supplier_id','$total','$amount_deposit','deposit','USA Doller','$description','$deposit_type','pending','$current_date')";
							$query = mysql_query($sql2);
							
							if($query)
							{
							$supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
							$supplier_row = mysql_fetch_array($supplier_result); 					
							$supplier_email = $supplier_row ['email'];
							$supplier_fname = $supplier_row ['first_name'];
							$supplier_lname = $supplier_row ['last_name'];
							
			   
								$to = $supplier_email ;					
								$subject = "Deposit Pending";
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
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">This is to inform you that we have received notice of the deposit you make and will credit the funds to your account shortly.
													<br />
													Do check out the My Shop feature in the mean time!
													</p>
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
									$headers .= 'From: support@tourbookings.co' . "\r\n";					
									mail( $to, $subject, $message, $headers );
									//email send to admin 
										$to2 = 'support@tourbookings.co'; 
										// $to1 ='';
										$subject2 = "Payment Deposit";  
										// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
										$message2 = '
														<b>Dear Support,</b>
														<div>
														 Payment Deposit from Partner
														</div>
														<br />
														<br />
														
														<br /><br /><br />
														<div>
															<b>Best Regards,</b>
														</div>
														<div>
															Tour Bookings 
														</div>
														';
														
													
										$headers2  = 'MIME-Version: 1.0' . "\r\n";
									$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

									// Additional headers 
									$headers2 .= 'To: support@tourbookings.co' . "\r\n";
									$headers2 .= 'From: support@tourbookings.co' . "\r\n";

									// $headers2 .= 'Cc: '.$customer_email.'' . "\r\n"; 

										$mail_sent1 = mail( $to2, $subject2, $message2, $headers2 );
										
										// echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
								echo "Successful Deposit";
							}
							else {
							$supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
							$supplier_row = mysql_fetch_array($supplier_result); 					
							$supplier_email = $supplier_row ['email'];
							$supplier_fname = $supplier_row ['first_name'];
							$supplier_lname = $supplier_row ['last_name'];
							
			   
								$to = $supplier_email ;					
								$subject = "Deposit Failed";
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
												 <h1 style="float:left; border-bottom:#e1e1e1 solid 1px; width:440px; font-family:Arial, Helvetica, sans-serif; text-indent:20px; line-height:40px; color:#323232; font-size:14px; font-weight:bold; display:block; margin:0px; text-decoration:none;"><span style="color:#fd8900; margin-right:5px;">Dear,</span>'.$supplier_fname.' '.$supplier_lname.'</h1>
													
													<p style="float:left; width:400px;padding:0px 20px; font-family:Arial, Helvetica, sans-serif; color:#727172; font-size:14px; line-height:20px; margin-bottom:80px;">We regret to inform you that your recent deposit has failed to reach us.
													<br />
													Kindly try again and contact us if this issue persists .

													</p>
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
									$headers .= 'From: support@tourbookings.co' . "\r\n";					
									mail( $to, $subject, $message, $headers );
								echo "error";
							}
										

					}
					// else {

				?>
				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ;?>'>
					
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Amount Deposit (USD)</label>

							<div class="col-sm-5">
								<input type="text" data-validate="number"  style="width:43%;" class="form-control" name="amount_deposit" id="title" placeholder="" required>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Description</label>
					
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 overview" name="description" id="tour_overview" required></textarea>
							</div>
		
						</div>
						<input style="margin-left: 258px; margin-top: 10px;" type="submit" name="Submit" value="Submit" class="btn btn-info ok" />


				</form>
<?php 
// }

?>
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
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-13"></script>
	
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>
															
					<!--			<script>
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			CKEDITOR.replace( 'editor1', {
				on: {
					focus: onFocus,
					blur: onBlur,

					// Check for availability of corresponding plugins.
					pluginsLoaded: function( evt ) {
						var doc = CKEDITOR.document, ed = evt.editor;
						if ( !ed.getCommand( 'bold' ) )
							doc.getById( 'exec-bold' ).hide();
						if ( !ed.getCommand( 'link' ) )
							doc.getById( 'exec-link' ).hide();
					}
				}
			});
		</script>-->
</body>
</html>