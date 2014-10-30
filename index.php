<!doctype html>
<?php

 include('include/database/db.php'); 
  
?>

<html>
<head>
<meta charset="utf-8">

<meta name="keywords" content="vacation tour books" />
<meta name="keywords" content="online tour booking" />
<meta name="keywords" content="virtual tour book" />
<meta name="keywords" content="tour booking software" />
<meta name="keywords" content="travel tour booking" />
<meta name="keywords" content="tour booking system" />
<meta name="keywords" content="tour booking agency" />
<meta name="keywords" content="package tour booking" />
<meta name="keywords" content="india tour booking" />
<meta name="keywords" content="warped tour bookings" />
<meta name="keywords" content="tour bookings" />
<meta name="keywords" content="tourbookings" />
<meta name="keywords" content="bookings" />
<meta name="keywords" content="tour" />

<title>Tour bookings</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<link href="css/flexslider2.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
     <!-- Picker UI-->  
    <script type="text/javascript" src="js/jquery.v2.0.3.js"></script>
    <!-- Custom Select -->
    <script type="text/javascript">
$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});
</script>
    <script type="text/javascript">
$(document).ready(function(){
    

       // $.ajax({
            // type:  'post',
            // url:  'ajax_request_function/ajax_landing_tour.php',
            // data: {},
            // success: function(mesg) {
              // alert(mesg);
              // $('.different_city').empty().append(mesg);

            // }
        // });    

    // $('.go').click(function(){
    
    // var country_id  = $('#country option:selected').text();

    
        // $.ajax({
            // type:  'post',
            // url:  'ajax_request_function/ajax_country_change_tour.php',
            // data: {country_id:country_id},
            // success: function(mesg) {
              // $('.different_city').empty().append(mesg);

            // }
        // });
        
    // });
    
        
        // $('#city').prop('disabled', true);
        // $('#country').change(function(){
        
            // alert('ok');
            // $('#city').prop('disabled', false);
        
        // });

});
</script>
    
</head>

