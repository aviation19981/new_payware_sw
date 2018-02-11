<?php
	/**
	 * @Project: Virtual Airlines Manager (VAM)
	 * @Author: Alejandro Garcia
	 * @Web http://virtualairlinesmanager.net
	 * Copyright (c) 2013 - 2016 Alejandro Garcia
	 * VAM is licensed under the following license:
	 *   Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
	 *   View license.txt in the root, or visit http://creativecommons.org/licenses/by-nc-sa/4.0/
	 */
?>
<?php
	require('check_login.php');
	require_once('create_template_fskeeper.php');
	require_once('create_template_fsacars.php');
	$id = $_SESSION["id"];
	$link_fskeeper = "tmp_templates/vam_fskeeper_$id.zip";
	$link_fsacars = "tmp_templates/vam_fsacars_$id.zip";
	
	if(!empty($id)) {
?>

		
					<header class="major">
						<h2>Avianca Virtual Information</h2>
						<p>Cordial hello pilot, we hope this information is very helpful.</p>
					</header>
					
					
					<p>
					<span class="image left">
					<img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Avianca_Airbus_A318_%288367792269%29.jpg" alt="" width="5%"/>
					</span>
					<h4>Airbus Industrie 318</h4>
					<h6 align="left"><b>Pax:</b> 100</h6>
					<h6 align="left"><b>Cargo:</b> 100</h6>
					<h6 align="left"><b>Ceeling Altitude:</b> 100</h6>
					<h6 align="left"><b>Cruise Speed:</b> 100</h6>
					<h6 align="left"><b>Performance:</b> 100</h6>
					<blockquote>
					<table class="image left" width="100%">
					    <tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N589AV">N589AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N590EL">N590EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N591EL">N591EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N592EL">N592EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N593EL">N593EL</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N594EL">N594EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N595EL">N595EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N596EL">N596EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N597EL">N597EL</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N598EL">N598EL</a></td>
						</tr>
					</table>	
					</blockquote>		
					</p>
					
				    <br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					
					<p>
					<span class="image right">
					<img src="https://c1.staticflickr.com/4/3839/14944015789_83f370f924_b.jpg" alt="" width="5%"/>
					</span>
					<h4>Airbus Industrie 319</h4>
					<h6 align="right"><b>Pax:</b> 100</h6>
					<h6 align="right"><b>Cargo:</b> 100</h6>
					<h6 align="right"><b>Ceeling Altitude:</b> 100</h6>
					<h6 align="right"><b>Cruise Speed:</b> 100</h6>
					<h6 align="right"><b>Performance:</b> 100</h6>
					<blockquote>
					<table class="image left" width="100%">
					    <tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=HK-4552">HK-4552</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=HK-4553">HK-4553</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N422AV">N422AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N519AV">N519AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N557AV">N557AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N647AV">N647AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N690AV">N690AV</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N691AV">N691AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N694AV">N694AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N695AV">N695AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N723AV">N723AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N726AV">N726AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N730AV">N730AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N741AV">N741AV</a></td>
						</tr>
					</table>	
					</blockquote>		
					</p>
					
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					<p>
					<span class="image left">
					<img src="https://upload.wikimedia.org/wikipedia/commons/8/8f/Airbus_A320-214%2C_Avianca_AN2236179.jpg" alt="" width="5%"/>
					</span>
					<h4>Airbus Industrie A320</h4>
					<h6 align="left"><b>Pax:</b> 100, <b>Cargo:</b> 100, <b>Ceeling Altitude:</b> 100, <b>Cruise Speed:</b> 100, <b>Performance:</b> 100</h6>
					<blockquote>
					<table class="image left" width="100%">
					    <tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=HK-4659">HK-4659</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N195AV">N195AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N281AV">N281AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N284AV">N284AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N345AV">N345AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N398AV">N398AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N401AV">N401AV</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N411AV">N411AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N426AV">N426AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N446AV">N446AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N451AV">N451AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N454AV">N454AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N477AV">N477AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N536AV">N536AV</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N538AV">N538AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N562AV">N562AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N603AV">N603AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N632AV">N632AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N664AV">N664AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N724AV">N724AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N728AV">N728AV</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N740AV">N740AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N742AV">N742AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N743AV">N743AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N745AV">N745AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N748AV">N748AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N750AV">N750AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N939AV">N939AV</a></td>
						</tr>
					</table>	
					</blockquote>		
					</p>
					
					
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					
					<p>
					<span class="image right">
					<img src="https://www.aviacol.net/images/stories/2014/A321_AVIANCA_2.jpg" alt="" width="5%"/>
					</span>
					<h4>Airbus Industrie 321</h4>
					<h6 align="right"><b>Pax:</b> 100</h6>
					<h6 align="right"><b>Cargo:</b> 100</h6>
					<h6 align="right"><b>Ceeling Altitude:</b> 100</h6>
					<h6 align="right"><b>Cruise Speed:</b> 100</h6>
					<h6 align="right"><b>Performance:</b> 100</h6>
					<blockquote>
					<table class="image right" width="100%">
					    <tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N696AV">N696AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N725AV">N725AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N729AV">N729AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N744AV">N744AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N746AV">N746AV</a></td>
						</tr>
					</table>	
					</blockquote>		
					</p>
					
					
					
					
					
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					
					
					
					
					
					
					<p>
					<span class="image left">
					<img src="http://www.eluniversal.com.co/sites/default/files/201501/avion2.jpg" alt="" width="5%"/>
					</span>
					<h4>Boeing Dream(Liner 787</h4>
					<h6 align="left"><b>Pax:</b> 100</h6>
					<h6 align="left"><b>Cargo:</b> 100</h6>
					<h6 align="left"><b>Ceeling Altitude:</b> 100</h6>
					<h6 align="left"><b>Cruise Speed:</b> 100</h6>
					<h6 align="left"><b>Performance:</b> 100</h6>
					<blockquote>
					<table class="image left" width="100%">
					    <tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N780AV">N780AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N781AV">N781AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N782AV">N782AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N783AV">N783AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N784AV">N784AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N785AV">N785AV</a></td>
						</tr>
						<tr width="100%">
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N786AV">N786AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N791AV">N791AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N792AV">N792AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N793AV #ViajeDeEsperanza">N793AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N794AV">N794AV</a></td>
						<td><a target="_BLANK"  href="./plane_texture.php?registry=N795AV">N795AV</a></td>
						</tr>
					</table>	
					</blockquote>		
					</p>
					
					
				
				

				
				
				  
	<?php } else { header("Location: ./index.php?page=nosession"); } ?>
