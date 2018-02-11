<?php
	require('check_login.php');
	require_once('create_template_fskeeper.php');
	require_once('create_template_fsacars.php');
	$id = $_SESSION["id"];
	$link_fskeeper = "tmp_templates/vam_fskeeper_$id.zip";
	$link_fsacars = "tmp_templates/vam_fsacars_$id.zip";
	
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	$webfull = "http://" . $host;
	if(!empty($id)) {
?>
	<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Descargas</h2>
						<p>Material exclusivo de Avianca Virtual</p>
					</header>

					<!-- Text -->
						<section>
							<h3>Avianca ACARS</h3>
							<p>Sistema ACARS basado en <b>Sim ACARS</b> diseñado para el uso personalizado de Avianca Virtual y sus necesidades, soporta las plataformas <strong>FS9, FSX, P3D, XP</strong>. Es requerido la siguiente <i>información</i> para el funcionamiento correcto del  <em>sistema</em>.
							</p>
						<div class="row">
							<div class="3u 12u(3)">
								
							<h4>Callsign</h4>
							<blockquote><?php echo $callsign; ?></blockquote>
							
							</div>
							<div class="3u 12u(3)">

							<h4>Password</h4>
							<blockquote>Su contraseña</blockquote>
							
							</div>
							<div class="3u 12u(3)">
							
							<h4>VA Name</h4>
							<blockquote>Avianca</blockquote>
							
							</div>
							<div class="3u 12u(3)">
							
							<h4>VA ICAO</h4>
							<blockquote>AVA</blockquote>
							
							</div>
							<div class="6u 12u(3)">

							
							<h4>VA ACARS URL</h4>
							<blockquote><?php echo $webfull; ?>/vam/</blockquote>
							
							</div>
							<div class="6u 12u(3)">
							
							<h4>Weight Unit</h4>
							<blockquote>KG</blockquote>
							
							</div>
						</div>
						<br>
						<hr>
						<br>
						<div class="table-wrapper" >
								<table class="alt">
									<thead  style="background-color: #ae0200;">
										<tr>
											<th><font color="white"><span class="button icon fa-plane"></span> ACARS</font></th>
											<th><font color="white"><span class="button icon fa-key"></span>Serial</font></th>
											<th><font color="white"><span class="button icon fa-list"></span> Requisitos</font></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><ul class="icons">
						   <li><a href="./avianca_acars/Avianca%20ACARS.rar" class="button icon fa-download" style="width:100%;">Avianca ACARS 1.4.0</a></li>
						</ul></td>
											<td>6N76G15JOEL3595550600F27PAO387S6GX0663X55C36JN2628579Q04253K865R6952803155321TL7</td>
											<td>
											<li><b>Simulador:</b> FS9, FSX, P3D, XP</li>
											<li><b>Software:</b> FSUIPC, XPUIPC</li>
											</td>
										</tr>
									</tbody>
								</table>
						</div>
				</div>
</section>
				
				<?php } else { header("Location: ./index.php?page=nosession"); } ?>			