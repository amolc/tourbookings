<?php
 include('../include/database/db.php');
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
width:150px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>

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
</script>

<script type="text/javascript">
$(document).ready(function(){

 $('#photo_submit').click(function(){
	// alert('ok');
		var tour_id = '<?php echo $_GET['tour_id']; ?>';
		// alert(tour_id);
		// var title = $( "#photo_title" ).val();

		$.ajax({
				type: 'post',
				url: 'ajax_request_function/ajax_photo_uploaded.php',
				data: {tour_id:tour_id},

				success: function(mesg) {
					// alert(mesg);
					 $('#photo_detail').empty().append(mesg);
					 // location.reload();
					 // photo_title,description,photoimg
					 $( "#photo_title" ).val('');
					 $( "#description" ).val('');
					 $( "#photoimg" ).val('');

				}

		});

	});
	
	$(document).delegate('.delete_pic', 'click', function(){
    // alert("hey!");
		var title = $( this ).parent().parent().attr('id');
		// alert(title);
		$(this).parent().parent().remove();
			$.ajax({
				type: 'post',
				url: 'ajax_request_function/ajax_delete_upload_pic.php',
				data: {title:title},

				success: function(mesg) {
					alert(mesg);
					 // $('#photo_detail').append(mesg);

				}

		});
		
		
});
	
		// $('.delete_pic').click(function(){
		// var title = $( "#title" ).val();
		// alert('ok');

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
					<strong>Create City</strong>
				</li>
			</ol>

			<h2>Create City</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					City Image Upload
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
				$tour_id = $_GET['tour_id'];
			?>
			

				<form  id="imageform" method="post" class="form-horizontal" enctype="multipart/form-data" action='upload.php'>
								<table class="table table-bordered datatable" id="table-1">
										<thead>
											<tr>
												<th>Photo Title</th>
												<th>Photo Description</th>
												<th>Select Image</th>
												<th>Upload / Preview Image</th>
											</tr>
										</thead>
										<tbody>
											


					<input type="hidden" id="tour_id" name="tour_id" value="<?php echo $tour_id ; ?>" />
					<td>
						<div class="form-group">
							<!--<label for="field-1" class="col-sm-3 control-label">Photo Title</label>-->

							<div class="col-sm-5">
								<input type="text" style="width: 180px;" class="form-control" name="title" id="photo_title" placeholder="Title">
							</div>


						</div>
					</td>
					<td>
						<div   class="form-group">
							<!--<label for="field-ta" class="col-sm-3 control-label">Photo Description</label>-->

							<div class="col-sm-5">
								<textarea style="width: 370px;" class="form-control autogrow" name="description" id="description" placeholder="Photo Description"></textarea>
							</div>
						</div>
					</td>
					<td>
						<div  class="form-group">


							<div class="col-sm-5">
								<input type="file" name="photoimg" id="photoimg" />
							</div>
						</div>
					</td>
					<td>
					<span><input value="upload" id="photo_submit" style="border: none;padding:10px;" type="button"/></span>

							
						
					</td>
						<!--<div id='preview'></div>-->
									</tbody>

								</table>
								
								<table class="table table-bordered datatable" id="table-1">
										<thead>
											<tr>
												<th>Title</th>
												<th>Description</th>
												<th>image</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody id="photo_detail"><!--apend-->
													<?php
												// $tour_id = $_GET['tour_id'];
												$sql = mysql_query('SELECT * FROM tour_photo where tour_id = "'.$tour_id.'"');
												while ($row = mysql_fetch_array($sql)) 
													{ 
													
												echo'
													<tr class="odd gradeX" id="'.$row['title'].'">
														<td>'.$row['title'].'</td>
														<td>'.$row['description'].'</td>
														<td><img src="uploads/'.$row['url'].'"  class="preview"></td>
														<td>
															<a href="#"  class="delete_pic btn btn-danger btn-sm btn-icon icon-left">
																<i class="entypo-cancel"></i>
																Delete
															</a>
														</td>
													</tr>
													';
													
													}
											?>
											

										</tbody>

									</table>
								

						<!--<span style="padding-left: 40px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 892px;margin-top: 10px;" type="button" value="submit" class="btn btn-info ok" />-->


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