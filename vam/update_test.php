<?php
        $nombre = $_POST['nombre'];
		$descripcion_es = $_POST['descripcion_es'];
		$descripcion_en = $_POST['descripcion_en'];
        $duracion = $_POST['duracion'];
		$preguntas = $_POST['preguntas'];
		$habilitado = $_POST['habilitado'];
	
	
	    $sql_know = "update admisiones set nombre='$nombre', descripcion_es='$descripcion_es', descripcion_en='$descripcion_en', duracion='$duracion'
, preguntas='$preguntas', habilitado='$habilitado'		where id='1'";
		if (!$result_know = $db->query($sql_know)) {
			die('There was an error running the query [' . $db->error . ']');
		}
		
?>
<script type="text/javascript">
alert('Examen actualizado');
window.location="./index_vam_op.php?page=examen_admision";
</script>