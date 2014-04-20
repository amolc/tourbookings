<?php
 include('../include/database/db.php'); 
 $tour_id = $_GET['tour_id'];
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
	<style>
		.preview
		{
		width:100px;
		border:solid 1px #dedede;
		padding:10px;
		}
		#preview
		{
		color:#cc0000;
		font-size:12px
		}
	</style>

	<script src="include/resource/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			
				$('.accept').click(function(){
					// alert('ok');
				var tour_id = $( this ).parent().parent().attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_accept.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);

						}

				});

			});		
			
				$('.decline').click(function(){
					
				var tour_id = $( this ).parent().parent().attr('id');
				$( this ).parent().parent().remove();
						// alert(tour_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_decline.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							
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
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
				<li class="active">
			
							<strong>Tour List</strong>
					</li>
					</ol>
			

<h5 style="float: right;"><a href="javascript:history.back(1)" style="padding:5px 15px; color:white; border-radius:2px; background-color: #fd8900;">Go Back</a></h>
<h2 style="width:85%; ">Tour List</h2>
<br />

	<form  method="post" class="form-horizontal" enctype="multipart/form-data" action=''>

	<?php
			// $result = mysql_query("SELECT tour.*, tour_photo.url  FROM tour
									// JOIN tour_photo
									// ON tour.id = tour_photo.tour_id
									// WHERE tour.title != ''");
									// echo mysql_error();
// $result = mysql_query("SELECT
						// tour.id,
						// tour.title,
						// tour.overview,
						// tour.hilight,
						// tour.why_this,
						// tour.location_id,
						// tour.duration,
						// tour_photo.url
						// FROM
						// tour
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id Where tour.status = 'pending'  GROUP BY tour.title");
						
// $result = mysql_query("SELECT
						// t.title,
						// t.url,
						// p.id,
						// p.title,
						// p.city,
						// p.`status`,
						// p.supplier_id,
						// p.overview,
						// p.hilight,
						// p.why_this,
						// p.duration
						// FROM tour p LEFT JOIN tour_photo t ON (
							// p.id = t.tour_id
						// )
						// WHERE p.id = '".$tour_id."'
						// GROUP BY p.id 
						// ");
						$result = mysql_query("SELECT
tour.tour_type,
tour.title,
tour.overview,
tour.hilight,
tour.why_this,
tour.location_id as tour_country,
tour.city as tour_city,
tour.duration,
tour.deparchture_point,
tour.deparchture_time,
tour.return_detail,
tour.inclusions,
tour.exclusions,
tour.voucher_info,
tour.local_operator_info,
tour.supplier_id,
tour.`status`,
tour.insert_date,
tour.update_date,
supplier.first_name,
supplier.last_name,
supplier.phone,
supplier.email,
supplier.`password`,
supplier.company_name,
supplier.web_address,
supplier.business_type,
supplier.street_address,
supplier.city as supplier_city,
supplier.state,
supplier.postcode,
supplier.country as supplier_country,
supplier.currency,
supplier.`language`,
supplier.year_founded,
supplier.staff,
supplier.office_timing,
supplier.emergency_no,
supplier.local_trip_date,
supplier.`status`,
tour_price.currency_id,
tour_price.tour_id,
tour_price.price_per_person,
tour_price.price_child,
tour_price.price_adult,
tour_price.insert_date,
tour_price.update_date
FROM
tour
INNER JOIN supplier ON supplier.id = tour.supplier_id
INNER JOIN tour_price ON tour.id = tour_price.tour_id
						WHERE tour.id = '".$tour_id."'
						GROUP BY tour.id 
						");

		//fetch tha data from the database 
		while ($row = mysql_fetch_array($result)) 
		{ 
		
	// echo'
		// <tr class="odd gradeX" id="'.$row['id'].'">
			// <td><a href="tour_detail.php?tour_id='.$row['id'].'">'.$row['title'].'</a></td>
			// <td>'.$row['overview'].'</td>
			// <td>'.$row['hilight'].'</td>
			// <td><img class="preview" src="../supplier/uploads/'.$row['url'].'"/></td>
			// <td>'.$row['why_this'].'</td>
			// <td>'.$row['duration'].'</td>
			// <td>'.$row['status'].'</td>
			// <td>
				// <a href="#" class="accept btn btn-default btn-sm btn-icon icon-left">
					// <i class="entypo-pencil"></i>
					// Accept
				// </a>
				
				// <a href="#" class="decline btn btn-danger btn-sm btn-icon icon-left">
					// <i class="entypo-cancel"></i>
					// Decline
				// </a>
			// </td>
		// </tr>
		// ';
		
	echo '
			<h3 style="float: right;display:none;">Total Price $'.$row['total_price'].'</h3>
			
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
							<td>'.$row['first_name'].'</td>
							<td>'.$row['last_name'].'</td>
							<td>'.$row['company_name'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['supplier_city'].'</td>
							<td>'.$row['supplier_country'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
				
						<h3>Tour Detail</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Tour Title</th>
							<th>Description</th>
							<th>City</th>
							<th>Country</th>
							<th>Duration</th>
							<th>Departure Time</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['title'].'</td>
							<td>'.$row['overview'].'</td>
							<td>'.$row['tour_city'].'</td>
							<td>'.$row['tour_country'].'</td>
							<td>'.$row['duration'].'</td>
							<td>'.$row['deparchture_time'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
				
				<h3>Price</h3>
			<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th>Price Adult</th>
							<th>Price Child</th>
						</tr>
					</thead>
						<tr>
							<td>'.$row['price_per_person'].'</td>
							<td>'.$row['price_child'].'</td>
						</tr>
					<tbody>
					
					</tbody>
				</table>
				
				';

		
		}
	?>
		

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