<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/hotelpost.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>



				<div class="mainbodycontent" id="mainDocument">
					<div class="left" id="leftSidePanel">
					
					<?php while ( have_posts() ) : the_post(); ?>
							<div class="postBread">
								<a href="#">Home</a> > <a href="#">Profile</a> > <a href="#">Boracay</a> > <a href="#">Hotel</a> 
							</div>
							<div class="postTitle">
								<h1 class="title"><?php the_title(); ?></h1>
								<p>
								Boat Station 1 Boracay Island  Brgy. Balabag, Malay 5608 Province of Aklan
								</p>
								<span class="phonenumber">Phone Number: (036) 288-1111</span>
							</div>
							<div class="homepageshadow">&nbsp;</div>
							
							
						<div id="mainarticlecontainer">
							
							<div class="post">
								<div class="infobox">
									<div class="infoboxcont">
										<span>Price Range</span>
										<div class="star" style="float:none; margin-bottom:5px;"><div class="star2" style="width:75%;">&nbsp;</div></div>
										<span>User Ratings</span>
										<div class="star" style="float:none; margin-bottom:5px;"><div class="star2" style="width:1%;">&nbsp;</div></div>
									</div>
								</div>
								<?php the_content(); ?>					
							</div>
							
							<div class="tabcontainer silver" style="padding-bottom:0px;" id="postthumbnails">
								<div>
									<?php
									$style="";
									$x=0;
									$iteration=1;
									$total = 12;
									$totalRow = $total/4;
									$hide = false;
									for($y=1;$y<=$total;$y++) {
										if($hide){
											$otherstyle = " hidden";
										}else{
											$otherstyle = "";
										}
										if(($x==3)){
											$iteration++;
											$style = "norightmargin";
											$x=-1;
											$hide = true;
										}else{
											$style="";
										}
										if($totalRow == $iteration){
											$marginstyle = " nomarginbottom";
										}else{
											$marginstyle = "";
										}
									?>
									<div class="homepagetilecontainergreen <?php echo $style . $marginstyle . $otherstyle; ?>">
										<img src="<?php bloginfo("stylesheet_directory"); ?>/images/homepage/beach.jpg" border="0" />
										
									</div>
									<?php $x++; 
									} ?>
									<br clear="all" />
								</div>
								<div class="showall">
									<a href="javascript:void(0);" id="showall">Show All</a>
								</div>
							</div>
							<div class="homepageshadow">&nbsp;</div>
							
							
							<div class="commenthr">&nbsp;</div>
							
							
							<div class="commenthead">
								<div class="floatleft">
									<h1 class="comment">100 reviews from our users</h1>
								</div>
								<div class="floatright2">
									<a id="submitreview" href="javascript:void(0);" class="reviewbutton">Submit a Review</a>
								</div>
								<br clear="all" />
							</div>
							
							<div>
							
							<?php for($k=0;$k<=5;$k++){ ?>
								<div class="divreviewcontainer">
									<div class="divreviewinfo">
										<img class="avatar" src="<?php bloginfo("stylesheet_directory"); ?>/images/avatar.jpg" alt="avatar" />
										<span><a href="#">Whizzy</a></span>
										<span>Singapore, Singapore</span>
										<span class="usertype">Reviewer</span>
										<div class="otherinfo">
											
											<span>3 Reviews</span>
											<span>1 Helpful Vote</span>
										</div>
									</div>
									<div class="divreviewmessage">
										<span class="messagetitle"><a href="">&ldquo;Wonderful Experience!!!&rdquo;</a></span>
										<div class="belowtitle">
											<div class="star" style="float:left;"><div class="star2" style="width:35%">&nbsp;</div></div> <div class="postedon">Posted on July 10, 2012</div>
											<br clear="all" />
										</div>
										<div class="mainmessage">
											<p>
											Trip to Ariels Point was the highlight of my trip to Boracay. The price is 1,500p and it's all worth it. The island is very clean, BBQ lunch was delicious, plus unlimited drinks. 
											</p>
										</div>
										<div class="wasthishelpful">
											<span>Was this post helpful?</span> <a href="javascript:void(0);" id="helpful-yes">Yes</a> or <a href="javascript:void(0);" id="helpful-no">No</a>
											<br clear="all" />
										</div>
										<span class="disclaimer">This review is the subjective opinion of a Pinoy Destination member and not of Pinoy Destination owners and it's affiliates. </span>
									</div>
									<br clear="all" />
								</div>
							<?php } ?>
							
							</div>
							
							
							
							<br clear="all" />
						</div>
						
						
						<?php 
						/**
						 * END
						 */
						endwhile;						
						?>
						
						
					</div>
					<div class="right" id="sidebarPanel">
						<div id="postsidebarcontainer">
							<div class="weather">
								<div class="wleft" id="deg"></div>
								<div class="wright">
									<span class="location" id="weatherlocation"></span>
									<span id="weathercondition"></span>
									<span id="sun" class="astro"></span>
									<i>Powered by Yahoo! Weather</i>
								</div>
								<br clear="all" />
							</div>
							
							
							<div class="sidebarmap">
								<img src="<?php bloginfo("stylesheet_directory"); ?>/images/phmap.jpg" border="0" alt="Philippines" />
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
						</div>
					</div>
					<br clear="all" />
				</div>
				
<?php get_footer(); ?>
