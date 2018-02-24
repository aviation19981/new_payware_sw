<?php
		
	    $sql = "select * from admisiones where id=1";
		
		if (!$result = $db->query($sql)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		while ($row = $result->fetch_assoc()) {
        $nombre = $row["nombre"];
        $duracion = $row["duracion"];
		$preguntas = $row['preguntas'];
		$descripcion_es = $row['descripcion_es'];
		$descripcion_en = $row['descripcion_en'];
		$habilitado = $row['habilitado'];
		}
		
		?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2><?php echo AVIANCA_ADMISSIONS_TITLE; ?></h2>
						<p><?php echo AVIANCA_ADMISSIONS_TITLE_INFO; ?></p>
					</header>

<!-- Text -->
<section>
<h2><?php echo AVIANCA_ADMISSIONS_TITLE_FIRST; ?> <?php echo $duracion; ?> <?php echo AVIANCA_ADMISSIONS_TITLE_TWO; ?> <?php echo $preguntas; ?> <?php echo AVIANCA_ADMISSIONS_TITLE_THREE; ?></h2> 
<hr>
<li align="left"><?php echo AVIANCA_ADMISSIONS_ONE; ?></li>
<li align="left"><?php echo AVIANCA_ADMISSIONS_TWO; ?></li>
<li align="left"><?php echo AVIANCA_ADMISSIONS_THREE; ?></li>
<li align="left"><?php echo AVIANCA_ADMISSIONS_FOUR; ?></li>
<li align="left"><?php echo AVIANCA_ADMISSIONS_FIVE; ?></li>
<br>

<h2><?php echo AVIANCA_ADMISSIONS_SIX; ?></h2> 
<hr>
<?php
	$sql = "select * from ranks order by minimum_hours asc";
	$db = new mysqli($db_host , $db_username , $db_password , $db_database);
	$db->set_charset("utf8");
	if ($db->connect_errno > 0) {
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	if (!$result = $db->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}
?>
          <table id="ranks" class="altern">
					<?php
						echo '<thead>';
						echo "<tr><th>" . RANK . "</th><th>" . RANK_IMAGE . "</th><th>" . RANK_MIN_HOURS . "</th><th>" . RANK_MAX_HOURS . "</th><th>" . PILOT_SALARY . "</th></tr>";
						echo '</thead>';
						while ($row = $result->fetch_assoc()) {
						echo "<td>";
						echo $row["rank"] . '</td><td>';
						echo '<IMG src="'.$row["image_url"].'" ALT="">'. '</td><td>';
						echo $row["minimum_hours"] . '</td><td>';
						echo $row["maximum_hours"] . '</td><td>';
						echo $row["salary_hour"] . '</td></tr>';
					}
					$db->close();
					?>
			</table>


<?php if($habilitado==0) { ?>
<br>
<hr>
<a  class="button" style="width:100%;"><?php echo AVIANCA_ADMISSIONS_CLOSED; ?></a>
<?php } else { ?>
<hr>
<h1><?php echo AVIANCA_ADMISSIONS_OPENED; ?></h1>
<p><?php echo AVIANCA_ADMISSIONS_OPENED_INFO; ?></p>
<form method="post" action="./?page=test">
								<div class="row uniform 50%">
									<div class="6u 12u$(4)">
										<input type="text" name="nombres" id="nombres" value="" placeholder="<?php echo AVIANCA_ADMISSIONS_TITLE_NAME; ?>" required />
									</div>
									<div class="6u 12u$(4)">
										<input type="text" name="apellidos" id="apellidos" value="" placeholder="<?php echo AVIANCA_ADMISSIONS_TITLE_SURNAME; ?>" required />
									</div>
									<div class="6u 12u$(4)">
										<input type="text" name="vid_ivao" id="vid_ivao" value="" placeholder="IVAO VID" required />
									</div>
									<div class="6u 12u$(4)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required />
									</div>
									<div class="12u$">
										<div class="select-wrapper">
											<select name="rank_ivao" id="rank_ivao" required>
												<option value="" disabled selected hidden><?php echo AVIANCA_ADMISSIONS_TITLE_RANK; ?></option>
												<option value="FS1">FS1</option>
												<option value="FS2">FS2</option>
												<option value="FS3">FS3</option>
												<option value="PP">PP</option>
												<option value="SPP">SPP</option>
												<option value="CP">CP</option>
												<option value="ATP">ATP</option>
												<option value="SFI">SFI</option>
												<option value="CFI">CFI</option>
											</select>
										</div>
									</div>
									<div class="12u$">
										<input type="checkbox" id="human" name="human" value="1" required>
										<label for="human"><?php echo AVIANCA_ADMISSIONS_TITLE_TERMS; ?></label>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="<?php echo AVIANCA_START_TEST; ?>" class="special" /></li>
											<li><input type="reset" value="<?php echo AVIANCA_CLEAN_TEST; ?>" /></li>
										</ul>
									</div>
								</div>
							</form>
<?php } ?>

</section>
</div>
</section>