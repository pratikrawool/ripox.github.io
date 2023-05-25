<?php
/* 
Template Name: Services page
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
<section class="services">
  <div class="container">
    <div class="row wow fadeInUp">
	  
	        <?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$sv_loops = ot_get_option( 'sv_loop', '', false, true, -1 );
							if (is_array($sv_loops))
                          {
							foreach( $sv_loops as $sv_loop ) {
								echo '
								  <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
									<div class="box yellow-bg">
									  <div class="table">
										<div class="inner"> <img src="'.$sv_loop['image'].'" alt="Image">
										  <h4>'.$sv_loop['title'].'</h4>
										  '.$sv_loop['description'].'
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
	<div class="row wow fadeInUp">
			<?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$sv_loop2s = ot_get_option( 'sv_loop2', '', false, true, -1 );
							if (is_array($sv_loop2s))
                          {
							foreach( $sv_loop2s as $sv_loop2 ) {
								echo '
								  <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
									<div class="box yellow-bg">
									  <div class="table">
										<div class="inner"> <img src="'.$sv_loop2['image'].'" alt="Image">
										  <h4>'.$sv_loop2['title'].'</h4>
										  '.$sv_loop2['description'].'
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
<?php get_footer(); ?>