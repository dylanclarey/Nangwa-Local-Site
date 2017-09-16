<?php

if(!function_exists('coyote_edge_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function coyote_edge_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'coyote'),
                'mobile-navigation' => esc_html__('Mobile Navigation', 'coyote'),
                'vertical-navigation' => esc_html__('Vertical Navigation', 'coyote'),
            )
        );
    }

    add_action('after_setup_theme', 'coyote_edge_header_register_main_navigation');
}

if(!function_exists('coyote_edge_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
	function coyote_edge_is_top_bar_transparent() {
		$top_bar_enabled = coyote_edge_is_top_bar_enabled();
		$id = coyote_edge_get_page_id();

		if(get_post_meta($id, 'edgtf_top_bar_background_color_meta', true) !== ''){
			$top_bar_bg_color = get_post_meta($id, 'edgtf_top_bar_background_color_meta', true);
			$top_bar_transparency = get_post_meta($id, 'edgtf_top_bar_background_transparency_meta', true);
		} else {
			$top_bar_bg_color = coyote_edge_options()->getOptionValue('top_bar_background_color');
			$top_bar_transparency = coyote_edge_options()->getOptionValue('top_bar_background_transparency');
		}

		if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
			return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
		}

		return false;
	}
}

if(!function_exists('coyote_edge_is_top_bar_completely_transparent')) {
	function coyote_edge_is_top_bar_completely_transparent() {
		$top_bar_enabled = coyote_edge_is_top_bar_enabled();
		$id = coyote_edge_get_page_id();

		if(get_post_meta($id, 'edgtf_top_bar_background_color_meta', true) !== ''){
			$top_bar_bg_color = get_post_meta($id, 'edgtf_top_bar_background_color_meta', true);
			$top_bar_transparency = get_post_meta($id, 'edgtf_top_bar_background_transparency_meta', true);
		} else {
			$top_bar_bg_color = coyote_edge_options()->getOptionValue('top_bar_background_color');
			$top_bar_transparency = coyote_edge_options()->getOptionValue('top_bar_background_transparency');
		}


		if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
			return $top_bar_transparency === '0';
		}

		return false;
	}
}

if(!function_exists('coyote_edge_is_top_bar_enabled')) {
    function coyote_edge_is_top_bar_enabled() {
        $top_bar_enabled = coyote_edge_get_meta_field_intersect('top_bar') == 'yes';

        return $top_bar_enabled;
    }
}

if(!function_exists('coyote_edge_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function coyote_edge_get_top_bar_height() {
        if(coyote_edge_is_top_bar_enabled()) {
            $top_bar_height = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('top_bar_height'));

            return $top_bar_height !== '' ? intval($top_bar_height) : 40;
        }

        return 0;
    }
}

if(!function_exists('coyote_edge_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function coyote_edge_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(coyote_edge_options()->getOptionValue('header_type') !== 'header-vertical' &&
           in_array(coyote_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_header_height = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('coyote_edge_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function coyote_edge_get_sticky_header_height_of_complete_transparency() {

        if(coyote_edge_options()->getOptionValue('header_type') !== 'header-vertical') {
            if(coyote_edge_options()->getOptionValue('sticky_header_transparency') === '0') {
                $stickyHeaderTransparent = coyote_edge_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
                                           coyote_edge_options()->getOptionValue('sticky_header_grid_transparency') === '0';
            } else {
                $stickyHeaderTransparent = coyote_edge_options()->getOptionValue('sticky_header_background_color') !== '' &&
                                           coyote_edge_options()->getOptionValue('sticky_header_transparency') === '0';
            }

            if($stickyHeaderTransparent) {
                return 0;
            } else {
                $sticky_header_height = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('sticky_header_height'));

                return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
            }
        }
        return 0;
    }
}

if(!function_exists('coyote_edge_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function coyote_edge_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(coyote_edge_options()->getOptionValue('header_type') !== 'header-vertical' && in_array(coyote_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;
    }
}

if(!function_exists('coyote_edge_get_sticky_scroll_amount_per_page')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function coyote_edge_get_sticky_scroll_amount_per_page() {
        $post_id =  get_the_ID();
        //sticky menu scroll amount
        if(coyote_edge_options()->getOptionValue('header_type') !== 'header-vertical'  && in_array(coyote_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount_per_page = coyote_edge_filter_px(get_post_meta($post_id, "edgtf_scroll_amount_for_sticky_meta", true));

            return $sticky_scroll_amount_per_page !== '' ? intval($sticky_scroll_amount_per_page) : 0;
        }

        return 0;
    }
}