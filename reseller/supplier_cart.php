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

	<!--<link rel="stylesheet" href="include/resource/css/easyWizardSteps.css"  id="style-resource-6">-->

<link href="../css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="../css/example.css">
<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->
    <script type="text/javascript" src="../js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

  <script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="../js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="../js/jquery.easytabs.min.js" type="text/javascript"></script>

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

			// $('#adult').keyup(function() {
				  // alert('ss');
			   // if ($(this).val() === '0')
			   // {
				  // $(this).val('1');
			   // }
			// });
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


				<?php
					if($_POST['submit'] == 'submit')
					{
					    //$adults = implode(',', $_POST['adult']);
						//$childs = implode(',' ,$_POST['child']);
 
						//start data for supplier booking
						$start_date = $_POST['depart_date'];
						$end_date = $_POST['depart_date']; 
						$status = 'pending';
						$tour_id = $_POST['tour_id'];
						$no_of_adults = mysql_real_escape_string($_POST['no_of_adults']);
						$no_of_childs = mysql_real_escape_string($_POST['no_of_childs']);
						$adult_price = mysql_real_escape_string($_POST['adult_price']);
						$child_price = mysql_real_escape_string($_POST['child_price']);
						$booking_ammount = ($no_of_adults * $adult_price) + ($no_of_childs * $child_price);
						$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
						$current_date = date("m/d/Y", $today_date);
						$currency = 0;
						$traveller_id = 0;
						//saving supplier booking
						$booking_query = "insert into Supplier_Booking(tour_id,partner_supplier_id,supplier_id,currency_id,amount,traveller_id,status,start_date,end_date,insert_date)
						 values('$tour_id','$supplier_id','$supplier_id','$currency','$booking_ammount','$traveller_id','$status','$start_date','$end_date','$current_date')";
						mysql_query($booking_query) or die (mysql_error());
						$last_id = mysql_insert_id();
						//end data for supplier booking

                        //start data for traveller
						$adults = $_POST['adult_name'];
						$childs = $_POST['child_name'];
						$customer_email = $_POST['customer_email'];
						$user_id = 0;
						$booking_id = $last_id ;
						$last_name = 'null';
						$sex = 'null';
						$age = 'null';
						$proof_id = 0;
						//saving traveller

						//saving adults start
						foreach ($adults as $adult){
							$traveller_query = "insert into traveler(user_id,supplier_id,tour_id,supplier_booking_id,first_name,last_name,adult_child_status,sex,age,proof_id)
							values('$user_id','$supplier_id','$tour_id','$booking_id','$adult','$last_name','adult','$sex','$age','$proof_id')";
							mysql_query($traveller_query) or die (mysql_error());
                        }
						//saving adult end

						//saving child start
						foreach ($childs as $child){
							$traveller_query1 = "insert into traveler (user_id,supplier_id,tour_id,supplier_booking_id,first_name,last_name,adult_child_status,sex,age,proof_id)
							values
							('$user_id','$supplier_id','$tour_id','$booking_id','$child','$last_name','child','$sex','$age','$proof_id')";
							mysql_query($traveller_query1) or die (mysql_error());
                        }
						//saving child end

						//end data for traveller

						//start supplier balance data
						$balance_query = mysql_query("SELECT
									available_balance
									FROM
									supplier_balance
									WHERE  supplier_id = '".$supplier_id."'
									");

									while ($balance_query_row = mysql_fetch_array($balance_query))
									{
										$supplier_balance = $balance_query_row['available_balance'];

									}


					    // $supplier_balance = $balance_result ['available_balance'];
						// echo $supplier_balance;
						$available_balance = $supplier_balance - $booking_ammount;
						// echo $available_balance ;
						// exit;
						$aacount_id = 0;
						$amount_deposit = 0;
						$type = 'booking';
						$description = 'booking';
						$amonut_withdraw = $booking_ammount;


						$query = "insert into supplier_balance (supplier_id,account_id,available_balance,amount_deposit,type,currency,description,amount_withdraw,status,insert_date,update_date)
						values
						('$supplier_id','$aacount_id','$available_balance','$amount_deposit','$type','$currency','$description','$amonut_withdraw','accepted','$current_date','')";
					     mysql_query($query) or die (mysql_error());
						//end supplier balance data
						
// $booking_id =37;
$result_voucher = mysql_query("SELECT
									tour_price.currency_id,
									tour_price.price_per_person,
									tour_price.price_child,
									tour_price.price_adult,
									tour_price.price_customer_adult,
									tour_price.price_customer_child,
									tour_price.price_partner_adult,
									tour_price.price_partner_child,
									supplier.phone,
									supplier.first_name as supplier_f_name,
									supplier.last_name  as supplier_l_name,
									supplier.email,
									supplier.company_name,
									supplier.web_address,
									supplier.business_type,
									supplier.street_address,
									supplier.city,
									supplier.state,
									supplier.postcode,
									supplier.country,
									supplier.currency,
									supplier.year_founded,
									supplier.staff,
									supplier.office_timing,
									supplier.emergency_no,
									supplier.local_trip_date,
									traveler.user_id,
									traveler.supplier_id,
									traveler.supplier_booking_id,
									traveler.first_name,
									traveler.last_name,
									traveler.adult_child_status,
									traveler.sex,
									traveler.age,
									traveler.proof_id,
									Supplier_Booking.id,
									Supplier_Booking.partner_supplier_id,
									Supplier_Booking.supplier_id,
									Supplier_Booking.currency_id,
									Supplier_Booking.amount,
									Supplier_Booking.traveller_id,
									Supplier_Booking.status,
									Supplier_Booking.start_date,
									Supplier_Booking.end_date,
									Supplier_Booking.insert_date,
									tour.tour_type,
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
									COUNT(traveler.booking_id) as total_count
									FROM
									Supplier_Booking
									INNER JOIN supplier ON supplier.id = Supplier_Booking.supplier_id
									INNER JOIN traveler ON supplier.id = traveler.supplier_id
									INNER JOIN tour ON tour.id = Supplier_Booking.tour_id AND tour.id = traveler.tour_id
									INNER JOIN tour_price ON tour.id = tour_price.tour_id
									WHERE Supplier_Booking.id = '".$booking_id."' AND  Supplier_Booking.supplier_id ='".$supplier_id."'
									
									ORDER BY Supplier_Booking.id DESC
									");
						$adult_voucher ="";
						$child_voucher ="";
		while ($row_voucher = mysql_fetch_array($result_voucher))
		{
		
		       $adult_result = mysql_query("select * from traveler where supplier_booking_id = '".$booking_id."' AND supplier_id ='".$supplier_id."' AND adult_child_status='adult'");
			   while ($adult_row = mysql_fetch_array($adult_result)) {
				
						$adult_voucher .= '
										<table width="650" height="317" border="1">
										  <tr style="background-color:#FD8900;height: 60px;width:200px;">
											<td style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</td>
											<td colspan="2" style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
										  </tr>
										  <tr>
											<td style="height: 60px;line-height:80px;" colspan="3">
												&nbsp;&nbsp;
													<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Tour Title: </strong>
													'.$row_voucher['title'].'
											</td>
										  </tr>
										  <tr>
											<td style="height: 60px;line-height:80px;">
											&nbsp;&nbsp;
												<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Booking Date:</strong>
												'.$row_voucher['start_date'].'
												
											</td>
											 <td style="height: 60px;line-height:80px;" colspan="2">
												&nbsp;&nbsp;
													<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Adult Name:</strong>
													'.$adult_row['first_name'].'
												
											</td>
										  </tr>
										  <tr>
											<td colspan="3">
												 <p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; padding:20px 30px 20px 130px; margin:0px;">
												Please hand this voucher to our representative at the start of your tour.
												our representative will meet you in the immigration hall of airport, holding.<br> 
												<br>
													 Travel Supplier Details   <br />

								<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Supplier Name/ Company:</strong>'.$row_voucher['supplier_f_name'].' '.$row_voucher['supplier_l_name'].' / '.$row_voucher['company_name'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Address:</strong>'.$row_voucher['street_address'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Phone:</strong> '.$row_voucher['phone'].'</span>
                            </p>
												</p>
												<br />
											</td>
										  </tr>
										  <tr style="background-color:#323232;">
											<td style="width:100px;color: #fff;font-size:12px;font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">
													
														<img style="width: 100px;max-height: 50px;" src="http://tourbookings.co/images/tourbooking_logo.png" width="256" height="105">
													
											</td>
											<td style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
											<td style="width:118px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"></td>
										  </tr>
										</table>
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										';
										
					$adult_voucher1 .= '	<div style=" border: 1px solid #CCCCCC; float: left; min-height: 335px;width: 700px; margin:0px 0px 50px 0px;">
                   	  <div style="background-color:#FD8900;float: left;height: 60px;width:700px;">
                      
                      	<div style=" float: left; width:130px; height:60px;">
                        	<p style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</p>
                        </div>
                        <div style="float: left; border-left: #FFF solid 1px;">
                        	<h1 style="color: #fff;font-size:24px;font-weight:normal; display:block; line-height:60px; text-indent:20px; margin:0px; padding:0px;">Tour Confirmation Voucher</h1>
                        </div>
                      </div>
                      
                      <div style="float: left; width:700px;">
                        	<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Tour Title:</strong>'.$row_voucher['title'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Booking Date:</strong>'.$row_voucher['start_date'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Adult Name:</strong> '.$adult_row['first_name'].'</span>
                            </p>
                            
                            <p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							Please hand this voucher to our representative at the start of your tour.
								our representative will meet you in the immigration hall of airport, holding.<br>
<br>

	 Travel Supplier Details   <br />

								<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Supplier Name/ Company:</strong>'.$row_voucher['supplier_f_name'].' '.$row_voucher['supplier_l_name'].' / '.$row_voucher['company_name'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Address:</strong>'.$row_voucher['street_address'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Phone:</strong> '.$row_voucher['phone'].'</span>
                            </p>
								</p>
                        </div>
                      
                      <div style="background-color:#323232;float: left;height:80px;width:700px;">
                      
                      	<div style="    float: left; width:130px; height:80px;">
                        	<p style="    color: #fff;    font-size:12px;    font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">
								<a href="http://tourbookings.co/">
									<img style="width: 100px;max-height: 50px;" src="http://tourbookings.co/images/tourbooking_logo.png" width="256" height="105">
								</a>
							</p>
                        </div>
                        <div style="    float: left; width:367px; border-left: #FFF solid 1px;">
                        	<h1 style="    color: #fff;    font-size:24px;    font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-indent:20px;">Tour Confirmation Voucher</h1>
                        </div>
                     
                      </div>
                        
                    </div>
					
					<br />';

	}
	
	
	
		       $child_result = mysql_query("select * from traveler where supplier_booking_id = '".$booking_id."' AND supplier_id ='".$supplier_id."' AND adult_child_status='child'");
			   while ($child_row = mysql_fetch_array($child_result)) {
			   	$child_voucher .= '
										<table width="650" height="317" border="1">
										  <tr style="background-color:#FD8900;height: 60px;width:200px;">
											<td style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</td>
											<td colspan="2" style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
										  </tr>
										  <tr>
											<td style="height: 60px;line-height:80px;" colspan="3">
												&nbsp;&nbsp;
													<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Tour Title: </strong>
													'.$row_voucher['title'].'
											</td>
										  </tr>
										  <tr>
											<td style="height: 60px;line-height:80px;">
											&nbsp;&nbsp;
												<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Booking Date:</strong>
												'.$row_voucher['start_date'].'
												
											</td>
											 <td style="height: 60px;line-height:80px;" colspan="2">
												&nbsp;&nbsp;
													<strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Child Name:</strong>
													'.$child_row['first_name'].'
												
											</td>
										  </tr>
										  <tr>
											<td colspan="3">
												 <p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; padding:20px 30px 20px 130px; margin:0px;">
												Please hand this voucher to our representative at the start of your tour.
												our representative will meet you in the immigration hall of airport, holding.<br>
												<br>
													 Travel Supplier Details   <br />

								<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Supplier Name/ Company:</strong>'.$row_voucher['supplier_f_name'].' '.$row_voucher['supplier_l_name'].' / '.$row_voucher['company_name'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Address:</strong>'.$row_voucher['street_address'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Phone:</strong> '.$row_voucher['phone'].'</span>
                            </p>
											</p>
												<br />
											</td>
										  </tr>
										  <tr style="background-color:#323232;">
											<td style="width:100px;color: #fff;font-size:12px;font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">
												
													<img style="width: 100px;max-height: 50px;" src="http://tourbookings.co/images/tourbooking_logo.png" width="256" height="105">
												
											</td>
											<td style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
											<td style="width:118px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"></td>
										  </tr>
										</table>
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										<br />
										';
			   		
					// echo '<div style="border: 1px solid #000;width:738px;">
					$child_voucher1 .= '	<div style=" border: 1px solid #CCCCCC; float: left; min-height: 335px;width: 700px; margin:0px 0px 50px 0px;">
                   	  <div style="background-color:#FD8900;float:left;height:60px;width:700px;">
                      
                      	<div style=" float: left; width:130px; height:60px;">
                        	<p style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</p>
                        </div>
                        <div style="float: left; border-left: #FFF solid 1px;">
                        	<h1 style="color: #fff;font-size:24px;font-weight:normal; display:block; line-height:60px; text-indent:20px; margin:0px; padding:0px;">Tour Confirmation Voucher</h1>
                        </div>
                      </div>
                      
                      <div style="float: left; width:700px;">
                        	<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Tour Title:</strong>'.$row_voucher['title'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Booking Date:</strong>'.$row_voucher['start_date'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Child Name:</strong> '.$child_row['first_name'].'</span>
                            </p>
                            
                            <p style="    color: #666;    font-size:12px;    font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							Please hand this voucher to our representative at the start of your tour.
								our representative will meet you in the immigration hall of airport, holding.<br>
<br>
								 Travel Supplier Details   <br />

								<p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; border-bottom:#CCC solid 1px; padding:20px 30px 20px 130px; margin:0px;">
							<strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Supplier Name/ Company:</strong>'.$row_voucher['supplier_f_name'].' '.$row_voucher['supplier_l_name'].' / '.$row_voucher['company_name'].'<br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Address:</strong>'.$row_voucher['street_address'].'</span><br>
                            <span><strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Phone:</strong> '.$row_voucher['phone'].'</span>
                            </p>

								Toll Free : 1800-TOURBOOKINGS
								</p>
                        </div>
                      
                      <div style="background-color:#323232;float: left;height:80px;width:700px;">
                      
                      	<div style="    float: left; width:130px; height:80px;">
                        	<p style="    color: #fff;    font-size:12px;    font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">
								<a href="http://tourbookings.co/">
									<img style="width: 100px;max-height: 50px;" src="http://tourbookings.co/images/tourbooking_logo.png" width="256" height="105">
								</a>
							</p>
                        </div>
                        <div style="    float: left; width:367px; border-left: #FFF solid 1px;">
                        	<h1 style="    color: #fff;    font-size:24px;    font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-indent:20px;">Tour Confirmation Voucher</h1>
                        </div>
                        
                      </div>
                        
                    </div>
					
					<br />'; 

			   }
		}
			 $supplier_result = mysql_query("select * from supplier where id ='".$supplier_id."'");
			   while ($supplier_row = mysql_fetch_array($supplier_result)) {
						
						$supplier_email = $supplier_row ['email'];
						$supplier_fname = $supplier_row ['first_name'];
						$supplier_lname = $supplier_row ['last_name'];
							
			   }
			
						// $email ="raza.malik@fountaintechies.com";
						$to1 = $supplier_email;
						// $to1 ='';
						$subject1 = "Purchase Confirmation"; 
						// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
						$message1 = '
										<b>Dear '.$supplier_fname.' '.$supplier_lname.',</b>
										<div>
										This is an email confirmation to inform you of the successful purchase of tour(s) through our Partner Program. 
										<br />
										Do check out the other tours that are made available to you at an irresistible rate!
										</div>
										<br />
										<br />
										<div>
										'.$adult_voucher1 .'
										<br />
										'.$child_voucher1 .'
										<br />
										</div>
										<br /><br /><br />
										
										';
										
									
						$headers1  = 'MIME-Version: 1.0' . "\r\n";
					$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Additional headers
					$headers1 .= 'To: '.$email.'' . "\r\n";
					$headers1 .= 'From: apache@iamamol.com' . "\r\n";
					$headers1 .= 'Cc: '.$customer_email.'' . "\r\n"; 

						
						

						

						$mail_sent1 = mail( $to1, $subject1, $message1, $headers1 );
						
						// echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
							session_start(); 
		
		
						$_SESSION['adult_voucher'] = $adult_voucher;
						$_SESSION['child_voucher'] = $child_voucher;
						
						echo '<'.'?'.'xml version="1.0" encoding="UTF-8"'.'?'.'>';	
						// echo 'Your Tour Booking is successful. Please download your confirmation vouchers here. <a href="example_001.php" title="PDF [new window]" target="_blank">Click Here</a>' ;
						echo 'Thank you for booking your tour with tourbookings.co.  <br /> <br />
						Your vouchers can be printed here <br /><br />
								<a href="example_001.php" title="PDF [new window]" class="btn btn-default" target="_blank">Print</a>
							<br /><br />	The vouchers are also in your mailbox.  <br /> <br />
							Thanks   <br /> <br />
								' ;
						// echo "Thank you , you booking successfull with followng details your <a href='voucher_ticket.php?booking_id=".$booking_id."'>Click Here</a>" ;
						


					/*	$sql4 = mysql_query("SELECT
											available_balance
											FROM
											supplier_balance
											WHERE  supplier_id = '".$supplier_id."'

											");
						while ($row4 = mysql_fetch_array($sql4))
							{
								$supplier_balance4 = $row4['b'];

							}
							if($withdraw_amount > $supplier_balance4 || $withdraw_amount < 0)
							{
								echo"Amount Withdraw can't be more then availabe balance  <a href='withdraw.php'>Back</a>";
							}
							else
							{
								$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
								$current_date = date("m/d/Y", $today_date);
								$total = $supplier_balance4 - $withdraw_amount;
								$sql2   = "insert into supplier_balance(supplier_id,account_id,available_balance,amount_deposit,type,description,amount_withdraw,insert_date) values ('$supplier_id','$account_id','$total','0','withdraw','withdraw','$withdraw_amount','$current_date')";
								$query = mysql_query($sql2);

								if($query)
								{
									echo "Thank You withdraw Successfully!";
								}
								else {
									echo "error";
								}
							} */



							// echo $total;

						// $sql2   = "insert into supplier_bank_account(supplier_id,account_type,bank_name,address,account_number,swift_code,account_name)
						// values ('$supplier_id','$account_type','$bank_name','address','$account_number','$swift_code','$account_name')";
							// $query = mysql_query($sql2);

							// if($query)
							// {
								// echo "Successful ";
							// }
							// else {
								// echo "error";
							// }


					}
	else {
			$sql3 = mysql_query("SELECT
			available_balance
			FROM
			supplier_balance
			WHERE  supplier_id = '".$supplier_id."'
			");
			while ($row = mysql_fetch_array($sql3))
				{
					$supplier_balance = $row['available_balance'];

				}
				
				// $total = $amount_deposit + $supplier_balance;
				$tour_id = $_POST['tour_id'];
				$tour_name = $_POST['tour_name'];
				$depart_date1 = $_POST['datepicker3'];
				$no_of_adults = $_POST['no_of_adults'];
				$no_of_childs = $_POST['no_of_childs'];
				 // $tour_id=$_REQUEST['tour_id'];
$result = mysql_query("SELECT
						t.url,
						p.id,
						p.title,
						p.city,
						p.`status`,
						p.supplier_id,
						p.overview,
						p.hilight,
						p.why_this,
						p.duration,
						tour_price.price_partner_adult,
						tour_price.price_partner_child,
						tour_price.price_customer_adult,
						tour_price.price_customer_child
						FROM
						tour AS p
						LEFT JOIN tour_photo AS t ON (p.id = t.tour_id)
						INNER JOIN tour_price ON p.id = tour_price.tour_id
						WHERE p.id = '".$tour_id."' 
					 ");
				
					$row2 = mysql_fetch_array($result);
					$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
					$current_date = date("m/d/y", $today_date);

					$tour_name = $row2['title'];
					$adult_price1 = $row2['price_partner_adult'];
					$child_price1 = $row2['price_partner_child']; 
					$booking_ammount1 = ($no_of_adults * $adult_price1) + ($no_of_childs * $child_price1);
					
					if($supplier_balance < $booking_ammount1)  
					{
							 $supplier_result2 = mysql_query("select * from supplier where id ='".$supplier_id."'");
			   while ($supplier_row2 = mysql_fetch_array($supplier_result2)) {
						
						$supplier_email2 = $supplier_row2 ['email'];
						$supplier_fname2 = $supplier_row2 ['first_name'];
						$supplier_lname2 = $supplier_row2 ['last_name'];
							
			   }
						// echo'<h5>You do not have enough balance to buy the tour. Please deposit '.$supplier_balance.' into your account. Update your deposit here.</h5>';
						echo'<h5>Insufficient Funds. Please deposit <a href="payment_deposit.php">here</a></h5>';
						// $to2 = $supplier_email;
						$to2 = 'admin@tourbookings.co'; 
						// $to1 ='';
						$subject2 = "New Lead - Partner Trying to Buy Tour"; 
						// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
						$message2 = '
										<b>Dear Support,</b>
										<div>
										Tour ID - '.$tour_id.'<br />
										Tour Name - '.$tour_name.'<br />
										Adult - '.$no_of_adults.'<br />
										Child - '.$no_of_childs.'<br /> 
										
										Supplier Name - '.$supplier_fname2.' '.$supplier_lname2.',<br />
										Supplier Email - '.$supplier_email2.'<br />
										</div>
										<br />
										<br />
										
										<br /><br /><br />
										<div>
											<b>Best Regards,</b>
										</div>
										<div>
											Tour Bookings 
										</div>
										';
										
									
						$headers2  = 'MIME-Version: 1.0' . "\r\n";
					$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

					// Additional headers 
					$headers2 .= 'To: '.$email.'' . "\r\n";
					$headers2 .= 'From: admin@tourbookings.co' . "\r\n"; 

					// $headers2 .= 'Cc: '.$customer_email.'' . "\r\n"; 

						$mail_sent1 = mail( $to2, $subject2, $message2, $headers2 );
						
						// echo $mail_sent1 ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
					}
					else 
					{

 ?>
				<form   method="post" role="form" id="form1"   novalidate="novalidate" class="form-horizontal validate" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ;?>'>



						<div class="form-group">
							<label for="field-1" style="padding-top: 26px;" class="col-sm-3 control-label">Availabe balance</label>

							<div style="margin-top: 20px;" class="col-sm-5">
								<h2><?php echo"$ ". $supplier_balance;?></h2>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" style="padding-top: 26px;" class="col-sm-3 control-label">Total Amount</label>

							<div style="margin-top: 20px;" class="col-sm-5">
								<h2><?php echo"$ ". $booking_ammount1;?></h2>
							</div>
						</div>
						<?php
							$c=0;
								$cc=0;
							for($i=0; $i<$no_of_adults ;$i++)
							{

								echo '<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label">Adult Name</label>
										<div class="col-sm-5">
											<input type="text" name="adult_name[]" class="form-control" style="width:43%;"/>
										</div>
									</div>';
								$c++;


							}
							if($no_of_childs=="") {
							}

							else {
							{ 
							for($i=0; $i<$no_of_childs ;$i++)
								 
                                echo '<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label">Child Name</label>
										<div class="col-sm-5">
											<input type="text" name="child_name[]" class="form-control" style="width:43%;"/>
										</div>
									</div>';
							$cc++;

							}
							}
							?>
							<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label">Customer Email</label>
										<div class="col-sm-5">
											<input type="text" name="customer_email" class="form-control" style="width:43%;"/>
										</div>
							</div>
						<!--<div class="form-group" style="float:left;margin-left:190px;">
							<label for="field-1" style="margin-left: 22px;" class="col-sm-3 control-label">Adult</label>

							<div class="col-sm-5">
								<label data-validate="number"  style="width:50px;" class="form-control"  id="title"  required><?php echo"$ ". $row2['price_partner_adult']; ?></label>
								<input type="hidden" name="adult_price" value="<?php //echo $row2['price_partner_adult'];?>" />
							</div>
						</div>
						<div class="form-group" style="float:left;margin-left:0px; ">
							<label for="field-1" class="col-sm-3 control-label">Child</label>

							<div class="col-sm-5">
								<label data-validate="number"  style="width:50px;" class="form-control" name="child_price" id="title"  required><?php echo"$ ". $row2['price_partner_child']; ?></label>
								<input type="hidden" name="child_price" value="<?php //echo $row2['price_partner_child'];?>" />
							</div>
						</div>-->
						</div>
						<input type="hidden" name="tour_id" value="<?php echo $tour_id;?>" />
						<input type="hidden" name="adult_price" value="<?php echo $row2['price_partner_adult'];?>" />
						<input type="hidden" name="child_price" value="<?php echo $row2['price_partner_child'];?>" />
						<input type="hidden" name="depart_date" value="<?php echo $depart_date1;?>" />
						<input type="hidden" name="no_of_adults" value="<?php echo $no_of_adults;?>" />
						<input type="hidden" name="no_of_childs" value="<?php echo $no_of_childs;?>" />

						<input style="margin-left: 275px;margin-bottom: 20px;" type="submit" name="submit" value="submit" class="btn btn-info ok" />





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