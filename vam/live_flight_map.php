
<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Avianca Virtual</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="icon" href="./images/favicon.ico">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css"/>
	<script src="js/bootstrapValidator.min.js" type="text/javascript"></script>
	<script src="Charts/Chart.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/jquery.confirm.min.js" type="text/javascript"></script>	
		
		<!-- Custom styles for this template -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/morris.css" rel="stylesheet">
	<!-- data tables plugins -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/numeric-comma.js"></script>
	<script src="js/raphael.min.js" type="text/javascript"></script>
	<script src="js/morris.min.js" type="text/javascript"></script>
	<!-- VAM javascript -->
	<script src="js/vam.js" type="text/javascript"></script>
	<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAse6CjTQffTPy_k4oYaUj34d1A7py3rUQ&callback=initMap" type="text/javascript">
</script>
	<meta http-equiv="refresh" content="300">
	</head>
	<body class="landing">
<body>
<?php
	include('./db_login.php');
	$db_map = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db_map->set_charset("utf8");
	if ($db_map->connect_errno > 0) {
		die('Unable to connect to database [' . $db_map->connect_error . ']');
	}
	$sql_map = "select plane_type,ias,flight_id,u.gvauser_id as gvauser_id,u.callsign as callsign,u.name as name,gs,altitude,surname,departure,arrival,latitude,longitude,flight_status,heading,perc_completed,
				pending_nm, a1.latitude_deg as dep_lat, a1.longitude_deg as dep_lon , a2.latitude_deg as arr_lat, a2.longitude_deg as arr_lon , network
				from vam_live_flights lf, gvausers u , airports a1, airports a2 where u.gvauser_id=lf.gvauser_id and lf.departure=a1.ident and lf.arrival=a2.ident";
	if (!$result = $db_map->query($sql_map)) {
		die('There was an error running the query  [' . $db_map->error . ']');
	}
	unset($flights_coordinates);
	unset($flight);
	unset($liveflights);
	unset($datos);
	unset($jsonarray);
	$flights_coordinates = array();
	$datos = array ();
	$flight = array();
	$liveflights = array ();
	$jsonarray = array ();
	$index = 0;
	$index2=0;
	$flightindex=0;
	while ($row = $result->fetch_assoc()) {
			$flight["gvauser_id"]=$row["gvauser_id"];
			$flight["callsign"]=$row["callsign"];
			$flight["name"]=$row["name"];
			$flight["gs"]=$row["gs"];
			$flight["ias"]=$row["ias"];
			$flight["altitude"]=$row["altitude"];
			$flight["surname"]=$row["surname"];
			$flight["departure"]=$row["departure"];
			$flight["arrival"]=$row["arrival"];
			$flight["latitude"]=$row["latitude"];
			$flight["longitude"]=$row["longitude"];
			$flight["flight_status"]=$row["flight_status"];
			$flight["heading"]=$row["heading"];
			$flight["dep_lat"]=$row["dep_lat"];
			$flight["dep_lon"]=$row["dep_lon"];
			$flight["arr_lat"]=$row["arr_lat"];
			$flight["arr_lon"]=$row["arr_lon"];
			$flight["perc_completed"]=$row["perc_completed"];
			$flight["pending_nm"]=$row["pending_nm"];
			$flight["network"]=$row["network"];
			$flight["plane_type"]=$row["plane_type"];
			
		if(empty($flight["plane_type"])) {
				$flight["picture_plane"] = "https://images.vexels.com/media/users/3/135273/isolated/preview/ba6c7edd3e6fa898336190c93e645511-el-transporte-de-movimiento-del-avi-n-by-vexels.png";
		} else {
				$sql_plane = "select * from fleettypes where plane_icao='".$row["plane_type"]."'";
		        if (!$result_plane = $db_map->query($sql_plane)) {
			       die('There was an error running the query  [' . $db_map->error . ']');
		        }
			    while ($row_plane = $result_plane->fetch_assoc()) {
					$flight["picture_plane"] = $row_plane["image_url"];
			    }
			
			
		}
		
		
		if($row["departure"]<>"" && $row["arrival"]<>""){
	  
    $sql_name ="select * from airports where ident='".$row["departure"]."'";

	if (!$result_name = $db_map->query($sql_name)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	while ($row_name = $result_name->fetch_assoc()) {
		
	   $flight["dep_name"]= $row_name["municipality"];
       $flight["dep_name_iso"]=$row_name["iso_country"];

		
	}
	
   
	
  
   $sql_name2 ="select * from airports where ident='".$row["arrival"]."'";

	if (!$result_name2 = $db_map->query($sql_name2)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	while ($row_name2 = $result_name2->fetch_assoc()) {
		
			$flight["arr_name"]= $row_name2["municipality"];
            $flight["arr_name_iso"]=$row_name2["iso_country"];
				
	}
	
	
	
	
	}
	
	
	                    if  ($row["perc_completed"]>=70){
							$flight["bar"]='progress-bar progress-bar-success';
						}
						else if ($row["perc_completed"]<70 || $row["perc_completed"]>=35 )

						{ $flight["bar"]='progress-bar progress-bar-warning'; }

						if ($row["perc_completed"]<35  ) {

							$flight["bar"]='progress-bar progress-bar-danger';
						}

		
		
			$liveflights[$flightindex] =$flight;
		$sql_map2 = "select * from vam_live_acars where flight_id='".$row["flight_id"]."' order by id asc";
		if (!$result2 = $db_map->query($sql_map2)) {
			die('There was an error running the query  [' . $db_map->error . ']');
		}
			while ($row2 = $result2->fetch_assoc()) {
				$flights_coordinates ["gvauser_id"] = $row2["gvauser_id"];
				$flights_coordinates ["latitude"] = $row2["latitude"];
				$flights_coordinates ["longitude"] = $row2["longitude"];
				$flights_coordinates ["heading"] = $row2["heading"];
				$datos [$index2][$index] = $flights_coordinates;
				$index ++;
				}
		$index=0  ;
		$index2 ++;
		$flightindex ++;
	}
	$jsonarray[0]=$liveflights;
	$jsonarray[1]=$datos;
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
   #over_map { position: absolute; top: 0px; left: 0px; z-index: 99;width: 30%}
</style>


<style type="text/css">

.progress{margin-top:15px;height:6px;box-shadow:none;margin-bottom:10px}#tbl-flights .progress{margin-top:7px;height:10px;margin-bottom:0}.progress-bar{box-shadow:none}

.tg  {border-collapse:collapse;border-spacing:0;
border-radius: 45px 45px 45px 45px;
-moz-border-radius: 45px 45px 45px 45px;
-webkit-border-radius: 45px 45px 45px 45px;
border: 0px solid #000000;
background-color: #ffffff;
}

.tg td{font-family:Arial, sans-serif;font-size:14px;padding:6px 20px;border-style:solid;border-width:0px;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:6px 20px;border-style:solid;border-width:0px;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}




#caja {
background-color: #ae0200;
height: 40px;
/*para Firefox*/
-moz-border-radius: 0px 15px 0px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 15px 0px 0px;
/* para Opera */
border-radius: 0px 15px 0px 0px;

}

#caja1 {
background-color: #ae0200;
height: 5px;
/*para Firefox*/
-moz-border-radius: 0px 0px 0px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 0px 0px 0px;
/* para Opera */
border-radius: 0px 0px 0px 0px;
}

