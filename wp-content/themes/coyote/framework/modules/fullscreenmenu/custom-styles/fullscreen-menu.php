<?php

if (!function_exists('coyote_edge_fullscreen_menu_general_styles')) {

	function coyote_edge_fullscreen_menu_general_styles()
	{
		$fullscreen_menu_background_color = '';
		if (coyote_edge_options()->getOptionValue('fullscreen_alignment') !== '') {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu ul li, .edgtf-fullscreen-above-menu-widget-holder, .edgtf-fullscreen-below-menu-widget-holder', array(
				'text-align' => coyote_edge_options()->getOptionValue('fullscreen_alignment')
			));
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
			$fullscreen_menu_background_color = coyote_edge_hex2rgb(coyote_edge_options()->getOptionValue('fullscreen_menu_background_color'));
			if (coyote_edge_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
				$fullscreen_menu_background_transparency = coyote_edge_options()->getOptionValue('fullscreen_menu_background_transparency');
			} else {
				$fullscreen_menu_background_transparency = 0.9;
			}
		}

		if ($fullscreen_menu_background_color !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-holder', array(
				'background-color' => 'rgba(' . $fullscreen_menu_background_color[0] . ',' . $fullscreen_menu_background_color[1] . ',' . $fullscreen_menu_background_color[2] . ',' . $fullscreen_menu_background_transparency . ')'
			));
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-holder', array(
				'background-image' => 'url(' . coyote_edge_options()->getOptionValue('fullscreen_menu_background_image') . ')',
				'background-position' => 'center 0',
				'background-repeat' => 'no-repeat'
			));
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-holder', array(
				'background-image' => 'url(' . coyote_edge_options()->getOptionValue('fullscreen_menu_pattern_image') . ')',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_general_styles');

}

if (!function_exists('coyote_edge_fullscreen_menu_first_level_style')) {

	function coyote_edge_fullscreen_menu_first_level_style()
	{

		$first_menu_style = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_color') !== '') {
			$first_menu_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_color');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
			$first_menu_style['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts')) . ',sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
			$first_menu_style['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
			$first_menu_style['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
			$first_menu_style['font-style'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
			$first_menu_style['font-weight'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
			$first_menu_style['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
			$first_menu_style['text-transform'] = coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform');
		}

		if (!empty($first_menu_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu > ul > li > a, nav.edgtf-fullscreen-menu > ul > li > h6', $first_menu_style);
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener.opened .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_color')
			));
		}

		$first_menu_hover_style = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
			$first_menu_hover_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
			$first_menu_hover_style['background-color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color');
		}

		if (!empty($first_menu_hover_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu > ul > li > a:hover, nav.edgtf-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
		}

		$first_menu_active_style = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
			$first_menu_active_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_active_color');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
			$first_menu_active_style['background-color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_active_background_color');
		}

		if (!empty($first_menu_active_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_first_level_style');

}

if (!function_exists('coyote_edge_fullscreen_menu_second_level_style')) {

	function coyote_edge_fullscreen_menu_second_level_style()
	{
		$second_menu_style = array();
		if (coyote_edge_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
			$second_menu_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_color_2nd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
			$second_menu_style['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')) . ',sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
			$second_menu_style['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize_2nd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
			$second_menu_style['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight_2nd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
			$second_menu_style['font-style'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
			$second_menu_style['font-weight'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
			$second_menu_style['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
			$second_menu_style['text-transform'] = coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
		}

		if (!empty($second_menu_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu ul li ul li a, nav.edgtf-fullscreen-menu ul li ul li h6', $second_menu_style);
		}

		$second_menu_hover_style = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
			$second_menu_hover_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
			$second_menu_hover_style['background-color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
		}

		if (!empty($second_menu_hover_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu ul li ul li a:hover, nav.edgtf-fullscreen-menu ul li ul li h6:hover', $second_menu_hover_style);
		}
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_second_level_style');

}

if (!function_exists('coyote_edge_fullscreen_menu_third_level_style')) {

	function coyote_edge_fullscreen_menu_third_level_style()
	{
		$third_menu_style = array();
		if (coyote_edge_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
			$third_menu_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_color_3rd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
			$third_menu_style['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')) . ',sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
			$third_menu_style['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_fontsize_3rd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
			$third_menu_style['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_lineheight_3rd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
			$third_menu_style['font-style'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
			$third_menu_style['font-weight'] = coyote_edge_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
			$third_menu_style['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
			$third_menu_style['text-transform'] = coyote_edge_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
		}

		if (!empty($third_menu_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu ul li ul li ul li a', $third_menu_style);
		}

		$third_menu_hover_style = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
			$third_menu_hover_style['color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
			$third_menu_hover_style['background-color'] = coyote_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
		}

		if (!empty($third_menu_hover_style)) {
			echo coyote_edge_dynamic_css('nav.edgtf-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
		}
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_third_level_style');

}

if (!function_exists('coyote_edge_fullscreen_menu_icon_styles')) {

	function coyote_edge_fullscreen_menu_icon_styles()
	{

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_icon_color')
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener:hover .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_icon_hover_color')
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon,
			.edgtf-light-header .edgtf-top-bar .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_light_icon_color') . ' !important'
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon,
			.edgtf-light-header .edgtf-top-bar .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') . ' !important'
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon,
			.edgtf-dark-header .edgtf-top-bar .edgtf-fullscreen-menu-opener:not(.opened) .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_dark_icon_color') . ' !important'
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon,
			.edgtf-dark-header .edgtf-top-bar .edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-fullscreen-icon', array(
				'color' => coyote_edge_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') . ' !important'
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_background_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener', array(
				'-webkit-backface-visibility' => 'hidden',
				'display' => 'inline-block'
			));
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener.normal', array(
				'padding' => '10px 15px',
			));
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener.medium', array(
				'padding' => '10px 13px',
			));
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener.large', array(
				'padding' => '15px',
			));
			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener:not(.opened)', array(
				'background-color' => coyote_edge_options()->getOptionValue('fullscreen_menu_icon_background_color')
			));

		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_background_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-fullscreen-menu-opener.normal:not(.opened):hover, .edgtf-fullscreen-menu-opener.medium:not(.opened):hover, .edgtf-fullscreen-menu-opener.large:not(.opened):hover', array(
				'background-color' => coyote_edge_options()->getOptionValue('fullscreen_menu_icon_background_hover_color')
			));

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_icon_styles');

}

if (!function_exists('coyote_edge_fullscreen_menu_icon_spacing')) {

	function coyote_edge_fullscreen_menu_icon_spacing()
	{

		$fullscreen_menu_icon_spacing = array();

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
			$fullscreen_menu_icon_spacing['padding-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_icon_padding_left')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
			$fullscreen_menu_icon_spacing['padding-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_icon_padding_right')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
			$fullscreen_menu_icon_spacing['margin-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_icon_margin_left')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
			$fullscreen_menu_icon_spacing['margin-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('fullscreen_menu_icon_margin_right')) . 'px';
		}

		if (!empty($fullscreen_menu_icon_spacing)) {
			echo coyote_edge_dynamic_css('a.edgtf-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_fullscreen_menu_icon_spacing');

}