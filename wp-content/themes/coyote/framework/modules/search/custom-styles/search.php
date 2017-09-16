<?php

if (!function_exists('coyote_edge_search_opener_icon_size')) {

	function coyote_edge_search_opener_icon_size()
	{

		if (coyote_edge_options()->getOptionValue('header_search_icon_size')) {
			echo coyote_edge_dynamic_css('.edgtf-search-opener, .edgtf-header-standard .edgtf-search-opener', array(
				'font-size' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_opener_icon_size');

}

if (!function_exists('coyote_edge_search_opener_icon_colors')) {

	function coyote_edge_search_opener_icon_colors()
	{

		if (coyote_edge_options()->getOptionValue('header_search_icon_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-opener', array(
				'color' => coyote_edge_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (coyote_edge_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (coyote_edge_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => coyote_edge_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (coyote_edge_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (coyote_edge_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => coyote_edge_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (coyote_edge_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_opener_icon_colors');

}

if (!function_exists('coyote_edge_search_opener_icon_background_colors')) {

	function coyote_edge_search_opener_icon_background_colors()
	{

		if (coyote_edge_options()->getOptionValue('search_icon_background_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-opener', array(
				'background-color' => coyote_edge_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (coyote_edge_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'background-color' => coyote_edge_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_opener_icon_background_colors');
}

if (!function_exists('coyote_edge_search_opener_text_styles')) {

	function coyote_edge_search_opener_text_styles()
	{
		$text_styles = array();

		if (coyote_edge_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = coyote_edge_options()->getOptionValue('search_icon_text_color');
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = coyote_edge_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = coyote_edge_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = coyote_edge_options()->getOptionValue('search_icon_text_fontweight');
		}		
		if (coyote_edge_options()->getOptionValue('search_icon_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_icon_text_letterspacing')).'px';
		}

		if (!empty($text_styles)) {
			echo coyote_edge_dynamic_css('.edgtf-search-icon-text', $text_styles);
		}
		if (coyote_edge_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-opener:hover .edgtf-search-icon-text', array(
				'color' => coyote_edge_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_opener_text_styles');
}

if (!function_exists('coyote_edge_search_opener_spacing')) {

	function coyote_edge_search_opener_spacing()
	{
		$spacing_styles = array();

		if (coyote_edge_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo coyote_edge_dynamic_css('.edgtf-search-opener', $spacing_styles);
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_opener_spacing');
}

if (!function_exists('coyote_edge_search_bar_background')) {

	function coyote_edge_search_bar_background()
	{

		if (coyote_edge_options()->getOptionValue('search_background_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover, .edgtf-search-fade .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-table, .edgtf-fullscreen-search-overlay', array(
				'background-color' => coyote_edge_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_bar_background');
}

if (!function_exists('coyote_edge_search_text_styles')) {

	function coyote_edge_search_text_styles()
	{
		$text_styles = array();

		if (coyote_edge_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = coyote_edge_options()->getOptionValue('search_text_color');
			$placeholder_webkit = array(
				'.edgtf-search-cover input[type="text"]::-webkit-input-placeholder',
				'.edgtf-form-holder .edgtf-search-field::-webkit-input-placeholder',
				'.edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field::-webkit-input-placeholder'
			);
			$placeholder_moz1 = array(
				'.edgtf-search-cover input[type="text"]:-moz-input-placeholder',
				'.edgtf-form-holder .edgtf-search-field:-moz-input-placeholder',
				'edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field:-moz-input-placeholder'
			);
			$placeholder_moz2 = array(
				'.edgtf-search-cover input[type="text"]::-moz-input-placeholder',
				'.edgtf-form-holder .edgtf-search-field::-moz-input-placeholder',
				'edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field::-moz-input-placeholder'
			);
			$placeholder_ms = array(
				'.edgtf-search-cover input[type="text"]:-ms-input-placeholder',
				'.edgtf-form-holder .edgtf-search-field:-ms-input-placeholder',
				'edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field:-ms-input-placeholder'
			);
			echo coyote_edge_dynamic_css($placeholder_webkit,array('color' => $text_styles['color']));
			echo coyote_edge_dynamic_css($placeholder_moz1,array('color' => $text_styles['color']));
			echo coyote_edge_dynamic_css($placeholder_moz2,array('color' => $text_styles['color']));
			echo coyote_edge_dynamic_css($placeholder_ms,array('color' => $text_styles['color']));
		}
		if (coyote_edge_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (coyote_edge_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = coyote_edge_options()->getOptionValue('search_text_texttransform');
		}
		if (coyote_edge_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (coyote_edge_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = coyote_edge_options()->getOptionValue('search_text_fontstyle');
		}
		if (coyote_edge_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = coyote_edge_options()->getOptionValue('search_text_fontweight');
		}
		if (coyote_edge_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo coyote_edge_dynamic_css('.edgtf-search-cover input[type="text"], .edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field', $text_styles);
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_text_styles');
}

if (!function_exists('coyote_edge_search_icon_styles')) {

	function coyote_edge_search_icon_styles()
	{

		if (coyote_edge_options()->getOptionValue('search_icon_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover input[type="submit"], .edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'color' => coyote_edge_options()->getOptionValue('search_icon_color')
			));
		}
		if (coyote_edge_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover input[type="submit"]:hover, .edgtf-fullscreen-search-holder .edgtf-search-submit:hover', array(
				'color' => coyote_edge_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (coyote_edge_options()->getOptionValue('search_icon_size') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover input[type="submit"], .edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'font-size' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_icon_styles');
}

if (!function_exists('coyote_edge_search_close_icon_styles')) {

	function coyote_edge_search_close_icon_styles()
	{

		if (coyote_edge_options()->getOptionValue('search_close_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close a, .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-close-container a', array(
				'color' => coyote_edge_options()->getOptionValue('search_close_color')
			));
		}
		if (coyote_edge_options()->getOptionValue('search_close_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close a:hover, .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-close-container a:hover', array(
				'color' => coyote_edge_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (coyote_edge_options()->getOptionValue('search_close_size') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close a, .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-close-container a', array(
				'font-size' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_close_icon_styles');
}

if (!function_exists('coyote_edge_search_border_styles')) {

	function coyote_edge_search_border_styles()
	{

		if (coyote_edge_options()->getOptionValue('search_border_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-field-holder', array(
				'border-color' => coyote_edge_options()->getOptionValue('search_border_color')
			));
		}
		if (coyote_edge_options()->getOptionValue('search_border_focus_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line', array(
				'background-color' => coyote_edge_options()->getOptionValue('search_border_focus_color')
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_search_border_styles');
}

if(!function_exists('coyote_edge_fullscreen_search_styles')) {
	function coyote_edge_fullscreen_search_styles() {

		$bg_image = coyote_edge_options()->getOptionValue('fullscreen_search_background_image');
		$selector = '.edgtf-search-fade .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-table';
		$styles   = array();

		if(!$bg_image) {
			return;
		}

		$styles['background-image'] = 'url('.$bg_image.')';

		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_search_styles');
}

?>
