<?php

if ( ! function_exists('coyote_edge_search_options_map') ) {

	function coyote_edge_search_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'coyote'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = coyote_edge_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'coyote'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'search-covers-header',
				'label' 		=> esc_html__('Select Search Type', 'coyote'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)", 'coyote'),
				'options' 		=> array(
					'search-covers-header' => esc_html__('Search Covers Header', 'coyote'),
					'fullscreen-search' => esc_html__('Fullscreen Search', 'coyote'),
				),
				'args'			=> array(
					'dependence'=> true,
					'hide'		=> array(
						'search-covers-header' => '#edgtf_search_animation_container',
						'fullscreen-search' => '',
					),
					'show'		=> array(
						'search-covers-header' => '',
						'fullscreen-search' => '#edgtf_search_animation_container',
					)
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'linear_icons',
				'label'			=> esc_html__('Search Icon Pack', 'coyote'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'coyote'),
				'options'		=> coyote_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons'))
			)
		);

		$search_animation_container = coyote_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_animation_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'search-covers-header',
				)
			)
		);

        coyote_edge_add_admin_field(array(
            'name' => 'fullscreen_search_background_image',
            'type' => 'image',
            'parent' => $search_animation_container,
            'label' => esc_html__('Full Screen Search Background Image', 'coyote'),
            'description' => esc_html__('Choose full screen search background image', 'coyote')
        ));

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_animation_container,
				'type'			=> 'select',
				'name'			=> 'search_animation',
				'default_value'	=> 'search-fade',
				'label'			=> esc_html__('Fullscreen Search Overlay Animation', 'coyote'),
				'description'	=> esc_html__('Choose animation for fullscreen search overlay', 'coyote'),
				'options'		=> array(
					'search-fade'			=> esc_html__('Fade', 'coyote'),
					'search-from-circle'	=> esc_html__('Circle appear', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Search area in grid', 'coyote'),
				'description'	=> esc_html__('Set search area to be in grid', 'coyote'),
			)
		);

		coyote_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header','coyote')
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'coyote'),
				'description'	=> esc_html__('Set size for icon', 'coyote'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'coyote'),
				'description'	=> esc_html__('Define color style for icon', 'coyote'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'coyote'),
			)
		);
		coyote_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'coyote'),
			)
		);
		coyote_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'coyote'),
			)
		);
		coyote_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'coyote'),
			)
		);

		$search_icon_color_row2 = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'coyote'),
			)
		);
		coyote_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'coyote'),
			)
		);


		$search_icon_background_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'coyote'),
				'description'	=> esc_html__('Define background style for icon', 'coyote'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'coyote'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'coyote'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = coyote_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'coyote'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text', 'coyote'),
			)
		);

		$enable_search_icon_text_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'coyote'),
				'default_value'	=> ''
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'coyote'),
				'default_value'	=> ''
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'coyote'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'coyote'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = coyote_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'coyote'),
				'default_value'	=> '',
				'options'		=> coyote_edge_get_text_transform_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'coyote'),
				'default_value'	=> '-1',
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'coyote'),
				'default_value'	=> '',
				'options'		=> coyote_edge_get_font_style_array(),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'coyote'),
				'default_value'	=> '',
				'options'		=> coyote_edge_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = coyote_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'coyote'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'coyote'),
				'description'	=> esc_html__('Define padding and margins for Search icon', 'coyote'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		coyote_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'coyote'),
				'description'	=> esc_html__('Choose a background color for Select search bar', 'coyote'),
			)
		);

		$search_input_text_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text', 'coyote'),
				'description'	=> esc_html__('Define style for search text', 'coyote'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'coyote'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'coyote'),
				'options'		=> coyote_edge_get_text_transform_array()
			)
		);

		$search_input_text_row2 = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'coyote'),
				'options'		=> coyote_edge_get_font_style_array(),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'coyote'),
				'options'		=> coyote_edge_get_font_weight_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon', 'coyote'),
				'description'	=> esc_html__('Define style for search icon', 'coyote'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'coyote'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close', 'coyote'),
				'description'	=> esc_html__('Define style for search close icon', 'coyote'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color', 'coyote'),
				'default_value'	=> ''
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color', 'coyote'),
				'default_value'	=> ''
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size','coyote'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = coyote_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border', 'coyote'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'coyote'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = coyote_edge_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> esc_html__('Border Color', 'coyote'),
				'default_value'	=> ''
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color', 'coyote'),
				'default_value'	=> ''
			)
		);

	}

	add_action('coyote_edge_options_map', 'coyote_edge_search_options_map', 15);

}