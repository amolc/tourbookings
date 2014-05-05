<?php

session_start();
 include('../include/database/db.php'); 
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
else {
	header('Location: index.php');
}
$booking_id = $_GET['booking_id'];

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


	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="include/resource/js/jquery.easyWizard.js"></script>-->
<!--
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() {

            $('#photoimg').live('change', function()			{
			           $("#preview").html('');
			    $("#preview").html('<img src="loader.gif" alt="Please wait...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();

			});
        });
</script>-->
<!--
	<script src="js/ckeditor.js"></script>
	<link href="sample.css" rel="stylesheet">
	<script>

// The instanceReady event is fired, when an instance of CKEditor has finished
// its initialization.
CKEDITOR.on( 'instanceReady', function( ev ) {
	// Show the editor name and description in the browser status bar.
	document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

	// Show this sample buttons.
	document.getElementById( 'eButtons' ).style.display = 'block';
});

function InsertHTML() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'htmlArea' ).value;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Insert HTML code.
		// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
		editor.insertHtml( value );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function InsertText() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'txtArea' ).value;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Insert as plain text.
		// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
		editor.insertText( value );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function SetContents() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	var value = document.getElementById( 'htmlArea' ).value;

	// Set editor contents (replace current contents).
	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
	editor.setData( value );
}

function GetContents() {
	// Get the editor instance that you want to interact with.
	var editor = CKEDITOR.instances.editor1;

	// Get editor contents
	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
	alert( editor.getData() );
}

function ExecuteCommand( commandName ) {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;

	// Check the active editing mode.
	if ( editor.mode == 'wysiwyg' )
	{
		// Execute the command.
		// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
		editor.execCommand( commandName );
	}
	else
		alert( 'You must be in WYSIWYG mode!' );
}

function CheckDirty() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	// Checks whether the current editor contents present changes when compared
	// to the contents loaded into the editor at startup
	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
	alert( editor.checkDirty() );
}

function ResetDirty() {
	// Get the editor instance that we want to interact with.
	var editor = CKEDITOR.instances.editor1;
	// Resets the "dirty state" of the editor (see CheckDirty())
	// http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
	editor.resetDirty();
	alert( 'The "IsDirty" status has been reset' );
}

function Focus() {
	CKEDITOR.instances.editor1.focus();
}

function onFocus() {
	document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
}

function onBlur() {
	document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
}

	</script>
-->

<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/

	// $('.ok').click(function(){
	
		// var tour_type = $('#tour_type').val();
		// var title = $('#title').val();
		// var overview = $('.overview').val();
		// var hilight =	$('.hilight').val();
		// var why_this =	$('.why_this').val();
		// var location_id = $("#location_id option:selected").text();
		// var city =	$('#city').val();
		// var duration =	$('#duration').val();

		// var deparchture_point = $('#deparchture_point').val();
		// var deparchture_time = $('.deparchture_time').val();
		
		// var return_detail = $('#return_detail').val();
		// var inclusions = $('.inclusions').val();
		// var exclusions = $('.exclusions').val();
		// var voucher_info = $('.voucher_info').val();
		// var local_operator_info = $('.local_operator_info').val();
		// var supplier_id = '<?php echo $_SESSION['supplier_id']; ?>';
			
					// var tour_id = $('#tour_id').val();
		// var photo_title = $('#photo_title').val();
		// var photo_url = $('#photo_url').val();
		// var description =	$('#description').val();

		
		

		// var currency_id = $('#currency_id').val();

		// var tour_id = $('#tour_id').val();

		// var price_per_person =	$('#price_per_person').val();
		// var price_child =	$('#price_child').val();
		// var price_adult =	$('#price_adult').val();
		
			
		// if(tour_type == "" || title == ""|| overview == ""|| hilight == ""|| why_this == ""|| location_id == ""|| city == ""|| duration == "" || deparchture_point == ""|| deparchture_time == ""|| return_detail == ""|| inclusions == ""|| exclusions == "") {
				// alert('please fill the field');		
			
			// }
		// else{
           // $.ajax({
				// type:  'post',
				// url:  'ajax_request_function/ajax_create_tour.php',
				// data: {tour_type:tour_type,title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,city:city,duration:duration,
						// deparchture_point:deparchture_point,deparchture_time:deparchture_time,return_detail:return_detail,inclusions:inclusions,
						// exclusions:exclusions,voucher_info:voucher_info,local_operator_info:local_operator_info,supplier_id:supplier_id
				// },
				// success: function(mesg) {

				   // if(mesg == 'create tour successful'){
					// $('#title').val("");
					// $('.overview').val("");
					// $('.hilight').val("");
					// $('.why_this').val("");
					// $('#location_id').val("");
					// $('#duration').val("");
					// $('#deparchture_point').val("");
					// $('.deparchture_time').val("");
					// $('#return_detail').val("");
					// $('.inclusions').val("");
					// $('.exclusions').val("");
					// $('.voucher_info').val("");
					// $('.local_operator_info').val("");

					// }
				// }
			// });



           // $.ajax({
				// type:  'post',
				// url:  'ajax_request_function/ajax_upload.php',
				// data: {tour_id:tour_id,photo_title:photo_title,photo_url:photo_url,description:description},
				// success: function(mesg) {
				  // alert(mesg);

				   // if(mesg == 'upload tour successful'){
					// $('.success_mesg').empty().append('<div style="margin-left: 244px;" class="col-md-6"><div class="alert alert-success"><strong>Well done!</strong> You successfully Tour successful create.</div></div>');
					// $('#tour_id').val("");
					// $('#photo_title').val("");
					// $('#photo_url').val("");
					// $('#description').val("");
					// $('#upload_photo').val("");
					
					// }
				// }
			// });




           // $.ajax({
				// type:  'post',
				// url:  'ajax_request_function/ajax_tour_price.php',
				// data: {currency_id:currency_id,tour_id:tour_id,price_per_person:price_per_person,price_child:price_child,price_adult:price_adult},
				// success: function(mesg) {

				   // if(mesg == 'price tour successful'){
					// $('#tour_id').val("");
					// $('#currency_id').val("");
					// $('#price_per_person').val("");
					// $('#price_child').val("");
					// $('#price_adult').val("");
						// location.reload();
					// }
				// }
			// });
			
			// }



	// });



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

	$('#delete_pic').click(function(){
alert('ok');
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

	});



});
</script>
<script type="text/javascript">
// $(document).ready(function(){


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
// });

