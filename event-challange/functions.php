<?php
define( 'MM_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'mm_wp_enqueue_scripts' );
function mm_wp_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue jQuery
	wp_enqueue_script( 'jquery' );

	# Enqueue Custom JS files
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
    crb_enqueue_script( 'theme-google-map-apis', '//maps.googleapis.com/maps/api/js?key=' . mm_get_google_maps_api_key() . '&libraries=places', array(), true );
    crb_enqueue_script( 'theme-tether', $template_dir . '/assets/bootstrap/js/tether.min.js', array( 'jquery' ) );
    crb_enqueue_script( 'theme-bootstrap', $template_dir . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	crb_enqueue_script( 'theme-functions', $template_dir . '/assets/js/functions.js', array( 'jquery' ) );

	# Enqueue Custom CSS files
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
    crb_enqueue_style( 'theme-bootstrap', $template_dir . '/assets/bootstrap/css/bootstrap.min.css' );
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'mm_admin_enqueue_scripts' );
function mm_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'mm_attach_post_types_and_taxonomies', 0 );
function mm_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once( MM_THEME_DIR . 'options/post-types.php' );
}

add_action( 'after_setup_theme', 'mm_setup_theme' );

# To override theme setup process in a child theme, add your own mm_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'mm_setup_theme' ) ) {
	function mm_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'mm', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = MM_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'mm' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( MM_THEME_DIR . 'includes/title.php' );
		include_once( MM_THEME_DIR . 'includes/login.php' );

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		/*add_image_size( $name, $width = 0, $height = 0, $crop = false ) */

		register_nav_menus( array(
            'header-menu' => __( 'Header Menu', 'mm' ),
            'footer-right-menu' => __( 'Footer Right Menu', 'mm' ),
			'footer-left-menu' => __( 'Footer Left Menu', 'mm' ),
		) );

		# Attach custom widgets

		# Attach custom shortcodes

        include_once( MM_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'mm_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'mm_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'mm_excerpt_more' );
		add_filter( 'excerpt_length', 'mm_excerpt_length', 999 );
        add_filter( 'carbon_fields_map_field_api_key', 'mm_get_google_maps_api_key' );
	}
}

# Register Sidebars
function mm_widgets_init() {
	$sidebar_options = array_merge( mm_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'mm' ),
		'id'   => 'default-sidebar',
	) );

	#register_sidebar( $sidebar_options );
}

# Sidebar Options
function mm_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function mm_attach_theme_options() {
	# Attach fields
	include_once( MM_THEME_DIR . 'options/theme-options.php' );
	include_once( MM_THEME_DIR . 'options/custom-fields.php' );
}

function mm_excerpt_more() {
	return '...';
}

function mm_excerpt_length() {
	return 55;
}

add_action( 'admin_menu', 'mm_remove_dashboard_menu_items' );
function mm_remove_dashboard_menu_items() {
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'edit.php' );                  //Posts
    remove_menu_page( 'tools.php' );                  //Tools

    if ( !mm_check_if_user_is_admin() ) {
        remove_menu_page( 'options-general.php' );        //Settings
        remove_menu_page( 'plugins.php' );              //Plugins
        remove_menu_page( 'users.php' );                  //Users
    }
};

function mm_check_if_user_is_admin() {
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $caps = $user->caps;

        if ( !empty( $caps ) ) {
            if ( isset( $caps[ 'administrator' ] ) && $caps[ 'administrator' ] == 1 ) {
                return true;
            }
        }
    } else {
      return false;
    }
}

function mm_get_google_maps_api_key() {
    return carbon_get_theme_option( 'mm_google_maps_api_key' );
}

function mm_socials_array(){
    $socials = array(
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'email' => 'Email',
    );

    return $socials;
}

add_action('pre_get_posts', 'mm_pre_get_posts');
function mm_pre_get_posts( $query ) {
    if ( is_admin() ) {
        return $query;
    }

    $today = date( 'Y-m-d' );
    $meta_query[] = array(
        'key' => '_mm_event_date',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE'
    );

    if ( isset( $query->query_vars[ 'post_type' ] ) && $query->query_vars[ 'post_type' ] == 'mm_event' ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', '_mm_event_date' );
        $query->set( 'order', 'asc' );
        $query->set( 'meta_query', $meta_query );
    }

    return $query;
}
