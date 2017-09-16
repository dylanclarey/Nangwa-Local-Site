<?php

if ( ! function_exists('coyote_edge_general_options_map') ) {
	/**
	 * General options page
	 */
	function coyote_edge_general_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__('General', 'coyote'),
				'icon'  => 'fa fa-institution'
			)
		);

		$panel_design_style = coyote_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__('Design Style', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose a default Google font for your site', 'coyote'),
				'parent'		=> $panel_design_style
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Additional Google Fonts', 'coyote'),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
				)
			)
		);

		$additional_google_fonts_container = coyote_edge_add_admin_container(
			array(
				'parent'            => $panel_design_style,
				'name'              => 'additional_google_fonts_container',
				'hidden_property'   => 'additional_google_fonts',
				'hidden_value'      => 'no'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose additional Google font for your site', 'coyote'),
				'parent'        => $additional_google_fonts_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose additional Google font for your site', 'coyote'),
				'parent'        => $additional_google_fonts_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose additional Google font for your site', 'coyote'),
				'parent'        => $additional_google_fonts_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose additional Google font for your site', 'coyote'),
				'parent'        => $additional_google_fonts_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'coyote'),
				'description'   => esc_html__('Choose additional Google font for your site', 'coyote'),
				'parent'        => $additional_google_fonts_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'first_color',
				'type'          => 'color',
				'label'         => esc_html__('First Main Color', 'coyote'),
				'description'   => esc_html__('Choose the most dominant theme color. Default color is #303030', 'coyote'),
				'parent'        => $panel_design_style
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'page_background_color',
				'type'          => 'color',
				'label'         => esc_html__('Page Background Color', 'coyote'),
				'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'coyote'),
				'parent'        => $panel_design_style
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'selection_color',
				'type'          => 'color',
				'label'         => esc_html__('Text Selection Color', 'coyote'),
				'description'   => esc_html__('Choose the color users see when selecting text', 'coyote'),
				'parent'        => $panel_design_style
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Boxed Layout', 'coyote'),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_boxed_container"
				)
			)
		);

		$boxed_container = coyote_edge_add_admin_container(
			array(
				'parent'            => $panel_design_style,
				'name'              => 'boxed_container',
				'hidden_property'   => 'boxed',
				'hidden_value'      => 'no'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'page_background_color_in_box',
				'type'          => 'color',
				'label'         => esc_html__('Page Background Color', 'coyote'),
				'description'   => esc_html__('Choose the page background color outside box.', 'coyote'),
				'parent'        => $boxed_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image',
				'type'          => 'image',
				'label'         => esc_html__('Background Image', 'coyote'),
				'description'   => esc_html__('Choose an image to be displayed in background', 'coyote'),
				'parent'        => $boxed_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_repeating',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Use Background Image as Pattern', 'coyote'),
				'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'coyote'),
				'parent'        => $boxed_container,
				'options'       => array(
					'no'	=>	esc_html__('No', 'coyote'),
					'yes'	=>	esc_html__('Yes', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__('Background Image Behaviour', 'coyote'),
				'description'   => esc_html__('Choose background image behaviour', 'coyote'),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'     => esc_html__('Fixed', 'coyote'),
					'scroll'    => esc_html__('Scroll', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Initial Width of Content', 'coyote'),
				'description'   => esc_html__('Choose the initial width of content which is in grid. Applies to pages set to "Default Template" and rows set to "In Grid"', 'coyote'),
				'parent'        => $panel_design_style,
				'options'       => array(
					""          => esc_html__("1100px - default",'coyote'),
					"grid-1300" => esc_html__("1300px",'coyote'),
					"grid-1200" => esc_html__("1200px",'coyote'),
					"grid-1000" => esc_html__("1000px",'coyote'),
					"grid-800"  => esc_html__("800px",'coyote')
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__('Preload Pattern Image', 'coyote'),
				'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'coyote'),
				'parent'        => $panel_design_style
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'element_appear_amount',
				'type' => 'text',
				'label' => esc_html__('Element Appearance', 'coyote'),
				'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'coyote'),
				'parent' => $panel_design_style,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		$panel_settings = coyote_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__('Settings', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Smooth Scroll', 'coyote'),
				'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'coyote'),
				'parent'        => $panel_settings
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Smooth Page Transitions', 'coyote'),
				'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'coyote'),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_page_transitions_container"
				)
			)
		);

		$page_transitions_container = coyote_edge_add_admin_container(
			array(
				'parent'            => $panel_settings,
				'name'              => 'page_transitions_container',
				'hidden_property'   => 'smooth_page_transitions',
				'hidden_value'      => 'no'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'smooth_pt_bgnd_color',
				'type'          => 'color',
				'label'         => esc_html__('Page Loader Background Color', 'coyote'),
				'parent'        => $page_transitions_container
			)
		);

		$group_pt_spinner_animation = coyote_edge_add_admin_group(array(
			'name'          => 'group_pt_spinner_animation',
			'title'         => esc_html__('Loader Style', 'coyote'),
			'description'   => esc_html__('Define styles for loader spinner animation', 'coyote'),
			'parent'        => $page_transitions_container
		));

		$row_pt_spinner_animation = coyote_edge_add_admin_row(array(
			'name'      => 'row_pt_spinner_animation',
			'parent'    => $group_pt_spinner_animation
		));

		coyote_edge_add_admin_field(array(
			'type'          => 'selectsimple',
			'name'          => 'smooth_pt_spinner_type',
			'default_value' => '',
			'label'         => esc_html__('Spinner Type', 'coyote'),
			'parent'        => $row_pt_spinner_animation,
			'options'       => array(
				"coyote" => esc_html__("Coyote", 'coyote'),
				"pulse" => esc_html__("Pulse", 'coyote'),
				"double_pulse" => esc_html__("Double Pulse", 'coyote'),
				"cube" => esc_html__("Cube", 'coyote'),
				"rotating_cubes" => esc_html__("Rotating Cubes", 'coyote'),
				"stripes" => esc_html__("Stripes", 'coyote'),
				"wave" => esc_html__("Wave", 'coyote'),
				"two_rotating_circles" => esc_html__("2 Rotating Circles", 'coyote'),
				"five_rotating_circles" => esc_html__("5 Rotating Circles", 'coyote'),
				"atom" => esc_html__("Atom", 'coyote'),
				"clock" => esc_html__("Clock", 'coyote'),
				"mitosis" => esc_html__("Mitosis", 'coyote'),
				"lines" => esc_html__("Lines", 'coyote'),
				"fussion" => esc_html__("Fussion", 'coyote'),
				"wave_circles" => esc_html__("Wave Circles", 'coyote'),
				"pulse_circles" => esc_html__("Pulse Circles", 'coyote'),
			),
			'args'          => array(
			    "dependence"             => true,
			    'show'        => array(
			        "coyote"         		=> "#edgtf_coyote_loader_title_container",
			        "rotate_circles"        => "",
			        "pulse"                 => "",
			        "double_pulse"          => "",
			        "cube"                  => "",
			        "rotating_cubes"        => "",
			        "stripes"               => "",
			        "wave"                  => "",
			        "two_rotating_circles"  => "",
			        "five_rotating_circles" => "",
			        "atom"                  => "",
			        "clock"                 => "",
			        "mitosis"               => "",
			        "lines"                 => "",
			        "fussion"               => "",
			        "wave_circles"          => "",
			        "pulse_circles"         => ""
			    ),
			    'hide'        => array(
			        "coyote"         		=> "",
			        ""                      => "#edgtf_coyote_loader_title_container",
			        "rotate_circles"        => "#edgtf_coyote_loader_title_container",
			        "pulse"                 => "#edgtf_coyote_loader_title_container",
			        "double_pulse"          => "#edgtf_coyote_loader_title_container",
			        "cube"                  => "#edgtf_coyote_loader_title_container",
			        "rotating_cubes"        => "#edgtf_coyote_loader_title_container",
			        "stripes"               => "#edgtf_coyote_loader_title_container",
			        "wave"                  => "#edgtf_coyote_loader_title_container",
			        "two_rotating_circles"  => "#edgtf_coyote_loader_title_container",
			        "five_rotating_circles" => "#edgtf_coyote_loader_title_container",
			        "atom"                  => "#edgtf_coyote_loader_title_container",
			        "clock"                 => "#edgtf_coyote_loader_title_container",
			        "mitosis"               => "#edgtf_coyote_loader_title_container",
			        "lines"                 => "#edgtf_coyote_loader_title_container",
			        "fussion"               => "#edgtf_coyote_loader_title_container",
			        "wave_circles"          => "#edgtf_coyote_loader_title_container",
			        "pulse_circles"         => "#edgtf_coyote_loader_title_container"
			    )
			)
		));

		coyote_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'smooth_pt_spinner_color',
			'default_value' => '',
			'label'         => esc_html__('Spinner Color', 'coyote'),
			'parent'        => $row_pt_spinner_animation
		));

		$coyote_loader_title_container = coyote_edge_add_admin_container(
		    array(
		        'parent'          => $panel_settings,
		        'name'            => 'coyote_loader_title_container',
		        'hidden_property' => 'smooth_pt_spinner_type',
		        'hidden_value'    => '',
		        'hidden_values'   =>array(
		            "",
		            "rotate_circles",
		            "pulse",
		            "double_pulse",
		            "cube",
		            "rotating_cubes",
		            "stripes",
		            "wave",
		            "two_rotating_circles",
		            "five_rotating_circles",
		            "atom",
		            "clock",
		            "mitosis",
		            "lines",
		            "fussion",
		            "wave_circles",
		            "pulse_circles"
		        )
		    )
		);

		coyote_edge_add_admin_field(
		    array(
		        'type'          => 'text',
		        'name'          => 'coyote_loader_title',
		        'default_value' => 'Coyote',
		        'label'         => esc_html__('Loader title', 'coyote'),
		        'args' => array(
		            'col_width' => 2,
		        ),
		        'parent'        => $coyote_loader_title_container,
		    )
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Show "Back To Top Button"', 'coyote'),
				'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'coyote'),
				'parent'        => $panel_settings
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Responsiveness', 'coyote'),
				'description'   => esc_html__('Enabling this option will make all pages responsive', 'coyote'),
				'parent'        => $panel_settings
			)
		);

		$panel_custom_code = coyote_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__('Custom Code', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'custom_css',
				'type'          => 'textarea',
				'label'         => esc_html__('Custom CSS', 'coyote'),
				'description'   => esc_html__('Enter your custom CSS here', 'coyote'),
				'parent'        => $panel_custom_code
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'          => 'custom_js',
				'type'          => 'textarea',
				'label'         => esc_html__('Custom JS', 'coyote'),
				'description'   => esc_html__('Enter your custom Javascript here', 'coyote'),
				'parent'        => $panel_custom_code
			)
		);

		$panel_google_api = coyote_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__('Google API', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__('Google Maps Api Key', 'coyote'),
				'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation.', 'coyote'),
				'parent'      => $panel_google_api
			)
		);
	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_general_options_map', 1);

}