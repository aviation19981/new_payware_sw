<?php
	//require('check_login.php');
	include('get_pilot_data.php');
	require_once ('./helpers/conversions.php');
	
				
	$cs = $location;
	



	
$taf = "NO TAF";			
$filecontents = file_get_contents('http://wx.ivao.aero/taf.php');
$rows = explode("\n", $filecontents);
foreach ($rows as $row) {

	$fields = explode(" ", $row);
	
if ($fields[0]==$cs) {
	
$taf = $row;
}
}



$metar = "NO METAR";
$filecontentsmetar = file_get_contents('http://wx.ivao.aero/metar.php');
$rowsmetar = explode("\n", $filecontentsmetar);
foreach ($rowsmetar as $rowmetar) {

	$fieldsmetar = explode(" ", $rowmetar);
	
if ($fieldsmetar[0]==$cs) {
	
$metar = $rowmetar;
}
}


$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$web= "http://" . $host . $url;
$en = str_replace("&lang=en","",$web);
$es = str_replace("&lang=es","",$en);
$fullweb = $es;

    if (isset ($_GET['lang']))
	{
		$_SESSION['language'] = $_GET['lang'];
	}
	
	$lang = $_SESSION['language'];
?>
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
<style>
	.panel-default>.panel-heading {
	background-color: #ae0200;
	color: #FFFFFF;
	}
	
	#banner {
    background-image: url(../images/dark_tint.png), url(./images/portada/<?php echo rand(0,5); ?>.jpg);
    background-position: center center;
    background-size: cover;
    color: #ffffff;
    padding: 14em 0em 14em;
    text-align: center;
    }
	
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
	min-width: 0px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
	</style>
	</head>
	<body class="landing">
	
	<!-- Header -->
			<header id="header">
				<h1 ><a href="./index_vam.php"><img src="./images/avianca/<?php echo rand(1,2); ?>.png"></a></h1>
				<nav id="nav">
					<ul>
				<li><a href="./index_vam.php"><i class="fa fa-home fa-fw"></i> <?php echo 'Home'; ?></a></li>
				<li><a href="./index_vam_op.php?page=pilot_options"><i class="fa fa-gears fa-fw"></i> <?php echo MENU; ?></a></li>
					
			<?php if ($_SESSION["access_administration_panel"] == 1) { ?>
				<li><a href="../vamcore/Gvausers"><span class="fa fa-briefcase fa-fw"></span> <?php echo ADMIN; ?></a></li> <?php } ?>
				<li><a href="./logout.php"><span class="fa fa-globe fa-fw"></span> <?php echo 'Log out ' . $_SESSION["user"]; ?></a></li>
				
				
				<?php if($lang=="en") {  
                   $idioma = "EN";
				} else {
                   $idioma = "ES";
				} 
                ?>				
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-language fa-fw"></i> <img src="./images/languagues/<?php echo $idioma; ?>.png" width="25%"/><span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php if (!isset($_GET["page"]) || trim($_GET["page"]) == "") { ?>
					<?php if($lang=="en") {  ?>
						<li><a href="./index_vam.php?lang=es" class="button"><img src="./images/languagues/ES.png" width="25%"/> Spanish</a></li>
					<?php } else { ?>
					    <li><a href="./index_vam.php?lang=en" class="button"><img src="./images/languagues/EN.png" width="25%"/> Inglés</a></li>
					<?php } ?>
					<?php } else { ?>
					<?php if($lang=="en") {  ?>
					  <li><a href="<?php echo $fullweb; ?>&lang=es" class="button"><img src="./images/languagues/ES.png" width="25%"/> Spanish</a></li>
					<?php } else { ?>
					  <li><a href="<?php echo $fullweb; ?>&lang=en" class="button"><img src="./images/languagues/EN.png" width="25%"/> Inglés</a></li>
					<?php } ?>
					<?php } ?>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo AVIANCA_HELLO; ?> <?php echo $pilotname . ' ' . $pilotsurname; ?></h2>
				<p><?php echo AVIANCA_HELLO_INFO; ?></p>
			</section>
            
				<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2><?php echo AVIANCA_INFO_INTRANET; ?></h2>
						<p><?php echo AVIANCA_INFO_INTRANET_DETAIL; ?></p>
					</header>
					
					
					<p><span class="image left"><img src="images/infoava.png" alt="" width="5%"/></span><h4>METAR <?php echo $location; ?></h4><blockquote><?php echo $metar; ?></blockquote></p>
				    <br>
					<hr>
					<br>
					<p><span class="image right"><img src="images/infoava.png" alt="" width="5%"/></span><h4>TAF <?php echo $location; ?></h4><blockquote><?php echo $taf; ?></blockquote></p>
					
				<br>
				<hr>
				<br>

					<!--<a href="#" class="image fit"><img src="images/notam.png" alt="" /></a>-->
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><IMG src="images/icons/ic_cast_white_18dp_1x.png">&nbsp;<?php echo NOTAMS_VA; ?></h3>
					</div>
					<div class="panel-body">
						<?php
							$db = new mysqli($db_host , $db_username , $db_password , $db_database);
							$db->set_charset("utf8");
							if ($db->connect_errno > 0) {
								die('Unable to connect to database [' . $db->connect_error . ']');
							}
							$sql = "select notam_id,notam_name,DATE_FORMAT(publish_date,'%d-%m-%Y') as publish_date_web ,DATE_FORMAT(publish_date,'%Y%m%d') as publish_date,DATE_FORMAT(hide_date,'%Y%m%d') as hide_date, DATE_FORMAT(now(),'%Y%m%d') as currdat
