<?php
 session_start();
  include("conexion.proc.php");

  extract($_REQUEST);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
</script>

</head>
<body id="body">
<?php
      if(isset($_SESSION['usu_nombre']) ){
  ?>

    <div id="floating-panel">
      <input type="hyde" id="address"  value="<?php echo $cont_direccion1 ?>">
      
    </div>
    <div id="map"></div>

<script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: -34.397, lng: 150.644}
  });
  var geocoder = new google.maps.Geocoder();

document.body[window.addEventListener ? 'addEventListener' : 'attachEvent'](
    window.addEventListener ? "load" : "onload", function() {
    geocodeAddress(geocoder, map);
  }, false);


  document.getElementById('body').addEventListener('onload', );
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

    </script>

 

<div id="mapCanvas"></div>

 <?php }
     else {
        //como han intentado acceder de manera incorrecta, redirigimos a la página login.php con un mensaje de error
        $_SESSION['error']="PILLÍN! Tienes que loguearte primero!";
        header("location: login.php");
      }

      //end if(isset($_SESSION['mail'])){
      ?>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzJB0SpA6BAJfM8gtXucenP27gNDmdhjk&callback=initMap"
        async defer></script>


</body>
</html>