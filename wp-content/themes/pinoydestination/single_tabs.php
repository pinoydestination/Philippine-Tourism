<?php 
$addhotel = false;
if(!isset($_GET['gallery']) && $_GET['gallery'] != "show"){

if(in_array("Hotel",$categoryStatic)){
	$title = "Tourist Spots";
	$catType = "Destination";
}else if(in_array("Destination",$categoryStatic)){
	$title = "Hotels";
	$catType = "Hotel";
}else{
	$title = "Tourist Spots";
	$catType = "Destination";
	$addhotel = true;
}

$hotelLists = getSpecific($GLOBALS['Current_City'],$catType);
$restaurantLists = getSpecific($GLOBALS['Current_City'],"restaurant");
if($addhotel){
	$newlist = getSpecific($GLOBALS['Current_City'],"Hotel");
}
?>
	
<div class="extracontentaddons">
	
	<ul class='tabs'>
		<li><a href='javascript:;' activate="#tab1" class="active"><?php echo $title; ?> in <?php echo $GLOBALS['Current_City']; ?></a></li>
		<?php if($addhotel){ ?>
		<li><a href='javascript:;' activate="#tab3">Hotels in <?php echo $GLOBALS['Current_City']; ?></a></li>
		<?php } ?>
		<li><a href='javascript:;' activate="#tab2">Restaurants in <?php echo $GLOBALS['Current_City']; ?></a></li>
		<br clear="all" />
	</ul>
	
	<div class="tabscontent" id='tab1'>
		<?php
			if(count($hotelLists)<=0){
				echo "<center class='noutfound'><h2>No ".$catType." found within this area on our server.</h2></center>";
			}else{
			?>
			<ol style="display:block; ">
				<?php foreach($hotelLists as $hotels){ ?>
				<li>
					<div class="extralist">
						<div class="extralisttitle">
							<a href="<?php echo $hotels->guid; ?>"><?php echo $hotels->post_title; ?></a>
							<a class="showdirection fancybox fancybox.iframe" href="http://www.pinoydestination.com/googlemap/gdirections.php?from=<?php echo urlencode($GLOBALS['Current_Location']); ?>&to=<?php echo urlencode($hotels->location_address); ?>&zoom=1">Show Directions</a>
							<br clear="all" />
						</div>
						<span><?php echo $hotels->location_address; ?></span>
						<span><?php echo $hotels->contact_number; ?></span>
						<span class="website"><?php echo $hotels->website; ?></span>
					</div>
				</li>
				<?php } ?>
			</ol>
			<?php
			}
		?>
	</div>
	<div class="tabscontent" id='tab2'>
		<?php
			if(count($restaurantLists)<=0){
				echo "<center class='noutfound'><h2>No Restaurant found within this area on our server.</h2></center>";
			}else{
			?>
				<ol style="display:block; ">
					<?php foreach($restaurantLists as $hotels){ ?>
					<li>
						<div class="extralist">
							<div class="extralisttitle">
								<a href="<?php echo $hotels->guid; ?>"><?php echo $hotels->post_title; ?></a>
								<a class="showdirection fancybox fancybox.iframe" href="http://www.pinoydestination.com/googlemap/gdirections.php?from=<?php echo urlencode($GLOBALS['Current_Location']); ?>&to=<?php echo urlencode($hotels->location_address); ?>&zoom=1">Show Directions</a>
								<br clear="all" />
							</div>
							<span><?php echo $hotels->location_address; ?></span>
							<span><?php echo $hotels->contact_number; ?></span>
							<span class="website"><?php echo $hotels->website; ?></span>
						</div>
					</li>
					<?php } ?>
				</ol>
			<?php
			}
		?>
	</div>
	
	<?php if($addhotel){ ?>
	<div class="tabscontent" id='tab3'>
		<?php
			if(count($newlist)<=0){
				echo "<center class='noutfound'><h2>No Hotels found within this area on our server.</h2></center>";
			}else{
			?>
			<ol style="display:block; ">
				<?php foreach($newlist as $hotels){ ?>
				<li>
					<div class="extralist">
						<div class="extralisttitle">
							<a href="<?php echo $hotels->guid; ?>"><?php echo $hotels->post_title; ?></a>
							<a class="showdirection fancybox fancybox.iframe" href="http://www.pinoydestination.com/gdirections.php?from=<?php echo urlencode($GLOBALS['Current_Location']); ?>&to=<?php echo urlencode($hotels->location_address); ?>&zoom=1">Show Directions</a>
							<br clear="all" />
						</div>
						<span><?php echo $hotels->location_address; ?></span>
						<span><?php echo $hotels->contact_number; ?></span>
						<span class="website"><?php echo $hotels->website; ?></span>
					</div>
				</li>
				<?php } ?>
			</ol>
			<?php
			}
		?>
	</div>
	<?php } ?>
	
</div>

<?php } ?>