from notams order by publish_date asc limit 5";
							if (!$result = $db->query($sql)) {
								die('There was an error running the query [' . $db->error . ']');
							}
						?>
						<table class="table table-striped">
							<?php
							    $contadornotam=0;
								echo "<thead><tr><th>" . NOTAM_NAME . "</th><th>" . NOTAM_DATE . "</th></tr></thead>";
								while ($row = $result->fetch_assoc()) {
									if (($row["publish_date"]-$row["currdat"] <=0) && ($row["hide_date"]-$row["currdat"]>0))
									{
										$contadornotam++;
										echo '<tr><td>';
										echo '<a href="index.php?page=notam&notam_id=' . $row["notam_id"] . '">' . $row["notam_name"] . '</a>' . '</td><td>';
										echo $row["publish_date_web"] . '</td></tr>';
									}
								}
								if($contadornotam==0) {
								echo '<tr><td colspan="2"><a  class="button" style="width:100%;">NO NOTAM</a></td></tr>';	
								}
							?>
					            </table>
					</div>
				  </div>
			
			
			      <div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><IMG src="images/icons/ic_slow_motion_video_white_18dp_1x.png">&nbsp;<?php echo FUTURE_EVENTS; ?></h3>
					</div>
					<div class="panel-body">
						<?php
							$db = new mysqli($db_host , $db_username , $db_password , $db_database);
							$db->set_charset("utf8");
							if ($db->connect_errno > 0) {
								die('Unable to connect to database [' . $db->connect_error . ']');
							}
							$sql = "select event_id,event_name,DATE_FORMAT(publish_date,'$va_date_format') as publish_date_web ,DATE_FORMAT(publish_date,'%Y%m%d') as publish_date,DATE_FORMAT(hide_date,'%Y%m%d') as hide_date, DATE_FORMAT(now(),'%Y%m%d') as currdat
from events order by publish_date asc limit 5";
							if (!$result = $db->query($sql)) {
								die('There was an error running the query [' . $db->error . ']');
							}
						?>
						<table class="table table-hover">
							<?php
							    $contadorevent=0;
								echo "<thead><tr><th>" . EVENT_NAME . "</th><th>" . EVENT_DATE . "</th></tr></thead>";
								while ($row = $result->fetch_assoc()) {
									if (($row["publish_date"]-$row["currdat"] <=0) && ($row["hide_date"]-$row["currdat"]>0))
									{
										$contadorevent++;
										echo '<tr><td>';
										echo '<a href="index.php?page=event&event_id=' . $row["event_id"] . '">' . $row["event_name"] . '</a>' . '</td><td>';
										echo $row["publish_date_web"] . '</td></tr>';
									}
								}
								if($contadorevent==0) {
								echo '<tr><td colspan="2"><a  class="button" style="width:100%;">NO EVENT</a></td></tr>';	
								}
							?>
						</table>
					</div>
				</div>
			
				</div>
			</section>

 <!-- Two -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Detalles</h2>
						<p>Relevancia en nuestras operaciones!</p>
					</header>
				</div>
				
				<div class="row">
								<div class="3u 12u(3)">
								<h1><font color="white">Pilotos</font></h1>
								<h2>+<?php echo $num_pilots; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white">Rutas</font></h1>
								<h2>+<?php echo $num_routes; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white">Hubs</font></h1>
								<h2>+<?php echo $num_hubs; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white">Aeronaves</font></h1>
								<h2>+<?php echo $num_planes; ?></h2>
								</div>
				</div>
			</section>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				<section class="links">
						<div class="row">
							<section class="4u 6u(medium) 12u$(small)">
								<h3>Nuevos Pilotos</h3>
								<ul class="unstyled">
								<?php
							$db = new mysqli($db_host , $db_username , $db_password , $db_database);
							$db->set_charset("utf8");
							if ($db->connect_errno > 0) {
								die('Unable to connect to database [' . $db->connect_error . ']');
							}
							$sql = "select gvauser_id, concat(callsign,'-',name,' ',surname) as pilot , DATE_FORMAT(register_date,'$va_date_format') as register_date from gvausers where activation=1 order by DATE_FORMAT(register_date,'%Y%m%d') desc limit 2";
							if (!$result = $db->query($sql)) {
								die('There was an error running the query [' . $db->error . ']');
							}
						
						
								while ($row = $result->fetch_assoc()) {
									echo '<li><a href="./index.php?page=pilot_details&pilot_id=' . $row["gvauser_id"] . '">' . $row["pilot"] . '</a></li>';
								}
							?>
								</ul>
							</section>
							<section class="4u 6u$(medium) 12u$(small)">
								<h3>Certificado</h3>
								<ul class="unstyled">
									
									<li><a href="https://www.ivao.aero/"><img src="./images/ivao.svg" width="10%"/>IVAO World</a></li>
									<li><a href="http://ivaocol.com/"><img src="./images/co.svg" width="10%"/>IVAO Colombia</a></li>
								</ul>
							</section>
							<section class="4u 6u(medium) 12u$(small)">
								<h3>Contáctenos</h3>
								<ul class="unstyled">
									<li><a href="#">aviation19981@live.com</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; <?php echo date("Y"); ?> Avianca Virtual. All rights reserved.</li>
								<li>Certificado: <a href="#">IVAO</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>