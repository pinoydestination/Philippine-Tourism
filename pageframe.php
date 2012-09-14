<html>
<head>
	<title>Pinoy Destination</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<style>
	html,body{
		width:100%;
		height:100%;
		padding:0;
		margin:0;
		overflow:hidden;
	}
	iframe{
		border:0;
	}
	</style>
	<script>
		$(document).ready(function(){
			resizeFrame = function(){
				var windowWidth = $(window).width();
				var windowHeight = $(window).height();
				
				$("#mainframe").width(windowWidth);
				$("#mainframe").height(windowHeight);
			};
			
			resizeFrame();
			
			$(window).resize(function(){
				resizeFrame();
			});
			
		});
	</script>
</head>
<body>
	<iframe id="mainframe" src="http://www.pinoydestination.com/"></iframe>
</body>
</html>