<!--//FOOTER//-->
				<div class="footer">
					<div>
					<?php include('footerlinks.php');  ?>
					<div class="right">
						<strong class="footertitle">2012 &copy; Pinoy Destination. All Rights Reserved.</strong>
						<p>
							Managed and maintained by Pinoy Destination, City of Dasmarinas, Cavite. All images, media and other digital content are property of Pinoy Destination. For other information please refer to our <a href="<?php bloginfo("url"); ?>/company/legal">legal</a> section.
						</p>
						
						<p>
							<a href="<?php bloginfo("url"); ?>/company/sitemap">Sitemap</a> | <a href="<?php bloginfo("url"); ?>/company/privacy-policy">Privacy</a> | <a href="<?php bloginfo("url"); ?>/company/disclaimer">Disclaimer Notice</a> | <a href="<?php bloginfo("url"); ?>/company/contacts">Contact Us</a> | <a href="<?php bloginfo("url"); ?>/company/special-thanks">Thanks</a> 
						</p>
						
						<p>
							<strong>In God We Trust</strong>
						</p>
					</div>
					<br clear="all" />
					</div>
					<div class="footer_credit">
						* Pinoy Destination is not affiliated nor connected with the Philippines' Department of Tourism.
					</div>
				</div>
				
				<?php if(is_single()) {
					include("write_a_review.php");
				}?>
				
			</div>
			
		</div>
	</body>
</html>