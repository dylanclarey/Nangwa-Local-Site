<?php

if(!function_exists('coyote_edge_map_sidebar_meta_fields')) {

	function coyote_edge_map_sidebar_meta_fields() {
		$coyote_edge_custom_sidebars = coyote_edge_get_custom_sidebars();

		$coyote_edge_sidebar_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page', 'portfolio-item', 'post'),
		        'title' => esc_html__('Sidebar', 'coyote'),
		        'name' => 'sidebar_meta',
		    )
		);

		    coyote_edge_add_meta_box_field(
		        array(
		            'name'        => 'edgtf_sidebar_meta',
		            'type'        => 'select',
		            'label'       => esc_html__('Layout', 'coyote'),
		            'description' => esc_html__('Choose the sidebar layout', 'coyote'),
		            'parent'      => $coyote_edge_sidebar_meta_box,
		            'options'     => array(
								''			=> 'Default',
								'no-sidebar'		=> esc_html__('No Sidebar', 'coyote'),
								'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'coyote'),
								'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'coyote'),
								'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'coyote'),
								'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'coyote'),
							)
		        )
		    );

		if(count($coyote_edge_custom_sidebars) > 0) {
		    coyote_edge_add_meta_box_field(array(
		        'name' => 'edgtf_custom_sidebar_meta',
		        'type' => 'selectblank',
		        'label' => esc_html__('Choose Widget Area in Sidebar','coyote'),
		        'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'coyote'),
		        'parent' => $coyote_edge_sidebar_meta_box,
		        'options' => $coyote_edge_custom_sidebars
		    ));
		}

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_sidebar_meta_fields');
}