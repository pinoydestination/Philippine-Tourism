<?php
if(is_single()){
	global $finalCat;
	$sidetrips = getSideTrips($finalCat,5);
}else{
	$sidetrips = getSideTrips("Philippines",5);
}
if(is_home()){ ?>
<span class="myriad_pro_bold_condensed sidebarheader">Recently Added Destinations</span>
<?php }else{ ?>
<span class="myriad_pro_bold_condensed sidebarheader"><?php echo $finalCat; ?> Side Trips</span>
<?php } ?>
<div class="sidetrip">
	<?php 
	$sideTripCount = count($sidetrips);
	$x=0;
	foreach($sidetrips as $dest){ 
	$x++;
	if($x==$sideTripCount){
		$style = " nomarginbottom noborderbottom";
	}else{
		$style = "";
	}
	?>
	<div class="sidetripcontent <?php echo $style; ?>">
		<div class="leftcont">
			<img width="70" height="50" src="<?php echo $dest->thumb; ?>" alt="<?php echo $dest->post_title; ?>" />
		</div>
		<div class="rightcont">
			<div class="sidetriptitle">
				<span class="title"><a href="<?php echo $dest->guid; ?>"><?php echo $dest->post_title; ?></a></span>
				<span class="loc"><?php echo $dest->location_address; ?></span>
			</div>
			<div>
				<div class="star">
					<div class="star2" style="width:<?php echo $dest->ratings["rate"]; ?>%;">&nbsp;</div>
				</div>
				<span class="readmoresidetrip"><a href="<?php echo $dest->guid; ?>#reviews" class="sidetriphref"><?php echo $dest->ratings["total"]; ?> reviews</a></span>
				<br clear="all" />
			</div>
		</div>
		<br clear="all" />
	</div>
	<?php } ?>
</div>
<br />