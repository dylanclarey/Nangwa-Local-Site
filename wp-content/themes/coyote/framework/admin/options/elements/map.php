<?php

if ( ! function_exists('coyote_edge_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function coyote_edge_load_elements_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'coyote'),
				'icon' => 'fa fa-flag-o'
			)
		);

		do_action( 'coyote_edge_options_elements_map' );

	}

	add_action('coyote_edge_options_map', 'coyote_edge_load_elements_map', 11);

}