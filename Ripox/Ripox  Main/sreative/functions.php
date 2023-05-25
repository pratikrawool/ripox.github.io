<?php	

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );


/**
 * Theme Options */

include_once( 'includes/theme-options.php' );

define('PAGES_FUNCTIONS', get_template_directory() .'/functions');
define('PAGES_JAVASCRIPT', get_template_directory_uri() .'/js');

/* css Stlye */

function decneo_stylesheet() {
        wp_enqueue_style( 'style', get_template_directory_uri() .'/style.css');
		wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.css');		
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.css');
		wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() .'/css/bootstrap.min.css');
		wp_enqueue_style( 'ionicons', get_template_directory_uri() .'/css/ionicons.css');
		wp_enqueue_style( 'fancybox', get_template_directory_uri() .'/css/jquery.fancybox.css');
		wp_enqueue_style( 'flexslider', get_template_directory_uri() .'/css/flexslider.css');
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css');
		wp_enqueue_style( 'mainstyle', get_template_directory_uri() .'/css/style.php');
}
add_action('wp_enqueue_scripts', 'decneo_stylesheet');

/* Theme Function */
require_once(PAGES_FUNCTIONS . '/theme_functions.php');
require_once(PAGES_FUNCTIONS . '/theme_support.php');
require_once(PAGES_FUNCTIONS . '/pagination.php');

/* JavaScripts, Widgets, Sidebars */
require_once(PAGES_FUNCTIONS . '/js.php');
require_once(PAGES_FUNCTIONS . '/widgets.php');
require_once(PAGES_FUNCTIONS . '/register_sidebars.php');

/* Page Options */
require_once(PAGES_FUNCTIONS . '/page_options.php');

/*  Aqua Resizer */

require_once(PAGES_FUNCTIONS . '/aq_resizer.php');

/*  Visual Composer */
require_once(PAGES_FUNCTIONS . '/vc_shortcodes.php');	


//Visual Composer
// Add new Param in Row
// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'container row', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }
  if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
    $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'col-sm-$1', $class_string ); // This will replace "vc_col-sm-%" with "my_col-sm-%"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}

if(function_exists('vc_add_param')){

    vc_add_param('vc_row',array(
				  "type" => "textfield",
				  "heading" => __('Custom attribute', 'wpb'),
				  "param_name" => "custom",
				  "value" => "",
				  "description" => '',   
    ));
}

/* content width has been defined */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'decneo_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function decneo_register_required_plugins() {
 
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		/** This is an example of how to include a plugin pre-packaged with a theme */
		array(
			'name'     => 'Shortcode Re-Pack By Decneo', // The plugin name
			'slug'     => 'sreative-shortcodes', // The plugin slug (typically the folder name)
			'source'   => get_stylesheet_directory() . '/lib/plugins/sreative-shortcodes.zip', // The plugin source
			'required' => false,
		),
		array(
			'name'     => 'Options importer', // The plugin name
			'slug'     => 'options-importer', // The plugin slug (typically the folder name)
			'source'   => get_stylesheet_directory() . '/lib/plugins/options-importer.zip', // The plugin source
			'required' => false,
		),
		array(
			'name'     => 'Portfolio post type by Decneo', // The plugin name
			'slug'     => 'portfolio-post-type-decneo', // The plugin slug (typically the folder name)
			'source'   => get_stylesheet_directory() . '/lib/plugins/portfolio-post-type-decneo.zip', // The plugin source
			'required' => false,
		),
		array(
			'name'     => 'WPBakery Visual Composer', // The plugin name
			'slug'     => 'js_composer', // The plugin slug (typically the folder name)
			'source'   => get_stylesheet_directory() . '/lib/plugins/js_composer.zip', // The plugin source
			'required' => true,
		),
	);
 
	/** Change this to your theme text domain, used for internationalising strings */
	$theme_text_domain = 'tgmpa';
 
	/**
	 * Array of configuration settings. Uncomment and amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * uncomment the strings and domain.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'strings'      	 => array(
		),
	);
 
	tgmpa( $plugins, $config );
 
} 	
	
?>
