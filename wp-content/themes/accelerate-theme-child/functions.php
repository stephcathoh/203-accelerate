<?php
/**
* Accelerate Marketing Child functions and definitions
*
* @link http://codex.wordpress.org/Theme_Development
* @link http://codex.wordpress.org/Child_Themes
*
* @package WordPress
* @subpackage Accelerate Marketing
* @since Accelerate Marketing 2.0
*/

// Enqueue scripts and styles
function accelerate_child_scripts(){
	wp_enqueue_style( 'accelerate-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'accelerate-style' ));
}
add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );

// Add Font Awesome in WordPress Theme
add_action ('wp_enqueue_scripts', 'font_awesome_script');
function font_awesome_script(){
    wp_enqueue_script('fontawesome-script', 'https://kit.fontawesome.com/5941224b06.js', array(), NULL, true);
};

function theme_setup (){
//Add support for featured images
add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','theme_setup');

function create_custom_post_types() {
    register_post_type( 'case_studies',
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'case-studies' ),
        )
    );
    register_post_type('services',
    array (
        'labels' => array (
            'name' => __('Services'),
            'singular_name' => __('Service' )           
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array( 'slug' => 'services'),
        'supports' =>array ('title', 'thumbnail', 'editor','page attributes'),
    )
    
    );


}
add_action( 'init', 'create_custom_post_types' );