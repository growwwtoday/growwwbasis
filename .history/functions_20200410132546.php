<?php

// blueprint functions and definitions

if ( ! function_exists( 'blueprint_setup' ) ) :
	function blueprint_setup() {
		load_theme_textdomain( 'blueprint', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );


		register_nav_menus( array(
			'hoofdmenu' => esc_html__( 'Hoofdmenu', 'blueprint' ),
			'footermenu' => esc_html__( 'Footer menu', 'blueprint' ),
		) );

		
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'blueprint_setup' );

function blueprint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blueprint_content_width', 640 );
}
add_action( 'after_setup_theme', 'blueprint_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blueprint_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blueprint' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blueprint' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blueprint_widgets_init' );


function blueprint_scripts() {
	wp_deregister_script('jquery');
	wp_enqueue_style( 'blueprint-style', get_template_directory_uri() .  '/library/dist/css/style.css' );
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), null, false);
	wp_enqueue_script( 'blueprint-script', get_template_directory_uri() . '/library/dist/js/min/main.min.js', array(), '', true );
	wp_enqueue_script( 'dotdot',  'https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/4.0.9/dotdotdot.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'blueprint_scripts' );

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/library/dist/css/themes/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function blueprint_remove_metabox() {
    if ( ! current_user_can( 'edit_others_posts' ) )
        remove_meta_box( 'wpseo_meta', 'post', 'normal' );
}
add_action( 'add_meta_boxes', 'blueprint_remove_metabox', 11 );

function boilerplate_hoofdmenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'hoofdmenu',
		'menu_class' => 'hoofdmenu',
		'theme_location' => 'hoofdmenu',
		'depth' => 3
	));
}

function boilerplate_footermenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'footermenu',
		'menu_class' => 'footermenu',
		'theme_location' => 'footermenu',
		'depth' => 3
	));
}