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
?>
<?php
  $medal_pilot=$id;
  include('get_va_parameters.php');
  
?>


			
					<header class="major">
						<h2><?php echo AVIANCA_WELCOME_INTRO; ?></h2>
						<p><?php echo AVIANCA_WELCOME_INTRO_INFO; ?></p>
					</header>
					  <ul class="nav nav-tabs">
    <li class="active" ><a data-toggle="tab" href="#main" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_MAIN;?></a></li>
	<li><a data-toggle="tab" href="#menu" style="background-color: #ae0200;color: #FFFFFF;"><?php echo ucfirst(strtolower(PILOT_ACTIONS));?></a></li>
    <li><a href="./index_vam_op.php?page=pilot_profile_stats" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_STATS;?></a></li>
    <li><a data-toggle="tab" href="#certifications" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_CERTIFICATIONS;?></a></li>
    <li><a data-toggle="tab" href="#awards" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_AWARDS;?></a></li>
    <li><a data-toggle="tab" href="#tour" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_TOURS;?></a></li>
	<?php if ($_SESSION["access_pilot_manager"] == '1') { ?>
	<li><a href="./index_vam_op.php?page=report_pilot_activity" style="background-color: #ae0200;color: #FFFFFF;"><?php echo RPT_PILOT_ACTIVITY;?></a></li>
	<?php } ?>
	<?php if ($_SESSION["access_fleet_manager"] == '1') { ?>
	<li><a href="./index_vam_op.php?page=report_plane_out_route" style="background-color: #ae0200;color: #FFFFFF;"><?php echo RPT_PLANE_OUT;?></a></li>
	<?php } ?>
  </ul>
  <div class="tab-content">
    <div id="main" class="tab-pane fade in active">
      <p><?php include('pilot_profile_details_stats.php'); echo '<center>'; include( 'pilot_profile_flights.php'); echo '</center>'; ?></p>
    </div>
    <div id="stats" class="tab-pane fade">
        <p><?php $pilotid=$id;include('pilot_profile_stats.php'); ?></p>
    </div>
    <div id="certifications" class="tab-pane fade">
        <p><?php include('pilot_certifications.php'); ?></p>
    </div>
    <div id="awards" class="tab-pane fade">
      <p><?php include('pilot_awards.php');?></p>
    </div>
    <div id="tour" class="tab-pane fade">
      <p><?php include('pilot_tour_awards.php');?></p>
    </div>
	<div id="menu" class="tab-pane fade">
      <p><div class="panel panel-default">
	<div class="panel-heading" style="background-color: #ae0200;">
				<h3 class="panel-title" style="color: #FFFFFF;"><IMG src="images/icons/ic_apps_white_18dp_1x.png">&nbsp;<?php echo PILOT_ACTIONS; ?></h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=mails"><img src="images/Email.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_MAIL; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=route_selection_stage1"><img src="images/Map-icon.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_ROUTE_RESERVE; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="#" data-toggle="modal" data-target="#JumpModal"><img src="images/Travel-Airplane-icon.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_CHANGE_LOCATION; ?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=my_bank"><img src="images/money-icon.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_BANK; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=pirep_manual_create"><img src="images/validate.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_MANUAL_PIREP; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=my_profile"><img
							src="images/Occupations-Pilot-Male-Light-icon.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_PROFILE; ?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=pilot_profile_stats&pilotid=<?php echo $id;?>"><img src="images/estadisticas.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_STATS; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=vaparameters_info"><img src="images/fmc.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_VA_PARAMETER; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=download"><img src="images/download.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_DOWNLOADS; ?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-4">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=tours_pilot"><img src="images/tour.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo OPTION_TOUR; ?></strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-sm-8">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=jeppesen"><img src="images/Jeppesen.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong>Charts Jeppesen</strong></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-sm-12">
				<div class="thumbnail">
					<a href="./index_vam_op.php?page=acars_download"><img src="./images/avianca/2.png" width="20%"></a>
					<div class="caption">
						<p class="text-center"><strong>Avianca ACARS</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></p>
    </div>
  </div>
  </div>

  <?php
include('icaodd.php');
	?>

<!-- Modal -->
<div class="modal fade" id="JumpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo CHANGE_LOCATION; ?> [$ <?php echo $money; ?> COP]</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="change-location-form" action="./index_vam_op.php?page=jump_insert"
				      role="form" method="post">
					<div class="form-group">
						<label class="control-label col-sm-2" for="destiny"><?php echo CHANGE_LOCATION_ICAO; ?></label>
						<div class="col-sm-10">
						    <select class="form-control" name="destiny" id="destiny"  ><?php echo $comboicao; ?></select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit"
							        class="btn btn-primary"><?php echo CHANGE_LOCATION_SUBMIT_BTN; ?></button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>

<?php
}
else
{
	include("./notgranted.php");
}
?>

