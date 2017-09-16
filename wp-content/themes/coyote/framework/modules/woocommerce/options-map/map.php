<?php

if ( ! function_exists('coyote_edge_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function coyote_edge_woocommerce_options_map() {

		coyote_edge_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' =>  esc_html__('Woocommerce', 'coyote'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = coyote_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'coyote'),
			)
		);

		coyote_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_list_full_width',
			'type'        	=> 'yesno',
			'label'       	=> esc_html__('Enable Full Width Template', 'coyote'),
			'default_value'	=> 'no',
			'description' 	=> esc_html__('Enabling this option will enable full width template for shop page', 'coyote'),
			'parent'      	=> $panel_product_list,
		));

		coyote_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'coyote'),
			'default_value'	=> 'edgtf-woocommerce-columns-3',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'coyote'),
			'options'		=> array(
				'edgtf-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'coyote'),
				'edgtf-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'coyote'),
			),
			'parent'      	=> $panel_product_list,
		));

		coyote_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'coyote'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'coyote'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		coyote_edge_add_admin_field(array(
			'name'        	=> 'edgtf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'coyote'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = coyote_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product','coyote'),
			)
		);

		coyote_edge_add_admin_field(array(
			'name'        	=> 'edgtf_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag', 'coyote'),
			'default_value'	=> 'h3',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_single_product,
		));

		coyote_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'product_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Product Navigation Links', 'coyote'),
				'parent' => $panel_single_product,
				'description' => esc_html__('Enable navigation links through the products', 'coyote'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_product_single_navigation_container'
				)
			)
		);

		$product_single_navigation_container = coyote_edge_add_admin_container(
			array(
				'name' => 'edgtf_product_single_navigation_container',
				'hidden_property' => 'product_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_single_product,
			)
		);

		coyote_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'product_navigation_through_same_category',
				'default_value' => 'yes',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'coyote'),
				'description' => esc_html__('Limit your navigation only through current category', 'coyote'),
				'parent'      => $product_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'coyote_edge_options_map', 'coyote_edge_woocommerce_options_map', 19);

}