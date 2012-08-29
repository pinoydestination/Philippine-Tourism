<?php get_header(); ?>
<div class="mainbodycontent">
					<div class="left">
						<?php include("mabuhay.php"); ?>
						<div class="homelistcontainer firstlist">
							<h1 class="myriad_pro_bold_condensed">Where to Go? Explore Philippines!</h1>
							
							<div class="tabcontainer">
								
								<div class="homepagetilecontainergreen <?php echo $style; ?>">
									<a class="homepagetilelink" href="/landing/beach-resorts">
										<img class="indexgreenimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/banaue.jpg" border="0" />
										<span>Tourist Destinations</span>
									</a>
								</div>
								
								<div class="homepagetilecontainergreen">
									<a class="homepagetilelink" href="/landing/beach-resorts">
										<img class="indexgreenimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/bora.jpg" border="0" />
										<span>Beach &amp; Resorts</span>
									</a>
								</div>
								<div class="homepagetilecontainergreen">
									<a class="homepagetilelink" href="/landing/beach-resorts">
										<img class="indexgreenimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/resto.jpg" border="0" />
										<span>Clubs &amp; Resto</span>
									</a>
								</div>
								<div class="homepagetilecontainergreen norightmargin">
									<a class="homepagetilelink" href="/landing/beach-resorts">
										<img class="indexgreenimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/zipline.jpg" border="0" />
										<span>Fun Activities</span>
									</a>
								</div>
								<br clear="all" />
							</div>
							<div class="homepageshadow">&nbsp;</div>
						</div>
						<div class="homelistcontainer">
							<h1 class="myriad_pro_bold_condensed wheretostay">Where to Stay</h1>
							<div class="newloationcontainer">
								
								<div class="homepagetilecontainer">
									<a href="">
										<div class="insetcontent">
											<img class="indexhotelimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/manilahotel.jpg" border="0" />
										</div>
										Hotels in Manila
									</a>
								</div>
								
								<div class="homepagetilecontainer">
									<a href="">
										<div class="insetcontent">
											<img class="indexhotelimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/luzonhotel.jpg" border="0" />
										</div>
										Hotels in Luzon
									</a>
								</div>
								
								<div class="homepagetilecontainer">
									<a href="">
										<div class="insetcontent">
											<img class="indexhotelimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/visayashotel.jpg" border="0" />
										</div>
										Hotels in Visayas
									</a>
								</div>
								
								<div class="homepagetilecontainer norightmargin">
									<a href="">
										<div class="insetcontent">
											<img class="indexhotelimages" src="<?php bloginfo("stylesheet_directory"); ?>/images/home/mindanaohotel.jpg" border="0" />
										</div>
										Hotels in Mindanao
									</a>
								</div>
								
								
								
								<br clear="all" />
							</div>
							
						</div>
						
						<div class="homepageothers">
							<div class="homepageothersleft">
								<h1 class="myriad_pro_bold_condensed wheretostay">Recent Reviews</h1>
								<div class="commentlist">
									<ul class="commentlistul">
									<?php 
									$comments = getRecentComments(4);
									if(is_array($comments)){
										foreach($comments as $comment){
										?>
											<li>
												<a href="/profile/<?php echo $comment->user_id; ?>/<?php echo $comment->comment_author; ?>"><?php echo $comment->comment_author; ?></a> on <a href="<?php echo $comment->guid; ?>#review-<?php echo $comment->comment_ID; ?>"><strong><?php echo $comment->post_title; ?></strong></a>
												<p>
													&ldquo;<?php echo $comment->comment_content; ?>&rdquo;
												</p>
											</li>
										<?php
										}
									}else{
										echo "No user reviews yet";
									}
									?>
									</ul>
								</div>
							</div>
							
							<div class="homepageothersleft norightmargin">
								<h1 class="myriad_pro_bold_condensed wheretostay">Tourism News</h1>
							</div>
							<br clear="all" />
						</div>
						
						<div class="blogsection">
							<h1 class="myriad_pro_bold_condensed wheretostay">Our Blog</h1>
							<div>
								
							</div>
						</div>
						
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
