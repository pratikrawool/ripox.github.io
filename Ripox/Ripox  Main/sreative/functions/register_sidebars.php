<?php
/* Sidebar Registration*/

if ( function_exists('register_sidebar')) {
    
	
	register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'decneo-sidebar-6',
        'before_widget' => '<div class="widget wow fadeInUp" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div><div class="padding60"></div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'decneo-sidebar-5',
        'before_widget' => '<div class="widget wow fadeInUp" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div><div class="padding60"></div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
        'name' => 'Portfolio Sidebar',
        'id' => 'decneo-sidebar-7',
        'before_widget' => '<div class="widget wow fadeInUp" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div><div class="padding60"></div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
		'name' => 'Service Sidebar',
		'id' => 'decneo-sidebar-8',
		'before_widget' => '<div class="widget wow fadeInUp" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div><div class="padding60"></div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
	));
	register_sidebar(array(
        'name' => 'Contact Sidebar',
        'id' => 'decneo-sidebar-9',
        'before_widget' => '<div class="widget wow fadeInUp" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div><div class="padding60"></div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'decneo-sidebar-1',
        'before_widget' => '<div class="col-md-4" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'decneo-sidebar-2',
        'before_widget' => '<div class="col-md-4" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'decneo-sidebar-3',
        'before_widget' => '<div class="col-md-4" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}?>