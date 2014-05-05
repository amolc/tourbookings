<?php

session_start();
 include('../include/database/db.php');
if(isset($_SESSION['supplier_id'])){
 $supplier_id = $_SESSION['supplier_id'];
}
else {
	header('Location: index.php');
}
$tour_id = $_GET['tour_id'];
$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/y", $today_date);
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

<link href="../css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="../css/example.css">
<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

  <script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="../js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="../js/jquery.easytabs.min.js" type="text/javascript"></script>
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
		if(datepicker3 > c)	{
			
			
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


	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();

	  $('#add_to_itinerary').click(function(){

			var adult = $('#adult').val();
			var child = $('#child').val();

			var curent_d = $('.ui-datepicker-today').children().text();
			var c = '<?php echo $current_date; ?>';
				var datepicker3 = $('#datepicker3').val();
				var datepicker4 = $('#datepicker4').val();
		if(datepicker3 > c)	{


				if(datepicker3 == "" || datepicker4 == "") {
					alert('please select date');
					return false;
				}

				if(adult == "" || adult == "0") {
					alert('please Enter');
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

#ui-datepicker-div {
top: 359px!important;
left: 496px!important;
}
.mySelectCalendar {
background-position: 99% 1px!important;
text-align: left!important;
}

</style>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	11 feb 2014 3:22 PM GM+5
			*@Modified:	12 feb 2014 11:05 PM GM+5
			*/

			// $('#no_of_adult').keyup(function() {
					// var value = $(this).val();
					// if(value >0) {
						// for (var i = 0; i < value; i++) {
							// $('#no_of_adult_parent').after('<div class="form-group" id="aa"><label for="field-1" class="col-sm-3 control-label">No of Adults </label><div class="col-sm-5"><input type="text"  style="width:43%;" class="form-control" name="adult[]" id=""  placeholder="Name of Adults" required></div></div>');
						// }

					// }
					// $('#aa').remove();
					// var val = $(this).val();
					// for (var x = 0; x < val; x++) {
						// var createInputTextBox = '<input type="textbox" />';
						// $('div#text').append(createInputTextBox);
						// $('#no_of_adult_parent').after('<div class="form-group" id="aa"><label for="field-1" class="col-sm-3 control-label">No of Adults </label><div class="col-sm-5"><input type="text"  style="width:43%;" class="form-control" name="txt" id=""  placeholder="Name of Adults" required></div></div>');
					// }
			// });
			// $('#no_of_child').keyup(function() {

					// var value = $(this).val();
					// if(value >0) {
						// for (var i = 0; i < value; i++) {
							// $('#no_of_child_parent').after('<div class="form-group" id=""><label for="field-1" class="col-sm-3 control-label">No of Childs </label><div class="col-sm-5"><input type="text"  style="width:43%;" class="form-control" name="child[]" id=""  placeholder="Name of Childs" required></div></div>');
						// }
					// }
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
					<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>My Cart</strong>
				</li>
			</ol>

			<h2>My Cart</h2>
				<div style="font-size: 20px;width: 100%;margin-bottom: 10px;height: 20px;display:none;">
					<p>Available Balance: </p>
				</div>
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

				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action='supplier_cart.php'>
						
						<div class="form-group">
							<h1 style="color: #fd8900;position: relative;left: 200px;font-weight: bold; width:800px;">Select Travel Date</h1>
						</div>
						<div  class="form-group">
							<label for="field-1" style="margin-left: 6px;" class="col-sm-3 control-label"><b>Travel Date</b></label>
						</div>
						<div class="form-group">
							<div style="left: 180px;" class="col-sm-5"> 
								<input type="text" class="mySelectCalendar form-control" style="width:43%;" id="datepicker3" name="datepicker3" placeholder=""/>
							</div>
						</div>
						<input type="hidden" name="tour_id" value="<?php echo $tour_id;?>" /> 
						<div class="form-group">
							<h1 style="color: #fd8900;position: relative;left: 198px;font-weight: bold; width:800px;">Enter Total Number of Travelers</h1>
						</div>
						
						<div  class="form-group" style="float:left;margin-left: 170px;" >
							<label for="field-1" style="left: 0px;float:left;" class="col-sm-3 control-label"><b>Adult</b></label>
						</div>
						<div  class="form-group" style="float:left; margin-left: 165px;">
							<label for="field-1" style="left: 11px;float:left;" class="col-sm-3 control-label"><b>Child</b></label>
						</div><br/>
						<br/>
							<div style=" margin-left:180px;margin-right: 183px;"  class="form-group">
								<input type="text" data-validate="number"  style="width:25%;clear:both;" class="form-control" name="no_of_adults" id="no_of_adult"  placeholder="No of Adults" required>
							</div>
						
						
							<div style=" margin-left: 403px;margin-top: -48px;float: left;"  class="form-group"> 
								<input type="text" data-validate="number"  style="clear:both;" class="form-control" name="no_of_childs" id="no_of_childs"  placeholder="No of Children" required>
							</div>
 
						<input type="hidden" name="tour_id" value="<?php echo $tour_id;?>" />
						<input style="background:#fd8900; height: 37px;margin-left: 180px;margin-top: 10px;width: 195px;" type="submit" name="submit" value="Add to my Itinerary" class="btn btn-info ok" />

						



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



    <!-- This page JS -->
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
	<script type="text/javascript" src=".../js/jquery.nicescroll.min.js"></script>

    <!-- CarouFredSel -->
    <script type="text/javascript" src="../js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="../js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="../js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ba-throttle-debounce.min.js"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='../js/jquery.customSelect.js'></script>
	<!--calender-->
	 <script type="text/javascript" src="../js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="../js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="../js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ba-throttle-debounce.min.js"></script>
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
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
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