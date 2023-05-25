<?php
/* 
Template Name: Homepage 3D Text
*/ 
?>
<?php 
  get_header();
?>

<?php
	$templateurl = get_template_directory_uri();
	
	if ( function_exists( 'ot_get_option') ) {
        /*  Homepage Block choose */
		$home1_block = get_option_tree( 'home1_block', '', false, true );
		if(!is_array($home1_block)){ $home1_block = array(); }
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
		/* 3D Text */
		$text_content = ot_get_option( 'text_content' );
		/* Services block */
        $service_tt_1 = ot_get_option( 'service_tt_1' );
		 /* Fun fact block */		
	    $h_funfact = ot_get_option( 'h_funfact' );
		/* portfolio block */
		$port_h1 = ot_get_option( 'port_h1' );
		$port_h1_sub = ot_get_option( 'port_h1_sub' );
		$port_h1_sub2 = ot_get_option( 'port_h1_sub2' );
		/* Filter active */
		$filteractive = ot_get_option( 'filteractive');	
		/* Blog homepage */
		$blog_h1 = ot_get_option( 'blog_h1' );
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
	if (isset($allcustom["sidebar_type"])){$side_type = $allcustom['sidebar_type'];}else{$side_type = 1;}
	if ($side_type == 0){$side_select = "right"; $side_offset = ""; $content_offset = "offset-by-one";}else{$side_select = "left"; $side_offset = "offset-by-one"; $content_offset = "";}
	if (isset($allcustom["sidebar"])){$sidebar = $allcustom["sidebar"];}else{$sidebar = "Blog Sidebar";}
	if (isset($allcustom["portfolio_category"])){$posttype = $allcustom["portfolio_category"];}else{$posttype ='portfolio';} 
    $postcat = "portfoliocategory";
	
?>
	
<section class="home-intro2">
  <div class='stage'>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class='layer'></div>
    <div class="slide-content spacing">
      <?php echo esc_attr($text_content) ?>
	</div>
    <!-- end slide-content --> 
  </div>
  <!-- end stage -->  
  <div class="clear"></div>  
</section>
<?php if (in_array("about-us",$home1_block)){ ?> 
<section class="about-us">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 left-side" data-stellar-background-ratio="0.5"> </div>
      <!-- end col-6 -->
      <div class="col-md-6 right-side">
        <div class="table wow fadeInUp">
          <div class="inner">
            <?php echo esc_attr($service_tt_1) ?>
          <!-- end inner --> 
        </div>
        <!-- end table --> 
      </div>
      <!-- end col-6 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end about-us -->
<?php } ?>
<?php if (in_array("service",$home1_block)){ ?>
<section class="services">
  <div class="container wow fadeInUp">
    <div class="row">
	<?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$h_services = ot_get_option( 'h_service', '', false, true, -1 );
							if (is_array($h_services))
                          {
							foreach( $h_services as $h_service ) {
								echo '
								  <div class="col-md-3 no-padding">
									<div class="box yellow-bg">
									  <div class="table">
										<div class="inner"> <img src="'.$h_service['image'].'" alt="Image">
										  <h4>'.$h_service['title'].'</h4>
										  '.$h_service['description'].'
									    </div>
										<!-- end inner --> 
									  </div>
									  <!-- end table --> 
									</div>
									<!-- end box --> 
								  </div>
								  <!-- end col-3 --> 		   

								';
							   }
							   }
						    }
    ?>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end services -->
<?php } ?>
<?php if (in_array("fun",$home1_block)){ ?>
<section class="fun-facts">
  <div class="container wow fadeInUp">
    <div class="row">
	  <?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$h_funfacts = ot_get_option( 'h_funfact', '', false, true, -1 );
							if (is_array($h_funfacts))
                          {
							foreach( $h_funfacts as $h_funfact ) {
								echo '
								  <div class="col-md-3">
									<div class="content-box"> <i class="ion-ios-'.$h_funfact['sub_title'].'"></i> <span class="counter">'.$h_funfact['description'].'</span>
									  <h5>'.$h_funfact['title'].'</h5>
									</div>
									<!-- end content-box --> 
								  </div>
								  <!-- end col-3 -->	   

								';
							   }
							   }
						    }
    ?>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end fun-facts -->
