<?php

session_start();
 include('../include/database/db.php'); 
// if(isset($_SESSION['supplier_id'])){
 // $supplier_id = $_SESSION['supplier_id'];
// }
// else {
	// header('Location: index.php');
// }

 
 
 // $supplier_id = $_SESSION['supplier_id'];

	
$tour_id = $_GET['tour_id'];

$query = mysql_query("SELECT tour.id,
						tour_price.tour_id,
						tour.overview,
						tour.title,
						tour.city,
						tour.hilight,
						tour.why_this,
						tour.location_id,
						tour.duration,
						tour.deparchture_point,
						tour.deparchture_time,
						tour.return_detail,
						tour.inclusions,
						tour.exclusions,
						tour.voucher_info,
						tour.local_operator_info,
						tour_price.price_per_person,
						tour_price.price_child,
						tour_price.currency_id
						FROM tour INNER JOIN tour_price ON tour.id = tour_price.tour_id	where tour.id = '".$tour_id."'");
	while ($record = mysql_fetch_array($query))
		{
			$tour_title =  $record['title'];
			// echo $tour_title;
			$tour_overview =  $record['overview'];
			$tour_hilight =  $record['hilight'];
			$tour_why_this =  $record['why_this'];
			$tour_location =  $record['location_id'];
			$tour_city =  $record['city'];
			$tour_duration =  $record['duration'];
			$tour_deparchture_point =  $record['deparchture_point'];
			$tour_deparchture_time =  $record['deparchture_time'];
			$tour_return_detail =  $record['return_detail'];
			$tour_inclusions =  $record['inclusions'];
			$tour_exclusions =  $record['exclusions'];
			$tour_voucher_info =  $record['voucher_info'];
			$tour_local_operator_info =  $record['local_operator_info'];
			
			$tour_currency_id =  $record['currency_id'];
			
			$tour_price_per_person =  $record['price_per_person'];
			// echo $tour_price_per_person;
			$tour_price_child =  $record['price_child'];

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


	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="include/resource/js/jquery.easyWizard.js"></script>-->

<script src="include/resource/js/jquery-1.10.2.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/
	alert('done1');
	$('.edit_submit').click(function(){
			
		alert('done');
		
		var title = $('#title').val();
		var overview = $('#overview').val();
		var hilight =	$('#hilight').val();
		var why_this =	$('#why_this').val();
		var location_id =	$('#location_id').val();
		var duration =	$('#duration').val();

		var deparchture_point = $('#deparchture_point').val();
		var deparchture_time = $('#deparchture_time').val();
		var return_detail = $('#return_detail').val();
		var inclusions = $('#inclusions').val();
		var exclusions = $('#exclusions').val();
		var voucher_info = $('#voucher_info').val();
		var local_operator_info = $('#local_operator_info').val();
		var supplier_id = '<?php echo $_SESSION['supplier_id']; ?>';
		var tour_id = '<?php echo $_GET['tour_id']; ?>';
			// alert(tour_id);


           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_edit_tour.php',
				data: {tour_id:tour_id ,title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,duration:duration,
						deparchture_point:deparchture_point,deparchture_time:deparchture_time,return_detail:return_detail,inclusions:inclusions,
						exclusions:exclusions,voucher_info:voucher_info,local_operator_info:local_operator_info
				},
				success: function(mesg) {
				  alert(mesg);
				   // if(mesg == 'create tour successful'){
					 // $('.success_mesg').empty().append('tour successful create');
					// $('#title').val("");
					// $('#overview').val("");
					// $('#hilight').val("");
					// $('#why_this').val("");
					// $('#location_id').val("");
					// $('#duration').val("");
					// $('#deparchture_point').val("");
					// $('#deparchture_time').val("");
					// $('#return_detail').val("");
					// $('#inclusions').val("");
					// $('#exclusions').val("");
					// $('#voucher_info').val("");
					// $('#local_operator_info').val("");

					// }
				}
			});



		var currency_id = $('#currency_id').val();

		var price_per_person =	$('#price_per_person').val();
		var price_child =	$('#price_child').val();

           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_edit_tour_price.php',
				data: {currency_id:currency_id,tour_id:tour_id,price_per_person:price_per_person,price_child:price_child},
				success: function(mesg) {
				  // alert(mesg);

				   // if(mesg == 'price tour successful'){
					 // $('.success_mesg').empty().append('price successful create');
					// $('#tour_id').val("");
					// $('#currency_id').val("");
					// $('#price_per_person').val("");
					// $('#price_child').val("");
					// $('#price_adult').val("");

					// }
				}
			});



	});



 // $('#photo_submit').click(function(){
// alert('ok');
		// var title = $( "#title" ).val();

		// $.ajax({
				// type: 'post',
				// url: 'ajax_request_function/ajax_photo_uploaded.php',
				// data: {title:title},

				// success: function(mesg) {
					// alert(mesg);
					 // $('#photo_detail').append(mesg);

				// }

		// });

	// });

	// $('#delete_pic').click(function(){
