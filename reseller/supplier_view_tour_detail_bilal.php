<?php

session_start();
 include('../include/database/db.php'); 
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
else {
	header('Location: index.php');
}

 
 
 // $supplier_id = $_SESSION['supplier_id'];

	
$tour_id = $_GET['tour_id'];

$query = mysql_query("SELECT tour.id,
						tour_price.tour_id,
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
						tour_price.price_per_person,
						tour_price.price_child,
						tour_price.currency_id,
						tour_price.price_partner_adult,
						tour_price.price_partner_child,
						tour_photo.url
						FROM tour 
						INNER JOIN tour_price ON tour.id = tour_price.tour_id	
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id	
						where tour.id = '".$tour_id."'");
	while ($record = mysql_fetch_array($query))
		{
			$tour_id =  $record['id'];
			$tour_title =  $record['title'];
			// echo $tour_title;
			$tour_overview =  $record['overview'];
			$tour_hilight =  $record['hilight'];
			$tour_why_this =  $record['why_this'];
			$tour_location =  $record['location_id'];
			$tour_city =  $record['city'];
			
			$tour_duration =  $record['duration'];
			$tour_deparchture_point =  $record['deparchture_point'];
			$tour_deparchture_time =  $record['deparchture_time'];
			$tour_return_detail =  $record['return_detail'];
			$tour_inclusions =  $record['inclusions'];
			$tour_exclusions =  $record['exclusions'];
			$tour_voucher_info =  $record['voucher_info'];
			$tour_local_operator_info =  $record['local_operator_info'];
			
			$tour_currency_id =  $record['currency_id'];
			
			$tour_price_per_person =  $record['price_per_person'];
			$tour_price_partner =  $record['price_partner_adult'];
			$tour_price_partner_child =  $record['price_partner_child'];
			// echo $tour_price_per_person;
			$tour_price_child =  $record['price_child'];
			$tour_photo =  $record['url'];

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
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/

	// $('.edit_submit').click(function(){
			
		// alert('done');
		
		// var title = $('#title').val();
		// var overview = $('#overview').val();
		// var hilight =	$('#hilight').val();
		// var why_this =	$('#why_this').val();
		// var location_id =	$('#location_id').val();
		// var duration =	$('#duration').val();

		// var deparchture_point = $('#deparchture_point').val();
		// var deparchture_time = $('#deparchture_time').val();
		// var return_detail = $('#return_detail').val();
		// var inclusions = $('#inclusions').val();
		// var exclusions = $('#exclusions').val();
		// var voucher_info = $('#voucher_info').val();
		// var local_operator_info = $('#local_operator_info').val();
		// var supplier_id = '<?php echo $_SESSION['supplier_id']; ?>';
		// var tour_id = '<?php echo $_GET['tour_id']; ?>';
			// alert(tour_id);


           // $.ajax({
				// type:  'post',
				// url:  'ajax_request_function/ajax_edit_tour.php',
				// data: {tour_id:tour_id ,title:title,overview:overview,hilight:hilight,why_this:why_this,location_id:location_id,duration:duration,
						// deparchture_point:deparchture_point,deparchture_time:deparchture_time,return_detail:return_detail,inclusions:inclusions,
						// exclusions:exclusions,voucher_info:voucher_info,local_operator_info:local_operator_info,supplier_id:supplier_id
				// },
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
					// $('#deparchture_point').val("");
					// $('#deparchture_time').val("");
					// $('#return_detail').val("");
					// $('#inclusions').val("");
					// $('#exclusions').val("");
					// $('#voucher_info').val("");
					// $('#local_operator_info').val("");

					// }
				// }
			// });



		// var currency_id = $('#currency_id').val();

		// var price_per_person =	$('#price_per_person').val();
		// var price_child =	$('#price_child').val();

           // $.ajax({
				// type:  'post',
				// url:  'ajax_request_function/ajax_edit_tour_price.php',
				// data: {currency_id:currency_id,tour_id:tour_id,price_per_person:price_per_person,price_child:price_child},
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

	// $('#delete_pic').click(function(){
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



});
</script>
<script type="text/javascript">
$(document).ready(function(){


$('#deparchture_time option').val( '' );

// Using the text:

$('#deparchture_time option').filter(function() { 
    return ($(this).val() == '<?php echo $tour_deparchture_time;?>'); //To select Blue
}).prop('selected', true);


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
});

</script>




 <script type="text/javascript" src="../js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

  <script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="../js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="../js/jquery.easytabs.min.js" type="text/javascript"></script>