<?php } ?>
<?php if (in_array("portfolio",$home1_block)){ ?>
<section class="latest-works">
  <div class="container wow fadeInUp">
    <div class="row">
      <div class="col-xs-12">
        <h3> <?php echo esc_attr($port_h1) ?></h3>
		<?php 
					$args=array('post_type' => $posttype,'posts_per_page' =>6);
					$temp = $wp_query; 
					$wp_query = null;
					$wp_query = new WP_Query();
					$wp_query->query($args);
					$terms = get_terms($postcat);
					$count = 1;
				?>
		<?php if( get_option_tree( 'filteractive' ) == 'Yes'){ ?>	
        <div class="works-filter"> 
		    <?php
			         echo '<a href="#" class="current" data-filter="*">'.esc_attr('All', 'multipixels').'<span></span></a>';
					  foreach ( $terms as $term ) {
				      echo '<a href="#" data-filter=".'.strtolower(str_replace(" ", "-", $term->name)).'">'.$term->name.'</a>   ';
					   }
		    ?>  
		</div>
		<?php } ?>
        <!-- end works-filter --> 
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container -->
  <?php if ($wp_query->have_posts()) : ?>
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				
			<?php	
				$custom = get_post_custom($post->ID);
				$port_list = get_the_term_list( $post->ID, $postcat, '', ', ', '' );
				$allcategory = get_the_term_list( $post->ID, $postcat, '', '_', '' );
				$allcategory = strip_tags($allcategory);
				$allcategory = strtolower($allcategory);
				$allcategory = str_replace(' ', '-', $allcategory);
				$allcategory = str_replace('_', ' ', $allcategory);
				$all_title = get_the_title();
				$blogimageurl_p = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				if ($blogimageurl_p == "") { 
					$blogimageurl_p = get_template_directory_uri().'/images/demo.jpg';
				}
				$aq_image_p = aq_resize( $blogimageurl_p, 800, 450, true );
				global $decneo_term;
				$website_url = (isset($custom["website_url"][0]) ? strip_tags($custom["website_url"][0]) : ''); 
				$video_link = (isset($custom["video_link"][0]) ? strip_tags($custom["video_link"][0]) : ''); 
		   
			?>		
		
<?php if ($count==1){ ?>
  <ul class="wow fadeInUp">
  <?php } ?>
    <li class="video <?php echo esc_attr($allcategory) ?>" data-id="id-<?php echo esc_attr($count) ?>">
	  <?php  
		if($video_link==""){ 
	  ?>
      <figure><img src="<?php echo esc_url($aq_image_p) ?>" alt="Image">
        <figcaption>
          <div class="table">
            <div class="inner">
              <h4><a href="<?php the_permalink(); ?>"><?php echo esc_attr($all_title) ?></a></h4>
              <small><?php echo esc_attr($allcategory) ?></small> </div>
          </div>
        </figcaption>
      </figure>	  
	  <?php }else{ ?>
	  <figure><img src="<?php echo esc_url($aq_image_p) ?>" alt="Image">
        <figcaption>
          <div class="table">
            <div class="inner">
              <h4><a href="<?php the_permalink(); ?>"><?php echo esc_attr($all_title) ?></a></h4>
              <small><?php echo esc_attr($allcategory) ?></small> </div>
          </div>
        </figcaption>
      </figure>	  
	  <?php }  ?>
    </li>
    <!-- end work -->

	<?php $count++ ?>	
	<?php endwhile; ?>
								
    <?php 
	 $wp_query = null; 
	 $wp_query = $temp;
	 wp_reset_postdata();
	?> 
  </ul>
  <?php endif; ?>
</section>
<!-- end latest works -->
<?php } ?>
<?php if (in_array("client",$home1_block)){ ?>
<section class="logos wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="logos-carousel">
		   <?php
						if ( function_exists( 'ot_get_option' ) ) {
						$cli_logo_loops = ot_get_option( 'cli_logo_loop', '', false, true, -1 );
						if (is_array($cli_logo_loops))
						   {
							foreach( $cli_logo_loops as $cli_logo_loop ) {
							echo '	
                                  <div class="item">
									<figure><img src="'.$cli_logo_loop['image'].'" alt="'.$cli_logo_loop['title'].'"></figure>
								  </div>
		                         ';
							}
						}
						}
			?> 
        </div>
        <!-- end logos-carousel --> 
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end logos -->
<?php } ?>
<?php if (in_array("blog",$home1_block)){ ?>
<section class="latest-news">
  <div class="container wow fadeInUp">
    <div class="row">
      <div class="col-xs-12">
        <h3><?php echo esc_attr($blog_h1) ?></h3>
      </div>
      <!-- end col-12 -->
	  <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
	
	    <?php 
		
		  	$newsargs = array( 'numberposts' => 2, 'orderby' => 'post_date', 'post_type' => 'post' );
		    $newslist = get_posts( $newsargs );
		    foreach ($newslist as $newspost) :  setup_postdata($newspost);
		
			$hp_b_cat = get_the_category($newspost->ID);
			$new_b_cat = $hp_b_cat[0]->cat_name;
			$b_cat_replace = strtolower((preg_replace('/\s+/', '-', $new_b_cat)));
			$hp_b_home = home_url();
			$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($newspost->ID) ); 
			global $decneo_comments;
			global $decneo_poppost;

	    $time = get_post_time('j M Y', true,$newspost->ID,true); 
		$onlyyear = get_post_time('Y', true,$newspost->ID);
        $month = get_post_time('M', true,$newspost->ID);
		$day = get_post_time('j', true,$newspost->ID); 
		
        $postcustoms = all_pp($newspost->ID);
        if (isset($postcustoms["postformat_type"])){$postformat = $postcustoms['postformat_type'];}else{$postformat = 0;}
        if (isset($postcustoms["postformat_slider"])){
            $slider_q = $postcustoms['postformat_slider'];
            $slider_image_q = explode("\n", str_replace("\r", "", $slider_q));
        }else{
            $slider_image_q = 0;
        }
        if (isset($postcustoms["postformat_video"])){$video_post = $postcustoms['postformat_video'];}else{$video_post = "";}
		$aq_image_b = aq_resize( $blogimageurl, 555, 366, true );		
	    ?>   			    
      <div class="col-md-6">
        <div class="news-box">
		 <?php if($blogimageurl!="" && $postformat!=1 && $postformat!=2 && $postformat!=3){ ?>  
          <figure><img src="<?php echo esc_url($blogimageurl) ?>" alt="Image"></figure>
          <h4><?php echo esc_attr($newspost->post_title) ?></h4>
          <small><?php echo esc_attr($new_b_cat) ?></small>
          <p><?php echo excerpt(24); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
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
		  <h4><?php echo esc_attr($newspost->post_title) ?></h4>
          <small><?php echo esc_attr($new_b_cat) ?></small>
          <p><?php echo excerpt(24); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		 <?php } else if($postformat==2){ ?>
		  <figure>
		  <div class="scale_vid">
			 <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($video_post) ?>?title=0&amp;byline=0&amp;portrait=0" width="500" height="282"></iframe>
		  </div>
		  </figure>
		  <h4><?php echo esc_attr($newspost->post_title) ?></h4>
          <small><?php echo esc_attr($new_b_cat) ?></small>
          <p><?php echo excerpt(24); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		 <?php } else if($postformat==3){ ?>
		 <figure>
		    <div class="scale_vid"> 
				 <iframe src="http://www.youtube.com/embed/<?php echo esc_attr($video_post) ?>?hd=1&amp;wmode=opaque&amp;controls=0&amp;showinfo=0" width="555" height="282"></iframe>
		    </div>
		  </figure>
		 <h4><?php echo esc_attr($newspost->post_title) ?></h4>
          <small><?php echo esc_attr($new_b_cat) ?></small>
          <p><?php echo excerpt(24); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		 
		 <?php } else if($blogimageurl==""){ ?>
		  <h4><?php echo esc_attr($newspost->post_title) ?></h4>
          <small><?php echo esc_attr($new_b_cat) ?></small>
          <p><?php echo excerpt(24); ?></p>
          <a href="<?php echo esc_attr($hp_b_home.'/'.$b_cat_replace.'/'.$newspost->post_name) ?>" class="link"><?php echo esc_attr($head_blog_read) ?></a>
		 
		 <?php } ?>		 
		</div>
        <!-- end news-box --> 
      </div>
      <!-- end col-6 -->
	  <?php endforeach; ?>  
	  <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end latest-news -->
<?php } ?>
<?php get_footer(); ?>