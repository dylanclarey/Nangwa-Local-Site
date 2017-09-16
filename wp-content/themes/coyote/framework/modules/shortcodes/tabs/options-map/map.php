<?php

if(!function_exists('coyote_edge_tabs_map')) {
    function coyote_edge_tabs_map() {
		
        $panel = coyote_edge_add_admin_panel(array(
            'title' => esc_html__('Tabs', 'coyote'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        coyote_edge_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography', 'coyote'),
            'parent' => $panel
        ));

        $typography_group = coyote_edge_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography', 'coyote'),
			'description' => esc_html__('Setup typography for tabs navigation', 'coyote'),
            'parent' => $panel
        ));

        $typography_row = coyote_edge_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'coyote'),
            'options'       => coyote_edge_get_text_transform_array()
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'coyote'),
            'options'       => coyote_edge_get_font_style_array()
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'coyote'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = coyote_edge_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));		
		
        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'coyote'),
            'options'       => coyote_edge_get_font_weight_array()
        ));
		
		//Initial Tab Color Styles
		
		coyote_edge_add_admin_section_title(array(
            'name' => 'tab_color_section_title',
            'title' => esc_html__('Tab Navigation Color Styles', 'coyote'),
            'parent' => $panel
        ));
		$tabs_color_group = coyote_edge_add_admin_group(array(
            'name' => 'tabs_color_group',
            'title' => esc_html__('Navigation Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for tab navigation', 'coyote'),
            'parent' => $panel
        ));
		$tabs_color_row = coyote_edge_add_admin_row(array(
            'name' => 'tabs_color_row',
            'next' => true,
            'parent' => $tabs_color_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'coyote'),
        ));

		coyote_edge_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'coyote'),
        ));
		
		//Active Tab Color Styles
		
		$active_tabs_color_group = coyote_edge_add_admin_group(array(
            'name' => 'active_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'coyote'),
            'parent' => $panel
        ));
		$active_tabs_color_row = coyote_edge_add_admin_row(array(
            'name' => 'active_tabs_color_row',
            'next' => true,
            'parent' => $active_tabs_color_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'coyote'),
        ));

		coyote_edge_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color_active',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'coyote'),
        ));


        //Initial Boxed Tab Color Styles
		
		coyote_edge_add_admin_section_title(array(
            'name' => 'boxed_tab_color_section_title',
            'title' => esc_html__('Boxed Tab Navigation Color Styles', 'coyote'),
            'parent' => $panel
        ));
		$boxed_tabs_color_group = coyote_edge_add_admin_group(array(
            'name' => 'boxed_tabs_color_group',
            'title' => esc_html__('Navigation Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for tab navigation', 'coyote'),
            'parent' => $panel
        ));
		$boxed_tabs_color_row = coyote_edge_add_admin_row(array(
            'name' => 'boxed_tabs_color_row',
            'next' => true,
            'parent' => $boxed_tabs_color_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'coyote'),
        ));
		coyote_edge_add_admin_field(array(
            'parent'        => $boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'coyote'),
        ));
		
		//Active Boxed Tab Color Styles
		
		$active_boxed_tabs_color_group = coyote_edge_add_admin_group(array(
            'name' => 'active_boxed_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'coyote'),
            'parent' => $panel
        ));

		$active_boxed_tabs_color_row = coyote_edge_add_admin_row(array(
            'name' => 'active_boxed_tabs_color_row',
            'next' => true,
            'parent' => $active_boxed_tabs_color_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $active_boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'coyote'),
        ));

		coyote_edge_add_admin_field(array(
            'parent'        => $active_boxed_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'boxed_tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'coyote'),
        ));
    }

    add_action('coyote_edge_options_elements_map', 'coyote_edge_tabs_map');
}