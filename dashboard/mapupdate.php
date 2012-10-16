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

if($_POST){
	$result = updateOtherInfo($_POST);
	
	if(trim($result) >= 1){
		?>
		<h1>Saving Success.</h1>
		<script type="text/javascript">
                // Reload the parent window
                window.top.location.href = window.top.location.href;
        </script>
		<?php
		die();
	}else{
		?>
		<h1>An error occured. Please try again.</h1>
		<?php
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Dashboard</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<style>
		body{
			margin:0;
			padding:0;
		}
		.savediv{
			padding:10px 20px;
		}
		</style>
</head>
	<body>
		
		<div>
		<iframe src="/googlemap/gmapdrag.php?address=<?php echo $_GET['address']; ?>&zoom=13" width="100%" height="480"  frameborder="0" ></iframe><noscript>iFrame Needed to be able to view the map</noscript>
		</div>
		<div class="savediv">
			<form method="post">
				<input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>" />
				<input type="text" class="simpleText" placeholder="Google Map Coordinate" name="coordinates" id="coordinates" />
				<input type="text" class="simpleText" placeholder="Google Map Coordinate" name="zoomlevel" id="zoomlevel" />
				<input type="submit" value="Save" />
			</form>
		</div>
	</body>
</html>