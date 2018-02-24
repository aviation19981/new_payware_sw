<?php
        // ESTADO 0 Logeado
		// ESTADO 1 Perdido Teorico
		// ESTADO 2 Ganado Teorico
		
        $nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$vid_ivao = $_POST['vid_ivao'];
		$email = $_POST['email'];
		$rank_ivao = $_POST['rank_ivao'];
		$human = $_POST['human'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent){

if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';


}


$navegador = getBrowser($user_agent);
		
		if(!empty($nombres) && !empty($apellidos) && !empty($vid_ivao) && !empty($email) && !empty($rank_ivao) && !empty($human)) {
			
			
		$resultadoexamen=0;
		
		$sqlexamen = "select * from resultados_admision where (vid_ivao='$vid_ivao' OR ip='$ip') and estado<='1' and DATEDIFF(NOW(),fecha)<='30'";
		
		if (!$resultexamen = $db->query($sqlexamen)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		while ($rowresultado = $resultexamen->fetch_assoc()) {
			$resultadoexamen++;
		}


        if($resultadoexamen==0) {
		
		        $sql1 = "insert into resultados_admision (nombres,apellidos,vid_ivao,email,rank_ivao,fecha,ip,estado)
                    values ('$nombres','$apellidos','$vid_ivao','$email','$rank_ivao',now(),'$ip',0);";
				if (!$result1 = $db->query($sql1)) {
					die('There was an error running the query [' . $db->error . ']');
				}		
				
				$lastidtest = $db->insert_id;
			
		
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
		}
		
		?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Examen Admisión</h2>
						<p>Ponte a prueba para ser parte de Avianca Virtual</p>
					</header>

<!-- Text -->
<section>

<h1>Tiempo Restante <small><div id="divCounter"></div></small></h1>
<hr>
<h3><b>Aspirante:</b> <?php echo $nombres . ' ' . $apellidos; ?></h3>
<h3><b>Fecha:</b> <?php echo date('l jS \of F Y h:i:s A'); ?></h3>
<h3><b>IP:</b> <?php echo $ip; ?></h3>
<h3><b>Navegador:</b> <?php echo $navegador; ?></h3>
<script type="text/javascript">
var hoursleft = 0;
var minutesleft = <?php echo $duracion; ?>;           // you can change these values to any value greater than 0
var secondsleft = 0;
var finishedtext = "Countdown finished!" // text that appears when the countdown reaches 0
var end = new Date();
end.setMinutes(end.getMinutes()+minutesleft);
end.setSeconds(end.getSeconds()+secondsleft);
if(localStorage.getItem("counter")){
    var value = localStorage.getItem("counter");
}else{
  var value = 0;
}
var counter = function (){
    var now = new Date();
var diff = end - now;
diff = new Date(diff);
var sec = diff.getSeconds();
var min = diff.getMinutes();
if (min < 10){
    min = "0" + min;
}
if (sec < 10){
    sec = "0" + sec;
}
if(now >= end){
    clearTimeout(timerID);
    //document.getElementById('divCounter').innerHTML = finishedtext;
	
}
else{
    var value = min + ":" + sec;
//document.getElementById('divCounter').innerHTML = min + ":" + sec;
localStorage.setItem("counter", JSON.stringify(value));
} 
if(min==0 && sec==0) {
  document.exmaneva.submit();
}    
 // timerID = setTimeout("cd()", 1000);
// value = JSON.parse(localStorage.getItem("counter"));
//$('#divCounter').append(value);
document.getElementById('divCounter').innerHTML = value; 
 }
 var interval = setInterval(function (){counter();}, 1000);
 </script>
 <hr>
<form name="exmaneva" action="./?page=resultado" method="post">



        <?php 
$contadorpreguntas=0;
        $sql = "select * from preguntas_examen ORDER BY RAND()  LIMIT $preguntas";
		if (!$result = $db->query($sql)) {
			die('There was an error running the query  [' . $db->error . ']');
		}
		
		while ($row = $result->fetch_assoc()) {
			$contadorpreguntas++;
			
			                   echo '<header><h3 align="left"><b>' . $contadorpreguntas . ')</b> ' . $row['question'] . ' </h3></header>';
			                   echo '<div class="row uniform 100%">';
                               echo '<div class="12u$">
										<div class="select-wrapper">
											<select name="' . $row['id_pregunta'] . '" id="' . $row['id_pregunta'] . '" required>
												<option value="" disabled selected hidden>Escoje tu respuesta</option>
												<option value="A">' . $row['A'] . '</option>
												<option value="B">' . $row['B'] . '</option>
												<option value="C">' . $row['C'] . '</option>
												<option value="D">' . $row['D'] . '</option>
											</select>
										</div>
									</div>';
							   echo '</div>';
			                   echo '<br>';
		}
		
		?>
<input type="hidden" id="preguntas" name="preguntas" value="<?php echo $contadorpreguntas; ?>"/>
<input type="hidden" id="idtest" name="idtest" value="<?php echo $lastidtest; ?>"/>
<input type="submit" value="Enviar Prueba" style="width:100%">
</form>
</div>
</section>
</section>
		<?php 
		} else {
			
?>

<script>
alert('Debe esperar el tiempo de 30 días desde la última vez para presentar de nuevo el examen.');
window.location = './index.php?page=admisiones';
</script>	

<?php
			
			
		}
		
		
		} else {
			
?>

<script>
alert('Hay campos vacios, intenta de nuevo.');
window.location = './index.php?page=admisiones';
</script>	

<?php
			
			
		}
		?>
