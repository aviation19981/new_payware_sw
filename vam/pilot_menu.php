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
.card-group {position:relative; min-height 700px;}
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
</style>

<div class="row">
	<div class="col-md-12">
	
	
	<div class="card-wrapper" style="width:100%;height:1200px" >
	<div class="card-container" style="width:100%;height:1200px">
		<div class="card-inner"  style="width:100%;height:1200px">			
			<div class="card-group" style="width:100%;height:1200px">			
				<div class="card-front"  style="width:100%;height:1200px">	
					<div class="card-covertres" style="width:100%;height:300px">	</div>
					<div class="my-profile" style="width:100%">	
						<span class="thumb"><img src="./images/logito.png" alt="" /></span>
					</div>
					<div class="info">
						<p class="name"><?php echo PILOT_ACTIONS; ?></p>
					</div>





<article>

<div class="container" style="width:90%">

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
</div>