<?php
 include('../include/database/db.php'); 
 ?>
 <?php
if(isset($_FILES['files'])){

	// $title = mysql_real_escape_string($_POST['title']);
// echo $_FILES['files'];
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 4097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $query="INSERT into tour_photo (title,url,description) VALUES('$file_name','$file_size','$file_type'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysql_query($query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
	
	header( 'Location: create_tour_2.php' ) ;
		// echo "Success";
		// exit();
	
// echo $select_currency_id;
// $sql = mysql_query('SELECT * FROM tour_photo where title = "'.$title.'"');
	// while ($row = mysql_fetch_array($sql)) 
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
		
		
	}
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
	<link rel="stylesheet" href="include/resource/css/easyWizardSteps.css"  id="style-resource-6">
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
						</style>

<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.uploadify.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	// $("#fileUpload").fileUpload({
		// 'uploader': 'uploadify/uploader.swf',
		// 'cancelImg': 'uploadify/cancel.png',
		// 'script': 'uploadify/upload.php',
		// 'folder': 'files',
		// 'multi': false,
		// 'displayData': 'speed'
	// });

	$("#fileUpload2").fileUpload({
		'uploader': 'uploadify/uploader.swf',
		'cancelImg': 'uploadify/cancel.png',
		'script': 'uploadify/upload.php',
		'folder': 'files',
		'multi': true,
		'buttonText': 'Select Files',
		'checkScript': 'uploadify/check.php',
		'displayData': 'speed',
		'simUploadLimit': 2
	});

	// $("#fileUpload3").fileUpload({
		// 'uploader': 'uploadify/uploader.swf',
		// 'cancelImg': 'uploadify/cancel.png',
		// 'script': 'uploadify/upload.php',
		// 'folder': 'files',
		// 'fileDesc': 'Image Files',
		// 'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
		// 'multi': true,
		// 'auto': true
	// });
});

