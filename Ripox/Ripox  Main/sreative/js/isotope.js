(function($) {
	jQuery(document).ready(function() {
		"use strict";
		
		// Masonry Portfolio
		jQuery(function(){
   		var $container = jQuery('.works .masonry');
     	$container.imagesLoaded( function(){
        $container.masonry({
           itemSelector : '.works .masonry li'
         });
       	});
     	});
		
		// Isotope works filter
		jQuery(window).load(function(){
			var $container = jQuery('.latest-works ul, .works ul');
		$container.isotope({
			filter: '*',
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		   }
		});
	 
		jQuery('.works-filter a').click(function(){
		jQuery('.works-filter .current').removeClass('current');
		jQuery(this).addClass('current');
	 
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
			}
		});
			return false;
		}); 
		});
})(jQuery);
});