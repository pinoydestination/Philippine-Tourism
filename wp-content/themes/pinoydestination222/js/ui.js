$(document).ready(function(){
	
	
	
	$(window).resize(function(){
		myItineraryReposition();
	});
	
	
	myItineraryReposition = function(){
		var parentOffset = $("#itihead").parent("div.menu").offset();
		var menuheight = $("#itihead").parent("div.menu").height();
		$("#itihead").offset({top: parentOffset.top+menuheight ,left: parentOffset.left+10});
	}
	
	
	sideBarResize = function(){
		$("#sidebarPanel").height($("#mainDocument").height());
	}


	sideBarResize();
	myItineraryReposition();
	
	
	if($(".searchresultBox").length >= 1){
		$(".searchresultBox").delay(800).each(function(){
			$(this).fadeIn(400);
		});
	}
	
	$("div.tabscontent").hide();
	$("div.tabscontent:first").show();
	
	
	$(".tabs a").click(function(){
		$(".tabs a").removeClass("active");
		$(this).addClass("active");
		var activatethis = $(this).attr("activate");
		$("div.tabscontent").hide();
		$(activatethis).show();
		return false;
	});
	
	
	
	$("#addthistomyitinerary").live("click",function(){
		var data = $(this).attr("inline-data");
		$.ajax({
			url:"/off-page/itinerary.php",
			data: "data="+data,
			success: function(data){
				$("#olListIti").append(data);
				$("div#itihead").show();
				myItineraryReposition();
			}
		});
	});
	
	
	$("a.removeallitinerary").live('click',function(){
		$.ajax({
			url:"/off-page/itinerary.php",
			data: "request=removeall",
			success: function(data){
				$("#olListIti").append(data);
				$("div#itihead").show();
				myItineraryReposition();
			}
		});
	});
	$("a.showinmap").live('click',function(){
		var stringAddress = "";
		$("#olListIti").children("li").children("span.itilocationaddress").each(function(){
			legAddress = $.trim($(this).html());
			if(stringAddress == ""){
				stringAddress = legAddress;
			}else{
				stringAddress = stringAddress + "|" + legAddress;
			}
		});
		var href = "http://www.pinoydestination.com/gmapleg.php?waypoints="+stringAddress;
		$(this).attr("href",href);
		return true;
	});
	$("a#showmyitinerary").live('click',function(){
		$("div#itihead").toggle();
		myItineraryReposition();
		return false;
	});
});