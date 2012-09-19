<?php get_header(); ?>
<div class="mainbodycontent">
					<div class="left">
						<?php include("mabuhay.php"); ?>
						<div class="homelistcontainer firstlist">
							<h1 class="myriad_pro_bold_condensed">Where to Go? Explore Philippines!</h1>
							
							<div class="tabcontainer">
								<?php include("index_destination_links.php"); ?>
								<br clear="all" />
							</div>
							<div class="homepageshadow">&nbsp;</div>
						</div>
						
						<div class="indexbanner">
							<?php include("adsensebanner468x60.php"); ?>
						</div>
						
						<div class="homelistcontainer">
							<h1 class="myriad_pro_bold_condensed wheretostay">Where to Stay</h1>
							<div class="newloationcontainer">
								<?php include("index_hotel_links.php"); ?>
								<br clear="all" />
							</div>
						</div>
						
						
						<div class="homepageothers">
							<div class="homepageothersleft">
								<h1 class="myriad_pro_bold_condensed blogfontindex">Pinoy Destination Blog</h1>
								<div class="indexblog">
									<?php include("index_blog.php"); ?>
								</div>
							</div>
							
							<div class="homepageothersleft norightmargin">
								<h1 class="myriad_pro_bold_condensed tournewsfont">Travel and Tourism News</h1>
								<div class="indexblog">
									<?php include("index_news.php"); ?>
								</div>
							</div>
							<br clear="all" />
						</div>
						<div class="homepageothers">
							<div class="homepageothersleft alignright">
								<a href="<?php bloginfo('url'); ?><?php echo $category_base; ?>/blog/" class="readmorebuttonindex">Show all Blog Posts</a>
							</div>
							
							<div class="homepageothersleft alignright norightmargin">
								<a href="<?php bloginfo('url'); ?>/travel-news/" class="readmorebuttonindex">More Travel and Tourism News</a>
							</div>
							<br clear="all" />
						</div>
						
						
						<div class="blogsection">
							<h1 class="myriad_pro_bold_condensed recentreviewfont">Recent Reviews</h1>
							<div class="commentlist">
								<?php include("index_reviews.php"); ?>
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
