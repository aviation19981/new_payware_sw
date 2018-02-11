<?php
	/**
	 * @Project: Virtual Airlines Manager (VAM)
	 * @Author: Alejandro Garcia
	 * @Web http://virtualairlinesmanager.net
	 * Copyright (c) 2013 - 2015 Alejandro Garcia
	 * VAM is licenced under the following license:
	 *   Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
	 *   View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
	 */
?>



<?php

	require('check_login.php');
        
	include ("./helpers/get_metar.php");
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
		$route_id = $row["route_id"];
	}
	if ($route <> '' && $route > 0)
	{
	$sql1 = "select * from routes ro, reserves re, fleets f, fleettypes ft where ft.fleettype_id=f.fleettype_id and f.fleet_id=re.fleet_id and ro.route_id=$route and ro.route_id=re.route_id and  re.gvauser_id=$id";
	if (!$result1 = $db->query($sql1)) {
		die('There was an error running the query [' . $db->error . ']');
	}

$sql2 = "select * from reserves re where re.gvauser_id=$id";
	if (!$result2 = $db->query($sql2)) {
		die('There was an error running the query [' . $db->error . ']');
	}

?>



<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading"><?php echo ROUTES_BOOKED; ?></div>
			<div class="table-responsive">
			<!-- Table -->
			<table class="table table-hover">
				<?php

echo "<tr><th>" . BOOK_ROUTE_FLIGHT . "</th><th>" . BOOK_ROUTE_CANCEL . "</th></tr>";

while ($row1 = $result1->fetch_assoc()) {
echo "<td>";
echo $row1["flight"] . '</td><td>';
echo '<a href="./index_vam_op.php?page=cancel_reserve&route=' . $route . '&plane=' . $row1["fleet_id"] . '" class="button"><font color="white"><li class="fa fa-ban"></li>' . BOOK_ROUTE_CANCEL . '</font></a>';
echo '</td><tr>';


echo "<tr><th>" . BOOK_ROUTE_DEPARTURE . "</th><th>" . BOOK_ROUTE_ARRIVAL . "</th></tr>";
echo "<td>";

echo $row1["departure"] . ' ' . '(' . $row1["etd"]  . '&nbsp<i class="fa fa-clock-o"></i>' . ')';
echo '<br>';

$departure = $row1["departure"]; 
$arrival = $row1["arrival"]; 
$locationas = $row1["departure"]; 


// Get Location info details

	$sql6 = "SELECT * FROM airports  where ident='$locationas'";

	if (!$result6 = $db->query($sql6)) {

		die('There was an error running the query  [' . $db->error . ']');

	}


	

	while ($row6 = $result6->fetch_assoc()) {

		$location_airport_namesssls = $row6['name'];

		$location_airport_flagsssls = $row6['iso_country'];

echo '<img src="./images/country-flags/' . $location_airport_flagsssls . '.png" alt="' . $location_airport_flagsssls . '">';

                                                                        echo '<br>';
						                         echo '<font size="2">&nbsp;'. $location_airport_namesssls .'</font>';
echo '</td><td>';

	}





echo $row1["arrival"] . ' ' . '(' . $row1["eta"]  . '&nbsp<i class="fa fa-clock-o"></i>' . ')';
echo '<br>';

$locationa = $row1["arrival"]; 


// Get Location info details

	$sql5 = "SELECT * FROM airports  where ident='$locationa'";

	if (!$result5 = $db->query($sql5)) {

		die('There was an error running the query  [' . $db->error . ']');

	}


	

	while ($row5 = $result5->fetch_assoc()) {

		$location_airport_namesssl = $row5['name'];

		$location_airport_flagsssl = $row5['iso_country'];

echo '<img src="./images/country-flags/' . $location_airport_flagsssl . '.png" alt="' . $location_airport_flagsssl . '">';

                                                                        echo '<br>';
						                         echo '<font size="2">&nbsp;'. $location_airport_namesssl .'</font>';
echo '</td><td>';

	}

echo "<tr></tr>";
echo "<td>";
echo '<a href="https://pilotweb.nas.faa.gov/PilotWeb/notamRetrievalByICAOAction.do?method=displayByICAOs&reportType=RAW&formatType=DOMESTIC&retrieveLocId=' . $row1["departure"] . '&actionType=notamRetrievalByICAOs">Click to view NOTAMS</a></td><td>';  

echo '<a href="https://pilotweb.nas.faa.gov/PilotWeb/notamRetrievalByICAOAction.do?method=displayByICAOs&reportType=RAW&formatType=DOMESTIC&retrieveLocId=' . $row1["arrival"] . '&actionType=notamRetrievalByICAOs">Click to view NOTAMS</a></td><td>'; 
echo "</td>";



echo "<tr><th>" . BOOK_ROUTE_ROUTE . "</th><th> ONLINE CHECK-IN </th></tr>";
echo "<td>";
echo $row1["flproute"] . '</td><td>';
echo '<a href="./index_vam_op.php?page=boarding_pass">Boarding Pass</a></td>';  



	
	
	
	

echo "<tr><th>" . REMARKS . "</th><th></th></tr>";
echo "<td>";
$numero  = $row1["plane_icao"];

echo "OPR/AVIANCA/AV/AVA REG/" . $row1["registry"] . " PER/C LIC/" . $callsign . "/RMK/WWWAVIANCA-VIRTUALCOM/ </td><td>";
	
echo '</td><td>';  
echo "</td>";







echo "<tr><th> PASSENGERS </th><th> CARGO </th></tr>";
echo "<td>";
while ($row2 = $result2->fetch_assoc()) {
$pax = $row2['pax'];	
$cargo = $row2['cargo'];	
echo $pax;
echo "</td><td>";

echo $cargo . " Lbs";
    echo "</td>";

	}


echo "<tr><th>" . BOOK_ROUTE_ARICRAFT_TYPE . "</th><th>" . BOOK_ROUTE_ARICRAFT_REG . "</th></tr>";
echo "<td>";
echo $row1["plane_icao"] . '</td><td>';
echo $row1["registry"] . '</td><td>';

echo "<tr><th>METAR " . $row1["departure"] . "</th><th>METAR " . $row1["arrival"] . "</th></tr>";
echo "<tr></tr>";
echo "<td>";
echo '<a href="./index_vam_op.php?page=airport_info&airport=' . $row1["departure"] . '">View Weather and Taf Details</a></td><td>';  

echo '<a href="./index_vam_op.php?page=airport_info&airport=' . $row1["arrival"] . '">View Weather and Taf Details</a></td><td>'; 
echo "</td>";
echo "<td>";



echo "<br>";
echo "<br>";

$numera  = $row1["plane_icao"];



$sql3 = "SELECT * FROM airports  where ident='$location'";

	if (!$result3 = $db->query($sql3)) {

		die('There was an error running the query  [' . $db->error . ']');

	}


while ($row3 = $result3->fetch_assoc()) {

		$latitude_deg_loc = $row3['latitude_deg'];

		$longitude_deg_loc = $row3['longitude_deg'];

	}



$sql4 = "SELECT * FROM airports  where ident='$locationa'";

	if (!$result4 = $db->query($sql4)) {

		die('There was an error running the query  [' . $db->error . ']');

	}


while ($row4 = $result4->fetch_assoc()) {

		$latitude_deg_arr = $row4['latitude_deg'];

		$longitude_deg_arr = $row4['longitude_deg'];

	}


    $km = 111.302;
$nms = 0.539957;
    
    //1 Grado = 0.01745329 Radianes    
    $degtorad = 0.01745329;
    
    //1 Radian = 57.29577951 Grados
    $radtodeg = 57.29577951; 
    //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
    //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
    $dlong = ($longitude_deg_loc - $longitude_deg_arr); 
    $dvalue = (sin($latitude_deg_loc * $degtorad) * sin(
$latitude_deg_arr * $degtorad)) + (cos($latitude_deg_loc * $degtorad) * cos(
$latitude_deg_arr * $degtorad) * cos($dlong * $degtorad)); 
    $dd = acos($dvalue) * $radtodeg; 
    $kms = round(($dd * $km), 2);

                        $flttime = $row1["duration"];

                        $dist = $kms;
			$speed = 440;
			$app = $speed / 60 ;
			

			
			
     $distnm = round($kms*$nms);

$flttime = round($distnm / $app,0)+ 20;
			$hours = intval($flttime / 60);
                        $minutes = (($flttime / 60) - $hours) * 60;
                       
		       
			$fuelflowB744 = 1845;
			$fuelhrB744 = 7671;
			$fuelflowB763 = 1405;
			$fuelhrB763 = 4780;
                        
		
		       
		       
                        $fuelflowA343 = 1829;
			$fuelhrA343 = 8300;



$fuelflowC172 = 83;
$fuelhrC172 = 275;


$fuelflowAT75 = 340;
$fuelhrAT75 = 1000;

$fuelflowJ41 = 340;
$fuelhrJ41 = 917;

$fuelflowH25B = 300;
$fuelhrH25B = 680;


$fuelflowDH8D = 340;
$fuelhrDH8D = 1000;

$fuelflowC750 = 300;
$fuelhrC750 = 680;

$fuelflowB737 = 1045;
$fuelhrB737 = 3970;

$fuelflowB722 = 3800;
$fuelhrB722 = 3000;


			
$fuelflowA318 = 790;
$fuelhrA318 = 3000;

$fuelflowA319 = 790;
$fuelhrA319 = 3000;

$fuelflowA320 = 790;
$fuelhrA320 = 3000;

$fuelflowA333 = 2200;
$fuelhrA333 = 6400;

$fuelflowB772 = 2200;
$fuelhrB772 = 6400;
			
            


if($numero == 'C172') {
            $fuelflow = $fuelflowC172;
            $fuelhr = $fuelhrC172;
} else if ($numero == 'J41') {
            $fuelflow = $fuelflowJ41;
            $fuelhr = $fuelhrJ41;

} else if ($numero == 'AT75') {
            $fuelflow = $fuelflowAT75;
            $fuelhr = $fuelhrAT75;

} else if ($numero == 'DH8D') {
             $fuelflow = $fuelflowDH8D;
            $fuelhr = $fuelhrDH8D;

} else if ($numero == 'C750') {
            $fuelflow = $fuelflowC750;
            $fuelhr = $fuelhrC750;

} else if ($numero == 'H25B') {
            $fuelflow = $fuelflowH25B;
            $fuelhr = $fuelhrH25B;

} else if ($numero == 'B737') {
            $fuelflow = $fuelflowB737;
            $fuelhr = $fuelhrB737;

} else if (($numero == 'B77L') || ($numero == 'B77F'))  {
            $fuelflow = $fuelflowB772;
            $fuelhr = $fuelhrB772;

} else if ($numero == 'A318') {
            $fuelflow = $fuelflowA318;
            $fuelhr = $fuelhrA318;

} else if ($numero == 'A319') {
            $fuelflow = $fuelflowA319;
            $fuelhr = $fuelhrA319;

} else if ($numero == 'A320') {
            $fuelflow = $fuelflowA320;
            $fuelhr = $fuelhrA320;

} else if (($numero == 'A333') || ($numero == 'A33F')) {

           $fuelflow = $fuelflowA333;
            $fuelhr = $fuelhrA333;
} 


        

echo "<tr><th>Charts Jeppesen</th><th>" . Distancia . "</th></tr>";
echo "<tr></tr>";
echo "<td>";
echo '<a href="http://jeppesen.com/icharts/index.jsp?login-username=selook&login-password=KALe1208">Cartas de Vuelo</a></td><td>'; 
echo $distnm . ' NM';
echo "</td>";

		

 
                $fldis = $distnm / 100;
		$fuelnm = $fuelflow * $fldis;
                $fltaxi = 500;
		$flndg = $fuelhr * 3/4;
		$result = $fuelnm + $flndg + $fltaxi;




				// SIMBRIEF

$callsigns = $row1["flight"];
	$resultado = substr($callsigns, 0, 3);
	$resultados = substr($callsigns, 3);
				
				echo "<tr><th>" . SIMBRIEF . "</th><th></th></tr>";
				
				
echo "<tr></tr>";
echo "<td colspan='2'>";

?>

<form id="sbapiform">





       <?php $planedata=$row1["plane_icao"];?>
       <input type="hidden" name="type" size="5" type="text" placeholder="ZZZZ"  value="<?php echo $row1["plane_icao"];?>">
    
 
       <input type="hidden" name="orig" size="5" type="text" placeholder="ZZZZ" maxlength="4" value="<?php echo $row1["departure"]; ?>">
       
       <input type="hidden" name="dest" size="5" type="text" placeholder="ZZZZ" maxlength="4" value="<?php echo $row1["arrival"]; ?>">
     
       <input type="hidden" name="route" placeholder="Enter your route here">
        
       <input type="hidden" name="units" size="5" type="text" placeholder="ZZZZ" maxlength="4" value="KGS">
        


<input type="hidden" name="airline" value="<?php echo $resultado; ?>"> 
<br>


<input type="hidden" name="fltnum" value="<?php echo $resultados; ?>"> 

<?php $today = date("dMy");?>

<input type="hidden" name="date" value="<?php echo $today?>"> 

<?php $deptimes = explode(":", $row1["etd"]); ?>

<input type="hidden" name="deph" value="<?php echo $deptimes[0]?>">
<input type="hidden" name="depm" value="<?php echo $deptimes[1]?>">    

<?php $arrtimes = explode(":", $row1["eta"]); ?>

<input type="hidden" name="steh" value="<?php echo $arrtimes[0]?>">
<input type="hidden" name="stem" value="<?php echo $arrtimes[1]?>">



<input type="hidden" name="reg" value="<?php echo $row1["registry"]; ?>">    


 <input type="hidden" name="navlog" value="1"> 
<input type="hidden" name="selcal" value="GR-FS">    

<input type="hidden" name="planformat" value="lido">


<input type="button" onclick="simbriefsubmit('./index_vam_op.php?page=avianca_dispatch');" style="font-size:15px;width:100%;" value="Generate Avianca Dispatch">


</form>

<?

echo "</td><td></td>";
} 

            

?>


			</table>
			</div>
</div>
</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><IMG src="images/icons/ic_cloud_white_18dp_1x.png">&nbsp;<?php echo AIRPORT_AIRPORT_METAR; ?></div>
			<table class="table table-hover">
				<tr>
					<?php
						get_metar($departure);
					?>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><IMG src="images/icons/ic_cloud_white_18dp_1x.png">&nbsp;<?php echo AIRPORT_AIRPORT_METAR; ?></div>
			<table class="table table-hover">
				<tr>
					<?php
						get_metar($arrival);
					?>
				</tr>
			</table>
		</div>
	</div>
</div>






			<?php
				}
				else
				{
				$sql2 = "select distinct a3.iso_country as alt_country, a3.name as alt_name,a1.name as dep_name, a2.name as arr_name, a1.iso_country as dep_country,a2.iso_country as arr_country, r.route_id as route, flight,r.departure,r.arrival,alternative,etd,eta,duration from
							fleets f inner join gvausers g on g.location = f.location
							inner join routes r on r.departure = f.location
							inner join fleettypes_routes ftr on ftr.route_id = r.route_id
							inner join fleettypes_gvausers ftu on ftu.fleettype_id = f.fleettype_id
							inner join airports a1 on (a1.ident=r.departure)
							inner join airports a2 on (a2.ident=r.arrival)
							inner join airports a3 on (a3.ident=r.alternative)
							where f.booked=0
							and ftr.fleettype_id = f.fleettype_id
							and g.gvauser_id=$id
							and ftu.gvauser_id=$id";
					if (!$result2 = $db->query($sql2)) {
						die('There was an error running the query [' . $db->error . ']');
					}
				?>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading"><IMG src="images/icons/ic_public_white_18dp_1x.png">&nbsp;<?php echo AVAILABLE_ROUTES; ?></div>
							<div class="table-responsive">
							<br>
							<!-- Table -->
							<table id="route_select_one" class="table table-hover">
								<?php
									echo '<thead>';
									echo "<tr><th>" . BOOK_ROUTE_FLIGHT . "</th><th>" . BOOK_ROUTE_DEPARTURE . "</th><th>" . BOOK_ROUTE_ARRIVAL . "</th><th>" . BOOK_ROUTE_ALTERNATIVE . "</th><th>" . BOOK_ROUTE_DURATION . "</th><th>" . BOOK_ROUTE_TIME_DEP . "</th><th>" . BOOK_ROUTE_TIME_ARR . "</th><th>" . BOOK_ROUTE_INFORMATION . "</th></tr>";
									echo '</thead>';
									while ($row2 = $result2->fetch_assoc()) {
										echo "<td><i class='fa fa-bookmark'></i>&nbsp;";
										echo $row2["flight"] . '</td><td><IMG src="images/icons/ic_flight_takeoff_black_18dp_2x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT="">&nbsp;<IMG src="images/country-flags/'.$row2["dep_country"].'.png" WIDTH="25" HEIGHT="20" BORDER=0 ALT="">&nbsp;';
										echo '<a target="_blank" href="./index_vam_op.php?page=airport_info&airport=' . $row2["departure"] . '">' . $row2["departure"] . '</a><br><font size="1">'.str_replace("Airport","",$row2["dep_name"]).'</font></td><td><IMG src="images/icons/ic_flight_land_black_18dp_2x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT="">&nbsp;<IMG src="images/country-flags/'.$row2["arr_country"].'.png" WIDTH="25" HEIGHT="20" BORDER=0 ALT="">&nbsp;';
										echo '<a target="_blank" href="./index_vam_op.php?page=airport_info&airport=' . $row2["arrival"] . '">' . $row2["arrival"] . '</a><br><font size="1">'.str_replace("Airport","",$row2["arr_name"]).'</font> </td><td><IMG src="images/icons/ic_flight_land_black_18dp_2x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT="">&nbsp;<IMG src="images/country-flags/'.$row2["alt_country"].'.png" WIDTH="25" HEIGHT="20" BORDER=0 ALT="">&nbsp;';
										echo '<a target="_blank" href="./index_vam_op.php?page=airport_info&airport=' . $row2["alternative"] . '">' . $row2["alternative"] . '</a><br><font size="1">'.str_replace("Airport","",$row2["alt_name"]).'</font> </td><td><i class="fa fa-clock-o"></i>&nbsp;';
										echo $row2["duration"] . '</td><td>';
										echo $row2["etd"] . '</td><td>';
										echo $row2["eta"] . '</td><td>';
										echo '<a href="./index_vam_op.php?page=route_selection_stage2&route=' . $row2["route"] . '"><IMG src="images/icons/ic_info_outline_black_24dp_1x.png" WIDTH="20" HEIGHT="20" BORDER=0 ALT=""></a></td></tr>';
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
						</table>
						</div>
					</div>
				</div>

				<div class="clearfix visible-lg"></div>
			</div>

