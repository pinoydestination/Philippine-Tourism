<?php get_header(); ?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
	<div class="left" id="leftSidePanel">

		<div class="postBread">
			<ul class="breadList">
			<?php
			if (is_category( )) {
				$cat = get_query_var('cat');
				$yourcat = get_category ($cat);
			}
			
			$idObj = get_category_by_slug($yourcat->slug); 
			$parentCat = getParentCat($idObj->cat_ID, $wpdb);
			
			if($parentCat){
				$allCat[] = $parentCat;
				//get another parent
				$parentCat2 = getParentCat($parentCat->parent, $wpdb);
				if($parentCat2){
					$allCat[] = $parentCat2; 
				}
			}
			if(is_array($allCat)){
				foreach($allCat as $category){
					?>
						<li><a href="<?php echo CATEGORY_BASE; ?>/<?php echo $category->slug; ?>/"><?php echo $category->name; ?></a></li>
					<?php
				}
			}
			?>

			<br clear="all" />
			</ul>			
		</div>
		<div class="postTitle greenbgnew">
			<h1 class="title"><?php
			printf( __( '%s', 'twentyeleven' ), '' . ucfirst(single_cat_title( '', false )) . '' );
			?></h1>
			
		</div>
		<div class="homepageshadow">&nbsp;</div>
		
		<div>
			<?php 
			if ( have_posts() ) : 
			?>
			<?php while ( have_posts() ) : the_post(); 
				
				$postID = get_the_ID();
				
				
				$allCat = null;
			
				//Get Star Ratings
				$sql = "SELECT * FROM ". $wpdb->prefix . "ratings WHERE post_id='".$postID."'";
				$starRating = $wpdb->get_results($sql);
				
				if(count($starRating) > 0){
					$totalStarRate = count($starRating);
					$currentRating = 0;
					foreach($starRating as $ratings){
						$currentRating = ($currentRating)+($ratings->ratings);
					}
					$starRate = $currentRating;
					$overAllTotal = $totalStarRate*100;
					$starComputeFinal = floor((($starRate/$overAllTotal)*50)+50);
				}else{
					$starComputeFinal = 0;
				}
				
				/*Get Special Info*/
				$sql = "SELECT * FROM ".$wpdb->prefix."other_info WHERE post_id='".$postID."'";
				$otherInfoData = $wpdb->get_results($sql);
				$otherInfoData = $otherInfoData[0];
				
				
				$table = $table_prefix."images";
				$sql = 'SELECT * FROM '.$table. ' WHERE post_id="'.get_the_ID().'"';
				$imageListing = $wpdb->get_results( $wpdb->prepare( $sql ));
								
			?>
				
				<div class="searchresultBox" style="display:block !important;">
					<div class="searchResultTitle">
						<div style="float:left;">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="star" style="float:right; margin-top:5px;"><div class="star_w2" style="width:<?php echo $starComputeFinal; ?>%;">&nbsp;</div></div>
						<br clear="all" />
					</div>
					<div>
						<span class="showreview arrow_go">Show Reviews</span><span class="showmap globe_go" addresslocation="<?php echo urlencode($otherInfoData->location_address); ?>"><a class="fancybox fancybox.iframe" href="http://www.pinoydestination.com/gmap.php?address=<?php echo urlencode($otherInfoData->location_address); ?>&zoom=13">Reveal in Map</a></span>
					</div>
					<div class="searchResultDetails">
						<?php foreach($imageListing as $img){ ?>
						<a data-fancybox-group="gallery<?php echo get_the_ID(); ?>" href="/uploads/destinations/<?php echo $img->original; ?>" class="imageset fancybox"><img src="/uploads/thumbs/<?php echo $img->original; ?>" border="0" /></a>
						<?php } ?>
					</div>
					<div>
						 <span class="locationaddress"><?php echo $otherInfoData->location_address; ?></span>
					</div>
				</div>
				
			<?php 
			endwhile; 
			else: ?>
			
			<p align="center" style="text-align: center; color:#267FCB !important;"><h1 style="color:#267FCB; font-size:15px;">Sorry, No post found for this category.</h1></p>
			
			<?php endif; ?>							
		</div>
		
	</div>
					
	<?php
					
	/**
	 * Sidebar
	 */
	get_sidebar();
	
	?>
					
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