#caja2 {
background-color: #ae0200;
padding: 10px;
height: 85px;
/*para Firefox*/
-moz-border-radius: 0px 0px 0px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 0px 0px 0px;
/* para Opera */
border-radius: 0px 0px 0px 0px;
}


#caja3 {
background-color: #ae0200;
height: 40px;
/*para Firefox*/
-moz-border-radius: 0px 0px 15px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 0px 15px 0px;
/* para Opera */
border-radius: 0px 0px 15px 0px;
}


#caja4 {
background-color: #ae0200;
height: 5px;
/*para Firefox*/
-moz-border-radius: 0px 0px 0px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 0px 0px 0px;
/* para Opera */
border-radius: 0px 0px 0px 0px;
}




#caja8 {
background-color: #ae0200;
height: 100px;
/*para Firefox*/
-moz-border-radius: 0px 0px 0px 0px;
/*para Safari y Chrome*/
-webkit-border-radius: 0px 0px 0px 0px;
/* para Opera */
border-radius: 0px 0px 0px 0px;
}
</style>


</body>
<script type="text/javascript">
	var mapCentre;
	var map ;
	function init_map() {
		var flights = <?php echo json_encode($jsonarray[0]); ?>;
		var locations = <?php echo json_encode($jsonarray[1]); ?>;
		var numpoints=(locations.length);
		console.log(locations);
		var var_location = new google.maps.LatLng(<?php echo $datos[0][0]["latitude"]; ?>,<?php echo $datos[0][0]["longitude"]; ?>);
		var var_mapoptions = {
			center: var_location,
			minZoom: 3,
			zoom: 5,
			refreshTime: 100000,
autorefresh: true,
			styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
		};
		map = new google.maps.Map(document.getElementById('map-container'),	var_mapoptions);
		var mapas=[];
		var flightPlanCoordinates=[];
		var flightPath = new google.maps.Polyline({
		strokeColor: "#c3524f",
		strokeOpacity: 1,
		strokeWeight: 2,
		geodesic: true
		});
		var k=0;
		var z=0;
		var coordinate;
		while (k<numpoints) {
			while (z < locations[k].length)
			{
				coordinate =new google.maps.LatLng(locations[k][z]['latitude'],locations[k][z]['longitude']);
				flightPlanCoordinates.push(coordinate);
				z=z+1;
			}
			ruta = new google.maps.Polyline({
			geodesic: true,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 2
			});
			ruta.setPath(flightPlanCoordinates);
			mapas.push(ruta);
			z=0;
			k=k+1;
		};
		function createMarker(pos, t) {
		var coord=[];
		var pathcoord=[];
		var flight_id = t;
		currentPath = new google.maps.Polyline({
			geodesic: true,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 2
			});
		// Plane marker begin
		var image = new google.maps.MarkerImage('./map_ava/'+flights[t]['heading'] +".png",null,new google.maps.Point(0,0),new google.maps.Point(15, 15),new google.maps.Size(40, 40));
		var icon_airport_dep = new google.maps.MarkerImage("./map_icons/airport_yellow_marker.png");
		var icon_airport_arr = new google.maps.MarkerImage("./map_icons/airport_blue_marker.png");
		var lineSymbol = {path: 'M 0,-1 0,1', strokeOpacity: 1, scale: 1 };
		var lat1 = flights[t]["dep_lat"];
		var lat2 = flights[t]["arr_lat"];
		var lng1 = flights[t]["dep_lon"];
		var lng2 = flights[t]["arr_lon"];
		var dep = new google.maps.LatLng(lat1, lng1)
		var arr = new google.maps.LatLng(lat2, lng2)
		
		var informaciones = flights[t]['callsign'];
			
			
		var marker = new google.maps.Marker({
			position: pos,
			icon: image,
			name: t,
			contenido: informaciones,


icao1:new google.maps.Marker({
							position: dep,
							 map: map,
							 icon: icon_airport_dep,
							 visible: false
						}),
						icao2:new google.maps.Marker({
							position: arr,
							 map: map,
							 icon: icon_airport_arr,
							 visible: false
						}),
                        line1:new google.maps.Polyline({
							path: [dep, pos],
							strokeColor: "#08088A",
							strokeOpacity: 1,
							strokeWeight: 2,
							geodesic: true,
							map: map,
							polylineID: t,
							visible: false
                        })	,
                        line2:new google.maps.Polyline({
							path: [pos, arr],
							strokeColor: "#FE2E2E",
							strokeOpacity: .3,
							geodesic: true,
							map: map,
							icons: [{
								icon: lineSymbol,
								offset: '0',
								repeat: '5px'
							}],
							polylineID: t,
							visible: false
                        })
			
		});
		// On mouse over
        google.maps.event.addListener(marker, 'mouseover', function () {
            //infowindow.open(map, marker);
            this.get('line1').setVisible(true);
            this.get('line2').setVisible(true);
			this.get('icao1').setVisible(true);
			this.get('icao2').setVisible(true);
			//infowindow.open(map,marker);
		    //infowindow.setContent(marker.contenido);
		    var s=0;
		    coord.length = 0;
		    pathcoord.length = 0;
		   while (s < locations[flight_id].length)
			 {
			 	coord= new google.maps.LatLng(locations[flight_id][s]['latitude'],locations[flight_id][s]['longitude']);
			 	pathcoord.push(coord);
			 	s=s+1;
			 }
			 currentPath.setPath(pathcoord);
			 currentPath.setMap(map);
			 
			 flight_detail='<table class="tg"  width="100%" >'+

'<tr>'+
    '<th class="tg-031e"    id="caja"  colspan="3"><center><img src="./images/avianca/1.png" width="40%" ></center></th>'+
  '</tr>'+
  '<tr >'+
    '<td class="tg-031e" color="white" id="caja1" colspan="3" ></td>'+
  '</tr>'+
 '<tr   height="70px">'+
    '<th class="th-yw4l" color="white" colspan="3"><center><img src="'+
	  flights[t]['picture_plane'] + '" width="80%" height="180px" ></center></th>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l" colspan="3"><center><img src="./images/avianca/2.png" width="40%" ></center></td>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l">Flight No.<br><b>' + flights[t]['callsign'] +  '</b></td>'+
    '<td class="tg-yw4l" colspan="2">Aircraft<br><b>' + flights[t]['plane_type'] + '</b></td>'+
  '</tr>'+
  '<tr height="15px">'+
    '<td class="tg-yw4l" colspan="2">' + flights[t]["departure"] + '<br><b>' + flights[t]["dep_name"] + ' , ' + flights[t]["dep_name_iso"] + '</b></td>'+
   '<td class="tg-yw4l">' + flights[t]["arrival"] + '<br><b>' + flights[t]["arr_name"] + ' , ' + flights[t]["arr_name_iso"] + '</b></td>'+
  '</tr>'+
  '<tr>'+
    '<td height="5" colspan="3"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="\
								'+flights[t]['perc_completed'] + '" aria-valuemin="0" aria-valuemax="100" style="width:'+flights[t]['perc_completed']+'%">\
								<font color="black">'+flights[t]['perc_completed'] + ' %</font></div></td>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l">Altitude<br><b>' + flights[t]['altitude'] + 'ft</b></td>'+
    '<td class="tg-yw4l">Heading<br><b>' + flights[t]['heading'] + '°</b></td>'+
    '<td class="tg-yw4l">Speed<br><b>' + flights[t]['gs']+ ' kts</b></td>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l">Status<br><b>' + flights[t]['flight_status'] + '</b></td>'+
    '<td class="tg-yw4l" colspan="2">Last Update<br><b><?php date_default_timezone_set('UTC'); echo date("Y-m-d H:i:s"); ?></b></td>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l" colspan="2">Pilot<br><b>' + flights[t]['name'] + ' ' + flights[t]['surname'] + '</b></td>'+
	'<td class="tg-yw4l" colspan="1">Network<br><b>' + flights[t]['network'] + '</b></td>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-yw4l" id="caja3" colspan="3"></td>'+
  '</tr>'+
'</table>';
			
			
			
			
			
			
			
			
	
			//flights[t]['departure'] + '-' + flights[t]['arrival'] + '<br />' + flights[t]['callsign']+ ' '+flights[t]['name']+ ' '+flights[t]['surname'] + '<br />' + 'ALTITUDE: ' + flights[t]['altitude'] + '<br />' + 'GS: ' + flights[t]['gs']+ '<br />' + 'HEADING: ' + flights[t]['heading'] + '<br />' + flights[t]['flight_status'];
			$('#over_map').html("<div id='mySecondDiv' width='300px'>"+flight_detail+"</div>");
        });
		// On mouse end
		// mouse out
        google.maps.event.addListener(marker, 'mouseout', function () {
            //infowindow.close();
            this.get('line1').setVisible(false);
            this.get('line2').setVisible(false);
			this.get('icao1').setVisible(false);
			this.get('icao2').setVisible(false);
			currentPath.setMap(null);
			$('#over_map').html("");
			
        });
		// mouse out end
		// On Click begin
		google.maps.event.addListener(marker, 'click', function() {
		   //infowindow.open(map,marker);
		   //infowindow.setContent(marker.contenido);
		   var s=0;
		   coord.length = 0;
		   pathcoord.length = 0;
		  while (s < locations[flight_id].length)
			{
				coord= new google.maps.LatLng(locations[flight_id][s]['latitude'],locations[flight_id][s]['longitude']);
				pathcoord.push(coord);
				s=s+1;
			}
			currentPath.setPath(pathcoord);
			currentPath.setMap(map);
			
			if (this.get('line1').visible ='true')
			{
				this.get('line1').setVisible(false);
			}
			if (this.get('line2').visible ='true')
			{
				this.get('line2').setVisible(false);
			}
			if (this.get('icao1').visible ='true')
			{
				this.get('icao1').setVisible(false);
			}
			if (this.get('icao2').visible ='true')
			{
				this.get('icao2').setVisible(false);
			}
			

	
			
			
		});
		// On Click end
		return marker;
	}
		var numflight=0
		while (numflight < flights.length )
		{
			var avionicon =new google.maps.LatLng(flights[numflight]['latitude'],flights[numflight]['longitude']);
			var m1 = createMarker(avionicon, numflight);
			m1.setMap(map);
			numflight = numflight +1;
		}
		var s=0;
		while (s < mapas.length)
		{
			s=s+1;
		}
		var infowindow = new google.maps.InfoWindow({
		  });
		google.maps.event.addListener(infowindow, 'closeclick', function() {
		$('#over_map').html("");
		});
	}
	google.maps.event.addDomListener(window, 'load', init_map);
	$(document).ready(refreshflights);
	function refreshflights(){
		setInterval(function () {$.ajax({
			  url: 'get_map_coordinates.php',
			  data: "",
			  dataType: 'json',
			  success: function(data, textStatus, jqXHR) {
				init_map();
				}
			})}, 120000);
	}
</script>
</html>