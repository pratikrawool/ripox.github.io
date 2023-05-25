<?php
/* 
Template Name: Homepage for page builder
*/ 
?>
    
<?php
	get_header();
?>

<?php
	$templateurl = get_template_directory_uri();
    if ( function_exists( 'ot_get_option') ) {
		/* Revolution slider */
		$slider_h = ot_get_option( 'slider_h' );
	}	
?>

<?php

	$allcustom = all_pp();
	
	if (isset($allcustom["header_title"])){$headtitle = $allcustom['header_title'];}else{$headtitle = "";}
	if (isset($allcustom["header_sub_title"])){$headsubtitle = $allcustom['header_sub_title'];}else{$headsubtitle = "";}
	if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
	
?>

<!-- Start slider  -->	   		    
<section class="home-intro">
  <div class="banner">
    <div id="rev_slider_35_1" class="rev_slider fullwidthabanner">
       <?php if (function_exists('putRevSlider')) { putRevSlider($slider_h); } ?>
    </div>
    <!-- end rev_slider --> 
  </div>
  <!-- end banner --> 
</section> 	
<!-- End slider wrapper --> 	

<section class="overal">
  <div class="container-fluid">
    <div class="row">
       <?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>  
    </div>
  <!-- end container --> 
</section>
<?php get_footer(); ?>