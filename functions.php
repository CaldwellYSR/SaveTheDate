<?php

function cr_setup() {
	load_theme_textdomain( 'save_the_date', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'save_the_date' ),
		'social'  => __( 'Social Links Menu', 'save_the_date' ),
	) );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}
add_action( 'after_setup_theme', 'cr_setup' );

function cr_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'cr_javascript_detection', 0 );

function cr_scripts() {
    wp_register_script('easing', get_template_directory_uri().'/js/jquery-easing-min.js', array('jquery'));
    wp_register_script('ayaslider', get_template_directory_uri().'/js/ayaSlider-minified.js', array('jquery', 'easing'));
    wp_enqueue_script('home', get_template_directory_uri().'/js/home.js', array('ayaslider'), false, true);
    wp_enqueue_style( 'base_font', 'https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps' );
    wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Rouge+Script' );
	wp_enqueue_style( 'cr_style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'cr_scripts' );

add_action( 'init', 'amerson_initialize_post_types' );
function amerson_initialize_post_types() {
  
  // Banners
    $registry_args = array(
        'labels'              => array(
            'name'          => 'Registry Items',
            'singular_name' => 'Registry Item',
        ),
        'description'         => 'Each of these represents an item on your registry with links to where to buy it',
        'public'              => true,
        'exclude_from_search' => false,
        'menu_icon'           => 'dashicons-products',
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'supports'            => array( 'title','editor','thumbnail')
    );
    $args = array(
        'labels'              => array(
            'name'          => 'Slides',
            'singular_name' => 'Slide',
        ),
        'description'         => 'Each post becomes a slide on the front page slideshow',
        'public'              => true,
        'exclude_from_search' => true,
        'menu_icon'           => 'dashicons-images-alt',
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'supports'            => array( 'title','thumbnail')
    );
	$price_range_labels = array(
		'name'                        => __( 'Price Range' ),
		'singular_name'               => __( 'Price' ),  
		'search_items'                => __( 'Search Price Ranges' ),
		'popular_items'               => __( 'Popular Price Ranges' ),
		'all_items'                   => __( 'All Price Ranges' ),
		'parent_item'                 => null,
		'parent_item_colon'           => null,
		'edit_item'                   => __( 'Edit Ranges' ),
		'update_item'                 => __( 'Update Ranges' ),
		'add_new_item'                => __( 'New Price Range' ),
		'new_item_name'               => __( 'New Price Range Name' ),
		'separate_items_with_commas'  => __( 'Comma Delimited' ),
		'add_or_remove_items'         => __( 'Add or remove ranges' ),
		'choose_from_most_used'       => __( 'Chose from most used ranges' ),
		'not_found'                   => __( 'No price ranges found' ),
		'menu_name'                   => __( 'Price Ranges' )
	);
	$price_range_args = array(
		'hierarchical'          => false,
		'labels'                => $price_range_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'price-range' )
	);
    register_post_type( 'slide', $args );
    register_post_type( 'gift', $registry_args );
	register_taxonomy( 'price-range', 'gift', $price_range_args );

}
