<?php

session_start();
 include('../include/database/db.php'); 
 $supplier_id = $_SESSION['supplier_id'];
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
	<script type="text/javascript">
		$(document).ready(function(){
			
				$('.delete_tour_list').click(function(){
					// alert('ok');
				var tour_id = $( this ).attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_delete_booking.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							 // $('#photo_detail').append(mesg);

						}

				});

			});		

			$('.confirm').click(function(){
					// alert('ok');
				var tour_id = $( this ).attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_confirm_booking.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							 // $('#photo_detail').append(mesg);

						}

				});

			});	

			$('.cancel').click(function(){
					// alert('ok');
				var tour_id = $( this ).attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_cancel_booking.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							 // $('#photo_detail').append(mesg);

						}

				});

			});
			
			
		});
	</script>
	
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />


	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
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
				<a href="#"><i class="entypo-home"></i>Home</a>
			</li>
				<li class="active">
			
							<strong>Pending Booking</strong>
					</li>
					</ol>
			
<h2>Pending Booking</h2>

<br />
	<form  method="post" class="form-horizontal" enctype="multipart/form-data" action='tour_iamges_upload.php'>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Booking Id</th>
			<th>Booking Date</th>
			<th>Supplier ID</th>
			<th>User ID</th>
			<th>Trip title</th>
			<th>Duration[days]</th>
			<th>Start Date</th>
			<th>Supplier Status</th>
			<th>Action</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
	<?php
			// $result = mysql_query("SELECT * FROM booking WHERE status = 'pending'  ORDER BY id DESC");
			// $result = mysql_query("SELECT
									// booking.id,
									// booking.tour_id,
									// booking.user_id,
									// booking.start_date,
									// booking.status,
									// payment.total_price,
									// booking.supplier_id,
									// tour_price.price_per_person,
									// tour.title,
									// tour.overview,
									// tour.city as tour_city,
									// tour.location_id as tour_country,
									// supplier.first_name as supplier_first_name,
									// supplier.last_name as supplier_last_name,
									// supplier.company_name,
									// supplier.email as supplier_email,
									// supplier.city as supplier_city,
									// supplier.country as supplier_country,
									// user.first_name as user_first_name,
									// user.last_name as user_last_name,
									// user.country as user_country,
									// user.city as user_city,
									// user.email as user_email,
									// user.phone as user_phone,
									// user.address as user_address
									// FROM
									// booking
									// INNER JOIN tour ON tour.id = booking.tour_id
									// INNER JOIN booking ON booking.tour_id = traveler.tour_id
									// INNER JOIN tour_price ON tour_price.tour_id = tour.id
									// INNER JOIN user ON user.id = booking.user_id
									// INNER JOIN user ON user.id = traveler.user_id
									// INNER JOIN supplier ON supplier.id = booking.supplier_id
									// INNER JOIN payment ON payment.id = booking.payment_id
									// WHERE booking.status = 'pending'  ORDER BY booking.id DESC
									// ");	
			$result = mysql_query("SELECT
									booking.id,
									booking.tour_id,
									booking.user_id,
									booking.start_date,
									booking.status,
									payment.total_price,
									booking.supplier_id,
									tour_price.price_per_person,
									tour.title,
									tour.overview,
									tour.city AS tour_city,
									tour.location_id AS tour_country,
									supplier.first_name AS supplier_first_name,
									supplier.last_name AS supplier_last_name,
									supplier.company_name,
									supplier.email AS supplier_email,
									supplier.city AS supplier_city,
									supplier.country AS supplier_country,
									user.first_name AS user_first_name,
									user.last_name AS user_last_name,
									user.country AS user_country,
									user.city AS user_city,
									user.email AS user_email,
									user.phone AS user_phone,
									user.address AS user_address,
									traveler.last_name as traveler_last_name ,
									traveler.first_name as traveler_first_name
									FROM
									booking
									INNER JOIN tour ON tour.id = booking.tour_id
									INNER JOIN tour_price ON tour_price.tour_id = tour.id
									INNER JOIN user ON user.id = booking.user_id
									INNER JOIN supplier ON supplier.id = booking.supplier_id
									INNER JOIN payment ON payment.id = booking.payment_id
									INNER JOIN traveler ON user.id = traveler.user_id AND tour.id = traveler.tour_id
									ORDER BY booking.id DESC
									");
		
		//fetch tha data from the database 
		// $counter =1;
		while ($row = mysql_fetch_array($result)) 
		{ 
		
	echo'
		<tr class="odd gradeX">
			<td><a  style="" id="'.$row['id'].'" class="fancybox" href="#inline'.$row['id'].'">'.$row['id'].'</a></td>
			<td>'.$row['start_date'].'</td>
			<td>'.$row['supplier_id'].'</td>
			<td>'.$row['user_id'].'</td>
			<td>'.$row['title'].'</td>
			<td>2 Days</td>
			<td>'.$row['start_date'].'</td>
			
			<td>confirm</td>
			<td>
				<a  style="" id="'.$row['id'].'" class="confirm">
					Confirm
				</a>   /  
				<a style="color: red;" id="'.$row['id'].'" class="cancel">
					Cancel
				</a>
			</td>
			<td>				
				<a id="'.$row['id'].'" class="delete_tour_list">
					<i class="entypo-cancel"></i>
				
				</a>
			</td>
		</tr>
		';
		
		
	echo '<tr><td><div id="inline'.$row['id'].'" style="width:600px;display: none;">

			<h3 style="right: 2%;position: absolute;top: 0;">Total Price $'.$row['total_price'].'</h3>
			<h3>Booking Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Booking Id</th>
							<th>Booking Date</th>
							<th>Booking Status</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['start_date'].'</td>
							<td>'.$row['status'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
						<h3>Supplier Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Company</th>
							<th>Email</th>
							<th>City</th>
							<th>Country</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['supplier_id'].'</td>
							<td>'.$row['supplier_first_name'].'</td>
							<td>'.$row['supplier_last_name'].'</td>
							<td>'.$row['company_name'].'</td>
							<td>'.$row['supplier_email'].'</td>
							<td>'.$row['supplier_city'].'</td>
							<td>'.$row['supplier_country'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
				
						<h3>User Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Fisrt Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Contact Number</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['user_first_name'].'</td>
							<td>'.$row['user_last_name'].'</td>
							<td>'.$row['user_email'].'</td>
							<td>'.$row['user_address'].'</td>
							<td>'.$row['user_phone'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
						<h3>Traveller Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Fisrt Name</th>
							<th>Last Name</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['traveler_first_name'].'</td>
							<td>'.$row['traveler_last_name'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
						<h3>Tour Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Tour Title</th>
							<th>Price</th>
							<th>Description</th>
							<th>City</th>
							<th>Country</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['title'].'</td>
							<td>'.$row['price_per_person'].'</td>
							<td>'.$row['overview'].'</td>
							<td>'.$row['tour_city'].'</td>
							<td>'.$row['tour_country'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
	
		</div></td>
		</tr>';
		// $counter++;
		}
	?>
		

	</tbody>
	<tfoot>
		<tr>
			<th>Booking Id</th>
			<th>Booking Date</th>
			<th>Supplier ID</th>
			<th>User ID</th>
			<th>Trip title</th>
			<th>Duration[days]</th>
			<th>Start Date</th>
			<th>Supplier Status</th>
			<th>Action</th>
			<th>Delete</th>
		</tr>
	</tfoot>
</table>
</form>
<script type="text/javascript">
	// jQuery(document).ready(function($)
	// {
		// $("#table-1").dataTable({
			// "sPaginationType": "bootstrap",
			// "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			// "bStateSave": true
		// });
		
		// $(".dataTables_wrapper select").select2({
			// minimumResultsForSearch: -1
		// });
	// });
</script>

<br />

<!-- Footer -->
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

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="include/resource/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-10"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-11"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-12"></script>
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