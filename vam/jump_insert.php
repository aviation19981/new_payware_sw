<?php
	/**
	 * @Project: Virtual Airlines Manager (VAM)
	 * @Author: Alejandro Garcia
	 * @Web http://virtualairlinesmanager.net
	 * Copyright (c) 2013 - 2016 Alejandro Garcia
	 * VAM is licenced under the following license:
	 *   Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
	 *   View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
	 */
?>
<?php
	require('check_login.php');
	if (is_logged())
	{
		$db = new mysqli($db_host , $db_username , $db_password , $db_database);
		$db->set_charset("utf8");
		if ($db->connect_errno > 0) {
			die('Unable to connect to database [' . $db->connect_error . ']');
		}
		$newlocation = strtoupper($_POST['destiny']);
		
		
		//////////////////////////// ANALISI /////////////////////////////////////
		
		
		// DATOS UBICACIÓN
	
	$sql3 = "SELECT * FROM airports  where ident='$location'";

	if (!$result3 = $db->query($sql3)) {

		die('There was an error running the query  [' . $db->error . ']');

	}
	
	
	while ($row3 = $result3->fetch_assoc()) {

		$latitude_deg_loc = $row3['latitude_deg'];

		$longitude_deg_loc = $row3['longitude_deg'];

	}
	
	
	
	
	// DETALLES AEROPUERTO IDA
	
	$sql = "select ident, name, latitude_deg, longitude_deg from airports where ident='$newlocation'";
	if (!$result = $db->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	
		while ($row = $result->fetch_assoc()) {
	
	$latitude_deg_arr = $row['latitude_deg'];

$longitude_deg_arr = $row['longitude_deg'];


	}


    $km = 111.302;
    
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
$valortiquete = round($kms*170);
		
		
		
		
		
		
		
		if($money>=$valortiquete) {
		
		
		$valorpagado = -1*$valortiquete;
		
		
		
		$sql = "select location from gvausers where gvauser_id=$id";
		if (!$result = $db->query($sql)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		while ($row = $result->fetch_assoc()) {
			$fromlocation = $row["location"];
		}
		$sql = "update gvausers set location='$newlocation' where gvauser_id=$id";
		if (!$result = $db->query($sql)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		$sql = "INSERT INTO jumps (date,gvauser_id,callsign,from_airport,to_airport,paid,value) values (now(),$id,'$callsign','$fromlocation','$newlocation','1','$valorpagado')";
		if (!$result = $db->query($sql)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		$sql2 = "insert into bank (gvauser_id,date,quantity,jump) values ($id,now(),$valorpagado,'" . VALIDATE_JUMP . " $fromlocation - $newlocation')";
		if (!$result = $db->query($sql2)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		$db->close();
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./index_vam_op.php?page=pilot_options">';
		} else {
			?>
<script type="text/javascript">
alert("No tienes suficiente dinero | You dont have enough money");
window.location="./index_vam_op.php?page=pilot_options";
</script>
			<?php
		}
	}
else
	{
		include("./notgranted.php");
	}
?>