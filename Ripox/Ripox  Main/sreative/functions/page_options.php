<?php
/*    Page Option  */

add_action('admin_init', 'decneo_page_init');

function decneo_page_init() {
	add_meta_box("page-options", esc_html( 'Page Options', 'multipixels' ), "decneo_page_options", "page", "normal", "high");
	add_meta_box("page-options", esc_html( 'Page Options', 'multipixels' ), "decneo_page_options", "post", "normal", "high");
	add_meta_box("page-options", esc_html( 'Page Options', 'multipixels' ), "decneo_page_options", "portfolio", "normal", "high");
	add_action('save_post','update_page_data');
}

/*    Sidebar Select Box    */

function decneo_sidebar_choose( $name = '', $current_value = false ) {
    global $wp_registered_sidebars;

    if( empty( $wp_registered_sidebars ) )
        return;

    $name = ( empty( $name ) ) ? false : ' name="' . esc_attr( $name ) . '"';
    $current = ( $current_value ) ? esc_attr( $current_value ) : false;     
    $selected = '';
    ?>
    <select<?php echo balancetags($name); ?>>
    <?php foreach( $wp_registered_sidebars as $sidebar ) : ?>
        <?php 
        if( $current ) 
            $selected = selected( $sidebar['name'] == $current, true, false ); ?> 
        <option value="<?php echo balancetags($sidebar['name']); ?>"<?php echo balancetags($selected); ?>><?php echo balancetags($sidebar['name']); ?></option>
    <?php endforeach; ?>
    </select>
    <?php
}

function update_page_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["header_title"]) ) {
			update_post_meta($post->ID, "header_title", $_POST["header_title"]);
		}
		if( isset($_POST["header_sub_title"]) ) {
			update_post_meta($post->ID, "header_sub_title", $_POST["header_sub_title"]);
		}
		if( isset($_POST["sidebar_type"]) ) {
			update_post_meta($post->ID, "sidebar_type", $_POST["sidebar_type"]);
		}else{
			update_post_meta($post->ID, "sidebar_type", 0);
		}
		if( isset($_POST["sidebar"]) ) {
			update_post_meta($post->ID, "sidebar", $_POST["sidebar"]);
		}
		if( isset($_POST["image_bg"]) ) {
			update_post_meta($post->ID, "image_bg", $_POST["image_bg"]);
		}
	}
}

function decneo_page_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["header_title"][0])){
		$header_title = $custom["header_title"][0];
	}else{
		$header_title = "";
	}
	if (isset($custom["header_sub_title"][0])){
		$header_sub_title = $custom["header_sub_title"][0];
	}else{
		$header_sub_title = "";
	}
	if (isset($custom["sidebar_type"][0])){
		$sidebar_type = $custom["sidebar_type"][0];
	}else{
		$sidebar_type = 0;
		$custom["sidebar_type"][0] = 0;
	}
	if (isset($custom["sidebar"][0])){
		$sidebar = $custom["sidebar"][0];
	}else{
		$sidebar = false;
	}
	if (isset($custom["image_bg"][0])){
		$image_bg = $custom["image_bg"][0];
	}else{
		$image_bg = "";
	}
?>

    <div id="page-options">
        <table cellpadding="10" cellspacing="10">

            <tr>
                <td style="width:160px;"><label><?php esc_html_e('Page & Post Title :','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Please leave it,if you do not want a title for a page or post Ex: About Our Company','multipixels'); ?></i></label></td><td><input name="header_title" style="width:420px" value="<?php echo balancetags($header_title); ?>" /></td>	
            </tr>
			<tr>
                <td style="width:160px;"><label><?php esc_html_e('Page & Post Sub Title : ','multipixels'); ?><i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Please leave it,if you do not want a sub title for a page or post Ex:  &nbsp; - &nbsp;  Who we are and what we do ','multipixels'); ?></i></label></td><td><input name="header_sub_title" style="width:420px" value="<?php echo balancetags($header_sub_title); ?>" /></td>	
            </tr>
            <tr>
                <td><label><?php esc_html_e('Choose one of your sidebars','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Select Sidebar','multipixels'); ?></i></label></td>
                <td>
                <?php decneo_sidebar_choose("sidebar",$sidebar); ?>
                </td>	
            </tr>
			<tr>
                <td><label><?php esc_html_e('Sidebar Type:','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Select the sidebar bettween Left and Right','multipixels'); ?></i></label></td>
                <td>
                <input type="radio" name="sidebar_type" value="1" <?php if( isset($sidebar_type)){checked( '1', $custom[ 'sidebar_type' ][0] ); } ?> /> <?php esc_html_e('Right','multipixels'); ?> </br></br>
                <input type="radio" name="sidebar_type" value="0" <?php if( isset($sidebar_type)){checked( '0', $custom[ 'sidebar_type' ][0] ); } ?> /> <?php esc_html_e('Left','multipixels'); ?>
                </td>	
            </tr>
			<tr>
                <td style="width:220px;">
				<label><?php esc_html_e('Background Image URL: ','multipixels'); ?><i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Put BG image link for individual page or post Title, if you do not want the bg just leave it blank','multipixels'); ?></i></label></td>
				<td>
				<input name="image_bg" id="image_bg" style="width:420px;" value="<?php echo balancetags($image_bg); ?>" />
				</td>	
                
		   </tr>
			
        </table>
    </div>
      
