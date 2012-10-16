<?php
session_start();
$data = $_SESSION['myItinerary'];

$coord   = "";
$address = "";
$coordinates = true;
$add = true;
foreach($data as $map){
	if($coord == ""){
		if($map['location_coord'] != ""){
			$coord = $map['location_coord'];
		}else{
			$coordinates = false;
		}
	}else{
		if($map['location_coord'] != ""){
			$coord .= "|" . $map['location_coord'];
		}else{
			$coordinates = false;
		}
	}
	
	if($address == ""){
		if($map['location_address'] != ""){
			$address = $map['location_address'];
		}else{
			$add = false;
		}
	}else{
		if($map['location_address'] != ""){
			$address .= "|" . $map['location_address'];
		}else{
			$add = false;
		}
	}
	
}

if($coordinates){
	$finalAddress = $coord;
}else{
	$finalAddress = $address;
}

header("Location: /googlemap/gmapleg.php?waypoints=".$finalAddress); die();

?>