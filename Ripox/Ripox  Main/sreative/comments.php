<?php
/*
 * @package WordPress
 * @subpackage flex
 */
?>

<?php

	$name = esc_attr( 'Name *', 'multipixels' );
	$email = esc_attr( 'Email *', 'multipixels' );
	$website = esc_attr( 'Website', 'multipixels' );
	$message = esc_attr( 'Message *', 'multipixels' );
	$login = esc_attr( 'You are logged in as', 'multipixels' ); 
	$click = esc_attr( 'Click here to', 'multipixels' );
	$logout = esc_attr( 'Log out', 'multipixels' );
	$addreply = esc_attr( 'Post Comment', 'multipixels' );
?>


	
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php esc_attr( 'This post is password protected. Enter the password to view any comments.', 'multipixels' ); ?></p>

<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
			<h4 class="comments_title">	<i class="fa fa-comments"></i>		
			<?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'multipixels' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h4>

			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'decneo_comment' ) );
				?>
			</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_comments_link( esc_attr( '<span class="meta-nav">&laquo;</span> Older Comments', 'multipixels' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_attr( 'Newer Comments <span class="meta-nav">&raquo;</span>', 'multipixels'  ) ); ?></div>
			</div>
			
<?php endif;  ?>

<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php esc_attr( 'Comments are closed.', 'multipixels' ); ?></p>
<?php endif; ?>

<?php endif; ?>
<?php if ( comments_open() ) : ?>

 <!-- Comment Form -->
    <div id="respond" class="">
        <h4><?php comment_form_title(esc_attr( 'Leave a comment', 'multipixels' ), esc_attr( 'Leave a reply To ', 'multipixels' ).' %s'); ?></h4>
        <form id="replyform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
            <?php if ($user_ID) : ?>
            <p><?php echo esc_attr($login) ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo esc_attr($user_identity); ?></a>. <?php echo esc_attr($click) ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php echo esc_attr($logout) ?></a>.</p><br/>
            <?php else : ?>
		<div class="input_cm_wrapper">
			<h5 for="commentName"><?php esc_html_e( 'Name *', 'multipixels' ); ?></h5>
            <input type="text" name="author" id="reply_name" class="requiredfield"/>
        </div>
		<div class="input_cm_wrapper">	
            <h5 for="email"><?php esc_html_e( 'Email Address *', 'multipixels' ); ?></h5>			
            <input type="text" name="email" id="reply_email" class="requiredfield"/>
		</div>	
		<div class="input_cm_wrapper last">	
			<h5 for="website"><?php esc_html_e( 'Website', 'multipixels' ); ?></h5>	
            <input type="text" name="url" id="reply_website" class="last"/>
		</div>	
			
            <?php endif; ?>
			<span class="clear"></span>
			<h5 for="commentsText"><?php esc_html_e( 'Message *', 'multipixels' ); ?></h5>
            <textarea name="comment" id="reply_message" class="requiredfield"></textarea>
			<button class="button" type="submit" name="send"><?php echo esc_attr($addreply) ?></button><?php comment_id_fields(); ?><?php do_action('comment_form', $post->ID); ?>
        </form>
    </div>
<?php endif; ?>