<?php
/**
 * @package WordPress
 * @subpackage Omnim_Theme
 */
?>

<?php $omnim_search_text = esc_attr('Enter Search ...', 'multipixels'); ?>

<div id="search">   
    <form class="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
    <input name="s" id="s" type="text" onFocus="if(this.value == '<?php echo esc_attr($omnim_search_text) ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo esc_attr($omnim_search_text) ?>'; }" value="<?php echo esc_attr($omnim_search_text) ?>" />
	</form>
</div>