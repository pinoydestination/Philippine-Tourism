<?php
include("../../wp-load.php");
include("../dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix);
$req = $_REQUEST;
echo $event = $dashboard->addCalendarEvent($req);
?>