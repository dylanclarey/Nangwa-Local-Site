<?php

if(!function_exists('coyote_edge_map_footer_meta_fields')) {

	function coyote_edge_map_footer_meta_fields() {

		$footer_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Footer', 'coyote'),
		        'name' => 'footer_meta'
		    )
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name' => 'edgtf_disable_footer_meta',
	            'type' => 'yesno',
	            'default_value' => 'no',
	            'label' => esc_html__('Disable Footer for this Page', 'coyote'),
	            'description' => esc_html__('Enabling this option will hide footer on this page', 'coyote'),
	            'parent' => $footer_meta_box,
	        )
	    );
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_footer_meta_fields');
}