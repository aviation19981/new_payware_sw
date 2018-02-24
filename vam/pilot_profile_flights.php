<style>

/* Fonts */
@import url(//fonts.googleapis.com/earlyaccess/nanumgothic.css);

* {margin:0; padding:0; box-sizing:border-box;}
html, body {width:100%; height:100%; font-size:100%; color:#333; font-family:'Roboto', 'Nanum Gothic', cursive, 'Dotum', Helvetica, Arial, sans-serif;}
ul,li {list-style:none;}

@keyframes load {
	from   {width:0;}
	/*0%   {width:0; background-color:#eee;}*/
	/*25%  {width:0; background-color:#eee;}*/
	/*50%  {width:0; background-color:#eee;}*/
	/*100% {width:0; background-color:#eee;}*/
}
@keyframes wave {
	0% {
		transform: scale(0);
		opacity:1;
		transform-origin: center;
	}
	100% {
		transform: scale(1.5);
		opacity:0;
		transform-origin: center;
	}
}

.card-wrapper {display:table; width:100%; height:100%; }
.card-container {display:table-cell; vertical-align:middle; text-align:center;}
.card-inner {overflow:hidden; position:relative; width:280px; margin:0 auto; background:#fff; border-radius:8px;}
.card-group {position:relative; min-height:434px;}
.card-group .card-front {position:absolute; width:100%; height:auto;}
.card-group .card-front .card-cover {width:100%; height:120px; background:url('./images/portada/<?php echo rand(0,5) ; ?>.jpg') no-repeat 50% 50%; background-size:cover;}
.card-group .card-front .card-covertres {width:100%; height:120px; background:url('./images/portada/<?php echo rand(0,5) ; ?>.jpg') no-repeat 50% 50%; background-size:cover;}
.card-group .card-front .my-profile {position:absolute; top:0; right:0; width:185px; height:90px; margin-top:75px; text-align:left; transition:.1s ease-in-out; z-index:10; cursor:pointer;}
.card-group .card-front .my-profile:hover {width:270px; transition:width .1s ease-in-out;}
.card-group .card-front .my-profile .thumb {position:absolute; width:90px; height:90px; padding:4px; background:transparent; border-radius:50%; box-shadow:0 2px 8px rgba(0,0,0,0.3); z-index:1;}
.card-group .card-front .my-profile .thumb img {position:absolute; width:82px; border-radius:50%; z-index:9;}
.card-group .card-front .my-profile .thumb:before {content:""; position:absolute; top:50%; height:50%; display:block; width:90px; height:90px; margin-left:-4px; margin-top:-45px; background:rgba(0, 0, 0, .6); border-radius:50%; z-index:1; backface-visibility:hidden; opacity:0; animation:wave 3s infinite ease-out;}
.card-group .card-front .info {position:absolute; top:80px; right:-170px; width:150px; height:84px; padding:5px 0 15px; background:rgba(0,0,0,0.7); transition:.15s ease-in-out;}
.card-group .card-front .info .name {padding:5px 0; color:#ddd; text-align:center; font-weight:normal;}
.card-group .card-front .info .role,
.card-group .card-front .info .location {padding:2px 0; color:#aaa; font-size:0.750em; text-shadow:1px 1px 0 #000; text-align:center;}
.card-group .card-front .my-profile:hover + .info {right:15px;}
.card-group .card-front article {padding:50px 15px 15px; text-align:left;}
.card-group .card-front article ul li {display:block; margin-top:2px; font-size:70%;}
.card-group .card-front article ul li:first-child {margin-top:0;}
.card-group .card-front article ul li em {display:block; padding:5px 0 8px; color:#222; font-style:normal;}
.card-group .card-front article ul li div {overflow:hidden; width:100%; border-radius:10px; box-shadow:2px 1px 7px rgba(0,0,0,0.2);}
.card-group .card-front article ul li div span {display:block; height:100%; border-radius:10px; animation-name:load; animation-duration:0.8s; animation-timing-function:cubic-bezier(.5, .2, .1, 1.2);}
.card-group .card-front article ul li div span.html {width:90%; background:#F44336; animate-delay:0.1s;}
.card-group .card-front article ul li div span.css {width:80%; background:#FF9800; animation-delay:0.15s;}
.card-group .card-front article ul li div span.jq {width:10%; background:gold; animation-delay:0.2s;}
.card-group .card-front article ul li div span.js {width:5%; background:#4CAF50; animation-delay:0.25s;}
.card-group .card-front article ul li div span.react {width:0.5%; background:#2196F3; animation-delay:0.3s;}
.card-group .card-front .contact {width:100%; height:44px;}
.card-group .card-front .contact a {display:inline-block; width:36px; height:44px; vertical-align:top; text-align:center;}
.card-group .card-front .contact a .fa {padding:10px; color:#555; font-size:120%;}
.card-group .card-front .contact a:hover .fa {color:#111; transform:scale(1.2); transition:transform .1s ease;}
</style>

<div class="row">
	<div class="col-md-12">
	
	
	<div class="card-wrapper" style="width:100%;">
	<div class="card-container"  style="width:100%;">
		<div class="card-inner"  style="width:100%;">			
			<div class="card-group"  style="width:100%;">				
				<div class="card-front"  style="width:100%;">
					<div class="card-covertres"  style="width:100%;"></div>
					<div class="my-profile"  style="width:100%;">
						<span class="thumb"><img src="./images/logito.png" alt="" /></span>
					</div>
					<div class="info">
						<p class="name"><?php echo PILOT_FLIGTHS; ?></p>
					</div>
					<?php
					$db = new mysqli($db_host , $db_username , $db_password , $db_database);
					$db->set_charset("utf8");
					if ($db->connect_errno > 0) {
						die('Unable to connect to database [' . $db->connect_error . ']');
					}
					$sql = "select a1.iso_country as country_dep, a2.iso_country as country_arr ,REPLACE(a1.name,'Airport','') as dep_name,REPLACE(a2.name,'Airport','') as arr_name,CreatedOn as date_int,pirepfsfk_id as id,'' as comment,validated as status,pirepfsfk_id as flight, SUBSTRING(OriginAirport,1,4) departure, SUBSTRING(DestinationAirport,1,4) arrival , DATE_FORMAT(CreatedOn,'$va_date_format') as date  , DistanceFlight as distance, FlightTime as duration, charter , 'keeper' as type , flight as flight_regular
          from pirepfsfk , airports a1, airports a2 where a1.ident=SUBSTRING(OriginAirport,1,4) and a2.ident=SUBSTRING(DestinationAirport,1,4) and gvauser_id=$id
          UNION
SELECT a1.iso_country as country_dep, a2.iso_country as country_arr ,REPLACE(a1.name,'Airport','') as dep_name,REPLACE(a2.name,'Airport','') as arr_name,date as date_int,report_id as id,'' as comment , validated as status, report_id as flight , origin_id as departure, destination_id as arrival, DATE_FORMAT(date,'$va_date_format') as date, distance, (HOUR(duration)*60 + minute(duration))/60 as duration, charter, 'Fsacars' as type, flight as flight_regular
          from reports , airports a1, airports a2 where a1.ident=origin_id and a2.ident=destination_id and  pilot_id=$id
		  UNION
select a1.iso_country as country_dep, a2.iso_country as country_arr ,REPLACE(a1.name,'Airport','') as dep_name,REPLACE(a2.name,'Airport','') as arr_name,date as date_int,pirep_id as id,comment,valid as status,pirep_id as flight,from_airport departure, to_airport arrival , DATE_FORMAT(date,'$va_date_format') as date,distance,duration,charter, 'pirep' as type ,flight as flight_regular
          from pireps  , airports a1, airports a2 where a1.ident=from_airport and a2.ident=to_airport and  gvauser_id=$id
          UNION
SELECT a1.iso_country as country_dep, a2.iso_country as country_arr ,REPLACE(a1.name,'Airport','') as dep_name,REPLACE(a2.name,'Airport','') as arr_name,flight_date as date_int, flightid as id,'' as comment , validated as status, flightid as flight, departure, arrival , DATE_FORMAT(flight_date,'$va_date_format') as date, distance, flight_duration as duration, charter, 'VAMACARS' as type, flight as flight_regular
		  from vampireps , airports a1, airports a2
 where a1.ident=departure and a2.ident=arrival and  gvauser_id=$id
		  order by date_int desc, id desc";
					if (!$result = $db->query($sql)) {
						die('There was an error running the query  [' . $db->error . ']');
					}
				?>
					<table class="altern">
					<?php
						echo '<thead>';
						echo "<tr><td colspan='8' style='text-align:center;'><b>" . PILOT_FLIGTHS . "</b></td></tr>";
						echo "<tr><th>" . PILOT_FLIGTHS_DATE . "</th><th>" . PILOT_FLIGTHS_DEP . "</th><th>" . PILOT_FLIGTHS_ARR . "</th><th>" . PILOT_FLIGTHS_DUR . "</th><th>" . PILOT_FLIGTHS_DIST . "</th><th>" . PILOT_FLIGTHS_TYPE . "</th><th>" . PILOT_FLIGTHS_VALI . "</th><th>" . PILOT_FLIGTHS_DETAILS . "</th></tr>";
						echo '</thead>';
						while ($row = $result->fetch_assoc()) {
							$flight_type = '';
							if ($row["type"] == 'pirep') {
								$flight_type = INDEX_PILOT_MANUAL;
							} elseif ($row["type"] == 'keeper') {
								$flight_type = INDEX_PILOT_KEEPER;
							} elseif ($row["type"] == 'Fsacars') {
								$flight_type = INDEX_PILOT_FSACARS;
							}
							elseif ($row["type"] == 'VAMACARS') {
								$flight_type = 'SIM ACARS';
							}
							echo '<td><i class="fa fa-calendar"></i>&nbsp;';
							echo $row["date"] . '</td><td><IMG src="images/country-flags/'.$row["country_dep"].'.png" WIDTH="25" HEIGHT="20" BORDER=0 ALT="">&nbsp;<IMG src="images/icons/ic_flight_takeoff_black_18dp_2x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT="">&nbsp;';
							echo $row["departure"] . '<br><font size="1">'.$row["dep_name"].'</font></td><td><IMG src="images/country-flags/'.$row["country_arr"].'.png" WIDTH="25" HEIGHT="20" BORDER=0 ALT="">&nbsp;<IMG src="images/icons/ic_flight_land_black_18dp_2x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT="">&nbsp;';
							echo $row["arrival"] . '<br><font size="1">'.str_replace("Aiport","",$row["arr_name"]).'</font></td><td><i class="fa fa-clock-o"></i>&nbsp;';
							echo convertTime(number_format($row["duration"] , 2),$va_time_format) . '</td><td data-order="'.number_format($row["distance"] , 0,",","").'"><i class="fa fa-expand"></i>&nbsp;';
							echo number_format($row["distance"] , 0,",","") . '</td><td><i class="fa fa-tags"></i>&nbsp;';
							if ($row["status"] == 0)
								$status_image = '<font color="#C36900"><span class="glyphicon glyphicon-time fa-lg"></span></font>';
							else if ($row["status"] == 1)
								$status_image = '<font color="#228B22"><span class="glyphicon glyphicon-ok fa-lg"></span></font>';
							else
								$status_image = '<font color="#DC143C"><span class="glyphicon glyphicon-remove fa-lg"></span></font>';
							if ($row["charter"] == 1) {
								echo INDEX_PILOT_CHARTER . ' -' . $flight_type . '</td><td>';
							} else {
								echo INDEX_PILOT_REGULAR . ' - ' . $flight_type . ' - ' . $row["flight_regular"] . '</td><td>';
							}
							echo $status_image . '</td><td>';
							if ($row["type"] == 'pirep') {
								echo '<a href="./index.php?page=manual_flight_details&ID=' . $row["id"] . '"><IMG src="./images/icons/ic_info_outline_black_24dp_1x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
							} elseif ($row["type"] == 'keeper') {
								echo '<a href="./index.php?page=PIREPDetails&ID=' . $row["id"] . '"><IMG src="./images/icons/ic_info_outline_black_24dp_1x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
							} elseif ($row["type"] == 'Fsacars') {
								echo '<a href="./index.php?page=FSACARSDetails&ID=' . $row["id"] . '"><<IMG src="./images/icons/ic_info_outline_black_24dp_1x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
							}
							elseif ($row["type"] == 'VAMACARS') {
								echo '<a href="./index.php?page=flight_details&flight_id=' . $row["id"] . '"><IMG src="./images/icons/ic_info_outline_black_24dp_1x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
							}
						}
					?>
				</table>
				</div>
				<!-- //front -->
			</div>
			<!-- //card-group -->			
		</div>
		<!-- //card-inner -->
	</div>
	<!-- //card-container -->
</div>
<!-- //card-wrapper -->



	</div>
</div>

<br>
<hr>
<br>
<?php
	include( 'pilot_profile_flights_map.php');
?>