</script>
	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
	<script src="include/resource/js/jquery.easyWizard.js"></script>

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
		// var title = $('#title').val();
		// var overview = $('#overview').val();
		// var hilight =	$('#hilight').val();
		// var why_this =	$('#why_this').val();
		// var location_id =	$('#location_id').val();
		// var duration =	$('#duration').val();

           // $.ajax({
				// type:  'post',
				// url:  'ajax_create_tour.php',
				// data: {title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,duration:duration},
				// success: function(mesg) {
				  // alert(mesg);

				   // if(mesg == 'create tour successful'){
					 // $('.success_mesg').empty().append('tour successful create');
					// $('#title').val("");
					// $('#overview').val("");
					// $('#hilight').val("");
					// $('#why_this').val("");
					// $('#location_id').val("");
					// $('#duration').val("");

					// }
				// }
			// });

	// });
	
		/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	3 january 2014 5:33 PM GM+5
			*/

	// $('#upload_photo').click(function(){

	// alert('ok');
	
		// var tour_id = $('#tour_id').val();
		// var photo_title = $('#photo_title').val();
		// var photo_url = $('#photo_url').val();
		// var description =	$('#description').val();

           // $.ajax({
				// type:  'post',
				// url:  'ajax_upload.php',
				// data: {tour_id:tour_id,photo_title:photo_title,photo_url:photo_url,description:description},
				// success: function(mesg) {
				  // alert(mesg);

				   // if(mesg == 'upload tour successful'){
					 // $('.success_mesg').empty().append('upload successful create');
					// $('#tour_id').val("");
					// $('#photo_title').val("");
					// $('#photo_url').val("");
					// $('#description').val("");
					// $('#upload_photo').val("");
					// }
				// }
			// });

	// });
	
		/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	3 january 2014 5:33  PM GM+5
			*/

	// $('#tour_price').click(function(){

	// alert('ok2');
		// var currency_id = $('#currency_id').val();
		// var tour_id = '1';
		// var price_per_person =	$('#price_per_person').val();
		// var price_child =	$('#price_child').val();
		// var price_adult =	$('#price_adult').val();

           // $.ajax({
				// type:  'post',
				// url:  'ajax_tour_price.php',
				// data: {currency_id:currency_id,tour_id:tour_id,price_per_person:price_per_person,price_child:price_child,price_adult:price_adult},
				// success: function(mesg) {
				  // alert(mesg);

				   // if(mesg == 'price tour successful'){
					 // $('.success_mesg').empty().append('price successful create');
					// $('#tour_id').val("");
					// $('#currency_id').val("");
					// $('#price_per_person').val("");
					// $('#price_child').val("");
					// $('#price_adult').val("");

					// }
				// }
			// });

	// });
	
	
	$('.ok').click(function(){
			
				var title = $('#title').val();
		var overview = $('#overview').val();
		var hilight =	$('#hilight').val();
		var why_this =	$('#why_this').val();
		var location_id =	$('#location_id').val();
		var duration =	$('#duration').val();

           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_create_tour.php',
				data: {title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,duration:duration},
				success: function(mesg) {
				  alert(mesg);

				   if(mesg == 'create tour successful'){
					 $('.success_mesg').empty().append('tour successful create');
					$('#title').val("");
					$('#overview').val("");
					$('#hilight').val("");
					$('#why_this').val("");
					$('#location_id').val("");
					$('#duration').val("");

					}
				}
			});
			
			
			var tour_id = $('#tour_id').val();
		var photo_title = $('#photo_title').val();
		var photo_url = $('#photo_url').val();
		var description =	$('#description').val();

           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_upload.php',
				data: {tour_id:tour_id,photo_title:photo_title,photo_url:photo_url,description:description},
				success: function(mesg) {
				  // alert(mesg);

				   if(mesg == 'upload tour successful'){
					 // $('.success_mesg').empty().append('Tour successful create');
					$('#tour_id').val("");
					$('#photo_title').val("");
					$('#photo_url').val("");
					$('#description').val("");
					$('#upload_photo').val("");
					}
				}
			});
			
			
			
			
					var currency_id = $('#currency_id').val();
		var tour_id1 = '1';
		var price_per_person =	$('#price_per_person').val();
		var price_child =	$('#price_child').val();
		var price_adult =	$('#price_adult').val();

           $.ajax({
				type:  'post',
				url:  'ajax_request_function/ajax_tour_price.php',
				data: {currency_id:currency_id,tour_id:tour_id1,price_per_person:price_per_person,price_child:price_child,price_adult:price_adult},
				success: function(mesg) {
				  // alert(mesg);

				   if(mesg == 'price tour successful'){
					 $('.success_mesg').empty().append('price successful create');
					$('#tour_id').val("");
					$('#currency_id').val("");
					$('#price_per_person').val("");
					$('#price_child').val("");
					$('#price_adult').val("");

					}
				}
			});
			
			
	
	});
	
	
		// $('#currency_id').change(function(){

		// var select_currency_id = $( "#currency_id option:selected" ).val();
	// alert(select_currency_id);
		// $.ajax({
				// type: 'post',
				// url: 'ajax_request_function/ajax_price_on_currency.php',
				// data: {select_currency_id:select_currency_id},

				// success: function(mesg) {
					// alert(mesg);
					 
					// var splitRowObject = mesg.split(',');
					// if(splitRowObject.length > 0)

					 // $('#price_per_person').val(splitRowObject[0]);
					// $('#price_child').val(splitRowObject[1]);
					// $('#price_adult').val(splitRowObject[2]);

				// }

		// });

	// });	
	


		var title = $( "#title ).val();
	// alert(select_currency_id);
		$.ajax({
				type: 'post',
				url: 'ajax_request_function/ajax_photo_uploaded.php',
				data: {title:title},

				success: function(mesg) {
					alert(mesg);
					 $('#photo_detail').append(mesg);
					// var splitRowObject = mesg.split(',');
					// if(splitRowObject.length > 0)

					 // $('#price_per_person').val(splitRowObject[0]);
					// $('#price_child').val(splitRowObject[1]);
					// $('#price_adult').val(splitRowObject[2]);

				}

		});

	
	

});
</script>

</head>

