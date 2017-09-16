<?php

if(!function_exists('coyote_edge_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function coyote_edge_vc_grid_elements_enabled() {

		return (coyote_edge_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('coyote_edge_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function coyote_edge_visual_composer_grid_elements() {

		if(!coyote_edge_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'coyote_edge_visual_composer_grid_elements', 12);
}

if(!function_exists('coyote_edge_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function coyote_edge_grid_elements_ajax_disable() {
		global $coyote_edge_options;

		if(coyote_edge_vc_grid_elements_enabled()) {
			$coyote_edge_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'coyote_edge_grid_elements_ajax_disable');
}


if(!function_exists('coyote_edge_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function coyote_edge_get_vc_version() {
		if(coyote_edge_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}