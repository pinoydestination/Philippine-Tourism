<!DOCTYPE HTML>
<html>
<head>
	<title>Pinoy Destination</title>
	<style>
		html,body{
			margin:0;
			padding:0;
		}
	</style>
</head>
<body>
<?php
$type = $_REQUEST['type'];

switch($type){
	case "300x250":
		?>
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-8693059329031559";
		/* 300x20Ad */
		google_ad_slot = "3940716627";
		google_ad_width = 300;
		google_ad_height = 250;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		<?php
	break;
	case "468x60":
		?>
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-8693059329031559";
		/* 468x60Ad */
		google_ad_slot = "5417449829";
		google_ad_width = 468;
		google_ad_height = 60;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		<?php
	break;
	case "160x600":
		?>
		<script type="text/javascript"><!--
		google_ad_client = "ca-pub-8693059329031559";
		/* 160x600Ad */
		google_ad_slot = "6894183025";
		google_ad_width = 160;
		google_ad_height = 600;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		<?php
	break;
	
	case "others":
		?>
		<iframe scrolling="no" width="300" height="250" frameborder="0" style="width:300px; height:250px;" src="http://www.pinoydestination.com/"></iframe>
		<?php
	break;
	
	
	default:
		?>
		<iframe scrolling="no" width="300" height="250" frameborder="0" style="width:300px; height:250px;" src="http://www.pinoydestination.com/current/adsense_ad.php?type=others"></iframe>
		<?php
	break;
}

?>
</body>
</html>