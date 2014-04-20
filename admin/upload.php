<?php
 include('../include/database/db.php'); 
session_start();
$session_id='1'; //$session id
$path = "../supplier/uploads/";

$title = mysql_real_escape_string($_POST['title']);
$description = mysql_real_escape_string($_POST['description']);
$tour_id = mysql_real_escape_string($_POST['tour_id']);

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									mysql_query("insert into  tour_photo (tour_id,title,url,description) values('".$tour_id."','".$title."','".$actual_image_name."','".$description."')");

									$sql = mysql_query('SELECT * FROM tour_photo where title = "'.$title.'"');
										while ($row = mysql_fetch_array($sql)) 
										{ 						
												// echo "<img src='uploads/".$actual_image_name."'  class='preview'>";
											
											// echo" 
													// <table class='table table-bordered datatable' id='table-1'>
														// <thead>
															// <tr>
																// <th>Title</th>
																// <th>Discription</th>
																// <th>image</th>
																// <th>Delete</th>
															// </tr>
														// </thead>
														// <tbody id='photo_detail'>
																// <th>'".$title."'</th>
																// <th>'".$description."'</th>
																// <th><img src='uploads/".$actual_image_name."'  class='preview'></th>
																// <th><a class='delete_pic' href=''>Delete</a></th>
														// </tbody>

													// </table>
													// ";

										}
		
		
		
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>