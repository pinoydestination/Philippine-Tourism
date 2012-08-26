<?php
include("../wp-load.php");
if ( !is_user_logged_in() ) {
    header("Location: /dashboard/login.php"); exit();
}
include("dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);
$userPosts = $dashboard->getUserPosts();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>My Articles</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
</head>
	<body>
		<div class="logohead"><img src="logoTop.png" border="0" /></div>
		<div class="centerStage">
			<div class="sideBar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="mainStage">
				<h1 class="h1Main">My Article</h1>
				<div class="articleMenu">
					<a href="articles.php"><span class="iconAddPost">&nbsp;</span>View All Articles</a> |
					<a href="add-new.php"><span class="iconAddPost">&nbsp;</span>Add New Article</a>
				</div>
				<div>
					
				</div>
			</div>
			<br clear="all" />
		</div>
	</body>
</html>