$(document).ready(function(){
	/*
	$(".haschild").live('mouseover',function(){
		$(this).children("ul.sub").slideDown();
	});
	$(".haschild").live('mouseout',function(){
		$(this).children("ul.sub").slideUp();
	});
	*/
	
	$('#searchbutton').click(function(){
		if($("#searchframe:visible").length <= 0){
			  
			    $('#searchframe').animate({
			    opacity: 0.9,
			    top: '55'
			  }, 200, function() {
			    // Animation complete.
			    $(this).show();
			  });
			  
		}else{
			$('#searchframe').animate({
			    opacity: 0.0,
			    top: '10'
			  }, 200, function() {
			    // Animation complete.
			    $(this).hide();
			  });
		}
	});
	
	$(".footer .left ul li a").prepend('<span class="arrow">&nbsp;</span>');
	$(".menulinks li ul li a").prepend('<span class="arrow">&nbsp;</span>');
	
	/*
	$(".haschild").hover(function(){
		$(this).find(".submenu").fadeIn();
	},function(){
		$(this).find(".submenu").fadeOut();
	});
	*/
	
	$(".footer a, .menulinks li ul li a").hover(function(){
		$(this).find("span.arrow").stop().animate({"width":"10px", "margin-right":"2px"},200);
	}, function(){
		$(this).find("span.arrow").stop().animate({"width":"0", "margin-right":"0px"},200);
	});
	
	$.ajax({
			url: "weather.php",
			data: { loc: "Cebu+City, Philippines" },
			cache: false,
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			timeout: 20000,
			dataType: 'json'
		}).done(function( data ) {
			$.Temperature = data.Today.temp[0];
			$("#deg").html($.Temperature + '&deg;');
			$("#weatherlocation").html(data.Location.city[0] + ", " + data.Location.country[0]);
			$("#sun").html("Sunrise: " + data.Astronomy.sunrise[0] +  " | Sunset: "+ data.Astronomy.sunset[0] );
			$("#weathercondition").html(data.Today.condition[0]);
	});

});
