<?php
require( '../wp-load.php' );
get_header();
?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
	<div class="left" id="leftSidePanel searchPanel">

		<div id="cse" style="width: 100%;"><center><h1>Finding Search Results...</h1></center></div>
		<script src="//www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript"> 
		  google.load('search', '1', {language : 'en', style : google.loader.themes.SHINY});
		  google.setOnLoadCallback(function() {
			var customSearchOptions = {};  
			var customSearchControl = new google.search.CustomSearchControl(
			  '002465766118692481817:ap6gu8gmyfi', customSearchOptions);
			customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
			var options = new google.search.DrawOptions();
			options.enableSearchResultsOnly(); 
			customSearchControl.draw('cse', options);
			function parseParamsFromUrl() {
			  var params = {};
			  var parts = window.location.search.substr(1).split('\x26');
			  for (var i = 0; i < parts.length; i++) {
				var keyValuePair = parts[i].split('=');
				var key = decodeURIComponent(keyValuePair[0]);
				params[key] = keyValuePair[1] ?
					decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
					keyValuePair[1];
			  }
			  return params;
			}

			var urlParams = parseParamsFromUrl();
			var queryParamName = "s";
			if (urlParams[queryParamName]) {
			  customSearchControl.execute(urlParams[queryParamName]);
			}
		  }, true);
		</script>

		<style type="text/css">
		  .gsc-control-cse {
			font-family: Verdana, sans-serif;
			border-color: #DAE0E5;
			background-color: #DAE0E5;
		  }
		  .gsc-control-cse .gsc-table-result {
			font-family: Verdana, sans-serif;
		  }
		  .gsc-tabHeader.gsc-tabhInactive {
			border-color: #999999;
			background-color: #EEEEEE;
		  }
		  .gsc-tabHeader.gsc-tabhActive {
			border-color: #999999;
			background-color: #999999;
		  }
		  .gsc-tabsArea {
			border-color: #999999;
		  }
		  .gsc-webResult.gsc-result,
		  .gsc-results .gsc-imageResult {
			border-color: #FFFFFF;
			background-color: #FFFFFF;
		  }
		  .gsc-webResult.gsc-result:hover,
		  .gsc-imageResult:hover {
			border-color: #D2D6DC;
			background-color: #EDEDED;
		  }
		  .gsc-webResult.gsc-result.gsc-promotion:hover {
			border-color: #D2D6DC;
			background-color: #EDEDED;
		  }
		  .gs-webResult.gs-result a.gs-title:link,
		  .gs-webResult.gs-result a.gs-title:link b,
		  .gs-imageResult a.gs-title:link,
		  .gs-imageResult a.gs-title:link b {
			color: #0568CD;
		  }
		  .gs-webResult.gs-result a.gs-title:visited,
		  .gs-webResult.gs-result a.gs-title:visited b,
		  .gs-imageResult a.gs-title:visited,
		  .gs-imageResult a.gs-title:visited b {
			color: #0568CD;
		  }
		  .gs-webResult.gs-result a.gs-title:hover,
		  .gs-webResult.gs-result a.gs-title:hover b,
		  .gs-imageResult a.gs-title:hover,
		  .gs-imageResult a.gs-title:hover b {
			color: #0568CD;
		  }
		  .gs-webResult.gs-result a.gs-title:active,
		  .gs-webResult.gs-result a.gs-title:active b,
		  .gs-imageResult a.gs-title:active,
		  .gs-imageResult a.gs-title:active b {
			color: #0568CD;
		  }
		  .gsc-cursor-page {
			color: #0568CD;
		  }
		  a.gsc-trailing-more-results:link {
			color: #0568CD;
		  }
		  .gs-webResult .gs-snippet,
		  .gs-imageResult .gs-snippet,
		  .gs-fileFormatType {
			color: #5F6A73;
		  }
		  .gs-webResult div.gs-visibleUrl,
		  .gs-imageResult div.gs-visibleUrl {
			color: #5F6A73;
		  }
		  .gs-webResult div.gs-visibleUrl-short {
			color: #5F6A73;
		  }
		  .gs-webResult div.gs-visibleUrl-short {
			display: none;
		  }
		  .gs-webResult div.gs-visibleUrl-long {
			display: block;
		  }
		  .gs-promotion div.gs-visibleUrl-short {
			display: none;
		  }
		  .gs-promotion div.gs-visibleUrl-long {
			display: block;
		  }
		  .gsc-cursor-box {
			border-color: #FFFFFF;
		  }
		  .gsc-results .gsc-cursor-box .gsc-cursor-page {
			border-color: #999999;
			background-color: #FFFFFF;
			color: #0568CD;
		  }
		  .gsc-results .gsc-cursor-box .gsc-cursor-current-page {
			border-color: #999999;
			background-color: #999999;
			color: #0568CD;
		  }
		  .gsc-webResult.gsc-result.gsc-promotion {
			border-color: #D2D6DC;
			background-color: #D0D1D4;
		  }
		  .gsc-completion-title {
			color: #0568CD;
		  }
		  .gsc-completion-snippet {
			color: #5F6A73;
		  }
		  .gs-promotion a.gs-title:link,
		  .gs-promotion a.gs-title:link *,
		  .gs-promotion .gs-snippet a:link {
			color: #0066CC;
		  }
		  .gs-promotion a.gs-title:visited,
		  .gs-promotion a.gs-title:visited *,
		  .gs-promotion .gs-snippet a:visited {
			color: #0066CC;
		  }
		  .gs-promotion a.gs-title:hover,
		  .gs-promotion a.gs-title:hover *,
		  .gs-promotion .gs-snippet a:hover {
			color: #0066CC;
		  }
		  .gs-promotion a.gs-title:active,
		  .gs-promotion a.gs-title:active *,
		  .gs-promotion .gs-snippet a:active {
			color: #0066CC;
		  }
		  .gs-promotion .gs-snippet,
		  .gs-promotion .gs-title .gs-promotion-title-right,
		  .gs-promotion .gs-title .gs-promotion-title-right *  {
			color: #333333;
		  }
		  .gs-promotion .gs-visibleUrl,
		  .gs-promotion .gs-visibleUrl-short {
			color: #5F6A73;
		  }
		  .gsc-adBlock{
			display:none;
		  }
		  </style> 
		
	</div>
					
	<?php
					
	/**
	 * Sidebar
	 */
	get_sidebar();
	
	?>
					
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
