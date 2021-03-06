<?php /**
 * @Project: Virtual Airlines Manager (VAM)
 * @Author: Alejandro Garcia * @Web http://virtualairlinesmanager.net
 * Copyright (c) 2013 - 2016 Alejandro Garcia
 * VAM is licenced under the following license:
 * Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 * View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
 */
?>
<?php
    $pilotID = $_GET['pilot_id'];
    include('get_pilotID_data.php');
    include('get_va_parameters.php');
    ?>
<!-- HOME PAGE begin -->
<br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#main" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_MAIN;?></a></li>
    <li><a data-toggle="tab" href="#certifications" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_CERTIFICATIONS;?></a></li>
    <li><a data-toggle="tab" href="#awards" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_AWARDS;?></a></li>
    <li><a data-toggle="tab" href="#tour" style="background-color: #ae0200;color: #FFFFFF;"><?php echo TAB_TOURS;?></a></li>
  </ul>
  <div class="tab-content">
    <div id="main" class="tab-pane fade in active">
      <p><?php include('pilot_profile_details_stats.php'); echo '<br><hr><br>'; include( 'pilot_profile_flights.php');?></p>
    </div>
    <div id="stats" class="tab-pane fade">
        <p><?php $pilotid=$pilotID;include('pilot_profile_stats.php'); ?></p>
    </div>
    <div id="certifications" class="tab-pane fade">
        <p><?php include('pilot_certifications.php'); ?></p>
    </div>
    <div id="awards" class="tab-pane fade">
      <p><?php $medal_pilot=$pilotID;include('pilot_awards.php');?></p>
    </div>
    <div id="tour" class="tab-pane fade">
      <p><?php $medal_pilot=$pilotID;include('pilot_tour_awards.php');?></p>
    </div>
  </div>
