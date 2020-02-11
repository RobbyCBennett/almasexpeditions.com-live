<?php
/**
* tcftheme functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package tcftheme
*/

add_image_size( 'tour-thumb', 370, 250, true );
add_image_size( 'recent-post-thumb', 350, 230, true );
add_image_size( 'profile-thumb', 270, 310, true );
remove_image_size('1536x1536');
remove_image_size('2048x2048');

if ( ! function_exists( 'tcftheme_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function tcftheme_setup() {

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tcftheme, use a find and replace
		* to change 'tcftheme' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'tcftheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'tcftheme' ),
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
		add_theme_support( 'custom-background', apply_filters( 'tcftheme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'tcftheme_setup' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function tcftheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tcftheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'tcftheme_content_width', 0 );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function tcftheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tcftheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tcftheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tcftheme_widgets_init' );

/**
* Enqueue scripts and styles.
*/
function tcftheme_scripts() {

	wp_deregister_script('jquery');

	// wp_enqueue_style( 'tcftheme-style', get_stylesheet_uri() );

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fonts/css/all.css' );
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', []);
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', []);

	wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/css/nice-select.css');

	// wp_enqueue_style('core', get_template_directory_uri() . '/assets/css/core.css');

	wp_enqueue_style('shortcode-default', get_template_directory_uri() . '/assets/css/shortcode/default.css');
	wp_enqueue_style('shortcode-header', get_template_directory_uri() . '/assets/css/shortcode/header.css');
	wp_enqueue_style('shortcode-footer', get_template_directory_uri() . '/assets/css/shortcode/footer.css');
	wp_enqueue_style('shortcode-slider', get_template_directory_uri() . '/assets/css/shortcode/slider.css');

	wp_enqueue_style('color', get_template_directory_uri() . '/assets/css/plugins/color.css');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/plugins/slick.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/plugins/slick-theme.css');

	wp_enqueue_style( 'date-picker', get_template_directory_uri() . '/assets/lib/date-picker/datepicker.css', []);

	wp_enqueue_style('blog', get_template_directory_uri() . '/assets/blog.css');
	wp_enqueue_style('sidebar', get_template_directory_uri() . '/assets/css/sidebar.css');
	
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/style.css');
	wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css');
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.3.1.min.js', []);
	wp_enqueue_script( 'jquery-patch', get_template_directory_uri() . '/assets/js/jquery-patch.js', ['jquery']);

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3.min.js', [''], false);

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], false, true);
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js', [], false, true);

	wp_enqueue_script( 'date-picker', get_template_directory_uri() . '/assets/lib/date-picker/datepicker.js', ['jquery'], true);
	// wp_enqueue_script( 'jssor-slider', get_template_directory_uri() . '/assets/js/jssor.slider-28.0.0.min.js', ['jquery'], true);
	// wp_enqueue_script( 'mailchimp', get_template_directory_uri() . '/assets/js/jquery.ajaxchimp.min.js', ['jquery'], false, true);
	// wp_enqueue_script( 'ajax-mail', get_template_directory_uri() . '/assets/js/ajax-mail.js', ['jquery'], false, true);
	// wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', ['jquery'], false, true);
	// wp_enqueue_script( 'video-player', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.js', ['jquery'], false, true);
	wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', [], false, true);
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', ['jquery'], false, true);

	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', ['jquery'], false, true);

	
	// wp_enqueue_script( 'tcftheme-navigation', get_template_directory_uri() . '/js/navigation.js', ['jquery'], false, true );
	// wp_enqueue_script( 'tcftheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', ['jquery'], false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], false, true);

	/*

	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/owl.carousel.min.js"></script>

	<!-- nivo slider js
	========================================================= -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/lib/nivo-slider/js/jquery.nivo.slider.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/lib/nivo-slider/home.js"></script>

	*/
}
add_action( 'wp_enqueue_scripts', 'tcftheme_scripts' );

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

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

function new_excerpt_more($more) {
	global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



function myTruncate($string, $limit, $break=".", $pad="...")
{
	// return with no change if string is shorter than $limit
	if(strlen($string) <= $limit) return $string;

	// is $break present between $limit and the end of the string?
	if(false !== ($breakpoint = strpos($string, $break, $limit))) {
		if($breakpoint < strlen($string) - 1) {
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	}

	return $string;
}





function load_popular_tours_field_choices( $field ) {
	// Get the names of all tours
	$choices = array();
	$args = array(
		'post_type'			=> 'tour',
		'posts_per_page'	=> -1
	);
	$loop = new WP_Query( $args );
	if ($loop->have_posts()) {
		while ($loop->have_posts()) {
			$loop->the_post();
			array_push($choices, get_the_title());
		}
	}

	// Load the names of the tours into the select field
	$field['sub_fields'][0]['choices'] = $choices;
    return $field;
}
add_filter('acf/load_field/name=popular_tours', 'load_popular_tours_field_choices');


function load_include($file, $args = []){
    $filename = 'template-parts/' . $file . '.php';
    extract($args);
    global $post;   
    
    return include(  locate_template( $filename ) ); 
}
