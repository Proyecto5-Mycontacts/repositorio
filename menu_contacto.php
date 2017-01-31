
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
  <!-- jQuery -->
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

  <style type="text/css">
     #map {
        height: 100%;
        width: 75%;
        display: block;
      }
  </style>
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
                        <a href="modificar_usuario.php" >Edita tu perfil</a>
                    </li>
                    <li>
                        <a href="main.php";>Mis contactos</a>
                    </li>
                    <li>
                        <a href="anadir_contacto.php";>Añadir contacto</a>
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
   extract($_REQUEST);

   $sql = "SELECT  * FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.cont_id = ". $_REQUEST['cont_id'] ;
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        
      $foto='img/users/'.$contacto['cont_foto'];


        
                        if (file_exists ($foto)){
                           echo "<div class='col-xs-1'></div><div class='col-sm-4 text-center'> <a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'> <img src=".$foto." width='150' height='350' class='img-responsive img-circle' alt=".$foto." style='background-color: white' align='center' /></a></div>";
                        } else {
                            echo "<div class='col-xs-1'></div><div class='col-sm-4 text-center'><a href='menu_contacto.php?cont_id=".$contacto['cont_id']."'><img src='img/users/0.png' width='300' height='300' class='img-responsive img-circle' alt='Imagen no encontrada' style='background-color: white' align='center' /></a></div>";
                        }

        echo "<div class='col-sm-4' text-left'>";
        echo "<h7 class='control'>Nombre : " .$contacto['cont_nombre']."</br></br>";
        echo "Apellido : " .$contacto['cont_apellido']."</br></br>";
        echo "Cumpleaños : " .$contacto['cont_cumpleaños']."</br></br>";
        echo "Email : " .$contacto['cont_email']."</br></br>";
        echo "1r Telefono : " .$contacto['cont_telefono1']."</br></br>";
        echo "1a Dirección : " .$contacto['cont_direccion1']."</br></br>";

        $direccion1 = $contacto['cont_direccion1'];
        $direccion2 = $contacto['cont_direccion2']; 
        echo "<input type='text' id='address' value='".$direccion1."' style='display:none';>";
        echo "<input type='text' id='address2' value='".$direccion2."' style='display:none';>";


        echo "2n Telefono : " .$contacto['cont_telefono2']."</br></br>";
        echo "2a Dirección : " .$contacto['cont_direccion2']."</br></br></h7>";
        ?>
        
        </div>
        <div id='map' class="col-lg-12 text-left" style='height:300px; width: 275px; visibility:hidden; ' >
        <?php

        echo "</div></div><div class='col-lg-12' text-left'> <br></div>";

        echo"<div class='col-lg-1'><br></div> <div class='col-xs-1' text-left'>";
        echo"<a href='modificar_contacto.php?cont_id=".$contacto['cont_id']."'><img src='img/icons/modificar.png' width='30' height='30'/></a></br></div>";
        ?>

        <div class='col-xs-1' text-right'><a href='#' onclick='return Confirmar(<?php echo $contacto['cont_id']?>);'><img src='img/icons/eliminar.png' width='30' height='30'/></a></br></div>
        <?php
        echo"<div class='col-xs-1' text-left'><img style='cursor:hand' src='img/icons/googlemaps.ico' width='30' height='30' id='submit'/></br></div>";
        echo"</div>";
      }
      

      }else{
        echo "No tienes contactos, agrega a uno!";
      }
  ?> 
  </div></div></div></section>




 <script>

 document.getElementById('submit').addEventListener('click',  (function () { 

    
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,

    center: {lat: 41.366505, lng: 2.116578}
  });

 var address = document.getElementById('address').value;
 var address2 = document.getElementById('address2').value;

    var addresses = [address, address2];

//alert(addresses[0]);
//alert(addresses[1]);

 document.getElementById('map').style.visibility='visible'


    for (var x = 0; x < addresses.length; x++) {
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            alert( data.results[0].address_components[0].long_name);
          alert(data.results[0].formatted_address); 

            //alert(p.lat);
            //alert(p.lng);
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map,
                title: "Dirección: "+ data.results[0].formatted_address 
            });
             

            });   


    }
     
}
 ));
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzJB0SpA6BAJfM8gtXucenP27gNDmdhjk&callback=initMap"
        async defer></script>




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

