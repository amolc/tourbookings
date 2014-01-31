<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('facebook/src/facebook.php');

  $config = array(
    'appId' => '250449465117327',
    'secret' => '9fd0b36dfbd465aece82df9feacde541',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

 $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

  <?php
      function render_login($facebook) {
          $canvas_page = 'http://www.yoursite.com/';
          // HERE YOU ASK THE USER TO ACCEPT YOUR APP AND SPECIFY THE PERMISSIONS NEEDED BY
          $login_url = $facebook->getLoginUrl(array('scope'=>'email,user_photos,friends_photos', 'redirect_uri'=>$canvas_page));
          echo 'Please <a href="' . $login_url . '">login.</a>';
      }

    if($user_id) {
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        render_login($facebook);
        echo "1";
        error_log($e->getType());
        error_log($e->getMessage());
      }
    } else {
       render_login($facebook);
       echo "2";
    }
  ?>

  </body>
</html>