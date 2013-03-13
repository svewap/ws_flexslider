
jQuery(document).ready(function() {
	
	$('.tx-ws-flexslider .textmode').each(function(){
		var min = 0;
		$(this).find('li').each(function() {
			if($(this).height() > min) {
				min = $(this).height();
			}
		});
		return $(this).find('li').each(function() {
			$(this).height(min).css("overflow","auto");
		});
		
		
	});

});