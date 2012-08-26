<?php
include("../wp-load.php");

if ( is_user_logged_in() ) {
    header("Location: /dashboard/"); exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Dashboard</title>
		<link rel="stylesheet" href="login.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<script type="text/javascript" src="/wp-admin/js/password-strength-meter.js"></script>
		<script type="text/javascript" src="script.js"></script>
</head>
	<body>
		<div class="logohead" style="width:538px; margin:0 auto;"><img src="logoTop.png" border="0" /></div>
		<div class="loginContainer">
			<h1>Log-in</h1>
			<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
			
				<p class="login-username">
					<input type="text" placeholder="Username" name="log" id="user_login" class="input" value="" size="20" tabindex="10" />
				</p>
				<p class="login-password">
					<input type="password" placeholder="Password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" />
				</p>
				
				<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p>
				<p class="login-submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In" tabindex="100" />
					<input type="hidden" name="redirect_to" value="<?php bloginfo('url'); ?>/wp-admin/" />
				</p>
				
			</form>
		</div>
	</body>
</html>
