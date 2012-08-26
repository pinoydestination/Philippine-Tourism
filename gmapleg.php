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

if(!isset($_GET['waypoints'])){
	echo "missing parameter; waypoints"; die();
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
    <script src="/wp-content/themes/pinoydestination/js/jquery.js"></script>
    
    <script>
	 $.noConflict();
     	 var directionDisplay;
      var directionsService = new google.maps.DirectionsService();
      var map;

      function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var mapOptions = {
          zoom: 6,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        directionsDisplay.setMap(map);
        
        calcRoute();
      }

      function calcRoute() {
      
      	var locations = '<?php echo $_GET['waypoints']; ?>';
      	var newlocs = locations.split("|");
      	var totalData = newlocs.length;
      	var start = (newlocs[0]);
      	var end = (newlocs[totalData-1]);
      	var endData = totalData-1;
        /*var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;*/
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i <totalData ; i++) {
          if (i>0) {
            if(i!=endData){
            waypts.push({
                location:newlocs[i],
                stopover:true});
            }
          }
        }

        var request = {
            origin: start,
            destination: end,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions_panel');
            summaryPanel.innerHTML = '<h1>Itinerary Route</h1>';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route: ' + routeSegment + '</b><br>&nbsp;<br/>';
              summaryPanel.innerHTML += '<strong>FROM: </strong>'+route.legs[i].start_address + '<br /><strong>TO: </strong> ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
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
    <div id="map_canvas" style="height:100%; width:70%; float:left;"></div>
    <div style="float:right; width:30%; overflow:auto; height:100%">
    	<div id="directions_panel" style="width:90%;height: 100%; padding:10px;">
    </div>
  </body>
</html>
