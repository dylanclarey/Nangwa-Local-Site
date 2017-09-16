<?php

/*** Post Settings ***/

$post_meta_box = coyote_edge_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Post','coyote'),
		'name' 	=> 'post-meta'
	)
);

coyote_edge_add_meta_box_field(array(
	'name'        => 'edgtf_blog_masonry_gallery_dimensions',
	'type'        => 'select',
	'label'       => esc_html__('Dimensions for Masonry Gallery','coyote'),
	'description' => esc_html__('Choose image layout when it appears in Masonry Gallery list','coyote'),
	'parent'      => $post_meta_box,
	'options'     => array(
		'default'            => esc_html__('Default','coyote'),
		'large-width'        => esc_html__('Large width','coyote'),
		'large-height'       => esc_html__('Large height','coyote'),
		'large-width-height' => esc_html__('Large width/height','coyote')
	),
	'default_value' => 'default'
));