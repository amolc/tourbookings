<?php 
//connect to db
if($_SERVER['HTTP_HOST']=="localhost"){
	$con = mysql_connect('localhost','root', '');
	$db	 = mysql_select_db('tourbookings-beta');  
	// $db	 = mysql_select_db('make_my_tour');
}else if ($_SERVER['HTTP_HOST']=="localhost:8080") {
	$con = @mysql_connect('localhost','root', '');
    $db	 = @mysql_select_db('tourbookings-beta');
}
else{
    //$con = mysql_connect('localhost','root', '10gXWOqeaf');
	//$db	 = mysql_select_db('tourbookings-beta');
}
?>
