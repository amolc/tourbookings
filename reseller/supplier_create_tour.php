<?php

	session_start();
	include('../include/database/db.php'); 
	if(isset($_SESSION['supplier_id'])){
		$supplier_id = $_SESSION['supplier_id'];
	}
	else {
		header('Location: index.php');
	}

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
	<!--<script type="text/javascript" src="timepicker/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="timepicker/jquery.timepicker.css" />-->
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


<script type="text/javascript">

	/**
			* tour
			*@author:	razamalik@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/
			$(document).ready(function() {
    $("#commission_box").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

</script>
	<script type="text/javascript">
	  // $(function() {
		// $('#defaultValueExample').timepicker({ 'scrollDefaultNow': true });
	  // });
            $(document).ready(function($) { 
            // STOCK OPTIONS
            $('input.maxtickets_enable_cb').change(function(){
            if ($(this).is(':checked'))
                $('#commission').show();
            else
                $('#commission').hide();
                    }).change();
            
            $("#tour_logo").change(function(){
                var tour_logo = $(this).val();
                $("#display_logo_name").html(tour_logo);
            })
                    
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
					<strong> Tour</strong>
				</li>
				
				<li class="active">
					<strong>Create Tour</strong>
				</li>
			</ol>

			<h2>Create Tour</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Overview
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

				$result = mysql_query("SELECT id FROM tour");

										//fetch tha data from the database
										while ($row = mysql_fetch_array($result))
										{
											$tour_id_counter =  $row['id'];

										}	

										$result2 = mysql_query("SELECT
																supplier_payment.status,
																supplier_payment.exp_date
																FROM
																supplier_payment
																INNER JOIN supplier ON supplier.id = supplier_payment.supplier_id
																WHERE supplier_payment.supplier_id ='".$supplier_id."'
																");
										$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
													$current_date = date("m/d/Y", $today_date);
										
										//fetch tha data from the database
										while ($row2 = mysql_fetch_array($result2))
										{
											// $status =  $row2['status'];
											$exp_date =  $row2['exp_date'];
											// $status =  'paid';

										}
										// $now = time();
										// $date = '2015/03/12'; #could be (almost) any string date

										// if (strtotime($exp_date) > $now) {
										if($exp_date < $current_date || $exp_date == $current_date)
										{
											// echo "<h2>Your payment status shows unpaid now please pay to continue</h2><a href='http://apps.fountaintechies.com/tourbookings/supplier/payment_booking.php'><button>Pay Now</button></a> ";
											echo "<h2 style='font-size:18px; margin-bottom:20px;'>Your payment status shows unpaid now please pay to continue</h2><a href='payment_booking.php'><button class='btn btn-default'>Pay Now</button></a> ";
										}
										// else if($status=='active'){
										else {
										// echo $exp_date ;
			?>
			
			
				<?php 
					if($_POST['submit'] == 'submit')
					{
						$tour_type = mysql_real_escape_string($_POST['tour_type']);
						$title = mysql_real_escape_string($_POST['title']);
						$overview = mysql_real_escape_string($_POST['overview']);
						$hilight = mysql_real_escape_string($_POST['hilight']);
						$why_this = mysql_real_escape_string($_POST['tour_speciality']);
						$country = mysql_real_escape_string($_POST['country']);
						$city = mysql_real_escape_string($_POST['city']);
						$duration = mysql_real_escape_string($_POST['duration']);

						$deparchture_point = mysql_real_escape_string($_POST['deparchture_point']);
						$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
						$return_detail = mysql_real_escape_string($_POST['return_detail']);
						$inclusions = mysql_real_escape_string($_POST['inclusions']);
						$exclusions = mysql_real_escape_string($_POST['exclusions']);
						$voucher_info = mysql_real_escape_string($_POST['voucher_info']);
						$local_operator_info = mysql_real_escape_string($_POST['local_operator_info']);
						// $supplier_id = mysql_real_escape_string($_POST['supplier_id']);
						$status = "pending";
                                                
						
									$currency_id = mysql_real_escape_string($_POST['currency_id']);
							// echo $currency_id;
							// $tour_id = mysql_real_escape_string($_POST['tour_id']);
							// $tour_id = $tour_id2 - 1;
							// $price_partner_adult = mysql_real_escape_string($_POST['price_partner_adult']);
							// $price_partner_child = mysql_real_escape_string($_POST['price_partner_child']);
							// $price_per_person = mysql_real_escape_string($_POST['price_per_person']);
							$price_per_person = mysql_real_escape_string($_POST['price_adult']);
							$price_child = mysql_real_escape_string($_POST['price_child']);
							
							$commission_rate = mysql_real_escape_string($_POST['commission']); 
							if($commission_rate=="")
							{
								$price_customer_adult = $price_per_person - ($price_per_person * (10 / 100));
								$price_customer_child = $price_child - ($price_child * (10 / 100));
							}
							else {
									$price_customer_adult = $price_per_person - ($price_per_person * ($commission_rate / 100));
									$price_customer_child = $price_child - ($price_child * ($commission_rate / 100));
							}
					
							$today_current_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$insert_date = date("Y-m-d", $today_current_date);
                                                        if(isset($_FILES['tour_logo'])){
                                                            $tour_logo = $_FILES['tour_logo']['name'];
                                                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                                                            $temp = explode(".", $tour_logo);
                                                            $extension = end($temp);
                                                            $upload_path = 'uploads/tour_logo/';

                                                            if((($_FILES['tour_logo']['type']=='image/gif')
                                                                || ($_FILES['tour_logo']['type'] == 'image/jpeg')
                                                                || ($_FILES['tour_logo']['type'] == 'image/jpg')
                                                                || ($_FILES['tour_logo']['type'] == 'image/pjpeg')
                                                                || ($_FILES['tour_logo']['type'] == 'image/x-png')
                                                                || ($_FILES['tour_logo']['type'] == 'image/png'))
                                                                && ($_FILES['tour_logo']['size'] < (1024*1024))
                                                                && in_array($extension, $allowedExts)
                                                            ){
                                                               if($_FILES['tour_logo']['error'] > 0){
                                                                   echo 'Error: '.$_FILES['tour_logo']['error'];
                                                               }
                                                               else{
                                                                    move_uploaded_file($_FILES['tour_logo']['tmp_name'] , $upload_path.$tour_logo);
                                                                    $upload_success = 1;
                                                                   
                                                                    $sql   = "insert into tour(tour_type,title,overview,hilight,why_this,location_id,city,duration,deparchture_point,deparchture_time,return_detail,inclusions,exclusions,voucher_info,local_operator_info,supplier_id,status,insert_date) values ('$tour_type','$title','$overview','$hilight','$why_this','$country','$city','$duration','$deparchture_point','$deparchture_time','$return_detail','$inclusions','$exclusions','$voucher_info','$local_operator_info','$supplier_id','pending','$insert_date')";
                                                                    $query = mysql_query($sql);
                                                                    if($query){
                                                                           // echo "create tour successful";
                                                                           // $tour_id_query = "SELECT * FROM tour ORDER BY id DESC LIMIT 1";
                                                                                   $result = mysql_query("SELECT id FROM tour ORDER BY id DESC LIMIT 1");
                                                                                   if (!$result) {
                                                                                           echo 'Could not run query: ' . mysql_error();
                                                                                           exit;
                                                                                   }
                                                                                   $row = mysql_fetch_row($result);

                                                                                   $tour_id = $row[0]; 
                                                                                   $sql2   = "insert into tour_price(currency_id,tour_id,price_per_person,price_child,price_adult,price_customer_adult,price_customer_child,ishike,commission_rate,insert_date) values ('$currency_id','$tour_id','$price_customer_adult','$price_customer_child','$price_adult','$price_per_person','$price_child','0','$commission_rate','$insert_date')";
                                                                                   $query2 = mysql_query($sql2);
                                                                                    if($query2){




                                                                                   $sql3 = "INSERT INTO tour_photo (tour_id,title,url,description) VALUES ('$tour_id','$title','$tour_logo','Lorem ipsum')";
                                                                                   $query3 = mysql_query($sql3);
                                                                                   if($query3 && $upload_success==1){
                                                                                       echo '<div style="margin-left: 244px;" class="col-md-6"><div class="alert alert-success"><strong>Well done!</strong> Your tour has been created successfully!</div>Click here to see<a style="font-size:20px;" href="show_tour.php"> Tour List</a></div>';
                                                                                   }
                                                                                   else{
                                                                                      echo 'Error there is something wrong.';
                                                                                   }

                                                                           } 
                                                                           else {
                                                                               echo "Error there is something wrong.";
                                                                           }



                                                                   }else {
                                                                           echo "Error there is something wrong.";
                                                                   } 
                                                               }
                                                            }
                                                            else{
                                                                echo "Invalid file. Must be jpg, jpeg, png, gif, and not more than 1MB.";
                                                            }
                                                        }
							
				

					}
					else {
					
					
				
				 
				
				?>
				
				<form   method="post" role="form" id="form1"   class="form-horizontal validate" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ;?>'>
						<input type="hidden" id="tour_id" value="<?php echo $tour_id_counter + 1 ; ?>" />
						<div class="form-group">
							<label class="col-sm-3 control-label">Tour Category</label>

							<div class="col-sm-5"><!---<option value="Uncategory">Uncategory</option>-->
								<select style="width: 60%;" name="tour_type"  id="tour_type"  class="form-control" required>

									
									<option value="">Select a Category</option>
									<option value="Outdoor Activities">Outdoor Activities</option>
									<option value="Tours & Sightseeing">Tours & Sightseeing</option>
									<option value="Cultural & Theme Tours">Cultural & Theme Tours</option>
									<option value="Day Trips & Excursions">Day Trips & Excursions </option>
									<option value="Theme Parks">Theme Parks</option>
									<option value="Sightseeing Tickets & Passes">Sightseeing Tickets & Passes</option>
									<option value="Transfers & Ground Transport">Transfers & Ground Transport</option>
									<option value="Food, Wine & Nightlife">Food, Wine & Nightlife</option>
									<option value="Private & Custom Tours">Private & Custom Tours</option>
									<option value="Shows, Concerts & Sports">Shows, Concerts & Sports</option>
									<option value="Walking & Biking Tours">Walking & Biking Tours</option>
									<option value="Water Sports">Water Sports</option>
									<option value="Cruises, Sailing & Water Tours">Cruises, Sailing & Water Tours</option>
									<option value="Multi-day & Extended Tours">Multi-day & Extended Tours</option>
									<option value="Shore Excursions">Shore Excursions</option>
			
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Title</label>

							<div class="col-sm-5">
								<input type="text" data-validate="required" data-message-required="This is  required field."  class="form-control" name="title" id="title" placeholder="Tour Title" required>
							</div>
						</div>

                                                <div  class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Logo </label>

							<div class="btn-upload btn-primary col-sm-5">
                                                            Browse<input type="file" name="tour_logo" id="tour_logo">
							</div>
                                                        <div id="display_logo_name"></div>
						</div>
                                                
                                                <div class="form-group">
							<label class="col-sm-3 control-label">Select Tour Location</label>

							<div class="col-sm-5">
								<select style="width:45%" name="country" id="location_id"  class="form-control" required>
								
									<option value="">Select a country</option>
									<!--<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Barbados">Barbados</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Brazil">Brazil</option>
									<option value="British Virgin Islands">British Virgin Islands</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Canada">Canada</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Colombia">Colombia</option>
									<option value="Costa Rica">Costa Rica</option> -->
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Barbados">Barbados</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Brazil">Brazil</option>
									<option value="British Virgin Islands">British Virgin Islands</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Canada">Canada</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Colombia">Colombia</option>
									<option value="Costa Rica">Costa Rica</option>
									
									<option value="Croatia">Croatia</option>
									<option value="Curacao">Curacao</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="England">England</option>
									<option value="Estonia">Estonia</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="Germany">Germany</option>
									<option value="Greece">Greece</option>
									<option value="Grenada">Grenada</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kenya">Kenya</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Malta">Malta</option>
									<option value="Mexico">Mexico</option>
									<option value="Monaco">Monaco</option>
									<option value="Morocco">Morocco</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Panama">Panama</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Russia">Russia</option>
									<option value="Scotland">Scotland</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovenia">Slovenia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Korea">South Korea</option>
									<option value="Spain">Spain</option>
									<option value="St Kitts and Nevis">St Kitts and Nevis</option>
									<option value="St Lucia">St Lucia</option>
									<option value="St Maarten">St Maarten</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Taiwan">Taiwan</option>
									<option value="Thailand">Thailand</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Turkey">Turkey</option>
									<option value="Turks and Caicos">Turks and Caicos</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="Uruguay">Uruguay</option>
									<option value="USA">USA</option>
									<option value="US Virgin Islands">US Virgin Islands</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Wales">Wales</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>


								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">City</label>

							<div class="col-sm-5">
								<input type="text" style="width:35%" class="form-control" name="city" id="city" placeholder="City" required>
							</div>
						</div>
						
				
						<div  class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Tour Duration </label>

							<div class="col-sm-5">
								<span><input type="text" style="width:43%; clear:both; float:left;" class="form-control" name="duration" id="duration" placeholder="" required> </span>
								
							</div>
							<div class="clear"></div>
						</div>
                                                
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Overview</label>
					
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 overview" name="overview" id="tour_overview" required></textarea>
							</div>
		
						</div>
						

		
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Tour Highlights</label>

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="hilight" placeholder="Tour Hilights"></textarea>
							</div>-->
								<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 hilight" name="hilight" id="tour_highlights" required></textarea>
							</div>
		
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Why Travelers Chose This Tour</label>

								<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 why_this" name="tour_speciality" id="sample_wysiwyg" required></textarea>
							</div>
						</div>


						<div style="clear: both;">&nbsp;</div>
						<hr style="width:100%"/>
							<div class="">
								<h5>Tour Price</h5>
							</div>
						<hr/>
						<br />

						
						<div class="form-group">
							<label class="col-sm-3 control-label">Select Currency</label>

							<div class="col-sm-5">
								<select style="width: 35%;"  name="currency" id="currency_id"  class="form-control" required>
									
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
							<label for="field-1" class="col-sm-3 control-label">Price/Adult</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" name="price_adult" id="price_per_person" placeholder="Price Per Person" required>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Price/Child</label>

							<div class="col-sm-5">
								<input type="text" style="width: 35%;" class="form-control" name="price_child" id="price_child" placeholder="Price Child" required>
							</div>
						</div>
						<div id="add_commission" style="margin-left: 2px;"  class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Commission</label>
						<input type="checkbox" class="maxtickets_enable_cb" name="opwp_wootickets">check box <br /> <br />
						
							<div id="commission" style="display:none;">
							<input type="text" style="float: left;margin-left: 252px;width: 15%;" class="form-control" name="commission" id="commission_box"  min="10" max="100"  placeholder=""><div style="float: left;padding-left: 12px;padding-top: 7px;">%</div>
							</div>
						
						</div> 


						<hr />
							<div class="">
								<h5>Schedule</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Departure Point</label>

							<div class="col-sm-5">
								<input type="text" class="form-control"  name="deparchture_point" id="deparchture_point" placeholder="Departure Point" required>
							</div>
						</div>
							

		
						<div class="form-group">
							<label class="col-sm-3 control-label">Departure Time</label>

							<div class="col-sm-5">
							<input id="defaultValueExample" style="width: 6.5em;" type="text" name="deparchture_time" class="form-control time deparchture_time" required/>
		
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Return Detail</label>

							<div class="col-sm-5">
								<input type="text"  class="form-control" name="return_detail" id="return_detail" placeholder="Return Detail" required>
							</div>
						</div>


						<hr />
							<div class="">
								<h5> Additional info</h5>
							</div>
						<hr />
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Inclusions</label>

							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 inclusions" name="inclusions" id="sample_wysiwyg"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Exclusions</label>
<!--
							<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="exclusions" placeholder="Exclusions"></textarea>
							</div>-->
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 exclusions" name="exclusions" id="sample_wysiwyg" required></textarea>
							</div>
						</div>
						<!--<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Voucher info</label>-->

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="voucher_info" placeholder="Voucher info"></textarea>
							</div>-->
							<!--<div class="form-group" style="width: 572px;margin-left: 272px;">
								<textarea style="width:600px;height:140px;" class="form-control wysihtml5 voucher_info" name="voucher_info" id="sample_wysiwyg" required></textarea>
							</div>
						</div>-->
						<!--=<div style="" class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Local operator information</label>-->

							<!--<div class="col-sm-5">
								<textarea style="width:600px;height:140px;" class="form-control autogrow" id="local_operator_info" placeholder="Local operator information"></textarea>
							</div>-->
							<!--<div class="form-group" style="width: 572px;margin-left: 272px;">-->
								<!--<textarea style="display:none;width:600px;height:140px;" class="form-control wysihtml5 local_operator_info" name="local_operator_info" id="sample_wysiwyg" required></textarea>-->
								<!--<div style="width: 100px;padding: 5px;float:left">Company</div>
								<div style="padding: 5px;float:left">Fountain Technologies </div>
								<div style="clear:both;"></div>
								<div style="width: 100px;padding: 5px;float:left">Address</div>
								<div style="padding: 5px;float:left">1 Raffles Place #44-02 One Raffles Place Tower One Singapore 048 616</div>
								<div style="clear:both;"></div>
								<div style="width: 100px;padding: 5px;float:left">Contact Number</div>	<div style="padding: 5px;float:left">+65 8606 5620</div>
								
								<div style="clear:both;"></div>
							</div>
						</div>-->
						<span style="padding-left: 450px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 750px;margin-top: 10px;" type="submit" name="submit" value="submit" class="btn btn-info ok" />


				</form>
<?php 
}
}

?>
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
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
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