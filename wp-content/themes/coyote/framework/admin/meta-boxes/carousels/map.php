<?php

//Carousels

if(!function_exists('coyote_edge_map_carousel_meta_fields')) {

	function coyote_edge_map_carousel_meta_fields() {

		$carousel_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('carousels'),
		        'title' => esc_html__('Carousel', 'coyote'),
		        'name' => 'carousel_meta',
		    )
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        => 'edgtf_carousel_image',
	            'type'        => 'image',
	            'label'       => esc_html__('Carousel Image', 'coyote'),
	            'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'coyote'),
	            'parent'      => $carousel_meta_box
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        => 'edgtf_carousel_hover_image',
	            'type'        => 'image',
	            'label'       => esc_html__('Carousel Hover Image', 'coyote'),
	            'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'coyote'),
	            'parent'      => $carousel_meta_box
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        => 'edgtf_carousel_item_link',
	            'type'        => 'text',
	            'label'       => esc_html__('Link', 'coyote'),
	            'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'coyote'),
	            'parent'      => $carousel_meta_box
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        => 'edgtf_carousel_item_target',
	            'type'        => 'selectblank',
	            'label'       => esc_html__('Target', 'coyote'),
	            'description' => esc_html__('Specify where to open the linked document', 'coyote'),
	            'parent'      => $carousel_meta_box,
	            'options' => array(
	            	'_self' => esc_html__('Self','coyote'),
	            	'_blank' => esc_html__('Blank','coyote')
	        	)
	        )
	    );
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_carousel_meta_fields');
}