<body>
    <div id="main_container">
        <div class="header_main fl">
            
            <div class="header_logo fl">
            <div class="header_top fl">
                <?php include('navigation.php'); ?>
            </div>
                <?php include('header_logo.php'); ?>
            </div>
        </div>
        <!--<div class="banner fl">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="images/Hongkong.jpg" width="1002" height="391">
            <div class="hong_index" >
                            <h1><a href="index_city.php?location=Hongkong">Hongkong</a></h1>-->
                            <!--<p>For all you shopaholics, you cannot miss out on the plethora of markets that Hong Kong has to offer</p>-->
                            <!--</div>
                    </li>
                    <li>
                        <img src="images/India.jpg" width="1002" height="391">
            <div class="india_index">
            <h1><a href="index_city.php?location=India">    India</a></h1>-->
            <!--<p>Visit the famous Taj Mahal, the ruins of Hampi or try Camel trekking!</p>-->
                        <!--</div>
                    </li>
                    <li>
                        <img src="images/Indonesia.jpg" width="1002" height="391">
            <div class="indonesia_index">
            <h1><a href="index_city.php?location=Indonesia">Indonesia</a></h1>-->
            <!--<p>Hosting some of the world’s most beautiful beaches</p>-->
            <!--</div>
                    </li>
                    <li>
                        <img src="images/Malaysia.jpg" width="1002" height="391">
            <div class="malaysia_index">
            <h1><a href="index_city.php?location=Malaysia">Malaysia</a></h1>-->
            <!--<p>Playing host to one of the world’s tallest towers</p>-->
                        <!--</div>
                    </li>
                    <li>
                <img src="images/Philippines.jpg" width="1002" height="391">
                        <div class="philippines_index">
                        <h1><a href="index_city.php?location=Philippines">Philippines</a></h1>-->
            <!--<p>the Banaue Rice Terraces, numerous diving spots and beaches</p>-->
            <!--</div>
                    </li>
                    <li>
                        <img src="images/Singapore.jpg" width="1002" height="391">
                        <div class="singapore_index">
                            <h1><a href="index_city.php?location=Singapore">Singapore</a></h1>-->
                            <!--<p>A cosmopolitan city-state that got to where it is today in just half a decade</p>-->
            <!--</div>
                    </li>
                </ul>
            </div>
        </div>-->
                <div class="center_body fl">

                    <!-- <div class="header_menu">
                        <ul>
                            <li>
                                <a href="#">Category</a>
                            </li>
                            <li>
                                <a href="#">Destinations</a>
                            </li>
                            <li>
                                <a href="#">Deals</a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="body_content fl">
                        <div class="latest_offers">
                            <h1>Welcome to TourBookings!</h1>
                            <p>
                                Through the hard work of our staff here at Tour Bookings, we are able to bring to you these irresistible deals at highly affordable prices. With a wide range of tours and deals available for all ages at these six beautifully unique countries, what are you waiting for? It doesn’t get anymore Asian than this!
                            </p>
                        </div>
                    <?php
                            $sql_tour = "SELECT
                                    tour.id,
                                    tour.title,
                                    tour.overview,
                                    tour_photo.url,
                                    tour_price.price_customer_adult
                                    FROM
                                    tour
                                    INNER JOIN tour_price ON tour.id = tour_price.tour_id
                                    INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
                                    WHERE tour.location_id = 'Singapore' LIMIT 0, 9";
                            $result_tour = mysql_query($sql_tour);
                            if(!$result_tour)die('Error query'.  mysql_error());
                    ?>                  
                    <div class="attractions fl">
                        <div class="header_bar"><h2>Singapore Attractions</h2></div>
                    <?php 
                        while($record = mysql_fetch_array($result_tour)){
                            $tour_id = $record['id'];
                            $tour_title = $record['title'];
                            $tour_overview = $record['overview'];
                            $tour_image_url = $record['url'];
                            $price = $record['price_customer_adult'];

                            if($tour_image_url==""){
                                $no_pic = 'no_preview.png';
                            } 
                            else{
                                $no_pic = $tour_image_url;
                            }
                    ?>
                        <div id="onload_id" class="city_tour fl">
                            <span><img src="supplier/uploads/<?php echo $no_pic; ?>" width="310" height="169"></span>
                            <h1><?php echo $tour_title; ?></h1>
                            <p>
                                <?php echo $tour_overview; ?>
                            </p>
                            <a href="tour_detail.php?tour_id=<?php echo $tour_id; ?>" class="view_detail fl">View Details</a>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="different_city fl">
                        <div class="header_bar"><h2>Hot Destinations</h2></div>
            <?php
                            // include('../include/database/db.php'); 
                            $sql = mysql_query("SELECT
                                                country.id,
                                                country.country_name,
                                                country.country_desc,
                                                country.country_image
                                                FROM
                                                country  LIMIT 6
                                                ");     
                            while ($row = mysql_fetch_array($sql)) 
                            { 
                                if($row['country_image']==""){
                                    $no_pic = 'no_preview.png';
                                }
                                else {
                                    $no_pic = $row['country_image'].'.jpg';
                                }
                                // strip tags to avoid breaking any html
                                // $string = strip_tags($string);
                                $string = strip_tags($row['country_desc']);

                                if (strlen($string) > 190) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 190);

                                    // make sure it ends in a word so assassinate doesn't become ass...
                                    // $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                     $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                }
                                            // echo $string;
                                echo '<div id="onload_id" class="city_tour fl">
                                      <span>
                                        <img src="images/'.$no_pic.'" alt="" width="310" height="169">  
                                        </span>
                                        <h1>'.$row['country_name'].'</h1>
                                        <p>'.$string.'</p>

                                        <a href="view_tour.php?location='.$row['country_name'].'">View All</a>
                                </div>';

                            }
                        ?>
                      

                        <!--  <div class="city_tour fl">
                              <span><img src="images/city_pic_4.jpg" alt="" width="310" height="169"></span>
                              <h1>Lorem ipsum dolor sit amet</h1>
                              <p>Lorem ipsum dolor sit amet, consec tetuer adipiscing. Praesent vestibu lum molestie lacuiirhs.</p>
                              <a href="tour_list.html">View All</a>
                          </div>-->

                      </div>
                <div style="padding-bottom:40px; margin-bottom:40px;border-bottom:1px solid #dbdbdb;float:left;width:1000px">     
                    <div  class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:20px; width:188px;">
                      
                            <ul>
                                <li><a href="index_city.php?location=Japan"><span class="country_index">Japan</span></a></li>
                                <li><a href="index_city.php?location=South Korea"><span class="country_index">South Korea</span></a></li>
                                <li><a href="index_city.php?location=Australia"><span class="country_index">Australia</span></a></li>
                                <li><a href="index_city.php?location=India"><span class="country_index">India</span></a></li>
                                <li><a href="index_city.php?location=Singapore"><span class="country_index">Singapore</span></a></li>
                                
                            </ul>
                            
                    </div>

                    <div class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:61px; width:150px;">
                            
                            <ul>
                                <li><a href="hongkong_city.php?location=Hong Kong"><span class="country_index">Hong Kong</span></a></li>
                                <li><a href="index_city.php?location=Indonesia"><span class="country_index">Indonesia</span></a></li>
                                <li><a href="index_city.php?location=Philippines"><span class="country_index">Philippines</span></a></li>
                                <li><a href="index_city.php?location=Malaysia"><span class="country_index">Malaysia</span></a></li>
                                <li><a href="index_city.php?location=Taiwan"><span class="country_index">Taiwan</span></a></li>
                                
                            </ul>
                            
                    </div>          

                    
                        <div class="hot_destinations fl" style="margin:0px 0px 0px 0px; width:205px; padding-left:123px;">
                            
                            <ul>
                                <li><a href="index_city.php?location=Thailand"><span class="country_index">Thailand</span></a></li>
                                <li><a href="index_city.php?location=Maldives"><span class="country_index">Maldives</span></a></li>
                                <li><a href="index_city.php?location=New Zealand"><span class="country_index">New Zealand</span></a></li>
                                <li><a href="index_city.php?location=Switzerland"><span class="country_index">Switzerland</span></a></li>
                                <li><a href="index_city.php?location=Paris"><span class="country_index">Paris</span></a></li>
                                
                            </ul>
                        </div>  
                        
                        <div class="hot_destinations fl" style="margin:0px 0px 0px 0px; padding-left:41px; width:150px;">
                            
                            <ul>
                                <li><a href="index_city.php?location=Germany"><span class="country_index">Germany</span></a></li>
                                <li><a href="index_city.php?location=France"><span class="country_index">France</span></a></li>
                                <li><a href="index_city.php?location=United Arab Emirates"><span class="country_index">United Arab Emirates</span></a></li>
                                <li><a href="index_city.php?location=Vietnam"><span class="country_index">Vietnam</span></a></li>
                                <li><a href="index_city.php?location=Cambodia"><span class="country_index">Cambodia</span></a></li>
                                
                            </ul>
                        </div>  
                </div>  
                        <div class="hot_destinations fl" style="width:250px;">
                            <h2 style="width:275px;">Hot Destinations</h2>
                            <ul style="width:245px;">
                                <li style="width:245px;"><a href='tour_list.php?location=Bali'>Bali</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=Delhi'>Delhi</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=Singapore'>Singapore</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=Kuala Lumpur'>Kuala Lumpur</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=Boracay'>Boracay</a></li>
                                <li style="width:245px;"><a href='hongkong_city.php?location=Hong Kong'>Hong Kong</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=jaipur'>Jaipur</a></li>
                                <li style="width:245px;"><a href='tour_list.php?location=Kota Kinabalu'>Kota Kinabalu</a></li>
                            </ul>
                            <!--<ul class="mrgn_right">
                                <li><a href='category_view.php?cat_name=Outdoor Activities'>Outdoor Activities</a></li>
                                <li><a href='category_view.php?cat_name=Day Trips & Excursions'>Day Trips & Excursions</a></li>
                                <li><a href='category_view.php?cat_name=Food, Wine & Nightlife'>Food, Wine & Nightlife</a></li>
                                <li><a href='category_view.php?cat_name=Water Sports'>Water Sports</a></li>
                                <li><a href='category_view.php?cat_name=Private & Custom Tours'>Private & Custom Tours</a></li>
                                <li><a href='category_view.php?cat_name=Multi-day & Extended Tours'>Multi-day & Extended Tours</a></li>
                            </ul>-->
                        </div>
                        
            <div class="welcome fl" style="float:left;width:300px;">
                            <h1>Why Tour Bookings!</h1>
                            <img src="images/welcome_pic_1.jpg" width="300" height="169">
        
                            <br> <p style="width:300px;">
                            Here at Tour Bookings, every customer is our VIP! There is no need for you to scour the web to search for things to do on your vacation, no need to rummage through the tons of information on the Internet. We have done all of that for you! Everything is made available to you in the comfort of your home, on a single site. 
                            </p>
                        </div>
                        
                    <!--<div class="our_featured fr">-->
                      <?php
            
// $result2 = mysql_query("SELECT
                        // t.title,
                        // t.url,
                        // p.id,
                        // p.title,
                        // p.city,
                        // p.`status`,
                        // p.supplier_id,
                        // p.overview,
                        // p.hilight,
                        // p.why_this,
                        // p.duration
                        // FROM tour p LEFT JOIN tour_photo t ON (
                            // p.id = t.tour_id
                        // )
                        // GROUP BY p.id ORDER BY p.id DESC LIMIT 10
                        // ");          
                                        /*$result2 = mysql_query("SELECT
                        tour.id,
                        tour.tour_type,
                        tour.title,
                        tour.overview,
                        tour.hilight,
                        tour.why_this,
                        tour.location_id,
                        tour.city,
                        tour.duration,
                        tour.deparchture_point,
                        tour.deparchture_time,
                        tour.return_detail,
                        tour.inclusions,
                        tour.exclusions,
                        tour.voucher_info,
                        tour.local_operator_info,
                        tour.status,
                        tour.supplier_id,
                        tour_photo.url,
                        tour_photo.title,
                        tour_price.price_per_person,
                        tour_price.price_customer_adult,
                        tour_photo.description
                        FROM
                        tour
                        INNER JOIN tour_price ON tour.id = tour_price.tour_id
                        INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
                        WHERE tour.status = 'accepted'   GROUP BY tour.id
                        DESC LIMIT 10
                        ");*/
                
    ?>  
    
                <!--<h1>Our Featured Tours</h1>
                <div class="banner fr" style="width:310px;">
                <div  class="flexslider" id="flexslider">
                <ul class="slides" >-->
        <?php 
                    /*while ($row2 = mysql_fetch_array($result2)) 
                    { 
                        if (strlen($string=$row2["overview"]) > 190) {
                            // truncate string
                            $stringCut = substr($string, 0, 190);

                            // make sure it ends in a word so assassinate doesn't become ass...
                            // $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                        }       

        
                        echo '<li>'
                        .'<img style="width:310px; float:left;" src="supplier/uploads/'.$row2['url'].'" alt="Tour Image" width="310" height="169" />'
                        .'<p style="float:left; height:65px;">'.$string.'</p>'
                        .'<div class="view_more"><a href="tour_detail.php?tour_id='.$row2['id'].'">View More...</a></div>'
                        .'</li>';                   
                    }*/ 
                  ?>                    
          <!--</ul>
        </div>
        </div>
                     </div>-->
                        
                    </div>
                
                  <?php include('footer.php'); ?>
                </div>
      <div style="clear:both"></div>
   </div>
   
    <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>
  
  <!-- Google Analytics-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50362006-1', 'tourbookings.co');
  ga('send', 'pageview');

  </script> 

</body>
</html>
