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

 Template Name: Verify Email OTP Page
 */

  
ob_start();
get_header();

if ($_GET['email']) {
    $email = $_GET['email'];

}



?>


    <main id="primary" class="site-main custom-section">
        <h1>Verify Otp</h1>
        <form method="post">
            <div class="input-block">
                <label for="otp">Email :</label>
                <input type="email" name="email" value="<?php echo $email;?>" required>
            </div>
            <div class="input-block">
                <label for="otp">Enter OTP:</label>
                <input type="text" name="otp" id="otp" required>
            </div>
            
            <div class="input-block">
                <input type="submit" name="otp_submit" value="Verify OTP">
            </div>
        </form>

    </main>


<?php


if( isset($_GET['email']) && isset($_POST['otp_submit']) ) {
    
    $otp = $_POST['otp'];
    $user = get_user_by('email', $email);
    $user_id = $user->ID;
    $stored_otp = get_user_meta($user_id, 'email_otp', true);

    if ( $stored_otp == $otp ) {
        update_user_meta($user_id, 'email_otp_status', 'true');
        // OTP verified, redirect to login page
        $redirect_to = home_url('/signin');
        wp_redirect($redirect_to);
        
        exit;
    } else {
        // Display error message for invalid OTP
         echo '<div class="error-msg">invalid OTP</div>';
    }
}


// Code For Email Vafification BY token

// $home = get_home_url();
// $url_param = array();
// parse_str($_SERVER['QUERY_STRING'],$url_param);
// $token =  $url_param['token'];

// if ($token) {

// $users = get_users(array(
// 	'meta_key' => 'email_verification_token',
//     'meta_value' => $token
// ));

// if (!empty($users)) {

//     $user_id = $users[0]->ID;
//     update_user_meta($user_id, 'email_verify_status', 'true');
//     print_r($user_id);
//     echo '<div class="success-msg">We have verified your email address</div>';
//     echo '<a href="'.$home.'/signin/" class="login-btn">Login Now</a>';

// } else {
//     echo '<div class="error-msg">User not found with this key</div>';
// }


// }



?>

<?php
get_sidebar();
get_footer();
