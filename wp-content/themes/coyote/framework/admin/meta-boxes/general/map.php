<?php

if(!function_exists('coyote_edge_map_general_meta_fields')) {

	function coyote_edge_map_general_meta_fields() {

		$general_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('General', 'coyote'),
		        'name' => 'general_meta'
		    )
		);


	    coyote_edge_add_meta_box_field(
	        array(
	            'name' => 'edgtf_page_background_color_meta',
	            'type' => 'color',
	            'default_value' => '',
	            'label' => esc_html__('Page Background Color', 'coyote'),
	            'description' => esc_html__('Choose background color for page content', 'coyote'),
	            'parent' => $general_meta_box
	        )
	    );
		
		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_page_padding_meta',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__('Page Padding', 'coyote'),
				'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'coyote'),
				'parent' => $general_meta_box
			)
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name' => 'edgtf_page_slider_meta',
	            'type' => 'text',
	            'default_value' => '',
	            'label' => esc_html__('Slider Shortcode', 'coyote'),
	            'description' => esc_html__('Paste your slider shortcode here', 'coyote'),
	            'parent' => $general_meta_box
	        )
	    );

		$boxed_option      = coyote_edge_options()->getOptionValue('boxed');
		$boxed_default_dependency = array(
			'' => '#edgtf_boxed_container'
		);

		$boxed_show_array = array(
			'yes' => '#edgtf_boxed_container'
		);

		$boxed_hide_array = array(
			'no' => '#edgtf_boxed_container'
		);

		if($boxed_option === 'yes') {
			$boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
			$temp_boxed_no = array(
				'hidden_value' => 'no'
			);
		} else {
			$boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
			$temp_boxed_no = array(
				'hidden_values'   => array('','no')
			);
		}

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_boxed_meta',
				'type'          => 'select',
				'label'         => esc_html__('Boxed Layout', 'coyote'),
				'parent'        => $general_meta_box,
				'default_value' => '',
				'options'     => array(
					''		=> esc_html__('Default', 'coyote'),
					'yes'	=> esc_html__('Yes', 'coyote'),
					'no'	=> esc_html__('No', 'coyote')
				),
				'args' => array(
					"dependence" => true,
					'show'       => $boxed_show_array,
					'hide'       => $boxed_hide_array
				)
			)
		);

		$boxed_container = coyote_edge_add_admin_container_no_style(
			array_merge(
				array(
					'parent'            => $general_meta_box,
					'name'              => 'boxed_container',
					'hidden_property'   => 'edgtf_boxed_meta'
				),
				$temp_boxed_no
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_page_background_color_in_box_meta',
				'type'          => 'color',
				'label'         => esc_html__('Page Background Color', 'coyote'),
				'description'   => esc_html__('Choose the page background color outside box.', 'coyote'),
				'parent'        => $boxed_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_boxed_background_image_meta',
				'type'          => 'image',
				'label'         => esc_html__('Background Image', 'coyote'),
				'description'   => esc_html__('Choose an image to be displayed in background', 'coyote'),
				'parent'        => $boxed_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_boxed_background_image_repeating_meta',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Use Background Image as Pattern', 'coyote'),
				'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'coyote'),
				'parent'        => $boxed_container,
				'options'       => array(
					'no'	=>	esc_html__('No', 'coyote'),
					'yes'	=>	esc_html__('Yes', 'coyote')

				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__('Background Image Behaviour', 'coyote'),
				'description'   => esc_html__('Choose background image behaviour', 'coyote'),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'     => esc_html__('Fixed', 'coyote'),
					'scroll'    => esc_html__('Scroll', 'coyote')
				)
			)
		);
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_general_meta_fields');
}