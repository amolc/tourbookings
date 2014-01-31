<?php

 include('../../include/database/db.php'); 

 
$tour_id = mysql_real_escape_string($_POST['tour_id']);

$sql = mysql_query('Delete  FROM tour where id = "'.$tour_id.'"');
if($sql)
{
	echo "Deleted";
}
	  
?>
