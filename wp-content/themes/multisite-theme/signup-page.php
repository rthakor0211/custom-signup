<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package multisite-theme

 Template Name: SignUp Page
 */
ob_start();
get_header();
?>

	<main id="primary" class="site-main custom-section">

		<h1>SignUp</h1>

		<form id="signup-form" method="post">
			<div class="input-block">
				<label for="username">Username:</label>
			    <input type="text" id="username" name="username" required>	
			</div>
			<div class="input-block">
				<label for="email">Email:</label>
		    	<input type="email" id="email" name="email" required>				
			</div>
			<div class="input-block">
				<label for="company_name">company Name:</label>
			    <input type="text" id="company_name" name="company_name" required>	
			</div>
			<div class="input-block">
				<label for="password">Password:</label>
		    	<input type="password" id="password" name="password" required>				
		    </div>
		    <div class="input-block">
		    	<button type="submit" name="submit">Sign Up</button>
		    </div>
		</form>

	</main><!-- #main -->


<?php

if (isset($_POST['submit'])) {

	    $username = $_POST['username'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $company = $_POST['company_name'];

	    if (username_exists( $username )) {
	    	echo '<div class="success-msg">User already created with </div>'.$username;
	    } elseif ( username_exists( $username ) ) {
	    	echo '<div class="success-msg">Email already registered with </div>'.$username;
	    } else {

		    // Use wp_create_user() function to create a new user account
		    $user_id = wp_create_user($username, $password, $email);

		    // Add the user meta data for the company name field
		    update_user_meta($user_id, 'company_name', $company);


		    // Generate OTP and store it in user meta
		    $otp = rand(1000,9999);
		    update_user_meta($user_id, 'email_otp', $otp);
		    update_user_meta($user_id, 'email_otp_status', 'false');
		    
		    // Send OTP to user via email
		    $to = $email;
		    $subject = 'Email verification OTP';
		    $message = 'Your OTP is '.$otp;
		    $headers = 'From: ' . get_bloginfo('name') . ' <' . get_bloginfo('admin_email') . '>';
		    wp_mail($to, $subject, $message, $headers);	

		    // Redirect to OTP verification page
		    $redirect_to = home_url('/verify-email-otp/?email='.$email);
		    wp_redirect($redirect_to);
		    exit;   	    	

	    }


    }


	// Generate a unique verification link with a token
	// $token = md5(uniqid());
	// $verification_link = site_url('verify-email') . '?token=' . $token;

	// Save the token to the user meta data
	// update_user_meta($user_id, 'email_verification_token', $token);
	// update_user_meta($user_id, 'email_verify_status', 'false');

	// Send the verification email to the user's email address
	// $to = $email;
	// $subject = 'Verify your email address';
	// $message = 'Please click the following link to verify your email address: ' . $verification_link;
	// $headers = 'From: ' . get_bloginfo('name') . ' <' . get_bloginfo('admin_email') . '>';

	//wp_mail($to, $subject, $message, $headers);    


get_sidebar();
get_footer();
