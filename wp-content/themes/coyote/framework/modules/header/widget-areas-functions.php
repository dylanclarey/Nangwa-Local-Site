<?php

if(!function_exists('coyote_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function coyote_edge_register_top_header_areas() {
        $top_bar_layout  = coyote_edge_options()->getOptionValue('top_bar_layout');
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'coyote'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'coyote'),
                    'id'            => 'edgtf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'coyote'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'coyote_edge_register_top_header_areas');
}

if(!function_exists('coyote_edge_header_widget_areas')) {
    /**
     * Registers widget areas for header
     */
    function coyote_edge_header_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Header Widget Area', 'coyote'),
                'id'            => 'edgtf-header-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu, or in bottom of vertical menu', 'coyote')
            ));
    }

    add_action('widgets_init', 'coyote_edge_header_widget_areas');
}

if(!function_exists('coyote_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function coyote_edge_register_mobile_header_areas() {
        if(coyote_edge_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Mobile Header Widget Area', 'coyote'),
                'id'            => 'edgtf-mobile-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-mobile-header-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'coyote')
            ));
        }
    }

    add_action('widgets_init', 'coyote_edge_register_mobile_header_areas');
}

if(!function_exists('coyote_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function coyote_edge_register_sticky_header_areas() {
        if(in_array(coyote_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Header Widget Area', 'coyote'),
                'id'            => 'edgtf-sticky-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'coyote')
            ));
        }
    }

    add_action('widgets_init', 'coyote_edge_register_sticky_header_areas');
}