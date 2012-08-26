<?php
function restrict_admin_with_redirect() {
	if (!current_user_can('manage_options') && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php') {
	wp_redirect("/dashboard/" ); exit;
  }
}

add_action('admin_init', 'restrict_admin_with_redirect');
?>