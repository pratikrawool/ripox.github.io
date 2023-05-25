<?php
if ( function_exists( 'ot_get_option') ) {
		$email1 = ot_get_option( 'email_contactform' );
	}
?>

<?php

	//If the form is submitted
	if(isset($_POST['submitted'])) {
		
		global $decneo_shortname;
		
		//Check to see if the honeypot captcha field was filled in
		if(trim($_POST['checking']) !== '') {
		
			$captchaError = true;
			
		} else {
		
			//Check to make sure that the name field is not empty
			if(trim($_POST['contactName']) === '') {
				$decneo_nameError = esc_html('You forgot to enter your name.', 'multipixels');
				$hasError = true;
			} else {
				$name = trim($_POST['contactName']);
			}
			
			//Check to make sure sure that a valid email address is submitted
			if(trim($_POST['email']) === '')  {
				$decneo_emailError = esc_html('You forgot to enter your email address.', 'multipixels');
				$hasError = true;
			} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
				$decneo_emailError = esc_html('You entered an invalid email address.', 'multipixels');
				$hasError = true;
			} else {
				$email = trim($_POST['email']);
			}
				
			//Check to make sure comments were entered	
			if(trim($_POST['comments']) === '') {
				$decneo_commentError = esc_html('You forgot to enter your message.', 'multipixels');
				$hasError = true;
			} else {
				$comments = trim($_POST['comments']);
			}
			
			//If there is no error, send the email
			if(!isset($hasError)) {

				$emailTo = $email1;
				$subject = get_bloginfo('name').' contact form submission';
				$sendCopy = trim($_POST['sendCopy']);
				
				$name = stripslashes($name);
				$email = stripslashes($email);
				$comments = stripslashes($comments);
				
				$body = $comments."\r\n\r\n";
				$body .= $name."\r\n\r\n";
				
				// Email headers
				$headers = "Content-Type: text/plain; charset=utf-8\r\n";
				$headers .= "From: ".$name." <".$email."> ";
				
				mail($emailTo, $subject, $body, $headers);

				if($sendCopy == true) {
				
					$subject = "You emailed ".get_bloginfo('name');
					
					// Email headers
					$receipt_headers = "Content-Type: text/plain; charset=utf-8\r\n";
					$receipt_headers .= "From: ".get_bloginfo('name')." <".$emailTo."> ";
					
					mail($email, $subject, $body, $receipt_headers);
					
				}
				
				// Create post object
				$submitted_message = array(
					'post_title' => $name,
					'post_content' => $comments,					
					'post_status' => 'publish',
					'post_type' => 'messages',
					'post_author' => 1
				);

				// Insert the post into the database
				$new_message_id = wp_insert_post( $submitted_message );
				
				add_post_meta($new_message_id, $decneo_shortname.'_reply_to_address', $email, false);
			  
				$decneo_emailSent = true;

			}
		}
	}


?>