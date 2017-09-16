<?php

if(!function_exists('coyote_edge_map_logo_meta_fields')) {

	function coyote_edge_map_logo_meta_fields() {
		$general_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Logo','coyote'),
		        'name' => 'logo_meta'
		    )
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_logo_image_meta',
				'type' => 'image',
				'label' => esc_html__('Logo Image - Default','coyote'),
				'description' => esc_html__('Choose a default logo image to display','coyote'),
				'parent' => $general_meta_box
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_logo_image_dark_meta',
				'type' => 'image',
				'label' => esc_html__('Logo Image - Dark','coyote'),
				'description' => esc_html__('Choose a dark logo image to display','coyote'),
				'parent' => $general_meta_box
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_logo_image_light_meta',
				'type' => 'image',
				'label' => esc_html__('Logo Image - Light','coyote'),
				'description' => esc_html__('Choose a light logo image to display','coyote'),
				'parent' => $general_meta_box
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_logo_image_sticky_meta',
				'type' => 'image',
				'label' => esc_html__('Logo Image - Sticky','coyote'),
				'description' => esc_html__('Choose a sticky logo image to display','coyote'),
				'parent' => $general_meta_box
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_logo_image_mobile_meta',
				'type' => 'image',
				'label' => esc_html__('Logo Image - Mobile','coyote'),
				'description' => esc_html__('Choose a mobile logo image to display','coyote'),
				'parent' => $general_meta_box
			)
		);
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_logo_meta_fields');
}
