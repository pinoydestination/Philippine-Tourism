<?php get_header(); ?>
<div class="mainbodycontent">
	<div class="left">
		<div>
			<h1 class="categoryTitle">
			<?php
			printf( __( '%s', 'twentyeleven' ), '' . ucfirst(single_cat_title( '', false )) . '' );
			?>
			</h1>
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
