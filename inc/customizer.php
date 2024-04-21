<?php
/**
 * CT Custom Theme Customizer
 *
 * @package CT_Custom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ct_custom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ct_custom_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ct_custom_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_section('header_section', array(
        'title' => __('CT Header', 'ct-custom'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('ct_breadcrum_separator', array(
        'default' => '/',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('ct_breadcrum_separator', array(
        'label' => __('Breadcrumb Separator', 'ct-custom'),
        'section' => 'header_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('phone_number', array(
        'default' => '+880743259489',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('phone_number', array(
        'label' => __('Phone Number', 'ct-custom'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('phone_number_text', array(
        'default' => 'CALL US NOW!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('phone_number_text', array(
        'label' => __('Phone Text', 'ct-custom'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    $wp_customize->add_section('contact_section', array(
        'title' => __('CT Contact Section', 'ct-custom'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('contact_heading', array(
        'default' => __('Contact', 'ct-custom'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_heading', array(
        'label' => __('Heading', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_subheading', array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'ct-custom'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_subheading', array(
        'label' => __('Subheading', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_form_title', array(
        'default' => __('CONTACT US', 'ct-custom'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_title', array(
        'label' => __('Form Title', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_form_shortcode', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_shortcode', array(
        'label' => __('Contact Form Shortcode', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_info_title', array(
        'default' => __('REACH US', 'ct-custom'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_info_title', array(
        'label' => __('Contact Info Title', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_info', array(
        'default' => __('535 La Plata Street<br>4200 Argentina<br><br>Phone: 385.154.11.28.38<br>Fax: 385.154.35.66.78', 'ct-custom'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('contact_info', array(
        'label' => __('Contact Information', 'ct-custom'),
        'section' => 'contact_section',
        'type' => 'textarea',
    ));

     $wp_customize->add_section('social_media_section', array(
        'title' => __('CT Social Media Links', 'ct-custom'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => __('Facebook URL', 'ct-custom'),
        'section' => 'social_media_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => __('Twitter URL', 'ct-custom'),
        'section' => 'social_media_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => __('LinkedIn URL', 'ct-custom'),
        'section' => 'social_media_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('pinterest_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => __('Pinterest URL', 'ct-custom'),
        'section' => 'social_media_section',
        'type' => 'url',
    ));

    $wp_customize->add_section('footer_section', array(
        'title' => __('CT Footer Visibility', 'ct-custom'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('footer_visibility', array(
        'default' => false,
        'sanitize_callback' => 'sanitize_checkbox',
    ));

    $wp_customize->add_control('footer_visibility', array(
        'label' => __('Show Footer', 'ct-custom'),
        'section' => 'footer_section',
        'type' => 'checkbox',
    ));

     $wp_customize->add_section('copyright_section', array(
        'title' => __('CT Copyright Text', 'ct-custom'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('copyright_text', array(
        'default' => __('Copyright @ coalictiontechnology 2024', 'ct-custom'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('copyright_text', array(
        'label' => __('Copyright Text', 'ct-custom'),
        'section' => 'copyright_section',
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'ct_custom_customize_register' );

// Sanitize checkbox input
function sanitize_checkbox($input) {
    return (bool) $input;
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ct_custom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ct_custom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ct_custom_customize_preview_js() {
	wp_enqueue_script( 'ct-custom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ct_custom_customize_preview_js' );
