<?php

if(!function_exists('coyote_edge_map_portfolio_settings')) {
    function coyote_edge_map_portfolio_settings() {
        $meta_box = coyote_edge_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'coyote'),
            'name'  => 'portfolio_settings_meta_box',
        ));

        coyote_edge_add_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       =>esc_html__('Portfolio Type', 'coyote'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'coyote'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                   => esc_html__('Default','coyote'),
                'small-images'       => esc_html__('Portfolio small images left','coyote'),
                'small-images-right' => esc_html__('Portfolio small images right','coyote'),
                'small-slider'       => esc_html__('Portfolio small slider left','coyote'),
                'small-slider-right' => esc_html__('Portfolio small slider right','coyote'),
                'big-images'         => esc_html__('Portfolio big images','coyote'),
                'wide-images'        => esc_html__('Portfolio wide images left','coyote'),
                'wide-images-right'  => esc_html__('Portfolio wide images right','coyote'),
                'big-slider'         => esc_html__('Portfolio big slider','coyote'),
                'wide-slider'        => esc_html__('Portfolio wide slider','coyote'),
                'gallery'            => esc_html__('Portfolio gallery','coyote'),
                'small-masonry'      => esc_html__('Portfolio small masonry','coyote'),
                'big-masonry'        => esc_html__('Portfolio big masonry','coyote'),
                'split-screen'       => esc_html__('Portfolio split screen','coyote'),
                'full-screen-slider' => esc_html__('Portfolio full screen slider','coyote'),
                'custom'             => esc_html__('Portfolio custom','coyote'),
                'full-width-custom'  => esc_html__('Portfolio full width custom','coyote')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        coyote_edge_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'coyote'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'coyote'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        coyote_edge_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'coyote'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'coyote'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        coyote_edge_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'coyote'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'coyote'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default','coyote'),
                'large_width'        => esc_html__('Large width','coyote'),
                'large_height'       => esc_html__('Large height','coyote'),
                'large_width_height' => esc_html__('Large width/height','coyote'),
            )
        ));
    }

    add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_portfolio_settings');
}