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

 Template Name: SignIn Page
 */

ob_start();
get_header();




?>
	<main id="primary" class="site-main custom-section">

		<h1>SignIn</h1>
		<form action="" method="post" id="login-form">
		  <div class="input-block">
		  	<label>User name:</label>
		    <input name="username" type="username" />
		  </div>

		  <div class="input-block">
		  	<label>Password: </label>
		    <input name="user_password" type="password" />
		  </div>
		  <div>
		    <input  type="submit" value="Submit" name="submit"/>
		  </div>
		</form>
	</main>
<?php




// If the user is already logged in, redirect to the home page
if ( is_user_logged_in() ) {

      wp_redirect(home_url());
      exit();
}


	// Check if the user has submitted the login form
if (isset($_POST['submit'])) {

	    // Get the user input from the form
	    $username = $_POST['username'];
	    $password = $_POST['user_password'];
	    
		$userexist = isset( $_POST['username'] ) ? $_POST['username'] : '';
		$user_id = username_exists( $userexist );

		echo $user_id;

		// check If the user ID exists
		if ( $user_id ) {

			// check email verified or not
			$email_otp_status = get_user_meta( $user_id, 'email_otp_status', true );	

			
			// get the company field value
			$company_name = get_user_meta( $user_id, 'company_name', true );	

			if ($email_otp_status == true) {
			
					
				// Sign in the user
			    $user = wp_signon( array(
			        'user_login'    => $username,
			        'user_password' => $password,
			        'remember'      => true
			    ), false );


				if ($company_name) {
					$company_name = sanitize_title($company_name);
					$sub_domain = 'https://'.$company_name.'.domain.com';
					wp_redirect($sub_domain);	
				}


			    // Check if the sign-in was successful
			    if ( !is_wp_error( $user ) ) {
			        // Redirect the user to the home page
			        echo '<div class="success-msg">Login Successfully </div>';
			        exit;
			    } else {
			        // Sign-in failed, redirect the user back to the login form with an error message
			        echo $user->get_error_message();
			        //echo '<div class="login-error">Invalid username or password</div>';
			    }						

			}else{
				 echo '<div class="error-msg">Please verify your email OTP before login</div>';
			}

		}
	}


?>


<?php
get_sidebar();
get_footer();
