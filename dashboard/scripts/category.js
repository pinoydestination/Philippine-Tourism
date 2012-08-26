$(document).ready(function(){
	
	$.getVacationType = "";
	
	getCategory = function(loc, id, objId, type){
		$.ajax({
		  url: "process.php",
		  data: "action=getCategory&id="+id+"&type="+type,
		  beforeSend: function ( xhr ) {
		    if(loc){
		    	loc.children('img.loading').show();
		    }
		  }
		}).done(function ( data ) {
		
		var newData = data.split(":::::");
		var totalResult = newData[0];
		data = newData[1];
		
		if("addsubsubcat" == type){
			if('no-result' == data){
				data = '<li><a title="Click here if the intended location is not found." href="javascript:void(0);" id="addnewcat">[+] Add New Location</a></li>';
			}else{
				data = '<li><a title="Click here if the intended location is not found." href="javascript:void(0);" id="addnewcat">[+] Add New Location</a></li>'+data;
			}
		}
		
		
		
		 if(data != 'no-result'){
			  $("#"+objId).html(data);
			  $("#"+objId).fadeIn();
			  if(loc){
			  	loc.children('img.loading').fadeOut("fast");
			  }
			  if(totalResult == 1){
			  	$("#"+objId).children(":first").children("a").click();
			  }
			  $("#articleeditor").fadeIn("fast");
		 }else{
		 	if(loc){
		  		loc.children('img.loading').fadeOut("fast");
		  	}
		  	$("#articleeditor").fadeIn("medium");
		 }
		 
		 
		 
		});
	};
	
	
	$("#addnewcat").live("click", function(){
		$(".overlaybg").fadeIn();
		$("#overlay").fadeIn();
		return false;
	});
	
	$("#cancel").live("click", function(){
		$(".overlaybg").fadeOut();
		$("#overlay").fadeOut();
		return false;
	});
	
	$("#addnewcategoryform").live("submit", function(){
		var method = $(this).attr("method");
		var action = $(this).attr("action");
		var formData = $(this).serialize();
		var loc = $(this);
		$.ajax({
		  url: action,
		  data: formData,
		  beforeSend: function ( xhr ) {
		    $("#loaders").fadeIn();
		  },
		  success: function ( data ){
		  	$(".overlaybg").fadeOut();
			$("#overlay").fadeOut();
		  	$("#loaders").fadeOut();
		  	
		  	$("#subSubCategory").children().children("a.chosen").click();
		  	
		  }
		})
		
		
		return false;
	});
	
	
	$(".selectingcat").live('click',function(){
		var type = $(this).attr('id');
		
		loadtype = type.split("-");
		actiontype = loadtype[0];
		var parent_id = loadtype[1];
		
		$("#newparentcat").attr("value",parent_id);
		
		$(this).parent().parent().children().find("a").removeClass("chosen");
		
		if(actiontype == 'parent'){
			getCategory($(this), parent_id,'subCategory', 'subcat');
			$("#addSubCategory").fadeOut("fast");
			$("#subCategory").fadeOut("fast");
			$("#subSubCategory").fadeOut("fast");
		}
		
		if(actiontype == 'subcat'){
			$("#subSubCategory").fadeOut("fast");
			$("#addSubCategory").fadeOut("fast");
			getCategory($(this), parent_id,'subSubCategory', 'subsubcat');
		}
		
		
		if(actiontype == 'subsubcat'){
			getCategory($(this), parent_id,'addSubCategory', 'addsubsubcat');
		}
		
		$(this).addClass('chosen');
		
		var currentType = ($(this).html());
		currentType = currentType.split("<");
		currentType = currentType[0];
		
		if("addsubsubcat" != actiontype){
			$.getVacationType = currentType;
		}	
		
		
		if($.getVacationType == "Hotel" || $.getVacationType == "Resort"){
			$("#amenity-listing").show();
		}else{
			$("#amenity-listing").hide();
		}
		
		
	
	});
	
	$("a.amenitylist").live('click', function(){
		if($(this).hasClass('amselected')){
			$(this).removeClass('amselected');
		}else{
			$(this).addClass('amselected');
		}
	});
	
	$("#publish-button").live('click',function(){
		
	});
	
	$("#postform").submit(function(){
		var tags = "";
		var error = false;
		
		$("a.amenitylist").each(function(){
			if($(this).hasClass('amselected')){
				tags = tags + "," + $(this).attr("id");
			}
		});
		
		$("#inputTag").val(tags);
		
		tags = '';
		
		$(".selectingcat").each(function(){
			if($(this).hasClass("chosen")){
				tags = tags + "," + $(this).attr('id');
			}
		});
		
		$("#inputCategory").val(tags);
		
		tags = "";
		
		$(".required").each(function(){
			if($(this).val() == ""){
				error = true;
			}
		});
		
		
		if(error){
			alert("Yellow fields are required!");
			return false;
		}else{
			return true;
		}
		
		
		return true;
	});
	
	getCategory(false,0,'parentCat', 'parent');
	
});
