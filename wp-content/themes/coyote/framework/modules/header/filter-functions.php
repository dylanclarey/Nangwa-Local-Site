<?php

if(!function_exists('coyote_edge_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function coyote_edge_header_class($classes) {
        $header_type = coyote_edge_get_meta_field_intersect('header_type', coyote_edge_get_page_id());

        $classes[] = 'edgtf-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'coyote_edge_header_class');
}

if(!function_exists('coyote_edge_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function coyote_edge_header_behaviour_class($classes) {

        $classes[] = 'edgtf-'.coyote_edge_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'coyote_edge_header_behaviour_class');
}

if(!function_exists('coyote_edge_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function coyote_edge_menu_item_icon_position_class($classes) {

        if(coyote_edge_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'edgtf-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'coyote_edge_menu_item_icon_position_class');
}

if(!function_exists('coyote_edge_mobile_header_class')) {
    function coyote_edge_mobile_header_class($classes) {
        $classes[] = 'edgtf-default-mobile-header';

        $classes[] = 'edgtf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'coyote_edge_mobile_header_class');
}

if(!function_exists('coyote_edge_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function coyote_edge_menu_dropdown_appearance($classes) {

        if(coyote_edge_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'edgtf-'.coyote_edge_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'coyote_edge_menu_dropdown_appearance');
}

if (!function_exists('coyote_edge_header_skin_class')) {

    function coyote_edge_header_skin_class( $classes ) {

        $id = coyote_edge_get_page_id();

		if(($meta_temp = get_post_meta($id, 'edgtf_header_style_meta', true)) !== ''){
			$classes[] = 'edgtf-' . $meta_temp;
		} else if ( coyote_edge_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'edgtf-' . coyote_edge_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'coyote_edge_header_skin_class');

}

if (!function_exists('coyote_edge_header_scroll_style_class')) {

	function coyote_edge_header_scroll_style_class( $classes ) {

		if (coyote_edge_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes' ) {
			$classes[] = 'edgtf-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'coyote_edge_header_scroll_style_class');

}

if(!function_exists('coyote_edge_header_global_js_var')) {
    function coyote_edge_header_global_js_var($global_variables) {

        $global_variables['edgtfTopBarHeight'] = coyote_edge_get_top_bar_height();
        $global_variables['edgtfStickyHeaderHeight'] = coyote_edge_get_sticky_header_height();
        $global_variables['edgtfStickyHeaderTransparencyHeight'] = coyote_edge_get_sticky_header_height_of_complete_transparency();
        $global_variables['edgtfStickyScrollAmount'] = coyote_edge_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('coyote_edge_js_global_variables', 'coyote_edge_header_global_js_var');
}

if(!function_exists('coyote_edge_header_per_page_js_var')) {
    function coyote_edge_header_per_page_js_var($perPageVars) {

        $perPageVars['edgtfStickyScrollAmount'] = coyote_edge_get_sticky_scroll_amount_per_page();

        return $perPageVars;
    }

    add_filter('coyote_edge_per_page_js_vars', 'coyote_edge_header_per_page_js_var');
}

if(!function_exists('coyote_edge_get_top_bar_styles')) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function coyote_edge_get_top_bar_styles($styles) {
		$id            = coyote_edge_get_page_id();
		$class_prefix  = coyote_edge_get_unique_page_class();
		$top_bar_style = array();

		$top_bar_bg_color     = get_post_meta($id, 'edgtf_top_bar_background_color_meta', true);

		$top_bar_selector = array(
			$class_prefix.' .edgtf-top-bar'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'edgtf_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}

			$top_bar_style['background-color'] = coyote_edge_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

		$styles[] = coyote_edge_dynamic_css($top_bar_selector, $top_bar_style);

		return $styles;
	}

	add_filter('coyote_edge_add_page_custom_style', 'coyote_edge_get_top_bar_styles');
}
if(!function_exists('coyote_edge_top_bar_skin_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function coyote_edge_top_bar_skin_class($classes) {
		$id = coyote_edge_get_page_id();
		$top_bar_skin = get_post_meta($id, 'edgtf_top_bar_skin_meta', true);

		if($top_bar_skin !== '') {
			$classes[] = 'edgtf-top-bar-'.$top_bar_skin;
		}

		return $classes;
	}

	add_filter('body_class', 'coyote_edge_top_bar_skin_class');
}