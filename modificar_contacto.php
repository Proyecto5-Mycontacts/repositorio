
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
  function Confirmar(cont_id){

         if( confirm( "Estas seguro que deseas borrar este contacto?" ) ) {
                  window.location = "eliminar_contacto.proc.php?cont_id="+ cont_id;
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
                    echo "<a href='main.php' class='navbar-brand'  align='right'>".$_SESSION['usu_nombre'].", Bienvenido!</a>";
                ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="login.php" >Login</a>
                    </li>
                    <li>
                        <a href="login.php" >Login</a>
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



   $sql = "SELECT  * FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.cont_id = ". $_REQUEST['cont_id'] ;
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        echo "<form name='modificar_contacto' action='modificar_contacto.proc.php?cont_id=".$contacto['cont_id']."' id='contact_form' runat='server'>";
           $foto='img/users/'.$contacto['cont_foto'];
        if (file_exists ($foto)){
                           echo "<div class='col-xs-1'></div><div class='col-sm-2 text-center'> <a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'> <img src=".$foto." width='170' height='170' class='img-responsive img-circle' alt=".$foto." style='background-color: white' align='center' /></a></div>";
                        } else {
                            echo "<div class='col-xs-1'></div><div class='col-sm-2 text-center'><a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'><img src='img/users/0.png' width='170' height='170' class='img-responsive img-circle' alt='Imagen no encontrada' style='background-color: white' align='center' /></a></div>";
                        }

        echo "<div class='col-sm-2 text-right'> ";
        echo "<h6 style='color: #ffffff'>Nombre :<br><br><br><h6 style='color: #ffffff'>Apellido :<br><br><br><h6 style='color: #ffffff'>Cumpleaños :<br><br><br><h6 style='color: #ffffff'> Email :<br><br><br> <h6 style='color: #ffffff'>1r Telefono :<br><br><br> <h6 style='color: #ffffff'>1a Dirección :<br><br><br><h6 style='color: #ffffff'>2n Telefono : <br><br><br><h6 style='color: #ffffff'>2a Dirección : </h6></div><div class='col-sm-2' text-left'>";
        echo "<input type='text' name='nombre' placeholder='Nombre contacto' value='".$contacto['cont_nombre']."' class='form-control'/></br>";
        echo "<input type='text' name='apellido' placeholder='Apellido contacto' value='".$contacto['cont_apellido']."' class='form-control'></br>";
        echo "<input type='date' name='cumpleaños' step='1' min='1900-01-01'  value='".$contacto['cont_cumpleaños']."' class='form-control'/></br>";
        echo "<input type='email' name='email' placeholder='email@email.com' value='".$contacto['cont_email']."' class='form-control'/></br>" ;
        echo "<input type='text' name='telefono1' placeholder='Num. Telefono' value='".$contacto['cont_telefono1']."' class='form-control'/></br>";
        echo "<input type='text' name='direccion1' placeholder='Primera Dirección ej: Casa' value='".$contacto['cont_direccion1']."' class='form-control'/></br>";
        echo "<input type='text' name='telefono2' placeholder='Num. Telefono' value='".$contacto['cont_telefono2']."'class='form-control'/></br>";
        echo "<input type='text' name='direccion2' placeholder='Segunda Dirección ej: Trabajo' value='".$contacto['cont_direccion2']."'class='form-control'/></br>";
        echo "<input type='hidden' name='cont_id' value=".$contacto['cont_id']." />";
        ;
        echo "</div><div class='col-sm-3 text-center'>";;

        echo "<br><br><br><br><br><button type='submit' class='page-scroll btn btn-xl'>Modificar contacto</button></div>";

      }
} else{
        echo "No tienes contactos, agrega a uno!";
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


