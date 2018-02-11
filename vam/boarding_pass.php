<?php
	/**
	 * @Project: Virtual Airlines Manager (VAM)
	 * @Author: Alejandro Garcia echo 
	 * @Web http://virtualairlinesmanager.net
	 * Copyright (c) 2013 - 2015 Alejandro Garcia
	 * VAM is licenced under the following license:
	 *   Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
	 *   View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
	 */
?>

<?php
	require('check_login.php');
        require('get_pilot_data.php');

	$db = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db->set_charset("utf8");

	if ($db->connect_errno > 0) {
		die('Unable to connect to database [' . $db->connect_error . ']');
	}

	$sql = "select route_id from gvausers gu where	gu.gvauser_id=$id";
	if (!$result = $db->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}

	while ($row = $result->fetch_assoc()) {
		$route = $row["route_id"];
	}
	if ($route <> '' && $route > 0)
	{
	$sql1 = "select * from routes ro, reserves re, fleets f, fleettypes ft where ft.fleettype_id=f.fleettype_id and f.fleet_id=re.fleet_id and ro.route_id=$route and ro.route_id=re.route_id and re.gvauser_id=$id";
	if (!$result1 = $db->query($sql1)) {
		die('There was an error running the query [' . $db->error . ']');
	}



?>

<div class="container">


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading"><li class="fa fa-barcode"></li> Requirements for Online Check-In</div>
			<div class="table-responsive">
			<!-- Table -->
			<table class="table table-hover">
				<?php



while ($row1 = $result1->fetch_assoc()) {

echo "<br>";
echo "<p>&nbsp;&nbsp;To proceed through Security Checkpoint, you will need a government-issued photo ID and either a Boarding Pass or Security Document. Customers under 18 years of age are &nbsp;&nbsp;&nbsp;not required to show government-issued photo ID.</p>";

echo '<p>
<img src="./images/barcode.jpg"  WIDTH="354" HEIGHT="100" BORDER=0 ALT="" align="left"><h1>&nbsp;&nbsp;&nbsp;&nbsp; Avianca</h1>
</p>';


echo "<br>";
echo "<h3>Boarding Pass</h3>";
echo "&nbsp;";



echo "<tr><th>" . Date . "</th><th>" . Gate . "</th></tr>";

echo "<td>";
echo date("d-m-Y");
echo "</td><td>";
echo rand(1, 30);
echo chr(rand(65, 90)); 		
echo "</td><td>";


echo "<tr><th>" . Name . "</th><th>" . Confirmation . "</th></tr>";
echo "<td>";
echo $pilotname . ' ' . $pilotsurname;
echo "</td><td>";
$numero = rand(100000,999999);
echo $numero;
echo "</td><td>";


echo "<tr><th> Frequent Flier Number </th><th>   </th></tr>";
echo "<td>";
echo strtoupper(substr(md5($route), 0, 6));
echo "</td>";
echo "<td>";
echo "</td>";

echo "<tr><th> Boarding Pass Number </th><th>   </th></tr>";
echo "<td>";
echo $num_fsacars + $num_fskeeper + $num_pireps + $num_vamacars;
echo "</td>";
echo "<td>";
echo "</td>";

	

echo "<tr><th>" . Flight . "</th><th>" . Aircraft . "</th></tr>";
echo "<td>";
echo $row1["flight"] . '</td><td>';
echo $row1["plane_icao"] . '</td><td>';

echo "<tr><th> Departure Time </th><th> Departure  </th></tr>";
echo "<td>";
echo $row1["etd"] . '</td><td>';
echo $row1["departure"] . '</td><td>';

echo "<tr><th> Arrival Time </th><th> Arrival  </th></tr>";
echo "<td>";
echo $row1["eta"] . '</td><td>'; 
echo $row1["arrival"] . '</td><td>';


						
					}?>
			</table>
			</div>
			<?php
				}
				else
				{
				$sql2 = "select distinct r.route_id as route, flight,r.departure,r.arrival,alternative,etd,eta,duration from gvausers gu , fleets f , fleettypes ft, routes r, fleettypes_gvausers ftgu , fleettypes_routes ftro
			where 
			gu.gvauser_id = ftgu.gvauser_id and
			ftgu.fleettype_id = f.fleettype_id and 
			ft.fleettype_id = f.fleettype_id and
			ft.fleettype_id = ftgu.fleettype_id and
			ftro.fleettype_id = f.fleettype_id and 
			ft.fleettype_id = ftro.fleettype_id and
			ftro.route_id = r.route_id and
			r.departure = gu.location and
			(gu.route_id = 0 or gu.route_id is null) and
			gu.gvauser_id=$id";

				if (!$result2 = $db->query($sql2)) {
					die('There was an error running the query [' . $db->error . ']');
				}
			?>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo AVAILABLE_ROUTES; ?></div>
						<div class="table-responsive">
						<!-- Table -->
						<table class="table table-hover">
							<?php

								echo "<tr><th>" . BOOK_ROUTE_FLIGHT . "</th><th>" . BOOK_ROUTE_DEPARTURE . "</th><th>" . BOOK_ROUTE_ARRIVAL . "</th><th>" . BOOK_ROUTE_ALTERNATIVE . "</th><th>" . BOOK_ROUTE_DURATION . "</th><th>" . BOOK_ROUTE_TIME_DEP . "</th><th>" . BOOK_ROUTE_TIME_ARR . "</th><th>" . BOOK_ROUTE_INFORMATION . "</th></tr>";
								while ($row2 = $result2->fetch_assoc()) {
									echo "<td><i class='fa fa-bookmark'></i>&nbsp;";
									echo $row2["flight"] . '</td><td><i class="fa fa-arrow-circle-up"></i>&nbsp;';
									echo $row2["departure"] . '</td><td><i class="fa fa-arrow-circle-down"></i>&nbsp;';
									echo $row2["arrival"] . '</td><td>';
									echo $row2["alternative"] . '</td><td><i class="fa fa-clock-o"></i>&nbsp;';
									echo $row2["duration"] . '</td><td>';
									echo $row2["etd"] . '</td><td>';
									echo $row2["eta"] . '</td><td>';
									echo '<a href="./index_vam_op.php?page=route_selection_stage2&route=' . $row2["route"] . '"><IMG src="images/info.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
								}
								echo "</table>";
								}
								$db->close();
							?>
						</table>
						</div>
					</div>
				</div>

				<div class="clearfix visible-lg"></div>
			</div>
		</div>
</div>