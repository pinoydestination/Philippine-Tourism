<?php get_header();
?>
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
			
			
			if( is_array($parentCat) && count($parentCat)>=1 ){
				$parentCat = rearrangeCategory($parentCat,$arrCatAll);
				$prevCat = "";
				foreach($parentCat as $category){
					if(in_array($category->name, $arrCatIsland)){
						$currentIsland = $category->name . ", Philippines";
					}
					$prevCat= $prevCat . $category->slug ."/";
				?>
					<li><a href="<?php echo $category_base. "/". $prevCat; ?>"><?php echo $category->name; ?></a></li>
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
				$starComputeFinal = getPostRatings(get_the_ID());
				
				/*Get Special Info*/
				$otherInfoData = getOtherInfo(get_the_id());
				$imageListing = getImage(get_the_id(),"999");

			?>

				<div class="searchresultBox">
					<div class="searchResultTitle">
						<div style="float:left;">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="star" style="float:right; margin-top:5px;"><div class="star_w2" style="width:<?php echo $starComputeFinal->overAllRatings; ?>%;">&nbsp;</div></div>
						<br clear="all" />
					</div>
					<div>
						<span class="showreview arrow_go">Show Reviews</span><span class="showmap globe_go" addresslocation="<?php echo urlencode($otherInfoData->location_address); ?>"><a class="fancybox fancybox.iframe" href="http://www.pinoydestination.com/gmap.php?address=<?php echo urlencode($otherInfoData->location_address); ?>&zoom=13">Reveal in Map</a></span>
					</div>
					<div class="searchResultDetails">
						<?php
						$showmore=false;
						$x=1;
						foreach($imageListing as $img){
							if($x<=10){
						?>

						<a data-fancybox-group="gallery<?php echo get_the_ID(); ?>" href="/uploads/destinations/<?php echo $img->original; ?>" class="imageset fancybox">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/gray.jpg" data-original="/uploads/thumbs/<?php echo $img->original; ?>" border="0" />
							</a>
						
						<?php 
								$x++;
							}else{
								$showmore = true;
							} 
						}

						if($showmore){
						?>
						<a href="<?php the_permalink();?>?gallery=show" class="catviewgallery">View Gallery</a>
						<?php
						}

						?>
					</div>
					<div class="locationaddress">
						 <?php if(isset($otherInfoData->location_address) && trim($otherInfoData->location_address) !== NULL){ ?>
							<span><?php echo $otherInfoData->location_address; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->contact_number) && $otherInfoData->contact_number != ""){?>
							<span><?php echo $otherInfoData->contact_number; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->email) && $otherInfoData->email != ""){?>
							<span><?php echo $otherInfoData->email; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->website) && $otherInfoData->website != ""){?>
							<span><a href="/external/<?php echo urldecode($otherInfoData->website); ?>"><?php echo $otherInfoData->website; ?></a></span>
						 <?php } ?>
					</div>
				</div>

			<?php 
			endwhile; 
			else: ?>
			No result found
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
