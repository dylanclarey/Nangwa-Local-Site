<?php

if ( ! function_exists('coyote_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function coyote_edge_reset_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'coyote'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = coyote_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'coyote'),
			'description'	=> esc_html__('This option will reset all Edge Options values to defaults', 'coyote'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_reset_options_map', 20);

}