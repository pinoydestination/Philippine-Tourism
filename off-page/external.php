<?php
/** Sets up the WordPress Environment. */
require( '../wp-load.php' );
$url = explode("http://",$_GET['url']);
if(in_array("http://",$url)){
	$url = $_GET['url'];
}else{
	$url = "http://".$_GET['url'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
	<title><?php bloginfo("title"); ?> - External Page | <?php echo $url; ?></title>
	<link href="<?php bloginfo('stylesheet_directory'); ?>/external.css" rel="stylesheet" />
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
	<script>
		$(document).ready(function(){
		
			resizeFrame = function(){
				var width = $(window).width()-20;
				var height = $(window).height();
				var factor1 = $(".header").height();
				var factor2 = $(".addressbar").height();
				
				var finalheight = height-factor1-factor2-2;
				console.log(finalheight);
				$("#iframe").width(width);
				$("#iframe").height(finalheight);
				
			}
			
			$(window).resize(function(){
				resizeFrame();
			});
			
			initFrame = function(address){
				$("#iframeholder").html("<iframe id=\"iframe\" src=\"\" frameborder='0'></iframe>");
			}
		
			loadaddress = function(address){
				$("#iframe").attr("src",address);
			}
			
			initFrame();
			resizeFrame();
			loadaddress("<?php echo $url; ?>");
			
			$("#go").live('click',function(){
				loadaddress($("#url").val());
			});
			
		});
	</script>
</head>
<body>
	<div class="header">
		<div class="logo">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/mainlogo.png" alt="<?php bloginfo("title"); ?>" border="0" />
		</div>
		<div class="menu">
			<a href="<?php bloginfo("url"); ?>">Home</a>
			<a href="<?php bloginfo("url"); ?>/company/disclaimer">Disclaimer</a>
			<a href="<?php bloginfo("url"); ?>/company/contacts">Contact Us</a>
			<br clear="all" />
		</div>
		<br clear="all" />
	</div>
	<div class="addressbar">	
		<input type="text" id="url" name="url" class="addressbox" value="<?php echo $url; ?>" />
		<input type="button" id="go" value="Go" />
		<?php /*<input type="button" id="reload" value="Reload" /> */?>
	</div>
	<div id="iframeholder"></div>
</body>
</html>
