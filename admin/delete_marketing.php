<?php 

include('../include/database/db.php'); 
 
$id = $_REQUEST['id'];

$query_delete = "DELETE FROM marketing WHERE id = $id" ; 
mysql_query($query_delete);
header("Location:email_to_marketing.php?deleted=ok");
?>