<?php global $currentIsland; ?>
<div class="right" id="sidebarPanel">
	<?php
	if(is_category()){
		include("sidebarboxad.php");
		echo '<div class="whitespace">&nbsp;</div>';
	}	
	if(is_home()){
		include("festival_calendar.php");
		include("sidebarboxad.php");
		echo '<div class="whitespace">&nbsp;</div>';
	}
	if(is_page()){
		include("sidebar_page.php"); 
	}
	?>
	<?php include("sidetrip_sidebar.php"); ?>
	<?php include("the_map.php"); ?>
	<div class="whitespace">&nbsp;</div>
	<?php /*include("weather_sidebar.php");*/ ?>
	<?php include("sidebarboxad.php");	?>
</div>