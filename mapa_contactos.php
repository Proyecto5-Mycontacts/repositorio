
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
</head>

<body id="page-top" class="index">
 <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color: #222222 ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="#page-top"> <img src="img/logos/logo.png" width="125" height="45" alt="MyContacts"></a>
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
<!-- Header -->
    <!--<header style="background-image: url(''); background-color: #222222 ">
        <div class="container">
              <div class="row">
            <div class="intro-text">
                <div class="col-lg-12 text-center">
                
        <div class="row"> -->
     
<section id="team" class="jumbotron bg-darkest-gray">
        
         
        <div id='map' style='height:450px; width:100%; visibility:hidden;' >
      
        </div>
       
        </section>
  <?php

   

   $sql = "SELECT cont_direccion1, cont_direccion2, cont_nombre, cont_id FROM tbl_contacto, tbl_usuario WHERE tbl_contacto.usu_id = tbl_usuario.usu_id AND tbl_contacto.usu_id = ". $_SESSION['usu_id']." ORDER BY cont_nombre";
   //echo $sql;
   $contactos = mysqli_query($conexion, $sql); 

   if(mysqli_num_rows($contactos)>0){
      
      while($contacto = mysqli_fetch_array($contactos)){
        
        echo "<input type='text' class='nombre' value='".$contacto['cont_nombre']."' style='visibility:hidden;'>";
        echo "<input type='text' class='direccion1' value='".$contacto['cont_direccion1']."' style='visibility:hidden;'>";
        echo "<input type='text' class='direccion2' value='".$contacto['cont_direccion2']."' style='visibility:hidden;'>";
        


        }
      }


?> 
 
 

 <script>


var direccion1 = document.getElementsByClassName('direccion1');
var direccion2 = document.getElementsByClassName('direccion2');
var nombre = document.getElementsByClassName('nombre');



var addresses1 = [];
var addresses2 = [];
var names = []
 window.onload = function () { 

    
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,

    center: {lat: 41.366505, lng: 2.116578}
  });
;

//la direccion 1 va del 0 al ...
for (var i =0;  i < direccion1.length; i++) {

    addresses1[i]=direccion1[i].value;
    //alert(addresses1[i]);
}
//la direccion 2 va del 0 al ...
for (var i =0;  i < direccion2.length; i++) {

    addresses2[i]=direccion2[i].value;
    //alert(addresses2[i]);
}
//los nombres van del 0 al ...
for (var i =0;  i < nombre.length; i++) {

    names[i]=nombre[i].value
    //alert(names[i]);
}


 document.getElementById('map').style.visibility='visible'

    var c = 0;
    var z = 0;

    for (var x = 0; x < addresses1.length; x++) {
        
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses1[x]+'&sensor=false', null, function (data) {
            
            var p = data.results[0].geometry.location
            //alert( data.results[0].address_components[0].long_name);
          //alert(data.results[0].formatted_address); 

            //alert(p.lat);
            //alert(p.lng);
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map,
                title: "La primera dirección de "+ nombre[c].value +" es: "+ data.results[0].formatted_address 
            });
             
           
        c=c+1;
            });  

            $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses2[x]+'&sensor=false', null, function (data) {
          
            var j = data.results[0].geometry.location
            //alert( data.results[0].address_components[0].long_name);
          //alert(data.results[0].formatted_address); 

            //alert(p.lat);
            //alert(p.lng);
            var latlng2 = new google.maps.LatLng(j.lat, j.lng);
            new google.maps.Marker({
                position: latlng2,
                map: map,
                title:  "La segunda dirección de "+ nombre[c].value +" es: "+ data.results[0].formatted_address 
            });
             
            z=z+1;

            });  

      
    }
     
}
 
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
</html>
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

