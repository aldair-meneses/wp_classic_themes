<?php

if ( version_compare( $GLOBALS['wp_version'], '5.9', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'podia_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 **
	 * @return void
	 */
	function podia_theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html( 'Menu principal' ),
				'footer'  => esc_html( 'Menu secundário' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
				'menus'	
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		// add_theme_support( 'editor-styles' );
		// $background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		// if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
		// 	add_theme_support( 'dark-editor-style' );
		// }

		// $editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		// global $is_IE;
		// if ( $is_IE ) {
		// 	$editor_stylesheet_path = './assets/css/ie-editor.css';
		// }

		// Enqueue editor styles.
		// add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		// add_theme_support(
		// 	'editor-font-sizes',
		// 	array(
		// 		array(
		// 			'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 16,
		// 			'slug'      => 'extra-small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Small', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 18,
		// 			'slug'      => 'small',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 20,
		// 			'slug'      => 'normal',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Large', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 24,
		// 			'slug'      => 'large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 40,
		// 			'slug'      => 'extra-large',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 96,
		// 			'slug'      => 'huge',
		// 		),
		// 		array(
		// 			'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
		// 			'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
		// 			'size'      => 144,
		// 			'slug'      => 'gigantic',
		// 		),
		// 	)
		// );

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		// add_theme_support(
		// 	'editor-color-palette',
		// 	array(
		// 		array(
		// 			'name'  => esc_html__( 'Black', 'twentytwentyone' ),
		// 			'slug'  => 'black',
		// 			'color' => $black,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
		// 			'slug'  => 'dark-gray',
		// 			'color' => $dark_gray,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
		// 			'slug'  => 'gray',
		// 			'color' => $gray,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Green', 'twentytwentyone' ),
		// 			'slug'  => 'green',
		// 			'color' => $green,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
		// 			'slug'  => 'blue',
		// 			'color' => $blue,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
		// 			'slug'  => 'purple',
		// 			'color' => $purple,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Red', 'twentytwentyone' ),
		// 			'slug'  => 'red',
		// 			'color' => $red,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
		// 			'slug'  => 'orange',
		// 			'color' => $orange,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
		// 			'slug'  => 'yellow',
		// 			'color' => $yellow,
		// 		),
		// 		array(
		// 			'name'  => esc_html__( 'White', 'twentytwentyone' ),
		// 			'slug'  => 'white',
		// 			'color' => $white,
		// 		),
		// 	)
		// );

		// add_theme_support(
		// 	'editor-gradient-presets',
		// 	array(
		// 		array(
		// 			'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
		// 			'slug'     => 'purple-to-yellow',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
		// 			'slug'     => 'yellow-to-purple',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
		// 			'slug'     => 'green-to-yellow',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
		// 			'slug'     => 'yellow-to-green',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
		// 			'slug'     => 'red-to-yellow',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
		// 			'slug'     => 'yellow-to-red',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
		// 			'slug'     => 'purple-to-red',
		// 		),
		// 		array(
		// 			'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
		// 			'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
		// 			'slug'     => 'red-to-purple',
		// 		),
		// 	)
		// );

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		// if ( is_customize_preview() ) {
		// 	require get_template_directory() . '/inc/starter-content.php';
		// 	add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		// }

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}
add_action( 'after_setup_theme', 'podia_theme_setup' );


function podia_theme_scripts() {
	wp_enqueue_style('podia-theme-style', 
	get_template_directory_uri() . '/style.css', 
	array(), 
	wp_get_theme()->get( 'Version' ),
 	);

	wp_enqueue_script('podia-theme-scripts', 
	get_template_directory_uri() . '/assets/js/lottie-scripts.js',
	array(),
	 '1.0');
}

add_action( 'wp_enqueue_scripts', 'podia_theme_scripts' );

if( ! function_exists( 'podia_theme_excerpt_more' ) ) {

function podia_theme_excerpt_more() {
		$class = "reading-more";
		$text_template = ' <a href="' . get_permalink() . '" class="' . $class . '">Leia Mais</a>'; 
		return "... $text_template ";
	}
}

add_filter( 'excerpt_more', 'podia_theme_excerpt_more' );

function podia_theme_hide_admin_bar() {

	if ( is_user_logged_in() && current_user_can( 'subscriber' ) ) {
		show_admin_bar( false );

		if( is_admin() ){
			wp_redirect( home_url() );
			return;
		}
	}

}

add_action('after_setup_theme', 'podia_theme_hide_admin_bar');

function podia_theme_redirect_sub_to_home( $redirect_to, $request, $user ) {
	if( is_wp_error($user) ) {
		wp_redirect( esc_url( home_url('/login') ) );
	}
	
	if (isset($user->roles) && is_array($user->roles) && in_array('subscriber', $user->roles)) {
        return home_url();
    }
	
	return $redirect_to;
}

add_filter( 'login_redirect', 'podia_theme_redirect_sub_to_home',10,3 );

function podia_theme_redirect_logout( $logout_url, $redirect ) {
	$redirect = esc_url( home_url('/login') );

	return $logout_url;
}

add_filter( 'logout_url', 'podia_theme_redirect_logout', 10, 2 );

function podia_theme_login_url( $login_url, $redirect, $force_reauth ) {
	$login_url = esc_url( '/login' );

	return $login_url;
}

add_filter( 'login_url', 'podia_theme_login_url', 10, 3 );

function podia_theme_create_login_page() {
	$login_page = get_page_by_path('/login');
	$login_page_id = $login_page->ID;
	$is_login_page_published = $login_page->post_status === 'publish';

	$login_page_data = array(
		'post_title' => 'Login',
		'post_name' => 'login',
		'post_content' => '',
		'post_status' => 'publish',
		'post_type' => 'page'
	);

	$update_login_page_data = array_merge( $login_page_data, array('ID' => $login_page_id) );

	if (! $login_page) {
		wp_insert_post($login_page_data);
		return;
	}
	
	if(! $is_login_page_published ) {
		wp_update_post($update_login_page_data);
		return;
	}
	
	return;
}

add_action('after_setup_theme', 'podia_theme_create_login_page');

function podia_theme_redirect_logged_in_users() {
	if (is_user_logged_in() && is_page('login')) {
		wp_redirect( home_url() );
		exit;
	}
}

add_action('template_redirect', 'podia_theme_redirect_logged_in_users');

function podia_theme_setup_premium_category() {
	$catergory_name = 'Conteúdo Pago';
	$category_slug = 'premium-content';
	
	$catery_exists = term_exists($category_slug, 'category');
	if(! $catery_exists ) {
		wp_insert_term(
			$catergory_name,
			'category',
			array(
				'slug' =>  $category_slug
			)
		);
	}
}

add_action('after_setup_theme', 'podia_theme_setup_premium_category');


function podia_theme_customize_register( $wp_customize) {
	$wp_customize->add_section( 'banner_section', array(
		'title' => 'Banner do site'
	) );

	$wp_customize->add_setting( 'custom_text_setting', array(
        'default' => 'Texto de Apresentação',
    ) );

	$wp_customize->add_control( 'custom_text_control', array(
        'label' => 'Texto de apresentação',
        'section' => 'banner_section',
        'settings' => 'custom_text_setting',
        'type' => 'text',
    ) );


    $wp_customize->add_setting( 'custom_banner_setting', array(
        'default' => get_template_directory_uri() . '/assets/img/home.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_image_control', array(
        'label' => 'Banner',
        'section' => 'banner_section',
        'settings' => 'custom_banner_setting',
    ) ) );

}

add_action ( 'customize_register', 'podia_theme_customize_register' );