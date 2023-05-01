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

 Template Name: EmailVerify Page
 */

get_header();

?>


<?php

$home = get_home_url();
$url_param = array();
parse_str($_SERVER['QUERY_STRING'],$url_param);
$token =  $url_param['token'];

if ($token) {

$users = get_users(array(
	'meta_key' => 'email_verification_token',
    'meta_value' => $token
));

if (!empty($users)) {

    $user_id = $users[0]->ID;
    update_user_meta($user_id, 'email_verify_status', 'true');
    print_r($user_id);
    echo '<div class="success-msg">We have verified your email address</div>';
    echo '<a href="'.$home.'/signin/" class="login-btn">Login Now</a>';

} else {
    echo '<div class="error-msg">User not found with this key</div>';
}


}



?>

<?php
get_sidebar();
get_footer();
