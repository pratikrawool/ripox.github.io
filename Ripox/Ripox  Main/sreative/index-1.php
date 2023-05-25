<?php
/* 
Template Name: Blog overview no sidebar
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
        /* Blog homepage */
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
<section class="blog">
<div class="blog_inner">
  <div class="container">
      <?php
					global $decneo_posttype;		 
					$args=array(
						'post_type' => $decneo_posttype,
						'posts_per_page' => 12
					);
					$args = 	( $wp_query->query && !empty( $wp_query->query ) )
					? array_merge( $wp_query->query , $args )
					: $args;
					query_posts( $args );
					
      ?>
    <div class="row">
	
	  <div class="col-md-8 col-md-offset-2 wow fadeInUp">

	                <?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
				
					<?php	
						
					$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					global $decneo_newspost;
					$time = get_post_time('F j, Y', true,$decneo_newspost['ID']); 
					$monthyear = get_post_time('M Y', true,$decneo_newspost['ID']);
					$month = get_post_time('M', true,$decneo_newspost['ID']);
					$day = get_post_time('j', true,$decneo_newspost['ID']); 
					
					$allcategory = get_the_term_list( $post->ID, 'category', '', '_', '' );
					$allcategory = strip_tags($allcategory);
					$allcategory = strtolower($allcategory);
					$allcategory = str_replace(' ', '-', $allcategory);
					$allcategory = str_replace('_', ' ', $allcategory);

					$postcustoms = all_pp($post->ID);
					if (isset($postcustoms["postformat_type"])){$postformat = $postcustoms['postformat_type'];}else{$postformat = 0;}
					if (isset($postcustoms["postformat_slider"])){
						$slider_q = $postcustoms['postformat_slider'];
						$slider_image_q = explode("\n", str_replace("\r", "", $slider_q));
					}else{
						$slider_image_q = 0;
					}
					if (isset($postcustoms["postformat_video"])){$video_post = $postcustoms['postformat_video'];}else{$video_post = "";}
					$aq_image_b = aq_resize( $blogimageurl, 1280, 800, true );
					?>
	   <?php if($blogimageurl!="" && $postformat!=1 && $postformat!=2 && $postformat!=3){ ?>
        <div class="blog-post wow fadeInUp">
          <figure><img src="<?php echo esc_url($blogimageurl) ?>" alt="Image"></figure>
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		</div>
        <!-- end blog-post -->
		<?php } else if($postformat==1){ ?>	
        <div class="blog-post wow fadeInUp">
          <figure>
		    <div class="flexslider">	
				<ul class="slides">
				  <?php foreach($slider_image_q as $aq_image_b):
				  echo '<li><img src="'.$aq_image_b.'" alt="" class="scale-with-grid" /></li>';
				  endforeach; ?>														
				</ul>						
			</div>
		  </figure>
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		</div>
        <!-- end blog-post -->
		<?php } else if($postformat==2){ ?>
        <div class="blog-post wow fadeInUp">
          <figure>
		    <div class="scale_vid">
				 <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($video_post) ?>?title=0&amp;byline=0&amp;portrait=0" width="555" height="282"></iframe>
			</div>
		  </figure>
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
	    </div>
        <!-- end blog-post -->
		<?php } else if($postformat==3){ ?>
        <div class="blog-post wow fadeInUp">
          <figure>
		    <div class="scale_vid"> 
				 <iframe src="http://www.youtube.com/embed/<?php echo esc_attr($video_post) ?>?hd=1&amp;wmode=opaque&amp;controls=0&amp;showinfo=0" width="555" height="282"></iframe>
		    </div>
		  </figure>
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		</div>
        <!-- end blog-post --> 
		<?php } else if($blogimageurl==""){ ?>
		<div class="blog-post wow fadeInUp">
          <h3><?php the_title(); ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		</div>
		<?php } ?>
		<?php endwhile; ?>
        </div>	
	    <div class="col-xs-12 wow fadeInUp">
				<?php if(function_exists('decneo_pagination')){ decneo_pagination(); } ?>
				<?php else : ?>
				  <?php wp_link_pages( $args ); ?>
				<?php endif; ?>				
                
		</div>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
  <div class="clear"></div> 
  </div>
</section>
<?php get_footer(); ?>