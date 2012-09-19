$(document).ready(function(){
	/*
	$(".haschild").live('mouseover',function(){
		$(this).children("ul.sub").slideDown();
	});
	$(".haschild").live('mouseout',function(){
		$(this).children("ul.sub").slideUp();
	});
	*/
	
	$("#changelocationbutton").live("click",function(){
		$(".categoryfilter").toggle();
	});
	
	$(".wasthishelpfulbutton").live('click',function(){
		var arrDat = $(this).attr("id");
		    arrDat = arrDat.split("-");
		var action_type = arrDat[0];
		var comment_vote = arrDat[1];
		var comment_id = arrDat[2];
		
		var parentObject = $(this).parent();
		var loaderObject = $(this).parent().siblings("div");
		
		$.ajax({
			url: "/helpful-vote/"+comment_id+"/"+comment_vote+"/"+action_type,
			beforeSend: function(){
				loaderObject.children("img").fadeIn();
			},
			success: function(data){
				if(data == "error"){
					str = '<span>Was this post helpful?</span> <span class="errorhelpful">Error, please try again after a little while.</span>';
				}else if( data == "notlogin"){
					str = '<span class="errorhelpful">Please login first!</span>';
				}else{
					var dataArray = data.split("-");
					if(dataArray[0] == "yes"){
						str = '<span>Was this post helpful?</span> <span class="selectedhelpful">Yes</span> or <a class="wasthishelpfulbutton" href="javascript:void(0);" id="changehelpful-no-'+comment_id+'">No</a>';
					}else if(dataArray[0] == "no"){
						str = '<span>Was this post helpful?</span> <a href="javascript:void(0);" id="changehelpful-yes-'+comment_id+'" class="wasthishelpfulbutton">Yes</a> or <span class="selectedhelpful">No</span>';
					}
				}
				
				loaderObject.children("img").hide();
				parentObject.html(str);
				
			}
		});
	});
	
	$('#searchbutton').click(function(){
		if($("#searchframe:visible").length <= 0){
			  
			    $('#searchframe').animate({
			    opacity: 1,
			    top: '54'
			  }, 200, function() {
			    // Animation complete.
			    $(this).show();
				$("#searchinputbox").focus();
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
	$(".menulinks li ul li a, .sidebar_page a").prepend('<span class="arrow">&nbsp;</span>');
	
	$(".sidebar_page li .children").parent().children("a").append(' &raquo;');
	
	/*
	$(".haschild").hover(function(){
		$(this).find(".submenu").fadeIn();
	},function(){
		$(this).find(".submenu").fadeOut();
	});
	*/
	
	$(".footer a, .menulinks li ul li a, .sidebar_page a").hover(function(){
		$(this).find("span.arrow").stop().animate({"width":"10px", "margin-right":"2px"},200);
	}, function(){
		$(this).find("span.arrow").stop().animate({"width":"0", "margin-right":"0px"},200);
	});
	
	$.ajax({
			url: "/weather.php",
			data: { loc: "Manila,+Philippines" },
			cache: true,
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			timeout: 20000,
			dataType: 'json'
		}).done(function( data ) {
			$.Temperature = data.Today.temp[0];
			
			$("span#weatherdegrees").html($.Temperature + '&deg;');
			$("li.weathercentralhead").fadeIn();
			
			/*
			$("#deg").html($.Temperature + '&deg;');
			$("li.weathercentralhead").fadeIn();
			$("#weatherlocation").html(data.Location.city[0] + ", " + data.Location.country[0]);
			$("#sun").html("Sunrise: " + data.Astronomy.sunrise[0] +  " | Sunset: "+ data.Astronomy.sunset[0] );
			$("#weathercondition").html(data.Today.condition[0]);
			*/
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
		if($(this).html() == "Share Your Experience"){
			$("#write-a-review").fadeIn({duration: 1500, easing: 'easeOutExpo' });
			return false;
		}else{
			return true;
		}
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
	
	$("#locationfilter").live("change",function(){
		var thisvalue = $(this).val();
		var filtercat = $("#filtercat").val();
		$(this).parent("form").attr("action",'/landing/'+filtercat+'/'+thisvalue);
		$("#filtercat").attr("name",'');
		$(this).attr("name",'');
		$(this).val("");
		$("#filtercat").val("");
		$(this).parent("form").submit();
	});
	
	$("#searchform").live("submit",function(){
		var myval = $("#searchinputbox").val();
		if($.trim(myval) == ""){
			alert("Please enter search term");
			return false;
		}else{
			return true;
		}
	});
	
	$("#searchinputbox").keyup(function(e){
		if(e.keyCode == 13){
			//submit search form
			var myval = $(this).val();
			if($.trim(myval) == ""){
				return false;
			}else{
				return true;
			}
		}
	});

});
