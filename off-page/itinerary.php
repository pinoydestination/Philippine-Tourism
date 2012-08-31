<?php
session_start();
if(isset($_REQUEST['request']) && $_REQUEST['request']=='removeall'){
	unset($_SESSION['myItinerary']);
	exit();
}
if(isset($_REQUEST['data']) && $_REQUEST['data'] != ""){
	if(isset($_SESSION['myItinerary']) && is_array($_SESSION['myItinerary'])){
		$dataCount = count($_SESSION['myItinerary']);
		$tmpData = $_REQUEST['data'];
		$tmpData = explode("|",$tmpData);
		$dataArray = array("location_title"=>$tmpData[1],
						   "location_address"=>$tmpData[0],
						   "location_url"=>$tmpData[2]);
		$itineraryHash = sha1($tmpData[1]);
		$_SESSION['myItinerary'][$itineraryHash] = $dataArray;
		$newDataCount = count($_SESSION['myItinerary']);
		if($dataCount != $newDataCount){
			?>
			<li>
				<span class="xicon">&times;</span>
				<a href="a"><?php echo $tmpData[1]; ?></a>
				<span class="itilocationaddress">
					<?php echo $tmpData[0]; ?>
				</span>
			</li>
			<?php
		}
	}else{
		$dataCount = 0;
		$tmpData = $_REQUEST['data'];
		$tmpData = explode("|",$tmpData);
		$dataArray = array("location_title"=>$tmpData[1],
						   "location_address"=>$tmpData[0],
						   "location_url"=>$tmpData[2]);
		$itineraryHash = sha1($tmpData[1]);
		$_SESSION['myItinerary'][$itineraryHash] = $dataArray;
		$newDataCount = count($_SESSION['myItinerary']);
		if($dataCount != $newDataCount){
			?>
			<li>
				<span class="xicon">&times;</span>
				<a href="b"><?php echo $tmpData[1]; ?></a>
				<span class="itilocationaddress">
					<?php echo $tmpData[0]; ?>
				</span>
			</li>
			<?php
		}
	}
}
?>
