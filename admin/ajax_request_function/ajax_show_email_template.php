<?php 

	 include('../../include/database/db.php'); 

	$message = "";
	$id = mysql_real_escape_string($_POST['template_id']);
	
	$query = "SELECT * FROM email_template where id = '$id'";
	//echo $query;
	$res = mysql_query($query)or die(mysql_error());
	$row = mysql_fetch_array($res);
	//echo $row['message_from'];
       
	 $message .='
	 <h1>Email Template</h1>
		<div class="mail-compose">
		
			<form method="post" action="" >
				
				<div class="form-group" style="width:50%;">
					<label for="to">From:</label>
					<input type="text" class="form-control" name ="from" id="from" tabindex="2" value=" '.$row['message_from'].'"/>
				</div>
				
				<div class="form-group" style="width:50%;">
					<label for="to">To:</label>
					<input  type="text" class="form-control" name ="to" id="to" tabindex="2" value="'.$row['message_to'].'" />
				</div>
				
				<div class="form-group" style="width:50%;">
					<label for="subject">Subject:</label>
					<input  type="text" class="form-control" id="subject" name="subject"; tabindex="1" value="'.$row['message_subject'].'" />
				</div>
				
                <div>'.$row['text'].'</div>				
				 
				<br>
			</form>
		
		</div>
	 ';
							if($message != "")
							{
							echo $message;
							}
							else
							{
							echo " No record Found";
							}
							
							
				// <div class="compose-message-editor" style="width:50%;" >
					// <textarea style="height:20%;" class="form-control wysihtml5" name="message" id="message" >"'.$row['text'].'"</textarea>
				// </div>			
							
							
							
							
?>