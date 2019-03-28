<?php
/**
 * breadery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package breadery
 */

if ( ! function_exists( 'breadery_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function breadery_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on breadery, use a find and replace
		 * to change 'breadery' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'breadery', get_template_directory() . '/languages' );

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
			'primary-menu' => esc_html__( 'Primary', 'breadery' ),
			'footer-menu' => esc_html__( 'Footer', 'breadery' ),
			'social-menu' => esc_html__('Social', 'breadery')
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
		add_theme_support( 'custom-background', apply_filters( 'breadery_custom_background_args', array(
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
add_action( 'after_setup_theme', 'breadery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function breadery_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'breadery_content_width', 640 );
}
add_action( 'after_setup_theme', 'breadery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function breadery_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'breadery' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'breadery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'breadery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function breadery_scripts() {
	wp_enqueue_style('breadery-layout', get_template_directory_uri()."/layout.css");
	wp_enqueue_style( 'breadery-style', get_stylesheet_uri() );
	wp_enqueue_script( 'breadery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// google fonts
	$query_args = array( 'family' => 'Lobster|EB+Garamond|Lato' );
	wp_register_style( 'google-fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css' ));
	wp_enqueue_style( 'google-fonts' );

	// font awesome
	wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.7.2/css/all.css');

	// javascript
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.bundle.min.js',array('jquery'));
	wp_enqueue_script('object-fit', get_template_directory_uri()."/js/ofi.min.js",array(),false, true);
	wp_enqueue_script('navigation-js', get_template_directory_uri()."/js/navigation.js",array('jquery'),null,true);
}
add_action( 'wp_enqueue_scripts', 'breadery_scripts' );

// add font-awesome stylesheet attributes
function font_awesome_attributes($html, $handle) {
	if ($handle == "font-awesome") {
		$html = str_replace("media='all'","media='all' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'",$html);
	}
	return $html;
}
add_filter('style_loader_tag', 'font_awesome_attributes', 10, 2);

// call polyfill for object-fit
/* function call_object_fit() {
	echo "<script>document.onload = objectFitImages();</script>";
}
add_action('wp_footer', 'call_object_fit'); */

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
 * Add bootstrap classes to navs
 */
function breadery_menu_link_class($atts) {
	$atts['class'] = "nav-link";
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'breadery_menu_link_class');
function breadery_menu_list_item_class ($classes) {
	array_push($classes, 'nav-item');
	return $classes;
}
add_filter('nav_menu_css_class', 'breadery_menu_list_item_class');

  /**
 * Use Font Awesome webfont for social links
 */
function breadery_nav_menu_social_icons($item_output, $item, $depth, $args) {
	if ( 'social-menu' === $args->theme_location ) {
		// Change SVG icon inside social links menu.
		$svg = Breadery_FA_Icons::get_social_link_fa( $item->url);
		if ( empty( $svg ) ) {
			$svg = Breadery_FA_Icons::get_icon_fa('ui', 'link' );
		}
		// Add class to color icon on hover
		$svg = str_replace("class='","class='brand-color fg-hover ",$svg);
		$item_output = str_replace( $args->link_after, $args->link_after . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'breadery_nav_menu_social_icons', 10, 4 );

/*--------------------------------------------------------------
# Custom Meta Boxes
--------------------------------------------------------------*/
/*--------------------------------------------------------------
## Post Options
--------------------------------------------------------------*/
add_action( 'load-post.php', 'page_options_setup' );
add_action( 'load-post-new.php', 'page_options_setup' );

function page_options_setup() {
	add_action( 'add_meta_boxes', 'add_page_options_box' );
	add_action( 'save_post', 'save_page_options', 10, 2 );
}

  function add_page_options_box() {
	add_meta_box(
		'page_options',      // Unique ID
		esc_html__( 'Page Options', 'example' ),    // Title
		'page_options_box',   // Callback function
		'page',         // Admin page (or post type)
		'side',         // Context
		'default'         // Priority
	  );
  }

  /* Display the post meta box. */
function page_options_box( $post ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'page_options_nonce' ); ?>
	<input type='checkbox' name='_hide_title' id='_hide_title' value="1" <?= $post->_hide_title == 1 ? 'checked' : ''; ?>>
	<label for="_hide_title"><?php _e( "Hide page title", 'breadery' ); ?></label>

  <?php } 
  
 function save_page_options($post_id, $post) {
	// Verify nonce, user permissions
	if ( !isset( $_POST['page_options_nonce'] ) || !wp_verify_nonce( $_POST['page_options_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	$post_type = get_post_type_object( $post->post_type );
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	
	// Update value
	update_post_meta($post_id, '_hide_title', $_POST['_hide_title']);
 }

 /*--------------------------------------------------------------
 ## Custom CSS
 --------------------------------------------------------------*/
 add_action( 'load-post.php', 'custom_css_setup' );
 add_action( 'load-post-new.php', 'custom_css_setup' );
 
 function custom_css_setup() {
	 add_action( 'add_meta_boxes', 'add_custom_css_box' );
	 add_action( 'save_post', 'save_custom_css', 10, 2 );
 }
 
   function add_custom_css_box() {
	 add_meta_box(
		 'custom_css',      // Unique ID
		 esc_html__( 'Custom CSS', 'example' ),    // Title
		 'custom_css_box',   // Callback function
		 'page',         // Admin page (or post type)
		 'normal',         // Context
		 'default'         // Priority
	   );
   }
 
   /* Display the post meta box. */
 function custom_css_box( $post ) { ?>
 
	<?php wp_nonce_field( basename( __FILE__ ), 'custom_css_nonce' ); ?>
	<label for="_custom_css"><?php _e( "Add custom css for this page", 'breadery' ); ?></label><br>
	<textarea name='_custom_css' id='_custom_css' rows='5' cols='75'><?= $post->_custom_css ?></textarea>
	
 
   <?php } 
   
  function save_custom_css($post_id, $post) {
	 // Verify nonce, user permissions
	 if ( !isset( $_POST['custom_css_nonce'] ) || !wp_verify_nonce( $_POST['custom_css_nonce'], basename( __FILE__ ) ) )
		 return $post_id;
	 $post_type = get_post_type_object( $post->post_type );
	 if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		 return $post_id;
	 
	 // Update value
	 update_post_meta($post_id, '_custom_css', $_POST['_custom_css']);
  }

  function insert_custom_css() {
	$custom_css = get_post_meta(get_the_ID(), '_custom_css', true);
	if ((is_page() || is_single()) && $custom_css)
		echo "<style type='text/css' id='custom-css'>\n".$custom_css."\n</style>";
	return;
  }
  add_action('wp_head', 'insert_custom_css');
 
  require get_template_directory() . '/inc/icons.php';
 ?>