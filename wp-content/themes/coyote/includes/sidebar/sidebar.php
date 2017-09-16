<?php

if(!function_exists('coyote_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function coyote_edge_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'coyote'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'coyote'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="edgtf-widget-title">',
            'after_title' => '</h5>'
        ));

    }

    add_action('widgets_init', 'coyote_edge_register_sidebars');
}

if(!function_exists('coyote_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates CoyoteEdgeSidebar object
     */
    function coyote_edge_add_support_custom_sidebar() {
        add_theme_support('CoyoteEdgeSidebar');
        if (get_theme_support('CoyoteEdgeSidebar')) new CoyoteEdgeSidebar();
    }

    add_action('after_setup_theme', 'coyote_edge_add_support_custom_sidebar');
}
