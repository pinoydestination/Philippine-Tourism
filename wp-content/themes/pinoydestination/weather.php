<?php
header("Content-type: text/plain; charset=UTF-8");
$file = file_get_contents("http://services.pinoydestination.com/weather/?loc=".$_GET['loc']);
echo($file);
?>