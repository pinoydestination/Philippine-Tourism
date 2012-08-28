<?php get_header();
 while ( have_posts() ) : the_post(); 
						
	$postID = get_the_ID();
	$activateDestinationCss = false;
	
	/*Get Star Ratings*/
	
	//Get Author Info
	$sql = "SELECT * FROM ". $wpdb->prefix . "ratings WHERE post_id='".get_the_ID()."'";
	$starRating = $wpdb->get_results($sql);
	if(count($starRating) > 0){
		$totalStarRate = count($starRating);
		$currentRating = 0;
		foreach($starRating as $ratings){
			$currentRating = ($currentRating)+($ratings->ratings);
		}
		$starRate = $currentRating;
		$overAllTotal = $totalStarRate*100;
		$starComputeFinal = floor((($starRate/$overAllTotal)*50)+50);
	}else{
		$starComputeFinal = 0;
	}
	
	/*Get Special Info*/
	$sql = "SELECT * FROM ".$wpdb->prefix."other_info WHERE post_id='".$postID."'";
	$otherInfoData = $wpdb->get_results($sql);
	$otherInfoData = $otherInfoData[0];
	
	$GLOBALS['Current_Location'] = $otherInfoData->location_address;
	
	$categories = get_the_category();
	$catctr = count($categories)-1;
	$totalCat = count($categories);
	$totalCounter = 0;
	$categoryStatic = Array();
	foreach($categories as $cat){
		$categoryStatic[$cat->name] = $cat->name;
		if(!in_array($cat->name, $arrCatAll )){
			$finalCat = $cat->name;
		}
		
		if($cat->name == "Destination"){
			$activateDestinationCss = true;
		}
		$newCat[] = $categories[$catctr];
		$catctr--;
		
	}
	
	$newCat = rearrangeCategory($newCat,$arrCatAll);
	
	$GLOBALS['Current_City'] = $finalCat;
	
	if($activateDestinationCss){
		?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/blue.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php
	}else{
		?>
			<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/hotel.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<?php } ?>


				<div class="mainbodycontent" id="mainDocument">
					<div class="left" id="leftSidePanel">
					
					
							<div class="postBread">
								<ul class="breadList">
								<?php
								$prevCat = "";
								foreach($newCat as $category){
									$totalCounter++;
									if($totalCounter >= $totalCat){
										$breadStyle = " class='xnomarginright'";
									}else{
										$breadStyle = "";
									}
									$prevCat= $prevCat . $category->slug ."/";
									?>
									<li<?php echo $breadStyle; ?>><a href="<?php echo $category_base. "/". $prevCat; ?>"><?php echo $category->name; ?></a></li>
									
									<?php
									
								}
								?>
								
								<?php
								if(isset($_GET['gallery']) && $_GET['gallery'] == "show"){
								?>
									<li><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></li>
								<?php } ?>
									<?php 
										if(isset($_SESSION['myItinerary']) && is_array($_SESSION['myItinerary'])){
											$sha1Title = sha1(get_the_title());
											if(isset($_SESSION['myItinerary'][$sha1Title]) && is_array($_SESSION['myItinerary'][$sha1Title])){
												?>
												<!--//<li class="nomarginright"><span class="gallerySpanHead additinerarybutton" id="addthistomyitinerary" inline-data="<?php echo $otherInfoData->location_address; ?>|<?php the_title(); ?>|<?php echo get_permalink();?>">Remove this in your itinerary<span>&times;</span></span></li>//-->
												<?php
											}else{
												?>
												<li class="nomarginright"><span class="gallerySpanHead additinerarybutton" id="addthistomyitinerary" inline-data="<?php echo $otherInfoData->location_address; ?>|<?php the_title(); ?>|<?php echo get_permalink();?>">Add to Itinerary</span></li>
												<?php
											}
										}else{
										?>
											<li class="nomarginright"><span class="gallerySpanHead additinerarybutton" id="addthistomyitinerary" inline-data="<?php echo $otherInfoData->location_address; ?>|<?php the_title(); ?>|<?php echo get_permalink();?>">Add to Itinerary</span></li>
										<?php
										}
									?>
									
								
								<br clear="all" />
								</ul>
								
								<div class="star_w star_w_white" style="float:right; margin-top:6px;"><div class="star_w2 star_w2_white" style="width:<?php echo $starComputeFinal; ?>%;">&nbsp;</div></div>
							</div>
							<div class="postTitle greenbgnew">
								<?php if(isset($_GET['gallery']) && $_GET['gallery'] == "show"){ ?>
									<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<span class="gallerySpanHead">Gallery</span>
								<?php }else{ ?>
									<h1 class="title"><?php the_title(); ?></h1>
								<?php } ?>
								<p>
									<?php echo $otherInfoData->location_address; ?>
								</p>
								<?php if($otherInfoData->contact_number != ""){ ?>
									<span class="phonenumber">Phone Number: <?php echo $otherInfoData->contact_number; ?></span>
								<?php } ?>
							</div>
							<div class="homepageshadow">&nbsp;</div>
							
							
						<div id="mainarticlecontainer">
							<?php if(isset($_GET['gallery']) && $_GET['gallery'] == "show"){
								
							}else{ ?>
							<div class="post">
								<?php /*
								<div class="infobox">
									<div class="infoboxcont">
										<span>Price Range</span>
										<div class="star" style="float:none; margin-bottom:5px;"><div class="star2" style="width:75%;">&nbsp;</div></div>
									</div>
								</div>
								*/ ?>
								<?php the_content(); ?>					
							</div>
							
							<?php 
							}?>
							
							
							
							<?php 
							
							if(!isset($_GET['gallery']) && $_GET['gallery'] != "show"){ 
							if(in_array("Hotel",$categoryStatic)){
								$title = "Tourist Spots";
								$catType = "Destination";
							}
							if(in_array("Destination",$categoryStatic)){
								$title = "Hotels";
								$catType = "Hotel";
							}
							
							$hotelLists = getSpecific($GLOBALS['Current_City'],$catType);
							$restaurantLists = getSpecific($GLOBALS['Current_City'],"restaurant");
							
							?>
								
								<div class="extracontentaddons">
									
									<ul class='tabs'>
										<li><a href='javascript:;' activate="#tab1" class="active"><?php echo $title; ?> in <?php echo $GLOBALS['Current_City']; ?></a></li>
										<li><a href='javascript:;' activate="#tab2">Restaurants in <?php echo $GLOBALS['Current_City']; ?></a></li>
										<br clear="all" />
									</ul>
									<div class="tabscontent" id='tab1'>
										<?php
											if(count($hotelLists)<=0){
												echo "<center class='noutfound'><h2>No ".$catType." found within this area on our server.</h2></center>";
											}else{
											?>
											<ol style="display:block; ">
												<?php foreach($hotelLists as $hotels){ ?>
												<li>
													<div class="extralist">
														<a href="<?php echo $hotels->guid; ?>"><?php echo $hotels->post_title; ?></a>
														<span><?php echo $hotels->location_address; ?></span>
														<span><?php echo $hotels->contact_number; ?></span>
														<span class="website"><?php echo $hotels->website; ?></span>
														<a class="showdirection fancybox fancybox.iframe" href="http://www.pinoydestination.com/gdirections.php?from=<?php echo urlencode($GLOBALS['Current_Location']); ?>&to=<?php echo urlencode($hotels->location_address); ?>&zoom=1">Show Directions</a>
													</div>
												</li>
												<?php } ?>
											</ol>
											<?php
											}
										?>
									</div>
									<div class="tabscontent" id='tab2'>
										<?php
											if(count($restaurantLists)<=0){
												echo "<center class='noutfound'><h2>No Restaurant found within this area on our server.</h2></center>";
											}
										?>
									</div>
									
								</div>
							
							<?php } ?>
							
							<?php include("gallerysnippet.php"); ?>
							
							<div class="commenthr">&nbsp;</div>
							
							
							<div class="commenthead">
								<div class="floatleft">
									<h1 class="comment"><?php comments_number('No Reviews Yet', 'One Review', '% Reviews from our users'); ?> </h1>
								</div>
								<div class="floatright2">
									<?php
									if($current_user->ID == 0 || $current_user->ID <=0){
										?>
										<a id="submitreview" href="/login/?redirect_to=<?php echo urlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" class="reviewbutton">Login to Submit Review</a>
										<?php
									}else{
										?>
										<a id="submitreview" href="javascript:void(0);" class="reviewbutton">Submit a Review</a>
										<?php	
									}?>
									
								</div>
								<br clear="all" />
							</div>
							
							
							<div class="spacer">&nbsp;</div>
							
							<?php comments_template( '', true ); ?>
							
							<div id="write-a-review" class="popupdiv">
								<div class="writeReviewHeader">
									<div>
										<img src="<?php bloginfo("stylesheet_directory"); ?>/images/bgimages/x.png" class="overlayclose" alt="close" title="Close" border="0" />
									</div>
									<div>
										<?php if($current_user->ID > 0){ ?>
										<?php if(comments_open()) : ?>
										<div id="writereview" class="reviewwriter silver">
											<h1>Share your experience:</h1>
											<form action="<?php echo bloginfo('url'); ?>/postcomment.php" method="post" id="commentform"  enctype="multipart/form-data">  
												<div class="formform">
													<p>
														<?php
															$userName  = $current_user->data->display_name;
															$userEmail = $current_user->data->user_email;
															$userID    = $current_user->ID;
														?>
														<input type="hidden" name="comment_parent" value="0" />
														<input type="hidden" name="redirect_to" value="<?php echo get_permalink(); ?>" />
														<input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" />
														<input type="hidden" name="userID" value="<?php echo $userID; ?>" />
														<input type="hidden" name="email" value="<?php echo $userEmail; ?>" />
														<input type="hidden" name="author" id="author" value="<?php echo $userName; ?>" size="22" tabindex="1" />
														<span class="spanLabel">Rate This Place:</span>
														<select name="rating" class="dropdownselect">
															<option value="20">Terrible</option>
															<option value="40">Good</option>
															<option value="60">Beyond Expectation</option>
															<option value="80">Best</option>
															<option value="100">Excellent</option>
														</select>
													</p>
													<p>
														<span class="spanLabel">Review Title:</span>
														<input type="text" name="reviewTitle" class="inputText" placeholder="ex. Great Vacation!" />
													</p>
													
													<p>
														<span class="spanLabel">&nbsp;</span>
														<textarea name="comment" class="inputText textarea"></textarea><br />
													</p>
													<p>
														<span class="spanLabel">Share Photo:</span>
														<input type="file" name="file" id="file" />
													</p>
												</div>
												<div class="formform formbuttons">
													
													<input type="submit" value="Submit Review For Approval" class="reviewbutton" /> 
												</div>
											<?php
											/**
											 * End of form
											 */
											?>
											</form>
										</div>
										
										<?php else : ?>  
										    <p>Reviews are not allowed on this article.</p>  
										<?php endif; ?>  
										
										<?php } ?>
									</div>
								</div>
							</div>
							
							
							
							<br clear="all" />
						</div>
						
					</div>
					<div class="right" id="sidebarPanel">
						<div id="postsidebarcontainer">
							<div class="sidebarmap">
								<span class="myriad_pro_bold_condensed sidebarheader" style="float:left;"><?php echo get_the_title(); ?> Map</span><a class="largermapbutton fancybox fancybox.iframe" href="http://www.pinoydestination.com/gmap.php?address=<?php echo urlencode($otherInfoData->location_address); ?>&zoom=13">ENLARGE MAP</a>
								<br clear="all" />
								<?php /*
								<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Philippines&amp;ie=UTF8&amp;hq=&amp;hnear=Philippines&amp;t=m&amp;ll=12.897489,121.816406&amp;spn=25.499947,26.279297&amp;z=4&amp;output=embed"></iframe>
								<iframe width="300" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.pinoydestination.com/gmap.php?address=<?php echo $GLOBALS['Current_Location']; ?>&zoom=13"></iframe>
								 * */ ?>
								<img class="staticgmap" width="300" height="400" border="0" src="http://www.pinoydestination.com/gstatic.php?address=<?php echo $GLOBALS['Current_Location']; ?>&zoom=13&size=292x400" />
							</div>
							
													
							<span class="myriad_pro_bold_condensed sidebarheader"><?php echo get_the_title(); ?> Side Trips</span>
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
						</div>
					</div>
					<br clear="all" />
				</div>
				
						
<?php 
/**
 * END
 */
endwhile;						
?>
				
<?php get_footer(); ?>
