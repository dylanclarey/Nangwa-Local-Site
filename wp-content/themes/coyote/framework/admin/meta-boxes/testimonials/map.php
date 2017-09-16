<?php

//Testimonials

if(!function_exists('coyote_edge_map_testimonials_meta_fields')) {

	function coyote_edge_map_testimonials_meta_fields() {
		$testimonial_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('testimonials'),
		        'title' => esc_html__('Testimonial', 'coyote'),
		        'name' => 'testimonial_meta',
		    )
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        	=> 'edgtf_testimonial_title',
	            'type'        	=> 'text',
	            'label'       	=> esc_html__('Title', 'coyote'),
	            'description' 	=> esc_html__('Enter testimonial title', 'coyote'),
	            'parent'      	=> $testimonial_meta_box,
	        )
	    );


	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        	=> 'edgtf_testimonial_author',
	            'type'        	=> 'text',
	            'label'       	=> esc_html__('Author', 'coyote'),
	            'description' 	=> esc_html__('Enter author name', 'coyote'),
	            'parent'      	=> $testimonial_meta_box,
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        	=> 'edgtf_testimonial_author_position',
	            'type'        	=> 'text',
	            'label'       	=> esc_html__('Job Position', 'coyote'),
	            'description' 	=> esc_html__('Enter job position', 'coyote'),
	            'parent'      	=> $testimonial_meta_box,
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        	=> 'edgtf_testimonial_text',
	            'type'        	=> 'text',
	            'label'       	=> esc_html__('Text', 'coyote'),
	            'description' 	=> esc_html__('Enter testimonial text', 'coyote'),
	            'parent'      	=> $testimonial_meta_box,
	        )
	    );
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_testimonials_meta_fields');
}