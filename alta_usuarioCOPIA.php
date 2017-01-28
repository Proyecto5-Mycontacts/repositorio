<?php
  //iniciamos sesión
  session_start();
  //si existe la variable de sesión error la guardamos
  if(isset($_SESSION ['error'])){
    $error=$_SESSION['error'];
  }
  //destruimos la sesión para no poder llegar de manera indirecta a ninguna página posterior a la de login
  session_destroy();
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
 
  <h1 style="color:#43A047;">Registro en  MyContacts</h1>
  
           

   <ul> <form name="Login" action="alta_usuario.proc.php" onsubmit="return validar();">
      <li><label>Nombre de usuario: </label><input type="text" id="nombre" name="nombre" placeholder="usuario" required onfocus="document.Login.nombre.style.color='';" /></li>
      <li><label>Contraseña: </label><input type="password" id="password" name="password" placeholder="contraseña" required onfocus="document.Login.password.style.color='';"/></li>
     <li><label for="email">Email: </label> <input type="email" name="email" placeholder="email@email.com" required /> <span class="form_hint">Formato correcto: "name@something.com"</span> </li>
     <li><label>Tu foto: </label><input id="foto" name="foto" type="file" ></li>
      <button>Registrarse</button>
   
    </form>
 </ul>
  
</body>
</html>

