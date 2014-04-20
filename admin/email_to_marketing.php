<?php
 include('../include/database/db.php'); 
 
 if(isset($_POST['compagin'])){
 $ids = $_POST['ids'];
 $filter = $_POST['filter'];
 $sort_cat = $_POST['sort_cat'];
 $enter_date = date('m/d/Y H:i:s');
 $name = $sort_cat.".".$filter.".".$enter_date;
 //echo $filter;
 //echo "<br>qasim";
 if($ids != ""){
 $customer_id = implode(',',$ids);
 
 $compagin_query = "insert into compagin (customer_id,name,sorted_by,enter_date) values ('$customer_id','$name','$filter','$enter_date')";
 mysql_query($compagin_query) or die(mysql_error());
 
header("Location:email_to_marketing.php?saved=ok");
 
 }

 
 }
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>Tour bookings</title>

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
		<script type="text/javascript">
		$(document).ready(function(){
		
		$('.after_sort_show').hide();
			// $('.sort_by').change(function(){
					 
				// var field_name = $(this).val();
				//alert(field_name);

				// $.ajax({
						// type: 'post',
						// url: 'ajax_request_function/ajax_sort_Markeeting_listing.php',
						// data: {field_name:field_name},

						// success: function(mesg) {
							//alert(mesg);

						// }

				// });

			// });		
			
			$('#filter').keyup(function(){
					 
				var field_name = $('.sort_by').val();
				var filter = $('#filter').val();
				if (filter == ""){
						$('.after_sort_hide').show();					
						$('.after_sort_show').hide();
				}else{
				//alert(filter);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_sort_Markeeting_listing.php',
						data: {field_name:field_name,filter:filter},

						success: function(mesg) {
						$('.after_sort_hide').hide();
						$('.after_sort_show').empty().append(mesg);						
						$('.after_sort_show').show();
							//alert(mesg);

						}

				});
				}

			});		
			
			
			
			
				$('.edit').click(function(){
					// alert('ok');
				var tour_id = $( this ).parent().parent().attr('id');

				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_edit_marketing.php',
						data: {tour_id:tour_id},

						success: function(mesg) {
							alert(mesg);

						}

				});

			});		
			
				$('.delete').click(function(){
					
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
	
	
		<script type="text/javascript">
		$(document).ready(function(){
			/**
			* email system
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 1:28 PM GM+5
			*/
             // checks,un check all check boxes
			$("#checkAll").click(function () {
			$('input:checkbox').not(this).prop('checked', this.checked);
			});
			
			//$('#compagin').click(function(){
							 
				//var to = new Array();
				
				//$('input[name=email_checkbox]:checked').each(function() {
				//	to.push($(this).val());
			//	});
			
				// var to = $('#to').val();
				//var subject = $('#subject').val();
				//var message = $('#sample_wysiwyg').val();
				//alert(to);
				// alert(admin_pass);
				//$.ajax({
						//type: 'post',
						//url: 'ajax_request_function/ajax_send_email.php',
						//data: {to:to,subject:subject,message:message},
						
						//success: function(mesg) {
						// if(mesg == '1'){
							// window.location = "dashboard.php";
						// }else{
							// $('.message').empty().append('User Name & Password Wrong!');	
						// }
						
						//	alert(mesg);
						
						//}
				
				//});
			//});
		});

</script>
	
	
</head>
<body class="page-body">

<div class="page-container">	
	
<?php include('include/side_menu/side_menu.php'); ?>	
	<div class="main-content">
<?php include('include/header/header.php'); ?>
<hr />
<div class="mail-env">

	<!-- compose new email button -->
	<div class="mail-sidebar-row visible-xs">
		<a href="../../../neon-x/mailbox/compose/index.html" class="btn btn-success btn-icon btn-block">
							Leads Listing 

			
		</a>
	</div>
	
	
	<!-- Mail Body -->
	<div class="mail-body">
		<?php if(isset($_REQUEST["updated"])){
			echo "<h1>Record Updated</h1>";
		}
		if(isset($_REQUEST["saved"])){
			echo "<h1>Compagin Saved</h1>";
		}?>
		<form method="post" action=""> 
		<div class="mail-header">
			<!-- title -->
			<div class="mail-title">
				Leads Listing 
			</div>
			
			<!-- links -->
			<div class="mail-links">
			
						<div class="form-group">
							<label class="col-sm-3 control-label" style="width:74px;float:left;top: 8px;">Sort By</label>

							<div class="col-sm-5" style="width:40.667%; float:left;">
								<select  class="sort_by" name="sort_cat"  class="form-control" style="padding:6px 4px;">
									<?php	//$selected = ($row['id']==$tour_currency_id) ? ' selected="selected"' : ''; ?>
									<option  value="1"></option>
									<option value="name">Name</option>
									<option value="email">Email</option>
									<option value="city">City</option>
									<option value="country">Country</option>
									<option value="join_date">Joining Date</option>

								</select>
							</div>
				
							<input type="text" id="filter" name="filter"/>
							<button class="btn btn-success btn-icon" name="compagin" type="submit" id="compagin">Save To Compagin</button>
						<!--	<a id="compagin" class="btn btn-success btn-icon" style="float:left;">
								Save To Compagin
							</a>-->
						</div>
				
			</div>
		</div>
		
		<div class="after_sort_show"></div>
		 </form>      
		<div class="after_sort_hide">
					<table class="table table-bordered datatable" id="table-1">
						<thead>
							<tr>
							
							<!--	<th>
									<input type="checkbox" id="checkAll">
									
								</th> -->
								
							    <th>ID</th>
								<th>Name</th>								
								<th>Email</th>
								<th>Contact No</th>
								<th>Company Name</th>
								<th>Address</th>
								<th>City</th>							
								<th>Country</th>
								<th>Joining Date</th>
								<th>Edit/Delete</th>

							</tr>
						</thead>
						<tbody>
						<?php
								$result = mysql_query("SELECT * FROM marketing");
							
							//fetch tha data from the database 
							while ($row = mysql_fetch_array($result)) 
							{ 
							
						echo'
							<tr class="odd gradeX">
								
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>
								
								<td>'.$row['email'].'</td>
								<td>'.$row['contact_number'].'</td>
								<td>'.$row['company_name'].'</td>
								<td>'.$row['address'].'</td>
								<td>'.$row['city'].'</td>
								
								<td>'.$row['country'].'</td>
								<td>'.$row['join_date'].'</td>
								<td>
									<a href="edit_marketing.php?id='.$row['id'].'" class="edit btn btn-default btn-sm btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Edit
									</a>
									
									<a href="delete_marketing.php?id='.$row['id'].'" onclick="return confirm('."sure!!!".')" class="delete btn btn-danger btn-sm btn-icon icon-left">
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
		</div>

						<script type="text/javascript">
							jQuery(document).ready(function($)
							{
								 $("#checkAll").click(function () {
									 $('input:checkbox').not(this).prop('checked', this.checked);
								 });

							
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
									
		
	</div>
	
	<!-- Sidebar -->
	
</div>

<hr /><!-- Footer -->

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
		<script src="include/resource/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="include/resource/js/select2/select2.min.js" id="script-resource-9"></script>

	<link rel="stylesheet" href="include/resource/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-10"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-11"></script>
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