<?php
include("../wp-load.php");
?>
<h1 class="titleHeader">Dashboard</h1>
<ul class="sidebaritems">
	<li><a href="articles.php"><span class="iconset iconFolder">&nbsp;</span>My Review Articles</a></li>
	<li><a href=""><span class="iconset iconProfile">&nbsp;</span>Profile Settings</a></li>
	<li><a href="<?php echo wp_logout_url( '/dashboard/login.php' ); ?>" title="Logout"><span class="iconLogout">&nbsp;</span>Logout</a></li>
</ul>