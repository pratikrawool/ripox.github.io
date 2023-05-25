<?php

/* 

Template Name: Search Page

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
         if(ot_get_option( 'head_blog_read' )!=""){
		 $head_blog_read = ot_get_option( 'head_blog_read' );		
		 }else{
		 $head_blog_read = 'READ MORE';
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
<section class="blog">
 <div class="blog_inner">
  <div class="container">
    <div class="row">

		<div class="col-md-8 left">
		<div class="page_right">

	    <h4 class="sb_title"> <?php print( esc_attr( 'Search Results :', 'multipixels' ) ); ?></h4>
		    <h5> <?php the_search_query() ?> </h5></br>
		            <?php
                        global $headtitle;
                        global $time;						
						$paged =
							( get_query_var('paged') && get_query_var('paged') > 1 )
							? get_query_var('paged')
							: 1;
						$args = array(
							'posts_per_page' => 10,
							'paged' => $paged
						);
						$args =
							( $wp_query->query && !empty( $wp_query->query ) )
							? array_merge( $wp_query->query , $args )
							: $args;
						query_posts( $args );
					?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="blog-post wow fadeInUp <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		</div>
        <!-- end blog-post -->
		<?php endwhile; ?>
        <?php if(function_exists('pagination')){ pagination(); } ?>
	    <?php else : ?>
		<div class="col-md-12">
        <p><?php esc_html_e('Sorry, but the thing you were looking for is not here !!!', 'multipixels'); ?></p>
        </div>
        <?php endif; ?>
		<?php wp_link_pages( $args ); ?>	
			
		</div>
	    </div>
	  
	  
	  <!-- end col-8 -->
      <div class="col-md-4">
        <aside class="blog-sidebar">
                <?php if ( is_active_sidebar( 'decneo-sidebar-6' ) ) : ?>
					<?php dynamic_sidebar( 'decneo-sidebar-6' ); ?>
				<?php else : ?>
				    <div class="text-content">          
				     <p><?php esc_html_e('Add widget here','multipixels'); ?></p>			
				    </div>
	            <?php endif; ?>
        </aside>
      </div>
      <!-- end col-4 -->
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
  <div class="clear"></div> 
  </div>
</section>
<?php get_footer(); ?>