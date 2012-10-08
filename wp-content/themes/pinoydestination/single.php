<?php
get_header();
global $globalCatType;
global $parentCat;
global $isBlog;

$globalCatType = "";
 while ( have_posts() ) : the_post(); 
						
	$postID = get_the_ID();
	$activateDestinationCss = false;
	
	/*Get Star Ratings*/	
	$starComputeFinal = getPostRatings(get_the_ID());
		
	/*Get Special Info*/
	$otherInfoData = getOtherInfo($postID);
	
	$GLOBALS['Current_Coordinates'] = $otherInfoData->google_map_coordinate != "" ? $otherInfoData->google_map_coordinate."&datatype=latlang" : $otherInfoData->location_address;
	
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
	
	$parentCat = $finalCat;
	
	$newCat = rearrangeCategory($newCat,$arrCatAll);
	
	/*Check if current post is a blog*/
	$isBlog = false;
	foreach($newCat as $category){
		if($category->slug == "blog" || $category->slug == "travel-news"){
			$isBlog = true;
		}
	}
	/*End of Checking*/
	
	$GLOBALS['Current_City'] = $finalCat;
	global $finalCat;
	
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
									if(in_array($category->name,$arrCatType)){
										$globalCatType = $category->name;
									}
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
								<?php 
								}
								if(!$isBlog){
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
								}
								?>								
								<br clear="all" />
								</ul>
								
								<?php if(!$isBlog){ ?>
								<div class="star_w star_w_white" style="float:right; margin-top:6px;"><div class="star_w2 star_w2_white" style="width:<?php echo $starComputeFinal->overAllRatings; ?>%;">&nbsp;</div></div>
								<?php } ?>
								
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
								<?php 
								} 
								if($otherInfoData->website != ""){ ?>
									<span class="phonenumber">Website: <a href="/external/<?php echo $otherInfoData->website; ?>"><?php echo $otherInfoData->website; ?></a></span>
								<?php } 
								
								if($isBlog){
									echo "<span class='phonenumber'>By: ";
									the_author(); echo " | ";
									the_date();
									echo "</span>";
								}
								?>
							</div>
							<div class="homepageshadow">&nbsp;</div>
							
							
							<div>
								<script type="text/javascript"><!--
								google_ad_client = "ca-pub-0908617034545427";
								/* PD Text Link Posts */
								google_ad_slot = "6273113945";
								google_ad_width = 468;
								google_ad_height = 15;
								//-->
								</script>
								<script type="text/javascript"
								src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							
							
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
							
							
							<div class="sharecontainer">
								<div class="googleplus">
									<!-- Place this tag where you want the +1 button to render. -->
									<div class="g-plusone" data-size="tall" data-annotation="inline" data-width="190"></div>

									<!-- Place this tag after the last +1 button tag. -->
									<script type="text/javascript">
									  (function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/plusone.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									  })();
									</script>
								</div>
							</div>
							
							<?php 
							if(!$isBlog){
								include("single_tabs.php");
								include("gallerysnippet.php");
							}else{
								//include("single_author.php");
							}
							?>
							
							
							<?php 
							if(!$isBlog){
							?>
							
							<div class="commenthr">&nbsp;</div>
							
							
							<div class="commenthead">
								<div class="floatleft">
									<a name="reviews">
										<h1 class="comment" name="reviews"><?php comments_number('No Reviews Yet', 'One Review', '% Reviews from our users'); ?> </h1>
									</a>
								</div>
								<div class="floatright2">
									<?php
									if($current_user->ID == 0 || $current_user->ID <=0){
										?>
										<a id="submitreview" href="/login/?redirect_to=<?php echo urlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" class="reviewbutton">Login to Share your Experience!</a>
										<?php
									}else{
										?>
										<a id="submitreview" href="javascript:void(0);" class="reviewbutton">Share Your Experience</a>
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
															<option value="1">Terrible</option>
															<option value="2">Good</option>
															<option value="3">Beyond Expectation</option>
															<option value="4">Best</option>
															<option value="5">Excellent</option>
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
													
													<input type="submit" value="Submit Your Review!" class="reviewbutton" /> 
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
							<?php } ?>
							<br clear="all" />
						</div>
						
					</div>
					<?php
					if($isBlog){
						echo '<div class="right" id="sidebarPanel">';
						include("blog_sidebar.php"); 
						echo '</div>';
					}else{
						include("single_sidebar.php"); 
					}
					?>
					<br clear="all" />
				</div>
<?php 
/**
 * END
 */
endwhile;						
?>
				
<?php get_footer(); ?>
