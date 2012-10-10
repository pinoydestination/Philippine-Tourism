<?php
$allowedAddress = array("www.pinoydestination.com","test.pinoydestination.com","localhost","localhost:8080","localhost:8082");
if(isset($_SERVER['HTTP_REFERER'])){
	$ref = $_SERVER['HTTP_REFERER'];
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
}

if(!isset($_GET['address'])){
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
	<title>Google Map | <?php echo $_GET['address']; ?> | Pinoy Destination</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAWo2NkY1CvmTYlKZRwS0P5ZfMSE5wLiiE&sensor=true"></script>
    <script src="/wp-content/themes/pinoydestination/js/jquery.js"></script>
<script>

	<?php 
	if(isset($_GET['datatype']) && $_GET['datatype'] == "latlang"){
	?>
	$.noConflict();
      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        var address = "<?php echo urldecode($_GET['address']); ?>";
		
		var parliament = new google.maps.LatLng(<?php echo urldecode($_GET['address']); ?>);
		var marker;
		var map;
        
       var latlng = new google.maps.LatLng(<?php echo urldecode($_GET['address']); ?>);
        var mapOptions = {
          zoom: <?php echo $zoomLevel; ?>,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  center: latlng
        }
		
		map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		
		marker = new google.maps.Marker({
          map:map,
          draggable:false,
          animation: google.maps.Animation.DROP,
          position: parliament
        });
		
        google.maps.event.addListener(marker, 'click', toggleBounce);
		
		
        
      }
	  
	  function toggleBounce() {

        if (marker.getAnimation() != null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
      
      jQuery(document).ready(function(){
      	initialize();
      });
      
	<?php
	}else{
	?>

	 $.noConflict();
      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        var address = "<?php echo $_GET['address']; ?>";
        
       // var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
          zoom: <?php echo $zoomLevel; ?>,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        
        var address = "<?php echo $_GET['address']; ?>";
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
      }
      
      jQuery(document).ready(function(){
      	initialize();
      });
    <?php } ?>
    </script>
  </head>
  <body onload="">
    <div id="map_canvas" style="height:100%;"></div>
  </body>
</html>
