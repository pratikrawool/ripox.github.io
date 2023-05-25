(function($) {
	jQuery(document).ready(function() {
		"use strict";
		
		// Parallax parameter
		jQuery.stellar({
			horizontalScrolling: false,
			verticalOffset: 40,
			responsive:true
		});	
		
		// Toogle Classes
		jQuery(".hamburger-menu").click(function() {
		jQuery(".side-menu").addClass("show-me");
		});
		
		jQuery(".side-menu-close").click(function() {
		jQuery(".side-menu").removeClass("show-me");
		});
		
		
		// Services Toggles
		jQuery(".btn1").click(function() {
		jQuery(".services .box .list1").toggleClass("show-me");
		});
		
		jQuery(".btn2").click(function() {
		jQuery(".services .box .list2").toggleClass("show-me");
		});
		
		jQuery(".btn3").click(function() {
		jQuery(".services .box .list3").toggleClass("show-me");
		});
		
		jQuery(".btn4").click(function() {
		jQuery(".services .box .list4").toggleClass("show-me");
		});
		
		jQuery(".btn5").click(function() {
		jQuery(".services .box .list5").toggleClass("show-me");
		});
		
		jQuery(".btn6").click(function() {
		jQuery(".services .box .list6").toggleClass("show-me");
		});
		
		jQuery(".btn7").click(function() {
		jQuery(".services .box .list7").toggleClass("show-me");
		});
		
		jQuery(".btn8").click(function() {
		jQuery(".services .box .list8").toggleClass("show-me");
		});
		
		
		// Fancybox
		jQuery('.fancybox').fancybox({
		  helpers: {
			overlay: {
			  locked: false
			}
		  }
		});
		
		
		// OWL Carousels
		jQuery('.logos-carousel').owlCarousel({
		loop:true,
    	margin:0,
		autoplay:true,
		controls:true,
    	responsiveClass:true,
    	responsive:{
       		0:{
            items:2,
            nav:false
        	},
        	767:{
            items:3,
            nav:false
        	},
        	959:{
            items:3,
            nav:true
        	},
			1024:{
            items:4,
            nav:true
		}
		}
		});
		
		
		// Page transition
		jQuery('.transition').on('click', function(e) {
		jQuery('.transition-overlay').toggleClass("show-me");
		});
		
		
		// Transition delay
		jQuery('.transition').click(function (e) {
			e.preventDefault();                  
			var goTo = this.getAttribute("href"); 
			setTimeout(function(){
			window.location = goTo;
			},1000);       
			});
		});	
	
	
		// Fixed Navigation
		jQuery(window).on("scroll touchmove", function () {
		jQuery('#nav').toggleClass('fixed-nav', jQuery(document).scrollTop() > 1);
		
		});	
		
		jQuery(window).load(function(){
		jQuery(".loading .table .inner").addClass("fade");
		jQuery('.loading').delay(2000).addClass("fade-out");	
	     });
		
		// Scale video
		
	    jQuery(".scale_vid").fitVids();
		
		
		// Wow animations
		wow = new WOW(
			{
				animateClass: 'animated',
				offset:       100
			}
		);
		wow.init();
		
		
})(jQuery);