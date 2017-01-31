<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");

	 extract($_REQUEST);
  	
	

echo $nombre;
echo $password;
echo $email;
echo $usu_id;

  	$sql = "SELECT * FROM tbl_usuario WHERE usu_id = ".$usu_id;	
	echo $sql;

	$resultado = mysqli_query($conexion,$sql);
	
	
	if(mysqli_num_rows($resultado)>0){
		
		  while($usuario = mysqli_fetch_array($resultado)){


		  	if ($nombre != $usuario['usu_nombre']){

		  		$sql = "UPDATE tbl_usuario SET usu_nombre = '".$nombre."' WHERE usu_id = ".$_SESSION['usu_id'];
		  		echo $sql;
		  		$resultado = mysqli_query($conexion,$sql);

		  		$_SESSION['usu_nombre']=$nombre;
		  		
		  	}

		  	if($email != $usuario['usu_email']) {

				$sql = "UPDATE tbl_usuario SET usu_email = '".$email."' WHERE usu_id = ".$_SESSION['usu_id'];
				echo $sql;
				$resultado = mysqli_query($conexion,$sql);
				$_SESSION['usu_email']=$usu_email;
		  	}

		  	if($password != $usuario['usu_password']) {

				$sql = "UPDATE tbl_usuario SET usu_password = '".$password."' WHERE usu_id = ".$_SESSION['usu_id'];
				echo $sql;
				$resultado = mysqli_query($conexion,$sql);
				$_SESSION['usu_password']=$password;
		  	}

		  	

}
	}

		
	header("location: modificar_usuario.php?usu_id=".$usu_id."");
	

?>
