<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/404.css" type="text/css" />

<div class="mainbodycontent style404">

	<h1 class="notfound">Not Found</h1>
	<p>
		Sorry, the page you are trying to view is not found.
	</p>
	<p>
		<small>You can explore our site by clicking the links below:</small>
	</p>
	
	<?php include("footerlinks.php"); ?>
	
	<div class="404search" style="margin-top:10px 0px; padding:10px; display:block; text-align:center;">
		<form method="get" action="<?php bloginfo('url'); ?>">
			<input type="text" name="s" placeholder="Search Here!" style="border-radius:4px; width:400px; padding:10px; border:1px solid #ACA899; border-bottom:3px solid #ACA899; margin:50px 0px;" />
		</form>
	</div>
	
	<br clear="all" />
</div>
<?php get_footer(); ?>