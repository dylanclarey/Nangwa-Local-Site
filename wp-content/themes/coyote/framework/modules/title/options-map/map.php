<?php

if ( ! function_exists('coyote_edge_title_options_map') ) {

	function coyote_edge_title_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'coyote'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = coyote_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'coyote'),
				'description' => esc_html__('This option will enable/disable Title Area', 'coyote'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = coyote_edge_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		
		coyote_edge_add_admin_field(
			array(
				'name' => 'title_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Title Area in Grid', 'coyote'),
				'description' => esc_html__('Set title content to be in grid', 'coyote'),
				'parent' => $show_title_area_container,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Title Area Type', 'coyote'),
				'description' => esc_html__('Choose title type', 'coyote'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'coyote'),
					'breadcrumb' => esc_html__('Breadcrumb', 'coyote'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#edgtf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#edgtf_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = coyote_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Breadcrumbs', 'coyote'),
				'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'coyote'),
				'parent' => $title_area_type_container,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Animations', 'coyote'),
				'description' => esc_html__('Choose an animation for Title Area', 'coyote'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation', 'coyote'),
					'right-left' => esc_html__('Text right to left', 'coyote'),
					'left-right' => esc_html__('Text left to right', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment', 'coyote'),
				'description' => esc_html__('Specify title vertical alignment', 'coyote'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'coyote'),
					'window_top' => esc_html__('From Window Top','coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'coyote'),
				'description' => esc_html__('Specify title horizontal alignment', 'coyote'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'coyote'),
					'center' => esc_html__('Center', 'coyote'),
					'right' => esc_html__('Right', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name'			=> 'title_area_text_size',
				'type'			=> 'select',
				'default_value'	=> 'small',
				'label'			=> esc_html__('Text Size', 'coyote'),
				'description'	=> esc_html__('Choose a default Title size', 'coyote'),
				'parent'		=> $show_title_area_container,
				'options'		=> array(
						'small'     => esc_html__('Small', 'coyote'),
						'medium'    => esc_html__('Medium', 'coyote'),
						'large'     => esc_html__('Large', 'coyote'),
				)
			)
		);


		coyote_edge_add_admin_field(
			array(
				'name'			=> 'title_enable_underscore',
				'type'			=> 'yesno',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Underscore After Title', 'coyote'),
				'description'	=> esc_html__('Enable underscore rendering after title', 'coyote'),
				'parent'		=> $show_title_area_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'coyote'),
				'description' => esc_html__('Choose a background color for Title Area', 'coyote'),
				'parent' => $show_title_area_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'coyote'),
				'description' => esc_html__('Choose an Image for Title Area', 'coyote'),
				'parent' => $show_title_area_container
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'coyote'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'coyote'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = coyote_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'coyote'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'coyote'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'coyote'),
					'yes' => esc_html__('Yes', 'coyote'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'coyote'),
			'description' => esc_html__('Set a height for Title Area', 'coyote'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = coyote_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'coyote'),
			)
		);

		$group_page_title_styles = coyote_edge_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title', 'coyote'),
			'description'	=> esc_html__('Define styles for page title', 'coyote'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'coyote'),
			'parent'		=> $row_page_title_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'coyote'),
			'options'		=> coyote_edge_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'coyote'),
			'parent'		=> $row_page_title_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'coyote'),
			'options'		=> coyote_edge_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'coyote'),
			'options'		=> coyote_edge_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = coyote_edge_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle', 'coyote'),
			'description'	=> esc_html__('Define styles for page subtitle', 'coyote'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'coyote'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'coyote'),
			'options'		=> coyote_edge_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'coyote'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'coyote'),
			'options'		=> coyote_edge_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'coyote'),
			'options'		=> coyote_edge_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = coyote_edge_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs', 'coyote'),
			'description'	=> esc_html__('Define styles for page breadcrumbs', 'coyote'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'coyote'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'coyote'),
			'options'		=> coyote_edge_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'coyote'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'coyote'),
			'options'		=> coyote_edge_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'coyote'),
			'options'		=> coyote_edge_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'coyote'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = coyote_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		coyote_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'coyote'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_title_options_map', 6);

}