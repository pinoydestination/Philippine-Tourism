<?php
wp_reset_query();
$cat = get_query_var('cat');
$yourcat = get_category ($cat);
global $currentcatID;
$currentcatID = $yourcat->term_id;

$currentPage = get_query_var('paged');
$the_query = new WP_Query( array("category__in" => $yourcat->term_id, "paged"=>$currentPage) );
if ( $the_query->have_posts() ) : 
	while ($the_query->have_posts() ) : $the_query->the_post();
	?>
	
	<div class="blogpostcatcontainer">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<p>
		<?php the_excerpt(); ?>
		</p>
	</div>
	
	<?php
	endwhile;

	PinoyPagination($the_query);

else:
	echo "<h1>Sorry, no post found under this category.</h1>";
endif;
?>