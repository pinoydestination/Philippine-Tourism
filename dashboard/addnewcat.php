<?php
include("../wp-load.php");
include("dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);
$new_cat_id = wp_insert_term($_GET['eventTitle'], "category", array('parent' => $_GET['newparentcat']));
if(isset($new_cat_id['term_id'])){
echo $new_cat_id['term_id'];
}else{
echo "error";
}
?>