<?php

if(!function_exists('coyote_edge_map_content_bottom_meta_fields')) {

	function coyote_edge_map_content_bottom_meta_fields() {
		$content_bottom_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Content Bottom', 'coyote'),
				'name' => 'content_bottom_meta',
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_enable_content_bottom_area_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Enable Content Bottom Area', 'coyote'),
				'description' => esc_html__('This option will enable Content Bottom area on pages', 'coyote'),
				'parent' => $content_bottom_meta_box,
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes'
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'' => '#edgtf_edgtf_show_content_bottom_meta_container',
						'no' => '#edgtf_edgtf_show_content_bottom_meta_container'
					),
					'show' => array(
						'yes' => '#edgtf_edgtf_show_content_bottom_meta_container'
					)
				)
			)
		);

		$show_content_bottom_meta_container = coyote_edge_add_admin_container(
			array(
				'parent' => $content_bottom_meta_box,
				'name' => 'edgtf_show_content_bottom_meta_container',
				'hidden_property' => 'edgtf_enable_content_bottom_area_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no')
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Sidebar to Display', 'coyote'),
				'description' => esc_html__('Choose a Content Bottom sidebar to display', 'coyote'),
				'options' => coyote_edge_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'edgtf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__('Display in Grid', 'coyote'),
				'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'coyote'),
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes'
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'edgtf_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'coyote'),
				'description' => esc_html__('Choose a background color for Content Bottom area', 'coyote'),
				'parent' => $show_content_bottom_meta_container
			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_content_bottom_meta_fields');
}