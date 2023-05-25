<?php
/* 
Template Name: Full page
*/ 
?>
    
<?php
	get_header();
?>

<?php
	$templateurl = get_template_directory_uri();
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
	}	
?>

<?php

	$allcustom = all_pp();
	
	if (isset($allcustom["header_title"])){$headtitle = $allcustom['header_title'];}else{$headtitle = "";}
	if (isset($allcustom["header_sub_title"])){$headsubtitle = $allcustom['header_sub_title'];}else{$headsubtitle = "";}
	if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
	
?>

<section class="title-wrapper">
  <div class="container">
    	<div class="row">
        	<div class="title-wrapper-inner">
			  <div class="col-xs-12"> 
            	<h2 class="title"><?php 
				if ($headtitle == "") {
					echo get_the_title();
				} else {
					echo esc_attr($headtitle);
				}
				?></h2>
                <h5 class="sub-title"><?php echo esc_attr($headsubtitle) ?></h5>
			  </div>
			  <div class="clear"></div>
            </div>
        </div>
   </div>   
</section>
<!-- Full Page Block --> 
 <section id="full_page">
	  <div class="container"> 
       <div class="row">      	   
		<div class="col-xs-12">
		   <div class="page_inner">
		    <!-- Start content -->
                <?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
			<div class="clear"></div>
		   </div>
	    </div>
		
         <div class="clear"></div>		 
        </div> <!-- End row -->
			
     </div>		 
</section>		 
<?php get_footer(); ?>