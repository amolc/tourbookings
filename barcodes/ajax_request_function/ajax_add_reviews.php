<?php 
session_start(); 
if(isset($_SESSION['user_id'])){
 $customer_id = $_SESSION['user_id'];
	
 include('../include/database/db.php'); 
    	
    	$thepost = $_POST['post_id'];
// $customer_id = mysql_real_escape_string($_POST['user_id']);
$tour_id = mysql_real_escape_string($_POST['tour_id']);
// $customer_id = 1;
$rating = mysql_real_escape_string($_POST['rate']);
// $rating = $_POST['rate'];
$comments_box = mysql_real_escape_string($_POST['comments_box']);
// echo $tour_id;
// $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
// $current_date = date("m/d/Y", $today_date);
// $current_date = mysql_real_escape_string($_POST['current_date']);
// echo $poi_id;
	$sql   = "insert into tour_feedback(tour_id,customer_id,rating,review) values('".$tour_id."','".$customer_id."','".$rating."','".$comments_box."')";
	// $sql   = "insert into tour_feedback(tour_id,customer_id,rating,desc) values ('$tour_id','$customer_id','$rating','$comments_box')";
	// print_r($sql);
	$query = mysql_query($sql);
	 if($query){
		echo "successful";
	}else {
		echo "error";
	} 
}
else {
// header("Location: user_login.php");
echo "Please Login First";

}
?>