</script>
	<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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
					<strong> Voucher</strong>
				</li>
				
				
			</ol>
			<h5 style="float: right;"><a href="javascript:history.back(1)" style="padding:5px 15px; color:white; border-radius:2px; background-color: #fd8900;">Go Back</a></h>

			<h2 style="width:85%;">Voucher</h2>
			
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


			<div id="printableArea" style="padding-left:175px!important;" class="panel-body">
			
				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ;?>'>
							<div class="form-group">
							
<?php
					$result = mysql_query("SELECT
									tour_price.currency_id,
									tour_price.price_per_person,
									tour_price.price_child,
									tour_price.price_adult,
									tour_price.price_customer_adult,
									tour_price.price_customer_child,
									tour_price.price_partner_adult,
									tour_price.price_partner_child,
									supplier.phone,
									supplier.email,
									supplier.company_name,
									supplier.web_address,
									supplier.business_type,
									supplier.street_address,
									supplier.city,
									supplier.state,
									supplier.postcode,
									supplier.country,
									supplier.currency,
									supplier.year_founded,
									supplier.staff,
									supplier.office_timing,
									supplier.emergency_no,
									supplier.local_trip_date,
									traveler.user_id,
									traveler.supplier_id,
									traveler.supplier_booking_id,
									traveler.first_name,
									traveler.last_name,
									traveler.adult_child_status,
									traveler.sex,
									traveler.age,
									traveler.proof_id,
									Supplier_Booking.id,
									Supplier_Booking.partner_supplier_id,
									Supplier_Booking.supplier_id,
									Supplier_Booking.currency_id,
									Supplier_Booking.amount,
									Supplier_Booking.traveller_id,
									Supplier_Booking.status,
									Supplier_Booking.start_date,
									Supplier_Booking.end_date,
									Supplier_Booking.insert_date,
									tour.tour_type,
									tour.title,
									tour.overview,
									tour.hilight,
									tour.why_this,
									tour.location_id,
									tour.city,
									tour.duration,
									tour.deparchture_point,
									tour.deparchture_time,
									tour.return_detail,
									tour.inclusions,
									tour.exclusions,
									tour.voucher_info,
									tour.local_operator_info,
									COUNT(traveler.booking_id) as total_count
									FROM
									Supplier_Booking
									INNER JOIN supplier ON supplier.id = Supplier_Booking.supplier_id
									INNER JOIN traveler ON supplier.id = traveler.supplier_id
									INNER JOIN tour ON tour.id = Supplier_Booking.tour_id AND tour.id = traveler.tour_id
									INNER JOIN tour_price ON tour.id = tour_price.tour_id
									WHERE Supplier_Booking.id = '".$booking_id."' AND  Supplier_Booking.supplier_id ='".$supplier_id."'
									
									ORDER BY Supplier_Booking.id DESC
									");
						
		while ($row = mysql_fetch_array($result))
		{
		
		       $adult_result = mysql_query("select * from traveler where supplier_booking_id = '".$booking_id."' AND supplier_id ='".$supplier_id."' AND adult_child_status='adult'");
			   while ($adult_row = mysql_fetch_array($adult_result)) {
		?>			
					<div class=" voucher">
                   	  <div class="voucher_head">
                      
                      	<div class="booking_id">
                        	<p>ID: <?php echo $row['id'];?></p>
                        </div>
                        <div class="voucher_heading">
                        	<h1>Tour Voucher</h1>
                        </div>
                      </div>
                      
                      <div class="tour_title">
                        	<p><strong>Tour Title:</strong><?php echo $row['title'];?><br>
                            <span><strong>Booking Date:</strong> <?php echo $row['start_date'];?></span><br>
                            <span><strong>Adult Name:</strong> <?php echo $adult_row['first_name'];?></span>
                            </p>
                            
                            <p>Please hand this voucher to our representative at the start of your tour. Our representative will meet you in the immigration hall of airport, holding.<br>
<br>
								Emergency Contact No. +20 (0) 111111111 (Mr. An Example - mobile) 
								(local tour organizer - for problems en-route or in the airport)
								UK Emergency Contact No. +44 (0) 111111111 (Office hours) OR +44 (0) 222222222 (out of hour mobiles)</p>
                        </div>
                      
                      <div class="voucher_footer">
                      
                      	<div class="footer_booking_id">
                        	<p>
								<a href="http://tourbookings.co/">
									<img style="width: 120px;height: 50px;" src="../images/tourbooking_logo.png" width="256" height="105">
								</a>
							</p>
                        </div>
                        <div class="footer_heading">
                        	<h1>Tour Voucher</h1>
                        </div>
                        <!--<div class="signature">
                        	Signature Here 
                        </div>-->
                      </div>
                        
                    </div>
					<br />
	<?php
	}
	
		       $child_result = mysql_query("select * from traveler where supplier_booking_id = '".$booking_id."' AND supplier_id ='".$supplier_id."' AND adult_child_status='child'");
			   while ($child_row = mysql_fetch_array($child_result)) {
			   
			   ?>			
					<div class=" voucher">
                   	  <div class="voucher_head">
                      
                      	<div class="booking_id">
                        	<p>ID: <?php echo $row['id'];?></p>
                        </div>
                        <div class="voucher_heading">
                        	<h1>Tour Voucher</h1>
                        </div>
                      </div>
                      
                      <div class="tour_title">
                        	<p><strong>Tour Title:</strong><?php echo $row['title'];?><br>
                            <span><strong>Booking Date:</strong> <?php echo $row['start_date'];?></span><br>
                            <span><strong>Adult Name:</strong> <?php echo $adult_row['first_name'];?></span>
                            </p>
                            
                            <p>Please hand this voucher to our representative at the start of your tour. Our representative will meet you in the immigration hall of airport, holding.<br>
<br>
								Emergency Contact No. +20 (0) 111111111 (Mr. An Example - mobile) 
								(local tour organizer - for problems en-route or in the airport)
								UK Emergency Contact No. +44 (0) 111111111 (Office hours) OR +44 (0) 222222222 (out of hour mobiles)</p>
                        </div>
                      
                      <div class="voucher_footer">
                      
                      	<div class="footer_booking_id">
                        	<p>
								<a href="http://tourbookings.co/">
									<img style="width: 120px;height: 50px;" src="../images/tourbooking_logo.png" width="256" height="105">
								</a>
							</p>
                        </div>
                        <div class="footer_heading">
                        	<h1>Tour Voucher</h1>
                        </div>
                        <!--<div class="signature">
                        	Signature Here 
                        </div>-->
                      </div>
                        
                    </div>
					<br />
	<?php
			   }
		}
			?>
					
					
						</div>
					
						<span style="padding-left: 450px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 750px;margin-top: 10px;display:none;" type="submit" name="submit" value="submit" class="btn btn-info ok" />


				</form>
				
			</div>
				<input style="padding: 5px 15px;color: white;border-radius: 2px;background-color: #fd8900; border:none; margin-left:755px; position: absolute;margin-top: -68px;" type="button" onclick="printDiv('printableArea')" value="Print Voucher" />
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