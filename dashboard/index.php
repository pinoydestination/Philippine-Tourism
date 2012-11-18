<?php
include("../wp-load.php");
if ( !is_user_logged_in() ) {
    header("Location: /dashboard/login.php"); exit();
}
$userRole = $current_user->roles[0];
if("subscriber" == $userRole){
	//wp_die("<p align='center'>Sorry, but you are not allowed to access this page.</p>");
	header("Location: /"); exit();
}
include("dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);

$userPosts = $dashboard->getUserPosts(0,5,$current_page,"DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Dashboard</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		
</head>
	<body>
		<div class="logohead"><img src="logoTop.png" border="0" /></div>
		<div class="centerStage">
			<div class="sideBar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="mainStage">
				<div class="mainstageStyle borderbottomstyle">
					<span class="arialnarrow"><?php echo $userPosts['total']; ?></span> articles
				</div>
			</div>
			<br clear="all" />
		</div>
	</body>
</html>