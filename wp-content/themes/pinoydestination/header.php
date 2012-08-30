<?php session_start(); 
global $category_base;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Pinoy Destination - Experience Philippines - Travel. Destinations. Adventures. 100% Pinoy.</title>
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php if(is_single()){ ?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/post.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php } ?>
		
		<?php if(is_category()){ ?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/category.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php } ?>
		
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/borabeach.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js" type="text/javascript"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/menu.js" type="text/javascript"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/chocolate.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/ease.js"></script>
		<script src="<?php bloginfo("stylesheet_directory"); ?>/js/myriad-pro.cufonfonts.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/myriad.js"></script> 
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/scrolltotop.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/ui.js"></script>
		<?php
		if(!is_home()){
		?>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/mousewheel.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-thumbs.js"></script>
		
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/jquery.fancybox.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/fancyboxjs/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<script>
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
		</script>
		
		<?php
		}
		?>
		
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
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/itinerary.css" type="text/css" media="all" title="Itinerary Style" charset="utf-8"/>
		<?php } ?>
		
</head>
	<body>
		<div class="firstBackground">
			<div class="container960">
				<div class="menucontainer">
					<div class="menu curveleft noleftmargin">
						<ul class="menulinks">
							<li class="haschild"><a href="/landing/restaurant">Restaurants</a>
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
							<li class="haschild"><a href="/landing/hotel">Hotels</a>
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
							<li class="haschild"><a href="/landing/destination">Destinations</a>
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
						<img src="<?php bloginfo("stylesheet_directory"); ?>/images/mainlogo.png" border="0" alt="Pinoy Destination" />
					</div>
					<div class="menu curveright norightmargin">
						<ul class="menulinks floatleft">
							<li class="tobehide"><a href="#">Plan Your Visit</a></li>
							<li class="tobehide"><a href="<?php bloginfo('url'); ?>/vacation/blog">Blog</a></li>
							<li class="tobehide"><a href="#" id="showmyitinerary">My Itinerary</a></li>
							
							<li class="floatright" style="float:right !important; display:inline-block;">
								<img id="searchbutton" src="<?php bloginfo("stylesheet_directory"); ?>/images/searchicon.jpg" title="Search Here!" alt="search" border="0" />
							</li>
							<br clear="all" />
						</ul>
						<div class="searchframe" id="searchframe">
							<input type="text" name="s" placeholder="What are you looking for?" />
						</div>
						
						<div class="itihead" id="itihead">
							<h1>My Itinerary</h1> <a href="javascript:;" class="removeallitinerary">Remove All</a><a href="javascript:;" class="showinmap fancybox fancybox.iframe">Show Route Map</a>
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
											<a href=""><?php echo $iti['location_title']; ?></a>
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
						<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/itinerary.css" type="text/css" media="all" title="Itinerary Style" charset="utf-8"/>
					</div>
					<br clear="all" />
				</div>
				
				<?php if(is_home()){ ?>
				<div class="billboardwindow">
					<span class="billboardNamePlace"></span>
				</div>
				<?php } ?>
				
				
				<div class="cut"></div>
				