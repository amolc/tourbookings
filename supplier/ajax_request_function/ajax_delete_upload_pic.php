<?php

 include('../../include/database/db.php'); 

 
$title = mysql_real_escape_string($_POST['title']);

$sql = mysql_query('Delete  FROM tour_photo where title = "'.$title.'"');
if($sql)
{
	echo "Deleted";
}
	  
?>
