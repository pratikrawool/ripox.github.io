<?php
/* 
Template Name: Blog overview no sb demo
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
    <div class="row">	
	  <div class="col-md-8 col-md-offset-2 wow fadeInUp">

	    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
	
	    <?php 
		
		  	$newsargs = array( 'numberposts' => 6, 'orderby' => 'post_date', 'post_type' => 'post' );
		    $newslist = get_posts( $newsargs );
		    foreach ($newslist as $decneo_newspost) :  setup_postdata($decneo_newspost);
		
			$hp_b_cat = get_the_category($decneo_newspost->ID);
			$new_b_cat = $hp_b_cat[0]->cat_name;
			$b_cat_replace = strtolower((preg_replace('/\s+/', '-', $new_b_cat)));
			$hp_b_home = home_url();
			$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($decneo_newspost->ID) ); 
			
			global $decneo_newspost;
            $time = get_post_time('F j, Y', true,$decneo_newspost->ID); 
		    $onlyyear = get_post_time('Y', true,$decneo_newspost->ID);
            $month = get_post_time('M', true,$decneo_newspost->ID);
		    $day = get_post_time('j', true,$decneo_newspost->ID);
			
			$num_comments = get_comments_number( $decneo_newspost->ID );
			if ( comments_open() ) {
	      if ( $num_comments == 0 ) {
		  $comments = __('No Comment','multipixels');
        	} elseif ( $num_comments > 1 ) {
	    	$comments = $num_comments . __(' Comments','multipixels');
    	} else {
	    	$comments = __('1 Comment','multipixels');
	    }
        	$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
          } else {
	        $write_comments =  __('Comments are off for this post.','multipixels');
         }

        $postcustoms = all_pp($decneo_newspost->ID);
        if (isset($postcustoms["postformat_type"])){$postformat = $postcustoms['postformat_type'];}else{$postformat = 0;}
        if (isset($postcustoms["postformat_slider"])){
            $slider_q = $postcustoms['postformat_slider'];
            $slider_image_q = explode("\n", str_replace("\r", "", $slider_q));
        }else{
            $slider_image_q = 0;
        }
        if (isset($postcustoms["postformat_video"])){$video_post = $postcustoms['postformat_video'];}else{$video_post = "";}

		$aq_image_b = aq_resize( $blogimageurl, 980, 490, true );
        ?>
	   
        <div class="blog-post wow fadeInUp <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
		  <?php if($blogimageurl!="" && $postformat!=1 && $postformat!=2 && $postformat!=3){ ?>

          <figure><img src="<?php echo esc_url($blogimageurl) ?>" alt="Image"></figure>
          <h3><?php echo esc_attr($decneo_newspost->post_title) ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$decneo_newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		  
		  <?php } else if($postformat==1){ ?>
		  
		  <figure>
		    <div class="flexslider">	
				<ul class="slides">
				  <?php foreach($slider_image_q as $aq_image_b):
				  echo '<li><img src="'.$aq_image_b.'" alt="" class="scale-with-grid" /></li>';
				  endforeach; ?>														
				</ul>						
			</div>
		  </figure>
          <h3><?php echo esc_attr($decneo_newspost->post_title) ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$decneo_newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		  
		  <?php } else if($postformat==2){ ?>
		  
		  <figure>
		    <div class="scale_vid">
				 <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($video_post) ?>?title=0&amp;byline=0&amp;portrait=0" width="555" height="282"></iframe>
			</div>
		  </figure>
          <h3><?php echo esc_attr($decneo_newspost->post_title) ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$decneo_newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a> 
		  
		  <?php } else if($postformat==3){ ?>
		  
		  <figure>
		    <div class="scale_vid"> 
				 <iframe src="http://www.youtube.com/embed/<?php echo esc_attr($video_post) ?>?hd=1&amp;wmode=opaque&amp;controls=0&amp;showinfo=0" width="555" height="282"></iframe>
		    </div>
		  </figure>
          <h3><?php echo esc_attr($decneo_newspost->post_title) ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php the_permalink(); ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>   	  
		  
		  <?php } else if($blogimageurl==""){ ?> 
		  
		  <h3><?php echo esc_attr($decneo_newspost->post_title) ?></h3>
          <small><?php echo esc_html($time) ?></small> <span class="border"></span>
          <p><?php echo excerpt(22); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$decneo_newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		  
		  <?php } ?>
		  
		</div>
        <!-- end blog-post -->
		
		<?php endforeach; ?>  
	    <?php endwhile; ?>
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