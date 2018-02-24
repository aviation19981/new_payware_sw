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
</style>

<div class="row">
	<div class="col-md-12">
	
		<div class="card-wrapper" style="width:100%;height:1500px">
	<div class="card-container"  style="width:100%;height:1500px">
		<div class="card-inner"  style="width:100%;height:1500px">	
			<div class="card-group" style="width:100%;height:1500px">	
				<div class="card-front"  style="width:100%;height:1500px">
					<div class="card-covertres"  style="width:100%;"></div>
					<div class="my-profile"  style="width:100%;">
						<span class="thumb"><img src="./images/logito.png" alt="" /></span>
					</div>
<?php
	include('hubdd.php');
	include('countriesdd.php');
	$db = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db->set_charset("utf8");
	if ($db->connect_errno > 0) {
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	//  Get va parameters
	$sql = "select * from gvausers where activation=1";
	if (!$result = $db->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}
	$number_current_pilots = $result->num_rows;
	if ($number_pilots < $number_current_pilots){
?>
					<div class="info">
						<p class="name"><?php echo REGISTER_WRONG; ?></p>
					</div>
					<hr>
					<div class="alert alert-danger" role="alert"><?php echo REGISTER_CLOSED_MSG; ?></div>
					

						<?php
							}
							else {
								?>
								
								<?php
		$id_test = $_GET['id_test'];
								
		$sqlexamen = "select * from resultados_admision where id='$id_test'";
		
		if (!$resultexamen = $db->query($sqlexamen)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		while ($rowresultado = $resultexamen->fetch_assoc()) {
		$nombres = $rowresultado['nombres'];
		$apellidos = $rowresultado['apellidos'];
		$vid_ivao = $rowresultado['vid_ivao'];
		$email = $rowresultado['email'];
		$rank_ivao = $rowresultado['rank_ivao'];
		}
								?>
					<div class="info">
						<p class="name"><?php echo REGISTER_FORM; ?></p>
					</div>
									
											<p>
											<form class="form-horizontal" id="register-form"
											      action="./index.php?page=pilot_insert" role="form" method="post">
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="name"><?php echo PILOT_NAME_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="name" id="name"
														       placeholder="<?php echo PILOT_NAME_PLACEHOLER_REG_FORM; ?>" value="<?php echo $nombres; ?>" readonly="readonly" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="surname"><?php echo PILOT_LASTNAME_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="surname"
														       id="surname"
														       placeholder="<?php echo PILOT_LASTNAME_PLACEHOLER_REG_FORM; ?>"  value="<?php echo $apellidos; ?>" readonly="readonly" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="birthday"><?php echo PILOT_BIRTHDATE_REG_FORM; ?></label>
													<div class="col-sm-9">
														<div class='input-group date' id='datetimepicker'>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
															<input type='text' name="birthdate" id="birthdate"
															       class="form-control"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="ivao"><?php echo PILOT_IVAOID_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="ivao" id="ivao"
														       placeholder="<?php echo PILOT_IVAOID_PLACEHOLER_REG_FORM; ?>" value="<?php echo $vid_ivao; ?>" readonly="readonly" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="vatsim"><?php echo PILOT_VATSIMID_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="vatsim"
														       id="vatsim"
														       placeholder="<?php echo PILOT_VATSIMID_PLACEHOLER_REG_FORM; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="language"><?php echo PILOT_LANGUAGE_REG_FORM; ?></label>
													<div class="col-sm-9">
														<select class="form-control" name="language" id="language">
															<?php echo $combolanguage; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="country"><?php echo PILOT_COUNTRY_REG_FORM; ?></label>
													<div class="col-sm-9">
														<select class="form-control" name="country" id="country">
															<?php echo $combocountry; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="city"><?php echo PILOT_CITY_REG_FORM; ?>
													</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="city" id="city"
														       placeholder="<?php echo PILOT_CITY_PLACEHOLER_REG_FORM; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="hub"><?php echo PILOT_HUB_REG_FORM; ?></label>
													<div class="col-sm-9">
														<select class="form-control" name="hub" id="hub">
															<?php echo $combohub_id; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="email"><?php echo PILOT_EMAIL_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="email" class="form-control" name="email" id="email"
														       placeholder="<?php echo PILOT_EMAIL_PLACEHOLER_REG_FORM; ?>" value="<?php echo $email; ?>" readonly="readonly" required>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="password"><?php echo PILOT_PASSWORD_REG_FORM; ?></label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="password"
														       id="password"
														       placeholder="<?php echo PILOT_PASSWORD_PLACEHOLER_REG_FORM; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="password2"><?php echo PILOT_CONFIRMPASSWORD_FORM; ?></label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="password2"
														       id="password2"
														       placeholder="<?php echo PILOT_PASSWORD_PLACEHOLER_REG_FORM; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-2"
													       for="notes"><?php echo PILOT_COMMENTS_REG_FORM; ?></label>
													<div class="col-sm-9">
														<textarea class="form-control" name="notes" id="notes" rows="3"
														          placeholder="<?php echo PILOT_COMMENTS_PLACEHOLER_REG_FORM; ?>"></textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-6">
														<div class="checkbox">
															<label>
															    <input type="checkbox" id="rules" name="rules" value="yes">
										                        <label for="rules"<a href="./index.php?page=rules" ><?php echo READ_RULES; ?><a/></label>
																
															</label>
														</div>
													</div>
													<p>
													<div class="col-sm-offset-2 col-sm-6">
														<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
														<p>
														</br>
														<input type="text" class="form-control" name="captcha" id="captcha">
														<input type="hidden"  name="captchahidden" id="captchahidden" value="<?php echo $_SESSION['captcha']['code']?>">
														<br>
														<button type="submit"
														        class="btn btn-primary"><?php echo BUTTONSUBMIT_REG_FORM; ?>
														</button>
														</br>
													</div>
												</div>
											</form>
									
							<?php
							} // Else close
						?>
	</div>
			</div>
				</div>
				</div>
				</div>
				</div>
				</div>