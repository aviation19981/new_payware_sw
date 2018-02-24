<?php
        $idtest = $_POST['idtest'];
		$preguntas = $_POST['preguntas'];
        // ESTADO 0 Logeado
		// ESTADO 1 Perdido Teorico
		// ESTADO 2 Ganado Teorico
		
		
		
		
		$sql = "select * from admisiones where id=1";
		
		if (!$result = $db->query($sql)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		while ($row = $result->fetch_assoc()) {
        $nombre = $row["nombre"];
        $duracion = $row["duracion"];
		$descripcion_es = $row['descripcion_es'];
		$descripcion_en = $row['descripcion_en'];
		}
		
		
		$sql12 = "select * from preguntas_examen";  
		
		if (!$result12 = $db->query($sql12)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		$contarpreguntas = 0;
		$contarbuenas = 0;
		$porcentaje = 0;
		while ($row12 = $result12->fetch_assoc()) {
			// CONTAR PREGUNTAS
			$contarpreguntas++;
			// ID Y RESPUESTA CORRECTA
			$identificacion = $row12["id_pregunta"];
			$respuesta_correcta = $row12["correct"];
			
			// VALIDAR RESPUESTA
			if($_POST[$identificacion]==$respuesta_correcta) {
				$contarbuenas++;
			}
			
		}
		
		
		// 100 PORCIENTO EN TEORICO
		
		$porcentaje = (($contarbuenas*100)/$preguntas);
        $preguntasmalas = $preguntas-$contarbuenas;
		
		if($porcentaje<80) {
			$resultadoestado = 1;
		} else {
			$resultadoestado = 2;
		}
		
	
	
	    $sql_know = "update resultados_admision set resultado='$porcentaje', estado='$resultadoestado' where id='$idtest'";
		if (!$result_know = $db->query($sql_know)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
		
		$sqlexamen = "select * from resultados_admision where id='$idtest'";
		
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


<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Resultado de Admisión</h2>
						<p>Esperamos que te haya ido bien!</p>
					</header>

<!-- Text -->
<section>
<h1>Informe detallado :: <?php echo $nombres . ' ' . $apellidos; ?> :: Examen :: <?php echo $vid_ivao; ?></h1>
<hr>
<h3><b>Respuestas Correctas:</b> <?php echo $contarbuenas; ?></h3>
<h3><b>Respuestas Malas:</b> <?php echo $preguntasmalas; ?></h3>
<h3><b>Porcentaje Prueba:</b> <?php echo $porcentaje; ?>%</h3>
<hr>
<?php if($porcentaje<80) { ?>
<a class="button big" width="100%">Lo sentimos, has perdido la prueba de admisión, te podrás presentar dentro de 30 días a partir de hoy.</a>
<?php } else { ?>
<script language="javascript"> 
 var segundos = 15; //Segundos de la cuenta atrás 
    function tiempo(){  
  var t = setTimeout("tiempo()",1000);  
  document.getElementById('contenedor').innerHTML = 'Será redireccionado en '+segundos--+" segundos, para su proceso de registro! Felicitaciones!!";  
  if (segundos==0){
        window.location.href='./?page=pilot_register&id_test=<?php echo $idtest; ?>';  //Págiana a la que redireccionará a X segundos
  
   clearTimeout(t);  
  }  
 }  
 tiempo()
    </script> 
    <a class="button big" width="100%"><div id="contenedor"></div></a>
<?php } ?>
</section>
</div>
</section>