<?php get_header(); ?>
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
					
					<?php
					
					/**
					 * Sidebar
					 */
					get_sidebar();
					
					?>
					
					<br clear="all" />
				</div>
				
<?php get_footer(); ?>
