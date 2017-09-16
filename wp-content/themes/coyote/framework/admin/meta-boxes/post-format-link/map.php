<?php

/*** Link Post Format ***/

if(!function_exists('coyote_edge_map_post_link_meta_fields')) {

	function coyote_edge_map_post_link_meta_fields() {
		$link_post_format_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'coyote'),
				'name' => 'post_format_link_meta',
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'coyote'),
				'description' => esc_html__('Enter link', 'coyote'),
				'parent'      => $link_post_format_meta_box,

			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link Text', 'coyote'),
				'description' => esc_html__('Enter link text', 'coyote'),
				'parent'      => $link_post_format_meta_box,

			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_post_link_meta_fields');
}