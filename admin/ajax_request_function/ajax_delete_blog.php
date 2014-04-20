<?php
 include('../../include/database/db.php'); 

$blog_id = mysql_real_escape_string($_POST['blog_id']);
 //echo $id;exit;
	$sql = mysql_query("DELETE from blog WHERE  id = $blog_id");
	if($sql)
	{
		echo "DELETE";
	}
	else {
		echo "error";
	}

?>