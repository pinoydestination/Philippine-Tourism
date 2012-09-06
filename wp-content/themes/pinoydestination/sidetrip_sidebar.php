<?php
global $parentCat;
global $finalCat;
global $arrCatIsland;
global $globalCatType;
global $selectedCat;
if($globalCatType == ""){
	$globalCatType = $selectedCat;
}
$island = "Philippines";
if(isset($parentCat) && is_array($parentCat)){
	foreach($parentCat as $pcat){
		if(in_array(ucwords($pcat->slug),$arrCatIsland)){
			$island = $pcat->slug;
		}
	}
}
if(is_home()){ ?>
<span class="myriad_pro_bold_condensed sidebarheader">Recently Added Destinations</span>
<?php 
}else{ 
	if($finalCat == ""){
		$finalCat = ucwords($island);
	}
	if(!is_single()){
		if(strtolower(trim($globalCatType)) == "hotel"){
			$headTitle = "Side Trips";
		}else if(strtolower(trim($globalCatType)) == "destination"){
			$headTitle = "Hotels";
		}else{
			$headTitle = "Hotels";
		}
	}else{
		$headTitle = "Side Trips";
	}
?>
<span class="myriad_pro_bold_condensed sidebarheader"><?php echo $finalCat . " " .$headTitle; ?></span>
<?php 
}
if(is_single()){
	
}else{
	if(strtolower($globalCatType) == "destination"){
		$globalCatType = "hotel";
	}else if(strtolower($globalCatType) == "hotel"){
		$globalCatType = "destination";
	}else{
		$globalCatType = "destination"; 
	}
}
if(is_single()){
	$island = $finalCat;
	$island = str_replace(" ","-",strtolower($island));
	$island = $island."|single";
}
$sidetrips = sideTripFilter($globalCatType,$island);
$sideTripArrID = Array();
foreach($sidetrips as $sidedata){
	$sideTripArrID[] = $sidedata->term_id;
}

		wp_reset_query();
		$the_query = new WP_Query( array('category__in' => $sideTripArrID, "posts_per_page"=>5) );
		if ( $the_query->have_posts() ) : 
			$x=0;
			?>
			<div class="sidetrip">
			<?php
			while ($the_query->have_posts() ) : $the_query->the_post();
				$postID = get_the_ID();
				$x++;
				if($x==$sideTripCount){
					$style = " nomarginbottom noborderbottom";
				}else{
					$style = "";
				}
				$postRating    = getPostRatings($postID);
				$postOtherInfo = getOtherInfo($postID);
				$postImage     = getImage($postID,1);
				
			?>
				<div class="sidetripcontent <?php echo $style; ?>">
					<div class="leftcont">
						<img width="70" height="50" src="/uploads/thumbs/<?php echo $postImage->thumb; ?>" alt="<?php echo get_the_title(); ?>" />
					</div>
					<div class="rightcont">
						<div class="sidetriptitle">
							<span class="title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></span>
							<span class="loc"><?php echo $postOtherInfo->location_address; ?></span>
						</div>
						<div>
							<div class="star">
								<div class="star2" style="width:<?php echo $postRating->overAllRatings; ?>%;">&nbsp;</div>
							</div>
							<span class="readmoresidetrip"><a href="<?php echo the_permalink(); ?>#reviews" class="sidetriphref"><?php echo $postRating->total; ?> reviews</a></span>
							<br clear="all" />
						</div>
					</div>
					<br clear="all" />
				</div>
			<?php
			endwhile;
			?>
			</div>
			<?php
		else:
		endif;
	?>
<br />