<?php 

 include('../include/database/db.php'); 
// echo $name;
$first_name = mysql_real_escape_string($_POST['first_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

$password = mysql_real_escape_string($_POST['password']);
$company_name = mysql_real_escape_string($_POST['company_name']);
$web_address = mysql_real_escape_string($_POST['web_address']);
$country = mysql_real_escape_string($_POST['country']);

$state = mysql_real_escape_string($_POST['state']);
$city = mysql_real_escape_string($_POST['city']);
$street_address = mysql_real_escape_string($_POST['street_address']);
$business_type = mysql_real_escape_string($_POST['business_type']);
$contact_number = mysql_real_escape_string($_POST['contact_number']);
$postcode = mysql_real_escape_string($_POST['postcode']);
$year_founded = mysql_real_escape_string($_POST['year_founded']);
$staff = mysql_real_escape_string($_POST['staff']);
$office_timing = mysql_real_escape_string($_POST['office_timing']);
$emergency_phone = mysql_real_escape_string($_POST['emergency_phone']);
$local_trips = mysql_real_escape_string($_POST['local_trips']);

$currency = mysql_real_escape_string($_POST['currency']);
$language = mysql_real_escape_string($_POST['language']);

	$sql   = "insert into supplier(first_name,last_name,phone,email,password,company_name,
				web_address,business_type,street_address,city,state,postcode,
				country,currency,language,year_founded,staff,office_timing,emergency_no,local_trip_date)
				values ('$first_name','$last_name','$phone','$email','$password','$company_name','$web_address','$business_type','$street_address','$city','$state','$postcode','$country','$currency','$language','$year_founded','$staff','$office_timing','$emergency_phone','$local_trips')";
	$query = mysql_query($sql);
	$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
				$current_date = date("m/d/Y", $today_date);
	 if($query){
							$result = mysql_query("SELECT * FROM supplier");
		
		//fetch tha data from the database 
		while ($row = mysql_fetch_array($result)) 
		{ 
				$sup_id = $row['id'];
		}
				
					$sql1   = "insert into supplier_payment(supplier_id,card,exp_date,code,total_price,status,insert_date) values ('$sup_id','123','$current_date','12345','454','unpaid','$current_date')";
				$query1 = mysql_query($sql1);
					
		
					$to = $email;
					$subject = "Partner Membership"; 
					$message = "Dear '".$first_name."' '".$last_name."'
				
								Thank you for successfully registering in our Travel Partner Program
								Your Login Information :
								User name: '".$email."'
								Password:  '".$password."'
								
								we will get beck to you soon with your login confirmation  once our team verify your membership
								
								Best Wishes
								http://tourbookings.co/
								"; 
								// '.$email.' and  password  '".$password."'"; 
									
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'To: '.$email.'' . "\r\n";
					$headers .= 'From: apache@iamamol.com' . "\r\n";

					$mail_sent = mail( $to, $subject, $message, $headers );
					
					// echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
	 
		echo "registration successful";
	}else {
		echo "error";
	} 

?>
