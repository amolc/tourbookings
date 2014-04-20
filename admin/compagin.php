<?php
 include('../include/database/db.php'); 
 
 if(isset($_POST['compagin'])){
 
 $compagin_id = $_POST['compagin_id'];
 $template_id = $_POST['template'];
 $enter_date = date('m/d/Y H:i:s');

 if($template_id == "" ){header("Location:compagin.php?template=ok"); }
 else{

 //fetch compagin data from Database
 $compagin_res = mysql_query("select customer_id,name from compagin where id = '$compagin_id'")or die(mysql_error());
 $compagin_row = mysql_fetch_array($compagin_res);
 $name = $compagin_row['name'];
 //$customer_ids = $compagin_row['customer_id'];
 $customer_ids = explode(',',$compagin_row['customer_id']);
  $from = "";
 $subject ="";
 $message = "";
 //fetch email_template data from database
 $template_res = mysql_query("select message_from,message_subject,text from email_template where id = '$template_id'")or die(mysql_error());
 $template_row = mysql_fetch_array($template_res);
 $from = $template_row['message_from'];
 $subject = $template_row['message_subject'];
 $message = $template_row['text'];
 
 foreach($customer_ids as $id)
	 {
	        $marketing_res = mysql_query("select email from marketing where id = '$id'")or die(mysql_error());
			$marketing_row = mysql_fetch_array($marketing_res);			   
			$to = $marketing_row['email'];
 $que_query = "insert into que (customer_id,name,message_subject,message_from,message_to,text,status,enter_date) values ('$id','$name','$subject','$from','$to','$message','pending','$enter_date')";
 mysql_query($que_query) or die(mysql_error());
}
 // sending email to all residing in que
 /*
 $que_res = mysql_query("select * from que where status = 'pending'")or die(mysql_error());
 while($que_row = mysql_fetch_array($que_res))
 {
	 $que_from = "From: <".$que_row['message_from'].">";
	 $que_subject = $que_row['message_subject'];
	 $que_message = $que_row['text'];
	 $que_id = $que_row['id'];
	 			
	$headers1  = 'MIME-Version: 1.0' . "\r\n";
	$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers1 .= 'From:'.$que_from . "\r\n"; 
     $customer_ids = explode(',',$que_row['customer_id']);
	 foreach($customer_ids as $id)
	 {
	 
			  $marketing_res = mysql_query("select email from marketing where id = '$id'")or die(mysql_error());
			  $marketing_row = mysql_fetch_array($marketing_res);
			 $to = $marketing_row['email'];
			 
			$mail_sent1 = mail($to,$que_subject,$que_message,$headers1);
			//echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
			//exit;
			 //start mailgun script
			 // $mg_api = 'key-4vyeldmso9oe3t8gitphksdwz9p0tpw5';
			// $mg_version = 'api.mailgun.net/v2/';
			// $mg_domain = "fountaintechies.com";
			// $mg_from_email = "info@samples.com";
			// $mg_message_url = "https://".$mg_version.$mg_domain."/messages";
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			// curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
			// curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
			// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt ($ch, CURLOPT_VERBOSE, 0);
			// curl_setopt ($ch, CURLOPT_HEADER, 1);
			// curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
			// curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
			// curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			// curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_POST, true); 
			// curl_setopt($ch, CURLOPT_HEADER, false); 
			// curl_setopt($ch, CURLOPT_URL, $mg_message_url);
			// curl_setopt($ch, CURLOPT_POSTFIELDS,                
					// array(  'from'      => '<' . $que_from . '>',
							// 'to'        => $to,
							// 'subject'   => $que_subject,
							// 'text'      => $que_message

						// ));
			// $result = curl_exec($ch);
			// curl_close($ch);
			 // end mailgun script
			 		 
	 }  // end of foreach
	 
	 mysql_query("UPDATE que set status='sent',sent_date='$enter_date' where id ='$que_id'") or die(mysql_error());
	 
 }  //end of while 
 
 */
 
header("Location:compagin.php?saved=ok");
 
 }  //end of else
 
 } //end of isset

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>Tour bookings</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">

	<script src="include/resource/js/jquery-1.10.2.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
		<script type="text/javascript">
		$(document).ready(function(){
		
		    $('.template_show').hide();
			$('.template').change(function(){
				$('.template_show').hide();	 
				var template_id = $(this).val();
				//alert(template_id);			
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_show_email_template.php',
						data: {template_id:template_id},

						success: function(mesg) {
							//alert(mesg);
							$('.template_show').empty().append(mesg);						
						    $('.template_show').show();
							
						}
				});
			
			});	


			$('.send_que').click(function(){
					
				var template_id = $('.template').attr('temp_id');
				var compagin_id = $(this).attr('compagin_id');
				alert(template_id);
				if(template_id == ""){alert('Select a Email Template');}
				else{
						 //alert(template_id);
				//$.ajax({
						//type: 'post',
						//url: 'ajax_request_function/ajax_save_que.php',
						//data: {template_id:template_id,},

						//success: function(mesg) {
							//alert(mesg);
							
						//}

				//});
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
<hr />
<div class="mail-env">

	<!-- compose new email button -->
	<div class="mail-sidebar-row visible-xs">
		<a href="../../../neon-x/mailbox/compose/index.html" class="btn btn-success btn-icon btn-block">
							Leads Listing 

			
		</a>
	</div>
	
	<?php if(isset($_REQUEST["template"])){
			echo "<h1 style='color:red;'>Select at least one Email Template </h1>";
		}
		if(isset($_REQUEST["saved"])){
			echo "<h1 style='color:green;'>Compagin Saved in Que</h1>";
		}?>
	<!-- Mail Body -->
	<div class="mail-body">
 
		<div class="mail-header">
			<!-- title -->
			<div class="mail-title">
				Compagin Listing 
			</div>
			
			<!-- links -->
			
		</div>

					<table class="table table-bordered datatable" id="table-1">
						<thead>
							<tr>
							
							    <th>ID</th>
								<th>Name</th>								
								<th>Sorted By</th>
								<th>Email Template</th>								
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
						
						<?php
								$result = mysql_query("SELECT * FROM compagin");
							
							//fetch tha data from the database 
							while ($row = mysql_fetch_array($result)) 
							{ 
							
						echo'
							<tr class="odd gradeX">
								
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>

								<td>'.$row['sorted_by'].'</td>
								
								<td>
								<form method="post" action="" style="width:180px;">
								<div class="form-group">
						
                             
							<div class="col-sm-5" style="width:70.667%; float:left;">
								<select  class="sort_by template" name="template" class="form-control" style="padding:6px 4px; width:150px;">
								<option selected="selected"></option>
								';
								$email_res = mysql_query("select * from email_template") or die(mysql_error());
								while ($template = mysql_fetch_array($email_res)){
									
									echo '<option value="'.$template['id'].'">'.$template['message_subject'].'</option>';
									
									}

								echo '</select>
							</div>

						</div>
						</td>
						
						<td>
						<input type="hidden" name="compagin_id" value="'.$row['id'].'" />
						<button class="btn btn-success btn-icon" name="compagin" type="submit">Send<i class="entypo-mail"></i></button>
									
									</form>									
								</td>
							</tr>
							';
							
							}
						?>
							<!--<a class="btn btn-success btn-icon send_que" compagin_id="'.$row['id'].'">
										
									</a>-->

						</tbody>
					</table>
		
		<div class="template_show"></div>

						<script type="text/javascript">
							jQuery(document).ready(function($)
							{
								 $("#checkAll").click(function () {
									 $('input:checkbox').not(this).prop('checked', this.checked);
								 });

							
								$("#table-1").dataTable({
									"sPaginationType": "bootstrap",
									"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
									"bStateSave": true
								});
								
								$(".dataTables_wrapper select").select2({
									minimumResultsForSearch: -1
								});
							});
						</script>
									
		
	</div>
	
	
	<!-- Sidebar -->
	
	
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

	<link rel="stylesheet" href="include/resource/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/js/select2/select2.css"  id="style-resource-2">
		<script src="include/resource/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="include/resource/js/select2/select2.min.js" id="script-resource-9"></script>

	<link rel="stylesheet" href="include/resource/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-10"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-11"></script>
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
	
</body>
</html>