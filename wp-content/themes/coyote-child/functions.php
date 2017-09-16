<?php

/*** Child Theme Function  ***/

function coyote_edge_child_theme_enqueue_scripts() {
	$parent_style = 'coyote_edge_default_style';

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

	wp_enqueue_style('coyote_edge_child_style',
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style),
		wp_get_theme()->get('Version')
	);
}

add_action( 'wp_enqueue_scripts', 'coyote_edge_child_theme_enqueue_scripts' );