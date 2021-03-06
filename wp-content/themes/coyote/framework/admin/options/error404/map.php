<?php

if ( ! function_exists('coyote_edge_error_404_options_map') ) {

	function coyote_edge_error_404_options_map() {

		coyote_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'coyote'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = coyote_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'coyote'),
		));

        coyote_edge_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'image',
            'name' => '404_image',
            'default_value' => EDGE_ASSETS_ROOT."/css/img/image404.jpg",
            'label' => esc_html__('Background Image', 'coyote'),
            'description' => esc_html__('Choose background image for 404 page', 'coyote'),
        ));

		coyote_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'coyote'),
			'description' => esc_html__('Enter text for 404 page', 'coyote'),
		));

		coyote_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'coyote'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'coyote'),
		));

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_error_404_options_map', 17);

}