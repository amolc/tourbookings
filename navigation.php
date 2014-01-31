           	  <div class="top_nav fr">
               	<ul>
					<?php
						session_start();
						if(isset($_SESSION['user_name']))
						{ 
							$username = $_SESSION['user_name'];
					?>	
						<li><a href=""><?php echo $username; ?></a></li>
						<li><a href="logout.php">Logout</a></li>
						<!--<li><a href="#">Help</a></li>-->

					<?php
						}
						else {
						?>
							<!--<li><a href="contact_us.php">Contact&nbsp;Us</a></li>-->
							
							<li><a href="user_registeration_form.php">SignUp</a></li>
							<li><a href="user_login.php">Login</a></li>
							<!--<li><a href="help.php">Help</a></li>-->
						<?php

						}
					?>
                </ul>
                  <div class="wish_list">
                      <a href="#">0</a>
                  </div>
              </div>