<style type="text/css">
.tour_detail_calendr > #ui-datepicker-div {
	top: 427px!important;
	left: 202px!important;
}

</style>
	<script type="text/javascript">
    $(document).ready( function() {
	$(".next").hide();
	
	$(".change").click(function(){
	var source = $(this).attr('src');
  $(".first_image").hide();
  $(".next_image").attr('src',source) ;
  $(".next").show();
});

      $('#tab-container').easytabs();
	  
	  $('#add_to_itinerary').click(function(){
		
			var adult = $('#adult').val();
			var child = $('#child').val();
			
			var curent_d = $('.ui-datepicker-today').children().text();
			var c = '<?php echo $current_date; ?>';
				var datepicker3 = $('#datepicker3').val();
				var datepicker4 = $('#datepicker4').val();
		if(datepicker3 > c || datepicker3 == c )	{
			
			
				if(datepicker3 == "" || datepicker4 == "") {
					alert('please select date');
					return false;
				}
				
				if(adult == "" || adult == "0") {
					alert('Number of Adults cannot be blank');
					return false;
					adult.focus();
				}
			
			}
			else {
			 alert('Please Select Current Date Or Next Date');
			 $('#datepicker3').val('');
			 return false ;
			}
			
			
			
	  });
	  
	  // $('#datepicker3').keyup(function() {
				  // alert('ss');
			   // if ($(this).val() === '<?php echo $current_date; ?>')
			   // {
				  // alert('Please Select Current Date Or Next Date');
			   // }    
			// }); 

			$('#adult').keyup(function() {
				  // alert('ss');
			   if ($(this).val() === '0')
			   {
				  $(this).val('1');
			   }    
			});
	   // var today = new Date();
    // var tomorrow = new Date();
    // tomorrow.setDate(today.getDate() + 1);

        // $("#minDate").datepicker({
            // showOn: "none",
            // minDate: tomorrow,
            // dateFormat: "DD dd-mm-yy",
            // onSelect: function(dateText) {
                // minDateChange;
            // },
            // inputOffsetX: 5,
        // });
	  
    });
    </script>
<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=784941191519375";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
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
					<strong> Tour Detail</strong>
				</li>
			</ol>

			<h2> Tour Detail</h2>
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
		<!--<form action="add_to_cart.php" method="post">-->
           	<div class="left_penal background fl">
                    	<div class="price_calender fl" style="height:160px;">
                          
                          <h1 style="font-size:30px;"><p style="font-size:30px; margin:0px;">Adult</p><?php echo"$". $tour_price_partner; ?></h1>
                          
                          <h1 style="border:none; margin-bottom:0px; padding-bottom:0px; font-size:30px;"><p style="font-size:30px; margin:0px;">Child</p><?php echo"$". $tour_price_partner_child; ?></h1>
                          <!--<a href="#">View price calendar</a>-->
                          <a href="low_price_guarantee.php"></a>

               	</div>
				<?php 
					echo '<form method="post" action="cart_update.php">';
					
					?>
                      <!--  <div class="select_travel_date fl tour_detail_calendr">
                        	<h2>Select Travel Date</h2>
							<div class="Departing_tour_detail">
								<label>Departing</label>
								<input type="text" class="mySelectCalendar" id="datepicker3" name="datepicker3" placeholder="mm/dd/yyyy"/>
							</div>
                            <a   style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
                    	</div>
                        <div class="select_travel_date fl">
                       	  <h2 class="mrgn_top">Enter Total Number of Travelers</h2>
                        <div class="Adult_tour_detail">
                            <label>Adult</label>
							<input type="text" name="adult" id="adult"/>
                        </div>
                        <div class="Child_tour_detail" >
                            <label>Child</label>
							<input type="text" name="child" id="child"/>
                        </div>


                        <a  style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
                        <div class="update_option mrgn_top fl">
						<input type="hidden" name="tour_id" value="<?php echo $_GET['tour_id'] ; ?>"/>
						<input type="hidden" name="tour_title" value="<?php echo $tour_title ; ?>" />
						<a href="#">
							<input class="submit_button" id="add_to_itinerary" type="submit" value="Add to my Itinerary"/>
						</a>
                            <p>Please note: After your purchase is
								confirmed we will email you a link to
								your voucher.
							</p>
                        </div>
                    	</div>-->
						
						<span style="width: 104px;float:right;line-height: 37px;font-weight: bold;
