<?php

if (!function_exists('coyote_edge_side_area_slide_from_right_type_style')) {

	function coyote_edge_side_area_slide_from_right_type_style()
	{

		if (coyote_edge_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if (coyote_edge_options()->getOptionValue('side_area_width') !== '' && coyote_edge_options()->getOptionValue('side_area_width') >= 30) {
				echo coyote_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-side-menu', array(
					'right' => '-'.coyote_edge_options()->getOptionValue('side_area_width') . '%',
					'width' => coyote_edge_options()->getOptionValue('side_area_width') . '%'
				));
			}

			if (coyote_edge_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo coyote_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-wrapper .edgtf-cover', array(
					'background-color' => coyote_edge_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if (coyote_edge_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo coyote_edge_dynamic_css('.edgtf-side-menu-slide-from-right.edgtf-right-side-menu-opened .edgtf-wrapper .edgtf-cover', array(
					'opacity' => coyote_edge_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_slide_from_right_type_style');

}

if (!function_exists('coyote_edge_side_area_icon_color_styles')) {

	function coyote_edge_side_area_icon_color_styles()
	{

		if (coyote_edge_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener', array(
				'font-size' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_font_size')) . 'px'
			));

			if (coyote_edge_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.edgtf-side-menu-button-opener {
						font-size: 30px;
						}
					}';
			}

		}

		if (coyote_edge_options()->getOptionValue('side_area_icon_color') !== '') {

			echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (coyote_edge_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if (coyote_edge_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));

		}
		if (coyote_edge_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));

		}
		if (coyote_edge_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));

		}
		if (coyote_edge_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo coyote_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover', array(
				'color' => coyote_edge_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_icon_color_styles');

}

if (!function_exists('coyote_edge_side_area_icon_spacing_styles')) {

	function coyote_edge_side_area_icon_spacing_styles()
	{
		$icon_spacing = array();

		if (coyote_edge_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_icon_spacing_styles');
}

if (!function_exists('coyote_edge_side_area_icon_border_styles')) {

	function coyote_edge_side_area_icon_border_styles()
	{
		if (coyote_edge_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if (coyote_edge_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = coyote_edge_options()->getOptionValue('side_area_icon_border_color');
			}

			if (coyote_edge_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_border_width')) . 'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if (coyote_edge_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
			}

			if (coyote_edge_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = coyote_edge_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if (!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition'] = 'all 0.15s ease-out';
				echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener', $side_area_icon_border);
			}

			if (coyote_edge_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
				$side_area_icon_border_hover['border-color'] = coyote_edge_options()->getOptionValue('side_area_icon_border_hover_color');
                echo coyote_edge_dynamic_css('a.edgtf-side-menu-button-opener:hover', $side_area_icon_border_hover);
			}


		}
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_icon_border_styles');

}

if (!function_exists('coyote_edge_side_area_alignment')) {

	function coyote_edge_side_area_alignment()
	{

		if (coyote_edge_options()->getOptionValue('side_area_aligment')) {

			echo coyote_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-side-menu, .edgtf-side-menu-slide-with-content .edgtf-side-menu, .edgtf-side-area-uncovered-from-content .edgtf-side-menu', array(
				'text-align' => coyote_edge_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_alignment');

}

if (!function_exists('coyote_edge_side_area_styles')) {

	function coyote_edge_side_area_styles()
	{

		$side_area_styles = array();

		if (coyote_edge_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = coyote_edge_options()->getOptionValue('side_area_background_color');
		}

		if (coyote_edge_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo coyote_edge_dynamic_css('.edgtf-side-menu, .edgtf-side-area-uncovered-from-content .edgtf-side-menu, .edgtf-side-menu-slide-from-right .edgtf-side-menu', $side_area_styles);
		}

		if (coyote_edge_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo coyote_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu span, .edgtf-side-menu a.edgtf-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (coyote_edge_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu', array(
				'height' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo coyote_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu span, .edgtf-side-menu a.edgtf-close-side-menu i', array(
				'font-size' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_styles');

}

if (!function_exists('coyote_edge_side_area_title_styles')) {

	function coyote_edge_side_area_title_styles()
	{

		$title_styles = array();

		if (coyote_edge_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = coyote_edge_options()->getOptionValue('side_area_title_color');
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = coyote_edge_options()->getOptionValue('side_area_title_texttransform');
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = coyote_edge_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = coyote_edge_options()->getOptionValue('side_area_title_fontweight');
		}

		if (coyote_edge_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo coyote_edge_dynamic_css('.edgtf-side-menu-title h4, .edgtf-side-menu-title h5', $title_styles);

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_title_styles');

}

if (!function_exists('coyote_edge_side_area_text_styles')) {

	function coyote_edge_side_area_text_styles()
	{
		$text_styles = array();

		if (coyote_edge_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = coyote_edge_options()->getOptionValue('side_area_text_fontweight');
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = coyote_edge_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = coyote_edge_options()->getOptionValue('side_area_text_texttransform');
		}

		if (coyote_edge_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = coyote_edge_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo coyote_edge_dynamic_css('.edgtf-side-menu .widget, .edgtf-side-menu .widget.widget_search form, .edgtf-side-menu .widget.widget_search form input[type="text"], .edgtf-side-menu .widget.widget_search form input[type="submit"], .edgtf-side-menu .widget h6, .edgtf-side-menu .widget h6 a, .edgtf-side-menu .widget p, .edgtf-side-menu .widget li a, .edgtf-side-menu .widget.widget_rss li a.rsswidget, .edgtf-side-menu #wp-calendar caption,.edgtf-side-menu .widget li, .edgtf-side-menu h3, .edgtf-side-menu .widget.widget_archive select, .edgtf-side-menu .widget.widget_categories select, .edgtf-side-menu .widget.widget_text select, .edgtf-side-menu .widget.widget_search form input[type="submit"], .edgtf-side-menu #wp-calendar th, .edgtf-side-menu #wp-calendar td', $text_styles);

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_text_styles');

}

if (!function_exists('coyote_edge_side_area_link_styles')) {

	function coyote_edge_side_area_link_styles()
	{
		$link_styles = array();

		if (coyote_edge_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = coyote_edge_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = coyote_edge_options()->getOptionValue('sidearea_link_font_style');
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = coyote_edge_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = coyote_edge_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo coyote_edge_dynamic_css('.edgtf-side-menu .widget li a, .edgtf-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if (coyote_edge_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo coyote_edge_dynamic_css('.edgtf-side-menu .widget a:hover, .edgtf-side-menu .widget.widget_archive li:hover, .edgtf-side-menu .widget.widget_categories li:hover,  .edgtf-side-menu .widget_rss li a.rsswidget:hover', array(
				'color' => coyote_edge_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_link_styles');

}

if (!function_exists('coyote_edge_side_area_border_styles')) {

	function coyote_edge_side_area_border_styles()
	{

		if (coyote_edge_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if (coyote_edge_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo coyote_edge_dynamic_css('.edgtf-side-menu .widget', array(
					'border-bottom' => '1px solid ' . coyote_edge_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom' => '10px',
					'padding-bottom' => '10px',
				));

			}

		}

	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_side_area_border_styles');

}