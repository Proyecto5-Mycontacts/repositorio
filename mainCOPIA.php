
<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Mycontacts</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/validacion.js"> </script>
</head>

<body>

  <?php
      if(isset($_SESSION['usu_nombre']) ){
  ?>
  <h1>LOGO - MyContacts</h1>

  <?php

   echo "<h1> Hola ".$_SESSION['usu_nombre']." bienvenido! </h1>" ;

   $sql = "SELECT  cont_foto, cont_nombre, cont_id FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.usu_id = ". $_SESSION['usu_id'] ;
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        echo "<div class = 'foto_contacto'> ";
        $foto=$contacto['cont_foto'];
        
                        if (file_exists ($foto)){
                           echo "<a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'> <img src=".$foto." width='150' height='150'/></a></br>";
                        } else {
                            echo "<a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'><img src='img/0.png' width='150' height='150'/></a><br/><br/>";
                        }
       
        echo "Nombre: " .$contacto['cont_nombre']."</br>";
      }
      echo "</div>";

      }else{
        echo "No tienes contactos, agrega a uno!";
      }
  ?> 
 
   <a href='anadir_contacto.php'> <img src='img/agregar.png' width='50' height='50' title=' Añade más contactos '/> </a>



   <?php }
     else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página login.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que loguearte primero!";
        header("location: login.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>
</body>
</html>

