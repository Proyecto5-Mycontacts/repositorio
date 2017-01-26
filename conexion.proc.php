<?php
	//conectamos con la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "bd_mycontacts");
//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
    $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
	//si no se puede realizar la conexión, se muestra error
	if (!$conexion) {
		echo "Error: No se puede conectar a la BD." . PHP_EOL;
		exit;
	}
?>
