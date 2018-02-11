<?php
	/**
	 * @Project: Virtual Airlines Manager (VAM)
	 * @Author: Alejandro Garcia
	 * @Web http://virtualairlinesmanager.net
	 * Copyright (c) 2013 - 2015 Alejandro Garcia
	 * VAM is licensed under the following license:
	 *   Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
	 *   View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
	 */




?>

<?php
	$db = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db->set_charset("utf8");
	if ($db->connect_errno > 0) {
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
	// DATOS UBICACIÓN
	
	$sql3 = "SELECT * FROM airports  where ident='$location'";

	if (!$result3 = $db->query($sql3)) {

		die('There was an error running the query  [' . $db->error . ']');

	}
	
	
	while ($row3 = $result3->fetch_assoc()) {

		$latitude_deg_loc = $row3['latitude_deg'];

		$longitude_deg_loc = $row3['longitude_deg'];

	}
	
	
	
	
	
	
	$sql = "select DISTINCT departure from routes order by departure asc";
	if (!$result = $db->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	$comboicao = '';
	while ($row = $result->fetch_assoc()) {
		$newlocation = $row['departure'];
		// DETALLES AEROPUERTO IDA
	
	$sql1 = "select ident, name, latitude_deg, longitude_deg from airports where ident='$newlocation'";
	if (!$result1 = $db->query($sql1)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	
		while ($row1 = $result1->fetch_assoc()) {
	
	$latitude_deg_arr = $row1['latitude_deg'];

    $longitude_deg_arr = $row1['longitude_deg'];


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



		$comboicao .= " <option value='" . $row['departure'] .  "'>" . $row['departure'] .  " [$" . $valortiquete . " COP]</option>"; //concatenamos el los options para luego ser insertado en el HTML


}

?>
	