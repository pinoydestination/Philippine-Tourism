// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
      arguments.callee = arguments.callee.caller;
      console.log( Array.prototype.slice.call(arguments) );
  }
};
// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});

jQuery(document).ready(function($){
    // Uploader
    var uploadID = ''; /*setup the var*/

    jQuery('.upload-button').click(function() {
        uploadID = jQuery(this).prev('input'); /*grab the specific input*/
        formfield = jQuery('.upload').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        uploadID.val(imgurl); /*assign the value to the input*/
        tb_remove();
    };
    
    // Color Picker
    $('.pickcolor').click( function(e) {
		colorPicker = jQuery(this).next('div');
		input = jQuery(this).prev('input');
		$(colorPicker).farbtastic(input);
		colorPicker.show();
		e.preventDefault();
		$(document).mousedown( function() {
    		$(colorPicker).hide();
    	});
	});
});

