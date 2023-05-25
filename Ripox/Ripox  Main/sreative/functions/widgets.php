<?php

/* Multipixels Flickr Widget */


function decneo_flickr() {
	register_widget( 'decneo_flickr' );
}
class decneo_flickr extends WP_Widget {
	function decneo_flickr() {
		$widget_ops = array( 'classname' => 'flickr-widget', 'description' => esc_html('A widget will show your last flickr photo', 'flickr-widget') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'flickr-widget' );
		$this->WP_Widget( 'flickr-widget','Multipixels Flickr Widget', $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('Flickr Widget', $instance['title'] );
		$id = $instance['id'];
		$how = $instance['how'];
		$show_num = $instance['show_num'];
		echo balancetags($before_widget);
		if($title)
			echo balancetags($before_title . $title . $after_title);
		?>	
			<div class="flickr_wrap">
            <div class="clear"></div>
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo balancetags($show_num) ?>&amp;display=<?php echo balancetags($how) ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo balancetags($id) ?>"></script>				
			</div>
			<div class="clear"></div>
		<?php 
		echo balancetags($after_widget);
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['show_num'] = strip_tags( $new_instance['show_num'] );
		$instance['how'] = strip_tags( $new_instance['how'] );
		return $instance;
	}
	
	function form( $instance ) {
	
		$defaults = array( 'title' => esc_html('Flickr Widget', 'Flickr Widget'), 'id' => esc_html('0', 'Flickr Witdget'), 'show_num' => '6', 'how' => 'lastest');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo balancetags($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo balancetags($this->get_field_id( 'title' )); ?>" name="<?php echo balancetags($this->get_field_name( 'title' )); ?>" value="<?php echo balancetags($instance['title']); ?>" class="width100" />
		</p>

		<p>
			<label for="<?php echo balancetags($this->get_field_id( 'id' )); ?>"><?php esc_html_e('Flickr id', 'example'); ?></label>
			<input id="<?php echo balancetags($this->get_field_id( 'id' )); ?>" name="<?php echo balancetags($this->get_field_name( 'id' )); ?>" value="<?php echo balancetags($instance['id']); ?>" class="width100" />
		</p>
		
		<p>
			<label for="<?php echo balancetags($this->get_field_id( 'show_num' )); ?>"><?php esc_html_e('Show Count', 'example'); ?></label>
			<input id="<?php echo balancetags($this->get_field_id( 'show_num' )); ?>" name="<?php echo balancetags($this->get_field_name( 'show_num' )); ?>" value="<?php echo balancetags($instance['show_num']); ?>" class="width100" />
			<label><?php esc_html_e('Max is "10"', 'example'); ?></label>
		</p>
		
        <p>
			<label for="<?php echo balancetags($this->get_field_id( 'how' )); ?>"><?php esc_html_e('What pictures to display','multipixels'); ?></label><br />
			<select id="<?php echo balancetags($this->get_field_id( 'how' )); ?>" name="<?php echo balancetags($this->get_field_name( 'how' )); ?>" class="width100">
				<option <?php if ( 'latest' == $instance['how'] ) echo 'selected="selected"'; ?> value="latest"><?php esc_html_e('latest','multipixels'); ?></option>            
				<option <?php if ( 'random' == $instance['how'] ) echo 'selected="selected"'; ?> value="random"><?php esc_html_e('random','multipixels'); ?></option>                  
			</select>
		</p>     

	<?php
	}
}

add_action( 'widgets_init', 'decneo_flickr' );


/* Multipixels vimeo sidebar widget  */


class decneo_vimeo_widget extends WP_Widget {

	function decneo_vimeo_widget() {
		$widget_ops = array('classname' => 'vimeo_widget', 'description' => 'vimeo widget for sidebar');
    	$this->WP_Widget('vimeo_widget', 'Multipixels vimeo widget', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo balancetags($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','multipixels'); ?> <input class="widefat" id="<?php echo balancetags($this->get_field_id('title')); ?>" name="<?php echo balancetags($this->get_field_name('title')); ?>" type="text" value="<?php if( isset($instance['title']) ) echo balancetags($instance['title']); ?>" /></label></p>
        
        <p><label for="<?php echo balancetags($this->get_field_id( 'vimeo_id' )); ?>"><?php esc_html_e('Vimeo Video ID:','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'vimeo_id' )); ?>" name="<?php echo balancetags($this->get_field_name( 'vimeo_id' )); ?>" value="<?php if( isset($instance['vimeo_id']) ) echo balancetags($instance['vimeo_id']); ?>" /></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$vimeoid = $instance['vimeo_id'];

		echo balancetags($before_widget);
		
	   	if ( $title ) echo balancetags($before_title . $title . $after_title);

		echo '
		  <div class="four columns alpha top10">   
			 <div class="scale_vid">
				    <iframe src="http://player.vimeo.com/video/'.$vimeoid.'?title=0&amp;byline=0&amp;portrait=0" width="220" height="124"></iframe>
			 </div>
		  </div> 
			 ';
	
		echo balancetags($after_widget);
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['vimeo_id'] = $new_instance['vimeo_id'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("decneo_vimeo_widget");') );


/* Multipixels Categories Widget */


class decneo_mpCategories extends WP_Widget
{
  function decneo_mpCategories()
  {
    $widget_ops = array('classname' => 'mpCategories', 'description' => 'Displays a list of Blog Categories' );
    $this->WP_Widget('mpCategories', 'Multipixels Categories', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo balancetags($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','multipixels'); ?> <input class="widefat" id="<?php echo balancetags($this->get_field_id('title')); ?>" name="<?php echo balancetags($this->get_field_name('title')); ?>" type="text" value="<?php if( isset($instance['title']) ) echo balancetags($instance['title']); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo balancetags($before_widget);
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo balancetags($before_title . $title . $after_title);
 
	echo '<ul class="categories">';
	$cats = get_categories();
	foreach ($cats as $cat) {
		$my_query = new WP_Query('category_name='.$cat->name.'&posts_per_page=1'); 
 		while ($my_query->have_posts()) : $my_query->the_post();
      		 $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id() ); 
        endwhile; 
		echo '<li><a href="'.get_category_link( $cat->term_id ).'">'.$cat->name.' ('.$cat->count.')</a></li>';
	}
    echo '</ul>';
 
    echo balancetags($after_widget);
  }                             
}
add_action( 'widgets_init', create_function('', 'return register_widget("decneo_mpCategories");') );


/* Multipixels archives widget */


class decneo_archives extends WP_Widget
{
  function decneo_archives()
  {
    $widget_ops = array('classname' => 'decneo_archives', 'description' => 'Displays the blog archives' );
    $this->WP_Widget('decneo_archives', 'Multipixels Archives', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo balancetags($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','multipixels'); ?> <input class="widefat" id="<?php echo balancetags($this->get_field_id('title')); ?>" name="<?php echo balancetags($this->get_field_name('title')); ?>" type="text" value="<?php if( isset($instance['title']) ) echo balancetags($instance['title']); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo balancetags($before_widget);
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
    echo balancetags($before_title . $title . $after_title);

	echo '<ul class="categories">';
	wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'html', 'before' => '', 'after' => '')));
    echo '</ul>';
    echo balancetags($after_widget);
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("decneo_archives");') );



/*   Multipixels Recent and Popular Post widget  */


class decneo_post1 extends WP_Widget {

	function decneo_post1() {
		$widget_ops = array('classname' => 'decneo_post1', 'description' => 'A Recent and Popular posts widget');
    	$this->WP_Widget('decneo_post1', 'Multipixels Recent Posts', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo balancetags($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'title' )); ?>" name="<?php echo balancetags($this->get_field_name( 'title' )); ?>" value="<?php if( isset($instance['title']) ) echo balancetags($instance['title']); ?>" /></p>

        <p><label for="<?php echo balancetags($this->get_field_id( 'postcount' )); ?>"><?php esc_html_e('Post Count:','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'postcount' )); ?>" name="<?php echo balancetags($this->get_field_name( 'postcount' )); ?>" value="<?php if( isset($instance['postcount']) ) echo balancetags($instance['postcount']); ?>" /></p>
        
        <p><label for="<?php echo balancetags($this->get_field_id( 'poplatest' )); ?>"><?php esc_html_e('1 for Recent Posts or 2 Popular Posts:','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'poplatest' )); ?>" name="<?php echo balancetags($this->get_field_name( 'poplatest' )); ?>" value="<?php if( isset($instance['poplatest']) ) echo balancetags($instance['poplatest']); ?>" /></p>
        
        <p><label for="<?php echo balancetags($this->get_field_id( 'posttype' )); ?>"><?php esc_html_e('Show this Post Type:','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'posttype' )); ?>" name="<?php echo balancetags($this->get_field_name( 'posttype' )); ?>" value="<?php if( isset($instance['posttype']) ) echo balancetags($instance['posttype']); ?>" /></p>
        
        <p><label for="<?php echo balancetags($this->get_field_id( 'timeformat' )); ?>"><?php esc_html_e('Time Format (see <a href="http://codex.wordpress.org/Formatting_Date_and_Time">here</a>):','multipixels'); ?></label><br /><input class="widefat" id="<?php echo balancetags($this->get_field_id( 'timeformat' )); ?>" name="<?php echo balancetags($this->get_field_name( 'timeformat' )); ?>" value="<?php if( isset($instance['timeformat']) ) echo balancetags($instance['timeformat']); ?>" /></p>
        
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$pcount = $instance['postcount'];
		$platest = $instance['poplatest'];
		$posttype = $instance['posttype'];
		$tformat = $instance['timeformat'];
		global $decneo_comments;
		echo balancetags($before_widget);

		
	   	if ( $title ) echo balancetags($before_title . $title . $after_title);
		
		if($posttype==""){
			$posttype = 'post';
		}
		if($platest==1){
			$popargs = array( 'numberposts' => $pcount, 'orderby' => 'post_date', 'post_type' => $posttype );
		}else{
			$popargs = array( 'numberposts' => $pcount, 'orderby' => 'comment_count', 'post_type' => $posttype );
		}
		$poplist = get_posts( $popargs );
		
		echo '<div class="widget_blogposts"><ul>';
			foreach ($poplist as $poppost) :  setup_postdata($poppost);
            echo '<li class="p_widget_inner">';
				$category = get_the_category($poppost->ID);
				$first_category = $category[0]->cat_name;
				$repl = strtolower((preg_replace('/\s+/', '-', $first_category)));
				$base = home_url();  
            $num_comments = get_comments_number( $poppost->ID );
			if ( comments_open() ) {
	      if ( $num_comments == 0 ) {
		  $decneo_comments = esc_html('No Comment','multipixels');
        	} elseif ( $num_comments > 1 ) {
	    	$decneo_comments = $num_comments . esc_html(' Comments','multipixels');
    	} else {
	    	$decneo_comments = esc_html('1 Comment','multipixels');
	    }
        	$write_comments = '<a href="' . get_comments_link() .'">'. $decneo_comments.'</a>';
          } else {
	        $write_comments =  esc_html('Comments are off for this post.','multipixels');
         }				
                $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($poppost->ID) ); 
                if ($blogimageurl == "") {
                    $post_img_path = get_template_directory_uri().'/images/bp/bp1.jpg';
                } else {
                    $post_img_path = $blogimageurl;
                }
                $aq_image_b = aq_resize( $post_img_path, 70, 70, true );				
				if ($aq_image_b == "") {
			              echo ' <div class="post_wiget_holder">
								<div class="post_wiget_ti"><a href="'.$base.'/'.$repl.'/'.$poppost->post_name.'">'.$poppost->post_title.'</a></div>
								<div class="sub_date_wrapper">
                                  <span class="left sub_text3">'.date($tformat,strtotime($poppost->post_date_gmt)).'</span>								
								</div>
								</div>
								<div class="clear"></div>  
						  ';
                 } else {
					 
					  echo '	
						         <div class="post_wiget_holder">
								<div class="post_wiget_ti"><a href="'.$base.'/'.$repl.'/'.$poppost->post_name.'">'.$poppost->post_title.'</a></div>
								<div class="sub_date_wrapper">
                                  <span class="left sub_text3">'.date($tformat,strtotime($poppost->post_date_gmt)).'</span>								
								</div>
								</div>
								<div class="clear"></div>  
						  ';
					 
				  }
               						  
			endforeach;

		echo '</li></ul><div class="clear"></div></div>';
		echo balancetags($after_widget);
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['postcount'] = $new_instance['postcount'];
		$instance['poplatest'] = $new_instance['poplatest'];
		$instance['posttype'] = $new_instance['posttype'];
		$instance['timeformat'] = $new_instance['timeformat'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("decneo_post1");') );

?>