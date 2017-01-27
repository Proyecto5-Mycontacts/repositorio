
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
  <script type="text/javascript">
  function Confirmar(cont_id){

         if( confirm( "Estas seguro que deseas borrar este contacto?" ) ) {
                  window.location = "eliminar_contacto.proc.php?cont_id="+ cont_id;
          } 
}
  </script>
</head>

<body>

  <?php
      if(isset($_SESSION['usu_nombre']) ){
  ?>
  <h1>LOGO - MyContacts</h1>

  <?php
   extract($_REQUEST);

   echo "<h1> Hola ".$_SESSION['usu_nombre']." bienvenido! </h1>" ;

   $sql = "SELECT  * FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.cont_id = ". $_REQUEST['cont_id'] ;
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        echo "<div class = 'foto_contacto'> ";
        $foto=$contacto['cont_foto'];
        
                        if (file_exists ($foto)){
                           echo "<img src=".$foto." width='150' height='150'/></br>";
                        } else {
                            echo "<img src='img/0.png' width='150' height='150'/><br/><br/>";
                        }
        echo "</div>";
        echo "<div class='info_contacto'>";
        echo "Nombre : " .$contacto['cont_nombre']."</br>";
        echo "Apellido : " .$contacto['cont_apellido']."</br>";
        echo "Cumpleaños : " .$contacto['cont_cumpleaños']."</br>";
        echo "Email : " .$contacto['cont_email']."</br>";
        echo "1r Telefono : " .$contacto['cont_telefono1']."</br>";
        echo "1a Dirección : " .$contacto['cont_direccion1']."</br>";
        echo "2n Telefono : " .$contacto['cont_telefono2']."</br>";
        echo "2a Dirección : " .$contacto['cont_direccion2']."</br>";

        echo "</div>";

        echo"<div class='opciones_contacto'>";
        echo"<a href='modificar_contacto.php?cont_id=".$contacto['cont_id']."'><img src='img/modificar.png'/></a></br>";
        ?>

        <a href='#' onclick='return Confirmar(<?php echo $contacto['cont_id']?>);'><img src='img/eliminar.png'/></a></br>
        <?php
        echo"<a href='ubicacion_contacto.php?cont_id=".$contacto['cont_direccion1']."&".$contacto['cont_direccion2']."'><img src='img/googlemaps.ico'/></a></br>";
        echo"</div>";

        


      }
      

      }else{
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

