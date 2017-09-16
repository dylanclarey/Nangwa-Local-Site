<?php

if ( ! function_exists('coyote_edge_blog_options_map') ) {

	function coyote_edge_blog_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog','coyote'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = coyote_edge_get_custom_sidebars();

		$panel_blog_lists = coyote_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists','coyote')
			)
		);

        coyote_edge_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'title_on_post_page',
                'default_value' => 'no',
                'label' => esc_html__('Show Title Area on Posts page','coyote'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enabling this option will display title area on WordPress default Posts Page you choose in Settings -> Reading','coyote'),
            )
        );

		coyote_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages','coyote'),
			'description' => esc_html__('Choose a default blog layout','coyote'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard Template','coyote'),
				'split'					=> esc_html__('Blog: Split Template','coyote'),
				'masonry' 				=> esc_html__('Blog: Masonry Template','coyote'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width Template','coyote'),
				'masonry-gallery' 		=> esc_html__('Blog: Masonry Gallery Template','coyote'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post Template','coyote')
			)
		));

		coyote_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar','coyote'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists','coyote'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','coyote'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','coyote'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','coyote'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','coyote'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','coyote')
			)
		));


		if(count($custom_sidebars) > 0) {
			coyote_edge_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','coyote'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"','coyote'),
				'parent' => $panel_blog_lists,
				'options' => coyote_edge_get_custom_sidebars()
			));
		}

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination','coyote'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List','coyote'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_pagination_container'
				)
			)
		);

		$pagination_container = coyote_edge_add_admin_container(
			array(
				'name' => 'edgtf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit','coyote'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry','coyote'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List','coyote'),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard'			=> esc_html__('Standard','coyote'),
				'load-more'			=> esc_html__('Load More','coyote'),
				'infinite-scroll' 	=> esc_html__('Infinite Scroll','coyote'),
			),
			
		));

		coyote_edge_add_admin_field(array(
			'name'        => 'masonry_gallery_pagination',
			'type'        => 'select',
			'default_value'=> 'standard',
			'label'       => esc_html__('Pagination on Masonry Gallery','coyote'),
			'description' => esc_html__('Choose a pagination style for Masonry Gallery Blog List','coyote'),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard'			=> esc_html__('Standard','coyote'),
				'load-more'			=> esc_html__('Load More','coyote'),
				'infinite-scroll' 	=> esc_html__('Infinite Scroll','coyote')
			),
			
		));

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists','coyote'),
				'parent' => $pagination_container,
				'description' => esc_html__('Enable Load More Pagination on other lists','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter','coyote'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		coyote_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt','coyote'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		coyote_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt','coyote'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		coyote_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt','coyote'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','coyote'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = coyote_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single','coyote'),
			)
		);


		coyote_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout','coyote'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages','coyote'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','coyote'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','coyote'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','coyote'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','coyote'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','coyote')
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			coyote_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','coyote'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"','coyote'),
				'parent' => $panel_blog_single,
				'options' => coyote_edge_get_custom_sidebars()
			));
		}

		coyote_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts','coyote'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.','coyote'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links','coyote'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)','coyote'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = coyote_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category','coyote'),
				'description' => esc_html__('Limit your navigation only through current category','coyote'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box','coyote'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages','coyote'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = coyote_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email','coyote'),
				'description' => esc_html__('Enabling this option will show author email','coyote'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_blog_options_map', 12);

}











