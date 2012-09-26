<div class="sidebarad300x250">
	<?php
	$servername = $_SERVER["SERVER_NAME"];
	if("www.pinoydestination.com" == $servername){
	/* <!-- Begin BidVertiser code -->
	<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=93354&bid=1212320" type="text/javascript"></SCRIPT>
	<noscript><a href="http://www.bidvertiser.com/bdv/BidVertiser/bdv_publisher.dbm" rel="nofollow">make money</a></noscript>
	<!-- End BidVertiser code --> */
	?>
	
	<iframe src="<?php bloginfo("url"); ?>/current/adsense_ad.php?type=300x250" scrolling="no" style="width:300px; height:250px;" frameborder="0" width="300" height="250"></iframe>
	
	<?php
	}else{
	?>
	<img src="/images/ads/300x250.gif" alt="ads not found" />
	<?php
	}
	?>
</div>
