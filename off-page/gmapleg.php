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

require( '../wp-load.php' );
get_header();
?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAWo2NkY1CvmTYlKZRwS0P5ZfMSE5wLiiE&sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style>
span.spandesc{
	border: 1px solid silver;
    display: block;
    margin: 5px 0;
    padding: 5px 10px;
}
</style>
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
			
			
			documentURL = jQuery.trim(document.URL);
			
            summaryPanel.innerHTML = '<h1>Itinerary Route</h1><p><strong>Travel Mode:</strong> Driving<br /></p>';
            // For each route, display summary information.
			var distance = 0;
			var time = 0;
            for (var i = 0; i < route.legs.length; i++) {
			
			console.log(route.legs);
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<br />&nbsp;<h1>Route: ' + routeSegment + '</h1><br>&nbsp;<br/>';
              summaryPanel.innerHTML += '<strong>FROM: </strong>'+route.legs[i].start_address + '<br /><strong>TO: </strong> ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += '<strong>Distance:</strong> '+route.legs[i].distance.text + '<br>';
              summaryPanel.innerHTML += '<strong>Duration:</strong> '+route.legs[i].duration.text + ' (estimated)<br><br>';
			  
			  
			  
              for( var x = 0; x < route.legs[i].steps.length; x++){
				summaryPanel.innerHTML += '<span class="spandesc">'+route.legs[i].steps[x].instructions+ ' <p>Distance: ' + route.legs[i].steps[x].distance.text+'<br />Estimated Time: '+ route.legs[i].steps[x].duration.text +'</p></span>';
			  }
			  
			 
			  distance = distance+route.legs[i].distance.value;
			  time = time+(route.legs[i].duration.value/60);
			 
            }
			
			var totalDistance = (distance*0.001);
			var totalTime     = (time/60);
          }
        });
      }
      
      jQuery(document).ready(function(){
      	initialize();
      	//codeAddress()
      });
      
    </script>

<div class="mainbodycontent" id="mainDocument">
	
	<div id="map_canvas" style="height:600px; width:100%;"></div>
    <div style="width:100%; overflow:auto; height:auto;">
    	<div id="directions_panel"></div>
	</div>					
	<br clear="all" />
</div>
<?php
get_footer();
?>

