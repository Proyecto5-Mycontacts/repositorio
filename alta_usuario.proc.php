<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	 extract($_REQUEST);

  $sql = "SELECT * FROM tbl_usuario WHERE usu_email ='$_REQUEST[email]";	
  //ejecutamos la consulta
	$resultado = mysqli_query($conexion,$sql);
echo $sql;
	//si la consulta devuelve un registro se ha encontrado coincidencia de nombre de recurso
	if(mysqli_num_rows($resultado)>0){
		//si nos devuelve registros significa que ese recurso ya existe
		//$datos_recursos=mysqli_fetch_array($resultado);


		$_SESSION['error_usuario']="El email ya está registrado";
		header("location: alta_usuario.php");
	} else {
		//como no se ha encontrado coincidencias realizamos el registro
		
		$sql = "INSERT INTO `tbl_usuario` (`usu_nombre`, `usu_password`, `usu_email`, `usu_foto`) VALUES
				('$_REQUEST[nombre]', '$_REQUEST[password]', '$_REQUEST[email]', '$_REQUEST[foto]')";


		echo $sql;
		$anadir = mysqli_query($conexion,$sql);

	
		header("location: login.php");
	}

?>
