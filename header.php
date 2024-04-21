<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="header-top">
        <div class="container">
            <div class="row header-row">
                <div class="header-top-left">
                <p>
                    <?php echo esc_html(get_theme_mod('phone_number_text', 'CALL US NOW!')); ?>
                    <a type="tel" href="tel:<?php echo esc_attr(get_theme_mod('phone_number', '+880743259489')); ?>">
                        <?php echo esc_html(get_theme_mod('phone_number', '+880743259489')); ?>
                    </a>
                </p>
                </div>
                <div class="header-top-right">
                    <div class="header-form">
                        <?php wp_loginout(); ?>
                        <a class="ct-signup" href="<?php echo esc_url(wp_registration_url()); ?>"><?php esc_html_e( 'Sign Up', 'ct-custom' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Section end -->

    <!-- Header Section Start -->
    <header>
        <div class="container">
            <div class="row header-row">
            <div class="header-left">
                <div class="logo">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } else {
                        if (is_front_page() && is_home()) :
                    ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php endif;

                        $ct_custom_description = get_bloginfo('description', 'display');
                        if ($ct_custom_description || is_customize_preview()) :
                    ?>
                            <p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif;
                    }
                    ?>
                </div>
            </div>

            <div class="header-right">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    // 'menu_id'        => 'header-right',
                    'menu_class' => 'main-menu',
                    'container' => 'ul',
                    'container_class' => 'main-menu'
                ) );
                ?>
            </div>
            </div>
        </div>
    </header>
    <!-- Header Section end -->
    <div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb-main">
                <?php
                $bc_sperator = get_theme_mod('ct_breadcrum_separator', '/' );
                $home_page_bc = sprintf('Home %s Who we are %s Contact', $bc_sperator, $bc_sperator );
                // Home link
                if(is_front_page()){
                    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __( $home_page_bc ) . '</a></li>';
                }else{
                    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'textdomain') . '</a></li>';
                }

                if (!is_front_page()) {
                    $current_page_id = get_queried_object_id();

                    if (is_page()) {
                        $ancestors = get_post_ancestors($current_page_id);
                        $ancestors = array_reverse($ancestors);
                        foreach ($ancestors as $ancestor) {
                            echo '<li><a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
                            echo '<li>/</li>';
                        }
                    }

                    echo '<li> ' . $bc_sperator .' ' . esc_html(get_the_title($current_page_id)) . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>


