<?php
	require('check_login.php');
	$id = $_SESSION["id"];
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	$webfull = "http://" . $host;
	if(!empty($id)) {
		
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
						<h2>Administración Examen Admisión</h2>
						<p>Oportunidad de administrar tu Aerolínea!</p>
					</header>

					<!-- Text -->
						<section>
							<form method="post" action="./index_vam_op.php?page=update_test">
								<div class="row uniform 50%">
									<div class="12u$">
										<input type="text" name="nombre" id="nombre"  placeholder="Nombre Examen" value="<?php echo $nombre; ?>"/>
									</div>
									<div class="12u$">
										<input type="text" name="descripcion_es" id="descripcion_es"  placeholder="Descripción Español" value="<?php echo $descripcion_es; ?>"/>
									</div>
									<div class="12u$">
										<input type="text" name="descripcion_en" id="descripcion_en"  placeholder="Descripción Inglés" value="<?php echo $descripcion_en; ?>"/>
									</div>
									<div class="12u$">
									    <label>Duración Examen en MINUTOS</label>
										<input class="form-control"  type="number" min="1" max="60" name="duracion" id="duracion"  placeholder="Duración Examen en MINUTOS" value="<?php echo $duracion; ?>"/>
									</div>
									<div class="12u$">
									    <label>Número Preguntas</label>
										<input class="form-control" type="number" min="1"  name="preguntas" id="preguntas"  placeholder="Número Preguntas" value="<?php echo $preguntas; ?>"/>
									</div>
									<div class="12u$">
										<div class="select-wrapper">
											<select name="habilitado" id="habilitado">
												<option >Estado Examen</option>
												<?php if($habilitado==1) { ?>
												<option value="1" selected>Habilitado</option>
												<option value="0">Deshabilitado</option>
												<?php } else { ?>
												<option value="1">Habilitado</option>
												<option value="0" selected>Deshabilitado</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Actualizar Examen" class="special" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
				</div>

	</section>			
				<?php } else { header("Location: ./index.php?page=nosession"); } ?>			