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
.card-group .card-front .card-coverdos {width:100%; height:120px; background:url('./images/portada/<?php echo rand(0,5) ; ?>.jpg') no-repeat 50% 50%; background-size:cover;}
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
.card-group .card-front article ul li {display:block; margin-top:1px; font-size:70%;}
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
	<div class="col-md-3">
	
			<div class="card-wrapper">
	<div class="card-container">
		<div class="card-inner">			
			<div class="card-group">				
				<div class="card-front">
					<div class="card-cover"></div>
					<div class="my-profile">
					      <?php if (strlen ($pilot_image)<=10)
							{
								$pilot_image="./uploads/pilot_default.png";
							} ?>
						<span class="thumb"><img src="<?php echo $pilot_image; ?>" alt="" /></span>
					</div>
					<div class="info">
						<p class="name"><?php echo $pilotname . ' ' . $pilotsurname; ?>
						<br>
						<?php echo strtoupper($callsign); ?> 
						<br>
						<?php echo $register_date; ?>
						</p>
					</div>
					<article>
						<ul>
							<li>
								<em><b><?php echo PILOT_LOCATION; ?></b></em>
								<div>
								<?php echo strtoupper($location); ?>
							    <?php echo '<img src="./images/country-flags/' . $location_airport_flag . '.png" alt="' . $location_airport_flag . '">' ?>
								<?php if (isset($location_airport_name))
						           {
							         echo '<font size="1">&nbsp;'.str_replace ("Airport","",$location_airport_name).'</font>';
						        } ?>
								</div>
							</li>
							<li>
								<em><b><?php echo PILOT_HUB; ?></b></em>
								<div>
								<?php echo $hub;?>
						<?php if (isset($hub_airport_flag))
						{
							echo '<img src="./images/country-flags/' . $hub_airport_flag . '.png" alt="' . $hub_airport_flag . '">';
						} ?>
						<?php if (isset($hub_airport_name))
						{
							echo '<font size="1">&nbsp;'.str_replace ("Airport","",$hub_airport_name).'</font>';
						} ?>
								</div>
							</li>
							<li>
								<em><b><?php echo PILOT_MONEY; ?></b></em>
								<div>
								<?php echo $money . ' ' . $currency; ?>
								</div>
							</li>
							<li>
								<em><b><?php echo PILOT_RANK; ?></b></em>
								<div>
								<img src="<?php echo $rank_url_image; ?>" width="10%"/> <?php echo $rank; ?>
								</div>
							</li>
						</ul>
					</article>
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


	<div class="col-md-9">
	
	<div class="card-wrapper" style="width:100%;">
	<div class="card-container"  style="width:100%;">
		<div class="card-inner"  style="width:100%;">			
			<div class="card-group"  style="width:100%;">				
				<div class="card-front"  style="width:100%;">
					<div class="card-coverdos"  style="width:100%;"></div>
					<div class="my-profile"  style="width:100%;">
						<?php if (strlen ($pilot_image)<=10)
							{
								$pilot_image="./uploads/pilot_default.png";
							} ?>
						<span class="thumb"><img src="<?php echo $pilot_image; ?>" alt="" /></span>
					</div>
					<div class="info">
						<p class="name"><?php echo PILOT_STATICS; ?></p>
					</div>
					<table class="altern">
					<tr>
					<td colspan="2"><b><center><?php echo PILOT_STATICS; ?></center></b></td>
					</tr>
					<tr>
						<td><?php echo PILOT_FLIGHTS; ?></td>
						<td><?php echo $num_fsacars + $num_fskeeper + $num_pireps + $num_vamacars - $num_fsacars_rejected - $num_fskeeper_rejected - $num_pireps_rejected - $num_vamacars_rejected; ?></td>
					    <td><?php echo PILOT_HOURS; ?></td>
						<td><?php echo convertTime(($transfered_hours + $gva_hours),$va_date_format); ?></td>
					</tr>
					<tr>
						<td><?php echo PILOT_DISTANCE; ?></td>
						<td><?php echo $dist_pireps + $dist_fskeeper + $dist_fsacars  + $dist_vamacars - $dist_pireps_rejected - $dist_fskeeper_rejected - $dist_fsacars_rejected - $dist_vamacars_rejected; ?></td>
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
						<td>AVIANCA Acars</td>
						<td><?php echo $num_vamacars - $num_vamacars_rejected; ?></td>
					</tr>
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



		<div class="clearfix visible-lg"></div>
	</div>
</div>
