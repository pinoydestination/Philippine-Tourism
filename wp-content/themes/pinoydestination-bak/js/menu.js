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
			data: { loc: "Manila,+Philippines" },
			cache: true,
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
	
	$("#showall").die().click(function(){
		if($(this).html() != "Hide"){
			$("#postthumbnails").find(".hidden").each(function(){
				$(this).addClass("hideme");
				$(this).slideDown({duration: 500, easing: 'easeOutBounce' });
			});
			$("#showall").html("Hide");
		}else{
			$("#postthumbnails").find(".hideme").each(function(){
				$(this).addClass("hidden");
				$(this).slideUp({duration: 500, easing: 'easeOutBounce' });
			});
			$("#showall").html("Show All");
		}
	});
	
	$("#submitreview").die().click(function(){
		$("#write-a-review").fadeIn({duration: 1500, easing: 'easeOutExpo' });
	});
	
	$(".overlayclose").die().click(function(){
		$("#write-a-review").fadeOut({duration: 1500, easing: 'easeOutExpo' });
	});
	
	$('.star_empty').hover(  
        // Handles the mouseover  
        function() {
			var meaning = $(this).attr('id');
            $(this).prevAll().andSelf().addClass('star_full');  
			
			switch(meaning){
				case "star_1":
					$("#meaning").html("Terrible");
				break;
				case "star_2":
					$("#meaning").html("Poor");
				break;
				case "star_3":
					$("#meaning").html("Average");
				break;
				case "star_4":
					$("#meaning").html("Very Good");
				break;
				case "star_5":
					$("#meaning").html("Excellent");
				break;
				default:
					$("#meaning").html("");
				break;
			}
			
            //$(this).nextAll().removeClass('star_empty');   
        },  
        // Handles the mouseout  
        function() {  
            $(this).prevAll().andSelf().removeClass('star_full');
			$("#meaning").html("Click to Rate");
            //set_votes($(this).parent());  
        }  
    );  
    
    
    $("#loadmorepost").die().click(function(){
    	$("#loader").fadeIn();
    	
    	$.ajax({
			url: "sampleajaxpost.php",
			cache: true,
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			timeout: 20000,
			dataType: 'html'
		}).done(function( data ) {
			$("#profileReviewBox").append(data);
			var x = 0;
			$("#profileReviewBox").find(".reviewContainer").each(function(){
				x++;
				$(this).removeClass("whitebg");
				if(x%2 == 0){
					$(this).addClass("whitebg");
				}
				
			});
			$("#loader").fadeOut();
		});
    	
    });

});
