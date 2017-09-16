<?php

if(!function_exists('coyote_edge_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function coyote_edge_button_typography_styles() {
        $selector = '.edgtf-btn';
        $styles = array();

        $font_family = coyote_edge_options()->getOptionValue('button_font_family');
        if(coyote_edge_is_font_option_valid($font_family)) {
            $styles['font-family'] = coyote_edge_get_font_option_val($font_family);
        }

        $text_transform = coyote_edge_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = coyote_edge_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = coyote_edge_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = coyote_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = coyote_edge_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo coyote_edge_dynamic_css($selector, $styles);
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_button_typography_styles');
}

if(!function_exists('coyote_edge_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function coyote_edge_button_solid_styles() {
        //solid styles
        $solid_selector = '.edgtf-btn.edgtf-btn-solid';
        $solid_icon_selector = '.edgtf-btn.edgtf-btn-solid .edgtf-btn-icon-holder';
        $solid_styles = array();
        $solid_icon_styles = array();

        if(coyote_edge_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = coyote_edge_options()->getOptionValue('btn_solid_text_color');
        }

        if(coyote_edge_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = coyote_edge_options()->getOptionValue('btn_solid_border_color');
        }

        if(coyote_edge_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = coyote_edge_options()->getOptionValue('btn_solid_bg_color');
        }

        //solid hover styles
        if(coyote_edge_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-custom-hover-color):hover',
                array('color' => coyote_edge_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-custom-hover-bg):hover',
                array('background-color' => coyote_edge_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-custom-border-hover):hover',
                array('border-color' => coyote_edge_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_solid_icon_color')) {
            $solid_icon_styles['color'] = coyote_edge_options()->getOptionValue('btn_solid_icon_color');
        }

        echo coyote_edge_dynamic_css($solid_selector, $solid_styles);
        echo coyote_edge_dynamic_css($solid_icon_selector, $solid_icon_styles);
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_button_solid_styles');
}


if(!function_exists('coyote_edge_button_outline_styles')) {
    /**
     * Generate styles for outline type buttons
     */
    function coyote_edge_button_outline_styles() {
        //outline styles
        $outline_selector = '.edgtf-btn.edgtf-btn-outline';
        $outline_icon_selector = '.edgtf-btn.edgtf-btn-outline .edgtf-btn-icon-holder';
        $outline_styles = array();
        $outline_icon_styles = array();

        if(coyote_edge_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = coyote_edge_options()->getOptionValue('btn_outline_text_color');
        }

        if(coyote_edge_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = coyote_edge_options()->getOptionValue('btn_outline_border_color');
        }

        //outline hover styles
        if(coyote_edge_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-color):hover',
                array('color' => coyote_edge_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-bg):hover',
                array('background-color' => coyote_edge_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-border-hover):hover',
                array('border-color' => coyote_edge_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_outline_icon_color')) {
            $outline_icon_styles['color'] = coyote_edge_options()->getOptionValue('btn_outline_icon_color');
        }

        echo coyote_edge_dynamic_css($outline_selector, $outline_styles);
        echo coyote_edge_dynamic_css($outline_icon_selector, $outline_icon_styles);
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_button_outline_styles');
}

if(!function_exists('coyote_edge_button_transparent_styles')) {
    /**
     * Generate styles for transparent type buttons
     */
    function coyote_edge_button_transparent_styles() {

        if(coyote_edge_options()->getOptionValue('btn_transparent_text_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-transparent',
                array('color' => coyote_edge_options()->getOptionValue('btn_transparent_text_color'))
            );
        }

        //solid hover styles
        if(coyote_edge_options()->getOptionValue('btn_transparent_hover_text_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-transparent:not(.edgtf-btn-custom-hover-color):hover',
                array('color' => coyote_edge_options()->getOptionValue('btn_transparent_hover_text_color').'!important')
            );
        }

        if(coyote_edge_options()->getOptionValue('btn_transparent_icon_color')) {
            echo coyote_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-transparent .edgtf-btn-icon-holder',
                array('color' => coyote_edge_options()->getOptionValue('btn_transparent_icon_color'))
            );
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_button_transparent_styles');
}