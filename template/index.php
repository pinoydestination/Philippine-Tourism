<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Pinoy Destination - Experience Philippines - Travel. Destinations. Adventures. 100% Pinoy.</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="palawan.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/menu.js" type="text/javascript"></script>
		<script src="js/chocolate.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/ease.js"></script>
		<script src="js/myriad-pro.cufonfonts.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/myriad.js"></script> 
		<script type="text/javascript" src="js/scrolltotop.js"></script>
</head>
	<body>
		<div class="firstBackground">
			<div class="container960">
				<div class="menucontainer">
					<div class="menu curveleft noleftmargin">
						<ul class="menulinks">
							<li><a href="#">Blog</a></li>
							<li class="haschild"><a href="#">Restaurants</a>
								<ul>
									<li><a href="#">Baguio</a></li>
									<li><a href="#">Manila</a></li>
									<li><a href="#">Cebu</a></li>
									<li><a href="#">Davao</a></li>
									<li><a href="#">Luzon</a></li>
									<li><a href="#">Visayas</a></li>
									<li><a href="#">Mindanao</a></li>
								</ul>
							</li>
							<li class="haschild"><a href="#">Hotels</a>
								<ul>
									<li><a href="#">Baguio</a></li>
									<li><a href="#">Manila</a></li>
									<li><a href="#">Cebu</a></li>
									<li><a href="#">Davao</a></li>
									<li><a href="#">Luzon</a></li>
									<li><a href="#">Visayas</a></li>
									<li><a href="#">Mindanao</a></li>
								</ul>
							</li>
							<li class="haschild"><a href="#">Destinations</a>
								<ul>
									<li><a href="#">Baguio</a></li>
									<li><a href="#">Boracay</a></li>
									<li><a href="#">Bohol</a></li>
									<li><a href="#">Manila</a></li>
									<li><a href="#">Luzon</a></li>
									<li><a href="#">Visayas</a></li>
									<li><a href="#">Mindanao</a></li>
								</ul>
							</li>
							<li><a href="#">Home</a></li>
						</ul>
					</div>
					<div class="logo">
						<img src="images/mainlogo.png" border="0" alt="Pinoy Destination" />
					</div>
					<div class="menu curveright norightmargin">
						<ul class="menulinks floatright">
							<li><a href="#">Plan Your Visit</a></li>
							<li><a href="#">Submit a Review</a></li>
							<li><a href="#">Contacts</a></li>
							<li class="floatright" style="float:right !important; display:inline-block;"><img id="searchbutton" src="images/searchicon.jpg" title="Search Here!" alt="search" border="0" /></li>
						</ul>
						<div class="searchframe" id="searchframe">
							<input type="text"name="s" placeholder="What are you looking for?" />
						</div>
					</div>
					<br clear="all" />
				</div>
				
				
				<div class="billboardwindow">
					<span class="billboardNamePlace"></span>
				</div>
				
				
				<div class="cut"></div>
				<div class="mainbodycontent">
					<div class="left">
						<div class="mabuhay">
							<p class="myriad_pro_bold_condensed"><span class="mabuhaylarge">Mabuhay!</span> Welcome to the <strong class="ph">Philippines</strong>
							- the home of beautiful <strong class="beaches">beaches</strong>, a unique <strong class="island">thousand islands</strong> and exciting <strong class="orange">pinoy destinations</strong>.
							</p><br />
							<p class='regular myriad_pro_regular'>
								Philippines is one of the country in the world that surrounded by waters. That’s why the Philippines has the most wonderful beaches around the world. The tropical climate blends perfectly for a most memorable experience. So, come and visit Philippines!
							</p>
						</div>
						<div class="homelistcontainer firstlist">
							<h1 class="myriad_pro_bold_condensed">Experience Philippines</h1>
							
							<div class="tabcontainer">
								<?php
								$style="";
								for($y=0;$y<=3;$y++) { 
									if($y==3){
										$style = "norightmargin";
									}	
								?>
								<div class="homepagetilecontainergreen <?php echo $style; ?>">
									<img src="images/homepage/beach.jpg" border="0" />
									<span>Beaches and Resorts</span>
								</div>
								<?php } ?>
								<br clear="all" />
							</div>
							<div class="homepageshadow">&nbsp;</div>
						</div>
						<div class="homelistcontainer">
							<h1 class="myriad_pro_bold_condensed">Where to Stay</h1>
							<div class="newloationcontainer">
								<?php
								$style="";
								for($y=0;$y<=3;$y++) { 
									if($y==3){
										$style = "norightmargin";
									}	
								?>
								<div class="homepagetilecontainer <?php echo $style; ?>">
								</div>
								<?php } ?>
								<br clear="all" />
							</div>
							
						</div>
						
						<div class="homepageothers">
							<div class="homepageothersleft">
								<h1 class="myriad_pro_bold_condensed">Recent Reviews</h1>
							</div>
							
							<div class="homepageothersleft norightmargin">
								<h1 class="myriad_pro_bold_condensed">Tourism News
									
									</h1>
							</div>
							<br clear="all" />
						</div>
						
					</div>
					<div class="right">
						<span class="myriad_pro_bold_condensed sidebarheader">Philippine Festival</span>
						<div class="calendar">
							<div class="calendarbg">
								<span class="month myriad_pro_bold_condensed">October</span>
								<span class="date myriad_pro_bold_condensed">19</span>
							</div>
							<div class="calendardetails">
								<strong class="calendartitle">MassKara Festival</strong>
								Bacolod City
								<div class="desc">
									The MassKara Festival is a festival held each year in Bacolod City, the capital of Negros Occidental province in the Philippines every third weekend of October nearest October 19, the city's Charter Inauguration Anniversary.
								</div>
								<p class="readmore">
									<a href="#">Read More</a>
								</p>
							</div>
							<br clear="all" />
						</div>
						<div class="sidebarshadow">&nbsp;</div>
						<span class="myriad_pro_bold_condensed sidebarheader">The Philippines</span>
						<div class="sidebarmap">
							<img src="images/phmap.jpg" border="0" alt="Philippines" />
							<?php /*
							<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Philippines&amp;ie=UTF8&amp;hq=&amp;hnear=Philippines&amp;t=m&amp;ll=12.897489,121.816406&amp;spn=25.499947,26.279297&amp;z=4&amp;output=embed"></iframe>
							*/ ?>
						</div>
						
						<span class="myriad_pro_bold_condensed sidebarheader">Side Trips</span>
						<div class="sidetrip">
							<?php for($x=0;$x<=3;$x++){ ?>
							<div class="sidetripcontent">
								<div class="leftcont">
									
								</div>
								<div class="rightcont">
									<div class="sidetriptitle">
										<span class="title">Boracay Island</span>
										<span class="loc">Boracay Island, Aklan</span>
									</div>
									<div>
										<div class="star">
											<div class="star2" style="width:75%;">&nbsp;</div>
										</div>
										<span class="readmoresidetrip"><a href="#" class="sidetriphref">257 reviews</a></span>
										<br clear="all" />
									</div>
								</div>
								<br clear="all" />
							</div>
							<?php } ?>
							<div class="sidefoot">&nbsp;</div>
						</div>
						
						<span class="myriad_pro_bold_condensed sidebarheader">Today's Weather</span>
						<div class="weather">
							<div class="wleft" id="deg"></div>
							<div class="wright">
								<span class="location" id="weatherlocation"></span>
								<span id="weathercondition"></span>
								<span id="sun"></span>
								<i>Powered by Yahoo! Weather</i>
							</div>
							<br clear="all" />
						</div>
					</div>
					<br clear="all" />
				</div>
				
				
				<!--//FOOTER//-->
				<div class="footer">
					<div class="left">
						<ul>
							<li><strong>Pinoy Destination</strong></li>
							<li><a href="#">Home</a></li>
							<li><a href="#">Destinations</a></li>
							<li><a href="#">Hotels</a></li>
							<li><a href="#">Restaurants</a></li>
							<li><a href="#">Get Listed</a></li>
							<li><a href="#">Plan Your Visit</a></li>
							<li><a href="#">Submit a Review</a></li>
						</ul>
						<ul>
							<li><strong>What to Do</strong></li>
							<li><a href="#">Manila</a></li>
							<li><a href="#">Baguio</a></li>
							<li><a href="#">Cebu</a></li>
							<li><a href="#">Davao</a></li>
							<li><a href="#">Luzon</a></li>
							<li><a href="#">Visayas</a></li>
							<li><a href="#">Mindanao</a></li>
						</ul>
						<ul>
							<li><strong>Where to Stay</strong></li>
							<li><a href="#">Manila</a></li>
							<li><a href="#">Baguio</a></li>
							<li><a href="#">Cebu</a></li>
							<li><a href="#">Davao</a></li>
							<li><a href="#">Luzon</a></li>
							<li><a href="#">Visayas</a></li>
							<li><a href="#">Mindanao</a></li>
						</ul>
						<ul>
							<li><strong>Other Reasons to Visit</strong></li>
							<li><a href="#">Festivals</a></li>
							<li><a href="#">Resorts and Beaches</a></li>
							<li><a href="#">Tourist Attractions</a></li>
							<li><a href="#">The Nightlife</a></li>
							<li><a href="#">Our Food</a></li>
							<li><a href="#">The People</a></li>
						</ul>
						<br clear="all" />
					</div>
					<div class="right">
						<strong class="footertitle">2012 &copy; Pinoy Destination. All Rights Reserved.</strong>
						<p>
							Managed and maintained by Pinoy Destination, Guadalupe Nuevo, Makati City. All images, media and other digital content are property of Pinoy Destination. For other information please refer to our <a href="#">legal</a> section.
						</p>
					</div>
					<br clear="all" />
				</div>
				
			</div>
		</div>
	</body>
</html>