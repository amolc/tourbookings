<?php
 include('../include/database/db.php'); 
 
 $country_id = mysql_real_escape_string($_POST['country_id']);
	// $sql = mysql_query('SELECT * FROM tour_photo where tour_id ="23"');
	// $sql = mysql_query("SELECT
						// tour.id,
						// tour_photo.tour_id,
						// tour.title,
						// tour.overview,
						// tour_photo.url
						// FROM
						// tour
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' GROUP BY tour.id ORDER BY id DESC LIMIT 6
						// ");		
	$sql = mysql_query("SELECT
						tour.id,
						tour_photo.tour_id,
						tour.title,
						tour.overview,
						tour_photo.url,
						tour.location_id
						FROM
						tour
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' AND location_id = '".$country_id."'
						GROUP BY tour.id
						ORDER BY id DESC
						LIMIT 6
						");
	while ($row = mysql_fetch_array($sql)) 
		{ 
		
	echo'
		  <div id="onload_id" class="city_tour fl">
			  <span><img src="supplier/uploads/'.$row['url'].'" alt="" width="310" height="169"></span>
			  <h1>'.$row['title'].'</h1>
			  <p>'.$row['overview'].'</p>
			   <a href="tour_list.php?location='.$row['location_id'].'">View All</a>
		  </div>
		';
		
		}
?>