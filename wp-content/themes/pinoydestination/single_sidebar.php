<?php
$additional = $GLOBALS['GoogleMap_Type'] != "" ? "&datatype=".$GLOBALS['GoogleMap_Type'] : ""; 
$zoomlevel  = $GLOBALS['GoogleMap_Zoom'] != "" ? ($GLOBALS['GoogleMap_Zoom']-1) : "13"; 
?>
<div class="right" id="sidebarPanel">
	<div id="postsidebarcontainer">
		<div class="sidebarmap">
			<span class="myriad_pro_bold_condensed sidebarheader" style="float:left;"><?php echo get_the_title(); ?> Map</span><a class="largermapbutton fancybox fancybox.iframe" rel="nofollow" href="/googlemap/gmap.php?address=<?php echo urldecode($GLOBALS['Current_Coordinates'].$additional); ?>&zoom=<?php echo $zoomlevel; ?>">ENLARGE MAP</a>
			<br clear="all" />
			<?php /*
			<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Philippines&amp;ie=UTF8&amp;hq=&amp;hnear=Philippines&amp;t=m&amp;ll=12.897489,121.816406&amp;spn=25.499947,26.279297&amp;z=4&amp;output=embed"></iframe>
			<iframe width="300" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.pinoydestination.com/gmap.php?address=<?php echo $GLOBALS['Current_Location']; ?>&zoom=13"></iframe>
			 * */ 
			?>
			<img class="staticgmap" width="300" height="400" border="0" src="/googlemap/gstatic.php?address=<?php echo $GLOBALS['Current_Coordinates'].$additional; ?>&zoom=<?php echo $zoomlevel; ?>&size=300x400" />
			<?php
			if ( is_user_logged_in() ) {
				?>
				<a href="/dashboard/mapupdate.php?post_id=<?php echo get_the_id(); ?>&address=<?php echo $GLOBALS['Current_Coordinates'].$additional; ?>&zoom=<?php echo $zoomlevel; ?>" class="admineditbutton fancybox fancybox.iframe">Re-Position Map</a>
				<?php
			}
			?>
		</div>
		<?php 
			include("sidebarboxad.php");
			echo '<div class="whitespace">&nbsp;</div>';
			include("sidetrip_sidebar.php");
			echo '<div class="whitespace">&nbsp;</div>';
			include("festival_calendar.php"); 
		?>
	</div>
</div>