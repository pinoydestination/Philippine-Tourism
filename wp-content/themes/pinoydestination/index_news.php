<ul class="commentlistul">
<?php
global $currentcatID;
$cat = searchCatInfoBySlug("travel-news");
$newID = Array();
if(is_array($cat)){
	foreach($cat as $currentCatInfo){
		$newID[$currentCatInfo->term_id] = $currentCatInfo->term_id;
	}
}
wp_reset_query();
$the_query = new WP_Query( array('category__in' => $newID, "posts_per_page"=>5) );
if ( $the_query->have_posts() ) : 
	while ($the_query->have_posts() ) : $the_query->the_post();
	?>
	<li>
		<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
		<span class="indexnewspan">by <?php the_author(); ?></span>
		<?php the_excerpt(); ?>
	</li>
	<?php
	endwhile;
else:
endif;
?>
</ul>
