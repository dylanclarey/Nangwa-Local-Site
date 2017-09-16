<?php

if(!function_exists('coyote_edge_map_title_meta_fields')) {

	function coyote_edge_map_title_meta_fields() {
		$title_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Title', 'coyote'),
		        'name' => 'title_meta',
		    )
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name' => 'edgtf_show_title_area_meta',
	            'type' => 'select',
	            'default_value' => '',
	            'label' => esc_html__('Show Title Area', 'coyote'),
	            'description' => esc_html__('Disabling this option will turn off page title area', 'coyote'),
	            'parent' => $title_meta_box,
	            'options' => array(
	                '' => '',
	                'no' => esc_html__('No','coyote'),
	                'yes' => esc_html__('Yes','coyote'),
	            ),
	            'args' => array(
	                "dependence" => true,
	                "hide" => array(
	                    "" => "",
	                    "no" => "#edgtf_edgtf_show_title_area_meta_container",
	                    "yes" => ""
	                ),
	                "show" => array(
	                    "" => "#edgtf_edgtf_show_title_area_meta_container",
	                    "no" => "",
	                    "yes" => "#edgtf_edgtf_show_title_area_meta_container"
	                )
	            )
	        )
	    );

	    $show_title_area_meta_container = coyote_edge_add_admin_container(
	        array(
	            'parent' => $title_meta_box,
	            'name' => 'edgtf_show_title_area_meta_container',
	            'hidden_property' => 'edgtf_show_title_area_meta',
	            'hidden_value' => 'no'
	        )
	    );


        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area in Grid', 'coyote'),
                'description' => esc_html__('Choose wheter for title content to be in grid', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'yes' => esc_html__('Yes','coyote'),
                    'no' => esc_html__('No','coyote')
                )
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'coyote'),
                'description' => esc_html__('Choose title type', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard','coyote'),
                    'breadcrumb' => esc_html__('Breadcrumb','coyote'),
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = coyote_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

            coyote_edge_add_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Enable Breadcrumbs', 'coyote'),
                    'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'coyote'),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__('No','coyote'),
                        'yes' => esc_html__('Yes','coyote'),
                    ),
                )
            );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'coyote'),
                'description' => esc_html__('Choose an animation for Title Area', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation','coyote'),
                    'right-left' => esc_html__('Text right to left','coyote'),
                    'left-right' => esc_html__('Text left to right','coyote'),
                )
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'coyote'),
                'description' => esc_html__('Specify title vertical alignment', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header','coyote'),
                    'window_top' => esc_html__('From Window Top','coyote'),
                )
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'coyote'),
                'description' => esc_html__('Specify title horizontal alignment', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left','coyote'),
                    'center' => esc_html__('Center','coyote'),
                    'right' => esc_html__('Right','coyote')
                )
            )
        );

		coyote_edge_add_meta_box_field(
			array(
				'name'			=> 'edgtf_title_area_text_size_meta',
				'type'			=> 'select',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Size', 'coyote'),
				'description'	=> esc_html__('Choose a default Title size', 'coyote'),
				'parent'		=> $show_title_area_meta_container,
				'options'		=> array(
						''     => esc_html__('Default', 'coyote'),
						'small'     => esc_html__('Small', 'coyote'),
						'medium'    => esc_html__('Medium', 'coyote'),
						'large'     => esc_html__('Large', 'coyote'),
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'			=> 'edgtf_title_enable_underscore_meta',
				'type'			=> 'select',
				'default_value'	=> '',
				'label'			=> esc_html__('Underscore After Title', 'coyote'),
				'description'	=> esc_html__('Enable underscore rendering after title', 'coyote'),
				'parent'		=> $show_title_area_meta_container,
				'options'		=> array(
					'' => '',
					'no'     => esc_html__('No','coyote'),
					'yes'    => esc_html__('Yes','coyote')
				)
			)
		);

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'coyote'),
                'description' => esc_html__('Choose a color for title text', 'coyote'),
                'parent' => $show_title_area_meta_container
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'coyote'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'coyote'),
                'parent' => $show_title_area_meta_container
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => 'Background Color',
                'description' => esc_html__('Choose a background color for Title Area', 'coyote'),
                'parent' => $show_title_area_meta_container
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'coyote'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'coyote'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = coyote_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'coyote'),
                'description' => esc_html__('Choose an Image for Title Area', 'coyote'),
                'parent' => $hide_background_image_meta_container
            )
        );

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'coyote'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'coyote'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No','coyote'),
                    'yes' => esc_html__('Yes','coyote')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = coyote_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

            coyote_edge_add_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_background_image_parallax_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Background Image in Parallax', 'coyote'),
                    'description' => esc_html__('Enabling this option will make Title background image parallax', 'coyote'),
                    'parent' => $title_area_background_image_responsive_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__('No','coyote'),
                        'yes' => esc_html__('Yes','coyote'),
                        'yes_zoom' => esc_html__('Yes, with zoom out','coyote')
                    )
                )
            );

        coyote_edge_add_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'coyote'),
            'description' => esc_html__('Set a height for Title Area', 'coyote'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        coyote_edge_add_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'coyote'),
            'description' => esc_html__('Enter your subtitle text', 'coyote'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        coyote_edge_add_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'coyote'),
                'description' => esc_html__('Choose a color for subtitle text', 'coyote'),
                'parent' => $show_title_area_meta_container
            )
        );
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_title_meta_fields');
}