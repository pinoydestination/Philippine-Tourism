<?php
get_header();
global $globalCatType;
global $selectedCat;
global $parentCat;
global $yourcat;
$cat = get_query_var('cat');
$yourcat = get_category ($cat);
?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
	<div class="categoryleft">
		<?php include("category_leftbar.php"); ?>
	</div>
	
	<div class="categorycenter">
		<?php if($yourcat->slug != "blog" && $yourcat->slug != "travel-news"){ ?>
			<?php include("category_normal.php"); ?>
		<?php }else{ ?>
			<?php include("category_blog.php"); ?>
		<?php } ?>
	</div>
	
	<div class="categoryright">
		<?php if($yourcat->slug != "blog" && $yourcat->slug != "travel-news"){ ?>
			<?php get_sidebar(); ?>
		<?php }else{ ?>
			<?php include("blog_sidebar.php"); ?>
		<?php } ?>
	</div>	
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
