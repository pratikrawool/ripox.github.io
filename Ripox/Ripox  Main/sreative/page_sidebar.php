<?php

/* 

Template Name: Page With Sidebar

*/ 

?>

<?php
  get_header();
?>
<?php
	$templateurl = get_template_directory_uri();
	
	if ( function_exists( 'ot_get_option') ) {	
        $bg_port_single = ot_get_option( 'bg_port_single');
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
	if (isset($allcustom["sidebar_type"])){$side_type = $allcustom['sidebar_type'];}else{$side_type = "";}	
	if (isset($allcustom["sidebar"])){$sidebar = $allcustom["sidebar"];}else{$sidebar = "Page Sidebar";}
	
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
	
	<!-- Page With Sidebar Block --> 
<section id="page_sidebar">
	  <div class="container"> 
       <div class="row">
        <div class="search_wrapper">
      	   <!-- Start content -->
			
		<?php if ($side_type == 1){ ?>
		<div class="col-md-8 left">
		<div class="page_right">
		<?php } else if ($side_type == 0){ ?>		 
		<div class="col-md-8 right">
		<div class="page_left">
        <?php } ?>
		
                <?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				
				<div class="clear"></div>
				
		<?php if ($side_type == 1){ ?>				
		</div>
	    </div>
		<?php } else if ($side_type == 0){ ?>		
        </div>
	    </div>
		<?php } ?>
		 
			<!-- End col-md-9 -->

			<!-- Sidebar -->

		<div class="col-md-4">
				<aside class="blog-sidebar">
				<?php if ( is_active_sidebar( 'decneo-sidebar-6' ) ) : ?>
					<?php dynamic_sidebar( 'decneo-sidebar-6' ); ?>
				<?php else : ?>

	               	<div class="widget">
					  <div class="widget_text">							   
					    <div class="abwrap">                  
							 <p><?php esc_html_e('Add widget here','multipixels'); ?></p>
						</div>
						<div class="clear"></div>							   
					  </div>						    						
					</div>
                    <div class="padding60"></div>

	            <?php endif; ?>                   
						
				</aside>
		</div>
		  
	
         <div class="clear"></div>
         </div>			 
        </div> <!-- End row -->
			
     </div>		 
</section>		 
<?php get_footer(); ?>