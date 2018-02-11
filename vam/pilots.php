<style>


small, .small {
    font-size: 75%
}

.borderless tbody tr td, .borderless tbody tr th, .borderless thead tr th {
    border: none;
}

.thborderless thead th {
    border: none;
}

.table-map > tbody > tr > td, .table > tfoot > tr > td {
    padding: 0px;
    line-height: 1.42857;
    vertical-align: top;
    border-top: 1px solid #DDD;
}

.progress {
    height: 20px;
    margin-bottom: 10px;
    overflow: hidden;
    background-color: #FFF;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}

th {
    background-color: #e3e6e8;
    color: #215169;
}


</style>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2><?php echo AVIANCA_PCA_CHECK; ?></h2>
						<p><?php echo AVIANCA_PCA_CHECK_INFO; ?></p>
					</header>

					<!-- Text -->
						<section>	


<?php 
include('./db_login.php');
include('./va_parameters.php');
	$db = new mysqli($db_host , $db_username , $db_password , $db_database); 
	$db->set_charset("utf8"); 
	if ($db->connect_errno > 0) {
	  die('Unable to connect to database [' . $db->connect_error . ']');
    } 
	

$sql2 = "select * from gvausers where activation<>0 order by callsign asc";

if (!$result2 = $db->query($sql2)) {
	die('There was an error running the query [' . $db->error . ']');
}
?>
<div class="row2">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading" style="background-color: #ae0200;color: #FFFFFF;"><IMG src="images/icons/ic_group_white_18dp_1x.png">&nbsp;<?php echo PILOT_ROSTER; ?></div>
			<br>
			<!-- Table -->
			<table id="pilots_public" class="table table-hover">
					<?php
						echo '<thead>';
						echo "<tr><th>" . CALLSIGN . " </th><th>" . NAME . "</th><th>" . LOCATION . "</th><th>" . HOURS . "</th><th>" . RANK . "</th><th>" . STATUS . "</th>";
						if ($ivao == 1) echo '<th>' . IVAOID . '</th>';
						if ($vatsim == 1) echo '<th>' . VATSIMID . '</th>';
						echo "</tr>";
						echo '</thead>';
						
						
						
	

						while ($row2 = $result2->fetch_assoc()) {
							
	$pilotID = 	$row2['gvauser_id'];
    $location = 	$row2['location'];	
	$gva_hours=0;
	if ($no_count_rejected==1)
	{
		$sql = "select sum(time) as gva_hours from v_total_data_flight_no_rejected where pilot=$pilotID group by pilot";
	}
	else
	{
		$sql = "select sum(time) as gva_hours from v_total_data_flight where pilot=$pilotID group by pilot";
	}
	if (!$result = $db->query($sql)) {
		die('There was an error running the query  [' . $db->error . ']');
	}
	while ($row = $result->fetch_assoc()) {
		$gva_hours = round($row['gva_hours'] , 2);
	}
	
	$totalhours = $gva_hours+$row2["transfered_hours"];
	
	$segundos = $totalhours*3600;




$horas = floor($segundos/3600);
$minutos = floor(($segundos-($horas*3600))/60);
$segundos = $segundos-($horas*3600)-($minutos*60);
$total= $horas.' h '.$minutos.' m ';


$sql6 = "SELECT * FROM airports  where ident='$location' ";

	if (!$result6 = $db->query($sql6)) {

		die('There was an error running the query  [' . $db->error . ']');

	}


	

	while ($row6 = $result6->fetch_assoc()) {

		$location_airport_names = $row6['name'];

		$location_airport_flags = $row6['iso_country'];

	}
	
	
	$rank_id = $row2["rank_id"];
											
	$sql7 = "select * from ranks where rank_id='$rank_id'";

	if (!$result7 = $db->query($sql7)) {

		die('There was an error running the query  [' . $db->error . ']');

	}

	while ($row7 = $result7->fetch_assoc()) {

		$image_url = $row7['image_url'];
        $namerank = $row7['rank'];

	}


						echo "
                            <td>";
						echo '<a href="./index.php?page=pilot_details&pilot_id=' . $row2["gvauser_id"] . '">' . $row2["callsign"] . '</a>
                            </td>
                            <td>';
						echo $row2["name"] . ' ' . $row2["surname"] . '</td>
                            <td>';
						echo '<img src="./images/country-flags/' . $location_airport_flags . '.png" alt="' . $location_airport_flags . '"> <a href="./index.php?page=airport_info&airport='.$row2["location"] .'"><b>'. strtoupper($row2["location"]).'</b> [' . $location_airport_names . ']</a></td>
                            <td>';
						echo '<i class="fa fa-clock-o"></i>&nbsp;'. $total . '</td>
                            <td>';
						if (strlen($image_url) > 0) {
							echo '<img src="' . $image_url . '"><br>' . ' ';
						}
						echo $namerank . '</td><td>';
						if ($row2["activation"] == 1) echo '<img src="./images/green-user-icon.png" height="25" width="25" </td>'; else echo '<img src="./images/red-user-icon.png" height="25" width="25" </td>';
						if ($ivao == 1) {
							
							$imagenvid ='';
							if(!empty($row2["ivaovid"])) {
								$imagenvid = '<img src="http://status.ivao.aero/' . $row2["ivaovid"] . '.png">';
							} else {
								$imagenvid = $row2["ivaovid"];
							}
							echo '
                                <td><a href="https://www.ivao.aero/Member.aspx?ID=' . $row2["ivaovid"] . '">' . $imagenvid  . '</a>
                                </td>';
						}
						if ($vatsim == 1) {
							echo '
                                <td><a href="http://www.vataware.com/pilot/' . $row2["vatsimid"] . '">' . $row2["vatsimid"] . '</a>
                                </td>';
						}
						echo '</tr>';
					} $db->close(); ?>
			</table>
		</div>
	</div>
	<div class="clearfix visible-lg"></div>
</div>


</section>
</div>
</section>