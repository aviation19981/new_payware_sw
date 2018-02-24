
<?php
	if (isset($_GET['pilotid']))
	{
		$pilotid=$_GET['pilotid'];
	} else {
		$pilotid=$id;
	}
	require('pilot_profile_stats_sql.php');
?>
		
					<header class="major">
						<h2><?php echo AVIANCA_WELCOME_INTRO; ?></h2>
						<p><?php echo AVIANCA_WELCOME_INTRO_INFO; ?></p>
					</header>
					
					
				

<ul class="nav nav-tabs">
    <li class="active" ><a data-toggle="tab" href="./index_vam_op.php?page=pilot_options#main" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_MAIN;?></a></li>
	<li><a data-toggle="tab" href="./index_vam_op.php?page=pilot_options#menu" style="background-color: #ae0200;color: #FFFFFF;"><?php echo ucfirst(strtolower(PILOT_ACTIONS));?></a></li>
    <li><a href="./index_vam_op.php?page=pilot_profile_stats" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_STATS;?></a></li>
    <li><a data-toggle="tab" href="./index_vam_op.php?page=pilot_options#certifications" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_CERTIFICATIONS;?></a></li>
    <li><a data-toggle="tab" href="./index_vam_op.php?page=pilot_options#awards" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_AWARDS;?></a></li>
    <li><a data-toggle="tab" href="./index_vam_op.php?page=pilot_options#tour" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_TOURS;?></a></li>
  </ul>
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
<br>
<section>
<!-- Row 0-->
<div class="tab-content">
<div class="row">
	<div class="col-md-12">
	
<div class="card-wrapper" style="width:100%; height:2500px">
	<div class="card-container"  style="width:100%; height:2500px">
		<div class="card-inner" style="width:100%; height:2500px">
			<div class="card-group"   style="width:100%; height:2500px">		
				<div class="card-front"  style="width:100%; height:2500px">
					<div class="card-covertres"   style="width:100%; "></div>
					<div class="my-profile"  style="width:100%; ">
						<span class="thumb"><img src="./images/logito.png" alt="" /></span>
					</div>
					<div class="info">
						<p class="name"><?php echo PILOT_STATICS; ?></p>
					</div>
					
					
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo PILOT_STATICS; ?></h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td><?php echo PILOT_FLIGHTS; ?></td>
						<td><?php echo $num_fsacars + $num_fskeeper + $num_pireps + $num_vamacars - $num_fsacars_rejected - $num_fskeeper_rejected - $num_pireps_rejected - $num_vamacars_rejected; ?></td>
						<td><?php echo PILOT_HOURS; ?></td>
						<td><?php echo convertTime(($transfered_hours + $gva_hours),$va_date_format); ?></td>
					</tr>
					<tr>
						<td><?php echo PILOT_DISTANCE; ?></td>
						<td><?php echo $dist_pireps + $dist_fskeeper + $dist_fsacars  + $dist_vamacars - $dist_pireps_rejected - $dist_fskeeper_rejected - $dist_fsacars_rejected - $dist_vamacars_rejected .' NM'; ?></td>
						<td><?php echo PILOT_FLIGHTSREGULAR; ?></td>
						<td><?php echo $num_pireps_reg + $num_fskeeper_reg + $num_fsacars_reg + $num_vamacars_reg - $num_pireps_reg_rejected - $num_fskeeper_reg_rejected - $num_fsacars_reg_rejected - $num_vamacars_reg_rejected; ?></td>
					</tr>
					<tr>
						<td><?php echo PILOT_FLIGHTSCHARTER; ?></td>
						<td><?php echo $num_pireps + $num_fskeeper + $num_fsacars + $num_vamacars - $num_pireps_reg - $num_fskeeper_reg - $num_fsacars_reg - $num_vamacars_reg - $num_fsacars_rejected - $num_fskeeper_rejected - $num_pireps_rejected - $num_vamacars_rejected - $num_pireps_reg_rejected - $num_fskeeper_reg_rejected - $num_fsacars_reg_rejected - $num_vamacars_reg_rejected; ?></td>
						<td><?php echo PILOT_PERFLIGHTREGULAR; ?></td>
						<td><?php
								if (($num_pireps + $num_fskeeper + $num_fsacars + $num_vamacars - $num_fsacars_rejected - $num_fskeeper_rejected - $num_pireps_rejected - $num_vamacars_rejected) < 1) {
									echo '0 %';
								} else {
									echo number_format((100 * ($num_pireps_reg + $num_fskeeper_reg + $num_fsacars_reg + $num_vamacars_reg - $num_pireps_reg_rejected - $num_fskeeper_reg_rejected - $num_fsacars_reg_rejected - $num_vamacars_reg_rejected)) / ($num_pireps + $num_fskeeper + $num_fsacars + $num_vamacars - $num_fsacars_rejected - $num_fskeeper_rejected - $num_pireps_rejected - $num_vamacars_rejected) , 2) . ' %';
								};?></td>
					</tr>
					<tr>
						<td><?php echo PILOT_MANUALREPORT; ?></td>
						<td><?php echo $num_pireps - $num_pireps_rejected; ?></td>
						<td><?php echo PILOT_FSKEEPERREPORT; ?></td>
						<td><?php echo $num_fskeeper - $num_fskeeper_rejected; ?></td>
					</tr>
					<tr>
						<td><?php echo PILOT_FSACARSREPORT; ?></td>
						<td><?php echo $num_fsacars - $num_fsacars_rejected; ?></td>
						<td>AVIANCA Acars Reports</td>
						<td><?php echo $num_vamacars - $num_vamacars_rejected; ?></td>
					</tr>
					<tr>
						<td><?php echo AVG_DURATION; ?></td>
						<td><?php echo convertTime($duration_avg_gen,$va_date_format); ?></td>
						<td><?php echo AVG_DISTANCE; ?></td>
						<td><?php echo number_format($distance_avg_gen,2) .' NM'; ?></td>
					</tr>
					<tr>
						<td><?php echo AVG_LANDING_VS; ?></td>
						<td><?php
								if ($num_pireps<1 && $num_vamacars<1)
									{
										$landingvs_avg_gen=0;
									}
									echo number_format ($landingvs_avg_gen,2) .' ft/min'; ?></td>
						<td><?php echo LAST_30D_FLIGHT; ?></td>
						<td><?php echo $flights_last_30d; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="clearfix visible-lg"></div>
