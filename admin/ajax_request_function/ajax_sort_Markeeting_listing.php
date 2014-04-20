<?php 

	 include('../../include/database/db.php'); 
    $query = "";
	$message = "";
	$field_name = mysql_real_escape_string($_POST['field_name']);
	$filter = mysql_real_escape_string($_POST['filter']);
	
	if($field_name == 'name'){ $query = "SELECT * FROM marketing where name = '$filter'";}
	elseif($field_name == 'email'){$query = "SELECT * FROM marketing where email = '$filter'";}
	elseif($field_name == 'city'){$query = "SELECT * FROM marketing where city = '$filter'";}
	elseif($field_name == 'country'){$query = "SELECT * FROM marketing where country = '$filter'";}
	elseif($field_name == 'join_date'){$query = "SELECT * FROM marketing where join_date = '$filter'";}
	//echo $query;
	$res = mysql_query($query)or die(mysql_error());
       
	 $message .='<table class="table table-bordered datatable" id="table-1">
						<thead>
							<tr>
														
							    <th>ID</th>
								<th>Name</th>								
								<th>Email</th>
								<th>Contact No</th>
								<th>Company Name</th>
								<th>Address</th>
								<th>City</th>							
								<th>Country</th>
								<th>Joining Date</th>
								<th>Edit/Delete</th>

							</tr>
						</thead>
						<tbody>'; 

					while ($row = mysql_fetch_array($res)) 
							{ 
							
						
							$message .= '<tr class="odd gradeX">
								
								<td>'.$row['id'].'</td>
								<input type="hidden" id="ids" name="ids[]" value="'.$row['id'].'"/>
								<td>'.$row['name'].'</td>
								
								<td>'.$row['email'].'</td>
								<td>'.$row['contact_number'].'</td>
								<td>'.$row['company_name'].'</td>
								<td>'.$row['address'].'</td>
								<td>'.$row['city'].'</td>
								
								<td>'.$row['country'].'</td>
								<td>'.$row['join_date'].'</td>
								<td>
									<a href="edit_marketing.php?id='.$row['id'].'" class="edit btn btn-default btn-sm btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Edit
									</a>
									
									<a href="delete_marketing.php?id='.$row['id'].'" onclick="return confirm('."sure!!!".')" class="delete btn btn-danger btn-sm btn-icon icon-left">
										<i class="entypo-cancel"></i>
										Delete
									</a>
								</td>
							</tr>
							
							';
											
							}
							$message .= '</tbody></table>';
							
							if($message != "")
							{
							echo $message;
							}
							else
							{
							echo " No record Found";
							}
							
							
							
							
							
							
							
?>