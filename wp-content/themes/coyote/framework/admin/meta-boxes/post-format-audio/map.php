<?php

/*** Audio Post Format ***/

if(!function_exists('coyote_edge_map_post_audio_meta_fields')) {

	function coyote_edge_map_post_audio_meta_fields() {
		$audio_post_format_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Audio Post Format', 'coyote'),
				'name' 	=> 'post_format_audio_meta',
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'coyote'),
				'description' => esc_html__('Enter audion link', 'coyote'),
				'parent'      => $audio_post_format_meta_box,

			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_post_audio_meta_fields');
}