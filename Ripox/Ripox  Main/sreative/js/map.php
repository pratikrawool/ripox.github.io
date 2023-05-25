<?php
header("Content-Type: text/javascript; charset=utf-8");

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if ( function_exists( 'ot_get_option') ) {
	
	/* highlight color */
		if(ot_get_option( 'highlight_color' )!=""){
		 $highlight_color = ot_get_option( 'highlight_color' );
		 }else{
		 $highlight_color = '#febd0e';
	     }
	     if(ot_get_option( 'highlight_sub_color' )!=""){
		 $highlight_sub_color = ot_get_option( 'highlight_sub_color' );
		 }else{
		 $highlight_sub_color = '#00cadf';
	     }
	
	/* Google map */
    if(ot_get_option( 'gooaddress' )!=""){
		 $gooaddress = ot_get_option( 'gooaddress');
		 }else{
		 $gooaddress = 'New York';
	     }
    if(ot_get_option( 'goomapzoom' )!=""){
		 $goomapzoom = ot_get_option( 'goomapzoom');
		 }else{
		 $goomapzoom = '10';
	     }
	
}   
?>
jQuery(document).ready(function($) {
	  /* google map */
	     jQuery('#map').gmap3({
					  marker:{
						address: "<?php echo esc_attr($gooaddress) ?>"  // Your Adress Here
					  },
					  map:{
						options:{
						  zoom: <?php echo esc_attr($goomapzoom) ?>,
						  scrollwheel: false,
						  mapTypeId: google.maps.MapTypeId.ROADMAP
						}
					  }
		});
});