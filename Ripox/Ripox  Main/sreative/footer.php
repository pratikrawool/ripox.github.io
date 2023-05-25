<?php
		if ( function_exists( 'ot_get_option') ) {
			/*  Homepage Block choose */
		    $footer_block = get_option_tree( 'footer_block', '', false, true );
		    if(!is_array($footer_block)){ $footer_block = array(); }
			
            $footer_right = ot_get_option( 'footer_right');	
            $footer_left = ot_get_option( 'footer_left');				
		}
		/* Quote block */
		$foot_quote = ot_get_option( 'foot_quote' );
?>
<?php if (in_array("quote",$footer_block)){ ?> 
<section class="quote" data-stellar-background-ratio="0.5">
  <div class="container wow fadeInUp">
    <div class="row">
      <div class="col-xs-12">
        <div class="content-box">
          <?php echo esc_attr($foot_quote) ?>
		</div>
        <!-- end content-box --> 
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end quote -->
<?php } ?>
<?php if (in_array("contact-place",$footer_block)){ ?>	
<!-- Footer -->  
<section class="contact">
  <div class="container wow fadeInUp">
    <div class="row">
      <!-- end col-12 -->
	  <?php 
			if ( function_exists( 'ot_get_option' ) ) {
				$footer_los = ot_get_option( 'footer_lo', '', false, true, -1 );
					if (is_array($footer_los))
                    {
					foreach( $footer_los as $footer_lo ) {
					echo '
					      <div class="col-md-3">
							<figure><img src="'.$footer_lo['image'].'" alt="Image"></figure>
							<dl>
							  <dt>'.$footer_lo['title'].'</dt>
							  '.$footer_lo['description'].'
							</dl>
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
<!-- end contact -->
<?php } ?>
<footer>
  <div class="container wow fadeInUp">
    <div class="row">
            <?php if ( is_active_sidebar( 'decneo-sidebar-1' ) ) : ?>
					<?php dynamic_sidebar( 'decneo-sidebar-1' ); ?>
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
				
		    <?php if ( is_active_sidebar( 'decneo-sidebar-2' ) ) : ?>
					<?php dynamic_sidebar( 'decneo-sidebar-2' ); ?>
	        <?php endif; ?> 
			<?php if ( is_active_sidebar( 'decneo-sidebar-3' ) ) : ?>
					<?php dynamic_sidebar( 'decneo-sidebar-3' ); ?>
	        <?php endif; ?> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</footer>
<!-- end footer -->
<section class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h6><?php echo esc_attr($footer_left) ?></h6>
      </div>
      <!-- end col-6 -->
      <div class="col-md-6">
        <h6 class="pull-right"><?php echo esc_attr($footer_right) ?></h6>
      </div>
      <!-- end col-6 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end sub-footer --> 
<div class="clear"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>