display: block;text-align: center;margin-left: 5px;margin-top: 20px;border-radius:3px;padding: 0px;
border: none;background: #323232;"><a style="color:#fff;" href="book_now.php?tour_id=<?php echo $tour_id;?>">Book now</a></span>

				<span style="width: 104px;float:right;line-height: 37px;font-weight: bold;display: block;border-radius:3px;
text-align: center;margin: 0px;margin-top: 20px;
padding: 0px;border: none;background: #fd8900;"><a style="color:#fff;" href="myshop_tours.php">Go Beck</a></span>

					<?php
					echo '<input type="hidden" name="product_code" value="'.$tour_id.'" />';
					echo '<input type="hidden" name="type" value="add" />';
					echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
					echo '</form>';
					?>
                    </div>
                    	<div class="right_penal fr">

                          <div class="picks_head fl">
                            <h2 ><?php echo $tour_title ; ?></h2>
                            <span></span>
							
                          </div>
						<div>
                          <div class="zoo_night fl">
						  <?php		$no_pic="";
								 if($tour_photo==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $tour_photo;
									  }
						  ?>
                          	<span class="fl first_image"><img src="uploads/<?php echo $no_pic; ?>" alt="" width="665" height="329"></span>
                          <span  class="fl next"><img class="next_image" src="" alt="" width="665" height="329"></span></div>
						  <div style="float:left;width:380px; height:89px; overflow-x: auto; white-space: nowrap; margin-bottom:20px;">
						  <?php
						  $img_query = "select url from tour_photo where tour_id = '$tour_id'";
						  $img_result = mysql_query($img_query) or die (mysql_error());
						  while($img_row = mysql_fetch_array($img_result)){$no_pic="";
								 if($img_row['url']==""){
									  $no_pic = 'no_preview.png';
									  }
									  else {
									  $no_pic = $img_row['url'];
									  }
						  ?>
						  <a class="change" src="supplier/uploads/<?php echo $no_pic; ?>" href="#"><img  class="preview change_image" src="uploads/<?php echo $no_pic; ?>" alt="" width="69" height="69"></a>
						  <?php
						  }
						  ?>
						</div>
						

                          	<div id="tab-container">
                              <ul class='etabs' style="margin:0px; float:left; width: 426px; padding: 0px;">
                                <li class='tab'><a href="#tabs1">Overview</a></li>
                                <li class='tab'><a href="#tabs2">Schedule</a></li>
                                <li class='tab'><a href="#tabs3">Additional Info</a></li>
                              </ul>
                              <div id="tabs1" class=" three_tabs fl">
                                <div class="overview fl">
                                	<p class="border-bottom">
										<?php echo $tour_overview ; ?>
									</p>
                                  <h1>Highlights</h1>
                                  <ul class="border-bottom">
                                    	
										<?php echo $tour_hilight ; ?>
                                    </ul>
                                  <h1>Why our travellers chose this tour</h1>
                                  <p> 
									<?php echo $tour_hilight ; ?>
								  </p>
                                </div>
                                <!-- content -->
                              </div>
                              <div id="tabs2" class=" three_tabs fl">
									  	 <div class="overview fl">
									<h1>Departure </h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_duration ; ?>
                                    </ul>
                                    <h1>Return </h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_return_detail ; ?>
                                    </ul>
                                   </div>

                                <!-- content -->
                              </div>
                              <div id="tabs3" class=" three_tabs fl">
                              	 <div class="overview fl">
									<h1>Inclusions</h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_inclusions ; ?>
                                    </ul>
                                    
                                   <h1>Exclusions</h1>
                                	<ul class="border-bottom">
                                    	
										<?php echo $tour_exclusions ; ?>
                                    </ul>
                                   
                                    </div>
								
                                <!-- content -->
                              </div>
                            </div>

                        </div>
                     
                </div>

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
    
    
    
	
	
	<script src="../js/js-index.js"></script>

    <!-- Custom functions -->
    <script src="../js/functions.js"></script>

    <!-- Picker UI-->
	<script src="../js/jquery-ui.js"></script>

	<!-- Easing -->
    <script src="../js/jquery.easing.js"></script>

    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="../js/jquery.themepunch.revolution.min.js"></script>

   <!-- Nicescroll  -->
	<script type="text/javascript" src="../js/jquery.nicescroll.min.js"></script>

    <!-- CarouFredSel -->
    <script type="text/javascript" src="../js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="//jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="//jquery.transit.min.js"></script>
	<script type="text/javascript" src="//jquery.ba-throttle-debounce.min.js"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='../jquery.customSelect.js'></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>


</body>
</html>