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
 
  <h1 style="color:#43A047;">My contacts</h1>
  
            <?php
              if(isset($error)){
                echo "<font color="."red".">$error</font>";
                echo "<br/><br/>";
              } else{
                echo "<p>Introduce usuario y contraseña</p>";
              }
            ?>

    <form name="Login" action="login.proc.php" onsubmit="return validar();">
      <input type="text" id="nombre" name="nombre" placeholder="usuario" onfocus="document.Login.nombre.style.color='';" />
      <input type="password" id="password" name="password" placeholder="contraseña" onfocus="document.Login.password.style.color='';"/>
      <button>Entrar</button>
   
    </form>
 
  
</body>
</html>

