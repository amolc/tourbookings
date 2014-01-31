<?php 
session_start(); 
 include('include/database/db.php'); 
 $user_id ="";
if(isset($_SESSION['user_id'])){
 $user_id = $_SESSION['user_id'];
}
else {
// header("Location: user_login.php");
// $user_id_get =0;
$user_query = mysql_query("SELECT * FROM user");
while($user_rocord = mysql_fetch_array($user_query))
{

$user_id_get = $user_rocord['id'];	

}
$user_id =$user_id_get +1 ;
// echo $user_id;
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
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
             	<div style="background:#fd8900;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                           <!--	<h1>Insider's Guide to Singapore</h1>
                            <p>Major attractions, tips and our top<br>
							things to see and do.</p>
                            <a href="#">Look Inside</a>-->
                        </div>
                        
                        	<div style="display:none;" class="singapore_things fl">
                            	<h2>Singapore Things To Do</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Things to Do...</a></li>
                                        <li><a href="#">Cruises, Sailing & Water Tours</a></li>
                                        <li><a href="#">Cultural & Theme Tours</a></li>
                                        <li><a href="#">Day Trips & Excursions</a></li>
                                        <li><a href="#">Food, Wine & Nightlife</a></li>
                                        <li><a href="#" class="active">Multi-day & Exttended Tours</a></li>
                                        <li><a href="#">Outdoor Activities</a></li>
                                        <li><a href="#">Private & Custom Tours</a></li>
                                        <li><a href="#">Shore Excursions</a></li>
                                        <li><a href="#">Shows, Concerts & Sports</a></li>
                                        <li><a href="#">Sightseeing Tickets & Passes</a></li>
                                        <li><a href="#">Theme Parks</a></li>
                                        <li><a href="#">Tours & Sightseeing</a></li>
                                        <li><a href="#">Transfers & Ground Transport</a></li>
                                        <li><a href="#">Walking & Biking Tours</a></li>
                                        <li><a href="#">Water Sports</a></li>
                                        <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                    </ul>
                                
                            </div>
                            
                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Recommended</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Recommendations... </a></li>
                                        <li><a href="#">Our Top 10 Insider's Picks</a></li>
                                        <li><a href="#">Deals & Discounts </a></li>
                                        <li><a href="#">Family Friendly </a></li>
                                        <li><a href="#">Luxury & Special Occasions </a></li>
                                        <li><a href="#" class="active">Singapore Quays </a></li>
                                        <li><a href="#">Malaysia Tours from Singapore </a></li>
                                        <li><a href="#">Cruises from Singapore</a></li>
                                        <li class="border"><a href="#" class="active">See all recommendations...</a></li>
                                    </ul>
                                
                            </div>
                            
                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Top Attractions</h2>
                                
                                	<ul>
                                    	<li><a href="#">All Attractions...</a></li>
                                        <li><a href="#">Singapore Zoo Breakfast</a></li>
                                        <li><a href="#">Singapore Zoo</a></li>
                                        <li><a href="#">Singapore Chinatown</a></li>
                                        <li><a href="#">Sentosa Island</a></li>
                                        <li><a href="#" class="active">Universal Studios Singapore</a></li>
                                        <li><a href="#">Orchard Road</a></li>
                                        <li><a href="#">Marina Bay Sands</a></li>
                                        <li class="border"><a href="#" class="active">See all attractions...</a></li>
                                    </ul>

                      </div>
                            
                            <div class="chat_now fl"><a href="#"><img src="images/chat_now.jpg" alt="" width="296" height="186"></a></div>
                        
                    </div>
                    
                    	<div class="right_penal fl">
                        	
                          <div class="register_head fl">
                            	<h2>Payment Method</h2><br>
                          </div>
                            <?php 
// echo "yes";


$credit_card = mysql_real_escape_string($_POST['credit_card']);
$user_name = mysql_real_escape_string($_POST['user_name']);

$online_check = mysql_real_escape_string($_POST['online_check']);
$credit_card_no = mysql_real_escape_string($_POST['credit_card_no']);
$month = mysql_real_escape_string($_POST['month']);
$year = mysql_real_escape_string($_POST['year']);
$exp_date = $month ."-".$year;
$security_code = mysql_real_escape_string($_POST['security_code']);

$country = mysql_real_escape_string($_POST['country']);
$company = mysql_real_escape_string($_POST['company']);

$street_address = mysql_real_escape_string($_POST['street_address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$postcode = mysql_real_escape_string($_POST['postcode']);
$phone = mysql_real_escape_string($_POST['phone']);


$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);

// $user_id = mysql_real_escape_string($_POST['user_id']);
$trip_title = mysql_real_escape_string($_POST['name']);
$tour_id = mysql_real_escape_string($_POST['tour_id']);
$supplier_id = mysql_real_escape_string($_POST['supplier_id']);
$start_date = mysql_real_escape_string($_POST['date']);
$deparchture_time = mysql_real_escape_string($_POST['deparchture_time']);
$total = mysql_real_escape_string($_POST['total']);

// $payment_id = '1';
// $supplier_id ='1';
// $adult_name = mysql_real_escape_string($_POST['adult_name']);
$child_name = mysql_real_escape_string($_POST['child_name']);
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
$current_date = date("m/d/Y", $today_date);

	$payment_sql   = "insert into payment(user_id,name,credit_card_no,expired_date,security_code,total_price,email,phone) values ('$user_id','$user_name','$credit_card_no','$exp_date','$security_code','$total','$email','$phone')";
			$payment_query = mysql_query($payment_sql);
		 if($payment_query){
		echo "Thank you, Your Tour booked succesfully & ";
	} else {
		echo "error in payment";
	}
		$user_query3 = mysql_query("SELECT * FROM payment");
while($user_rocord3 = mysql_fetch_array($user_query3))
{

$payment_id3 = $user_rocord3['id'];	

}	
		$payment_id = $payment_id3;
		
		
		$sql   = "insert into booking(user_id,tour_id,supplier_id,payment_id,start_date,end_date,status,insert_date) values('".$user_id."','".$tour_id."','".$supplier_id."','".$payment_id."','".$start_date."','".$end_date."','pending','".$current_date."')";
	
	$query = mysql_query($sql);
		 if($query){
		// echo "payment successful";
	} else {
		echo "error";
	}
	$alTxt= $_POST['txt'];
	$alTxt1= $_POST['txt1'];
$N = count($alTxt);


	for($i=0; $i < $N; $i++)
    {
      // echo($alTxt[$i]);
	  $sql1   = "insert into traveler(user_id,tour_id,first_name) values ('$user_id','$tour_id','$alTxt[$i]')";
	  	$query1 = mysql_query($sql1);
	 if($query1){
		// echo "payment successful";
	} else {
		echo "error in traveler ad";
	} 
    }
	
	$N1 = count($alTxt1);
    for($j=0; $j < $N1; $j++)
    { 
		  // $sql2   = "insert into traveler(user_id,tour_id,name,sex,age,	proof_id) values ('$user_id','$tour_id','$alTxt1[$j]')";
		  $sql2   = "insert into traveler(user_id,tour_id,first_name) values ('$user_id','$tour_id','$alTxt1[$j]')";
	  	$query2 = mysql_query($sql2);
	 if($query2){
		// echo "payment successful";
	} else {
		echo "error in traveler ch";
	} 
	}
	


?>
<?php
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
if($password=="") {
$pass = randomPassword();

}
else {
$pass = $password;
}

// $name = mysql_real_escape_string($_POST['name']);
$gender = mysql_real_escape_string($_POST['gender']);
$age = mysql_real_escape_string($_POST['age']);
// $country = mysql_real_escape_string($_POST['country']);
$city = mysql_real_escape_string($_POST['city']);
$address = mysql_real_escape_string($_POST['address']);
// $phone = mysql_real_escape_string($_POST['phone']);

	$sql   = "insert into user(first_name,password,gender,age,country,city,address,phone,email) values ('$user_name','$pass','$gender','$age','$country1','$city','$address','$phone','$email')";
	$query = mysql_query($sql);
	 if($query){
		// echo "registration successful";
	}else {
		echo "error in user create";
	} 
if(isset($_SESSION['user_id'])){

}
else {


	$to = $email;
	$subject = "Membership confirmation "; 
	// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
	$message = "
				Dear '".$user_name."',

				Welcome to Tour Bookings! You will find your randomized password below. 

				To change your password, simply log on to your account using the password 

				provided below and you will be able to change it to a password of your choice.

				Password:  '".$pass."'

				We look forward to seeing you again.

				Best Regards,

				Tour Bookings"; 
				
	$headers = 'apache@iamamol.com';

	
	

	

	$mail_sent = mail( $to, $subject, $message, $headers );
	
}
	
	$to1 = $email;
	$subject1 = "email confirmation of booking"; 
	// $message = "Your user name is email  '".$email."' and password  '".$pass."'"; 
	$message1 = '
				email confirmation of booking

					Dear '.$user_name.',

					Your booking has been confirmed. All the information that you will require can 

					be found below. Kindly retain a copy of this email for future reference.
					<table width="621" height="244" border="1">
					  <tr>
						<td>Destination:'.$country.'</td>
						<td colspan="2">Travel Date: '.$start_date.'</td>
					  </tr>
					  <tr>
						<td>'.$trip_title.'</td>
						<td>Adult:'.$N.'</td>
						<td>Child'.$N1.'</td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td colspan="2">Total: '.$total.'</td>
					  </tr>
					</table>
					Best Regards,

					Tour Bookings ';
				
	$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
// $headers .= 'To: Ammar <ammar@fortsolution.com>' . "\r\n";
// $headers .= 'From: MoreThanFriends <ammar@fortsolution.com>' . "\r\n";
$headers1 .= 'To: '.$email.'' . "\r\n";
$headers1 .= 'From: apache@iamamol.com' . "\r\n";

	
	

	

	$mail_sent1 = mail( $to1, $subject1, $message1, $headers1 );
	
	echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
		session_start();
		
		
		$_SESSION['user_name']=$user_name;
		$_SESSION['country']=$country;
		$_SESSION['start_date']=$start_date;
		$_SESSION['trip_title']=$trip_title;
		$_SESSION['N']=$N;
		$_SESSION['N1']=$N1;
		$_SESSION['total']=$total;

$_SESSION['products']=NULL;
	


			
	echo '<'.'?'.'xml version="1.0" encoding="UTF-8"'.'?'.'>';	

?>
<ol>
<li>Tour Booking Ticket <a href="example_001.php" title="PDF [new window]" target="_blank">Click Here</a></li>
</ol>

                         
                            
               	  </div>
                    	<?php include('footer.php'); ?>
    	</div>
        			
      <div style="clear:both"></div>
   </div>

</body>
</html>
