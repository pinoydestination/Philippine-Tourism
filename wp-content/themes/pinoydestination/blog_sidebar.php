<div class="adright">
	<?php include("sidebarboxad.php"); ?>
</div>
<div class="largebox">
	<span class="myriad_pro_bold_condensed sidebarheader">Recent Blog Posts</span>
	
	<ul class="blogtitlelist">
		<?php
		global $currentcatID;
		wp_reset_query();
		$the_query = new WP_Query( array('category__in' => $currentcatID, "posts_per_page"=>10) );
		if ( $the_query->have_posts() ) : 
			while ($the_query->have_posts() ) : $the_query->the_post();
			?>
			<li>
				<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
				<span>Posted on <?php echo the_date(); ?> by <?php echo the_author(); ?></span>
			</li>
			<?php
			endwhile;
		else:
		endif;
		?>
	</ul>
	
</div>
<div class="largebox">
<?php include("sidetrip_sidebar.php"); ?>
</div>