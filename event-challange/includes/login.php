<?php 
add_action( 'login_enqueue_scripts', 'mm_custom_login_page' );
function mm_custom_login_page() {
	$template_dir = get_template_directory_uri();
	crb_enqueue_style( 'login-style', $template_dir . '/assets/login.css' );
}

add_filter( 'login_headerurl', 'mm_loginpage_custom_link' );
function mm_loginpage_custom_link() {
	return home_url( '/' );
}

add_filter( 'login_headertitle', 'mm_change_title_on_logo' );
function mm_change_title_on_logo() {
	return get_bloginfo( 'description' );
}
