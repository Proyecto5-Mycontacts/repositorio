
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

   <form class="contact_form" action="anadir_contacto.proc.php" id="contact_form" runat="server"> 
   <div> 
   <ul> 
   <li> <h2>Añadir Contacto nuevo</h2> <span class="required_notification">* Datos requeridos</span> </li> 
   <li> <label for="name">Nombre:</label> <input type="text" name="nombre" placeholder="Nombre contacto" required /> </li>
   <li> <label for="surname">Apellido:</label> <input type="text" name="apellido" placeholder="Apellido contacto" required /> </li>
    <li> <label for="telefono">Telefono1:</label> <input type="text" name="telefono1" placeholder="Num. Telefono" required /> </li>
    <li> <label for="telefono">Telefono2:</label> <input type="text" name="telefono2" placeholder="Num. Telefono" required /> </li>
    <li> <label for="email">Email:</label> <input type="email" name="email" placeholder="email@email.com" required /> <span class="form_hint">Formato correcto: "name@something.com"</span> </li> 
    <li> <label for="direccion1">Dirección 1:</label> <input type="text" name="direccion1" placeholder="Primera Dirección ej: Casa" required /> </li>
    <li> <label for="direccion2">Dirección 2:</label> <input type="text" name="direccion2" placeholder="Segunda Dirección ej: Trabajo" required /> </li>
    <li><input type="date" name="cumpleaños" step="1" min="1900-01-01"  value="<?php echo date("Y-m-d");?>"><span class="form_hint"> Formato correcto: "aaaa/mm/dd"</span> </li> 
  <li><input id="foto" name="foto" type="file" ></li>
     <li> <label for="nota">Notas:</label> <textarea name="nota" cols="40" rows="6" required></textarea> </li> 
     <li> <button class="submit" type="submit">Añadir contacto</button> </li>
      </ul> 
      </div> 
      </form> 



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

