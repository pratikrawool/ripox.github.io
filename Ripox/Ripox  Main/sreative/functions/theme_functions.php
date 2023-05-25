<?php
	
	
	/*  Register Menu  */
    if(function_exists('add_theme_support')){
	
		add_theme_support('menus');
		register_nav_menus(array('main_menu' =>'Main Navigation Menu'));
		
	}	
    
	/* Add custom sub menu class */
	class decneo_Walker_Nav_Menu extends Walker_Nav_Menu {
	  function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	  }
	}
	
	add_filter('wp_nav_menu_items','decneo_add_contact_menu', 10, 2);
    function decneo_add_contact_menu( $items, $args ) {
    if( $args->theme_location == 'main_menu' )
        return $items.'<li><a href="#" class="hamburger-menu"><i class="ion-navicon"></i></a></li>';

    return $items;
    }
		
	/*   Get All Custom Fields From A Page Or A Post    */	
		
	function all_pp($id = 0){
    if ($id == 0) :
        global $wp_query;
        $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
        	$id = $content_array->ID;
		}
    endif;   

    $first_array = get_post_custom_keys($id);

	if(isset($first_array)){
		foreach ($first_array as $key => $value) :
			   $second_array[$value] =  get_post_meta($id, $value, FALSE);
				foreach($second_array as $second_key => $second_value) :
						   $result[$second_key] = $second_value[0];
				endforeach;
		 endforeach;
	 }
	
	if(isset($result)){
    	return $result;
	  }
    }
	
/* lang */

function decneo_custom_theme_setup() {  
  
    // Retrieve the directory for the localization files  
    $lang_dir = (get_template_directory() . '/lang');  
  
    // Set the theme's text domain using the unique identifier from above  
    load_theme_textdomain('multipixels', $lang_dir); 
 
} // end decneo_custom_theme_setup 
add_action('after_setup_theme', 'decneo_custom_theme_setup');


function decneo_custom_plugin_setup() {  
    load_plugin_textdomain('multipixels', false, dirname(plugin_basename(__FILE__)) . '/lang/');  
} // end decneo_custom_theme_setup  
add_action('after_setup_theme', 'decneo_custom_plugin_setup');

add_action( 'after_setup_theme', 'decneo_theme_title' );
function decneo_theme_title() {

    add_theme_support( 'title-tag' );

}	
	
/*   Get Catgory Slug Using Catgory ID     */

   function getidslug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	  } else {
		return null;
	  }
    };

if ( ! function_exists( 'decneo_comment' ) ) :

/*   Function To Get Comment List   */
function decneo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="con_comment">
		<div class="comment_author">
			<?php echo get_avatar( $comment, 50 ); ?>
		</div>


		<div class="comment_text">
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<?php  printf( esc_html( '%s ', 'multipixels' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?><br />
			<span class="time">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( esc_html( '%1$s', 'multipixels' ), get_comment_date(),  get_comment_time() ); ?></a>
				&nbsp;<?php edit_comment_link( esc_html( '(Edit)', 'multipixels' ), ' ' );?>
			</span>
			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php esc_html_e( 'Your comment is waiting moderation.', 'multipixels' ); ?></em>
			<?php endif; ?>
		
		</div>
		<div class="clear"></div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'multipixels' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html('(Edit)', 'multipixels'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/* Limit words in Excerpt wordpress http://creativemindtechnology.com/how-to-limit-words-in-excerpt-or-content-wordpress/ */

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

	return $excerpt;
}

?>