</div>
</div>
<!-- Row 1-->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo STATISTICS_NUMBER_FLIGTH_CURRENT_MONTH; ?></h3>
			</div>
			<div class="panel-body">
				<div id="flights_per_day" ></div>
				<script>
					  var flights_per_day= Morris.Bar({
					  element: 'flights_per_day',
					  data: [<?php echo $count_per_day;?>
					  ],
					  xkey: 'day',
					  ykeys: ['flights'],
					  labels: ['flights'],
					  parseTime: false,
					  resize: true,
					  stacked: true,
					  yLabelFormat: function(y){return y != Math.round(y)?'':y;}
					});
					  $('ul.nav a').on('shown.bs.tab', function (e) {
				            flights_per_day.redraw();
				    });
				</script>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo STATISTICS_NUMBER_FLIGTH_PER_MONTH_CURRENT_YEAR; ?></h3>
			</div>
			<div class="panel-body">
				<div id="flights_per_month" ></div>
				<script>
					  var flights_per_month= Morris.Line({
					  element: 'flights_per_month',
					  data: [<?php echo $count_per_month;?>
					  ],
					  xkey: 'day',
					  ykeys: ['flights'],
					  labels: ['flights'],
					  parseTime: false,
					  resize: true,
					  stacked: true,
					  yLabelFormat: function(y){return y != Math.round(y)?'':y;}
					});
					  $('ul.nav a').on('shown.bs.tab', function (e) {
				            flights_per_month.redraw();
				    });
				</script>
			</div>
		</div>
	</div>
</div>
<!-- Row 2-->
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo VAMACARS_LANDANALYSIS; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_lnd_vs" style="height: 350px;"></div>
					<script>
						  var landing_vs_graph = Morris.Donut({
						  element: 'perc_lnd_vs',
						  data: [<?php echo $landing_vs_graph ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            landing_vs_graph.redraw();
				            });
					</script>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo STATISTICS_PERCENTAGE_BY_REPORT_TYPE; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_countr2" style="height: 350px;"></div>
					<script>
						  var perc_countr2 = Morris.Donut({
						  element: 'perc_countr2',
						  data: [<?php echo $per_type_report ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            perc_countr2.redraw();
				            });
					</script>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo STATISTICS_PERCENTAGE_REG_VS_CHARTER; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_charter_reg" style="height: 350px;"></div>
					<script>
						  var perc_ch_re = Morris.Donut({
						  element: 'perc_charter_reg',
						  data: [<?php echo $perc_charter_reg ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            perc_ch_re.redraw();
				            });
					</script>
			</div>
		</div>
	</div>
</div>
<!-- Row 3-->
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo PILOT_STATS_COUNTRY; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_by_country" style="height: 350px;"></div>
					<script>
						  var perc_by_country =  Morris.Donut({
						  element: 'perc_by_country',
						  data: [<?php echo $countcountry ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            perc_by_country.redraw();
				    });
					</script>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo PILOT_STATS_PERC_PLANE; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_type_report" style="height: 350px;"></div>
					<script>
						  var perc_aircarft_type_used =  Morris.Donut({
						  element: 'perc_type_report',
    					  data: [<?php echo $perc_aircarft_type_used ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            perc_aircarft_type_used.redraw();
				            });
					</script>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><IMG src="images/icons/ic_equalizer_white_18dp_1x.png">&nbsp;<?php echo PILOT_STATS_PERC_DURATION; ?></h3>
			</div>
			<div class="panel-body">
				<div id="perc_flight_duration" style="height: 350px;"></div>
					<script>
						  var perc_flight_time = Morris.Donut({
						  element: 'perc_flight_duration',
						  data: [<?php echo $duration_graph ; ?>],
						  formatter: function(y){return y+' %';}
						});
						  $('ul.nav a').on('shown.bs.tab', function (e) {
				            perc_flight_time.redraw();
				            });
					</script>
			</div>
		</div>
	</div>
					
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
</div>
</div>

</section>