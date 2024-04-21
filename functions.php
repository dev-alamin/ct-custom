<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */
if ( ! defined( 'CT_CUSTOM_VERSION' ) ) {
	define( 'CT_CUSTOM_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {

    wp_enqueue_style( 'ct-custom-all', CT_ASSET_DIR . '/css/all.css', array(), CT_CUSTOM_VERSION );
    wp_enqueue_style( 'ct-custom-slicknav', CT_ASSET_DIR . '/css/slicknav.min.css', array(), CT_CUSTOM_VERSION );
    wp_enqueue_style( 'ct-custom-style', CT_ASSET_DIR . '/css/style.css', array(), CT_CUSTOM_VERSION );
    wp_enqueue_style( 'ct-custom-responsive', CT_ASSET_DIR . '/css/responvie.css', array(), CT_CUSTOM_VERSION );
    wp_enqueue_style( 'ct-stylesheet', get_stylesheet_uri(), [], CT_CUSTOM_VERSION );

    wp_enqueue_script( 'ct-jquery', CT_ASSET_DIR . '/js/jquery-3.6.0.min.js', [], null, true );
    wp_enqueue_script( 'ct-slicknav', CT_ASSET_DIR . '/js/jquery.slicknav.min.js', [ 'jquery' ], CT_CUSTOM_VERSION, true );
    wp_enqueue_script( 'ct-main-js', CT_ASSET_DIR . '/js/main.js', [ 'jquery', 'ct-slicknav' ], CT_CUSTOM_VERSION, true );
	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function ct_custom_define_constants() {
    define( 'CT_ASSET_DIR', get_template_directory_uri() . '/assets' );
    define( 'CT_IMAGE_DIR', get_template_directory_uri() . '/assets/image' );
}
add_action( 'after_setup_theme', 'ct_custom_define_constants' );

function custom_register_form() {
    ?>
    <p>
        <label for="first_name"><?php _e('First Name', 'textdomain'); ?><br />
            <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(isset($_POST['first_name']) ? $_POST['first_name'] : ''); ?>" size="25" />
        </label>
    </p>
    <p>
        <label for="last_name"><?php _e('Last Name', 'textdomain'); ?><br />
            <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(isset($_POST['last_name']) ? $_POST['last_name'] : ''); ?>" size="25" />
        </label>
    </p>
    <p>
        <label for="user_pass"><?php _e('Password', 'textdomain'); ?><br />
            <input type="password" name="user_pass" id="user_pass" class="input" value="" size="25" />
        </label>
    </p>
    <?php
}
add_action('register_form', 'custom_register_form');

// Validate registration form fields
function custom_register_validation($errors, $sanitized_user_login, $user_email) {
    if (empty($_POST['first_name'])) {
        $errors->add('first_name_error', __('Please enter your first name.', 'textdomain'));
    }

    if (empty($_POST['last_name'])) {
        $errors->add('last_name_error', __('Please enter your last name.', 'textdomain'));
    }

    if (empty($_POST['user_pass'])) {
        $errors->add('user_pass_error', __('Please enter your password.', 'textdomain'));
    }

    return $errors;
}
add_filter('registration_errors', 'custom_register_validation', 10, 3);

// Save additional fields when user registers
function custom_register_save($user_id) {
    if (!empty($_POST['first_name'])) {
        update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
    }

    if (!empty($_POST['last_name'])) {
        update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
    }
}
add_action('user_register', 'custom_register_save');


// Replace WordPress login logo with frontend logo
function custom_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo CT_IMAGE_DIR . '/logo.png' ?>);
            background-size: contain;
            width: 150px;
            height: 100px; /* Adjust the height as needed */
        }
    </style>
    <?php
}
add_action('login_head', 'custom_login_logo');

/**
 * Add a custom submenu item to the "Appearance" menu.
 */
function custom_admin_submenu() {
    add_submenu_page(
        'themes.php', // Parent slug (Appearance menu)
        'Customizer', // Page title
        'CT Theme Option', // Menu title
        'edit_theme_options', // Capability required to access
        'customize.php' // Menu slug to match the URL of the Customizer page
    );
}
add_action( 'admin_menu', 'custom_admin_submenu' );
