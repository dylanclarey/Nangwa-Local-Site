<?php

/*** Gallery Post Format ***/

if(!function_exists('coyote_edge_map_post_gallery_meta_fields')) {

	function coyote_edge_map_post_gallery_meta_fields() {
		$gallery_post_format_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Gallery Post Format', 'coyote'),
				'name' 	=> 'post_format_gallery_meta',
			)
		);

		coyote_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'coyote'),
				'description' => esc_html__('Choose your gallery images', 'coyote'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_post_gallery_meta_fields');
}