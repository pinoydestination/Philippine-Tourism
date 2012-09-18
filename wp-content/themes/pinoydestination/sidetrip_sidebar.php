<?php
wp_reset_query();
global $parentCat;
global $finalCat;
global $arrCatIsland;
global $globalCatType;
global $selectedCat;
global $yourcat;
global $arrCatAll;
global $arrCatType;

$categories = get_the_category();

$cat = get_query_var('cat');
$yourcat = get_category($cat);
$idObj = get_category_by_slug($yourcat->slug);
$catname = titleMaker($idObj,$_GET['cat']);

foreach($categories as $category){
	if(is_single()){
		if(!in_array($category->name,$arrCatAll)){
			$location_name = $category->name;
			$term_id[$category->term_id] = $category->term_id;
		}
		if("blog" == strtolower($category->name) || "travel-news" == strtolower($category->slug)){
			$idObj = get_category_by_slug("philippines");
			$term_id[$category->term_id] = $idObj->term_id;
			$catname = "Philippines";
		}
	}else if(is_category()){
		if($selectedCat == $category->name){
			$location_name = $selectedCat;
			$term_id[$category->term_id] = $category->term_id;
		}
		if("blog" == strtolower($category->name) || "travel-news" == strtolower($category->slug)){
			$idObj = get_category_by_slug("philippines");
			$term_id[$category->term_id] = $idObj->term_id;
			$catname = "Philippines";
		}
	}else{
		$idObj = get_category_by_slug("philippines");
		$term_id[$category->term_id] = $idObj->term_id;
	}
}

$the_query = new WP_Query( array("category__in" => $term_id, "posts_per_page"=>8) );
?>
<span class="myriad_pro_bold_condensed sidebarheader"><?php echo $catname; ?></span>
<div class="sidetrip">
<?php
if ( $the_query->have_posts() ) : 
while ($the_query->have_posts() ) : $the_query->the_post();
	$postOtherInfo = getOtherInfo(get_the_id());
	$postRating = getPostRatings(get_the_id());
	$postImage = getImage(get_the_id(),1);
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
else:
	echo "No Result Found for this Category";
endif;
?>
</div>