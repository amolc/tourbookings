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

	$('.ok').click(function(){
	
		var tour_type = $('#tour_type').val();
		var title = $('#title').val();
		var overview = $('.overview').val();
		var hilight =	$('.hilight').val();
		var why_this =	$('.why_this').val();
		var location_id = $("#location_id option:selected").text();
		var city =	$('#city').val();
		var duration =	$('#duration').val();

		var deparchture_point = $('#deparchture_point').val();
		var deparchture_time = $('.deparchture_time').val();
		
		var return_detail = $('#return_detail').val();
		var inclusions = $('.inclusions').val();
		var exclusions = $('.exclusions').val();
		var voucher_info = $('.voucher_info').val();
		var local_operator_info = $('.local_operator_info').val();
		var supplier_id = '<?php echo $_SESSION['supplier_id']; ?>';
			
					var tour_id = $('#tour_id').val();
		var photo_title = $('#photo_title').val();
		var photo_url = $('#photo_url').val();
		var description =	$('#description').val();

		
		

		var currency_id = $('#currency_id').val();

		var tour_id = $('#tour_id').val();


		var price_per_person =	$('#price_per_person').val();
		var price_child =	$('#price_child').val();
		var price_adult =	$('#price_adult').val();
		
			
		if(tour_type == "" || title == ""|| overview == ""|| hilight == ""|| why_this == ""|| location_id == ""|| city == ""|| duration == "" || deparchture_point == ""|| deparchture_time == ""|| return_detail == ""|| inclusions == ""|| exclusions == "") {
				alert('please fill the field');		
			
			}
		else{
           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_create_tour.php',
				data: {tour_type:tour_type,title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,city:city,duration:duration,
						deparchture_point:deparchture_point,deparchture_time:deparchture_time,return_detail:return_detail,inclusions:inclusions,
						exclusions:exclusions,voucher_info:voucher_info,local_operator_info:local_operator_info,supplier_id:supplier_id
				},
				success: function(mesg) {
				  // alert(mesg);

				   if(mesg == 'create tour successful'){
					 // $('.success_mesg').empty().append('tour successful create');
					$('#title').val("");
					$('.overview').val("");
					$('.hilight').val("");
					$('.why_this').val("");
					$('#location_id').val("");
					$('#duration').val("");
					$('#deparchture_point').val("");
					$('.deparchture_time').val("");
					$('#return_detail').val("");
					$('.inclusions').val("");
					$('.exclusions').val("");
					$('.voucher_info').val("");
					$('.local_operator_info').val("");

					}
				}
			});



           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_upload.php',
				data: {tour_id:tour_id,photo_title:photo_title,photo_url:photo_url,description:description},
				success: function(mesg) {
				  // alert(mesg);

				   if(mesg == 'upload tour successful'){
					$('.success_mesg').empty().append('<div style="margin-left: 244px;" class="col-md-6"><div class="alert alert-success"><strong>Well done!</strong> You successfully Tour successful create.</div></div>');
					$('#tour_id').val("");
					$('#photo_title').val("");
					$('#photo_url').val("");
					$('#description').val("");
					$('#upload_photo').val("");
					location.reload();
					}
				}
			});




           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_tour_price.php',
				data: {currency_id:currency_id,tour_id:tour_id,price_per_person:price_per_person,price_child:price_child,price_adult:price_adult},
				success: function(mesg) {
				  // alert(mesg);

				   if(mesg == 'price tour successful'){
					 // $('.success_mesg').empty().append('price successful create');
					$('#tour_id').val("");
					$('#currency_id').val("");
					$('#price_per_person').val("");
					$('#price_child').val("");
					$('#price_adult').val("");

					}
				}
			});
			
			}



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

										$result2 = mysql_query("SELECT
																supplier_payment.status,
																supplier_payment.exp_date
																FROM
																supplier_payment
																INNER JOIN supplier ON supplier.id = supplier_payment.supplier_id
																WHERE supplier_payment.supplier_id ='".$supplier_id."'
																");
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
				$current_date = date("m/d/Y", $today_date);
										
										//fetch tha data from the database
										while ($row2 = mysql_fetch_array($result2))
										{
											// $status =  $row2['status'];
											$exp_date =  $row2['exp_date'];
											// $status =  'paid';

										}
										
										if($exp_date==$current_date)
										{
											echo "<h2>your payment status shows unpaid now please pay to continue</h2><a href='http://apps.fountaintechies.com/tourbookings/supplier/membership.php'>Pay Now</a> ";
										}
										// else if($status=='active'){
										else {
			?>
			<input type="hidden" id="tour_id" value="<?php echo $tour_id_counter + 1 ; ?>" />
			





				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action=''>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tour Category</label>

							<div class="col-sm-5"><!---<option value="Uncategory">Uncategory</option>-->
								<select style="width: 60%;"  id="tour_type"  class="form-control">

									
									
									<option value="Outdoor Activities">Outdoor Activities</option>
									<option value="Tours & Sightseeing">Tours & Sightseeing</option>
									<option value="Cultural & Theme Tours">Cultural & Theme Tours</option>
									<option value="Day Trips & Excursions">Day Trips & Excursions </option>
									<option value="Theme Parks">Theme Parks</option>
									<option value="Sightseeing Tickets & Passes">Sightseeing Tickets & Passes</option>
									<option value="Transfers & Ground Transport">Transfers & Ground Transport</option>
									<option value="Food, Wine & Nightlife">Food, Wine & Nightlife</option>
									<option value="Private & Custom Tours">Private & Custom Tours</option>
									<option value="Shows, Concerts & Sports">Shows, Concerts & Sports</option>
									<option value="Walking & Biking Tours">Walking & Biking Tours</option>
									<option value="Water Sports">Water Sports</option>
									<option value="Cruises, Sailing & Water Tours">Cruises, Sailing & Water Tours</option>
									<option value="Multi-day & Extended Tours">Multi-day & Extended Tours</option>
									<option value="Shore Excursions">Shore Excursions</option>
			
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Title</label>

							<div class="col-sm-5">
								<input type="text" data-validate="required" data-message-required="This is  required field."  class="form-control" id="title" placeholder="Tour Title">
							</div>
						</div>

		<div class="form-group">
							<label class="col-sm-3 control-label">Select Tour Location</label>

							<div class="col-sm-5">
								<select style="width:45%" name="country" id="location_id"  class="form-control">
								
									<option value="">Select a country</option>
									<option value="5202">Antarctica</option>
									<option value="27">Antigua and Barbuda</option>
									<option value="78">Argentina</option>
									<option value="28">Aruba</option>
									<option value="22">Australia</option>
									<option value="44">Austria</option>
									<option value="29">Bahamas</option>
									<option value="30">Barbados</option>
									<option value="45">Belgium</option>
									<option value="746">Belize</option>
									<option value="966">Bermuda</option>
									<option value="79">Brazil</option>
									<option value="809">British Virgin Islands</option>
									<option value="12">Cambodia</option>
									<option value="75">Canada</option>
									<option value="31">Cayman Islands</option>
									<option value="80">Chile</option>
									<option value="13">China</option>
									<option value="4497">Colombia</option>
									<option value="747">Costa Rica</option>
									<option value="730">Croatia</option>
									<option value="725">Curacao</option>
									<option value="47">Cyprus</option>
									<option value="48">Czech Republic</option>
									<option value="49">Denmark</option>
									<option value="814">Dominica</option>
									<option value="32">Dominican Republic</option>
									<option value="727">Ecuador</option>
									<option value="722">Egypt</option>
									<option value="731">England</option>
									<option value="4146">Estonia</option>
									<option value="23">Fiji</option>
									<option value="50">Finland</option>
									<option value="51">France</option>
									<option value="5212">French Polynesia</option>
									<option value="52">Germany</option>
									<option value="53">Greece</option>
									<option value="967">Grenada</option>
									<option value="748">Guatemala</option>
									<option value="4131">Honduras</option>
									<option value="14">Hong Kong</option>
									<option value="54">Hungary</option>
									<option value="55">Iceland</option>
									<option value="723">India</option>
									<option value="15">Indonesia</option>
									<option value="56">Ireland</option>
									<option value="919">Israel</option>
									<option value="57">Italy</option>
									<option value="34">Jamaica</option>
									<option value="16">Japan</option>
									<option value="744">Jordan</option>
									<option value="801">Kenya</option>
									<option value="4214">Lebanon</option>
									<option value="58">Lithuania</option>
									<option value="17">Malaysia</option>
									<option value="4141">Malta</option>
									<option value="76">Mexico</option>
									<option value="948">Monaco</option>
									<option value="825">Morocco</option>
									<option value="5411">Myanmar</option>
									<option value="724">Nepal</option>
									<option value="60">Netherlands</option>
									<option value="24">New Zealand</option>
									<option value="4499">Nicaragua</option>
									<option value="61">Norway</option>
									<option value="745">Oman</option>
									<option value="749">Panama</option>
									<option value="927">Peru</option>
									<option value="4603">Philippines</option>
									<option value="62">Poland</option>
									<option value="63">Portugal</option>
									<option value="36">Puerto Rico</option>
									<option value="65">Russia</option>
									<option value="732">Scotland</option>
									<option value="18">Singapore</option>
									<option value="734">Slovenia</option>
									<option value="11">South Africa</option>
									<option value="972">South Korea</option>
									<option value="67">Spain</option>
									<option value="37">St Kitts and Nevis</option>
									<option value="38">St Lucia</option>
									<option value="728">St Maarten</option>
									<option value="68">Sweden</option>
									<option value="69">Switzerland</option>
									<option value="778">Taiwan</option>
									<option value="20">Thailand</option>
									<option value="39">Trinidad and Tobago</option>
									<option value="70">Turkey</option>
									<option value="963">Turks and Caicos</option>
									<option value="743">United Arab Emirates</option>
									<option value="4514">Uruguay</option>
									<option value="77">USA</option>
									<option value="40">US Virgin Islands</option>
									<option value="21">Vietnam</option>
									<option value="5157">Wales</option>
									<option value="779">Zambia</option>
									<option value="5308">Zimbabwe</option>


								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">City</label>

							<div class="col-sm-5">
								<input type="text" style="width:35%" class="form-control" id="city" placeholder="City">
							</div>
						</div>
						
				
						<div  class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Duration </label>

							<div class="col-sm-5">
								<span><input type="text" style="width:43%; clear:both; float:left;" class="form-control" id="duration" placeholder="Tour Duration in Days"> </span>
								
							</div>
							<div class="clear"></div>
							<div class="col-sm-5">
								<!--<select style="width: 23%;clear: both;float: right;position: absolute;margin-top: -38px;margin-left: 392px;" name="country" id="location_id"  class="form-control">
								
									<option value="">Days</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									
								</select>-->
							</div>
						</div>
						
						<!--<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Overview</label>

							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="overview" placeholder="Tour Overview"></textarea>
							</div>
						</div>-->
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Overview</label>

							<!--<div class="col-sm-5">
									<textarea style="width:600px;height:140px;visibility: visible!important;" id="editor1" class="overview" name="editor1" laceholder="Tour Overview" rows="10">
									</textarea>

							</div>-->
					
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 overview" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
		

						</div>
						

		
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Highlights</label>

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="hilight" placeholder="Tour Hilights"></textarea>
							</div>-->
								<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 hilight" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
		
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Speciality</label>

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="why_this" placeholder="Tour Speciality"></textarea>
							</div>-->
								<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 why_this" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button style="display:none;" type="button" id="create_tour" class="btn btn-default">Create Tour</button>

							</div>
						</div>
						<!--
						<hr />
							<div class="">
								<h5>Photo Upload</h5>
							</div>
						<hr />
						<div class="form-group" style="width: 362px;float: left;">
							<label for="field-1" class="col-sm-3 control-label">Photo Title</label>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="title" id="photo_title" placeholder="Title">
							</div>


						</div>

						<div  style="width: 532px;float: left;margin-left: -98px;"  class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Photo Description</label>

							<div class="col-sm-5">
								<textarea class="form-control autogrow" name="description" id="description" placeholder="Photo Description"></textarea>
							</div>
						</div>
						<div style="width: 452px;float: right;margin-top: -58px;margin-left: 142px;margin-right: -50px;" class="form-group">


						<div class="col-sm-5">
								<input type="file" name="photoimg" id="photoimg" />


								<span><input value="upload" id="photo_submit" style=" display:none;float: right;margin-right: -119px;margin-top: -57px;height: 52px;width: 112px;border: none;" type="button"/></span>

							</div>
						</div>
						<div id='preview'>
								</div>-->

<!--<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Title</th>
			<th>Discription</th>
			<th>image</th>
			<th>Delete / Edit</th>
		</tr>
	</thead>
	<tbody id="photo_detail">
<?php
			// $result = mysql_query("SELECT * FROM tour_photo");


		// while ($row = mysql_fetch_array($result))
		// {

	// echo'
		// <tr class="odd gradeX">
			// <td>'.$row['title'].'</td>
			// <td>'.$row['url'].'</td>
			// <td>'.$row['discription'].'</td>
			// <td>
				// <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
					// <i class="entypo-pencil"></i>
					// Edit
				// </a>

				// <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
					// <i class="entypo-cancel"></i>
					// Delete
				// </a>
			// </td>
		// </tr>
		// ';

		// }
	?>

	</tbody>

</table>-->
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
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

										}
										?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price/Adult</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_per_person" placeholder="Price Per Person">
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price/Child</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_child" placeholder="Price Child">
							</div>
						</div>
						<div style="display:none" class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price Adult</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_adult" placeholder="Price Adult">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button style="display:none;" type="button" id="tour_price" class="btn btn-default">Tour Price</button>

							</div>
						</div>

						<hr />
							<div class="">
								<h5>Schedule</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Departure Point</label>

							<div class="col-sm-5">
								<input type="text" class="form-control" id="deparchture_point" placeholder="Deparchture Point">
							</div>
						</div>
		<script>
		  $(function() {
			$('#defaultValueExample').timepicker({ 'scrollDefaultNow': true });
		  });
		</script>

		
						<div class="form-group">
							<label class="col-sm-3 control-label">Departure Time</label>

							<div class="col-sm-5">
							<input id="defaultValueExample" style="width: 6.5em;" type="text" class="form-control time deparchture_time" />
								<!--<select style="width: 35%;"  id="deparchture_time"  class="form-control">

									<option value="1 Hour">1 Hour</option>
									<option value="2 Hour">2 Hour</option>
									<option value="3 Hour">3 Hour</option>
									<option value="4 Hour">4 Hour</option>

								</select>-->
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Return Detail</label>

							<div class="col-sm-5">
								<input type="text"  class="form-control" id="return_detail" placeholder="Return Detail">
							</div>
						</div>


						<hr />
							<div class="">
								<h5> Additional info</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Inclusions</label>
<!--
							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="inclusions" placeholder="Inclusions"></textarea>
							</div>-->
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 inclusions" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Exclusions</label>
<!--
							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="exclusions" placeholder="Exclusions"></textarea>
							</div>-->
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 exclusions" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Voucher info</label>

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="voucher_info" placeholder="Voucher info"></textarea>
							</div>-->
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 voucher_info" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Local operator information</label>

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="local_operator_info" placeholder="Local operator information"></textarea>
							</div>-->
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 local_operator_info" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
							</div>
						</div>
						<span style="padding-left: 450px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 750px;margin-top: 10px;" type="button" value="submit" class="btn btn-info ok" />


				</form>
<?php 

}

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