
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

  
  ?> 
  

 <?php
  if(isset($_SESSION['error_contacto'])){
    echo"<label>".$_SESSION['error_contacto']."</label>";
  }
?>

 


<?php
   extract($_REQUEST);

   echo "<h1> Hola ".$_SESSION['usu_nombre']." bienvenido! </h1>" ;

   $sql = "SELECT  * FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.cont_id = ". $_REQUEST['cont_id'] ;
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        echo "<form name='modificar_contacto' action='modificar_contacto.proc.php?cont_id=".$contacto['cont_id']."' id='contact_form' runat='server'> 
              <div> 
              <ul> 
              <li> <h2>Modificar Contacto existente</h2> 
              <div class = 'foto_contacto'> ";
        $foto=$contacto['cont_foto'];
        
                        if (file_exists ($foto)){
                           echo "<img src=".$foto." width='150' height='150'/></br>";
                        } else {
                            echo "<img src='img/0.png' width='150' height='150'/><br/><br/>";
                        }
        echo "</div>";
        echo "<div class='info_contacto'>";
        echo "Nombre : <input type='text' name='nombre' placeholder='Nombre contacto' value='".$contacto['cont_nombre']."'/></br>";
        echo "Apellido : <input type='text' name='apellido' placeholder='Apellido contacto' value='".$contacto['cont_apellido']."'></br>";
        echo "Cumpleaños : <input type='date' name='cumpleaños' step='1' min='1900-01-01'  value='".$contacto['cont_cumpleaños']."'/></br>";
        echo "Email : <input type='email' name='email' placeholder='email@email.com' value='".$contacto['cont_email']."'/></br>" ;
        echo "1r Telefono : <input type='text' name='telefono1' placeholder='Num. Telefono' value='".$contacto['cont_telefono1']."'/></br>";
        echo "1a Dirección : <input type='text' name='direccion1' placeholder='Primera Dirección ej: Casa' value='".$contacto['cont_direccion1']."'/></br>";
        echo "2n Telefono : <input type='text' name='telefono2' placeholder='Num. Telefono' value='".$contacto['cont_telefono2']."'/></br>";
        echo "2a Dirección : <input type='text' name='direccion2' placeholder='Segunda Dirección ej: Trabajo' value='".$contacto['cont_direccion2']."'/></br>";
        echo "<input type='hidden' name='cont_id' value=".$contacto['cont_id']." />";
        echo "<button class='submit' type='submit'>Modificar contacto</button>";
        echo "</div>";

      }
} else{
        echo "No tienes contactos, agrega a uno!";
      }
?>


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

