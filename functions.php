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
	wp_enqueue_style( 'cr_style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'cr_scripts' );
