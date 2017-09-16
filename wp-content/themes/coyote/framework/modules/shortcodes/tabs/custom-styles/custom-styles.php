<?php
if(!function_exists('coyote_edge_tabs_typography_styles')){
	function coyote_edge_tabs_typography_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = coyote_edge_options()->getOptionValue('tabs_font_family');
		
		if(coyote_edge_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = coyote_edge_get_font_option_val($font_family);
		}
		
		$text_transform = coyote_edge_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = coyote_edge_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = coyote_edge_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = coyote_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = coyote_edge_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo coyote_edge_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('coyote_edge_style_dynamic', 'coyote_edge_tabs_typography_styles');
}

if(!function_exists('coyote_edge_tabs_inital_color_styles')){

	function coyote_edge_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li a';
		$border_selector = '.edgtf-tabs.edgtf-horizontal-tab .edgtf-tab-container,.edgtf-tabs.edgtf-vertical-tab .edgtf-tabs-nav li a,.edgtf-tabs.edgtf-horizontal-tab .edgtf-tabs-nav li a';

		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('tabs_color')) {
            $styles['color'] = coyote_edge_options()->getOptionValue('tabs_color');
        }

		if(coyote_edge_options()->getOptionValue('tabs_border_color')) {
            echo coyote_edge_dynamic_css($border_selector,array(
            	'border-color' => coyote_edge_options()->getOptionValue('tabs_border_color')
            	)
            );
        }
		
		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_tabs_inital_color_styles');
}

if(!function_exists('coyote_edge_tabs_active_color_styles')){

	function coyote_edge_tabs_active_color_styles(){
		$selector = array(
			'.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li.ui-state-active a',
			'.edgtf-tabs:not(.edgtf-tab-boxed) .edgtf-tabs-nav li.ui-state-hover a'
		);
		$border_selector = array(
			'.edgtf-tabs .edgtf-tabs-nav li.ui-state-active:after',
			'.edgtf-tabs .edgtf-tabs-nav li.ui-state-hover:after'
		);

		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = coyote_edge_options()->getOptionValue('tabs_color_active');
        }

		if(coyote_edge_options()->getOptionValue('tabs_border_color_active')) {
            echo coyote_edge_dynamic_css($border_selector,array(
            	'background-color' => coyote_edge_options()->getOptionValue('tabs_border_color_active')
            	)
            );
        }
		
		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_tabs_active_color_styles');
}

if(!function_exists('coyote_edge_boxed_tabs_inital_color_styles')){

	function coyote_edge_boxed_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li a';
		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('boxed_tabs_color')) {
            $styles['color'] = coyote_edge_options()->getOptionValue('boxed_tabs_color');
        }

		if(coyote_edge_options()->getOptionValue('boxed_tabs_back_color')) {
            $styles['background-color'] = coyote_edge_options()->getOptionValue('boxed_tabs_back_color');
        }
		
		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_boxed_tabs_inital_color_styles');
}
if(!function_exists('coyote_edge_tabs_boxed_active_color_styles')){

	function coyote_edge_tabs_boxed_active_color_styles(){
		$selector = array(
			'.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-active a',
			'.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-hover a'
		);

		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('boxed_tabs_color_active')) {
            $styles['color'] = coyote_edge_options()->getOptionValue('boxed_tabs_color_active');
        }

		if(coyote_edge_options()->getOptionValue('boxed_tabs_back_color_active')) {
            $styles['background-color'] = coyote_edge_options()->getOptionValue('boxed_tabs_back_color_active');
        }
		
		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_tabs_boxed_active_color_styles');
}