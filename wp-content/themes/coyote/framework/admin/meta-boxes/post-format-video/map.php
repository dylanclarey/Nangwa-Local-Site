<?php

/*** Video Post Format ***/

if(!function_exists('coyote_edge_map_post_video_meta_fields')) {

	function coyote_edge_map_post_video_meta_fields() {
		$video_post_format_meta_box = coyote_edge_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Video Post Format', 'coyote'),
				'name' 	=> 'post_format_video_meta',
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_video_type_meta',
				'type'        => 'select',
				'label'       => esc_html__('Video Type', 'coyote'),
				'description' => esc_html__('Choose video type', 'coyote'),
				'parent'      => $video_post_format_meta_box,
				'default_value' => 'youtube',
				'options'     => array(
					'youtube' => esc_html__('Youtube','coyote'),
					'vimeo' => esc_html__('Vimeo','coyote'),
					'self' => esc_html__('Self Hosted','coyote')
				),
				'args' => array(
				'dependence' => true,
				'hide' => array(
					'youtube' => '#edgtf_edgtf_video_self_hosted_container',
					'vimeo' => '#edgtf_edgtf_video_self_hosted_container',
					'self' => '#edgtf_edgtf_video_embedded_container'
				),
				'show' => array(
					'youtube' => '#edgtf_edgtf_video_embedded_container',
					'vimeo' => '#edgtf_edgtf_video_embedded_container',
					'self' => '#edgtf_edgtf_video_self_hosted_container')
			)
			)
		);

		$edgtf_video_embedded_container = coyote_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'edgtf_video_embedded_container',
				'hidden_property' => 'edgtf_video_type_meta',
				'hidden_value' => 'self'
			)
		);

		$edgtf_video_self_hosted_container = coyote_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'edgtf_video_self_hosted_container',
				'hidden_property' => 'edgtf_video_type_meta',
				'hidden_values' => array('youtube', 'vimeo')
			)
		);



		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_id_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video ID', 'coyote'),
				'description' => esc_html__('Enter Video ID', 'coyote'),
				'parent'      => $edgtf_video_embedded_container,

			)
		);


		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Video Image', 'coyote'),
				'description' => esc_html__('Upload video image', 'coyote'),
				'parent'      => $edgtf_video_self_hosted_container,

			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_webm_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video WEBM', 'coyote'),
				'description' => esc_html__('Enter video URL for WEBM format', 'coyote'),
				'parent'      => $edgtf_video_self_hosted_container,

			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_mp4_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video MP4', 'coyote'),
				'description' => esc_html__('Enter video URL for MP4 format', 'coyote'),
				'parent'      => $edgtf_video_self_hosted_container,

			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_ogv_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video OGV', 'coyote'),
				'description' => esc_html__('Enter video URL for OGV format', 'coyote'),
				'parent'      => $edgtf_video_self_hosted_container,

			)
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_post_video_meta_fields');
}