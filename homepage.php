<?php
/**
 * Template Name: Homepage
 * @package CT-CUSTOM 
 * @since 1.0.0
 */
get_header(); ?>
<!-- breadcrumb Section end -->
<div class="ct-heading">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1><?php echo esc_html(get_theme_mod('contact_heading', __('Contact', 'ct-custom'))); ?></h1>
                <p><?php echo esc_html(get_theme_mod('contact_subheading', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'ct-custom'))); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="ct-contact-form">
    <div class="container">
        <div class="row ct-contact-wrap">
            <div class="contact-f-left">
                <h2><?php echo esc_html(get_theme_mod('contact_form_title', __('CONTACT US', 'ct-custom'))); ?></h2>
                <hr>
                <?php echo do_shortcode(get_theme_mod('contact_form_shortcode', '')); ?>
            </div>
            <div class="contact-f-right">
                <h2><?php echo esc_html(get_theme_mod('contact_info_title', __('REACH US', 'ct-custom'))); ?></h2>
                <hr>
                <p><?php echo wp_kses_post(get_theme_mod('contact_info', __('535 La Plata Street<br>4200 Argentina<br><br>Phone: 385.154.11.28.38<br>Fax: 385.154.35.66.78', 'ct-custom'))); ?></p>
                <?php ct_custom_social_media_links(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
