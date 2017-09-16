<?php

if ( ! function_exists('coyote_edge_page_options_map') ) {

    function coyote_edge_page_options_map() {

        coyote_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'coyote'),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = coyote_edge_get_custom_sidebars();

        $panel_sidebar = coyote_edge_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'coyote'),
            )
        );

        coyote_edge_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'coyote'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'coyote'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'coyote'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'coyote'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'coyote'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'coyote'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'coyote'),
            )
        ));


        if(count($custom_sidebars) > 0) {
            coyote_edge_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'coyote'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'coyote'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

    }

    add_action( 'coyote_edge_options_map', 'coyote_edge_page_options_map', 8);

}