$(document).ready(function(){

	processConsole = function(data){
		$.ajax({
		  url: 'process.php',
		  data: "command="+data,
		  success: function(data) {
			$("#console").append(data);
		  }
		});
	}

	processConsole("dir");
	
	
	$("#consolecommand").keyup(function(e){
		if(e.keyCode == 13){
			processConsole($(this).val());
		}
	});
	
});