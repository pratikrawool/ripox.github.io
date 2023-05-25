<?php
/* 
Template Name: About us page
*/ 
?>
<?php get_header(); ?>

<?php
	$templateurl = get_template_directory_uri();
	
	if ( function_exists( 'ot_get_option') ) {
		/*  Homepage Block choose */
		$about_block = get_option_tree( 'about_block', '', false, true );
		if(!is_array($about_block)){ $about_block = array(); }
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
		 /* about block */
        $service_tt_ab = ot_get_option( 'service_tt_ab' );
		 /* Fun fact block */		
	    $ab_funfact = ot_get_option( 'ab_funfact' );			
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
<?php if (in_array("about-us",$about_block)){ ?> 
<section class="about-us">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 left-side" data-stellar-background-ratio="0.5"> </div>
      <!-- end col-6 -->
      <div class="col-md-6 right-side">
        <div class="table wow fadeInUp">
          <div class="inner">
            <?php echo esc_attr($service_tt_ab) ?>
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
<?php if (in_array("team",$about_block)){ ?>
<section class="team-members">
  <div class="container wow fadeInUp">
    <div class="row">
	        <?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$team_loops = ot_get_option( 'team_loop', '', false, true, -1 );
							if (is_array($team_loops))
                          {
							foreach( $team_loops as $team_loop ) {
								echo '
								      <div class="col-md-4 col-sm-4">
										<figure><img src="'.$team_loop['image'].'" alt="Image">
										<figcaption>
										  <h3>'.$team_loop['title'].'</h3>
										  <h6>'.$team_loop['sub_title'].'</h6>
										  '.$team_loop['description'].'
										</figcaption>
										</figure>
									  </div>
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
<?php } ?>
<?php if (in_array("fun",$about_block)){ ?>
<section class="fun-facts">
  <div class="container wow fadeInUp">
    <div class="row">
	  <?php 
						if ( function_exists( 'ot_get_option' ) ) {
							$ab_funfacts = ot_get_option( 'ab_funfact', '', false, true, -1 );
							if (is_array($ab_funfacts))
                          {
							foreach( $ab_funfacts as $ab_funfact ) {
								echo '
								  <div class="col-md-3">
									<div class="content-box"> <i class="ion-ios-'.$ab_funfact['sub_title'].'"></i> <span class="counter">'.$ab_funfact['description'].'</span>
									  <h5>'.$ab_funfact['title'].'</h5>
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
<?php if (in_array("client",$about_block)){ ?>
<section class="logos wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="logos-carousel">
		   <?php
						if ( function_exists( 'ot_get_option' ) ) {
						$cli_logo_loop_abs = ot_get_option( 'cli_logo_loop_ab', '', false, true, -1 );
						if (is_array($cli_logo_loop_abs))
						   {
							foreach( $cli_logo_loop_abs as $cli_logo_loop_ab ) {
							echo '	
                                  <div class="item">
									<figure><img src="'.$cli_logo_loop_ab['image'].'" alt="'.$cli_logo_loop_ab['title'].'"></figure>
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
<?php get_footer(); ?>