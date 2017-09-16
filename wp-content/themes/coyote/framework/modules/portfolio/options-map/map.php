<?php

if ( ! function_exists('coyote_edge_portfolio_options_map') ) {

	function coyote_edge_portfolio_options_map() {

		coyote_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio','coyote'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = coyote_edge_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single','coyote'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		coyote_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type','coyote'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages','coyote'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images left','coyote'),
				'small-images-right' => esc_html__('Portfolio small images right','coyote'),
				'small-slider' => esc_html__('Portfolio small slider left','coyote'),
				'small-slider-right' => esc_html__('Portfolio small slider right','coyote'),
				'big-images' => esc_html__('Portfolio big images','coyote'),
				'wide-images' => esc_html__('Portfolio wide images left','coyote'),
                'wide-images-right' => esc_html__('Portfolio wide images right','coyote'),
				'big-slider' => esc_html__('Portfolio big slider','coyote'),
                'wide-slider' => esc_html__('Portfolio wide slider','coyote'),
				'small-masonry' => esc_html__('Portfolio small masonry','coyote'),
				'big-masonry' => esc_html__('Portfolio big masonry','coyote'),
				'gallery' => esc_html__('Portfolio gallery','coyote'),
                'split-screen' => esc_html__('Portfolio split screen','coyote'),
                'full-screen-slider' => esc_html__('Portfolio full screen slider','coyote'),
				'custom' => esc_html__('Portfolio custom','coyote'),
				'full-width-custom' => esc_html__('Portfolio full width custom','coyote')
			)
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images','coyote'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.','coyote'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos','coyote'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.','coyote'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_fullscreen_slider_scroll',
			'type'          => 'yesno',
			'label'         => esc_html__('Full Screen Slides Change on Scroll','coyote'),
			'description'   => esc_html__('Enabling this option will enable scroll change for Full Screen Slider template.','coyote'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories','coyote'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.','coyote'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date','coyote'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.','coyote'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_show_related',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Related Projects','coyote'),
			'description'   => esc_html__('Enabling this option will show related projects on your page.','coyote'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text','coyote'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages','coyote'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

        coyote_edge_add_admin_field(array(
            'name'          => 'portfolio_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments','coyote'),
            'description'   => esc_html__('Enabling this option will show comments on your portfolio.','coyote'),
            'parent'        => $panel,
            'default_value' => 'no'
        ));

		coyote_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination','coyote'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.','coyote'),
			'parent'        => $panel,
			'default_value' => 'yes',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = coyote_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		coyote_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category','coyote'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.','coyote'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		coyote_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns','coyote'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type','coyote'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns','coyote'),
				'three-columns' => esc_html__('3 columns','coyote'),
				'four-columns' => esc_html__('4 columns','coyote')
			)
		));

		coyote_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug','coyote'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','coyote'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_portfolio_options_map', 13);

}