<?php
}


/*  Post Options  */

add_action('admin_init', 'decneo_add_post_options');

function decneo_add_post_options() {
	add_meta_box("postformat-options", esc_html( 'Post Options', 'multipixels' ), "decneo_postformat_options", "post", "normal", "high");
	add_action('save_post','update_post_data');
}

function update_post_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["postformat_type"]) ) {
			update_post_meta($post->ID, "postformat_type", $_POST["postformat_type"]);
		}else{
			update_post_meta($post->ID, "postformat_type", 0);
		}
		if( isset($_POST["postformat_slider"]) ) {
			update_post_meta($post->ID, "postformat_slider", $_POST["postformat_slider"]);
		}
		if( isset($_POST["postformat_video"]) ) {
			update_post_meta($post->ID, "postformat_video", $_POST["postformat_video"]);
		}
	}
}

function decneo_postformat_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["postformat_type"][0])){
		$postformat_type = $custom["postformat_type"][0];
	}else{
		$postformat_type = 0;
		$custom["postformat_type"][0] = 0;
	}
	
	if (isset($custom["postformat_slider"][0])){
		$postformat_slider = $custom["postformat_slider"][0];
	}else{
		$postformat_slider = "";
	}
	
	if (isset($custom["postformat_video"][0])){
		$postformat_video = $custom["postformat_video"][0];
	}else{
		$postformat_video = "";
	}
?>

    <div id="postformat-options">
        <table cellpadding="15" cellspacing="15">
            <tr>
                <td style="width:150px;"><label><?php esc_html_e('Post Format Type:','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Caution : The thumbnail image for the post is always specified via "Set featured image" on the right','multipixels'); ?></i></label></td>
                <td>             
                <input type="radio" name="postformat_type" value="0" <?php if( isset($postformat_type)){checked( '0', $custom[ 'postformat_type' ][0] ); } ?> /> <?php esc_html_e('Image','multipixels'); ?> &nbsp; &nbsp;</br></br>
                <input type="radio" name="postformat_type" value="1" <?php if( isset($postformat_type)){checked( '1', $custom[ 'postformat_type' ][0] ); } ?> /> <?php esc_html_e('Slide show','multipixels'); ?> &nbsp; &nbsp;</br></br>
                <input type="radio" name="postformat_type" value="2" <?php if( isset($postformat_type)){checked( '2', $custom[ 'postformat_type' ][0] ); } ?> /> <?php esc_html_e('Vimeo Video','multipixels'); ?> &nbsp; &nbsp;</br></br>
                <input type="radio" name="postformat_type" value="3" <?php if( isset($postformat_type)){checked( '3', $custom[ 'postformat_type' ][0] ); } ?> /> <?php esc_html_e('Youtube Video','multipixels'); ?>
                </td>	
            </tr>
            <tr>
                <td style="width:210px;"><label><?php esc_html_e('Slide show Image URL :','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Caution : Separate each url by hit enter on the keyboard after each url','multipixels'); ?></i></label></td><td><textarea name="postformat_slider" style="width:300px;height:100px;"/><?php echo balancetags($postformat_slider); ?></textarea></td>	
            </tr>
            <tr>
                <td style="width:210px;"><label><?php esc_html_e('Vimeo or Youtube Video ID :','multipixels'); ?> <i style="color: #ff0000;"><br/><?php esc_html_e('Example for Vimeo video id: 28284313 <br/> Example for Youtube video id : BO3N6VdYCjY ','multipixels'); ?></i></label></td><td><input name="postformat_video" style="width:300px" value="<?php echo balancetags($postformat_video); ?>" /></td>	
            </tr>         
        </table>
    </div>
      
<?php
}
?>