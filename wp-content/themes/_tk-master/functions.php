<?php
/**
 * _tk functions and definitions
 *
 * @package _tk
 */
 
 /**
  * Store the theme's directory path and uri in constants
  */
 define('THEME_DIR_PATH', get_template_directory());
 define('THEME_DIR_URI', get_template_directory_uri());

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _tk_setup() {
	global $cap, $content_width;

	// Add html5 behavior for some theme elements
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', THEME_DIR_PATH . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', '_tk' ),
		) );

}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', '_tk_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {

	// Import the necessary TK Bootstrap WP CSS additions
	wp_enqueue_style( '_tk-bootstrap-wp', THEME_DIR_URI . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( '_tk-bootstrap', THEME_DIR_URI . '/includes/resources/bootstrap/css/bootstrap.min.css' );

	// load Font Awesome css
	wp_enqueue_style( '_tk-font-awesome', THEME_DIR_URI . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load _tk styles
	wp_enqueue_style( '_tk-style', get_stylesheet_uri() );

	//flexslider style
	wp_enqueue_style( 'flexslider-styles', get_stylesheet_directory_uri(). '/includes/js/flexslider/flexslider.css' );
	wp_enqueue_script( 'flexslider-scripts', THEME_DIR_URI . '/includes/js/flexslider/jquery.flexslider.js', array('jquery') );
	wp_enqueue_script( 'custom-js', THEME_DIR_URI . '/includes/js/custom.js', array('jquery') );

	// load bootstrap js
	wp_enqueue_script('_tk-bootstrapjs', THEME_DIR_URI . '/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', THEME_DIR_URI . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', THEME_DIR_URI . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', THEME_DIR_URI . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
//	wp_enqueue_script( 'asdasdasdasd', 'http://bootstrapdocs.com/v1.3.0/js/bootstrap-tabs.js', array('jquery') );

}
add_action( 'wp_enqueue_scripts', '_tk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require THEME_DIR_PATH . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THEME_DIR_PATH . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require THEME_DIR_PATH . '/includes/extras.php';

/**
 * Customizer additions.
 */
require THEME_DIR_PATH . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require THEME_DIR_PATH . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require THEME_DIR_PATH . '/includes/bootstrap-wp-navwalker.php';

/**
 * Adds WooCommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Create custom post type
 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'Bouquets',
		array(
			'labels'              => array(
				'name'               => _x( 'Bouquets', '_tk' ),
				'singular_name'      => _x( 'Bouquets', '_tk' ),
				'add_new'            => _x( 'Add new Bouquet', '_tk' ),
				'add_new_item'       => _x( 'Add new item', '_tk' ),
				'edit_item'          => _x( 'Edit Bouquets', '_tk' ),
				'new_item'           => _x( 'New item', '_tk' ),
				'view_item'          => _x( 'View Bouquets', '_tk' ),
				'search_items'       => _x( 'Search', '_tk' ),
				'not_found'          => _x( 'Sorry, not found', '_tk' ),
				'not_found_in_trash' => _x( 'Not found in trash', '_tk' ),
			),
			'description'         => 'Bouquets',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-cart',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'has_archive'         => true,
			'query_var'           => true,
			'capability_type'     => 'post',
			'show_in_nav_menus'   => null,

		)
	);

	register_post_type( 'Testimonials',
		array(
			'labels'              => array(
				'name'               => _x( 'Testimonials', '_tk' ),
				'singular_name'      => _x( 'Testimonials', '_tk' ),
				'add_new'            => _x( 'Add new Testimonial', '_tk' ),
				'add_new_item'       => _x( 'Add new item', '_tk' ),
				'edit_item'          => _x( 'Edit Testimonials', '_tk' ),
				'new_item'           => _x( 'New item', '_tk' ),
				'view_item'          => _x( 'View Testimonials', '_tk' ),
				'search_items'       => _x( 'Search', '_tk' ),
				'not_found'          => _x( 'Sorry, not found', '_tk' ),
				'not_found_in_trash' => _x( 'Not found in trash', '_tk' ),
			),
			'description'         => 'Testimonials',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-megaphone',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'has_archive'         => true,
			'query_var'           => true,
			'capability_type'     => 'post',
			'show_in_nav_menus'   => null,

		)
	);

	register_post_type( 'Happy',
		array(
			'labels'              => array(
				'name'               => _x( 'Happy mom', '_tk' ),
				'singular_name'      => _x( 'Happy mom', '_tk' ),
				'add_new'            => _x( 'Add new Happy mom', '_tk' ),
				'add_new_item'       => _x( 'Add new item', '_tk' ),
				'edit_item'          => _x( 'Edit Happy moms', '_tk' ),
				'new_item'           => _x( 'New item', '_tk' ),
				'view_item'          => _x( 'View Happy moms', '_tk' ),
				'search_items'       => _x( 'Search', '_tk' ),
				'not_found'          => _x( 'Sorry, not found', '_tk' ),
				'not_found_in_trash' => _x( 'Not found in trash', '_tk' ),
			),
			'description'         => 'Happy mom',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-heart',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'has_archive'         => true,
			'query_var'           => true,
			'capability_type'     => 'post',
			'show_in_nav_menus'   => null,

		)
	);


}

add_image_size( 'happy', 300, 400, array( 'center', 'top' ) );
add_image_size( 'sale', 250, 242, array( 'center', 'top' ) );


function admin_ajax() {
	wp_localize_script( 'jquery', 'vars', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'admin_ajax' );




function send_custom_mail() {
	$from_name = 'Букет для мами';
	$from_email = 'allflowers.com.ua@gmail.com';
	$admin_email = 'sandrik85@gmail.com';
	$message = '
                <html>
                    <head>
                        <title>Вопрос с сайта</title>
                    </head>
                    <body>
                    	<p>asdasdasdasd</p>
                    </body>
                </html>';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8; '."\r\n";
	$headers .= 'From: =?utf-8?b?' . base64_encode($from_name) . "?= <$from_email>\r\n";
	wp_mail($admin_email, 'Вопрос с сайта', $message, $headers );
	die();
}
add_action( 'wp_ajax_send_custom_mail', 'send_custom_mail' );
add_action( 'wp_ajax_nopriv_send_custom_mail', 'send_custom_mail' );