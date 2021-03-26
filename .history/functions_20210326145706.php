<?php

if ( ! function_exists( 'blue_setup' ) ) :
	function blue_setup() {
		load_theme_textdomain( 'blue', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array(
			'hoofdmenu' => esc_html__( 'Hoofdmenu', 'blue' ),
			'footermenu' => esc_html__( 'Footer menu', 'blue' ),
			'privacymenu' => esc_html__( 'Privacy menu', 'blue' ),
		) );
		
	}
endif;
add_action( 'after_setup_theme', 'blue_setup' );

function blue_hoofdmenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'hoofdmenu',
		'menu_class' => 'nav-bar__menu',
		'theme_location' => 'hoofdmenu',
		'depth' => 2
	));
}

function blue_footermenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'footermenu',
		'menu_class' => 'footermenu',
		'theme_location' => 'footermenu',
		'depth' => 1
	));
}

function blue_privacymenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'privacymenu',
		'menu_class' => 'privacymenu',
		'theme_location' => 'privacymenu',
		'depth' => 1
	));
}

function blue_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blue_content_width', 640 );
}
add_action( 'after_setup_theme', 'blue_content_width', 0 );

function blue_scripts() {
	wp_deregister_script('jquery');
	
	wp_enqueue_style( 'blue-css', get_template_directory_uri() .  '/dist/css/app.css' );
	wp_enqueue_script( 'blue-manifest', get_template_directory_uri() . '/dist/js/manifest.js', array(), '', true );
	wp_enqueue_script( 'blue-vendor', get_template_directory_uri() . '/dist/js/vendor.js', array(), '', true );
	wp_enqueue_script( 'blue-app', get_template_directory_uri() . '/dist/js/app.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'blue_scripts' );

function blue_remove_metabox() {
    if ( ! current_user_can( 'edit_others_posts' ) )
        remove_meta_box( 'wpseo_meta', 'post', 'normal' );
}
add_action( 'add_meta_boxes', 'blue_remove_metabox', 11 );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Globale opties',
		'menu_title'	=> 'Globale opties',
		'menu_slug' 	=> 'globale-opties',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-admin-settings',
		'redirect'		=> false
	));
}

include( plugin_dir_path( __FILE__ ) . 'growww-plugin/forms.php');