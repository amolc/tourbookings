<?php 

 include('../include/database/db.php'); 
 
 $id=$_REQUEST['id'];
 $query = "SELECT * from marketing WHERE id = '$id'";
 $res = mysql_query($query);
$row = mysql_fetch_array($res);

if (isset($_POST["submit"]))
  {
	$name = mysql_real_escape_string($_POST['name']);
// echo $name;
$email = mysql_real_escape_string($_POST['email']);
$contact_number = mysql_real_escape_string($_POST['contact_number']);
$company_name = mysql_real_escape_string($_POST['company_name']);

$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$country = mysql_real_escape_string($_POST['country']);
$id = $_POST['id'];

	$query_update = "UPDATE marketing
	SET name='".$name."',  email='".$email."', 
		contact_number='".$contact_number."',
		company_name='".$company_name."',
		address='".$address."',
		city='".$city."',
		country='".$country."'
        WHERE id='".$id."'";
        $result = mysql_query($query_update) or die('Error, query failed');
	 header("Location:email_to_marketing.php?updated=ok");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
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

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/

	// $('#create_tour').click(function(){
	
	// alert('ok');
		/*var name = $('#name').val();
		var email = $('#email').val();
		var contact_number = $('#contact_number').val();
		var company_name =	$('#company_name').val();
		var address =	$('#address').val();
		var city =	$('#city').val();
		var country =	$('#country').val();
           $.ajax({
				type:  'post', 
				url:  'ajax_request_function/ajax_marketing.php',
				data: {name:name,email:email,contact_number:contact_number ,company_name:company_name,address:address,city:city,country:country}, 
				success: function(mesg) {
				  // alert(mesg);
				  
				   if(mesg == 'create marketing successful'){
					 $('.success_mesg').empty().append('marketing successful create');	
					$('#name').val("");
					$('#email').val("");
					$('#contact_number').val("");
					$('#company_name').val("");
					$('#address').val("");
					$('#city').val("");
					$('#country').val("");
					 
					}
				}                    
			});

	});

});*/
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
					<strong>Edit Marketing</strong>
				</li>
			</ol>
		
			<h2>Edit Marketing</h2>
			<br />

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Edit Marketing
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups-bordered" method="post" action="">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="name" name="name"  value="<?php echo $row['name']; ?>">
						</div>
					</div>					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Email</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Contact Number</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="contact_number" name="contact_number"  value="<?php echo $row['contact_number']; ?>">
						</div>
					</div>	
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Company Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $row['company_name']; ?>">
						</div>
					</div>	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Address</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">City</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Country</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>">
						</div>
					</div>
					
					

					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" id="create_tour" name="submit" class="btn btn-default">Update Marketing</button>
							<span style="padding-left: 40px;font-size: 14px;" class="success_mesg"></span>
						</div>
					</div>
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




	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>
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
