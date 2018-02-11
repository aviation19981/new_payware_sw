<?php
session_start();
	require('check_login.php');
	$id = $_SESSION["id"];
	$registry = $_GET['registry'];
	if(!empty($id)) {

	
	// Permite la descarga de un archivo ocultando su ruta  

$nombre = $registry . ".zip";  
$filename = "avianca_texture/" . $nombre;  
if (file_exists($filename)) {
$size = filesize($filename);  
header("Content-Transfer-Encoding: binary");  
header("Content-type: application/force-download");  
header("Content-Disposition: attachment; filename=$nombre");  
header("Content-Length: $size");  
readfile("$filename"); 

	} else {
        header("Location: ./index_vam_op.php?page=404");
	}
	
	} else { header("Location: ./index.php?page=nosession"); } ?>
