<?php session_start(); 
global $category_base;
$ad = adListener($_SERVER);
if(trim($ad) == "ad"){
	echo getHtml();
	die();
}

include_once("images.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		
		<?php
		if(!is_category()){
		?>
		<title>Pinoy Destination - Explore Philippines, Travel Philippines! | Tourist Spots, Destinations, Beach, Resorts, Restaurants</title>
		<?php
		}else{
			$cat = get_query_var('cat');
			$yourcat = get_category ($cat);
			$idObj = get_category_by_slug($yourcat->slug);
			$catname = titleMaker($idObj,$_GET['cat']);
		?>
			<title><?php echo $catname; ?> | Pinoy Destination - Explore Philippines, Travel Philippines! | Tourist Spots, Destinations, Beach, Resorts, Restaurants</title>
		<?php
		}
		?>
		
		<?php include("meta.php"); ?>
		
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php if(is_single()){ ?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/post.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php } ?>
		
		<?php if(is_category() || is_tag()){ ?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/category.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<?php } ?>
		
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css_destinations/<?php echo backgroundStyle(); ?>" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js" type="text/javascript"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/menu.js" type="text/javascript"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/chocolate.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/ease.js"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/myriad-pro.cufonfonts.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/myriad.js"></script> 
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/scrolltotop.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/ui.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/scrollto.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/mousewheel.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-thumbs.js"></script>
		
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/jquery.fancybox.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<?php
		if(is_home()){
			?>
			<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/slides.min.jquery.js"></script>
			<script>
				$(function(){
	                $("#heroshot").slides({
	                	preload: true,
        				preloadImage: '/images/loader-hero.jpg',
	                	container: 'heroshot_container',
	                	play: 8000,
	                	effect: 'slide, fade',
	                	autoHeight: true,
	                	slideEasing: "easeOutQuad"
	                });
	            });
			</script>
			<?php
		}
		?>
		
		<script>
		$(document).ready(function() {
			$('.fancybox').fancybox();
			
			$(window).scroll(function(){
				//var scrollAmount = ($(window).scrollTop());
				//$(".firstBackground").css('background-position', "center "+(scrollAmount/1.8)+"px");
			});
			
			var isInIframe = (window.location != window.parent.location) ? true : false;
			
			if( isInIframe ){
				$(window).stop().scrollTo( {top:'400px',left:'642px'}, 1000 );
				$("#topcontrol").hide();
			}
			
		});
		</script>
		
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/lazyload.js"></script>
		<script>
		$(document).ready(function() {
			$("img").lazyload({ 
				threshold : 200,
				effect : "fadeIn"
			});
		});
		</script>
		
		<?php if(isset($_SESSION['myItinerary']) && $_SESSION['myItinerary'] != ""){ ?>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/itinerary.css" type="text/css" media="all" title="Itinerary Style" charset="utf-8"/>
		<?php } ?>
		
		
		<?php
		if(is_search()){
		?>
			<!-- Put the following javascript before the closing </head> tag. -->
			<script>
			  (function() {
				var cx = '002465766118692481817:ap6gu8gmyfi';
				var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
				gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
					'//www.google.com/cse/cse.js?cx=' + cx;
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
			  })();
			</script>
		<?php
		}
		
		
		include("analytics.php");
		?>
		
</head>
	<body>
		
		<div class="firstBackground">
			<?php /*include("sideads.php");*/ ?>
			<div class="container960">
				<div class="menucontainer">
					<div class="menu curveleft noleftmargin">
						<ul class="menulinks">
							<li class="haschild"><a href="<?php echo $category_base;?>/philippines?cat=restaurant">Restaurants</a>
								<ul>
									<?php
										$menu = getMenu( "restaurant" );
										foreach($menu as $m){
										?>
											<li><a href="<?php echo $category_base."/philippines/".$m->parent_slug."/".$m->slug; ?>"><?php echo $m->category_location; ?></a></li>
										<?php
										}
									?>
								</ul>
							</li>
							<li class="haschild"><a href="<?php echo $category_base;?>/philippines?cat=hotel">Hotels</a>
								<ul>
									<?php
										$menu = getMenu( "hotel" );
										foreach($menu as $m){
										?>
											<li><a href="<?php echo $category_base."/philippines/".$m->parent_slug."/".$m->slug; ?>"><?php echo $m->category_location; ?></a></li>
										<?php
										}
									?>
								</ul>
							</li>
							<li class="haschild"><a href="<?php echo $category_base;?>/philippines?cat=destination">Destinations</a>
								<ul>
									<?php
										$menu = getMenu( "destination" );
										foreach($menu as $m){
										?>
											<li><a href="<?php echo $category_base."/philippines/".$m->parent_slug."/".$m->slug; ?>"><?php echo $m->category_location; ?></a></li>
										<?php
										}
									?>
								</ul>
							</li>
							<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
							<li class="weathercentralhead"><a href="javascript:;"><span id="weatherdegrees"></span></a></li>
						</ul>
					</div>
					<div class="logo">
						<a href="<?php bloginfo("url"); ?>" title="Pinoy Destination Home">
						<img src="<?php echo $logo;?>" border="0" alt="Pinoy Destination | Philippine Tourism, Travel Philippines" border="0" />
						</a>
					</div>
					<div class="menu curveright norightmargin">
						<ul class="menulinks floatleft">
							<li class="tobehide"><a href="/company/suggest-destination">Suggest Destinations</a></li>
							<li class="tobehide"><a href="<?php bloginfo('url'); ?>/vacation/blog">Blog</a></li>
							<li class="tobehide"><a href="#" id="showmyitinerary">My Itinerary</a></li>
							
							<li class="floatright" style="float:right !important; display:inline-block;">
								<img id="searchbutton" src="<?php bloginfo("stylesheet_directory"); ?>/images/searchicon.jpg" title="Search Here!" alt="search" border="0" />
							</li>
							<br clear="all" />
						</ul>
						<div class="searchframe" id="searchframe">
							<form action="/off-page/search.php" id="cse-search-box">
							  <div>
								<input type="hidden" name="cx" value="partner-pub-0908617034545427:2131955478" />
								<input type="hidden" name="cof" value="FORID:10" />
								<input type="hidden" name="ie" value="UTF-8" />
								<input type="text" name="q" size="55" />
								<input type="submit" name="sa" value="Search" />
							  </div>
							</form>

							<script type="text/javascript" src="http://www.google.com.ph/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>

						</div>
						
						<div class="itihead" id="itihead">
							<h1>My Itinerary</h1> <a href="javascript:;" class="removeallitinerary">Remove All</a><a href="/off-page/showinmap.php" class="showinmap fancybox fancybox.iframe">Show Route Map</a>
							<br clear="all" />
							<div class="itiheadcontents">
								<ol id="olListIti">
								<?php
								if(isset($_SESSION['myItinerary']) && $_SESSION['myItinerary'] != ""){
									$locationAddressString = "";
									foreach($_SESSION['myItinerary'] as $iti){
										if($locationAddressString == ""){
											$locationAddressString = $iti['location_address'];
										}else{
											$locationAddressString .= "|".$iti['location_address'];
										}
										?>
										<li>
											<span class="xicon">&times;</span>
											<a href="<?php echo $iti["location_url"]	; ?>"><?php echo $iti['location_title']; ?></a>
											<span class="itilocationaddress">
												<?php echo $iti['location_address']; ?>
											</span>
										</li>
										<?php
									}
								}
								?>
								</ol>
							</div>
						</div>
						<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/itinerary.css" type="text/css" media="all" title="Itinerary Style" charset="utf-8"/>
					</div>
					<br clear="all" />
				</div>
				
				<div class="cut"></div>
				