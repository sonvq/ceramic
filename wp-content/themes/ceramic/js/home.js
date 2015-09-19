// Initialize
jQuery(function($) {
    $('.counter').each(function (e) {
		$(".timer").waypoint(function() {
			$('.timer').countTo();
		}, { offset: '85%', triggerOnce:true});
	});	
});