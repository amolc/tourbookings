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
/*
*
*@author:			raza<raza.malik@fountaintechies.com>
*@Date & Time:		1-Jan-2014 GM +5
*@Modified Date:	1-Jan-2014 GM +5
*/
				$('.accept').click(function(){
					// alert('ok');
				var tour_id = $( this ).parent().parent().attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_accept.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							location.reload();

						}

				});

			});		
			
				$('.decline').click(function(){
					
					$('#decline_popup_link').trigger('click');
					$('#send_mesg').click(function(){
					var reason_mesg = $('#reason_area').val();
					// alert($('#reason_area').val());
					// var tour_id = $( this ).parent().parent().attr('id');
					var supplier_id = $('.supplier_class' ).attr('data');
					
					//$( this ).parent().parent().remove();
							alert(supplier_id);
							$('.fancybox-close').trigger('click');
					$.ajax({
							type: 'post',
							url: 'ajax_request_function/ajax_decline.php',
							data: {tour_id:tour_id,reason_mesg:reason_mesg,supplier_id:supplier_id},

							success: function(mesg) {
								alert(mesg);
								
								location.reload();
								 
							}

					});
				});

			});
				$('.delete').click(function(){
					
				var tour_id = $( this ).parent().parent().attr('id');
				$( this ).parent().parent().remove();
						// alert(tour_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_delete.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);
							location.reload();
							
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
<a class="fancybox" id="decline_popup_link" style="display: none;" href="#decline_popup">click</a>

	<div id="decline_popup" style="width:600px;display: none;">
		<h2>Write Comments</h2>
		<textarea style="width: 100%;height: 150px;" name="" id="reason_area"></textarea> <br /><br /><br />
		<input type="button" id="send_mesg" value="Submit" />
		
	</div>
	<div id="cancel_popup" style="width:600px;display: none;">

	</div>
<div class="page-container">	
<?php include('include/side_menu/side_menu.php'); ?>
	<div class="main-content">
<?php include('include/header/header.php'); ?>

			<ol class="breadcrumb bc-3">
						<li>
				<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
			</li>
					<li class="active">
							<strong>Tour</strong>
					</li>
					<li class="active">
							<strong>Approve Tour</strong>
					</li>
					</ol>
			
<h2>Approve Tour</h2>
 
<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Title</th>
			<th>Tour Photo</th>
			<th>Duration</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Accept </th>
			<th>Decline</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
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
/*
*	Recent Tour in admin for approval
*@author:			raza<raza.malik@fountaintechies.com>
*@Date & Time:		1-Jan-2014 GM +5
*@Modified Date:	1-Jan-2014 GM +5
*/
$result = mysql_query("SELECT
						t.title,
						t.url,
						p.id,
						p.title,
						p.city,
						p.`status`,
						p.supplier_id,
						p.overview,
						p.hilight,
						p.why_this,
						p.duration
						FROM
						tour AS p
						LEFT JOIN tour_photo AS t ON (p.id = t.tour_id)
						INNER JOIN tour_price ON p.id = tour_price.tour_id
						WHERE p.`status` ='pending' AND tour_price.ishike ='1' 
						GROUP BY p.id
						");

		//fetch tha data from the database 
		while ($row = mysql_fetch_array($result)) 
		{ 
			if($row['url']==""){
				$no_pic = 'no_preview.png';
			}
			else {
				$no_pic = $row['url'];
			}
			echo'
				<tr class="odd gradeX supplier_class" id="'.$row['id'].'" data="'.$row['supplier_id'].'">
					<td><a href="tour_detail.php?tour_id='.$row['id'].'">'.$row['title'].'</a></td>
					<td><a href="tour_image_upload.php?tour_id='.$row['id'].'"><img class="preview" src="../supplier/uploads/'.$no_pic.'"/></a></td>
					<td>'.$row['duration'].'</td>
					<td>'.$row['status'].'</td>
					<td><a href="edit_tour.php?tour_id='.$row['id'].'" class="btn btn-default btn-sm btn-icon icon-left edit_tour_list">
							<i class="entypo-pencil"></i>
							Edit
						</a>
					</td>
					<td>
						<a href="#" style="padding-left: 10px;" class="accept btn btn-default btn-sm btn-icon icon-left">
							Accept
						</a>
					</td>
					<td>
						<a href="#" style="padding-left: 10px;" class="decline btn btn-danger btn-sm btn-icon icon-left">
							Decline
						</a>
					</td>
					<td>
						<a href="#" style="padding-left: 10px;" class="delete btn btn-danger btn-sm btn-icon icon-left">
							Delete
						</a>
					</td>
				</tr>
				';
		
		}
			//comment code of edit tour option 
			// <td><a href="edit_tour.php?tour_id='.$row['id'].'" class="btn btn-default btn-sm btn-icon icon-left edit_tour_list">
							// <i class="entypo-pencil"></i>
						
							// Edit
						// </a>
					// </td>
	?>
		

	</tbody>
	<tfoot>
		<tr>
			<th>Title</th>
			<th>Tour Photo</th>
			<th>Duration</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Accept </th>
			<th>Decline</th>
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