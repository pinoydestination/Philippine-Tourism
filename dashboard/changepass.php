<?php
include("../wp-load.php");
if ( is_user_logged_in() ) {
    header("Location: /dashboard/"); exit();
}
echo wp_hash_password("ishiefloyd");
?>