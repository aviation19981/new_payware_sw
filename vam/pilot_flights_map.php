
<!DOCTYPE html>
<html>
<head>
<script
      src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAse6CjTQffTPy_k4oYaUj34d1A7py3rUQ &callback=initMap" type="text/javascript">
</script>
</head>
<body>
<?php
	/* Connect to Database */
	$db_map = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db_map->set_charset("utf8");
	if ($db_map->connect_errno > 0) {
		die('Unable to connect to database [' . $db_map->connect_error . ']');
	}
	// Execute SQL query
	$sql_map = "select from_airport departure, to_airport arrival ,date from pireps where valid<>3 and valid<>2 and gvauser_id=$id
    UNION
    select  SUBSTRING(OriginAirport,1,4) departure, SUBSTRING(DestinationAirport,1,4) arrival , CreatedOn as date from pirepfsfk where gvauser_id=$id
    UNION
    SELECT origin_id as departure, destination_id as arrival, date from reports where pilot_id=$id
	UNION
    SELECT departure, arrival, flight_date as date from vampireps where gvauser_id=$id
    order by date desc limit 10";
	if (!$result = $db_map->query($sql_map)) {
		die('There was an error running the query  [' . $db_map->error . ']');
	}
	unset($flights);
	$flights = array();
	$index = 0;
	while ($row = $result->fetch_assoc()) {
		$flights [$index] = $row["departure"];
		$index++;
		$flights [$index] = $row["arrival"];
		$index++;
	}

	$flights_coordinates = array ();
	$index = -1;
	foreach($flights as $flight) {
		$sql_map = "select latitude_deg, longitude_deg ,ident , airports.name as airport_name  from airports where ident='$flight'";
		if (!$result = $db_map->query($sql_map)) {
			die('There was an error running the query  [' . $db_map->error . ']');
		}
		while ($row = $result->fetch_assoc()) {
			$index++;
			$flights_coordinates [$index] = array ($row["latitude_deg"],  $row["longitude_deg"] ,  $row["ident"],  $row["airport_name"] ) ;
		}
	}
?>


<div id="map-outer" >
			<div id="map-container" ></div>
			<div id="over_map"></div>
		</div><!-- /map-outer -->

<style>
	body { background-color:#FFFFF }
	#map-outer {
		padding: 0px;
		border: 0px solid #CCC;
		margin-bottom: 0px;
		background-color:#FFFFF }
	#map-container { height: 660px }
	@media all and (max-width: 100%) {
		#map-outer  { height: 100% }
	}
	
	.panel-map > .panel-heading {
   
		border-radius: 15px 15px 15px 15px;
-moz-border-radius: 15px 15px 15px 15px;
-webkit-border-radius: 15px 15px 15px 15px;
border: 0px solid #000000;
}

.table-map > tbody > tr > td, .table > tfoot > tr > td {
    padding: 0px;
    line-height: 1.42857;
    vertical-align: top;
	border-radius: 15px 15px 15px 15px;
-moz-border-radius: 15px 15px 15px 15px;
-webkit-border-radius: 15px 15px 15px 15px;
border: 0px solid #000000;
}



</style>
<style>
   #wrapper { position: relative; }
   #over_map { position: absolute; top: 0px; left: 0px; z-index: 2;width: 30%}
</style>

</body>
<script type="text/javascript">
	function init_map() {
		var locations = <?php echo json_encode($flights_coordinates); ?>;
		var var_location = new google.maps.LatLng(4.0000000, -72.0000000);
		var var_mapoptions = {
			center: var_location,
			zoom: 2,
			styles: [{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{visibility:"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF",}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]}]
		};
		var var_map = new google.maps.Map(document.getElementById("map-container"),
				var_mapoptions);
		var k=0;
		while (k<20) {
			dep = new google.maps.LatLng(locations[k][0], locations[k][1]);
			arr = new google.maps.LatLng(locations[k+1][0], locations[k+1][1]);
			var icon_red = 'images/red-user-icon.png';
			//var icon_green = 'images/airport_runway_green.png';
			var icon_green = 'images/red-user-icon-small.png';
			var marker_dep = new google.maps.Marker({
				position: dep,
				icon: icon_green
			});
			var marker_arr = new google.maps.Marker({
				position: arr,
				icon: icon_green
			});
			marker_dep.setMap(var_map);
			marker_arr.setMap(var_map);
			var var_marker = new google.maps.Polyline({
				path: [dep, arr],
				geodesic: true,
				strokeColor: '#000000',
				strokeOpacity: 1.0,
				strokeWeight: 2
			});
			var_marker.setMap(var_map);
			var marker_dep = new google.maps.Marker({
				position: dep,
				icon: icon_green
			});
			var marker_arr = new google.maps.Marker({
				position: arr,
				icon: icon_green
			});
			marker_dep.setMap(var_map);
			marker_arr.setMap(var_map);
			k=k+2;
		}
	}
	google.maps.event.addDomListener(window, 'load', init_map);
</script>
</html>
