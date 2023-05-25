<?php
/* 
Template Name: Contact page
*/ 
?>
    
<?php
	get_header(); 
    include ( 'form/contact.php' ); 
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
		/* Contact block */
		$h1_c_form = ot_get_option( 'h1_c_form' );	
        $contact_content = ot_get_option( 'contact_content');
		$contact_button = ot_get_option( 'contact_button');
		$send_done = ot_get_option( 'send_done');	
	}
	
?>

<?php

	$allcustom = all_pp();
	if (isset($allcustom["image_bg"])){$pp_bg = $allcustom['image_bg'];}else{$pp_bg = "";}
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
<section class="contact-info">
<div class="container">
    	<div class="row">
        	<div class="col-xs-12 text-center">
            	<address class="wow fadeInUp">
                	<?php echo esc_attr($contact_content) ?>
                </address>
			<?php 
		
		    global $decneo_emailSent;
		    global $decneo_nameError;
		    global $decneo_emailError;
		    global $decneo_commentError;
		  
		    ?>
		    <?php if ( !$decneo_emailSent ) { ?>
			<div class="contact-form-wrapper">
		    <?php if ( isset( $hasError ) || isset( $captchaError ) ) { ?>
		            <p><span class="error"><?php esc_html_e('There was an error on the form,Please fill out this form carefully: Fields marked with (*) are required.', 'multipixels'); ?></span></p><br/>
		    <?php } ?>
                <form class="wow fadeInUp" method="post" action="<?php the_permalink(); ?>" id="form" name="form">
                	<div class="form-group">
                	<input type="text" name="contactName" placeholder="<?php esc_html_e( 'Your name', 'multipixels' ); ?>" id="contactName" class="spacing required" value="<?php if ( isset( $_POST['contactName'] ) ) { echo htmlspecialchars($_POST['contactName']);}?>" tabindex="1">
                    <input type="text" name="email" placeholder="<?php esc_html_e( 'E-mail', 'multipixels' ); ?>" id="email" class="required email" value="<?php if ( isset( $_POST['email'] ) ) { echo htmlspecialchars($_POST['email']);}?>" tabindex="2">
                    </div>
                    <!-- end form-group -->
                	
                	<div class="form-group">
                    <input type="text" name="website" placeholder="<?php esc_html_e( 'Subject', 'multipixels' ); ?>" id="website" class="required last" value="<?php if ( isset( $_POST['website'] ) ) { echo htmlspecialchars($_POST['website']);}?>" tabindex="3" style="width: 100%;">
                    </div>
                    <!-- end form-group -->
                	
                	<div class="form-group">
                	<textarea id="commentsText" name="comments" placeholder="<?php esc_html_e( 'Your message', 'multipixels' ); ?>" class="required" tabindex="4"><?php if ( isset( $_POST['comments'] ) ) {	if ( function_exists( 'stripslashes' ) ) {	echo stripslashes( $_POST['comments'] ); } else { echo htmlspecialchars($_POST['comments']);}} ?></textarea>
                    </div>
                    <!-- end form-group -->
                	<div class="form-group">
                	<input id="send" type="submit" name="submit" value="<?php echo esc_attr($contact_button) ?>">
                    </div>
                    <!-- end form-group -->
					<?php if ( $decneo_nameError != '' ) { ?>
							<span class="error"><?php echo esc_attr($decneo_nameError);?></span> 
					<?php } ?>
					
					<?php if ( $decneo_emailError != '' ) { ?>
						<span class="error"><?php echo esc_attr($decneo_emailError);?></span>
					<?php } ?>
					
					<?php if ( $decneo_commentError != '' ) { ?>
						<span class="error"><?php echo esc_attr($decneo_commentError);?></span> 
					<?php } ?>
					<p class="displace">
						<label for="checking"><?php esc_html_e( 'you must fill the form to get summit', 'multipixels' ); ?></label>
						<input type="text" name="checking" id="checking" value="<?php if ( isset( $_POST['checking'] ) )  echo htmlspecialchars($_POST['checking']);?>" />
						<input type="hidden" name="submitted" id="submitted" value="true" />	
					</p>
                </form>
			</div>
			<?php } else { ?>
		    <div class="padding_b70">					
		       <h4> <?php echo esc_attr($send_done) ?></h4>
		    </div>			
		    <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- end contact-info -->
<section class="map wow fadeInUp" id="map"></section>
<!-- end map -->
<?php get_footer(); ?>