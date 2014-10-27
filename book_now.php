<?php
 	session_start();
 	include('include/database/db.php');

 	$tour_id = $_GET['tour_id'];
 	$departure_date = $_GET['date'];
	$adult = $_GET['adult'];
	$child = $_GET['child'];
	
	$sql = "SELECT tour.title, tour_price.price_customer_adult,tour_price.price_customer_child FROM tour INNER JOIN tour_price ON tour.id=tour_price.tour_id WHERE tour.id = $tour_id";
	$result = mysql_query($sql);
	if(!$result)die('Error query'.mysql_error());
	$tour_title = "";
	$price_customer_adult = 0;
	$price_customer_child = 0;

	while($row = mysql_fetch_array($result)){
		$tour_title = $row['title'];
		$price_customer_adult = $row['price_customer_adult'];
		$price_customer_child = $row['price_customer_child'];
	}

	$ad_price = $adult * $price_customer_adult;
	$ad_child = $child * $price_customer_child;

	$price = $ad_price + $ad_child;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="css/example.css">
<link rel="stylesheet" type="text/css" href="css/jquery.ui.css">
<link href="css/smart_wizard.css" rel="stylesheet" type="text/css">
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
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=784941191519375";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
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
           		<div class="book_now">
                    <form action="credit_card_payment.php" method="POST">
           				<div id="wizard" class="swMain">
				  			<ul>
				  				<li><a href="#step-1">
				                <span class="stepNumber">1</span>
				                <span class="stepDesc">
				                   Traveler Details<br />
				                   <small>Fill your traveler details</small>
				                </span>
				            </a></li>
				  				<li><a href="#step-2">
				                <span class="stepNumber">2</span>
				                <span class="stepDesc">
				                   Tour Details<br />
				                   <small>Review your tour</small>
				                </span>
				            </a></li>
				  				<li><a href="#step-3">
				                <span class="stepNumber">3</span>
				                <span class="stepDesc">
				                   Payment<br />
				                   <small>Payment details</small>
				                </span>
				             </a></li>
				  				<li><a href="#step-4">
				                <span class="stepNumber">4</span>
				                <span class="stepDesc">
				                   Pay Now<br />
				                   <small>By Credit Card or Paypal</small>
				                </span>
				            </a></li>
				  			</ul>
				  			<div id="step-1">	
				           		<h2 class="StepTitle">Step 1: Traveler Details</h2>

				            	<table cellspacing="3" cellpadding="3" align="center">
				          			<tr>
				                    	<td align="center" colspan="3">&nbsp;</td>
				          			</tr>        
				          			<?php
                                                                    if($adult <= 1){
                                                                            echo '<tr>
                                                                                <td align="right">Adult :</td>
                                                                                <td align="left">
                                                                                  <input type="text" id="adult_name" name="adult_name" placeholder="Name" class="txtBox" style="width: 250px;">
                                                                                </td>
                                                                                <td align="left"><span id="msg_adult"></span>&nbsp;</td>
                                                                                </tr>';
                                                                    }
                                                                    else{
                                                                        for($i=1; $i<=$adult;$i++){
                                                                            echo '<tr>
                                                                                <td align="right">Adult'.$i.' :</td>
                                                                                <td align="left">
                                                                                  <input type="text" id="adult_name'.$i.'" name="adult_name'.$i.'" placeholder="Name" class="txtBox" style="width: 250px;">
                                                                                </td>
                                                                                <td align="left"><span id="msg_adult'.$i.'"></span>&nbsp;</td>
                                                                                </tr>';

                                                                        }
                                                                    }
				          			?>
				          			<?php
				          				if($child <=1){
						          			echo '<tr>
							                    	<td align="right">Child :</td>
							                    	<td align="left">
							                    	  <input type="text" id="child_name" name="child_name" placeholder="Name" class="txtBox" style="width: 250px;">
							                      	</td>
							                    	<td align="left"><span id="msg_child"></span>&nbsp;</td>
							          			</tr>';
						          		}
						          		else{
						          			for($i=1;$i<=$child;$i++){
						          				echo '<tr>
							                    	<td align="right">Child'.$i.' :</td>
							                    	<td align="left">
							                    	  <input type="text" id="child_name'.$i.'" name="child_name'.$i.'"  placeholder="Name" class="txtBox" style="width: 250px;">
							                      	</td>
							                    	<td align="left"><span id="msg_child'.$i.'"></span>&nbsp;</td>
							          			</tr>';
						          			}
						          		}
				          			?>                               			
				  			   </table>          			
				        	</div>
				  			<div id="step-2">
					            <h2 class="StepTitle">Step 2: Preview</h2>	
					            <table cellspacing="3" cellpadding="3" align="center">
				          			<tr>
				                    	<td align="center" colspan="3">&nbsp;</td>
				          			</tr>
				          			<tr>
				          				<td align="center" colspan="3" style="font-size: 20px; font-weight: bold; padding-bottom: 20px; color: #fd8900;"><?php echo $tour_title;?></td>
				          			</tr>   
				          			<tr>
				                    	<td align="right">Departure Date :</td>
				                    	<td align="left">
				                    	  <input type="hidden" id="departure_date" name="departure_date" value="<?php echo $departure_date;?>" class="txtBox">
				                      		<span><?php echo $departure_date;?></span>
				                      	</td>
				                    	<td align="left"><span id="msg_departure_date"></span>&nbsp;</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Number of adults :</td>
				                    	<td align="left">
				                    	  <input type="hidden" id="number_of_adults" name="number_of_adults" value="<?php echo $adult;?>" >
				                    	  <span><?php echo $adult;?></span>
				                      	</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Number of children :</td>
				                    	<td align="left">
				                    	  <input type="hidden" id="number_of_children" name="number_of_children" value="<?php echo $child;?>">
				                    	  <span><?php echo $child;?></span>
				                      	</td>
				          			</tr>
				          			<tr>
				          				<td align="right"><b>Names :</b></td>
				          			</tr>
				          			<!-- <tr>
				                    	<td align="right">Number of children :</td>
				                    	<td align="left">
				                    	  <input type="hidden" id="number_of_children" name="number_of_children" value="<?php echo $child;?>">
				                    	  <span><?php echo $child;?></span>
				                      	</td>
				                    	<td align="left"><span id="msg_number_of_child"></span>&nbsp;</td>
				          			</tr>   -->
				          			<!-- <tr>
				                    	<td align="right">Gender :</td>
				                    	<td align="left">
				                        <select id="gender" name="gender" class="txtBox">
				                          <option value="">-select-</option>
				                          <option value="Female">Female</option>
				                          <option value="Male">Male</option>                 
				                        </select>
				                      </td>
				                    	<td align="left"><span id="msg_gender"></span>&nbsp;</td>
				          			</tr>  -->                                  			
				  			   </table>        
				        	</div>                      
				  			<div id="step-3">
					            <h2 class="StepTitle">Step 3: Payment</h2>	
					            <table cellspacing="3" cellpadding="3" align="center">
				          			<tr>
				                    	<td align="center" colspan="3">&nbsp;</td>
				          			</tr>
				          			<tr>
				          				<td align="center" colspan="3" style="font-size: 20px; font-weight: bold; padding-bottom: 20px; color: #fd8900;"><?php echo $tour_title;?></td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Adult :</td>
				                    	<td align="left">
				                    	  <span>2</span>
				                      </td>
				          			</tr>       			
				          			<tr>
				                    	<td align="right">Child :</td>
				                    	<td align="left">
				                        	<span>2</span>
				                      	</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Price :</td>
				                    	<td align="left">
				                    	  <span><?php echo '$'.$price; ?></span>
				                      </td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Taxed :</td>
				                    	<td align="left">
				                        	<span>N/A</span>
				                      	</td>
				          			</tr>
				          			<tr>
				                    	<td align="right"><b>Total Cost :</b></td>
				                    	<td align="left">
				                        	<span><?php echo '$'.$price; ?></span>
				                    	  	<input type="hidden" name="total_price" value="<?php echo $price; ?>">
				                      	</td>
				          			</tr>                                			
				  			   	</table>               				          
				        	</div>
				  			<div id="step-4">
					            <h2 class="StepTitle">Step 4: Pay Now</h2>	
					            <table cellspacing="3" cellpadding="3" align="center">
				          			<tr>
				                    	<td align="center" colspan="3">&nbsp;</td>
				          			</tr>        
				          			<tr>
				                    	<td align="right">Name on credit card :</td>
				                    	<td align="left">
				                    	  <input type="text" id="credit_card_name" name="credit_card_name" placeholder="Name" class="txtBox" style="width: 270px !important;">
				                      	</td>
				                    	<td align="left"><span id="msg_credit_card_name"></span>&nbsp;</td>
				          			</tr>          			
				          			<!-- <tr>
				                    	<td align="right">City:</td>
				                    	<td align="left">
				                            <input type="text" name="city" id="city" class="txtBox" style="width: 250px !important;">
				                      	</td>
				                    	<td align="left"><span id="msg_city"></span>&nbsp;</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Country:</td>
				                    	<td align="left">
				                            <select name="country" id="country" class="txtBox" style="width: 256px !important;">
				                            	<option>Afghanistan</option>
				                            	<option>Albania</option>
				                            	<option>Algeria</option>
				                            	<option>philippines</option>
				                            	<option>Singapore</option>
				                            </select>
				                      	</td>
				                    	<td align="left"><span id="msg_country"></span>&nbsp;</td>
				          			</tr> --> 
				          			<tr>
				                    	<td align="right">Credit card number</td>
				                    	<td align="left">
				                           <input type="text" name="card_number" id="card_number" placeholder="Card number" class="txtBox" style="width: 270px !important;">
				                      	</td>
				                    	<td align="left"><span id="msg_card_number"></span>&nbsp;</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Card security number</td>
				                    	<td align="left">
				                           <input type="text" name="card_security_number" id="card_security_number" placeholder="Card security number" class="txtBox" style="width: 270px !important;">
				                      	</td>
				                    	<td align="left"><span id="msg_card_security_number"></span>&nbsp;</td>
				          			</tr>
				          			<tr>
				                    	<td align="right">Expiry date</td>
				                    	<td align="left">
				                           <input type="text" name="expiry_date" id="expiry_date" placeholder="Expiry date" class="txtBox" style="width: 270px !important;">
				                      	</td>
				                    	<td align="left"><span id="msg_expiry_date"></span>&nbsp;</td>
				          			</tr>
				          			<tr>
				                    	<td align="center" colspan="3">&nbsp;</td>
				          			</tr>                            			
				  			   </table>
				  			   <div style="width: 600px; margin: 10px 0 0 5px; font-weight: bold; ">
				  			   		Fill up the form above if you would like to pay by credit card OR by
				  			   		<a style="float: right; position: relative; margin-top: -20px;" href="paypal_payment.php"><img src="http://www.coachsbr.com/images/site/paypal_button.gif" name="paypal"  value="Payment via Paypal"></a>
				  			   </div>                 			
				        	</div>
				  		</div>
           			</form>
           		</div>
              </div>
            <?php include('footer.php'); ?>
      <div style="clear:both"></div>
   </div>

    <!-- Javascript -->

    <!-- This page JS -->
	<script src="js/js-index.js"></script>

    <!-- Custom functions -->
    <script src="js/functions.js"></script>

    <!-- Picker UI-->
	<script src="js/jquery-ui.js"></script>

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

    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>

	<!-- JQuery UI -->
	<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
	<!-- SmartWizard-->
	<script type="text/javascript" src="js/jquery.smartWizard-2.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>	<script>  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-43203432-1', 'titanicthemes.com');  ga('send', 'pageview');</script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#wizard').smartWizard({transitionEffect:'slideleft',onLeaveStep:leaveAStepCallback,onFinish:onFinishCallback,enableFinishButton:true});

    		function leaveAStepCallback(obj){
		        var step_num= obj.attr('rel');
		    	return validateSteps(step_num);
		    }
		      
	      	function onFinishCallback(){
		       if(validateAllSteps()){
		        $('form').submit();
		       }
	      	}

	      	$(".buttonNext").click(function(){
	      		$("#step-2 table").find(".traveler_names").remove();
	      		var adult = "<?php echo $adult; ?>";
	      		var child = "<?php echo $child; ?>";
	      		if(adult > 1){
	      			for(var i=1;i<=adult;i++){
	      				$("#step-2 table").append('<tr class="traveler_names"><td align="right">'+$("#adult_name"+i).val()+'</td></tr>');
	      			}
	      		}
	      		else{
	      			$("#step-2 table").append('<tr class="traveler_names"><td align="right">'+$("#adult_name").val()+'</td></tr>');
	      		}

	      		if(child > 1){
	      			for(var i=1;i<=child;i++){
	      				$("#step-2 table").append('<tr class="traveler_names"><td align="right">'+$("#child_name"+i).val()+'</td></tr>');
	      			}
	      		}
	      		else{
	      			$("#step-2 table").append('<tr class="traveler_names"><td align="right">'+$("#child_name").val()+'</td></tr>');
	      		}
	      	});                                        

	      	$(".step1_errors .close").click(function(){
	      		$(".step1_errors").hide();
	      		$(".step1_errors ul").html('');
	      		return false;
	      	});

	      	$("#step-1 input[type='text']").keypress(function(e){
			    var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
			    var code;
			    if (window.event)
			        code = e.keyCode;
			    else
			        code = e.which;
			    var char = keychar = String.fromCharCode(code);
			    if (arr.indexOf(char) == -1)
			        return false;
			});

			$("#credit_card_name").keypress(function(e){
			    var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
			    var code;
			    if (window.event)
			        code = e.keyCode;
			    else
			        code = e.which;
			    var char = keychar = String.fromCharCode(code);
			    if (arr.indexOf(char) == -1)
			        return false;
			});

			$("#card_number").keypress(function(e){
			    var arr = "0123456789";
			    var code;
			    if (window.event)
			        code = e.keyCode;
			    else
			        code = e.which;
			    var char = keychar = String.fromCharCode(code);
			    if (arr.indexOf(char) == -1)
			        return false;
			});

			$("#card_security_number").keypress(function(e){
			    var arr = "0123456789";
			    var code;
			    if (window.event)
			        code = e.keyCode;
			    else
			        code = e.which;
			    var char = keychar = String.fromCharCode(code);
			    if (arr.indexOf(char) == -1)
			        return false;
			});

			$("#expiry_date").datepicker();
		});

	    function validateAllSteps(){
	       var isStepValid = true;
	       
	       if(validateStep1() == false){
	         	isStepValid = false;
	         	$('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
	       	}else{
	       		$('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
	       	}

	        if(validateStep4() == false){
	         	isStepValid = false;
	         	$('#wizard').smartWizard('setError',{stepnum:4,iserror:true});         
	       	}else{
	         	$('#wizard').smartWizard('setError',{stepnum:4,iserror:false});
	       	}
	       
	       	if(!isStepValid){
	          	$('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
	       	}      
	       	return isStepValid;
	    }

	    function validateSteps(step){
		  var isStepValid = true;
	      // validate step 1
	      if(step == 1){
	        if(validateStep1() == false ){
	          isStepValid = false; 
	          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
	          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
	        }else{
	          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
	          $('.msgBox').hide();
	        }
	      }

	      if(step == 4){
	        if(validateStep4() == false ){
	          isStepValid = false;
	          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
	          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
	        }else{
	          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
	          $('.msgBox').hide();
	        }
	      }
	      
	      return isStepValid;
	    } 	
			
			
		function validateStep1(){
	       var isValid = true; 
	       // Validate Username
	       var adult = "<?php echo $adult; ?>";
	       if(adult > 1){
	       		for(var i=1;i<=adult;i++){
	       			if(!($("#adult_name"+i).val()) && ($("#adult_name"+i).val()).length <= 0 ){
	       				isValid = false;
	       				$('#msg_adult'+i).html('This field is required').show().addClass('step_errors');
	       			}
	       			else{
	       				$('#msg_adult'+i).html('').hide().removeClass('step_errors');
	       			}
	       		}
	       }
	       else{
	       		if(!($("#adult_name").val()) && ($("#adult_name").val()).length <= 0 ){
       				isValid = false;
       				$('#msg_adult').html('This field is required').show().addClass('step_errors');
       			}
       			else{
       				$('#msg_adult').html('').hide().removeClass('step_errors');
       			}
	       }

	       var child = "<?php echo $child; ?>";
	       if(child > 1){
	       		for(var i=1;i<=child;i++){
	       			if(!($("#child_name"+i).val()) && ($("#child_name"+i).val()).length <= 0 ){
	       				isValid = false;
	       				$('#msg_child'+i).html('This field is required').show().addClass('step_errors');
	       			}
	       			else{
	       				$('#msg_child'+i).html('').hide().removeClass('step_errors');
	       			}
	       		}
	       	}
	        else{
	       		if(!($("#child_name").val()) && ($("#child_name").val()).length <= 0 ){
	   				isValid = false;
	   				$('#msg_child').html('This field is required').show().addClass('step_errors');
	   			}
	   			else{
	   				$('#msg_child').html('').hide().removeClass('step_errors');
	   			}
	       }
	       return isValid;
	    }

	    function validateStep4(){
	    	var isValid = true;

	    	var credit_card_name = $("#credit_card_name").val();
	    	if(!credit_card_name && credit_card_name.length <= 0 ){
   				isValid = false;
   				$('#msg_credit_card_name').html('This field is required').show().addClass('step_errors');
   			}
   			else{
   				$('#msg_credit_card_name').html('').hide().removeClass('step_errors');
   			}

   			var card_number = $("#card_number").val();
   			if(!card_number && card_number.length <= 0 ){
   				isValid = false;
   				$('#msg_card_number').html('This field is required').show().addClass('step_errors');
   			}
   			else{
   				$('#msg_card_number').html('').hide().removeClass('step_errors');
   			}

   			var card_security_number = $("#card_security_number").val();
   			if(!card_security_number && card_security_number.length <= 0 ){
   				isValid = false;
   				$('#msg_card_security_number').html('This field is required').show().addClass('step_errors');
   			}
   			else{
   				$('#msg_card_security_number').html('').hide().removeClass('step_errors');
   			}

   			var expiry_date = $("#expiry_date").val();
   			if(!expiry_date && expiry_date.length <= 0 ){
   				isValid = false;
   				$('#msg_expiry_date').html('This field is required').show().addClass('step_errors');
   			}
   			else if(Date.parse(expiry_date) <= Date.parse(currentDate())){
   				isValid = false;
   				$("#msg_expiry_date").html('Please enter a valid expiry date').addClass('step_errors').css('display','inline');
   			}
   			else{
   				$('#msg_expiry_date').html('').hide().removeClass('step_errors');
   			}
   			return isValid;
	    }

	    function currentDate()
		{
			var dNow = new Date();
			var utc = new Date(dNow.getTime() + dNow.getTimezoneOffset() * 60000)
			var utcdate= (utc.getMonth()+1) + '/' + utc.getDate() + '/' + utc.getFullYear();
			return utcdate;
		}
    </script>
</body>
</html>