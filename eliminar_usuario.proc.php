<?php
	//iniciamos sesion (siempre tiene que estar en la primera linea)
	session_start();
	//incluimos el fichero conexion.proc.php que realiza la conexión a MySQL
	include("conexion.proc.php");
	 extract($_REQUEST);
	 $sql = "DELETE FROM tbl_contacto WHERE usu_id =". $_REQUEST[usu_id];	//ejecutamos la consulta
  	$sql2 = "DELETE FROM tbl_usuario WHERE usu_id =". $_REQUEST[usu_id];	//ejecutamos la consulta
	
	$resultado = mysqli_query($conexion,$sql);
	$resultado = mysqli_query($conexion,$sql2);
	//echo $sql;
	
	//if(mysqli_num_rows($resultado)>0){
		
		//$datos_recursos=mysqli_fetch_array($resultado);


		
		header("location: index.html");
	//} else {
		//como no se ha encontrado coincidencias realizamos el registro
		
	
		//header("location: menu_contacto.php?cont_id=".$_REQUEST['cont_id']);
	//}

?>
