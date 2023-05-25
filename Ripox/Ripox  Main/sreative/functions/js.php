<?php

/*  Load JS  */

function decneo_add_our_scripts() {
        wp_enqueue_script('jquery');
		wp_enqueue_script( 'bootstrap', PAGES_JAVASCRIPT .'/bootstrap.js',array('jquery'), '', true);
		wp_enqueue_script( 'bootstrap-min', PAGES_JAVASCRIPT .'/bootstrap.min.js',array('jquery'), '', true);			
		wp_enqueue_script( 'fancybox', PAGES_JAVASCRIPT .'/jquery.fancybox.js',array('jquery'), '', true);
		wp_enqueue_script( 'jquery.stellar', PAGES_JAVASCRIPT .'/jquery.stellar.js',array('jquery'), '', true);		
		wp_enqueue_script( 'owl-carousel', PAGES_JAVASCRIPT .'/owl.carousel.js',array('jquery'), '', true);
		wp_enqueue_script('prefixfree', PAGES_JAVASCRIPT .'/prefixfree.min.js',array('jquery'), '', true);
		wp_enqueue_script( 'fitvids', PAGES_JAVASCRIPT .'/jquery.fitvids.js',array('jquery'), '', true);
		wp_enqueue_script( 'waypoints', PAGES_JAVASCRIPT .'/waypoints.min.js',array('jquery'), '', true);
		wp_enqueue_script( 'wow', PAGES_JAVASCRIPT .'/wow.js',array('jquery'), '', true);
	    
		//countto
	    if(is_page_template('homepage1.php') || is_page_template('homepage2.php') || is_page_template('homepage3.php') || is_page_template('index.php') || is_page_template('single.php')) {
		wp_enqueue_script( 'flexslider', PAGES_JAVASCRIPT .'/jquery.flexslider.js',array('jquery'), '', true);
		wp_enqueue_script( 'flexslider_custom', PAGES_JAVASCRIPT .'/flexslider.js',array('jquery'), '', true);
     	}
		
	    //gmap3
	    if(is_page_template('contact.php')) {	
		wp_enqueue_script('google_maps_api', 'http://maps.googleapis.com/maps/api/js?sensor=false', '', 1.0 );
		wp_enqueue_script( 'gmap3', PAGES_JAVASCRIPT .'/gmap3.js',array('jquery'), '', true);
		wp_enqueue_script( 'map', PAGES_JAVASCRIPT .'/map.php',array('jquery'), '', true);
        }
		
		//Masonry
	    if(is_page_template('home1.php') || is_page_template('home2.php') || is_page_template('home3.php') || is_page_template('portfolio.php') || is_page_template('portfolio-nonspaced.php') || is_page_template('portfolio-spaced.php')) {
		wp_enqueue_script( 'masonry', PAGES_JAVASCRIPT .'/masonry.js',array('jquery'), '', true);
		wp_enqueue_script( 'isotope-main', PAGES_JAVASCRIPT .'/isotope.min.js',array('jquery'), '', true);	
		wp_enqueue_script( 'isotope', PAGES_JAVASCRIPT .'/isotope.js',array('jquery'), '', true);	
     	}
     	
	    //countto
	    if(is_page_template('home1.php') || is_page_template('home2.php') || is_page_template('home3.php') || is_page_template('about.php')) {
		wp_enqueue_script( 'counterup', PAGES_JAVASCRIPT .'/jquery.counterup.min.js',array('jquery'), '', true);
		wp_enqueue_script( 'counter', PAGES_JAVASCRIPT .'/counter.js',array('jquery'), '', true);
     	}
     

        //validate
	    if(is_page_template('contact.php')) {		
		wp_enqueue_script( 'validate', PAGES_JAVASCRIPT .'/jquery.validate.js',array('jquery'), '', true);
     	}
     				

		wp_enqueue_script( 'custom', PAGES_JAVASCRIPT .'/scripts.js',array('jquery'), '', true);
		if(is_singular()) 	
			wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'decneo_add_our_scripts');

?>