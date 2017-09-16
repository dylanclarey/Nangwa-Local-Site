<?php

if(!function_exists('coyote_edge_map_portfolio_meta_fields')) {

	function coyote_edge_map_portfolio_meta_fields() {
		global $coyote_edge_Framework;

		$edgt_pages = array();
		$pages = get_pages(); 
		foreach($pages as $page) {
			$edgt_pages[$page->ID] = $page->post_title;
		}

		//Portfolio Images

		$edgtPortfolioImages = new CoyoteEdgeMetaBox("portfolio-item", esc_html__("Portfolio Images (multiple upload)",'coyote'), '', '', 'portfolio_images');
		$coyote_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images",$edgtPortfolioImages);

			$edgt_portfolio_image_gallery = new CoyoteEdgeMultipleImages("edgt_portfolio-image-gallery", esc_html__("Portfolio Images",'coyote'), esc_html__("Choose your portfolio images",'coyote'));
			$edgtPortfolioImages->addChild("edgt_portfolio-image-gallery",$edgt_portfolio_image_gallery);

		//Portfolio Images/Videos 2

		$edgtPortfolioImagesVideos2 = new CoyoteEdgeMetaBox("portfolio-item", esc_html__("Portfolio Images/Videos (single upload)",'coyote'));
		$coyote_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images_videos2",$edgtPortfolioImagesVideos2);

			$edgt_portfolio_images_videos2 = new CoyoteEdgeImagesVideosFramework(esc_html__("Portfolio Images/Videos 2",'coyote'),esc_html__("ThisIsDescription",'coyote'));
			$edgtPortfolioImagesVideos2->addChild("edgt_portfolio_images_videos2",$edgt_portfolio_images_videos2);

		//Portfolio Additional Sidebar Items

		$edgtAdditionalSidebarItems = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('portfolio-item'),
		        'title' => esc_html__('Additional Portfolio Sidebar Items', 'coyote'),
		        'name' => 'portfolio_properties'
		    )
		);

		$edgt_portfolio_properties = coyote_edge_add_options_framework(
		    array(
		        'label' => esc_html__('Portfolio Properties', 'coyote'),
		        'name' => 'edgt_portfolio_properties',
		        'parent' => $edgtAdditionalSidebarItems
		    )
		);

	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_portfolio_meta_fields');
}