<!--//FOOTER//-->
				<div class="footer">
					<div>
					<?php include('footerlinks.php');  ?>
					<div class="right">
						<strong class="footertitle">2012 &copy; Pinoy Destination. All Rights Reserved.</strong>
						<p>
							Managed and maintained by Pinoy Destination &dash; Makati City, Metro Manila, PH. All images, media and other digital content are property of Pinoy Destination. For other information please refer to our <a href="<?php bloginfo("url"); ?>/company/legal">legal</a> section.
						</p>
						
						<p>
							<a href="<?php bloginfo("url"); ?>/company/sitemap">Sitemap</a> | <a href="<?php bloginfo("url"); ?>/company/privacy-policy">Privacy</a> | <a href="<?php bloginfo("url"); ?>/company/disclaimer">Disclaimer Notice</a> | <a href="<?php bloginfo("url"); ?>/company/contacts">Contact Us</a> | <a href="<?php bloginfo("url"); ?>/company/special-thanks">Thanks</a> 
						</p>
						
						<p>
							<strong>To God Be The Glory!</strong>
						</p>
					</div>
					<br clear="all" />
					</div>
					<div class="footer_credit">
						<p>
						* Pinoy Destination is not affiliated nor connected with the Philippines' Department of Tourism.
						</p>
						<p>
							<a href="http://www.proudlypinoy.org/" target="_blank" rel="nofollow"><img src="http://www.proudlypinoy.org/proudlypinoysmallontrans.png" width="75" height="75" border="0" alt="Proudly Pinoy!"></a>
						</p>
					</div>
				</div>
				
				<?php if(is_single()) {
					include("write_a_review.php");
				}?>
				
			</div>
			
		</div>
	</body>
</html>