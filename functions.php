<?php


/** @desc this loads the composer autoload file */
// require get_theme_file_path( '/vendor/autoload.php' );

/** @desc this instantiates Dotenv and passes in our path to .env.example */
// $dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
// $dotenv->load();

/** @desc Using an .env.example file for security */
// define( 'RECAPTCHA_SECRET_KEY', $_ENV['RECAPTCHA_SECRET_KEY'] );
// define( 'RECAPTCHA_SITE_KEY', $_ENV['RECAPTCHA_SITE_KEY'] );
// define( 'EMAIL_SENDER', $_ENV['EMAIL_SENDER'] );

/** @desc Other variables */
define('WCL_THEME_VERSION', '0.2.7');
define('SITE_NAME', get_bloginfo('name'));
define('WCL_CONTACT_MAIL', 'admin@mail.com');

/** Define variable from ACF options page */
function wcl_acf_init()
{
    $contact_email = get_field('contact_email', 'option');
    $contact_phone = get_field('contact_phone', 'option');

    define('CONTACT_EMAIL', $contact_email);
    define('CONTACT_PHONE', $contact_phone);
}

add_action('acf/init', 'wcl_acf_init');


/** Enqueueing Styles & Scripts */
function wcl_theme_enqueue_scripts()
{
    // Remove jQuery from front-end of the website
    wp_deregister_script('jquery');

    // Swiper
    wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], WCL_THEME_VERSION);
    wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], WCL_THEME_VERSION, true);

    // Styles
    wp_enqueue_style('wcl-style', get_template_directory_uri() . '/assets/css/wcl-style.css', [], WCL_THEME_VERSION);

    // Scripts
    // wp_enqueue_script( 'captcha-js', 'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY, [], WCL_THEME_VERSION, true );
    wp_enqueue_script('wcl-scripts', get_template_directory_uri() . '/assets/js/wcl-scripts.js', [], WCL_THEME_VERSION, true);

    wp_localize_script('wcl-scripts', 'config', [
        'ajax_url' => admin_url('admin-ajax.php'),
        // 'recaptcha_key' => RECAPTCHA_SITE_KEY,
    ]);
}

add_action('wp_enqueue_scripts', 'wcl_theme_enqueue_scripts');


/** Enqueueing Styles & Scripts To Admin Panel */
function wcl_admin_enqueue_scripts($hook)
{
    // Styles
    wp_enqueue_style('wcl-admin-style', get_template_directory_uri() . '/assets/css/wcl-admin-style.css', [], WCL_THEME_VERSION);

    // Script
    wp_enqueue_script('wcl-admin-scripts', get_template_directory_uri() . '/assets/js/wcl-admin-scripts.js', [], WCL_THEME_VERSION, true);
}

add_action('admin_enqueue_scripts', 'wcl_admin_enqueue_scripts', 100);


/** Remove default image sizes options */
function wcl_disable_unused_image_sizes($sizes)
{
    unset($sizes['thumbnail']);    // disable thumbnail size
    unset($sizes['medium']);       // disable medium size
    unset($sizes['large']);        // disable large size
    unset($sizes['medium_large']); // disable medium-large size
    unset($sizes['1536x1536']);    // disable 2x medium-large size
    unset($sizes['2048x2048']);    // disable 2x large size
    return $sizes;
}

add_action('intermediate_image_sizes_advanced', 'wcl_disable_unused_image_sizes');


function wcl_disable_other_images()
{
    remove_image_size('post-thumbnail'); // disable set_post_thumbnail_size()
    remove_image_size('another-size');   // disable other add image sizes
}

add_action('init', 'wcl_disable_other_images');

add_filter('big_image_size_threshold', '__return_false');


/** Add custom image sizes */

add_image_size('banner-image', 1140, 0, false);
add_image_size('banner-image@2x', 2280, 0, false);

add_image_size('logo', 75, 0, false);
add_image_size('logo@2x', 150, 0, false);

add_image_size('icon', 50, 0, false);
add_image_size('icon@2x', 100, 0, false);

add_image_size('icon-md', 150, 0, false);
add_image_size('icon-md@2x', 300, 0, false);

add_image_size('square-sm', 75, 0, false);
add_image_size('square-sm@2x', 150, 0, false);

add_image_size('square-md', 250, 0, false);
add_image_size('square-md@2x', 500, 0, false);

add_image_size('square-lg', 500, 0, false);
add_image_size('square-lg@2x', 1000, 0, false);

add_image_size('landscape-sm', 400, 250, false);
add_image_size('landscape-sm@2x', 800, 500, false);

add_image_size('landscape-md', 550, 400, false);
add_image_size('landscape-md@2x', 1100, 800, false);

add_image_size('portrait-sm', 200, 300, false);
add_image_size('portrait-sm@2x', 400, 600, false);

add_image_size('portrait-md', 400, 500, false);
add_image_size('portrait-md@2x', 800, 1000, false);


/* * Support HTML 5 tags for styles and scripts */
function wcl_add_theme_support()
{
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['script', 'style']);
}

add_action('after_setup_theme', 'wcl_add_theme_support');


/** Register Nav Manus */

function wcl_register_nav_menus()
{
    register_nav_menu('header-menu', 'Header Menu');
    register_nav_menu('footer-menu', 'Footer Menu');
}

add_action('after_setup_theme', 'wcl_register_nav_menus');



/** ACF Option Page */
if (function_exists('acf_add_options_page')) {
    // Theme Settings page
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'dashicons-admin-home',
    ));

    /*
    // Theme Settings Subpage
    acf_add_options_sub_page( array(
        'page_title' => 'Subpage',
        'menu_title' => 'Subpage',
        'parent_slug' => 'theme-settings',
    ) );
    */
}


/** Change WordPress Login Page Logo */
function wcl_custom_login_logo()
{
    echo '<style type="text/css">
        body.login {
            background: #2B2647 !important;
        }

        #login h1 a, .login h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/logo.svg);
            height: 130px !important; /* Change the height as needed */
            width: 100% !important; /* Use 100% width for responsiveness */
            background-size: 100% !important; /* Adjust this property as needed */
        }
        
        .login #backtoblog a, .login #nav a {
            color: #fff !important;
        }
        
        .login #backtoblog a:hover, .login #nav a:hover {
            color: #E97872 !important;
        }
    </style>';
}

add_action('login_enqueue_scripts', 'wcl_custom_login_logo');


// Remove WP top bar for users
function wcl_remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

add_action('after_setup_theme', 'wcl_remove_admin_bar');


// Block the user from entering the admin panel
function wcl_restrict_admin_access()
{
    if (!current_user_can('manage_options') && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php') {
        wp_redirect(home_url());
        exit;
    }
}

add_action('admin_init', 'wcl_restrict_admin_access');


/** Others Files */
require_once get_theme_file_path('/inc/helpers.php');

// ACF Blocks
require_once get_theme_file_path('/inc/acf-blocks.php');

// Shortcode
require_once get_theme_file_path('/inc/shortcodes/social-links.php');

// Translations
// require_once get_theme_file_path( '/inc/i18n.php' );

// Walker
// require_once get_theme_file_path( '/inc/walker/header-nav-menu.php' );

// CPT
require_once get_theme_file_path( '/inc/custom-post-types/products.php' );

// Actions
// require_once get_theme_file_path( '/inc/actions/load-more.php' );

// API
// require_once get_theme_file_path( '/inc/api/api.php' );

// Cron
// require_once get_theme_file_path( '/inc/cron/update-rates.php' );

// Disabling the generation of <p> tags in the form of cf7
add_filter('wpcf7_autop_or_not', '__return_false');