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

	<script src="include/resource/js/jquery-1.10.2.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1387507125: Neon - Responsive Admin Template created by Laborator -->
		<script type="text/javascript">
		$(document).ready(function(){ 
			
				$('.delete_supplier').click(function(){
					
				var supplier_id = $( this ).parent().parent().attr('id');
// alert(user_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/delete_supplier_in_admin.php',
						data: {supplier_id:supplier_id},

						success: function(mesg) {
							alert(mesg);
							
							location.reload();

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
				<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
			</li>
				<li class="active">
			
							<strong>Supplier</strong>
					</li>
					</ol>
			
<h2>Supplier</h2>
<div style="float:right;margin-top: -28px;display:none;">
				<a href="view_supplier.php?delete_all='all'" class=" delete_user btn btn-danger btn-sm btn-icon icon-left">
					<i class="entypo-cancel"></i>
					Delete all
				</a>
</div>
<?php 
		if(isset($_REQUEST["del"])){ 
			echo "<h1 style='color:red;'>Record Deleted...</h1>";
		}
		// if(isset($_REQUEST["delete_all"])){ 
				// $sql3 = mysql_query("DELETE from supplier_2" );
				// if($sql3 )
				// {
					// echo "<h1 style='color:red;'>All Record Deleted...</h1>";
				// }
				// else
				// {
					// echo "<h1 style='color:red;'>Error All Record Not Deleted...</h1>";
				// }
			
		// }
		
		?>
<br />
 
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Supplier ID</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Company Name</th>
			<th>City</th>
			<th>Country</th>
			<th>Tours</th>
			<th>Bookings</th>
			<th>Delete</th>
		
		</tr>
	</thead>
	<tbody>
	<?php
		// <th>Earnings</th>
			// <th>Action</th>
			// $result = mysql_query("SELECT * FROM supplier");
			// $result = mysql_query("SELECT
									// tour.title,
									// supplier.id,
									// tour.tour_type,
									// tour.overview,
									// supplier.phone,
									// supplier.email,
									// supplier.company_name,
									// supplier.city,
									// supplier.country,
									// supplier.`status`,
									// supplier_payment.`status`,
									// supplier_payment.total_price
									// FROM
									// supplier
									// INNER JOIN tour ON supplier.id = tour.supplier_id
									// INNER JOIN supplier_payment ON supplier.id = supplier_payment.supplier_id
																		
									// ");
									
									// $result = mysql_query("SELECT
															// tour.title,
															// tour.tour_type,
															// tour.overview,
															// supplier.phone,
															// supplier.email,
															// supplier.company_name,
															// supplier.city,
															// supplier.id,
															// supplier.country,
															// supplier.`status`,
															// supplier_payment.`status`,
															// supplier_payment.total_price,
															// tour.id as tours_id,
															// supplier.first_name,
															// booking.supplier_id,
															// booking.user_id,
															// booking.tour_id,
															// booking.id as booking_id,
															// booking.start_date
															// FROM
															// supplier
															// INNER JOIN tour ON supplier.id = tour.supplier_id
															// INNER JOIN supplier_payment ON supplier.id = supplier_payment.supplier_id
															// INNER JOIN booking ON supplier.id = booking.supplier_id
															// GROUP BY supplier.id
																		
									// ");									
									$result = mysql_query("SELECT
															supplier.phone,
															supplier.email,
															supplier.company_name,
															supplier.city,
															supplier.id,
															supplier.country,
															supplier.`status`,
															supplier.first_name
															FROM
															supplier
															GROUP BY supplier.id
																		
									");
		
		//fetch tha data from the database 
		while ($row = mysql_fetch_array($result)) 
		{ 
		
	echo'
		<tr class="odd gradeX" id="'.$row['id'].'">
			<td>'.$row['id'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['phone'].'</td>
			<td>'.$row['company_name'].'</td>
			<td>'.$row['city'].'</td>
			<td>'.$row['country'].'</td>
			<td><a href="supplier_tours.php?supplier_id='.$row['id'].'">Tours</a></td>
			<td><a href="supplier_bookings.php?supplier_id='.$row['id'].'">Bookings</a></td>
			<td>
				<a href="#" class=" delete_supplier btn btn-danger btn-sm btn-icon icon-left">
					<i class="entypo-cancel"></i>
					Delete
				</a>
			</td>
			
			
		</tr>
		';
		// <td>'.$row['total_price'].'</td>
		// <td>
				 
				// <a href="delete_view_supplier.php?id='.$row['id'].'" class="btn btn-danger btn-sm btn-icon icon-left">
					// <i class="entypo-cancel"></i>
					// Delete
				// </a>
			// </td>
		}
	?>
		

	</tbody>
	<tfoot>
		<tr>
			<th>Supplier ID</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Company Name</th>
			<th>City</th>
			<th>Country</th>
			<th>Tours</th>
			<th>Bookings</th>
			<th>Delete</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
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