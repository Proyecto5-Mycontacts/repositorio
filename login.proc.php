<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	//codificamos la contraseña
	//$pass_encriptada=md5($_REQUEST['pass']);
	//generamos la consulta para encontrar usuario Y contraseña
	$sql = "SELECT * FROM tbl_usuario WHERE usu_nombre = '$_REQUEST[nombre]' AND usu_password = '$_REQUEST[password]'";
	//ejecutamos la consulta
	echo $sql;
	$resultado = mysqli_query($conexion,$sql);

	//si la consulta devuelve un registro se ha encontrado coincidencia de usuario y contraseña con lo que el usuario es correcto
	if(mysqli_num_rows($resultado)==1){
		//extraemos los datos de ese usuario para poder coger el nivel de acceso
		$datos_usuario=mysqli_fetch_array($resultado);

		//creamos la variable de sesión alias
		$_SESSION['usu_id']=$datos_usuario['usu_id'];
		$_SESSION['usu_nombre']=$datos_usuario['usu_nombre'];
		$_SESSION['usu_email']=$datos_usuario['usu_email'];
		$_SESSION['usu_foto']=$datos_usuario['usu_foto'];

		//echo $datos_usuario['usu_id'];
		//echo $datos_usuario['usu_nombre'];
		//echo $datos_usuario['usu_email'];
		//echo $datos_usuario['usu_foto'];
		
		//echo $_SESSION['usu_id'];
		//echo $_SESSION['usu_nombre'];
		//echo $_SESSION['usu_email'];
		//echo $_SESSION['usu_foto'];

		//redirigimos a la página principal
		header("location: main.php");
	} else {
		//como no se ha encontrado usuario y contraseña, mandamos a la página login.php un mensaje de error
		$_SESSION['error']="Usuario o contraseña incorrectos";
		header("location: login.php");
	}

?>
