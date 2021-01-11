<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // Get the theme data
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );

    $css_version = $theme_version . '.' . time();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $css_version );
    
    wp_enqueue_script( 'jquery');
    
    $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $js_version, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// ADDITIONAL THEME FILES
function d4tw_enqueue_files () {
    wp_enqueue_script( 'Theme Scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'Match Heights JS', get_stylesheet_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab:wght@500&display=swap' );
}

add_action('wp_enqueue_scripts', 'd4tw_enqueue_files');

// ACF GENERAL INFO PAGE
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'General Information',
        'menu_title'    => 'General Info',
        'menu_slug'     => 'general-information'
    )); 
}

// REPLACE FOOTER TEXT
function d4tw_filter_admin_footer () {
    echo '<span id="dashFooter">Website developed by <a style = "color: #cc0000; text-decoration: none;" href="https://www.designs4theweb.com" target="_blank">Designs 4 The Web</a></span>';
}
add_filter('admin_footer_text', 'd4tw_filter_admin_footer');

// REPLACE HOWDY TEXT
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// REPLACE LOGIN LOGO
function d4tw_custom_logo_css () {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'd4tw_custom_logo_css');

// REPLACE LOGIN LOGO LINK URL
function d4tw_login_url(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'd4tw_login_url');

// ADD THE DASHBOARD CSS FILE
function d4tw_admin_css() {
    wp_enqueue_style('dashboard-styles', get_stylesheet_directory_uri() . '/dashboard/dashboard.css');
}
add_action('admin_head', 'd4tw_admin_css');

// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

//Remove the WordPress version number.
remove_action('wp_head', 'wp_generator');

//Disable autosave
function disable_autosave() {
    wp_deregister_script('autosave');
}
add_action('wp_print_scripts','disable_autosave');

//Remove the admin bar
add_filter('show_admin_bar', '__return_false');

// DEREGISTER SIDEBARS & TEMPLATES
function d4tw_remove_sidebars () {
    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'footerfull' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
}
add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );

function d4tw_remove_page_templates( $templates ) {
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'd4tw_remove_page_templates' );

// CUSTOM EXCERPTS FILTER
if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
    function understrap_all_excerpts_get_more_link( $post_excerpt ) {
        if ( ! is_admin() ) {
            $post_excerpt = $post_excerpt . '<a href = "' . get_permalink() . '"> Read More...</a></p>';
        }
        return $post_excerpt;
    }
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

//Shrink the excerpt
function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Attorney CPT
add_action( 'init', 'video_post_type', 0 );

function video_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Videos',
    'singular_name'       => 'Video',
    'menu_name'           => 'Videos',
    'parent_item_colon'   => 'Parent Videos',
    'all_items'           => 'All Videos',
    'view_item'           => 'View Video',
    'add_new_item'        => 'Add New Video',
    'add_new'             => 'Add Video',
    'edit_item'           => 'Edit Video',
    'update_item'         => 'Update Video',
    'search_items'        => 'Search Videos',
    'not_found'           => 'No Videos Found',
    'not_found_in_trash'  => 'No Videos Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'Videos',
    'description'         => 'Site videos.',
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'menu_icon'           => 'dashicons-video-alt3'
  );
  
//Register the CPT
  register_post_type( 'video', $args );
}

// CUSTOM IMAGE SIZES
update_option( 'thumbnail_size_w', 320 );
update_option( 'thumbnail_size_h', 180 );

?>