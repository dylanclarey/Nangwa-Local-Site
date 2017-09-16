<?php 

if(!function_exists('coyote_edge_accordions_typography_styles')){
	function coyote_edge_accordions_typography_styles(){
		$selector = '.edgtf-accordion-holder .edgtf-title-holder';
		$styles = array();
		
		$font_family = coyote_edge_options()->getOptionValue('accordions_font_family');
		if(coyote_edge_is_font_option_valid($font_family)){
			$styles['font-family'] = coyote_edge_get_font_option_val($font_family);
		}
		
		$text_transform = coyote_edge_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = coyote_edge_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = coyote_edge_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = coyote_edge_filter_px($letter_spacing).'px';
       }

       $font_weight = coyote_edge_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo coyote_edge_dynamic_css($selector, $styles);
	}
	add_action('coyote_edge_style_dynamic', 'coyote_edge_accordions_typography_styles');
}

if(!function_exists('coyote_edge_accordions_initial_color_styles')){

	function coyote_edge_accordions_initial_color_styles(){

		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder';
		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('accordions_title_color')) {
			$styles['color'] = coyote_edge_options()->getOptionValue('accordions_title_color');
		}
		
		if(coyote_edge_options()->getOptionValue('accordions_back_color')) {
			$styles['background-color'] = coyote_edge_options()->getOptionValue('accordions_back_color');
		}

		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_accordions_initial_color_styles');
}

if(!function_exists('coyote_edge_accordions_active_color_styles')){
	
	function coyote_edge_accordions_active_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(coyote_edge_options()->getOptionValue('accordions_title_color_active')) {
			$styles['color'] = coyote_edge_options()->getOptionValue('accordions_title_color_active');
		}
		
		if(coyote_edge_options()->getOptionValue('accordions_back_color_active')) {
			$styles['background-color'] = coyote_edge_options()->getOptionValue('accordions_back_color_active');
		}

		echo coyote_edge_dynamic_css($selector, $styles);
	}

	add_action('coyote_edge_style_dynamic', 'coyote_edge_accordions_active_color_styles');
}