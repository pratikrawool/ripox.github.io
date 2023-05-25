<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'sections'        => array( 
	  array(
        'id'          => 'general_default',
        'title'       => 'Header'
      ),	  
	  array(
        'id'          => 'footer',
        'title'       => 'Footer'
      ),
      array(
        'id'          => 'background',
        'title'       => 'BG & Active areas'
      ),
      array(
        'id'          => 'fonts',
        'title'       => 'Fonts'
      ),
      array(
        'id'          => 'homepage_style1',
        'title'       => 'Homepage'
      ),
	  array(
        'id'          => 'about_us',
        'title'       => 'About us Page'
      ),
	  array(
        'id'          => 'services',
        'title'       => 'Services Page'
      ),
	  array(
        'id'          => 'blog',
        'title'       => 'Blog Page'
      ),
      array(
        'id'          => 'contactheadline',
        'title'       => 'Contact'
      ),
	  array(
        'id'          => 'hightlight',
        'title'       => 'Highlight color'
      )
    ),
    'settings'        => array( 
	  array(
        'id'          => 'favicon_setting',
        'label'       => 'Favicon Setting',
        'desc'        => '<h1 style="color:#04a100">Favicon Setting</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload your favicon logo for your website.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo',
        'label'       => 'Logo Settings',
        'desc'        => '<h1 style="color:#04a100">Logo Setting</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'header_logo',
        'label'       => 'Logo image',
        'desc'        => 'If you would like to use image logo please upload here( Your company Logo ).',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'quick_contact',
        'label'       => 'add quick contact form 7 shortcode',
        'desc'        => 'add quick contact form 7 shortcode',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'nav_pad_top',
        'label'       => 'Main Menu padding top',
        'desc'        => 'adjust the padding top for Menu Navigation ( Ex: 8px ).',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'nav_height',
        'label'       => 'Main Menu Height',
        'desc'        => 'adjust the Height for Menu Navigation ( Ex: 50px ).',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'sub_menu_top',
        'label'       => 'Sub Menu Top',
        'desc'        => 'adjust the margin top for Sub Menu Navigation ( Ex: 55px ).',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_settings',
        'label'       => 'Footer Settings',
        'desc'        => '<h1 style="color:#04a100">Footer Settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_block',
        'label'       => 'footer area choose to show',
        'desc'        => 'Tick " value " If you would like to show on footer area',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'quote',
            'label'       => 'Quote',
            'src'         => ''
          ),
		  array(
            'value'       => 'contact-place',
            'label'       => 'contact footer detail',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'footer_lo',
        'label'       => 'Adding contact detail',
        'desc'        => 'Add contact detail, <strong>title:</strong> LOCATION,<strong>image:</strong> icons image,<strong>link:</strong> no,<strong>description:</strong> Ring Central Plot C: 796 A/3 Mango Avenue, Chicago',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'foot_quote',
        'label'       => 'Footers Quote',
        'desc'        => 'Add quote here',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_left',
        'label'       => 'Footer Bottom Left',
        'desc'        => 'The left bottom text in the footer.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_right',
        'label'       => 'Footer Bottom Right',
        'desc'        => 'The Right bottom text in the footer.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'background_setting',
        'label'       => 'Background Settings',
        'desc'        => '<h1 style="color:#04a100">Background Settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	    array(
        'id'          => 'bg_about',
        'label'       => 'image parallax for about',
        'desc'        => 'Upload image for about',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
	  ),
	    array(
        'id'          => 'bg_quote',
        'label'       => 'background for quote',
        'desc'        => 'Upload Title background for quote',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	    array(
        'id'          => 'active_setting',
        'label'       => 'Active Settings',
        'desc'        => '<h1 style="color:#04a100">Active Settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'filteractive',
        'label'       => 'Portfolio filter',
        'desc'        => 'Active filter on Portfolio page.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'comment_active',
        'label'       => 'Comment Active',
        'desc'        => 'Tick it if you would like to show the comment form for sing post page.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'title_quote_font',
        'label'       => 'Header google font',
        'desc'        => '<h1 style="color:#04a100">Header Google Font</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'text_block',
        'label'       => 'Google font link and font-family',
        'desc'        => '<h3>You can check the google font <a href="http://www.google.com/webfonts#" target="_blank">here</a></h3>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_font_url',
        'label'       => 'Header Title Google Font',
        'desc'        => 'The font used for the header title.</br>
<strong>(Please Input the link URL here. ")<br /> 
Example :<br /> fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,300italic,400italic,600italic </strong>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_font',
        'label'       => 'Google Font',
        'desc'        => 'The font used for the header title.</br>
<strong>(Please Input the font. ")<br />
Example :<br /> \"Josefin Sans\", Arial, sans-serif
</strong>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'general_headlines',
        'label'       => 'General Headlines',
        'desc'        => '<h1 style="color:#04a100">General Headlines</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h1',
        'label'       => 'H1 Font Size',
        'desc'        => 'H1 Font size Ex: 26 px.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h2',
        'label'       => 'H2 Font Size',
        'desc'        => 'H2 Font size Ex: 24px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h3',
        'label'       => 'H3 Font Size',
        'desc'        => 'H3 Font size Ex: 18px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h4',
        'label'       => 'H4 Font Size',
        'desc'        => 'H4 Font size Ex: 16px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h5',
        'label'       => 'H5 Font Size',
        'desc'        => 'H5 Font size Ex: 14px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_h6',
        'label'       => 'H6 Font Size',
        'desc'        => 'H6 Font size Ex: 12px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'body_text_settings',
        'label'       => 'Body Text Settings',
        'desc'        => '<h1 style="color:#04a100">Body Text Settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'font_body_size',
        'label'       => 'Body Text Font Size',
        'desc'        => 'The font size of the main body. Ex: 12px',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'main_content_settings',
        'label'       => 'Main content settings',
        'desc'        => '<h1 style="color:#04a100">Main content settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'hp_3_section_1',
        'label'       => 'Revolution slider Homepage',
        'desc'        => '<h3 style="color:#04a100">1. Revolution slider Homepage</h3>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'slider_h',
        'label'       => 'Slider',
        'desc'        => 'Add slider Alias here ( Revolution slider\'s Alias )',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'hp_1_section_1',
        'label'       => 'Default Homepage',
        'desc'        => '<h3 style="color:#04a100">2. 3D text Homepage</h3>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'text_content',
        'label'       => 'Intro title',
        'desc'        => 'Add content 3D here',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage_style1',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'hp_2_section_1',
        'label'       => 'Video Homepage',
        'desc'        => '<h3 style="color:#04a100">3.For video homepage you have to add your mp4 file to videos folder </h3>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'intro_h1',
        'label'       => 'Intro title',
        'desc'        => 'Add content here',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage_style1',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'home1_block',
        'label'       => 'Home page choose block to show',
        'desc'        => 'Tick " value " If you would like to show on homepage style 1',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'about-us',
            'label'       => 'About us block',
            'src'         => ''
          ),
		  array(
            'value'       => 'service',
            'label'       => 'Service block',
            'src'         => ''
          ),
		  array(
            'value'       => 'fun',
            'label'       => 'Fun Fact block',
            'src'         => ''
          ),
		  array(
            'value'       => 'portfolio',
            'label'       => 'Portfolio block',
            'src'         => ''
          ),
          array(
            'value'       => 'blog',
            'label'       => 'Blog block',
            'src'         => ''
          ),		  
		  array(
            'value'       => 'client',
            'label'       => 'Client block',
            'src'         => ''
          ),
        ),
      ),
	  array(
        'id'          => 'about_h_content_settings',
        'label'       => 'About block settings',
        'desc'        => '<h2 style="color:#04a100">About settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'service_tt_1',
        'label'       => 'About us content',
        'desc'        => ' Add content here',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage_style1',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'service_h_content_settings',
        'label'       => 'Service block settings',
        'desc'        => '<h2 style="color:#04a100">Service settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'h_service',
        'label'       => 'Service homepage',
        'desc'        => 'Add service here, <strong>title:</strong> service title,<strong>sub title:</strong> no,<strong>image:</strong> service image,<strong>link:</strong> no, <strong>Description:</strong> content',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'funfact_h_content_settings',
        'label'       => 'Funfact block settings',
        'desc'        => '<h2 style="color:#04a100">Funfact settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'h_funfact',
        'label'       => 'Funfact add',
        'desc'        => 'Add Funfact.',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'porfolio_content_settings',
        'label'       => 'Portfolio block settings',
        'desc'        => '<h2 style="color:#04a100">Portfolio settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'port_h1',
        'label'       => 'Portfolio title',
        'desc'        => 'Ex: "  LATEST WORKS "',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
	  array(
        'id'          => 'client_content_settings',
        'label'       => 'Client block settings',
        'desc'        => '<h2 style="color:#04a100">Client settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'cli_logo_loop',
        'label'       => 'Add client',
        'desc'        => 'Add here',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'blog_content_settings',
        'label'       => 'Blog block settings',
        'desc'        => '<h2 style="color:#04a100">Blog settings</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'blog_h1',
        'label'       => 'Blog title',
        'desc'        => 'Ex: "  LATEST NEWS "',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage_style1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
	  array(
        'id'          => 'about_settings',
        'label'       => 'About us Page Settings',
        'desc'        => '<h1 style="color:#04a100">About us Page Setting</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'about_us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'about_block',
        'label'       => 'About us page choose block to show',
        'desc'        => 'Tick " value " If you would like to show on About us page',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'about_us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'about-us',
            'label'       => 'About us block',
            'src'         => ''
          ),
		  array(
            'value'       => 'team',
            'label'       => 'Team block',
            'src'         => ''
          ),
		  array(
            'value'       => 'fun',
            'label'       => 'Fun Fact block',
            'src'         => ''
          ),		  
		  array(
            'value'       => 'client',
            'label'       => 'Client block',
            'src'         => ''
          ),
        ),
      ),
	   array(
        'id'          => 'service_tt_ab',
        'label'       => 'About us content',
        'desc'        => 'Add content here',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'about_us',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'team_loop',
        'label'       => 'Adding team',
        'desc'        => 'Add about us here, <strong>title:</strong> David Coopperfield ,<strong>Sub title:</strong> Front-End Developer,<strong>image:</strong> Team image,<strong>link:</strong> no,<strong>description:</strong> no',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'about_us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'ab_funfact',
        'label'       => 'Funfact add',
        'desc'        => 'Add Funfact.',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'about_us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'cli_logo_loop_ab',
        'label'       => 'Add client',
        'desc'        => 'Add here',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'about_us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'service_settings',
        'label'       => 'Service Page Settings',
        'desc'        => '<h1 style="color:#04a100">Service Page Setting</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'services',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'sv_loop',
        'label'       => 'Add service page',
        'desc'        => 'Add service here, <strong>title:</strong> service title,<strong>sub title:</strong> no,<strong>image:</strong> service image,<strong>link:</strong> no, <strong>Description:</strong> content',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'services',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'sv_loop2',
        'label'       => 'Add service low two',
        'desc'        => 'Add service here, <strong>title:</strong> service title,<strong>sub title:</strong> no,<strong>image:</strong> service image,<strong>link:</strong> no, <strong>Description:</strong> content',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'services',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'Blog_settings',
        'label'       => 'Portfolioset',
        'desc'        => '<h1 style="color:#04a100">Blog Settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'head_blog_read',
        'label'       => 'Button text',
        'desc'        => 'Ex: " READ MORE "',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	   array(
        'id'          => 'gmap-settings',
        'label'       => 'Google map settings',
        'desc'        => '<h1 style="color:#04a100">Google map settings</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'contact_content',
        'label'       => 'contact content',
        'desc'        => 'Add content to contact',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contactheadline',
        'rows'        => '15',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_button',
        'label'       => 'button text',
        'desc'        => 'Text for button Ex : " Send "',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'send_done',
        'label'       => 'send done',
        'desc'        => 'EX : " Your message has been sent successfully. Thank you for contacting us. We will be in touch as soon as possible! "',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'goomapactive',
        'label'       => 'Google Maps Active',
        'desc'        => 'Choose it if you would like to show the google maps on your contact page.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Yes',
            'label'       => 'Yes',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'gooaddress',
        'label'       => 'Google Maps Address',
        'desc'        => 'The Address of your map location.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'goomapzoom',
        'label'       => 'Google Maps Default Zoom',
        'desc'        => 'Zoom default.<br />Example: <strong>16</strong>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_e_mail',
        'label'       => 'Contact E-mail',
        'desc'        => '<h1 style="color:#04a100">Contact E-mail</h1>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'email_contactform',
        'label'       => 'Contact Form Email Address',
        'desc'        => 'Your email address on the contact page.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contactheadline',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'highlight_color',
        'label'       => 'Highlight color',
        'desc'        => 'Choose highlight color Ex : " Yellow color "',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'hightlight',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'highlight_sub_color',
        'label'       => 'Sub Highlight color',
        'desc'        => 'Choose Sub highlight color Ex : " Red color "',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'hightlight',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}