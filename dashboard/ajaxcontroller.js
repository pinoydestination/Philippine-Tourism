$(document).ready(function(){
	$("#addamenity").die().click(function(){
		var amenity = $("#amenity").val();
		var ran = 'loader-'+Math.ceil(Math.random()*9999);
		
		if(amenity == ""){
			alert("Cannot send empty value");
			return false;
		}
		
		$("#amlist").append('<li>'+amenity+'<img id="'+ran+'" class="loader" src="loading.gif" /></li>');
		$("#amenity").val("");
		$("#amenity").focus();
		
		/**
		 * Save via AJAX
		 */
		
		$.ajax({
		  url: "process-ajax.php",
		  data: "action=add_amenity&amenity_name="+amenity,
		  beforeSend: function ( xhr ) {
			xhr.overrideMimeType("text/plain; charset=x-user-defined");
		  },
		  statusCode: {
			404: function() {
			 $("#"+ran).fadeOut();
			}
		  }
		}).done(function ( data ) {
		  $("#"+ran).fadeOut();
		});
		
		return false;
	});
	
	$("#amenity").keyup(function(e){
		if(e.keyCode == 13){
			$("#addamenity").click();
		}
	});
	
	getAllAmenity = function(){
		$.ajax({
		  url: "process-ajax.php",
		  data: "action=get_all_amenity",
		  beforeSend: function ( xhr ) {
			xhr.overrideMimeType("text/html; charset=x-user-defined");
		  },
		  statusCode: {
			404: function() {
			 $("#"+ran).fadeOut();
			}
		  }
		}).done(function ( data ) {
			
			data.replace(":::openli:::","<li>");
			data.replace(":::closeli:::","</li>");
		 $("#amlist").append(data);
		  
		});
	};
	
	
	
	getAllAmenity();
	
});