<?php
$allowedAddress = array("www.pinoydestination.com","test.pinoydestination.com","localhost","localhost:8080","localhost:8082");
if(isset($_SERVER['HTTP_REFERER'])){
	$ref = $_SERVER['HTTP_REFERER'];
}
$allowed = false;
if($ref){
	$ref = explode("/",$ref);
	foreach($allowedAddress as $address){
		if(in_array($address,$ref)){
			$allowed = true;
		}
	}

	if(!$allowed){
		die("<style>font-family:Arial, Helvetica, sans-serif; font-size:11px;</style>You are not allowed to access this page. Visit <a href='http://www.pinoydestination.com/'>www.PinoyDestination.com</a> to view content.");
	}

}

if(!isset($_GET['from'])){
	echo "missing parameter"; die();
}
if(!isset($_GET['to'])){
	echo "missing parameter"; die();
}

if(isset($_GET['zoom'])){
	$zoomLevel = $_GET['zoom'];
}else{
	$zoomLevel = 11;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#4E565C; }
      #map_canvas { height: 100% }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAWo2NkY1CvmTYlKZRwS0P5ZfMSE5wLiiE&sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    <script>
	 $.noConflict();
      var rendererOptions = {
        draggable: true
      };
      var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);;
      var directionsService = new google.maps.DirectionsService();
      var map;


      function initialize() {

        var mapOptions = {
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('directionsPanel'));

        google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
          computeTotalDistance(directionsDisplay.directions);
        });

        calcRoute();
      }

      function calcRoute() {

        var request = {
          origin: '<?php echo $_GET["from"]; ?>',
          destination: '<?php echo $_GET["to"]; ?>',
          travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000.
        document.getElementById('total').innerHTML = total + ' km';
      }
      
      jQuery(document).ready(function(){
      	initialize();
      	//codeAddress()
      });
      
    </script>
  </head>
  <body onload="">
    <div id="map_canvas" style="height:100%; width:70%; float:left;"></div>
    <div style="float:right; width:30%; overflow:auto; height:100%">
    	<div id="directionsPanel" style="width:90%;height: 100%; padding:10px;">
    	<p>Total Distance: <span id="total"></span></p>
    </div>
  </body>
</html>
