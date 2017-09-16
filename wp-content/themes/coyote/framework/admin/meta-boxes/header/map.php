<?php

if(!function_exists('coyote_edge_map_header_meta_fields')) {

	function coyote_edge_map_header_meta_fields() {
		$coyote_edge_custom_sidebars = coyote_edge_get_custom_sidebars();

		$header_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Header', 'coyote'),
		        'name' => 'header_meta'
		    )
		);

		$temp_holder_show		= '';
		$temp_holder_hide		= '';
		$temp_array_standard	= array();
		$temp_array_vertical	= array();
		$temp_array_full_screen	= array();
		$temp_array_behaviour	= array();
		switch (coyote_edge_options()->getOptionValue('header_type')) {

			case 'header-standard':
				$temp_holder_show = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_centered_type_meta_container';

				$temp_array_standard = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-vertical','header-full-screen','header-centered')
				);

				$temp_array_centered = array(
					'hidden_values' => array('','header-standard','header-vertical','header-full-screen')
				);

				$temp_array_vertical = array(
					'hidden_values' => array('','header-standard','header-full-screen','header-centered')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-centered')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;

			case 'header-centered':
				$temp_holder_show = '#edgtf_edgtf_header_centered_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_type_meta_container';

				$temp_array_standard = array(
					'hidden_values' => array('','header-vertical','header-full-screen','header-centered')
				);
				$temp_array_centered = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard','header-vertical','header-full-screen')
				);
				$temp_array_vertical = array(
					'hidden_values' => array('','header-standard','header-full-screen','header-centered')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-centered')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;

			case 'header-vertical':
				$temp_holder_show = '#edgtf_edgtf_header_vertical_type_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container,#edgtf_edgtf_header_centered_type_meta_container';

				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-full-screen','header-centered')
				);
				$temp_array_centered = array(
					'hidden_values' => array('','header-standard','header-vertical','header-full-screen')
				);
				$temp_array_vertical = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard','header-full-screen','header-centered')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical','header-centered')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'default',
					'hidden_values' => array('','header-vertical')
				);
				break;
			case 'header-full-screen':
				$temp_holder_show = '#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_behaviour_meta_container';
				$temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_centered_type_meta_container';
				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-full-screen','header-centered')
				);

				$temp_array_centered = array(
					'hidden_values' => array('','header-standard','header-vertical','header-full-screen')
				);

				$temp_array_vertical = array(
					'hidden_values' => array('', 'header-standard','header-full-screen','header-centered')
				);

				$temp_array_full_screen = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-vertical','header-standard','header-centered')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;
		}



		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_type_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Choose Header Type', 'coyote'),
				'description' => esc_html__('Select header type layout', 'coyote'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => esc_html__('Default','coyote'),
					'header-standard' => esc_html__('Standard Header Layout','coyote'),
					'header-centered' => esc_html__('Centered Header Layout','coyote'),
					'header-vertical' => esc_html__('Vertical Header Layout','coyote'),
					'header-full-screen' => esc_html__('Full Screen Header Layout','coyote')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"" => $temp_holder_hide,
						'header-standard' 		=> '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_centered_type_meta_container',
						'header-centered' 		=> '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_type_meta_container',
						'header-vertical' 		=> '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_centered_type_meta_container',
						'header-full-screen'	=> '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_centered_type_meta_container'
					),
					"show" => array(
						"" => $temp_holder_show,
						"header-standard" 		=> '#edgtf_edgtf_header_standard_type_meta_container',
						"header-centered" 		=> '#edgtf_edgtf_header_centered_type_meta_container',
						"header-vertical" 		=> '#edgtf_edgtf_header_vertical_type_meta_container',
						"header-full-screen" 	=> '#edgtf_edgtf_header_full_screen_type_meta_container'
					)
				)
			)
		);
		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_header_style_meta',
		        'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'coyote'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'coyote'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light','coyote'),
					'dark-header' => esc_html__('Dark','coyote')
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'parent' => $header_meta_box,
				'type' => 'select',
				'name' => 'edgtf_enable_header_style_on_scroll_meta',
				'default_value' => '',
				'label' => esc_html__('Enable Header Style on Scroll', 'coyote'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'coyote'),
				'options' => array(
					'' => '',
					'no' => esc_html__('No','coyote'),
					'yes' => esc_html__('Yes','coyote')
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_disable_header_widget_area_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Header Widget Area', 'coyote'),
				'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'coyote'),
				'parent' => $header_meta_box
			)
		);

		if(count($coyote_edge_custom_sidebars) > 0) {
			coyote_edge_add_meta_box_field(array(
				'name' => 'edgtf_custom_header_widget_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Custom Widget Area in Header', 'coyote'),
				'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'coyote'),
				'parent' => $header_meta_box,
				'options' => $coyote_edge_custom_sidebars
			));
		}
		if(in_array(coyote_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
			coyote_edge_add_meta_box_field(
				array(
					'name' => 'edgtf_disable_sticky_header_widget_area_meta',
					'type' => 'yesno',
					'default_value' => 'no',
					'label' => esc_html__('Disable Sticky Header Widget Area', 'coyote'),
					'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'coyote'),
					'parent' => $header_meta_box
				)
			);

			if(count($coyote_edge_custom_sidebars) > 0) {
				coyote_edge_add_meta_box_field(array(
					'name' => 'edgtf_custom_sticky_header_widget_meta',
					'type' => 'selectblank',
					'label' => esc_html__('Choose Custom Widget Area in Sticky Header', 'coyote'),
					'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'coyote'),
					'parent' => $header_meta_box,
					'options' => $coyote_edge_custom_sidebars
				));
			}
		}

		$header_standard_type_meta_container = coyote_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_standard_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_standard
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_standard_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'coyote'),
				'description' => esc_html__('Choose a background color for header area', 'coyote'),
				'parent' => $header_standard_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_standard_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_standard_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_color_header_standard_meta',
				'type' => 'color',
				'label' => esc_html__('Border Bottom Color', 'coyote'),
				'description' => esc_html__('Choose a border bottom color for header area', 'coyote'),
				'parent' => $header_standard_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_transparency_header_standard_meta',
				'type' => 'text',
				'label' => esc_html__('Border Bottom Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_standard_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		$header_centered_type_meta_container = coyote_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_centered_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_centered
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_centered_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'coyote'),
				'description' => esc_html__('Choose a background color for header area', 'coyote'),
				'parent' => $header_centered_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_centered_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_centered_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_color_header_centered_meta',
				'type' => 'color',
				'label' => esc_html__('Border Bottom Color', 'coyote'),
				'description' => esc_html__('Choose a border bottom color for header area', 'coyote'),
				'parent' => $header_centered_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_transparency_header_centered_meta',
				'type' => 'text',
				'label' => esc_html__('Border Bottom Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_centered_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		$header_vertical_type_meta_container = coyote_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' =>'edgtf_header_vertical_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',
					'hidden_values' => array('header-standard')
				),
				$temp_array_vertical
			)
		);

		coyote_edge_add_meta_box_field(array(
			'name'        => 'edgtf_vertical_header_background_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Background Color',  'coyote'),
			'parent'      => $header_vertical_type_meta_container
		));

		coyote_edge_add_meta_box_field(array(
			'name'        => 'edgtf_vertical_header_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'coyote'),
			'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'coyote'),
			'parent'      => $header_vertical_type_meta_container,
			'args'        => array(
				'col_width' => 1
			)
		));

		coyote_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'coyote'),
				'description'   => esc_html__('Set background image for vertical menu', 'coyote'),
				'parent'        => $header_vertical_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_disable_vertical_header_background_image_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Background Image', 'coyote'),
				'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'coyote'),
				'parent' => $header_vertical_type_meta_container
			)
		);

		$header_full_screen_type_meta_container = coyote_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_full_screen_type_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_full_screen
			)
		);

        coyote_edge_add_meta_box_field(
            array(
                'parent' => $header_full_screen_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_menu_position_header_full_screen_meta',
                'default_value' => '',
                'label' => esc_html__('Full Screen Menu Opener Position', 'coyote'),
                'description' => esc_html__('Choose the position of fullscreen menu opener button', 'coyote'),
                'options' => array(
                    '' => '',
                    'fullscreen-opener-right' => esc_html__('Right', 'coyote'),
                    'fullscreen-opener-left' => esc_html__('Left', 'coyote'),
                )
            )
        );

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_full_screen_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'coyote'),
				'description' => esc_html__('Choose a background color for Full Screen header area', 'coyote'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_full_screen_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_full_screen_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_color_header_full_screen_meta',
				'type' => 'color',
				'label' => esc_html__('Border Bottom Color', 'coyote'),
				'description' => esc_html__('Choose a border bottom color for Full Screen header area', 'coyote'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_transparency_header_full_screen_meta',
				'type' => 'text',
				'label' => esc_html__('Border Bottom Transparency', 'coyote'),
				'description' => esc_html__('Choose a transparency for the Full Screen header border bottom color (0 = fully transparent, 1 = opaque)', 'coyote'),
				'parent' => $header_full_screen_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		$header_behaviour_meta_container = coyote_edge_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'edgtf_header_behaviour_meta_container',
					'hidden_property' => 'edgtf_header_type_meta',

				),
				$temp_array_behaviour
			)
		);

		coyote_edge_add_meta_box_field(
			array(
				'name'            => 'edgtf_scroll_amount_for_sticky_meta',
				'type'            => 'text',
				'label'           => esc_html__('Scroll amount for sticky header appearance', 'coyote'),
				'description'     => esc_html__('Define scroll amount for sticky header appearance', 'coyote'),
				'parent'          => $header_behaviour_meta_container,
				'args'            => array(
					'col_width' => 2,
					'suffix'    => 'px'
				),
				'hidden_property' => 'edgtf_header_behaviour',
				'hidden_values'   => array("sticky-header-on-scroll-up", "fixed-on-scroll")
			)
		);


		coyote_edge_add_admin_section_title(array(
			'name'   => 'top_bar_section_title',
			'parent' => $header_meta_box,
			'title'  => esc_html__('Top Bar','coyote')
		));

		$top_bar_global_option      = coyote_edge_options()->getOptionValue('top_bar');
		$top_bar_default_dependency = array(
			'' => '#edgtf_top_bar_container_no_style'
		);

		$top_bar_show_array = array(
			'yes' => '#edgtf_top_bar_container_no_style'
		);

		$top_bar_hide_array = array(
			'no' => '#edgtf_top_bar_container_no_style'
		);

		if($top_bar_global_option === 'yes') {
			$top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_value' => 'no'
			);
		} else {
			$top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_values'   => array('','no')
			);
		}


		coyote_edge_add_meta_box_field(array(
			'name'          => 'edgtf_top_bar_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Top Bar on This Page', 'coyote'),
			'description'   => esc_html__('Enabling this option will enable top bar on this page', 'coyote'),
			'parent'        => $header_meta_box,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default','coyote'),
				'yes' => esc_html__('Yes','coyote'),
				'no'  => esc_html__('No','coyote')
			),
			'args' => array(
				"dependence" => true,
				'show'       => $top_bar_show_array,
				'hide'       => $top_bar_hide_array
			)
		));

		$top_bar_container = coyote_edge_add_admin_container_no_style(array_merge(array(
			'name'            => 'top_bar_container_no_style',
			'parent'          => $header_meta_box,
			'hidden_property' => 'edgtf_top_bar_meta'
		),
			$temp_top_no));

		coyote_edge_add_meta_box_field(array(
			'name'    => 'edgtf_top_bar_skin_meta',
			'type'    => 'select',
			'label'   => esc_html__('Top Bar Skin', 'coyote'),
			'options' => array(
				''      => esc_html__('Default','coyote'),
				'light' => esc_html__('Light','coyote'),
				'dark'  => esc_html__('Dark','coyote')
			),
			'parent'  => $top_bar_container
		));

		coyote_edge_add_meta_box_field(array(
			'name'   => 'edgtf_top_bar_background_color_meta',
			'type'   => 'color',
			'label'  => esc_html__('Top Bar Background Color', 'coyote'),
			'parent' => $top_bar_container
		));

		coyote_edge_add_meta_box_field(array(
			'name'        => 'edgtf_top_bar_background_transparency_meta',
			'label'       => esc_html__('Top Bar Background Color Transparency', 'coyote'),
			'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'coyote'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 3
			)
		));

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_header_meta_fields');
}