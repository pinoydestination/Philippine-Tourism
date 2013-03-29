<?php get_header(); ?>
<div class="mainbodycontent">
					<div class="left">
						<div class="homelistcontainer nomargintop">
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
								<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpinoydestination&amp;width=293&amp;height=640&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:293px; height:640px;" allowTransparency="true"></iframe>
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
