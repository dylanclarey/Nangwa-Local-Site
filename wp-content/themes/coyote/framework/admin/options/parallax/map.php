<?php

if ( ! function_exists('coyote_edge_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function coyote_edge_parallax_options_map()
	{

		$panel_parallax = coyote_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'coyote'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'coyote'),
			'parent'		=> $panel_parallax
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'coyote'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'coyote'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_parallax_options_map',20);

}