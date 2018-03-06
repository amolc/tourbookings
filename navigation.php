    <?php include 'config.php'; ?>
              
              <div class="top_nav fr">
                <ul>
          <?php
            @session_start();
            // if(isset($_SESSION['company_name']))
            // {
            // $supplier_id = $_SESSION['supplier_id'];
            
            // }  
            // if(isset($_SESSION['balance']))
            // { 
            // $balance = $_SESSION['balance'];
            
            // }
          // if(isset($_SESSION['company_name']))
            // { 
              // $company_name = $_SESSION['company_name'];
              
              
                    // $result = mysql_query("SELECT
                  // booking.id,
                  // booking.tour_id,
                  // booking.user_id,
                  // booking.start_date,
                  // booking.status,
                  // payment.total_price,
                  // booking.supplier_id,
                  // tour_price.price_per_person,
                  // tour.title,
                  // tour.overview,
                                                                        // tour.duration,
                  // tour.city AS tour_city,
                  // tour.location_id AS tour_country,
                  // supplier.first_name AS supplier_first_name,
                  // supplier.last_name AS supplier_last_name,
                  // supplier.company_name,
                  // supplier.email AS supplier_email,
                  // supplier.city AS supplier_city,
                  // supplier.country AS supplier_country,
                  // user.first_name AS user_first_name,
                  // user.last_name AS user_last_name,
                  // user.country AS user_country,
                  // user.city AS user_city,
                  // user.email AS user_email,
                  // user.phone AS user_phone,
                  // user.address AS user_address,
                  // traveler.last_name as traveler_last_name ,
                  // traveler.first_name as traveler_first_name
                  // FROM
                  // booking
                  // INNER JOIN tour ON tour.id = booking.tour_id
                  // INNER JOIN tour_price ON tour_price.tour_id = tour.id
                  // INNER JOIN user ON user.id = booking.user_id
                  // INNER JOIN supplier ON supplier.id = booking.supplier_id
                  // INNER JOIN payment ON payment.id = booking.payment_id
                  // INNER JOIN traveler ON user.id = traveler.user_id AND tour.id = traveler.tour_id
                  // WHERE booking.status = 'confirm' AND booking.supplier_id = '".$supplier_id."'
                  // AND booking.withdraw='false'
                  // GROUP BY booking.id
                  // ORDER BY booking.id DESC
                  // ");

                // $balance ="";
    // while ($row = mysql_fetch_array($result)) 
    // {
        // $balance += $row['total_price'];
        // echo $supplier_id;
        
    // }
          ?>  
            <!--<li><a href="">Acount Balance: $ <?php //echo $balance; ?></a></li>
            <li><a href=""><?php //echo $company_name; ?></a></li>
                                                <li><a href="blog_view.php">Blog</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!--<li><a href="#">Help</a></li>-->

          <?php
            // } 
            // else
            if(isset($_SESSION['user_name']))
            { 
              $username = $_SESSION['user_name'];
          ?>  
            <li><a href=""><?php echo $username; ?></a></li>
            <li><a href="<?php echo SITE_URL; ?>/change_user_password.php">Change Password</a></li>
            <li><a href="my_tour.php">My Tour</a></li>
              <li><a href="<?php echo SITE_URL; ?>/cart_update.php">My Cart</a></li>
                                                 <li><a href="<?php echo SITE_URL; ?>/blog_view.php">Blog</a></li>
            <li><a href="<?php echo SITE_URL; ?>/logout.php">Logout</a></li>
            
            <!--<li><a href="#">Help Hello 123</a></li>-->

          <?php
            }
            else {
            ?>
              <!--<li><a href="contact_us.php">Contact&nbsp;Us</a></li>-->
              
                          
              <li><a class="menu" href="/index.php">HOME</a></li>
                      <li><a href="<?php echo SITE_URL; ?>supplier/index.php">SUPPLIER</a></li>   
                      <li><a class="menu" href="<?php echo SITE_URL; ?>supplier/customer_signup.php">CUSTOMER</a></li>
                      <li><a class="menu" href="<?php echo SITE_URL; ?>reseller/index.php">RESELLER</a></li>
                                 
          <!--<li><a href="help.php">Help</a></li>-->
            <?php

            }
          ?>
                </ul> 
                  
              </div>