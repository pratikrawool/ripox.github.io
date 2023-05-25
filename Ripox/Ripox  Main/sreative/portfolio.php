<?php
/* 
Template Name: Portfolio masonry
*/ 
?>
    
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
	if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
	if (isset($allcustom["portfolio_category"])){$posttype = $allcustom["portfolio_category"];}else{$posttype ='portfolio';} 
    $postcat = "portfoliocategory";
	
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
<section class="works">
<?php 
	$args=array('post_type' => $posttype,'posts_per_page' =>-1);
	$temp = $wp_query; 
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query($args);
	$terms = get_terms($postcat);
	$count = 1;
?>
<?php if( get_option_tree( 'filteractive' ) == 'Yes'){ ?>
  <div class="works-filter wow fadeInUp"> 
    <?php
	  echo '<a href="#" class="current" data-filter="*">'.__('All', 'multipixels').'</a>';
	  foreach ( $terms as $term ) {
	  echo '<a href="#" data-filter=".'.strtolower(str_replace(" ", "-", $term->name)).'">'.$term->name.'</a> ';
	  }
    ?> 
  </div>
<?php } ?>

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
				$aq_image_p = aq_resize( $blogimageurl_p, 400, 400, true );
				global $decneo_term;
				$website_url = (isset($custom["website_url"][0]) ? strip_tags($custom["website_url"][0]) : ''); 
				$video_link = (isset($custom["video_link"][0]) ? strip_tags($custom["video_link"][0]) : ''); 
		   
			?>		
		
<?php if ($count==1){ ?>
  <ul class="masonry wow fadeInUp">
<?php } ?>
    <li class="<?php echo esc_attr($allcategory) ?>" data-id="id-<?php echo esc_attr($count) ?>">	
	  <?php  
	  if($video_link==""){ 
	  ?>
        <figure><img src="<?php echo esc_url($blogimageurl_p) ?>" alt="Image">
        <figcaption>
          <div class="table">
            <div class="inner">
              <h4><a href="<?php the_permalink(); ?>"><?php echo esc_attr($all_title) ?></a></h4>
              <small><?php echo esc_attr($allcategory) ?></small> </div>
          </div>
        </figcaption>
        </figure>
	  <?php }else{ ?>
	    <figure><img src="<?php echo esc_url($blogimageurl_p) ?>" alt="Image">
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
<?php get_footer(); ?>