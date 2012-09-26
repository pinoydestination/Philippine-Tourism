<?php
require( '../wp-load.php' );
get_header();
?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
	
		<div class="searchcontainerboxbody">
			<form method="get" action="/off-page/search.php">
				<input type="hidden" name="cx" value="partner-pub-0908617034545427:2131955478" />
				<input type="hidden" name="cof" value="FORID:10" />
				<input type="hidden" name="ie" value="UTF-8" />
				<input class="searchrequesttextbox" type="text" name="q" value="<?php echo $_REQUEST['s']; ?>" placeholder="Place your search here" />
				<input type="submit" value="Search" name="sa" class="searchbuttonsearchpage" />
			</form>
		</div>
		
		<div id="cse-search-results"></div>
		<script type="text/javascript">
		  var googleSearchIframeName = "cse-search-results";
		  var googleSearchFormName = "cse-search-box";
		  var googleSearchFrameWidth = 950;
		  var googleSearchDomain = "www.google.com.ph";
		  var googleSearchPath = "/cse";
		</script>
		<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
		
		<script type="text/javascript" src="http://www.google.com/cse/query_renderer.js"></script>
<div id="queries"></div>
<script src="http://www.google.com/cse/api/partner-pub-0908617034545427/cse/2131955478/queries/js?oe=UTF-8&amp;callback=(new+PopularQueryRenderer(document.getElementById(%22queries%22))).render"></script>

		
						
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
