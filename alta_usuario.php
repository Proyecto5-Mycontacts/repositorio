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
<script type="text/javascript" src="js/validacion.js"> </script>
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
                <a class="navbar-brand page-scroll" href="#page-top"> <img src="img/logos/logo.png" width="125" height="45" alt="MyContacts"></a>
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
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header style="background-image: url('img/header2.png');">
        <div class="container">
              <div class="row">
            <div class="intro-text">
                <div class="col-lg-12 text-center">
                
        <div class="row">



    <form name="Login" action="alta_usuario.proc.php" onsubmit="return validar();">
            <div class="col-md-3 text-left">
              Nombre de usuario:<br><input type="text" class="form-control" id="nombre" name="nombre" placeholder="usuario" required onfocus="document.Login.nombre.style.color='';" /><br>
              Contraseña:<input type="password" class="form-control" id="password" name="password" placeholder="contraseña" required onfocus="document.Login.password.style.color='';"/><br>
            </div>
            <div class="col-md-3 text-left">
              Email:<input type="email" class="form-control" name="email" placeholder="email@email.com" required /><br>
              Tu foto:<input id="foto" name="foto" type="file" style="  color: #222222;  background-color: white;  border-color: #fed136;   border-radius: 3px;  padding: 5px 5px;"><br>
            </div>
            <div class="col-md-4 text-center"><br>
              <span class="form_hint">Formato correcto: "name@something.com"</span>
            </div>
           
          
                  
            
        </div><br> <button class="page-scroll btn btn-xl">Registro</button>
        </div>
        </div>
        </div>

       
    </form>
    
    <br>
    <br>
    </header>
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
