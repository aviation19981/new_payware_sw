<?php

//Imagen inicial horizontal
$image = '1.png';
//Destino de la nueva imagen vertical

 
 for($i=0;$i<=359;$i++) {
//Definimos los grados de rotacion
$image_rotate = './map_ava/' . $i . '.png';
$degrees = $i;
 
//Creamos una nueva imagen a partir del fichero inicial
$source = imagecreatefromjpeg($image);
 
//Rotamos la imagen 90 grados
$rotate = imagerotate($source, $degrees, 0);
 
//Creamos el archivo jpg vertical
imagejpeg($rotate, $image_rotate);
 }

?>