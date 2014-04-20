<?php
	session_start();
	include('../include/database/db.php');//database connection 
	if(isset($_SESSION['supplier_id']))
	{
		$supplier_id = $_SESSION['supplier_id'];
	}
	else 
	{
		header('Location: index.php');
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

				$('.transfer_account').click(function(){
					// alert('ok');
				// var tour_id = $( this ).attr('id');
				var supplier_id = '<?php echo $supplier_id ; ?>';
				var total_payment = $('.total_payment').text();

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_transfer_account.php',
						data: {supplier_id:supplier_id,total_payment:total_payment},

						success: function(mesg) {
							alert(mesg);
							 // $('#photo_detail').append(mesg);
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

							<strong> Account</strong>
					</li>
					<li class="active">

							<strong>My Transactions</strong>
					</li>
					</ol>

<h2>My Transactions</h2>

<br />
	<form  method="post" class="form-horizontal" enctype="multipart/form-data" action='tour_iamges_upload.php'>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Deposit (Dr)</th>
			<th>Paid(Cr)</th>
			<th>Description</th>
			<th>Date</th>
			<th>Balance</th>
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
									*
									from
									supplier_balance
									WHERE supplier_id = '".$supplier_id."' AND status ='accepted'
									ORDER BY id ASC
									");

			//fetch tha data from the database ORDER BY id DESC
			$counter =1;

			while ($row = mysql_fetch_array($result))
			{
				$sum += $row['total_price'];
				$description= $row['description'];
				if($row['amount_withdraw']=='0')
				{
					$amount_withdraw=" ";
				}
				else
				{
					$amount_withdraw =$row['amount_withdraw'];
				}
				if($row['amount_deposit']=='0')
				{
					$amount_deposit=" ";
				}
				else
				{
					$amount_deposit =$row['amount_deposit'];
				}

				echo'
					<tr >
						<td>'.$counter.'</td>

						<td>'.$amount_deposit.'</td>
						<td>'.$amount_withdraw.'</td>
						<td>'.$description.'</td>
						
						<td>'.$row['insert_date'].'</td>
						<td>'.$row['available_balance'].'</td>




					</tr>
					';
				$counter++;
			}
	?>


	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Deposit (Dr)</th>
			<th>Paid(Cr)</th>
			<th>Description</th>
			<th>Date</th>
			<th>Balance</th>
		</tr>
	</tfoot>
</table>
</form>
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

<br />
<br />
<br />
<br />
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