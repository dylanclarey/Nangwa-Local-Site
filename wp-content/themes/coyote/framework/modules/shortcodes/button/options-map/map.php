<?php

if(!function_exists('coyote_edge_button_map')) {
    function coyote_edge_button_map() {
        $panel = coyote_edge_add_admin_panel(array(
            'title' => esc_html__('Button', 'coyote'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        coyote_edge_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography', 'coyote'),
            'parent' => $panel
        ));

        $typography_group = coyote_edge_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography', 'coyote'),
            'description' => esc_html__('Setup typography for all button types', 'coyote'),
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
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'coyote'),
            'options'       => coyote_edge_get_text_transform_array()
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'coyote'),
            'options'       => coyote_edge_get_font_style_array()
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
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
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'coyote'),
            'options'       => coyote_edge_get_font_weight_array()
        ));

        //Outline type options
        coyote_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types', 'coyote'),
            'parent' => $panel
        ));

        //Solid type options
        $solid_group = coyote_edge_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type', 'coyote'),
            'description' => esc_html__('Setup solid button type', 'coyote'),
            'parent' => $panel
        ));

        $solid_row = coyote_edge_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','coyote')
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','coyote')
        ));


        $solid_row2 = coyote_edge_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_icon_color',
            'default_value' => '',
            'label'         => esc_html__('Icon Color', 'coyote'),
        ));

        //Outline type options
        $outline_group = coyote_edge_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type', 'coyote'),
            'description' => esc_html__('Setup outline button type', 'coyote'),
            'parent' => $panel
        ));

        $outline_row = coyote_edge_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','coyote')
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','coyote')
        ));


        $outline_row2 = coyote_edge_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_icon_color',
            'default_value' => '',
            'label'         => esc_html__('Icon Color', 'coyote'),
        ));
        
        //Transparent type options
        $transparent_group = coyote_edge_add_admin_group(array(
            'name' => 'transparent_group',
            'title' => esc_html__('Transparent Type', 'coyote'),
            'description' => esc_html__('Setup transparent button type', 'coyote'),
            'parent' => $panel
        ));

        $transparent_row = coyote_edge_add_admin_row(array(
            'name' => 'transparent_row',
            'next' => true,
            'parent' => $transparent_group
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','coyote'),
        ));

        coyote_edge_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_icon_color',
            'default_value' => '',
            'label'         => esc_html__('Icon Color', 'coyote'),
        ));

    }

    add_action('coyote_edge_options_elements_map', 'coyote_edge_button_map');
}