<?php
session_start();
if(isset($_GET['logout']) && $_GET['logout']=="true"){
	unset($_SESSION);
	session_destroy();
}
session_start();
include("../wp-load.php");
get_header();
?>
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/wather.css" />
<div class="mainbodycontent">
	<div class="weathercontainer">
		<div class="floatweather center">
			<h1>35&deg;</h1>
			<span class="cond">Light Rain</span>
		</div>
		<div class="floatweather details">
			<span class="locationid">Manila, Philippines</span>
			<span class="sundial">SUNRISE: 6:00 AM</span>
			<span class="sundial">SUNRISE: 6:00 PM</span>
		</div>
		<br clear="all" />
	</div>
</div>
<?php
get_footer();
?>