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
        $bg_port_single = ot_get_option( 'bg_port_single');	 
	}
	
?>
<?php

	$allcustom = all_pp();
	
	if (isset($allcustom["header_title"])){$headtitle = $allcustom['header_title'];}else{$headtitle = "";}
	if (isset($allcustom["header_sub_title"])){$headsubtitle = $allcustom['header_sub_title'];}else{$headsubtitle = "";}
	
?>
<section class="title-wrapper">
  <div class="container">
    	<div class="row">
        	<div class="title-wrapper-inner">
			  <div class="col-xs-12"> 
            	<h2 class="title"><?php esc_html_e('404','multipixels'); ?></h2>
                <h5 class="sub-title"><?php esc_html_e('Page not found','multipixels'); ?></h5>
			  </div>
			  <div class="clear"></div>
            </div>
        </div>
   </div>   
</section>
<section id="full_page">
	  <div class="container"> 
       <div class="row">      	   
		<div class="col-xs-12">
		    <center class="pad90"><h2 class="text_shadow_ef"><?php esc_html_e('Error 404 - Page Not Found','multipixels'); ?></h2</center>   
	    </div>
		
         <div class="clear"></div>		 
        </div> <!-- End row -->
			
     </div>		 
</section>
<?php get_footer(); ?>