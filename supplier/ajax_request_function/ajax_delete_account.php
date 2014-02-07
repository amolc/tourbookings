<?php

 include('../../include/database/db.php'); 

 
$account_id = mysql_real_escape_string($_POST['account_id']);

$sql = mysql_query('Delete  FROM supplier_bank_account where id = "'.$account_id.'"');
if($sql)
{
	echo "Deleted";
}
	  
?>