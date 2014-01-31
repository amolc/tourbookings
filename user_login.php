<?php 
 include('include/database/db.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <!-- <script src="js/all.js"></script>
    <span id="fb-root"></span>-->
<script type="text/javascript">
$(document).ready(function(){
	//alert('razamalik');
		
		$('#password').keydown(function (e){
			if(e.keyCode == 13){
			
				e.preventDefault();
				$('#registeration_button').trigger('click');
			
			}
		})
			
	
	$('#registeration_button').click(function(){


		var name = $('#name').val();
		var password =	$('#password').val();

		  // $('#password').on('focus change', function(){
        // if($(this).val()!=''){
        // $('.error_mesg').remove();
        // } else { 
          // what you're doing in the blur function$('.error_mesg').remove();
        // }
    // });

		if(name == "" || password == "") {
				$('.error_mesg').empty().append('Please fill up all required fields!!');
				// $('.error_pass').empty().append('Password Enter!');
		}

		else {
		$('.error_mesg').remove();
	
			   $.ajax({
					type:  'post',
					url:  'ajax_request_function/ajax_user_login.php',
					data: {name:name,password:password },
					success: function(mesg) {
					  //alert(mesg);

					   if(mesg == '0'){
						 $('.success_mesg').empty().append('Username or Password is incorrect!');
						}
						else {
							window.location.href = 'index.php'
						}
					}
				});
			}

	});

});
</script>

</head>

<body>

        <?php /*

    //facebook application configuration
    $fbconfig['appid' ] = "408222749310397";
    $fbconfig['secret'] = "f4d31a646e82bd703535785c42a28fb6";

    try{
        include_once ('./facebook/src/facebook.php');
    }
    catch(Exception $o){
        print_r($o);
    }

	$app_id  = "408222749310397";
	$app_secret = "f4d31a646e82bd703535785c42a28fb6";

	$facebook = new Facebook(array(
    'appId'  => $app_id, // your application id
    'secret' => $app_secret, // your application secret
    'cookie' => false,
	));
	
	  


 	$user = $facebook->getUser();

	
 	$user_fb_id = $user;

	$loginUrl   = $facebook->getLoginUrl(
        array(
            'scope' =>  'no'
        )
	);

	if ($user) {


    $href= $facebook->getLogoutUrl();
    $text= "LogOut";
	echo "<h3 class='logout'><a href='".$href."'>".$text."</a></h3>";


	try {
	// Proceed knowing you have a logged in user who's authenticated.
	$permissions = $facebook->api('/me/permissions');
   } catch (FacebookApiException $e) {
    $user = null;
  	}
 	}


 if (!$user) {
    echo     "no user logged in";//"<script type='text/javascript'>top.location.href = '$loginUrl'/script>";
  }

	$facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));

    $user       = $facebook->getUser();
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope' => 'publish_stream,read_stream,email,friends_birthday,user_relationships,friends_relationships'
				
            )
    );

			 $params = array(
  'scope' => 'publish_stream,user_photos',
  'redirect_uri' => 'http://apps.fountaintechies.com/tourbookings/index.php'
    );
	$loginUrl = $facebook->getLoginUrl($params);
	
    if ($user) {
      try {
        $user_profile = $facebook->api('/me');
        $user_friends = $facebook->api('/me/friends?fields=name,email,gender,relationship_status');
		$access_token = $facebook->getAccessToken();
      } catch (FacebookApiException $e) {
        // d($e);
        $user = null;
      }
    }

    if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }

        $fql_query  =   array(
                             'method' => 'fql.query',
                             'query'  => "SELECT uid,name,email,relationship_status,birthday FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1=me())");

         $result = $facebook->api($fql_query);
		 
	     $total_friends = count($user_friends['data']); ?>
		 
		                <!-- Each div below is considered a slide -->
                <?php
								 $fb_user_id =  $user_profile['id'];
								 $fb_user_name	= $user_profile['name'];
								 $fb_user_email	= $user_profile['email'];
								 $fb_user_gender2	= $user_profile['gender'];
								 // $fb_user_gender2;
								 // echo $fb_user_email;
								 // $fb_user_id;
							$sql_chk_user = mysql_query("SELECT * FROM user WHERE name='$fb_user_id'");
						
							if(mysql_num_rows(@$sql_chk_user)> 0)
							 {
							  //echo"name already exists";
							 }
							else
							   {
							   
							$sql_insert_user   = "insert into user(name, gender, email) values ('$fb_user_id', '$fb_user_name', '$fb_user_email')";
							mysql_query($sql_insert_user);
				*/
						?>

	<div id="main_container">
    	<div class="header_main fl">
        	<div class="header_top fl">
           	   <?php include('navigation.php'); ?>
            </div>
            <div class="header_logo fl">
				<?php include('header_logo.php'); ?>
            </div>
    	</div>

        	<div class="banner fl"><img src="images/banner.jpg" alt="" width="1002" height="391"></div>

            	<div class="center_body fl">
                	<div style="background:#fd8900;" class="left_penal fl">
                    	<div style="background:none;" class="insider_guide fl">
                        	<!--<h1>Insider's Guide to Singapore</h1>
                            <p>Major attractions, tips and our top<br>
							things to see and do.</p>
                            <a href="#">Look Inside</a>-->
                        </div>

                        	<div style="display:none;" class="singapore_things fl">
                            	<h2>Singapore Things To Do</h2>

                                	<ul>
                                    	<li><a href="#">All Things to Do...</a></li>
                                        <li><a href="#">Cruises, Sailing & Water Tours</a></li>
                                        <li><a href="#">Cultural & Theme Tours</a></li>
                                        <li><a href="#">Day Trips & Excursions</a></li>
                                        <li><a href="#">Food, Wine & Nightlife</a></li>
                                        <li><a href="#" class="active">Multi-day & Exttended Tours</a></li>
                                        <li><a href="#">Outdoor Activities</a></li>
                                        <li><a href="#">Private & Custom Tours</a></li>
                                        <li><a href="#">Shore Excursions</a></li>
                                        <li><a href="#">Shows, Concerts & Sports</a></li>
                                        <li><a href="#">Sightseeing Tickets & Passes</a></li>
                                        <li><a href="#">Theme Parks</a></li>
                                        <li><a href="#">Tours & Sightseeing</a></li>
                                        <li><a href="#">Transfers & Ground Transport</a></li>
                                        <li><a href="#">Walking & Biking Tours</a></li>
                                        <li><a href="#">Water Sports</a></li>
                                        <li class="border"><a href="#" class="active">See all things to do...</a></li>
                                    </ul>

                            </div>

                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Recommended</h2>

                                	<ul>
                                    	<li><a href="#">All Recommendations... </a></li>
                                        <li><a href="#">Our Top 10 Insider's Picks</a></li>
                                        <li><a href="#">Deals & Discounts </a></li>
                                        <li><a href="#">Family Friendly </a></li>
                                        <li><a href="#">Luxury & Special Occasions </a></li>
                                        <li><a href="#" class="active">Singapore Quays </a></li>
                                        <li><a href="#">Malaysia Tours from Singapore </a></li>
                                        <li><a href="#">Cruises from Singapore</a></li>
                                        <li class="border"><a href="#" class="active">See all recommendations...</a></li>
                                    </ul>

                            </div>

                            <div style="display:none;" class="singapore_things fl">
                            	<h2>Top Attractions</h2>

                                	<ul>
                                    	<li><a href="#">All Attractions...</a></li>
                                        <li><a href="#">Singapore Zoo Breakfast</a></li>
                                        <li><a href="#">Singapore Zoo</a></li>
                                        <li><a href="#">Singapore Chinatown</a></li>
                                        <li><a href="#">Sentosa Island</a></li>
                                        <li><a href="#" class="active">Universal Studios Singapore</a></li>
                                        <li><a href="#">Orchard Road</a></li>
                                        <li><a href="#">Marina Bay Sands</a></li>
                                        <li class="border"><a href="#" class="active">See all attractions...</a></li>
                                    </ul>

                      </div>

                            <div style="display:none;" class="chat_now fl"><img src="images/chat_now.jpg" alt="" width="296" height="186"></div>

                    </div>

                    	<div class="right_penal fl">

                            <div class="administrator_details fl">

                                <h4>User Login</h4>

                                <div class="register_form fl">
                                  <label>* Username:</label>
                                  <input name="name" id="name" type="text">
                                <label>* Password:</label>
                                <input name="password" id="password" type="password">
								
                              </div>
							  <span style="float: left;margin-left: 242px;color: red;" class="error_mesg"></span>
							  <h2 style="padding-left: 260px;" class="success_mesg"></h2>
                            </div>

                            <div class="administrator_details fl">


                              <div class="register_form fl">
                                <input name="Submit" value="Login" id="registeration_button" type="submit">
								<div style="float: right;padding: 6px;">
									<div><a href="forget_pass.php">Forgot your password? </a></div>
								<div><span>If Your Are Not Member?</span> <a href="user_registeration_form.php">Sign UP </a></div>
								</div>
                              </div>
                            </div>


               	  </div>

                    <?php include('footer.php'); ?>
                </div>

      <div style="clear:both"></div>
   </div>

</body>
</html>
