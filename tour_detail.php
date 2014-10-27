<?php
 session_start();
 ob_start();
 include('include/database/db.php');
	// $tour_id = mysql_real_escape_string($_POST['tour_id']);

$tour_id = $_GET['tour_id'];

$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/y", $today_date);
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$query = mysql_query("SELECT
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
						tour.status,
						tour.supplier_id,
						tour_price.currency_id,
						tour_price.price_per_person,
						tour_price.price_customer_adult,
						tour_price.price_customer_child,
						tour_price.price_child,
						tour_price.price_adult,
						tour_photo.url,
						tour_photo.description,
                                                supplier.first_name,
                                                supplier.last_name,
                                                supplier.phone,
                                                supplier.email,
                                                supplier.company_name,
                                                supplier.company_logo,
                                                supplier.web_address,
                                                supplier.street_address,
                                                supplier.city,
                                                supplier.state
						FROM
						tour
                                                INNER JOIN supplier ON supplier.id=tour.supplier_id
						INNER JOIN tour_price ON tour.id = tour_price.tour_id
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND tour.id = '".$tour_id."' GROUP BY tour.id");
                  
	while ($record = mysql_fetch_array($query))
		{
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
			$tour_pic_url =  $record['url'];
			// echo $tour_pic_url;
			$tour_price_per_person =  $record['price_per_person'];
			$price_customer_adult =  $record['price_customer_adult'];
			$price_customer_child =  $record['price_customer_child'];
			// echo $tour_price_per_person;
			$tour_price_child =  $record['price_child']; 
                        $supplier_id = $record['supplier_id'];
                        $supplier_name = $record['first_name'].' '.$record['last_name'];
                        $supplier_company_name = $record['company_name'];
                        $supplier_company_logo = $record['company_logo'];
                        $supplier_contact = $record['phone'];
                        $supplier_email = $record['email'];
                        $supplier_web_address = $record['web_address'];
                        $supplier_street_address = $record['street_address'];
                        $supplier_city = $record['city'];
                        $supplier_state = $record['state'];
                        
                        if($supplier_company_logo==""){
                            $company_logo = "";
                            $company_logo = 'no_preview.png';
                        }
                        else{
                            $company_logo = $supplier_company_logo;
                        }
		}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/example.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/jquery.ui.css">
     <!-- Picker UI-->
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->

	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.hashchange.min.js" type="text/javascript"></script>
	<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

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
  <SCRIPT language="Javascript">
       
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    </SCRIPT>
</head>

<body>
	<div id="main_container">
    	<div class="header_main fl">
        	<div class="header_top fl">
           	  <?php include('navigation.php'); ?>
            </div>
            <div class="header_logo fl">
            	<?php include('header_logo.php'); ?>
            </div>
    	</div>
    	<div class="center_body fl">
                <div class="header_menu">
                    <ul>
                        <li>
                            <a href="#">Category</a>
                        </li>
                        <li>
                            <a href="#">Destinations</a>
                        </li>
                        <li>
                            <a href="#">Deals</a>
                        </li>
                    </ul>
                </div>
		<!--<form action="add_to_cart.php" method="post">-->
           	<div class="left_penal_tour_detail background fl">
                    	<!--<div class="price_calender fl" style="height:160px;">
                          
                          <h1 style="font-size:30px;"><p style="font-size:30px; margin:0px;">Adult</p><?php //echo"$". $price_customer_adult; ?></h1>
                          
                          <h1 style="border:none; margin-bottom:0px; padding-bottom:0px; font-size:30px;"><p style="font-size:30px; margin:0px;">Child</p><?php //echo"$". $price_customer_child; ?></h1>
                          <a href="#">View price calendar</a>
                          <a href="low_price_guarantee.php"></a>

                        </div>-->
                        <div class="picks_head fl">
                            <h2 ><?php echo $tour_title ; ?></h2>
                            <span></span>
                            <div class="travel_pricing"><h2>S<?php echo "$".$price_customer_adult;?></h2></div>
                          </div>
                        <div>
                            <div class="zoo_night fl">
                            <?php		
                                $no_pic="";
                                if($tour_pic_url==""){
                                    $no_pic = 'no_preview.png';
                                }
                                else {
                                    $no_pic = $tour_pic_url;
                                }
                            ?>
                                <span class="fl first_image"><img src="supplier/uploads/tour_logo/<?php echo $no_pic; ?>" alt="" width="665" height="329"></span>
                                <span  class="fl next"><img class="next_image" src="" alt="" width="665" height="329"></span>
                            </div>
                            <div style="float:left;width:380px; height:89px; overflow-x: auto; white-space: nowrap; margin-bottom:20px;">
                                <?php
                                    $img_query = "select url from tour_photo where tour_id = '$tour_id'";
                                    $img_result = mysql_query($img_query) or die (mysql_error());
                                    while($img_row = mysql_fetch_array($img_result)){
                                        $no_pic="";
                                        if($img_row['url']==""){
                                            $no_pic = 'no_preview.png';
                                        }
                                        else {
                                            $no_pic = $img_row['url'];
                                        }
                                ?>
                                    <a class="change" src="supplier/uploads/tour_logo/<?php echo $no_pic; ?>" href="#"><img  class="preview change_image" src="supplier/uploads/tour_logo/<?php echo $no_pic; ?>" alt="" width="69" height="69"></a>
                                <?php
                                    }
                                ?>
                            </div>
                            <div id="tab-container">
                                <ul class='etabs'>
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
                                        <!--<h1>Why Travelers Chose this Tour</h1>
                                        <p>
                                            <?php //echo $tour_why_this ; ?>
                                        </p>-->
                                    </div>
                                <!-- content -->
                                </div>
                                <div id="tabs2" class=" three_tabs fl">
                                    <div class="overview fl">
					<h1>Departure </h1>
                                	<ul class="border-bottom">
                                            <?php echo $tour_deparchture_time.'hrs '.$tour_deparchture_point ; ?>
                                        </ul>
                                        <h1>Return </h1>
                                	<ul class="border-bottom">
                                            <?php echo $tour_return_detail ; ?>
                                        </ul>
                                    </div>
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
                    <div class="right_penal_tour_detail fl">
                        <div class="supplier_details">
                            <div class="company_logo">
                                <img src="supplier/uploads/company_logo/<?php echo $company_logo; ?>">
                            </div>
                            <div class="company_name"><?php echo $supplier_company_name; ?></div>
                            <div class="supplier_street_address"><?php echo $supplier_street_address?></div>
                            <div class="supplier_city"><?php echo $supplier_city;?></div>
                            <div class="supplier_contact"><b>Tel : </b><?php echo $supplier_contact; ?></div>
                        </div>
                        <form id="form_send_enquiry" method="post" action="">
                        	<div class="send_enquiry_errors">
                        		<a href="#" class="close">x</a>
                        		<ul></ul>
                        	</div>
                        	<div class="book_now_errors">
                        		<a href="#" class="close">x</a>
                        		<ul>
                        			<li><?php 
                        					if(isset($_SESSION['departure_date_error'])){
                        						echo $_SESSION['departure_date_error'];
                        						unset($_SESSION['departure_date_error']);
                        					}
                        				?>
                        			</li>
                        			<li><?php 
                        					if(isset($_SESSION['adult_error'])){
                        						echo $_SESSION['adult_error'];
                        						unset($_SESSION['adult_error']);
                        					}
                        				?>
                        			</li>
                        			<li><?php 
                        					if(isset($_SESSION['child_error'])){
                        						echo $_SESSION['child_error'];
                        						unset($_SESSION['child_error']);
                        					}
                        				?>
                        			</li>
                        			<li><?php 
                        					if(isset($_SESSION['name_error'])){
                        						echo $_SESSION['name_error'];
                        						unset($_SESSION['name_error']);
                        					}
                        				?>
                        			</li>
                        			<li><?php 
                        					if(isset($_SESSION['email_error'])){
                        						echo $_SESSION['email_error'];
                        						unset($_SESSION['email_error']);
                        					}
                        				?>
                        			</li>
                        			<li><?php 
                        					if(isset($_SESSION['message_error'])){
                        						echo $_SESSION['message_error'];
                        						unset($_SESSION['message_error']);
                        					}
                        				?>
                        			</li>
                        		</ul>
                        	</div>
                            <div class="form-row">
                                <label>* Departure Date</label>
                               	<input type="text" name="departure_date" id="departure_date" placeholder="DD/MM/YY"/>
                            </div>
                            <div class="form-row" id="adult_child_pricing">
                                <span>* Adult</span>
                                <input type="text" name="adult" placeholder="Adult" id="adult_pricing" />
                                <span>* Child</span>
                                <input type="text" name="child" placeholder="Child" id="child_pricing">
                            </div>
                            <div class="form-row">
                                <label style="margin-right: -30px !important">* Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" style="width: 215px !important"/>
                            </div>
                            <div class="form-row">
                                <label style="margin-right: -30px !important">* Email</label>
                                <input type="text" name="email" id="email" placeholder="Email" style="width: 215px !important"/>
                            </div>
                            <div class="form-row">
                                <label style="margin-right: -30px !important">* Message</label>
                                <textarea name="message" placeholder="Message" class="enquiry_message"/></textarea>
                            </div>
                            <div class="form-row">
                                <button type="button" id="book_now" class="book_now_btn">Book Now</button>
                                <button type="submit" name="btnEnquiry" class="send_enquiry_btn">Enquiry Now</button>
                            </div>
                        </form>
                        <?php
                            require_once 'admin/vendor/autoload.php';
                            use Mailgun\Mailgun;
                            
                            if(isset($_POST['btnEnquiry'])){
                                $name = ucfirst($_POST['name']);
                                $email = $_POST['email'];
                                $departure_date = $_POST['departure_date'];
                                $adult = $_POST['adult'];
                                $child = $_POST['child'];
                                $message = $_POST['message'];

                                if($name==''){
                                	$_SESSION['name_error'] = 'Name is required';
                                }
                                if($email==''){
                                	$_SESSION['email_error'] = 'Email is required';
                                }
                                if($departure_date==''){
                                	$_SESSION['departure_date_error'] = 'Departure date is required';
                                }
                                if($adult==''){
                                	$_SESSION['adult_error'] = 'Adult is required';
                                }
                                if($child==''){
                                	$_SESSION['child_error'] = 'Child is required';
                                }
                                if($message==''){
                                	$_SESSION['message_error'] = 'Message is required';	
                                }
                                if($name!='' && $email!='' && $departure_date!='' && $adult!='' && $child!='' && $message!=''){
                                
	                                $enquiry = '<!DOCTYPE html>
	                                            <html> 
	                                            <head>
	                                            <meta charset="utf-8">
	                                            <title>TourBookings Email</title>
	                                            <style type="text/css">
	                                            body {
	                                                    margin: 0px;
	                                                    padding:0px;
	                                            }
	                                            </style>
	                                            </head>

	                                            <body>
	                                            <div style=" width:100%; height:100%; padding:30px 0px 0px 0px; background:#ececec; float:left;">
	                                                    <div style="float:left; width:100%; margin:0px 0px 0px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c; -moz-box-shadow:0px 2px 5px #7d7c7c; -ms-box-shadow:0px 2px 5px #7d7c7c; -o-box-shadow:0px 2px 5px #7d7c7c; -webkit-box-shadow:0px 2px 5px #7d7c7c;">
	                                                            <div style=" float:left; width:100%; height:182px; border-bottom:#fd8900 solid 5px; background:url(http://tourbookings.co/images/header_bg.jpg) repeat-x  center top;">
	                                                                    <div style=" width:100%; float:right;">
	                                                                            <ul style=" width:155px; float:right; margin:20px 30px 15px 0px; padding:0px; display:block;">

	                                                                            <li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Visit Our Site</a></li>
	                                                                            <li style="	float:left; list-style-type: none; margin:0px;"><a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Login</a></li>
	                                                                      </ul>
	                                                                    </div>
	                                                                    <div style="width:539px; height:64px; float:left; margin-left:30px;">
	                                                                            <img src="http://tourbookings.co/images/email_logo.png" width="360" height="75" />
	                                                                    </div>
	                                                            </div>
	                                                            <div style="width:90%; float:left; padding:0px 30px;">
	                                                                <div style="width:100%; float:left;">
	                                                                        <div style="width:100%; float:left; /*border-bottom: 1px solid #cecece;*/">

	                                                                                <h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; color:#fd8900; font-size: 20px;  font-weight: bold; display:block;">Dear Valued Partner,</h1>

	                                                                        </div>
	                                                                        <div style="width: 100%; float: left;">
	                                                                            <p style="width: 330px; font-size: 12px; font-weight: bold; font-family:Arial, Helvetica, sans-serif;">
	                                                                                    A user of Tourbookings.co Singapore has just expressed interest in your package: <a href="http://tourbookings.co/tour_detail.php?tour_id='.$tour_id.'" style="color: #fd8900;">'.$tour_title.'</a> (click to see package)
	                                                                            </p>
	                                                                        </div>
	                                                                        <div style="width:100%; float:left;">

	                                                                                     <h1 style="width:100%; float:left; margin:0px; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#fd8900; font-weight:bold; display:block;">Please see details of the enquiry below:</h1>

	                                                                                <p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Customer Name: <span>'.$name.'</span></p>
	                                                                                <p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Email: <span>'.$email.'</span></p>
	                                                                                <p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Departure Date: <span>'.$departure_date.'</span></p>
	                                                                                <p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">No. of Adults: <span>'.$adult.'</span></p>
	                                                                                    <p style="width:100%; float:left; margin:0px 0px 15px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">No of Children: <span>'.$child.'</span></p>
	                                                                                    <p style="width:100%; float:left; margin:0px 0px 60px 0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#323232; font-weight:normal; display:block;">Message: <span>'.$message.'</span></p>

	                                                                                    <div><a href="#" style="text-decoration: none; font-size: 15px; font-weight: bold; color: #fd8900;">Tourbookings.co</a></div>

	                                                                                    <p style="width: 100%; float: left; font-family:Arial, Helvetica, sans-serif; color: #323232; font-size: 14px; margin: 5px 0 50px 0; display: block;">
	                                                                                            Agents typically experience a 30% improvement in closing<br>
	                                                                                            the lead when they respond to online enquiries within 24 hours.
	                                                                                    </p>

	                                                                                    <p style="width: 100%; float: left; font-family:Arial, Helvetica, sans-serif; color: #323232; font-size: 14px; margin: 0 0 50px 0; display: block;">
	                                                                                            Yours Sincerely,<br>
	                                                                                            Tourbookings Singapore<br>
	                                                                                            The simplest way to find and book your travels
	                                                                                    </p>
	                                                                        </div>
	                                                                </div>
	                                                            </div>
	                                                    </div> 

	                                                <div style="width:90%; float:left; padding:0px 30px 25px 30px;">
	                                                        <div style="float:left; margin:0px; width:70%;">
	                                                                          <ul style=" width:100%;float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">

	                                                                                <li style="	float:left; list-style-type: none; border-right:#323232 solid 2px; margin:0px;"><a href="http://tourbookings.co/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px 0px 0px;">Home</a></li>
	                                                                                <li style="	float:left; list-style-type: none;  border-right:#323232 solid 2px; margin:0px;">
	                                                                                <a href="http://tourbookings.co/supplier/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 10px;">Login</a></li>

	                                                                                <li style="	float:left; list-style-type: none; margin:0px;">
	                                                                                <a href="http://tourbookings.co/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:14px; font-weight:bold; color:#585858; text-decoration: none; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
	                                                                          </ul>
	                                                                          <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
	                                                                          <p style=" line-height: 0px;padding: 0;margin: 0;float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:12px; font-weight:normal; color:#323232;">100 Cecil Street, Collective Works, Singapore - 069532.</p>
	                                                          </div>
	                                                          <div style="float:right; width:30%; text-align:right;">
	                                                                <h3 style="width:100%; float:left; color:#323232; font-family:Arial, Helvetica, sans-serif; font-size:20px; display:block; margin:20px 0px 10px 0px; padding:0px;">Follow Us</h3>
	                                                                <div style="width:100%; float:left; margin:0px;">
	                                                                <a href="https://twitter.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-1.jpg"></a>
	                                                                        <a href="https://www.facebook.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-2.jpg"></a>
	                                                                        <a href="http://www.youtube.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-3.jpg"></a>
	                                                                        <a href="#"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-4.jpg"></a>
	                                                                        <a href="https://plus.google.com" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-5.jpg"></a>
	                                                                        <a href="https://www.pinterest.com/" target="_blank"><img width="22" height="22" alt="" src="http://tourbookings.co/images/email_icon-6.jpg"></a>
	                                                                </div>
	                                                          </div>

	                                                    </div>
	                                                    <div style="clear:both;"></div>
	                                            </div>

	                                            </body>
	                                            </html>';
	                                
	                                $msgClient = new Mailgun('key-4vyeldmso9oe3t8gitphksdwz9p0tpw5');
	                                $domain = 'tourbookings.co';
	                                
	                               $result = $msgClient->sendMessage($domain, array(
	                                    'from' => "{$name} <{$email}> ",
	                                    'to' => "<support@tourbookings.co>,<$supplier_email>",
	                                    'subject' => "Re: {$name} has an enquiry for {$tour_title}",
	                                    'html' => $enquiry
	                                ));
	                                
	                                if($result){
	                                    $_SESSION['enquire_tour_id'] = $tour_id;
	                                    header("Location:enquire.php?sent=ok");
	                                }
                            	}    
                            }
                        ?>
                        <?php 
                            //echo '<form method="post" action="cart_update.php">';
                        ?>
                    </div>
                        <!--<div class="select_travel_date fl tour_detail_calendr">
                            <h2>Select Travel Date</h2>
                            <div class="Departing_tour_detail">
				<label>Travel Date</label>
				<input type="text" class="mySelectCalendar" id="datepicker3" name="datepicker3" placeholder="mm/dd/yyyy"/>
                            </div>
                            <a style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
                    	</div>
                        <div class="select_travel_date fl">
                       	  <h2 class="mrgn_top">Enter Total Number of Travelers</h2>
                        <div class="Adult_tour_detail">
                            <label>Adult</label>
                            <input type="text" onKeyPress="return isNumberKey(event)" name="adult" id="adult"/>
                        </div>
                        <div class="Child_tour_detail" > 
                            <label>Child</label>
                            <input type="text" onKeyPress="return isNumberKey(event)" name="child" id="child"/>
                        </div>
                        <a style="display:none" href="#" class="mrgn_top">What's this, and can I change it?</a>
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
                        <?php
//                            echo '<input type="hidden" name="product_code" value="'.$tour_id.'" />';
//                            echo '<input type="hidden" name="type" value="add" />';
//                            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
//                            echo '</form>';
                        ?>
                    </div>
                <?php include('footer.php'); ?>
      <div style="clear:both"></div>
   </div>

    <!-- Javascript -->

    <!-- This page JS -->
	<script src="js/js-index.js"></script>

    <!-- Custom functions -->
    <script src="js/functions.js"></script>

	<!-- Easing -->
    <script src="js/jquery.easing.js"></script>

    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

   <!-- Nicescroll  -->
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

    <!-- CarouFredSel -->
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>

	<!-- JQuery UI -->
	<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>
    <script>
           $(document).ready(function(){
               $("#book_now").click(function(){
                   // var tour_title = "<?php echo $tour_title?>";
                   // var supplier_id = "<?php echo $supplier_id; ?>";
                   // var price_per_person = "<?php echo $tour_price_per_person; ?>";
                   var tour_id = "<?php echo $tour_id; ?>";
                   var adult = $("#adult_pricing").val();
                   var child = $("#child_pricing").val();
                   var departure_date = $("#departure_date").val();
                   var name = $("#name").val();
                   var email = $("#email").val();

                   $(".send_enquiry_errors ul").html("");

                    if(adult==''){
                   		$(".send_enquiry_errors ul").append('<li>Adult is required</li>');	
                   		$(".send_enquiry_errors").show();
                   }
                   if(child==''){
                   		$(".send_enquiry_errors ul").append('<li>Child is required</li>');	
                   		$(".send_enquiry_errors").show();
                   }
                   if(departure_date==''){
                   		$(".send_enquiry_errors ul").append('<li>Departure date is required</li>');
                   		$(".send_enquiry_errors").show();	
                   }
                   if(name==''){
                   		$(".send_enquiry_errors ul").append('<li>Name is required</li>');	
                   		$(".send_enquiry_errors").show();
                   }
                   if(email==''){
                   		$(".send_enquiry_errors ul").append('<li>Email is required</li>');	
                   		$(".send_enquiry_errors").show();
                   }
                   if(adult!='' && child!='' && departure_date!='' && name!='' && email!=''){
                   		window.location = 'book_now.php?tour_id='+tour_id+'&date='+departure_date+'&adult='+adult+'&child='+child;
                   }
                   return false;
               	});

				$(".send_enquiry_errors .close").click(function(){
	      			$(".send_enquiry_errors").hide();
	      			return false;
	      		})

	      		$("#departure_date").datepicker();
           });
    </script>
</body>
</html>
<?php
    ob_flush();
?>