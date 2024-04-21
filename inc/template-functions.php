<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CT_Custom
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ct_custom_body_classes( $classes ) {
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
add_filter( 'body_class', 'ct_custom_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ct_custom_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ct_custom_pingback_header' );

/**
 * Generate social media links.
 */
function ct_custom_social_media_links() {
    $social_media_links = '';

    // Facebook
    $facebook_url = get_theme_mod('facebook_url', '#');
    if ($facebook_url) {
        $social_media_links .= '<li><a href="' . esc_url($facebook_url) . '"><i class="fa-brands fa-facebook-f"></i></a></li>';
    }

    // Twitter
    $twitter_url = get_theme_mod('twitter_url', '#');
    if ($twitter_url) {
        $social_media_links .= '<li><a href="' . esc_url($twitter_url) . '"><i class="fa-brands fa-twitter"></i></a></li>';
    }

    // LinkedIn
    $linkedin_url = get_theme_mod('linkedin_url', '#');
    if ($linkedin_url) {
        $social_media_links .= '<li><a href="' . esc_url($linkedin_url) . '"><i class="fa-brands fa-linkedin-in"></i></a></li>';
    }

    // Pinterest
    $pinterest_url = get_theme_mod('pinterest_url', '#');
    if ($pinterest_url) {
        $social_media_links .= '<li><a href="' . esc_url($pinterest_url) . '"><i class="fa-brands fa-pinterest-p"></i></a></li>';
    }

    // Output social media links
    if (!empty($social_media_links)) {
        echo '<div class="ct-social-media"><ul>' . $social_media_links . '</ul></div>';
    }
}
