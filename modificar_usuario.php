
<?php
  //iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
  session_start();
  include("conexion.proc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyContacts</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
 <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
   <script src="js/agency.min.js"></script>   
<script type="text/javascript" src="js/validacion.js"> </script>
<script type="text/javascript">
  function Confirmar(usu_id){

         if( confirm( "Estas seguro que quieres borrar tu cuenta?" ) ) {
                  window.location = "eliminar_usuario.proc.php?usu_id="+ usu_id;
          } 
}
  </script>
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"> <img src="img/logos/logo.png" width="150" height="50" alt="MyContacts"></a>
                <?php
                  if(isset($_SESSION['usu_nombre']) ){
                    echo "<a href='main.php' class='navbar-brand'  align='right'>".$_SESSION['usu_nombre']."</a>";
                ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                          <a href="main.php" >Mis contactos</a>
                    </li>
                    <li>
                        <a href="anadir_contacto.php" >Añadir contacto</a>
                    </li>
                    <li>
                        <a href="login.php"  onclick="return Confirm(¿Deseas salir?)";>Log Out</a>
                    </li>
                    
                </ul>
              
            </div>
            <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid -->
     </nav>
 <section id="team" class="bg-darkest-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left"> 

 <?php
  if(isset($_SESSION['error_contacto'])){
    echo"<label>".$_SESSION['error_contacto']."</label>";
  }
?>

 


<?php
   extract($_REQUEST);



   $sql = "SELECT  * FROM tbl_usuario WHERE tbl_usuario.usu_id = ".$_SESSION['usu_id'];
   //echo $sql;
   $usuarios = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($usuarios)>0){
      
      while($usuario = mysqli_fetch_array($usuarios)){
        
        echo "<form name='modificar_usuario' action='modificar_usuario.proc.php?usu_id=".$usuario['usu_id']."' id='contact_form' runat='server'>";


        echo "<div class='col-sm-2 text-right'> ";
        echo " <h7 class='control'>Nombre :</h7><br> <h7 class='control'>Email :</h7><br> <h7 class='control'> Contraseña :</h7><br> <h7 class='control'> Repite Contraseña :</h7><br><br><br> </h7></div><div class='col-sm-2' text-left'>";


        echo "<input type='text' name='nombre' placeholder='Nombre usuario' value='".$usuario['usu_nombre']."' class='form-control'/></br>";
        echo "<input type='email' name='email' placeholder='email@email.com' value='".$usuario['usu_email']."' class='form-control'/></br>" ;
        echo "<input type='password' name='password' placeholder='Contraseña' value='".$usuario['usu_password']."' class='form-control'/></br>";
        echo "<input type='password' name='repite_password' placeholder='Repite Contraseña' value='".$usuario['usu_password']."' class='form-control'/></br>";
        echo "<input type='text' style='display:none;' name='usu_id' value=".$usuario['usu_id']." />";
        ;
        echo "</div>";;
         ?>
         <div class='col-xs-2 text-right'><br><h7 class='control'> Eliminar cuenta: </h7></div><div class='col-md-6 text-left'><a href='#' onclick='return Confirmar(<?php echo $usuario['usu_id']?>);'><img src='img/icons/eliminar.png' width='65' height='65'/></a></br></div>
         <?php
        echo "<br><br><br><br><br><br><button type='submit' class='page-scroll btn btn-xl'>Modificar contacto</button></div>";
       
         
        
      }
} else{
       // echo "No tienes contactos, agrega a uno!";
      }
?>
</div></div></div></section>

   <?php }
     else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página login.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que loguearte primero!";
        header("location: login.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>
</body>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Eric y Marc Petit 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Contacto</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
 </html>


