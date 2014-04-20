<?php

 include('../../include/database/db.php'); 

 
$tour_id = mysql_real_escape_string($_POST['tour_id']);
echo $tour_id;exit;
$sql = mysql_query('SELECT * FROM tour_photo where tour_id = "'.$tour_id.'"');
	while ($row = mysql_fetch_array($sql)) 
		{ 
		
	echo'
		<tr class="odd gradeX">
			<td>'.$row['title'].'</td>
			<td>'.$row['description'].'</td>
			<td><img src="uploads/'.$row['url'].'"  class="preview"></td>
			<td>
				<a href="#"  class="delete_pic btn btn-danger btn-sm btn-icon icon-left">
					<i class="entypo-cancel"></i>
					Delete
				</a>
			</td>
		</tr>
		';
		
		}
	  
?>
