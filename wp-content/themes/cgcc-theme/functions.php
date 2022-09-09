<?php
/**
 * cgcc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cgcc
 */

if ( ! function_exists( 'cgcc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cgcc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cgcc, use a find and replace
		 * to change 'cgcc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cgcc', get_template_directory() . '/languages' );

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

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/*
		 *  This adds Yoast SEO plugin support for breadcrumbs to the WP customizer.
		 *  Note: Same options are under the plugin settings as well.
		 */
		add_theme_support( 'yoast-seo-breadcrumbs' );

		/*
		 * This theme uses 3 nav menus.
		 * Primary - Main navigation menu for desktops and most tablets
		 * Mobile - Menu dedicated  to just mobile/smaller tablets
		 * Quick - Footer links: May need to be expanded depending on site design
		 */
		register_nav_menus( array(
			'primary-menu'          => esc_html__( 'Primary Menu', 'cgcc' ),
			'mobile-menu'           => esc_html__( 'Mobile Menu', 'cgcc'),
			'header-quick-menu'     => esc_html__( 'Header Quick Links', 'cgcc' ),
			'quick-menu'            => esc_html__( 'Quick Links', 'cgcc'),
			'what-we-treat'            => esc_html__( 'What We Treat', 'cgcc'),
			'becoming-a-patient'            => esc_html__( 'Becoming A Patient', 'cgcc'),
			'for-patients'            => esc_html__( 'For Patients', 'cgcc'),
			'about'            => esc_html__( 'About', 'cgcc'),
			'second-opinion'            => esc_html__( 'Second Opinion', 'cgcc')
		) );

		/**
		 * Register Bootstrap 4 Navigation Walker
		 */
		require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	}
endif;
add_action( 'after_setup_theme', 'cgcc_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cgcc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cgcc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cgcc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cgcc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cgcc_scripts() {

	// FontAwesome
	wp_enqueue_script('fontawesome-all-js', get_template_directory_uri() . '/js/fontawesome/all.min.js');
    //wp_enqueue_script('fontawesome-cdn', '//kit.fontawesome.com/0c5f4b5e20.js');

	// Bootstrap
	if ( ! is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery/jquery.min.js', array(), null, true );
		wp_enqueue_script('jquery');
	}
	wp_enqueue_script('popper-js', get_template_directory_uri() . '/js/bootstrap/popper.min.js', array('jquery'), null, true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), null, true );

	// glidejs
	wp_enqueue_script('glide-js', get_template_directory_uri() . '/js/glide/glide.js', array('jquery'), null, false );
	wp_enqueue_style('glide-core-css', get_template_directory_uri() . '/js/glide/css/glide.core.min.css' );
	wp_enqueue_style('glide-theme-css', get_template_directory_uri() . '/js/glide/css/glide.theme.css' );

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap' );
	// Custom Styles
	wp_enqueue_script('cgcc-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
	wp_enqueue_style( 'cgcc-style', get_template_directory_uri() . '/css/style.css' );
	

}
add_action( 'wp_enqueue_scripts', 'cgcc_scripts' );

// FontAwesome config to make all.min.js look for Pseudo Elements
add_action('wp_head', function() { ?>
    <script>FontAwesomeConfig = { searchPseudoElements: true }</script>
<?php }, 5 );
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

/**
 * Load Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/*
 * Breadcrumbs function to check if Yoast is load and if not use your own.
 * Advise using Yoast since this allows them to be admin controlled for greater flexibility
 */
function compulse_breadcrumbs() {

	// TODO: Add custom breadcrumb if Yoast is not installed. Additional option for customizer to allow display or not of breadcrumbs period.
	if ( function_exists('yoast_breadcrumb') ) {

		yoast_breadcrumb( '<nav id="breadcrumbs" class="mb-1" aria-label="breadcrumb">', '</nav>' );

	}

}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/*
 * Allows SVGs to be uploaded to media gallery/admin
 */
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svg'] = 'image/svg';
	return $mimes;
}

/**
 * Custom image sizes
 */
add_image_size('header-img', 2000, 976, array( 'center', 'center') );
add_image_size('hp-profile', 296, 266, array( 'center', 'top' ) );
add_image_size('card-img', 464, 144, array( 'center', 'center' ) );
add_image_size('hp-location-img', 960, 668, array( 'center', 'center' ) );
// ACF Flexible content blocks
add_image_size('content_left_image_right_testimonial', 960, 688, array( 'center', 'center' ) );
add_image_size('location-image', 1300, 375, array( 'center', 'center' ) );
add_image_size('ap-staff', 455, 569, array( 'center', 'center' ) );
add_image_size('lg-img', 970, 625, array( 'center', 'center' ) );
add_image_size('md-img', 574, 362, array( 'center', 'center' ) );
add_image_size('sm-img', 397, 276, array( 'center', 'center' ) );
add_image_size('img-spacer', 170, 170, array( 'center', 'center' ) );

// Adds SEO block to footer navigation
add_filter( 'wp_nav_menu_quick-links_items', 'seo_block_to_footer_nav', 10, 1 );
function seo_block_to_footer_nav($items) {

	$items .= '<li id="menu-item-seo-block" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-seo-block">';
	$items .= '<strong>' . get_bloginfo('name') . '</strong>';
	$items .= '<ul class="sub-menu">';
	$items .= '<li>';
	$items .= get_field( 'seo_locality', 'option' );
	$items .= '</li>';
	$items .= '</ul>';
	$items .= '</li>';

	return $items;
}

add_filter( 'wp_nav_menu_header-quick-links_items', 'locations_header_quick_links', 10, 1 );
function locations_header_quick_links($items) { ?>
	<?php if ( have_rows( 'locations', 'option' ) ) : ?>
		<?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
			<?php
				$locations .= '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-link menu-locations">';
				$locations .= trim( str_replace( 'Office', '', get_sub_field( 'name' ) ) ) .': <a title="" href="tel:' . get_sub_field( 'phone' ) .'" class="">' . get_sub_field( 'phone' ) .'</a>';
				$locations .= '</li>';
			?>
		<?php endwhile; ?>
	<?php endif;
	$locations .= $items;
	$items = $locations;

	return $items;
}

add_filter( 'wp_nav_menu_mobile-menu_items', 'adjustments_to_mobile_menu', 10, 1 );
function adjustments_to_mobile_menu($items) { ?>
	<?php if ( have_rows( 'locations', 'option' ) ) : ?>
		<?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
			<?php
			$items .= '<li id="responsive-menu-item-row-' . get_row_index() . '" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-link" role="none">';
			$items .= trim( str_replace( 'Office', '', get_sub_field( 'name' ) ) ) .': <a title="" href="tel:' . get_sub_field( 'phone' ) .'" class="responsive-menu-item-link" tabindex="1" role="menuitem">' . get_sub_field( 'phone' ) .'</a>';
			$items .= '</li>';
			?>
		<?php endwhile; ?>
	<?php endif;

	$items .= '<li id="mobile-second-opinion-btn" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-link" role="none">';
	$items .= '<a href="' . get_permalink(371) . '#form_moreinfo-clinicaltrialsc50cfb5b89" class="btn btn-secondary">Second Opinion?</a>';
	$items .= '</li>';

	return $items;
}

