<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
        <title><?php wp_title('| ', true, 'right'); ?></title>
	
    <!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	/*	Get favicon URL*/
	$favicon = ot_get_option( 'favicon' );
	if(!empty($favicon))
	{
?>
	<link rel="shortcut icon" href="<?php echo esc_url($favicon) ?>" type="image/gif"/>
<?php
	}
?>	

		<?php
		    $templateurl = get_template_directory_uri();
			if ( function_exists( 'ot_get_option') ) {
				if(ot_get_option( 'header_logo' )!=""){
				   $headerlogo = ot_get_option( 'header_logo' );
				   }else{
				   $headerlogo = $templateurl.'/images/logo-light.png';
				  }  				  
			}
			$quick_contact = ot_get_option( 'quick_contact' );
			if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
        ?>	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Image Back ground and pattern Back ground  -->
	
	<?php if ($pp_bg=="") { ?><div id="pattern_bg"></div> <?php } ?>
    <?php if ($pp_bg!="") { ?><img src="<?php echo esc_url($pp_bg) ?>" alt="" id="background" /><?php } ?>
	
<div class="loading yellow-bg">
  <div class="table">
    <div class="inner"> <img src="<?php echo esc_url($headerlogo) ?>" alt="Image">
      <div class="clearfix"></div>
      <div class="spinner"></div>
    </div>
  </div>
</div> 
<div class="transition-overlay yellow-bg"></div> 
<!-- end transition-overlay -->
<div class="side-menu"> <span class="side-menu-close"><i class="ion-android-close"></i></span>
  <h4><?php esc_html_e('QUICK CONTACT','multipixels'); ?></h4>
  <?php echo do_shortcode($quick_contact); ?>
  <ul>
    <li class="facebook"><a href="#"><i class="ion-social-facebook"></i></a></li>
    <li class="twitter"><a href="#"><i class="ion-social-twitter"></i></a></li>
    <li class="googleplus"><a href="#"><i class="ion-social-googleplus"></i></a></li>
    <li class="instagram"><a href="#"><i class="ion-social-instagram"></i></a></li>
    <li class="pinterest"><a href="#"><i class="ion-social-pinterest"></i></a></li>
    <li class="youtube"><a href="#"><i class="ion-social-youtube"></i></a></li>
  </ul>
</div>
<!-- end side-menu -->
<div id="main_wrapper">
<header>	
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="nav">
    <div class="container">
	  <?php 
		  // Fix menu overlap bug..
		  if ( is_admin_bar_showing() ) echo '<div style="min-height: 10px;"></div>'; 
      ?>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url($headerlogo) ?>" alt="Image"></a> 
	  </div>
      <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="bs-example-navbar-collapse-1">
           <?php
            if (has_nav_menu('main_menu')) {		  
				$header_menu_args = array(	
                'theme_location' => 'main_menu',								  
				'menu_id' => '', 
				'menu_class' => 'nav navbar-nav navbar-right',
                'echo' => true,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
				'walker' => new decneo_Walker_Nav_Menu(),
                'depth' => 0								  
					 );
				wp_nav_menu( $header_menu_args );	
            }				
          ?>
		<div class="clear"></div>
      </div>
      <!-- end navbar-collapse --> 
    </div>
    <!-- end container -->
  </nav>
  <!-- end nav -->  
</header>