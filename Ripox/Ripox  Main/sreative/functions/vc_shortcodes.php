<?php
/************************************
*SECTION TITLE
*************************************/

function shortcode_section_title( $atts,  $content = null ) {
    extract( shortcode_atts( array(
      'title' => 'LATEST WORKS',
   ), $atts ) );
   ob_start(); ?>
        <h3><?php echo esc_attr($title); ?></h3>
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_section_title', 'shortcode_section_title' );

if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Section Title","sreative"),
   "base" => "dn_section_title",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Title","sreative"),
         "param_name" => "title",
         "value" => esc_attr("LATEST WORKS","sreative"),
         "description" => ''
      ),
   )
) );

}
/************************************
*INTRO ELEMENT
*************************************/
function shortcode_intro_element( $atts,  $content = null ) {
    extract( shortcode_atts( array(
      'title' => 'DO YOU LIKE WHAT YOU SEE ?',
      'intro_text' => '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem seqi nesciunt. Neque poro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          <a href="#">LEARN MORE</a>',
   ), $atts ) );
   ob_start(); ?>
        <div class="content-box">
          <h3><?php echo balancetags($title); ?></h3>
          <?php echo balancetags($intro_text); ?>
		</div>
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_intro_element', 'shortcode_intro_element' );
if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Intro Element","sreative"),
   "base" => "dn_intro_element",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Title","sreative"),
         "param_name" => "title",
         "value" => esc_attr("DO YOU LIKE WHAT YOU SEE ?","sreative"),
         "description" => ''
      ),
	  array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Intro text","sreative"),
         "param_name" => "intro_text",
         "value" => '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem seqi nesciunt. Neque poro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
          <a href="#">LEARN MORE</a> ',
         "description" => ''
      ),
   )
) );

}
/************************************
*Team ELEMENT
*************************************/
function shortcode_team( $atts,  $content = null ) {
    extract( shortcode_atts( array(
      'name' => 'David Coopperfield',
	  'image_id' => '',
      'job' => 'Front-End Developer',
	  
   ), $atts ) );
   ob_start(); ?>
   <?php
	
	$img = wp_get_attachment_image_src($image_id,'full');
 	$img = $img[0];
   
   ?>
   <div class="team-members wow fadeInUp">
        <figure><img src="<?php echo esc_url($img); ?>" alt="Image">
        <figcaption>
          <h3><?php echo esc_attr($name); ?></h3>
          <h6><?php echo esc_attr($job); ?></h6>
        </figcaption>
        </figure>
    </div>
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_team', 'shortcode_team' );

if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Team Element","sreative"),
   "base" => "dn_team",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
	  array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Avatar", "sreative"),
         "param_name" => "image_id",
         "value" => "",
         "description" => esc_attr("Upload Avatar.", "sreative")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Name","sreative"),
         "param_name" => "name",
         "value" => esc_attr("David Coopperfield","sreative"),
         "description" => ''
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Job","sreative"),
         "param_name" => "job",
         "value" => esc_attr("Front-End Developer"),
         "description" => ''
      ),
   )
) );

}

/************************************
*Service ELEMENT
*************************************/
function shortcode_service( $atts,  $content = null ) {
    extract( shortcode_atts( array(
      'image_id' => '',
	  'title' => 'BRAND IDENDITY',
	  'intro_text' => '<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut molestiae non recusandae. </p>
              <ul class="list1">
                <li><i class="ion-checkmark-circled"></i> High-end Unique Web Designs</li>
                <li><i class="ion-checkmark-circled"></i> PHP and JavaScript Applications</li>
                <li><i class="ion-checkmark-circled"></i> Custom E-Commerce Solutions</li>
                <li><i class="ion-checkmark-circled"></i> WordPress Development</li>
                <li><i class="ion-checkmark-circled"></i> Joomla! Programming</li>
              </ul>
              <span class="expand btn1">EXPAND</span> </div>',
      
   ), $atts ) );
   ob_start(); ?>
   <?php
	
	$img = wp_get_attachment_image_src($image_id,'full');
 	$img = $img[0];
   
   ?>
    <div class="services wow fadeInUp">
        <div class="box yellow-bg">
          <div class="table">
            <div class="inner"> <img src="<?php echo esc_url($img); ?>" alt="Image">
              <h4><?php echo balancetags($title); ?></h4>
              <?php echo balancetags($intro_text); ?>
            <!-- end inner --> 
          </div>
          <!-- end table --> 
        </div>
        <!-- end box --> 
      </div>
	</div>
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_service', 'shortcode_service' );

if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Service","sreative"),
   "base" => "dn_service",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
	 
	   array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Avatar", "sreative"),
         "param_name" => "image_id",
         "value" => "",
         "description" => esc_attr("Upload Avatar.", "sreative")
      ),
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Title","sreative"),
         "param_name" => "title",
         "value" => "BRAND IDENDITY",
         "description" => ''
      ),
	  array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Intro text","sreative"),
         "param_name" => "intro_text",
         "value" => '<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut molestiae non recusandae. </p>
              <ul class="list1">
                <li><i class="ion-checkmark-circled"></i> High-end Unique Web Designs</li>
                <li><i class="ion-checkmark-circled"></i> PHP and JavaScript Applications</li>
                <li><i class="ion-checkmark-circled"></i> Custom E-Commerce Solutions</li>
                <li><i class="ion-checkmark-circled"></i> WordPress Development</li>
                <li><i class="ion-checkmark-circled"></i> Joomla! Programming</li>
              </ul>
              <span class="expand btn1">EXPAND</span> </div>',
         "description" => ''
      ),
	  
   )
) );

}

/************************************
*Client ELEMENT
*************************************/
function shortcode_client($atts,  $content = null ) {
	extract( shortcode_atts( array(
      'image_id' => '',
   ), $atts ) );
   ob_start(); ?>
   <?php
	
	$img = wp_get_attachment_image_src($image_id,'full');
 	$img = $img[0];
   
   ?>
	<div class="logos item">
        <figure><img src="<?php echo esc_url($img); ?>" alt="Image"></figure>
    </div>
 
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_client', 'shortcode_client' );
if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Client","sreative"),
   "base" => "dn_client",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
	 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Image", "mannat"),
         "param_name" => "image_id",
         "value" => "",
         "description" => esc_attr("Upload image.", "mannat")
      ),
	  
   )
) );

}

/************************************
*Funfact ELEMENT
*************************************/
function shortcode_testi($atts,  $content = null ) {
	extract( shortcode_atts( array(
      'icon' => 'ion-ios-pulse',
	  'title' => '.projects completed',
	  'sub_title' => '269',
   ), $atts ) );
   ob_start(); ?>
      <div class="fun-facts">
        <div class="content-box"> <i class="<?php echo esc_attr($icon); ?>"></i> <span class="counter"><?php echo esc_attr($sub_title); ?></span>
          <h5><?php echo esc_attr($title); ?></h5>
        </div>
        <!-- end content-box --> 
      </div>
 
<?php
    return ob_get_clean();

}
add_shortcode( 'dn_funfact', 'shortcode_testi' );
if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_attr("DN Funfact","sreative"),
   "base" => "dn_funfact",
   "class" => "",
   "category" => esc_attr("Content", "sreative"),
   "params" => array(
	 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Icon","sreative"),
         "param_name" => "icon",
         "value" => "ion-ios-pulse",
         "description" => ''
      ),
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Title","sreative"),
         "param_name" => "title",
         "value" => ".projects completed",
         "description" => ''
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr("Number counter","sreative"),
         "param_name" => "sub_title",
         "value" => '269',
         "description" => ''
      ),
	  
   )
) );

}

?>