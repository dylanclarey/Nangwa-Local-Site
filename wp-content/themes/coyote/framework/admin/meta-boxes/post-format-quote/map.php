<?php

/*** Quote Post Format ***/

if(!function_exists('coyote_edge_map_post_quote_meta_fields')) {

	function coyote_edge_map_post_quote_meta_fields() {
		$quote_post_format_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Quote Post Format', 'coyote'),
				'name' 	=> 'post_format_quote_meta',
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'coyote'),
				'description' => esc_html__('Enter Quote text', 'coyote'),
				'parent'      => $quote_post_format_meta_box,

			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_post_quote_meta_fields');
}