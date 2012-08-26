<html>
	<head>
		<title>Pinoy Destination - Experience Philippines - Travel. Destinations. Adventures. 100% Pinoy.</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
	</head>
	<body>
		<div class="firstBackground">
			<div class="secondBg">
				<div class="thirdbg">
					<div class="bluredBackground" style="background:url('images/blurry.png') center top no-repeat">
						<div>
							<div class="redbgnew">
								
							</div>
							<div class="greenbgnew">
								
							</div>
							<div class="logocontainer">
								<img src="images/logo.png" border="0" alt="pinoy destination" />
							</div>
						</div>
						<div class="mainbackground" style="background:url('images/lapulapu.png') center top no-repeat">
							<div class="maincontent" id="maincontent">
								<div class="headerMenu">
									<ul id="headerMenuList">
										<li><a href="" class="active">Home</a></li>
										<li><a href="">Top Destinations</a></li>
										<li><a href="">Travel Tips</a></li>
										<li><a href="">About Us</a></li>
										<li><a href="">Submit Destinations</a></li>
										<br clear="all" />
									</ul>
								</div>
								
								<!--//Billboard//-->
								<div class="destinationSearch">
									<input type="text" class="largeSearchBox" /><button value="Search" />
								</div>
								<!--//End of Billboard//-->
								<div class="spacer"></div>
							</div>
							<div class="longLineStyle">
							</div>
							<div class="longLineContent">
								
							</div>
							<div class="whiteArea">
								<div class="maincontent">
									<div class="floatLeft sidebar">
										<div class="finder">
											<div class="finderHeader lightOrangeGradient">
												Select Destination
											</div>
											<div class="finderBody yellow">
												<div>
												<span>Region:</span> <select name="location">
													<option value="luzon">Luzon</option>
													<option value="visayas">Visayas</option>
													<option value="mindanao">Mindanao</option>
												</select>
												</div>
												<div>
													<span>Locations:</span> <select name="location">
													<option value="luzon">Luzon</option>
													<option value="visayas">Visayas</option>
													<option value="mindanao">Mindanao</option>
												</select>
												</div>
												<div class="buttonholder">
													<a href="" class="button">Check Now!</a>
												</div>
											</div>
											
										</div>
										<div class="finder">
											<div class="finderHeader redGradient">
												Hotels, Inns and Transients
											</div>
											<div class="finderBody redBg">
												<div>
												<span>Region:</span> <select name="location">
													<option value="luzon">Luzon</option>
													<option value="visayas">Visayas</option>
													<option value="mindanao">Mindanao</option>
													</select>
												</div>
												<div>
													<span>Locations:</span> <select name="location">
													<option value="luzon">Luzon</option>
													<option value="visayas">Visayas</option>
													<option value="mindanao">Mindanao</option>
													</select>
												</div>
												
												<div>
													<span>Accomodation Type:</span> <select name="location">
													<option value="luzon">Hotel</option>
													<option value="visayas">Inn</option>
													<option value="mindanao">Apartment</option>
													<option value="mindanao">Transient House</option>
													</select>
												</div>
												<div class="buttonholder">
													<a href="" class="button">Check Now!</a>
												</div>
											</div>
										</div>
										<div class="finder">
											<div class="finderHeader lightOrangeGradient">
												Recent Comments and Reviews
											</div>
											<div class="finderBody yellow">
												
											</div>
										</div>
									</div>
									<div class="floatLeft mainbodycontent">
										<div class="maintitle">
											<h1>Sight Seeing?</h1>
											<p>
												Check out the wonderful places of the Philippines. Find people, attractions, festivals and more. Explore Philippines in an instant! Hop On!
											</p>
										</div>
										<div class="destinationslist">
											<?php
											$x = 0;
											$borderRight = "";
											for($x=0;$x<=5;$x++){
												if($x%2){
													$borderRight = "";
												}else{
													$borderRight = "borderDottedRight";
												}
											?>
											<div class="destinationcontainer floatLeft borderDottedBottom <?php echo $borderRight; ?> ">
												
												<div class="destinationmain">
													<div class="left">
														<!--//Thumbnail goes here//-->
													</div>
													<div class="right">
														<h1>Mactan Cebu</h1>
														<p>
														Go to the ant, thou sluggard; Consider her ways, and be wise: 7 Which having no chief, Overseer, or ruler, Go to the ant, thou sluggard; Consider her ways, and be wise: 7 Which having no chief, Overseer, or ruler, 
														</p>
													</div>
													<br clear="all" />
												</div>
												
												<div class="destinationtool silverGradient grayFont">
													<span>256 likes</span>
													<span>75% satisfaction</span>
													<span>30 comments</span>
												</div>
												
											</div>
											<?php
											}
											?>
											
											<br clear="all" />
										</div>
										<div class="maintitle marginTop20">
											<h1>Where to Stay?</h1>
											<p>
												Tired and need to relax while on vacation? Check out our wide list of Hotels, Inns, Transient Houses and For-rents. Compare price range, read reviews, share experiences and interact with other who also checked-in.
											</p>
										</div>
									</div>
									<br clear="all" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>