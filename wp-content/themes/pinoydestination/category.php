<?php
get_header();
global $globalCatType;
global $selectedCat;
global $parentCat;
global $yourcat;
?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
<?php
$cat = get_query_var('cat');
$yourcat = get_category ($cat);

if($yourcat->slug != "blog"){
?>
	<div class="left" id="leftSidePanel">
		<?php include("category_normal.php"); ?>
	</div>
					
	<?php			
	/**
	 * Sidebar
	 */
	get_sidebar();
	?>
<?php
}else{
	
?>
	<div class="blogleft">
		<?php include("category_blog.php"); ?>
	</div>
	<div class="blogright">
		<?php include("blog_sidebar.php"); ?>
	</div>
<?php
}
?>
					
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
