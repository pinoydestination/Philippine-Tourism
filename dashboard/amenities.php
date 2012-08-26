<?php
include("../wp-load.php");

if ( !is_user_logged_in() ) {
    header("Location: /"); exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>List of Amenities</title>
		<link rel="stylesheet" href="login.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<script type="text/javascript" src="ajaxcontroller.js"></script>
</head>
	<body>
		<div class="loginContainer">
			<h1>List of Amenities</h1>
				<p class="login-username">
					<input type="text" placeholder="Add Here" id="amenity" /> 
				</p>
				<p>
				<input id="addamenity" type="submit" value="Add it!" />
				</p>
				<div id="amenitiesListing">
					<ol id="amlist"></ol>
				</div>
		</div>
	</body>
</html>
