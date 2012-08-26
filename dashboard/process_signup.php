<?php
	$post = $_REQUEST;
	$pass = $post['password1'];
	$user_name = $post['username'];
	$user_email = $post['email'];
	
	$user_id = username_exists( $user_name );
	if ( !$user_id ) {
		$user_id = wp_create_user( $user_name, ($pass), $user_email );
		wp_set_password( ($pass), $user_id );
		echo "Account successfully created. <a href=\"login.php\">Please login here</a>";
	} else {
		echo 'User already exists. Please try again';
		include("loginpage.php");
	}
?>