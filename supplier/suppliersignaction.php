<?php          
                error_reporting('e_all');
				include("../include/database/db.php");				
				$username = $_POST['username'];
				$password = $_POST['password'];	
			    $query = "SELECT * FROM users WHERE user_name='$username' and password='$password'";
				$res = mysql_query($query);
                $rows = mysql_num_rows($res);
			    if ($rows==1) {     

                 $_SESSION['username'] = $_POST['username'];

			     // Jump to secured page
			      header("location:dashboard.php");			      
			     }
			     else {
			     // Jump to login page
			     header("Location: index.php");
			     }
			     
			     ?>
							}
           ?>