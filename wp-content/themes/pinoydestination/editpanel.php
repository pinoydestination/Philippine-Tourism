<?php
	global $current_user;
	$currentID = $current_user->ID;
	if( $currentID > 0 ){
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo("stylesheet_directory"); ?>/editpanel.css" />
<div class="editpanel">
	<ul>
		<li class="floatright">Hello, <?php echo $current_user->display_name; ?></li>
		<li><a href="/dashboard/">Dashboard</a></li>
		<br clear="all" />
	</ul>
	<?php 
	?>
</div>
<?php
}
?>