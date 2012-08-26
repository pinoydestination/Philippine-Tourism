$(document).ready(function(){				
				
				function rePaint(){
					var windowWidth = ($(window).width())/2;
					var windowHeight = $(window).height()/2;
					
					var overlayWidth = $("#overlay").width()/2;
					var overlayHeight = $("#overlay").height()/2;
					
					
					var loadingWidth = $(".ajaxloader").width()/2;
					var loadingHeight = $(".ajaxloader").width()/2;
					
					var overAll = windowWidth-overlayWidth;
					var overallTop = windowHeight-overlayHeight;
					
					var finalLoadingLeft = windowWidth-loadingWidth;
					var finalLoadingTop = windowHeight-loadingHeight;
					
					$("#overlay").css("left",overAll);
					$("#overlay").css("top",overallTop);
					
					$(".ajaxloader").css('left', finalLoadingLeft);
					$(".ajaxloader").css('top', finalLoadingTop);
					
					offset = $(".changeMonth").offset();
					$(".monthSelection").offset({top: offset.top+22,left: offset.left});
					
				}
				
				rePaint();
				
				$(window).resize(function(){
					rePaint();
				});
				
				$("a.addevent").click(function(){
					
					$(".monthSelection").fadeOut("fast");
					$(".yearSelection").fadeOut("fast");
					data1 = $(this).attr("rel");
					data = data1.split("|");
					
					
					$("#overlay").hide();
					$("#dateofEvent").html(data[0]);
					$("#eventDate").val(data1);
					
					$("#overlay").fadeIn("fast");
					$(".overlaybg").fadeIn('slow');
					
					$.currentObject = $(this).parent().siblings("span:first");
					
					return false;
				});
				$("a#cancel").live('click', function(){
					$("#overlay").fadeOut("fast");
					$(".overlaybg").fadeOut('slow');
					$("#processmessage").fadeOut();
				});
				
				$(".changeMonth").live('click', function(){
					$(".monthSelection").fadeOut("fast");
					$(".yearSelection").fadeOut("fast");
					
					offset = $(this).offset();
					$(".monthSelection").offset({top: offset.top+22,left: offset.left});
					
					if($(".monthSelection:visible").length < 1){
						$(".monthSelection").fadeIn("fast");
						$(".monthSelection").offset({top: offset.top+22,left: offset.left});
					}else{
						$(".monthSelection").fadeOut("fast");
						$(".monthSelection").offset({top: offset.top+22,left: offset.left});
					}
					
					return false;
				});
				
				
				
				$(".changeYear").live('click', function(){
					$(".monthSelection").fadeOut("fast");
					$(".yearSelection").fadeOut("fast");
					
					offset = $(this).offset();
					$(".yearSelection").offset({top: offset.top+22,left: offset.left});
					
					if($(".yearSelection:visible").length < 1){
						$(".yearSelection").fadeIn("fast");
						$(".yearSelection").offset({top: offset.top+22,left: offset.left});
					}else{
						$(".yearSelection").fadeOut("fast");
						$(".yearSelection").offset({top: offset.top+22,left: offset.left});
					}
					
					return false;
				});
				
				$(".monthbutton").live('click', function(){
					$(".monthSelection").fadeOut("fast");
					$(".yearSelection").fadeOut("fast");
					var monthName = $(this).html();
					$(".monthSelection").fadeOut("fast");
					$("#monthName").html(monthName);
					//return false;
				});
				
				$("form#addeventform").live('submit',function(){
					var formData = $("form#addeventform").serialize();
					var formDataArray = $("form#addeventform").serializeArray();
					var theTime = formDataArray;
					var timeValueInt = theTime[0].value;
					timeValueInt = timeValueInt.split("|");
					timeValueInt = timeValueInt[2];
					$.ajax({
						url: $("form#addeventform").attr('action'),
						data: formData,
						type: $("form#addeventform").attr('method'),
						statusCode:{
							404: function(){
								$(".ajaxloader").hide();
								$("#processmessage").html("File Not Found!");
								$("#processmessage").fadeIn();
							}
						},
						beforeSend: function(){
							$(".ajaxloader").show();
							$("#processmessage").fadeOut();
						},
						success: function(data){
							$(".ajaxloader").hide();
							$("#overlay").fadeOut("fast");
							$(".overlaybg").fadeOut('slow');
							$("#processmessage").fadeOut();
							$("form#addeventform input[type=text]").val("");
							$("form#addeventform textarea").val("");
							currentObject = $.currentObject;
							
							
							
							$.currentObject.html("<a href='viewEvents.php?time="+ timeValueInt +"' class='dateClass'>"+currentObject.html()+"</a>");
						}
					});
					
					return false;
				})
				
			});