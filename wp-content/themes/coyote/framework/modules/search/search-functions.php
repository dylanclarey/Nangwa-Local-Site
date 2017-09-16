<?php

if( !function_exists('coyote_edge_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function coyote_edge_search_body_class($classes) {

		if ( is_active_widget( false, false, 'edgt_search_opener' ) ) {

			$classes[] = 'edgtf-' . coyote_edge_options()->getOptionValue('search_type');

			if ( coyote_edge_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'edgtf-' . coyote_edge_options()->getOptionValue('search_animation');

                $is_fullscreen_bg_image_set = coyote_edge_options()->getOptionValue('fullscreen_search_background_image');

                if($is_fullscreen_bg_image_set) {
                    $classes[] = 'edgtf-fullscreen-search-with-bg-image';
                }

			}

		}
		return $classes;

	}

	add_filter('body_class', 'coyote_edge_search_body_class');
}

if ( ! function_exists('coyote_edge_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function coyote_edge_get_search() {

		if ( coyote_edge_active_widget( false, false, 'edgt_search_opener' ) ) {

			$search_type = coyote_edge_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				coyote_edge_set_position_for_covering_search();
				return;
			}

			coyote_edge_load_search_template();

		}
	}

}

if ( ! function_exists('coyote_edge_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function coyote_edge_set_position_for_covering_search() {

		$containing_sidebar = coyote_edge_active_widget( false, false, 'edgt_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'coyote_edge_after_header_top_html_open', 'coyote_edge_load_search_template');
			} else if ( strpos( $sidebar, 'header-widget-area' ) !== false ) {
				add_action( 'coyote_edge_after_header_menu_area_html_open', 'coyote_edge_load_search_template');
			} else if ( strpos( $sidebar, 'fullscreen-menu' ) !== false ) {
                add_action( 'coyote_edge_after_header_menu_area_html_open', 'coyote_edge_load_search_template');
            } else if ( strpos( $sidebar, 'mobile' ) !== false ) {
				add_action( 'coyote_edge_after_mobile_header_html_open', 'coyote_edge_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'coyote_edge_after_header_logo_area_html_open', 'coyote_edge_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'coyote_edge_after_sticky_menu_html_open', 'coyote_edge_load_search_template');
			}

		}

	}

}

if ( ! function_exists('coyote_edge_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function coyote_edge_load_search_template() {
		global $coyote_edge_IconCollections;

		$search_type = coyote_edge_options()->getOptionValue('search_type');

		$search_icon = '';
		$search_icon_close = '';
		if ( coyote_edge_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $coyote_edge_IconCollections->getSearchIcon( coyote_edge_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = $coyote_edge_IconCollections->getSearchClose( coyote_edge_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> coyote_edge_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		coyote_edge_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}