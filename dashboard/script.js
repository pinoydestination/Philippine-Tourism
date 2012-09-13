$(document).ready(function(){
			
			if(jQuery("#pass-strength-result").length > 0){
				jQuery("#pass1").bind("keyup", function(){
				var pass1 = jQuery("#pass1").val();
				var pass2 = jQuery("#pass2").val();
				var username = jQuery("#username").val();
				var strength = passwordStrength(pass1, username, pass2);
				updateStrength(strength);
				});
				jQuery("#pass2").bind("keyup", function(){
				var pass1 = jQuery("#pass1").val();
				var pass2 = jQuery("#pass2").val();
				var username = jQuery("#username").val();
				var strength = passwordStrength(pass1, username, pass2);
				updateStrength(strength);
				});
			}
			
			
			$("#addnewfile").live("click",function(){
				$("#filebrowsercontainer").append('<input class="filebrowser"  type="file" name="file[]" />');
			});
			

			
			$("#signupform").submit(function(){
				//check all fields if empty
				var error = false;
				$("#signupform").children().each(function(){
					$(this).children("span").remove();
					if($(this).find("input").val() == ""){
						error = true;
						$(this).append("<span class='error'>This field is required</span>");
					}else{
						$(this).children("span").remove();
					}
				});
				if(!error){
					return true;
				}
				return false;
			});
			
			function updateStrength(strength){
				var status = new Array('short', 'bad', 'good', 'strong', 'mismatch');
				var dom = jQuery("#pass-strength-result");
				switch(strength){
				case 1:
				  dom.removeClass().addClass(status[0]).text('Too Short').slideDown();
				  break;
				case 2:
				  dom.removeClass().addClass(status[1]).text("Bad Password").slideDown();
				  break;
				case 3:				  
				  dom.removeClass().addClass(status[2]).text("Good Password").slideDown();
				  break;
				case 4:
				  dom.removeClass().addClass(status[3]).text("Strong Password").slideDown();
				  break;
				case 5:
				  dom.removeClass().addClass(status[4]).text("Mismatch").slideDown();
				  break;
				default:
				  //alert('something is wrong!');
				}
			}

		});