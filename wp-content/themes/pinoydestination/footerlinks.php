<div class="left">
						<ul>
							<li><strong>Pinoy Destination</strong></li>
							<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
							<li><a href="/landing/destination">Destinations</a></li>
							<li><a href="/landing/hotel">Hotels</a></li>
							<li><a href="/landing/restaurant">Restaurants</a></li>
							<li><a href="/landing/beach">Beaches</a></li>
							<li><a href="/company/get-listed">Get Listed</a></li>
							<li><a href="/company/plan-your-visit">Plan Your Visit</a></li>
							<li><a href="/company/submit-review">Submit a Review</a></li>
						</ul>
						<ul>
							<li><strong>What to Do</strong></li>
							<?php
								$menu = getMenu( "destination" );
								foreach($menu as $m){
								?>
									<li><a href="<?php echo $category_base."/philippines/".$m->parent_slug."/".$m->slug; ?>"><?php echo $m->category_location; ?></a></li>
								<?php
								}
							?>
						</ul>
						<ul>
							<li><strong>Where to Stay</strong></li>
							<?php
								$menu = getMenu( "hotel" );
								foreach($menu as $m){
								?>
									<li><a href="<?php echo $category_base."/philippines/".$m->parent_slug."/".$m->slug; ?>"><?php echo $m->category_location; ?></a></li>
								<?php
								}
							?>
						</ul>
						<ul>
							<li><strong>Other Reasons to Visit</strong></li>
							<li><a href="#">Festivals</a></li>
							<li><a href="/landing/beach">Resorts and Beaches</a></li>
							<li><a href="/landing/destination">Tourist Attractions</a></li>
							<li><a href="/landing/restaurant">Our Food</a></li>
						</ul>
						<br clear="all" />
					</div>