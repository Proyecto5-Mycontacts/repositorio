<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	 extract($_REQUEST);

  $sql = "SELECT * FROM tbl_contacto WHERE cont_nombre='$_REQUEST[nombre]' AND usu_id = ". $_SESSION['usu_id'];	//ejecutamos la consulta
	$resultado = mysqli_query($conexion,$sql);
echo $sql;
	//si la consulta devuelve un registro se ha encontrado coincidencia de nombre de recurso
	if(mysqli_num_rows($resultado)>0){
		//si nos devuelve registros significa que ese recurso ya existe
		//$datos_recursos=mysqli_fetch_array($resultado);


		$_SESSION['error_contacto']="Ya existe ese contacto";
		header("location: anadir_contacto.php");
	} else {
		//como no se ha encontrado coincidencias realizamos el registro
		
		$sql = "INSERT INTO `tbl_contacto` (`cont_nombre`, `cont_apellido`, `cont_email`, `cont_telefono1`, `cont_telefono2`, `cont_foto`, `cont_direccion1`, `cont_direccion2`, `cont_cumpleaños`, `cont_notas`, `usu_id`) VALUES ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[email]','$_REQUEST[telefono1]','$_REQUEST[telefono2]' ,'$_REQUEST[foto]', '$_REQUEST[direccion1]', '$_REQUEST[direccion2]', '$_REQUEST[cumpleaños]', '$_REQUEST[nota]',". $_SESSION['usu_id'].")" ;


		echo $sql;
		$anadir = mysqli_query($conexion,$sql);

	
		header("location: main.php");
	}

?>
