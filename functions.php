<?php
/**
 * Theme functions
 *
 * @package star_travel_guide
 *
 */

/**
 * Custom post types
 */
require get_template_directory() . '/inc/planets-cpt.php';

/**
 * Multiple thumbnails library
 */
require get_template_directory() . '/lib/multi-post-thumbnails.php';


if ( !function_exists( 'star_travel_guide_setup' ) ):
	function star_travel_guide_setup() {
		load_theme_textdomain( 'star_travel_guide', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        
        add_theme_support( 'post-thumbnails' );

        if (class_exists('MultiPostThumbnails')) {
            new MultiPostThumbnails(array(
                'label' => '2nd Feature Image',
                'id' => 'feature-image-2',
                'post_type' => 'planet'
                )
            );
        };

		add_theme_support( 'custom-header' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		register_nav_menus(array(
			'main-menu' => esc_html__( 'Primary', 'star_travel_guide' ),
		));
		add_theme_support( 'custom-background', apply_filters( 'star_travel_guide_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
		add_theme_support( 'custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
		add_editor_style( get_stylesheet_uri() );
	}
endif;
add_action( 'after_setup_theme', 'star_travel_guide_setup' );

/**
 * Theme content width
 */
function star_travel_guide_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'star_travel_guide_content_width', 640 );
}
add_action( 'after_setup_theme', 'star_travel_guide_content_width', 0 );

/**
 * Register widget area.
 *
 */
function star_travel_guide_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'star_travel_guide' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'star_travel_guide' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'star_travel_guide_widgets_init' );

/**
 * Scripts and styles
 *
 */
function star_travel_guide_load_scripts() {
    wp_enqueue_style( 'star-travel-guide-style', get_stylesheet_uri() );

    wp_enqueue_script( 'star-travel-guide-custom-thumbnail', get_template_directory_uri() . '/lib/js/multi-post-thumbnails-admin.js', array('jquery'));
    wp_enqueue_script( 'star-travel-guide-thumb-modal', get_template_directory_uri() . '/lib/js/media-modal.js', array('jquery'));

    wp_enqueue_script( 'star-travel-guide-aframe', get_template_directory_uri() . '/assets/js/aframe.min.js' );
    wp_enqueue_script( 'star-travel-guide-aframe-component', get_template_directory_uri() . '/assets/js/aframe-environment-component.min.js' );
    wp_enqueue_script( 'star-system', get_template_directory_uri() . '/assets/js/star-system.js' );
}
add_action( 'wp_enqueue_scripts', 'star_travel_guide_load_scripts' );