<script type="text/javascript">
$(document).ready(function(){
// alert('ok');

	$('#myWizard').easyWizard({
		buttonsClass: 'btn',
		submitButtonClass: 'btn btn-info',
		before: function(wizardObj, currentStepObj, nextStepObj) {
			// alert('Hello, I\'am the before callback');
		},
		after: function(wizardObj, prevStepObj, currentStepObj) {
			// alert('Hello, I\'am the after callback');
		},
		beforeSubmit: function(wizardObj) {
			// alert('Hello, I\'am the beforeSubmit callback');
			
	
			
			
		}
	});
});

</script>

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
					<strong>Create Tour's</strong>
				</li>
			</ol>

			<h2>Create Tour's</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Create Tour's
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
									// $tour_id = mysql_query("SELECT id FROM tour");
									// $num = mysql_fetch_array($tour_id);
									// $count = $num["id"];
									// echo$count;

								?>
			
				<!--<form role="form" class="form-horizontal form-groups-bordered">

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Title</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Overview</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="overview" placeholder="Overview">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Hilight</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="hilight" placeholder="Hilight">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Why This</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="why_this" placeholder="Why This">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Location Id</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="location_id" placeholder="Location Id">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Duration</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="duration" placeholder="Duration">
						</div>
					</div>



					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="create_tour" class="btn btn-default">Create Tour</button>
							<span style="padding-left: 40px;font-size: 14px;" class="success_mesg"></span>
						</div>
					</div>
				</form>-->

				<form id="myWizard" method="POST" action="" class="form-horizontal" enctype="multipart/form-data">				
		<section class="step" data-step-title="Tour's Photo">
						<div class="form-group" style="width: 362px;float: left;">
							<label for="field-1" class="col-sm-3 control-label">Photo Title</label>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="title" id="photo_title" placeholder="Title">
							</div>
							
							
						</div>
						<!--<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Photo Upload</label>

							<div class="col-sm-5">
								<input type="file" class="form-control" id="photo_url" placeholder="">
							</div>
						</div>-->
						
						<div  style="width: 532px;float: left;margin-left: -98px;"  class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Photo Description</label>
							
							<div class="col-sm-5">
								<textarea class="form-control autogrow" id="description" placeholder="Photo Description"></textarea>
							</div>
						</div>
						<div style="width: 452px;float: right;margin-top: -58px;margin-left: 142px;margin-right: -50px;" class="form-group">
							<!--<label for="field-1" class="col-sm-3 control-label">Photo Upload</label>-->
    
							<div class="col-sm-5">
								<div class="upload"><input type="file" name="files[]"/></div>
								<span><input id="photo_submit" style="float: right;margin-right: -119px;margin-top: -57px;height: 52px;width: 112px;border: none;" type="submit"/></span>
								
								
								
										<!--<div id="fileUpload2">You have a problem with your javascript</div>
										<a href="javascript:$('#fileUpload2').fileUploadStart()">Start Upload</a> |  <a href="javascript:$('#fileUpload2').fileUploadClearQueue()">Clear Queue</a>
										-->

							</div>
						</div>	


						<!--<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button style="display:none;" type="button" id="upload_photo" class="btn btn-default">upload Photo</button>
								<span style="padding-left: 40px;font-size: 14px;" class="success_mesg"></span>
							</div>
						</div>-->
						<table class="table table-bordered datatable" id="table-1">
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

</table>

					</section>
					<section class="step" data-step-title="Tour's Price">
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
							<label for="field-1" class="col-sm-3 control-label">Price Per Person</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_per_person" placeholder="Price Per Person">
							</div>
						</div>			
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price Child</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_child" placeholder="Price Child">
							</div>
						</div>		
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price Adult</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" id="price_adult" placeholder="Price Adult">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button style="display:none;" type="button" id="tour_price" class="btn btn-default">Tour Price</button>
								<span style="padding-left: 40px;font-size: 14px;" class="success_mesg"></span>
							</div>
						</div>
						
						<input style="position: absolute;margin-left: 892px;margin-top: 10px;" type="button" value="submit" class="btn btn-info ok" />
					</section>
					
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