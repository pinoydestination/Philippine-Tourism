<?php
wp_reset_query();
$cat = get_query_var('cat');
$yourcat = get_category ($cat);
global $currentcatID;
$currentcatID = $yourcat->term_id;

$currentPage = get_query_var('paged');
$the_query = new WP_Query( array("category__in" => $yourcat->term_id, "paged"=>$currentPage) );

?>
<h1 class="vacationblog">Pinoy Destination: Vacation Blog</h1>
<?php

if ( $the_query->have_posts() ) : 
	PinoyPagination($the_query);
	
	while ($the_query->have_posts() ) : $the_query->the_post();
	?>
	
	<div class="blogpostcatcontainer">
		<div class="blogpostcontenttitle">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<span>Posted by <?php the_author(); ?> on <?php the_date(); ?></span>
		</div>
		<p>
		<?php the_excerpt(); ?>
		</p>
		<p class="readmore">
			<a href="<?php echo the_permalink(); ?>">Read More</a>
		</p>
	</div>
	
	<?php
	endwhile;

	PinoyPagination($the_query);

else:
	echo "<h1>Sorry, no post found under this category.</h1>";
endif;
?>