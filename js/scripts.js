jQuery(function($){

/////////////////  NO FOLLOW ON STAGING  \\\\\\\\\\\\\\\\\

$(document).ready(function() {
	if ( window.location.href.indexOf("d4tw.dev") > -1 ) {
		console.log('on dev server');
    } else if ( window.location.href.indexOf(".d4tw") > -1) {
		//console.log('on d4tw');
		//alert('NEED TO UPDATE WP CONFIG FILE DB SETTINGS');
    	}
	else {
    	alert('NEED TO REMOVE NOINDEX FROM HEADER & THIS LINE FROM JS');
    }
});

/////////////////  PUSH DOWN FOOTER  \\\\\\\\\\\\\\\\\
$(document).ready(function() {
	$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
});

//end of file
});