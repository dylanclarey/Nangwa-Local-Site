<?php

if ( ! function_exists('coyote_edge_header_options_map') ) {

	function coyote_edge_header_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'coyote'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = coyote_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'coyote'),
				'description' => esc_html__('Select the type of header you would like to use', 'coyote'),
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard.png',
						'label' => esc_html__('Header Standard', 'coyote')
					),
					'header-centered' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-centered.png',
						'label' => esc_html__('Header Centered', 'coyote')
					),
					'header-vertical' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-vertical.png',
						'label' => esc_html__('Header Vertical', 'coyote')
					),
					'header-full-screen' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-full-screen.png',
						'label' => esc_html__('Header Full Screen', 'coyote')
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-centered' => '#edgtf_panel_header_centered,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_header_behaviour',
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_panel_header_centered',
						'header-centered' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_panel_header_standard',
						'header-vertical' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_full_screen,#edgtf_fullscreen_menu,#edgtf_panel_header_centered',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_centered',
					)
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour', 'coyote'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'coyote'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'coyote'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'coyote'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll', 'coyote'),
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'coyote'),
				'description' => esc_html__('Enabling this option will show top bar area', 'coyote'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = coyote_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		coyote_edge_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'two-columns',
				'label' => esc_html__('Choose top bar layout', 'coyote'),
				'description' => esc_html__('Select the layout for top bar', 'coyote'),
				'options' => array(
					'two-columns' => esc_html__('Two columns', 'coyote'),
					'three-columns' => esc_html__('Three columns', 'coyote'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#edgtf_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#edgtf_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = coyote_edge_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		coyote_edge_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths', 'coyote'),
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Top Bar in grid', 'coyote'),
				'description' => esc_html__('Set top bar content to be in grid', 'coyote'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = coyote_edge_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'coyote'),
			'description' => esc_html__('Set grid background color for top bar', 'coyote'),
			'parent' => $top_bar_in_grid_container
		));


		coyote_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency', 'coyote'),
			'description' => esc_html__('Set grid background transparency for top bar', 'coyote'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color','coyote'),
			'description' => esc_html__('Set background color for top bar', 'coyote'),
			'parent' => $top_bar_container
		));

		coyote_edge_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'coyote'),
			'description' => esc_html__('Set background transparency for top bar', 'coyote'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height', 'coyote'),
			'description' => esc_html__('Enter top bar height (Default is 40px)', 'coyote'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'hide_top_bar_on_responsive',
			'type' => 'yesno',
			'default_value' => 'yes',
			'label' => esc_html__('Hide Top Bar on Responsive', 'coyote'),
			'description' => esc_html__('Enabling this option you will hide top header area on responsive', 'coyote'),
			'parent' => $top_bar_container,
		));
		
		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'coyote'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'coyote'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'coyote'),
					'dark-header' => esc_html__('Dark', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll', 'coyote'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'coyote'),
			)
		);


		$panel_header_standard = coyote_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'coyote'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-centered',
                    'header-vertical',
					'header-full-screen'
				)
			)
		);

		coyote_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'coyote'),
				'description' => esc_html__('Set header content to be in grid', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color', 'coyote'),
				'description' => esc_html__('Set background color for header', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'coyote'),
				'description' => esc_html__('Set background transparency for header', 'coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'coyote'),
				'description' => esc_html__('Enter header height (default is 60px)', 'coyote'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_centered = coyote_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_centered',
				'title' => esc_html__('Header Centered', 'coyote'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-standard',
                    'header-vertical',
					'header-full-screen'
				)
			)
		);

		coyote_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_centered,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_centered',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'coyote'),
				'description' => esc_html__('Set header content to be in grid', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_centered',
				'default_value' => '',
				'label' => esc_html__('Background color', 'coyote'),
				'description' => esc_html__('Set background color for header', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_centered',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'coyote'),
				'description' => esc_html__('Set background transparency for header', 'coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_centered,
				'type' => 'text',
				'name' => 'menu_area_height_header_centered',
				'default_value' => '',
				'label' => esc_html__('Height', 'coyote'),
				'description' => esc_html__('Enter header height (default is 60px)', 'coyote'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_vertical = coyote_edge_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'coyote'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
                    'header-centered',
					'header-full-screen'
                )
            )
        );

            coyote_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'coyote'),
                'description' => esc_html__('Set background color for vertical menu', 'coyote'),
                'parent' => $panel_header_vertical
            ));

            coyote_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'coyote'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'coyote'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            coyote_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image', 'coyote'),
                    'description' => esc_html__('Set background image for vertical menu', 'coyote'),
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = coyote_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen', 'coyote'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-centered',
					'header-vertical'
				)
			)
		);


		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'coyote'),
				'description' => esc_html__('Set header content to be in grid', 'coyote'),
			)
		);

        coyote_edge_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'select',
                'name' => 'menu_position_header_full_screen',
                'default_value' => 'fullscreen-opener-right',
                'label' => esc_html__('Full Screen Menu Opener Position', 'coyote'),
                'description' => esc_html__('Choose the position of fullscreen menu opener button', 'coyote'),
                'options' => array(
                    'fullscreen-opener-right' => esc_html__('Right', 'coyote'),
                    'fullscreen-opener-left' => esc_html__('Left', 'coyote'),
                )
            )
        );



		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color', 'coyote'),
				'description' => esc_html__('Set background color for header', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'coyote'),
				'description' => esc_html__('Set background transparency for header', 'coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height', 'coyote'),
				'description' => esc_html__('Enter header height (default is 115px)', 'coyote'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);


		$panel_sticky_header = coyote_edge_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'coyote'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'coyote'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'coyote'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Sticky Header in grid', 'coyote'),
				'description' => esc_html__('Set sticky header content to be in grid', 'coyote'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = coyote_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'coyote'),
			'description' => esc_html__('Set grid background color for sticky header', 'coyote'),
			'parent' => $sticky_header_in_grid_container
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency', 'coyote'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'coyote'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'coyote'),
			'description' => esc_html__('Set background color for sticky header', 'coyote'),
			'parent' => $panel_sticky_header
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency', 'coyote'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'coyote'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'coyote'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)', 'coyote'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = coyote_edge_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu', 'coyote'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'coyote'),
		));

		$row1_sticky_header_menu = coyote_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'coyote'),
			'parent' => $row1_sticky_header_menu
		));

		coyote_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color', 'coyote'),
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = coyote_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		coyote_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'coyote'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size', 'coyote'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height', 'coyote'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform', 'coyote'),
				'default_value' => '',
				'options' => coyote_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = coyote_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		coyote_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'coyote'),
				'options' => coyote_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing', 'coyote'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = coyote_edge_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'coyote'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		coyote_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color', 'coyote'),
			'description' => esc_html__('Set grid background color for fixed header', 'coyote'),
			'parent' => $panel_fixed_header
		));

		coyote_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid', 'coyote'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'coyote'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		coyote_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'coyote'),
			'description' => esc_html__('Set background color for fixed header', 'coyote'),
			'parent' => $panel_fixed_header
		));

		coyote_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency', 'coyote'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'coyote'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = coyote_edge_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'coyote'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		coyote_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'coyote'),
			)
		);


		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu', 'coyote'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'coyote'),
				'options' => array(
					'left' => esc_html__('Left', 'coyote'),
					'top' => esc_html__('Top', 'coyote'),
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#edgtf_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#edgtf_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = coyote_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size', 'coyote'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'coyote'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu', 'coyote'),
				'description' => esc_html__('Choose menu item height', 'coyote'),
				'options' => array(
					'small_item' => esc_html__('Small', 'coyote'),
					'large_item' => esc_html__('Big', 'coyote'),
				)
			)
		);

		$drop_down_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'coyote'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'coyote'),
			)
		);

		$drop_down_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__('Item Separator Full Width', 'coyote'),
			)
		);

		$drop_down_padding_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding', 'coyote'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'coyote'),
			)
		);

		$drop_down_padding_row = coyote_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance', 'coyote'),
				'description' => esc_html__('Choose appearance for dropdown menu', 'coyote'),
				'options' => array(
					'dropdown-default' => esc_html__('Default', 'coyote'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'coyote'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top', 'coyote'),
					'dropdown-animate-height' => esc_html__('Animate Height', 'coyote'),
					'dropdown-slide-from-left' => esc_html__('Slide From Left', 'coyote'),
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position', 'coyote'),
				'description' => esc_html__('Enter value in percentage of entire header height', 'coyote'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'coyote'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'coyote'),
			)
		);

		$first_level_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'coyote'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'coyote'),
			)
		);

		$first_level_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'coyote'),
			)
		);

		$first_level_row2 = coyote_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color', 'coyote'),
			)
		);

		$first_level_row3 = coyote_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'coyote'),
				'options' => coyote_edge_get_font_style_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array()
			)
		);


		$first_level_row4 = coyote_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'coyote'),
				'options' => coyote_edge_get_text_transform_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row5 = coyote_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu', 'coyote'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'coyote'),
			)
		);

		$second_level_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'coyote'),
			)
		);

		$second_level_row2 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'coyote'),
				'options' => coyote_edge_get_font_style_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'coyote'),
				'options' => coyote_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu', 'coyote'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'coyote'),
			)
		);

		$second_level_wide_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'coyote'),
			)
		);

		$second_level_wide_row2 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = coyote_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'coyote'),
				'options' => coyote_edge_get_font_style_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'coyote'),
				'options' => coyote_edge_get_text_transform_array()
			)
		);

		$third_level_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu', 'coyote'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'coyote'),
			)
		);

		$third_level_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'coyote'),
			)
		);

		$third_level_row2 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'coyote'),
				'options' => coyote_edge_get_font_style_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'coyote'),
				'options' => coyote_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = coyote_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu', 'coyote'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'coyote'),
			)
		);

		$third_level_wide_row1 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'coyote'),
			)
		);

		$third_level_wide_row2 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = coyote_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'coyote'),
				'options' => coyote_edge_get_font_style_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'coyote'),
				'options' => coyote_edge_get_font_weight_array()
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'coyote'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'coyote'),
				'options' => coyote_edge_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = coyote_edge_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu', 'coyote'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-standard',
					'header-centered',
					'header-full-screen'
				)
            )
        );

        $drop_down_group = coyote_edge_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'coyote'),
                'description' => esc_html__('Set a style for dropdown menu', 'coyote'),
            )
        );

        $vertical_drop_down_row1 = coyote_edge_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'edgtf_drop_down_row1',
            )
        );

        coyote_edge_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'coyote'),
            )
        );

        $group_vertical_first_level = coyote_edge_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> esc_html__('1st level', 'coyote'),
            'description'	=> esc_html__('Define styles for 1st level menu', 'coyote'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'coyote'),
                'parent'		=> $row_vertical_first_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'coyote'),
                'parent'		=> $row_vertical_first_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'coyote'),
                'options'		=> coyote_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'coyote'),
                'parent'		=> $row_vertical_first_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'coyote'),
                'options'		=> coyote_edge_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'coyote'),
                'options'		=> coyote_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = coyote_edge_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> esc_html__('2nd level', 'coyote'),
            'description'	=> esc_html__('Define styles for 2nd level menu', 'coyote'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'coyote'),
                'parent'		=> $row_vertical_second_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'coyote'),
                'parent'		=> $row_vertical_second_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'coyote'),
                'options'		=> coyote_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'coyote'),
                'parent'		=> $row_vertical_second_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'coyote'),
                'options'		=> coyote_edge_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'coyote'),
                'options'		=> coyote_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = coyote_edge_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> esc_html__('3rd level', 'coyote'),
            'description'	=> esc_html__('Define styles for 3rd level menu', 'coyote'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'coyote'),
                'parent'		=> $row_vertical_third_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'coyote'),
                'parent'		=> $row_vertical_third_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'coyote'),
                'options'		=> coyote_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'coyote'),
                'parent'		=> $row_vertical_third_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'coyote'),
                'options'		=> coyote_edge_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'coyote'),
                'options'		=> coyote_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = coyote_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            coyote_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'coyote'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));
	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_header_options_map', 4);

}