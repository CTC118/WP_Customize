<?php

/*
	Codes for creating a customize login page in WP
	Put the functions in the function.php below the activted theme.

	https://codex.wordpress.org/Customizing_the_Login_Form

	==========================================
	 Step1 - Login's logo customize    
	==========================================
*/
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/login/logo_blue.png);
		height:160px;
		width:140px;
		background-size: 160px 140px;
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
/*
	==========================================
	 Step2 - Change the logo image URL & Title
	==========================================
*/
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return '若晨室內裝修網站後台登入頁面';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_customize_errors(){
    return '輸入的資料不正確，請再試一次。';
}
add_filter( 'login_errors', 'my_login_customize_errors' );
/*
	==========================================
	 Step3 - Custom css file into <head> section
	==========================================
*/
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
/*
	==========================================
	 Step4 - Add custom link under login form
	==========================================
*/
function custom_link() { 
?><p id="note_contact_us" style="text-align: center; margin-bottom: 2em; color:#28374E;">如果有任何問題請與
        <a style="color: #BD9A77; text-decoration: none; font-weight:700;" href="mailto:contact@vioyiweb.com" title="VioyiWeb紫奕網頁設計">我們</a>聯繫
    </p><?php 
}
add_action('login_footer','custom_link');