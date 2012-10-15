$(document).ready(function(){
	
	function getAdLeftPos(){
		var posTop = $(".cut").offset();
		console.log(posTop);
		$("#adleft").offset({top:posTop.top+12, left: posTop.left-$("#adleft").width()-10});
		$("#adright").offset({top:posTop.top+12, left: posTop.left+$(".cut").width()+7});
		$("#adleft").show();
		$("#adright").show();
	}
		
	$(window).resize(function(){
		myItineraryReposition();
		/*getAdLeftPos();*/
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
		$(this).slideUp();
		var data = $(this).attr("inline-data");
		$.ajax({
			url:"/off-page/itinerary.php",
			data: "data="+data,
			success: function(data){
				$("#olListIti").append(data);
				$("div#itihead").show();
				if($("#showmyitinerary").hasClass("activemenu")){
					/*$("#showmyitinerary").removeClass("activemenu");*/
				}else{
					$("#showmyitinerary").addClass("activemenu");
				}
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
		var href = "http://www.pinoydestination.com/googlemap/gmapleg.php?waypoints="+stringAddress;
		$(this).attr("href",href);
		return false;
	});
	$("a#showmyitinerary").live('click',function(){
		if($(this).hasClass("activemenu")){
			$(this).removeClass("activemenu");
		}else{
			$(this).addClass("activemenu");
		}
		$("div#itihead").toggle();
		myItineraryReposition();
		return false;
	});
	/*getAdLeftPos();*/
});