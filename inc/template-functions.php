<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package invitational
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function invitational_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'invitational_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function invitational_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'invitational_pingback_header' );

function footer_widget_areas() {
    $footer_area_count = 5;
    for($i = 1; $footer_area_count >= $i; $i++ ):
        $args = array(
            'id'            => "footer-area-{$i}",
            'class'         => "footer-area-{$i}",
            'name'          => __( "Footer Area {$i}", 'jao_invitational' ),
            'description'   => __( "Footer Area", 'jao_invitational' ),
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title' => '<h2 class="footer-area-title">',
            'after_title' => '</h2>'
        );
        register_sidebar( $args );
    endfor;
}
add_action( 'widgets_init', 'footer_widget_areas' );
