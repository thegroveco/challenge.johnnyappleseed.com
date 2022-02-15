<?php
/**
 * invitational functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package invitational
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function invitational_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on invitational, use a find and replace
		* to change 'invitational' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'invitational', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'invitational' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'invitational_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'invitational_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function invitational_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'invitational_content_width', 640 );
}
add_action( 'after_setup_theme', 'invitational_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function invitational_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'invitational' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'invitational' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'invitational_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function invitational_scripts() {
	wp_enqueue_style( 'invitational-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'invitational-style', 'rtl', 'replace' );

	wp_enqueue_script( 'invitational-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'invitational-theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'invitational_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register ACF Custom Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';


/**
 * Register `Contestants` Custom Post Type
 */
function cpt_contestants() {

    $labels = array(
        'name'                  => _x( 'Contestants', 'Post Type General Name', 'the_invitational' ),
        'singular_name'         => _x( 'Contestant', 'Post Type Singular Name', 'the_invitational' ),
        'menu_name'             => __( 'Contestants', 'the_invitational' ),
        'name_admin_bar'        => __( 'Contestants', 'the_invitational' ),
        'archives'              => __( 'Contestant Archive', 'the_invitational' ),
        'attributes'            => __( 'Contestant Attributes', 'the_invitational' ),
        'parent_item_colon'     => __( 'Parent Contestant:', 'the_invitational' ),
        'all_items'             => __( 'All Contestants', 'the_invitational' ),
        'add_new_item'          => __( 'Add New Contestant', 'the_invitational' ),
        'add_new'               => __( 'Add New Contestants', 'the_invitational' ),
        'new_item'              => __( 'New Contestant', 'the_invitational' ),
        'edit_item'             => __( 'Edit Contestant', 'the_invitational' ),
        'update_item'           => __( 'Update Contestant', 'the_invitational' ),
        'view_item'             => __( 'View Contestant', 'the_invitational' ),
        'view_items'            => __( 'View Contestants', 'the_invitational' ),
        'search_items'          => __( 'Search Contestant', 'the_invitational' ),
        'not_found'             => __( 'Not found', 'the_invitational' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'the_invitational' ),
        'featured_image'        => __( 'Featured Image', 'the_invitational' ),
        'set_featured_image'    => __( 'Set featured image', 'the_invitational' ),
        'remove_featured_image' => __( 'Remove featured image', 'the_invitational' ),
        'use_featured_image'    => __( 'Use as featured image', 'the_invitational' ),
        'insert_into_item'      => __( 'Insert into item', 'the_invitational' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'the_invitational' ),
        'items_list'            => __( 'Contestants list', 'the_invitational' ),
        'items_list_navigation' => __( 'Contestants list navigation', 'the_invitational' ),
        'filter_items_list'     => __( 'Filter Contestants list', 'the_invitational' ),
    );
    $args = array(
        'label'                 => __( 'Contestant', 'the_invitational' ),
        'description'           => __( 'Contestants', 'the_invitational' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'contestant', $args );

}
add_action( 'init', 'cpt_contestants', 0 );

// Register Custom Post Type
function cpt_challenges() {

    $labels = array(
        'name'                  => _x( 'Challenges', 'Post Type General Name', 'the_invitational' ),
        'singular_name'         => _x( 'Challenge', 'Post Type Singular Name', 'the_invitational' ),
        'menu_name'             => __( 'Challenges', 'the_invitational' ),
        'name_admin_bar'        => __( 'Challenge', 'the_invitational' ),
        'archives'              => __( 'Item Archives', 'the_invitational' ),
        'attributes'            => __( 'Item Attributes', 'the_invitational' ),
        'parent_item_colon'     => __( 'Parent Item:', 'the_invitational' ),
        'all_items'             => __( 'All Items', 'the_invitational' ),
        'add_new_item'          => __( 'Add New Challenge', 'the_invitational' ),
        'add_new'               => __( 'Add New Challenge', 'the_invitational' ),
        'new_item'              => __( 'New Item', 'the_invitational' ),
        'edit_item'             => __( 'Edit Item', 'the_invitational' ),
        'update_item'           => __( 'Update Item', 'the_invitational' ),
        'view_item'             => __( 'View Item', 'the_invitational' ),
        'view_items'            => __( 'View Items', 'the_invitational' ),
        'search_items'          => __( 'Search Item', 'the_invitational' ),
        'not_found'             => __( 'Not found', 'the_invitational' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'the_invitational' ),
        'featured_image'        => __( 'Featured Image', 'the_invitational' ),
        'set_featured_image'    => __( 'Set featured image', 'the_invitational' ),
        'remove_featured_image' => __( 'Remove featured image', 'the_invitational' ),
        'use_featured_image'    => __( 'Use as featured image', 'the_invitational' ),
        'insert_into_item'      => __( 'Insert into item', 'the_invitational' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'the_invitational' ),
        'items_list'            => __( 'Items list', 'the_invitational' ),
        'items_list_navigation' => __( 'Items list navigation', 'the_invitational' ),
        'filter_items_list'     => __( 'Filter items list', 'the_invitational' ),
    );
    $args = array(
        'label'                 => __( 'Challenge', 'the_invitational' ),
        'description'           => __( 'Challenges for the contest', 'the_invitational' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-awards',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'challenge', $args );

}
add_action( 'init', 'cpt_challenges', 0 );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Site  Settings',
        'menu_title'	=> 'Site Settings',
        'menu_slug' 	=> 'site-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

}
