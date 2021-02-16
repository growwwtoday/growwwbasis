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
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/library/fontawesome/css/all.min.css' );
	wp_enqueue_script( 'Slick',  'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '', true );

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



// Gravity forms Bootstrap
add_action('wp', function (){
	add_filter( 'gform_field_container', 'moddit_change_gform_class_to_bootstrap', 10, 6 );
	add_filter( 'gform_get_form_filter', 'moddit_change_ul_to_div', 10, 2 );
	add_filter( 'gform_field_content', 'moddit_change_field_content', 10, 5 );
	add_filter( 'gform_submit_button', 'moddit_change_submit_button', 10, 2 );
	add_filter( 'gform_previous_button', 'moddit_change_prev_btn', 10, 2 );
	add_filter( 'gform_next_button', 'moddit_change_next_btn', 10, 2 );
});
function moddit_change_gform_class_to_bootstrap( $field_container, $field, $form, $css_class, $style, $field_content ) {
	// echo "<pre>", print_r($field,1), "</pre>";
	$class = 'col-lg-12 form-group';
	if($field->type != 'checkbox' && $field->type != 'radio') {
		switch($field->size) {
			case "small":
				$class = 'col-lg-4 form-group';
				break;
			case "medium":
				$class = 'col-lg-6 form-group';
				break;
			case "large":
				$class = 'col-lg-12 form-group';
				break;
		}
	}
	return "<div id='field_".$field->formId."_".$field->id."' class='$class $css_class'>{FIELD_CONTENT}</div>";
}
function moddit_change_ul_to_div( $form_string, $form ) {
	$str = str_replace('<ul', '<div', $form_string);
	$str = str_replace('</ul', '</div', $str);
	$str = str_replace('gform_fields', 'row gform_fields', $str);
	$str = str_replace('gfield_label', 'd-block gfield_label', $str);
	$str = str_replace('gfield_description validation_message', 'gfield_description validation_message text-danger font-weight-bold', $str);
	return $str;
}
function moddit_change_field_content( $content, $field, $value, $lead_id, $form_id ) {
	if($field->type == 'text' || $field->type == 'number' || $field->type == 'phone' || $field->type == 'email') {
		$content = str_replace('<input', '<input class="form-control"', $content);
	}
	if($field->type == 'textarea') {
		$content = str_replace('<textarea', '<textarea class="form-control"', $content);
	}
	if($field->type == 'select' || $field->type == 'multiselect') {
		$content = str_replace('<select', '<select class="form-control"', $content);
	}
	if($field->type == 'checkbox') {
		$content = str_replace('gchoice_', 'custom-control custom-checkbox gchoice_', $content);
		$content = str_replace('<input', '<input class="custom-control-input"', $content);
		$content = str_replace('<label for', '<label class="custom-control-label" for', $content);
	}
	if($field->type == 'radio') {
		$content = str_replace('gchoice_', 'custom-control custom-radio gchoice_', $content);
		$content = str_replace('<input', '<input class="custom-control-input"', $content);
		$content = str_replace('<label for', '<label class="custom-control-label" for', $content);
	}
	$content = str_replace('gfield_required', 'gfield_required text-danger', $content);
	// echo '<pre class="bg-light p-4 mb-4">', print_r($content,1), '</pre>';
	// echo '<pre class="bg-light p-4 mb-4">', print_r($field,1), '</pre>';
    return $content;
}
function moddit_change_submit_button( $button, $form ) {
    return "<button class='button gform_button btn btn-primary' id='gform_submit_button_{$form['id']}'><span>Versturen</span></button>";
}
function moddit_change_prev_btn( $button, $form ) {
	return "<button class='button gform_previous_button btn btn-light-blue' id='gform_previous_button_{$form['id']}'><i class='far fa-long-arrow-left'></i><span>Vorige</span></button>";
}
function moddit_change_next_btn( $button, $form ) {
	return "<button class='button gform_next_button btn btn-primary' id='gform_next_button_{$form['id']}'><i class='far fa-long-arrow-right'></i><span>Volgende</span></button>";
}
