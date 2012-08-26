<div class="right" id="sidebarPanel">
	<?php 
	if(is_home()){
		include("festival_calendar.php"); 
	}
	
	if(is_page()){
		include("sidebar_page.php"); 
	}
	
	?>
	<?php include("sidetrip_sidebar.php"); ?>
	<?php include("the_map.php"); ?>
	
	<?php /*include("weather_sidebar.php");*/ ?>
</div>