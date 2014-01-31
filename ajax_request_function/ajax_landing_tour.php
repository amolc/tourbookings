 <?php
 include('../include/database/db.php'); 
	// $sql = mysql_query('SELECT * FROM tour_photo where tour_id ="23"');
	$sql = mysql_query("SELECT
						tour.id,
						tour_photo.tour_id,
						tour.title,
						tour.city,
						tour.overview,
						tour.location_id,
						tour_photo.url
						FROM
						tour
						INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						WHERE tour.status = 'accepted' GROUP BY tour.location_id ORDER BY id DESC LIMIT 6
						");		
	// $sql = mysql_query("SELECT
						// tour.id,
						// tour_photo.tour_id,
						// tour.title,
						// tour.overview,
						// tour_photo.url,
						// tour.location_id
						// FROM
						// tour
						// INNER JOIN tour_photo ON tour.id = tour_photo.tour_id
						// WHERE tour.status = 'accepted' AND location_id = '".$country."'
						// GROUP BY tour.id
						// ORDER BY id DESC
						// LIMIT 6
						// ");
	while ($row = mysql_fetch_array($sql)) 
		{ 
		  if($row['url']==""){
			  $no_pic = 'no_preview.png';
			  }
			  else {
			  $no_pic = $row['url'];
			  }
	echo'
		  <div id="onload_id" class="city_tour fl">
			<span>
			  <img src="supplier/uploads/'.$no_pic.'" alt="" width="310" height="169">  
			  </span>
			  <h1>'.$row['location_id'].'</h1>
			  <p>'.$row['overview'].'</p>
			  <a href="index_city.php?location='.$row['location_id'].'">View All</a>
		  </div>
		';
		
		}
?>