<?php get_header(); ?>

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
	if (isset($allcustom["sidebar_type"])){$side_type = $allcustom['sidebar_type'];}else{$side_type = 0;}
	if ($side_type == 1){$side_select = "right"; $side_offset = ""; $content_offset = "offset-by-one";}else{$side_select = "left"; $side_offset = "offset-by-one"; $content_offset = "";}
	if (isset($allcustom["sidebar"])){$sidebar = $allcustom["sidebar"];}else{$sidebar = "Blog Sidebar";}
	if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
	
?>
<section class="title-wrapper">
<div class="container">
    	<div class="row">
		   <div class="title-wrapper-inner">
        	<div class="col-xs-12">
			  <h2 class="title"><?php 
				if ($headtitle == "") {
					echo wp_title('');
				} else {
					echo esc_attr($headtitle);
				}
				?></h2>
			  <h5 class="sub-title"><?php echo esc_attr($headsubtitle) ?></h5>
		    </div>
		   </div>
        </div>
</div>
</section>
<section class="project-detail">
	<div class="container">
    	<div class="row">
		    <?php	
					global $decneo_post;
					global $decneo_postcat;
					$custom = get_post_custom($decneo_post->ID);
					$all_title = get_the_title();
					$allcategory = strip_tags(get_the_term_list( $decneo_post->ID, $decneo_postcat, '', ', ', '' ));
					$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($decneo_post->ID) );
					if ($blogimageurl == "") { 
						$blogimageurl = get_template_directory_uri().'/images/demo.jpg';
					}
					$time = get_post_time('F jS, Y', true); 
					$aq_image_b = aq_resize( $blogimageurl, 600, 560, true ); 
					$video_link1 = $custom["video_link"][0];
					$website_url = $custom["website_url"][0];
				?>
			<?php if (have_posts()) : ?>
	     	<?php while (have_posts()) : the_post(); ?>	
        	<div class="col-xs-12 text-center <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
			   <?php  
				   if($video_link1==""){ 
			  ?>
			    <div class="project-header">
            	<div class="row">
                	<div class="col-md-4">
                    	<b><?php esc_html_e('By','multipixels'); ?></b> //  <?php the_author(); ?> 
                    </div>
                    <!-- end col-4 -->
                    <div class="col-md-4">
                    	<b><?php esc_html_e('Date','multipixels'); ?></b> //  <?php echo esc_html($time) ?>
                    </div>
                    <!-- end col-4 -->
                    <div class="col-md-4">
                    	<b><?php esc_html_e('URL','multipixels'); ?></b> // <?php echo esc_html($website_url) ?>
                    </div>
                    <!-- end col-4 -->
                </div>
                <!-- end row -->
            </div>
            <!--end project-header -->
            <div class="about-project">
            	<?php the_content(); ?>
			</div>
			
            <figure class="screenshot">
              <img src="<?php echo esc_url($blogimageurl) ?>" alt="Image">
            </figure>			
			
            <!-- end about-project -->
			  
			  <?php }else{ ?>			  
			  
			  <div class="project-header">
            	<div class="row">
                	<div class="col-md-4">
                    	<b><?php esc_html_e('By','multipixels'); ?></b> //  <?php the_author(); ?> 
                    </div>
                    <!-- end col-4 -->
                    <div class="col-md-4">
                    	<b><?php esc_html_e('Date','multipixels'); ?></b> //  <?php echo esc_html($time) ?>
                    </div>
                    <!-- end col-4 -->
                    <div class="col-md-4">
                    	<b><?php esc_html_e('URL','multipixels'); ?></b> // <?php echo esc_html($website_url) ?>
                    </div>
                    <!-- end col-4 -->
                </div>
                <!-- end row -->
            </div>
            <!--end project-header -->
            <div class="about-project">
            	<?php the_content(); ?>
			</div>
			
            <figure class="screenshot">
                <div class="scale_vid top20"> 
					<iframe src="http://www.youtube.com/embed/<?php echo esc_attr($video_link1) ?>?hd=1&amp;wmode=opaque&amp;controls=0&amp;showinfo=0" width="670" height="375"></iframe>
				</div>
            </figure>				
			
            <!-- end about-project -->			  
			  
			  <?php } ?>

            </div>
            <!-- end col-12 -->
			<?php posts_nav_link(':::', '<< Newer Posts', 'Older Posts >>');  ?>
		    <?php endwhile; ?>
			<?php else : ?>
			<div class="col-xs-12">
			<p><?php esc_html_e('Sorry, but the thing you were looking for is not here !!!', 'multipixels'); ?></p>
			</div>
			<?php endif; ?>				
			
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<?php get_footer(); ?>