<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/post.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/page.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>

<?php
/**
 * Get page parent
 */
 
 $parent_title = get_the_title($post->post_parent);

?>


				<div class="mainbodycontent" id="mainDocument">
					<div class="left" id="leftSidePanel">
						
						
						
						<div class="postBread">
								<a href="#">Home</a> > <a href="/<?php echo strtolower($parent_title); ?>/"><?php echo $parent_title; ?></a>
						</div>
						<div class="postTitle">
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
						<div class="homepageshadow">&nbsp;</div>
						
						
						<div class="wpPageContent">
							<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
							<?php endwhile; // end of the loop. ?>
						</div>
						
						
					</div>
					<?php get_sidebar(); ?>
					<br clear="all" />
				</div>
				
<?php get_footer(); ?>