// alert('ok');
		// var title = $( "#title" ).val();

		// $.ajax({
				// type: 'post',
				// url: 'ajax_request_function/ajax_photo_uploaded.php',
				// data: {title:title},

				// success: function(mesg) {
					// alert(mesg);
					 // $('#photo_detail').append(mesg);

				// }

		// });

	// });



});
</script>
<script type="text/javascript">
$(document).ready(function(){


$('#deparchture_time option').val( '' );

// Using the text:

$('#deparchture_time option').filter(function() { 
    return ($(this).val() == '<?php echo $tour_deparchture_time;?>'); //To select Blue
}).prop('selected', true);


	// $('#myWizard').easyWizard({
		// buttonsClass: 'btn',
		// submitButtonClass: 'btn btn-info',
		// before: function(wizardObj, currentStepObj, nextStepObj) {

		// },
		// after: function(wizardObj, prevStepObj, currentStepObj) {

		// },
		// beforeSubmit: function(wizardObj) {





		// }
	// });
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
					<strong>Create Tour</strong>
				</li>
			</ol>

			<h2>Create Tour</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Over View
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

				$result = mysql_query("SELECT id FROM tour");

										//fetch tha data from the database
										while ($row = mysql_fetch_array($result))
										{
											$tour_id_counter =  $row['id'];

										}
			?>
			<input type="hidden" id="tour_id" value="<?php echo $tour_id_counter + 1 ; ?>" />






				<form  id="imageform" method="post" class="form-horizontal" enctype="multipart/form-data" action='upload.php'>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Title</label>

							<div class="col-sm-5">
								<input type="text"  class="form-control" id="title" value="<?php echo $tour_title ;?>" placeholder="Tour Title">
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Country</label>

							<div class="col-sm-5">
								<input type="text" style="width:35%" class="form-control"  value="<?php echo $tour_location ;?>"  id="photo_location_id" placeholder="Country">
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">City</label>

							<div class="col-sm-5">
								<input type="text" style="width:35%" class="form-control" id="city"  value="<?php echo $tour_city ;?>" placeholder="City">
							</div>
						</div>


						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Duration</label>

							<div class="col-sm-5">
								<span><input type="text" style="width:35%" class="form-control" id="duration"  value="<?php echo $tour_duration ;?>" placeholder="Tour Duration"> </span>
								<span style="margin-right: 203px;float: right;margin-top: -30PX;">in Days</span>
							</div>
						</div>

						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Overview</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow"  id="overview" placeholder="Tour Overview"><?php echo $tour_overview ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Hilights</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow"   id="hilight" placeholder="Tour Hilights"><?php echo $tour_hilight ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Speciality</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow"  id="why_this" placeholder="Tour Speciality"><?php echo $tour_why_this ;?></textarea>
							</div>
						</div>

<div style="clear: both;">&nbsp;</div>
						<hr style="width:100%"/>
							<div class="">
								<h5>Tour Price</h5>
							</div>
						<hr />
<br />


						<div class="form-group">
							<label class="col-sm-3 control-label">Select Currency</label>

							<div class="col-sm-5">
								<select style="width: 35%;"  id="currency_id"  class="form-control">
								<?php
										$result = mysql_query("SELECT * FROM currency");

										//fetch tha data from the database
										while ($row = mysql_fetch_array($result))
										{
												$selected = ($row['id']==$tour_currency_id) ? ' selected="selected"' : '';
											echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['name'].'</option>';

										}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price/Adult</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_per_person"  value="<?php echo $tour_price_per_person ;?>" placeholder="Price Per Person">
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price/Child</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control"  value="<?php echo $tour_price_child ;?>" id="price_child" placeholder="Price Child">
							</div>
						</div>

						<hr />
							<div class="">
								<h5>Schedule</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Deparchture Point</label>

							<div class="col-sm-5">
								<input type="text" class="form-control" id="deparchture_point"  value="<?php echo $tour_deparchture_point ;?>" placeholder="Deparchture Point">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Deparchture Time</label>

							<div class="col-sm-5">
								<select style="width: 35%;"  id="deparchture_time"  class="form-control">
									<?php	//$selected = ($row['id']==$tour_currency_id) ? ' selected="selected"' : ''; ?>
									<option value="1">1 Hour</option>
									<option value="2">2 Hour</option>
									<option value="3">3 Hour</option>
									<option value="4">4 Hour</option>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Return Detail</label>

							<div class="col-sm-5">
								<input type="text"  class="form-control"  value="<?php echo $tour_return_detail ;?>" id="return_detail" placeholder="Return Detail">
							</div>
						</div>


						<hr />
							<div class="">
								<h5> Additional info</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Inclusions</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;"  class="form-control autogrow" id="inclusions" placeholder="Inclusions"><?php echo $tour_inclusions ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Exclusions</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;"   class="form-control autogrow" id="exclusions" placeholder="Exclusions"><?php echo $tour_exclusions ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Voucher info</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;"   class="form-control autogrow" id="voucher_info" placeholder="Voucher info"><?php echo $tour_voucher_info ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Local operator information</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;"  class="form-control autogrow" id="local_operator_info" placeholder="Local operator information"><?php echo $tour_local_operator_info ;?></textarea>
							</div>
						</div>
						<span style="padding-left: 450px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 750px;margin-top: 10px;" type="button" value="submit" class="btn btn-info edit_submit" />


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