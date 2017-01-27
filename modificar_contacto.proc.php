<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");

	 extract($_REQUEST);
  	
	

echo $nombre;
echo $apellido;
echo $email;

  	//ejecutamos la consulta
	


  	$sql = "SELECT * FROM tbl_contacto WHERE cont_id = ".$cont_id;	
echo $sql;

	$resultado = mysqli_query($conexion,$sql);
	
	
	if(mysqli_num_rows($resultado)>0){
		
		  while($contacto = mysqli_fetch_array($resultado)){


		  	if ($nombre != $contacto['cont_nombre']){

		  		$sql = "UPDATE tbl_contacto SET cont_nombre = '".$nombre."'' WHERE cont_id = ".$cont_id;
		  		$resultado = mysqli_query($conexion,$sql);

		  	}

		  	if($apellido != $contacto['cont_apellido']) {

				$sql = "UPDATE tbl_contacto SET cont_apellido = '".$apellido."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

		  	if($cumpleaños != $contacto['cont_cumpleaños']) {

				$sql = "UPDATE tbl_contacto SET cont_cumpleaños = '".$cumpleaños."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

		  	if($email != $contacto['cont_email']) {

				$sql = "UPDATE tbl_contacto SET cont_email = '".$email."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

		  	if($telefono1 != $contacto['cont_telefono1']){

				$sql = "UPDATE tbl_contacto SET cont_telefono1 = '".$telefono1."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

		  	if($telefono2 != $contacto['cont_telefono2']) {

				$sql = "UPDATE tbl_contacto SET cont_telefono2 = '".$telefono2."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}


		  	if($direccion1 != $contacto['cont_direccion1'] ){

				$sql = "UPDATE tbl_contacto SET cont_direccion1 = '".$direccion1."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

		  	if($direccion2 != $contacto['cont_direccion2']){

				$sql = "UPDATE tbl_contacto SET cont_direccion2 = '".$direccion2."' WHERE cont_id = ".$cont_id;
				$resultado = mysqli_query($conexion,$sql);
		  	}

}
	}

		
		header("location: menu_contacto.php?cont_id=".$cont_id."");
	

?>
