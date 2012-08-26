<?php
/** Sets up the WordPress Environment. */
require( '../wp-load.php' );
if ( !is_user_logged_in() ) {
    header("Location: /login/"); exit();
}
$current_role = $current_user->role[0];
switch($current_role){
	case "subscriber":
			header("Location: /profile/view-profile/"); exit();
		break;
	case "contributor":
			header("Location: /dashboard/"); exit();
		break;
	default:
			header("Location: /wp-admin/"); exit();
		break;
}
?>