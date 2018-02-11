<?php 

	require_once ('./helpers/conversions.php');
	

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
				<h1 ><a href="./"><img src="./images/avianca/<?php echo rand(1,2); ?>.png"></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="./"><?php echo AVIANCA_HOME; ?></a></li>
						<li><a href="./?page=about_us"><?php echo AVIANCA_ABOUT; ?></a></li>
						<li><a href="./?page=mgo"><?php echo AVIANCA_MGO; ?></a></li>
						<li><a href="./?page=pilots"><?php echo AVIANCA_PCA; ?></a></li>
						<li><a href="./?page=stats"><?php echo AVIANCA_STATS; ?></a></li>
						<?php
			$sql = 'select callsign, arrival, departure, flight_status, name, surname, pending_nm, plane_type from vam_live_flights vf, gvausers gu where gu.gvauser_id = vf.gvauser_id ';
			if (!$result = $db->query($sql)) {
				die('There was an error running the query [' . $db->error . ']');
			}
			$row_cnt = $result->num_rows;
			$sql = "SELECT flight_id FROM `vam_live_flights` WHERE UNIX_TIMESTAMP (now())-UNIX_TIMESTAMP (last_update)>180";
			if (!$result = $db->query($sql)) {
				die('There was an error running the query [' . $db->error . ']');
			}
			while ($row = $result->fetch_assoc())
			{
				$sql_inner = "delete from vam_live_acars where flight_id='".$row["flight_id"]."'";
				if (!$result_acars = $db->query($sql_inner))
				{
				die('There was an error running the query [' . $db->error . ']');
				}
				$sql_inner = "delete from vam_live_flights where flight_id='".$row["flight_id"]."'";
				if (!$result_acars = $db->query($sql_inner))
				{
				die('There was an error running the query [' . $db->error . ']');
				}
			}
			if ($row_cnt>0){
		?>
						<li><a href="./live_flight_map.php"><?php echo AVIANCA_ONLINE; ?></a></li>
			<?php } ?>
						<?php if($user_logged==0) { ?>
						<li><a href="./?page=pilot_register" class="button color6"><?php echo AVIANCA_JOIN; ?></a></li>
						<li><a href="./?page=login_form" class="button"><?php echo AVIANCA_LOGIN; ?></a></li>
						<?php } else { ?>
						<li><a href="./index_vam.php" class="button"><?php echo AVIANCA_SYSTEM; ?></a></li>
						<?php } ?>
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
						<li><a href="./?lang=es" class="button"><img src="./images/languagues/ES.png" width="25%"/> Spanish</a></li>
					<?php } else { ?>
					    <li><a href="./?lang=en" class="button"><img src="./images/languagues/EN.png" width="25%"/> Inglés</a></li>
					<?php } ?>
					<?php } else { ?>
					<?php if($lang=="en") {  ?>
					  <li><a href="<?php echo $fullweb; ?>&lang=es" class="button"><img src="./images/languagues/ES.png" width="25%"/> Spanish</a></li>
					<?php } else { ?>
					  <li><a href="<?php echo $fullweb; ?>&lang=en" class="button"><img src="./images/languagues/EN.png" width="25%"/> Inglés</a></li>
					<?php } ?>
					<?php } ?>
					</ul>
				</li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2><?php echo AVIANCA_WELCOME; ?></h2>
				<p><?php echo AVIANCA_LEGAL; ?></p>
				<ul class="actions">
					<li>
						<a href="./?page=about_us" class="button big"><?php echo AVIANCA_MEET_US; ?></a>
					</li>
				</ul>
			</section>
				<?php 
					if (!isset($_GET["page"]) || trim($_GET["page"]) == "") {
						
					
                 ?>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2><?php echo AVIANCA_OFFERED; ?></h2>
						<p><?php echo AVIANCA_OFFERED_INFO; ?></p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color11 fa-plane"></i>
								<h3><?php echo AVIANCA_STATS; ?></h3>
								<p><?php echo AVIANCA_STATS_INFO; ?></p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color11 fa-info"></i>
								<h3>Pirep</h3>
								<p><?php echo AVIANCA_PIREP_INFO; ?></p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color11 fa-star"></i>
								<h3><?php echo AVIANCA_TRAINING; ?></h3>
								<p><?php echo AVIANCA_TRAINING_INFO; ?></p>
							</section>
						</div>
					</div>
				</div>
			</section>

	
			
				 <?php
				 
				
		
	                                                                           }
																			   
																			   if (!isset($_GET["page"]) || trim($_GET["page"]) == "") {
																			   
	                                                                           } else {
		                                                                          $Existe = file_exists($_GET["page"] . ".php");
		                                                                             if ($Existe == true) {
																						 
																						  if($_GET["page"]<>"about_us" || $_GET["page"]<>"pilots" || $_GET["page"]<>"stats") {
							echo '<section id="one" class="wrapper style1 special">
				                     <div class="container">';
						}
		                                                                                	include($_GET["page"] . ".php");
																							 if($_GET["page"]<>"about_us" || $_GET["page"]<>"pilots" || $_GET["page"]<>"stats") {
							echo '</div></section>';
						}
	                                                                               	 } else {
			                                                                                include("404.php");
                                                                                     }
	                                                                            }
		
                                                                            ?>
	<!-- Two -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2><?php echo AVIANCA_DETAIL; ?></h2>
						<p><?php echo AVIANCA_DETAIL_INFO; ?></p>
					</header>
				</div>
				
				<div class="row">
								<div class="3u 12u(3)">
								<h1><font color="white"><?php echo PILOTS; ?></font></h1>
								<h2>+<?php echo $num_pilots; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white"><?php echo ROUTES; ?></font></h1>
								<h2>+<?php echo $num_routes; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white">Hubs</font></h1>
								<h2>+<?php echo $num_hubs; ?></h2>
								</div>
								<div class="3u 12u(3)">
								<h1><font color="white"><?php echo FLEET; ?></font></h1>
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
								<h3><?php echo AVIANCA_NEW_PILOTS; ?></h3>
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
								<h3><?php echo AVIANCA_TITLE; ?></h3>
								<ul class="unstyled">
									<li><a href="https://www.ivao.aero/"><img src="./images/ivao.svg" width="10%"/>IVAO World</a></li>
									<li><a href="http://ivaocol.com/"><img src="./images/co.svg" width="10%"/>IVAO Colombia</a></li>
								</ul>
							</section>
							<section class="4u 6u(medium) 12u$(small)">
								<h3><?php echo AVIANCA_TALK; ?></h3>
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
								<li><?php echo AVIANCA_TITLE; ?>: <a href="#">IVAO</a></li>
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