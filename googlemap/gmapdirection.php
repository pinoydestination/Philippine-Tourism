<?php
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
	<title>Google Map Direction | <?php echo $_GET['address']; ?> | Pinoy Destination</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAWo2NkY1CvmTYlKZRwS0P5ZfMSE5wLiiE&sensor=true"></script>
    <script src="/wp-content/themes/pinoydestination/js/jquery.js"></script>
    <script>
	 $.noConflict();
        var directionDisplay;
      var directionsService = new google.maps.DirectionsService();
      var map;

      function initialize() {
      
      
      		
        directionsDisplay = new google.maps.DirectionsRenderer();
       
        var mapOptions = {
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        directionsDisplay.setMap(map);
        
        
      
      	var start = "<?php echo $_GET['from']; ?>";
        var end = "<?php echo $_GET['to']; ?>";
        var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          }
        });
        
      
        
        /*calcRoute();*/
      }

      function calcRoute() {
        var start = "<?php echo $_GET['from']; ?>";
        var end = "<?php echo $_GET['to']; ?>";
        var request = {
            origin:start,
            destination:end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          }
        });
      }
      
      jQuery(document).ready(function(){
      	initialize();
      	//codeAddress()
      });
      
    </script>
  </head>
  <body onload="">
    <div id="map_canvas" style="height:100%;"></div>
  </body>
</html>
