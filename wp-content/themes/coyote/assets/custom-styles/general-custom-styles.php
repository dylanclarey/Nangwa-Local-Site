<?php
if(!function_exists('coyote_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function coyote_edge_design_styles() {

        $preload_background_styles = array();

        if(coyote_edge_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.coyote_edge_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(EDGE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo coyote_edge_dynamic_css('.edgtf-preload-background', $preload_background_styles);

		if (coyote_edge_options()->getOptionValue('google_fonts')){
			$font_family = coyote_edge_options()->getOptionValue('google_fonts');
			if(coyote_edge_is_font_option_valid($font_family)) {
				echo coyote_edge_dynamic_css('body', array('font-family' => coyote_edge_get_font_option_val($font_family)));
			}
		}

        if(coyote_edge_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.edgtf-comment-holder .edgtf-comment-text .comment-edit-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .comment-reply-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .replay:hover',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.edgtf-pagination-holder .edgtf-pagination li a',
                '.edgtf-pagination-holder .edgtf-pagination li.active span',
                '.slick-slider .edgtf-slick-numbers li.slick-active',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-button button:before',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-time',
                '.edgtf-mobile-header .edgtf-mobile-nav a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav h4:hover',
                '.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover',
                'footer .widget.widget_calendar #today',
                '.edgtf-title .edgtf-title-holder .edgtf-breadcrumbs .edgtf-current',
                '.edgtf-side-menu .widget_calendar a',
                '.edgtf-search-cover .edgtf-search-close a:hover',
                '.edgtf-fullscreen-search-holder .edgtf-search-submit:hover',
                '.edgtf-portfolio-single-holder.full-screen-slider .edgtf-portfolio-slider-content .edgtf-portfolio-title',
                '.edgtf-portfolio-single-holder .edgtf-portfolio-related-holder .edgtf-portfolio-back-btn',
                '.edgtf-team .edgtf-team-position',
                '.edgtf-team .edgtf-team-social .edgtf-icon-shortcode',
                '.edgtf-counter-holder .edgtf-counter-icon .edgtf-icon-shortcode',
                '.edgtf-custom-font-holder .edgtf-highlighted',
                '.edgtf-message .edgtf-message-inner a.edgtf-close',
                '.edgtf-ordered-list ol>li:before',
                '.edgtf-unordered-list ul>li:before',
                '.edgtf-testimonials .edgtf-slick-next',
                '.edgtf-testimonials .edgtf-slick-prev',
                '.edgtf-price-table .edgtf-price-table-inner ul li.edgtf-table-prices .edgtf-price-holder',
                '.edgtf-price-table .edgtf-price-table-inner ul li.edgtf-table-title .edgtf-title-content',
                '.edgtf-process-holder .edgtf-process-item-holder.edgtf-process-background-image .edgtf-pi-number-holder .edgtf-pi-number',
                '.edgtf-tabs .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-blog-list-holder .edgtf-item-info-section>div a:hover',
                '.edgtf-blog-list-holder .edgtf-post-info-bottom .edgtf-post-info-bottom-left>div a:hover',
                '.edgtf-blog-list-holder .edgtf-post-info-bottom .edgtf-post-info-bottom-right>div a:hover',
                '.edgtf-blog-slider .edgtf-item-info-section>div a',
                '.edgtf-blog-slider .edgtf-item-info-section>div a:hover',
                '.edgtf-blog-slider .edgtf-item-info-section>div',
                '.edgtf-btn.edgtf-btn-transparent .edgtf-btn-icon-holder',
                '.edgtf-carousel-holder .edgtf-slick-next',
                '.edgtf-carousel-holder .edgtf-slick-prev',
                '.edgtf-video-button-play .edgtf-video-button-wrapper',
                '.edgtf-dropcaps',
                '.edgtf-iwt .edgtf-icon-shortcode',
                '.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li.active span',
                '.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li.current span',
                '.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li:hover span',
                '.edgtf-portfolio-filter-holder .edgtf-portfolio-filter-holder-inner ul li span',
                '.edgtf-social-share-holder.edgtf-list li a',
                '.edgtf-section-subtitle',
                '.edgtf-twitter-feed .edgtf-tweet-info-holder .edgtf-tweeter-username',
                '.edgtf-twitter-feed.edgtf-twt-skin-dark',
                '.edgtf-twitter-feed.edgtf-twt-skin-dark .edgtf-tweeter-name',
                '.edgtf-twitter-feed.edgtf-twt-skin-dark a',
                '.edgtf-image-with-text span.edgtf-iwt-title',
                '.edgtf-banner:hover .edgtf-banner-info .edgtf-banner-title',
                '.widget a',
                '.widget.widget_recent_comments ul li',
                '.widget .tagcloud a',
                '.widget.widget_calendar #next a',
                '.widget.widget_calendar #prev a',
                '.widget.widget_calendar td a',
                '.edgtf-sidebar .widget.widget_categories li',
                '.edgtf-sidebar .widget.widget_recent_entries ul li a',
                '.edgtf-sidebar .widget.widget_recent_entries ul li a:before',
                '.edgtf-sidebar .widget.widget_rss .edgtf-widget-title a',
                '.edgtf-sidebar .widget.widget_tag_cloud a',
                '.edgtf-sidebar .widget.widget_archive li',
                '.edgtf-twitter-widget .edgtf-tweet-icon',
                '.edgtf-woocommerce-page .edgtf-product-cat a:hover',
                '.woocommerce .edgtf-product-cat a:hover',
                '.woocommerce-pagination .page-numbers',
                '.edgtf-single-product-related-products-holder .products .edgtf-related-glob',
                '.edgtf-single-product-wrapper-top .out-of-stock',
                '.edgtf-single-product-summary .product_meta>span a:hover',
                '.summary .group_table td.label a',
                '.woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active a',
                '.woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link:hover a',
                '.edgtf-shopping-cart-outer .edgtf-shopping-cart-header .edgtf-cart-icon',
                '.edgtf-shopping-cart-outer .edgtf-cart-amount',
                '.edgtf-shopping-cart-dropdown ul li a:hover',
                '.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .edgtf-item-left:hover',
                '.woocommerce.widget.widget_product_categories li',
                '.woocommerce.widget.widget_product_categories li a:hover',
                '.product_list_widget li .product-title',
                '.widget_price_filter .price_slider_amount .price_label',
            );

            $background_color_selector = array(
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1',
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes>div',
                '.edgtf-st-loader .wave>div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .container1>div',
                '.edgtf-st-loader .five_rotating_circles .container2>div',
                '.edgtf-st-loader .five_rotating_circles .container3>div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .fussion .ball-1',
                '.edgtf-st-loader .fussion .ball-2',
                '.edgtf-st-loader .fussion .ball-3',
                '.edgtf-st-loader .fussion .ball-4',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.slick-slider .edgtf-slick-dots li.slick-active',
                '.flex-control-paging.flex-control-nav li a .flex-active',
                '.flex-control-paging.flex-control-nav li a:hover',
                '#edgtf-back-to-top>span',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-time-rail .mejs-time-current',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-time-rail .mejs-time-loaded',
                '.edgtf-self-hosted-video-holder .edgtf-video-wrap .mejs-inner>.mejs-controls .mejs-time-rail .mejs-time-total',
                '.edgtf-top-bar',
                '.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:before',
                '.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:after',
                'footer',
                'footer .edgtf-footer-ingrid-border-holder-outer',
                '.edgtf-side-menu',
                '.edgtf-icon-shortcode.circle',
                '.edgtf-icon-shortcode.square',
                '.edgtf-icon-shortcode.circle:hover',
                '.edgtf-icon-shortcode.square:hover',
                '.edgtf-message',
                '.edgtf-progress-bar .edgtf-progress-content-outer .edgtf-progress-content',
                '.edgtf-pie-chart-doughnut-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
                '.edgtf-pie-chart-pie-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
                '.edgtf-process-holder .edgtf-process-item-holder .edgtf-pi-number-holder',
                '.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tab-boxed .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tab-boxed.edgtf-style-grey .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tab-boxed.edgtf-style-grey .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tab-boxed.edgtf-style-white .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tab-boxed.edgtf-style-white .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-horizontal-tab:not(.edgtf-tab-boxed) .edgtf-tabs-line',
                '.edgtf-accordion-holder.edgtf-style-grey .edgtf-title-holder.ui-state-active',
                '.edgtf-accordion-holder.edgtf-style-grey .edgtf-title-holder.ui-state-hover',
                'input[type=submit].edgtf-btn',
                '.edgtf-video-button-play .edgtf-video-button-wrapper:hover',
                '.edgtf-dropcaps.edgtf-circle',
                '.edgtf-dropcaps.edgtf-square',
                '.widget .tagcloud a:hover',
                '.edgtf-woocommerce-page .product .edgtf-product-badge',
                '.woocommerce .product .edgtf-product-badge',
                '.woocommerce-account input[type=submit]',
                '.woocommerce-checkout input[type=submit]',
                '.woocommerce-account input[type=submit]:hover',
                '.woocommerce-checkout input[type=submit]:hover',
                '.woocommerce.widget button',
                '.woocommerce.widget input[type=submit]',
                '.woocommerce.widget button:hover',
                '.woocommerce.widget input[type=submit]:hover',
                '.widget_price_filter .ui-slider .ui-slider-handle',
            );

            $background_color_important_selector = array(
                '.comment-respond input[type=submit].edgtf-btn:not(.edgtf-btn-hover-shuffle):hover',
            );


            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.slick-slider .edgtf-slick-dots li',
                '.flex-control-paging.flex-control-nav li a',
                '.edgtf-team.main-info-on-hover .edgtf-separator',
                '.edgtf-message',
                '.widget .tagcloud a:hover',
                '.woocommerce-account input[type=submit]',
                '.woocommerce-checkout input[type=submit]',
                '.woocommerce-account input[type=submit]:hover',
                '.woocommerce-checkout input[type=submit]:hover',
                '.woocommerce.widget button',
                '.woocommerce.widget input[type=submit]',
                '.woocommerce.widget button:hover',
                '.woocommerce.widget input[type=submit]:hover',
            );

            echo coyote_edge_dynamic_css($color_selector, array('color' => coyote_edge_options()->getOptionValue('first_color')));
            echo coyote_edge_dynamic_css('::selection', array('background' => coyote_edge_options()->getOptionValue('first_color')));
            echo coyote_edge_dynamic_css('::-moz-selection', array('background' => coyote_edge_options()->getOptionValue('first_color')));
            echo coyote_edge_dynamic_css($background_color_selector, array('background-color' => coyote_edge_options()->getOptionValue('first_color')));
            echo coyote_edge_dynamic_css($background_color_important_selector, array('background-color' => coyote_edge_options()->getOptionValue('first_color').'!important'));
            echo coyote_edge_dynamic_css($border_color_selector, array('border-color' => coyote_edge_options()->getOptionValue('first_color')));
        }

		if (coyote_edge_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.edgtf-wrapper-inner',
				'.edgtf-content',
				'.edgtf-content-inner > .edgtf-container'
			);
			echo coyote_edge_dynamic_css($background_color_selector, array('background-color' => coyote_edge_options()->getOptionValue('page_background_color')));
		}

		if (coyote_edge_options()->getOptionValue('selection_color')) {
			echo coyote_edge_dynamic_css('::selection', array('background' => coyote_edge_options()->getOptionValue('selection_color')));
			echo coyote_edge_dynamic_css('::-moz-selection', array('background' => coyote_edge_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (coyote_edge_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = coyote_edge_options()->getOptionValue('page_background_color_in_box');
		}

		if (coyote_edge_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(coyote_edge_options()->getOptionValue('boxed_background_image')).')';
			if(coyote_edge_options()->getOptionValue('boxed_background_image_repeating') == 'yes') {
				$boxed_background_style['background-position'] = '0px 0px';
				$boxed_background_style['background-repeat'] = 'repeat';
			} else {
				$boxed_background_style['background-position'] = 'center 0px';
				$boxed_background_style['background-repeat'] = 'no-repeat';
			}
		}


		if (coyote_edge_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (coyote_edge_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo coyote_edge_dynamic_css('.edgtf-boxed .edgtf-wrapper', $boxed_background_style);
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_design_styles');
}

if (!function_exists('coyote_edge_h1_styles')) {

    function coyote_edge_h1_styles() {

        $h1_styles = array();

        if(coyote_edge_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = coyote_edge_options()->getOptionValue('h1_color');
        }
        if(coyote_edge_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h1_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = coyote_edge_options()->getOptionValue('h1_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = coyote_edge_options()->getOptionValue('h1_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = coyote_edge_options()->getOptionValue('h1_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo coyote_edge_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h1_styles');
}

if (!function_exists('coyote_edge_h2_styles')) {

    function coyote_edge_h2_styles() {

        $h2_styles = array();

        if(coyote_edge_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = coyote_edge_options()->getOptionValue('h2_color');
        }
        if(coyote_edge_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h2_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = coyote_edge_options()->getOptionValue('h2_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = coyote_edge_options()->getOptionValue('h2_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = coyote_edge_options()->getOptionValue('h2_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo coyote_edge_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h2_styles');
}

if (!function_exists('coyote_edge_h3_styles')) {

    function coyote_edge_h3_styles() {

        $h3_styles = array();

        if(coyote_edge_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = coyote_edge_options()->getOptionValue('h3_color');
        }
        if(coyote_edge_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h3_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = coyote_edge_options()->getOptionValue('h3_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = coyote_edge_options()->getOptionValue('h3_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = coyote_edge_options()->getOptionValue('h3_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo coyote_edge_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h3_styles');
}

if (!function_exists('coyote_edge_h4_styles')) {

    function coyote_edge_h4_styles() {

        $h4_styles = array();

        if(coyote_edge_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = coyote_edge_options()->getOptionValue('h4_color');
        }
        if(coyote_edge_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h4_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = coyote_edge_options()->getOptionValue('h4_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = coyote_edge_options()->getOptionValue('h4_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = coyote_edge_options()->getOptionValue('h4_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo coyote_edge_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h4_styles');
}

if (!function_exists('coyote_edge_h5_styles')) {

    function coyote_edge_h5_styles() {

        $h5_styles = array();

        if(coyote_edge_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = coyote_edge_options()->getOptionValue('h5_color');
        }
        if(coyote_edge_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h5_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = coyote_edge_options()->getOptionValue('h5_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = coyote_edge_options()->getOptionValue('h5_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = coyote_edge_options()->getOptionValue('h5_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5',
            '.woocommerce .edgtf-product-list-title-holder h5.edgtf-product-list-product-title',
			'.edgtf-woocommerce-page .edgtf-product-list-title-holder h5.edgtf-product-list-product-title'
        );

        if (!empty($h5_styles)) {
            echo coyote_edge_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h5_styles');
}

if (!function_exists('coyote_edge_h6_styles')) {

    function coyote_edge_h6_styles() {

        $h6_styles = array();

        if(coyote_edge_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = coyote_edge_options()->getOptionValue('h6_color');
        }
        if(coyote_edge_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('h6_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = coyote_edge_options()->getOptionValue('h6_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = coyote_edge_options()->getOptionValue('h6_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = coyote_edge_options()->getOptionValue('h6_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo coyote_edge_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_h6_styles');
}

if (!function_exists('coyote_edge_text_styles')) {

    function coyote_edge_text_styles() {

        $text_styles = array();

        if(coyote_edge_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = coyote_edge_options()->getOptionValue('text_color');
        }
        if(coyote_edge_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = coyote_edge_get_formatted_font_family(coyote_edge_options()->getOptionValue('text_google_fonts'));
        }
        if(coyote_edge_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('text_fontsize')).'px';
        }
        if(coyote_edge_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('text_lineheight')).'px';
        }
        if(coyote_edge_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = coyote_edge_options()->getOptionValue('text_texttransform');
        }
        if(coyote_edge_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = coyote_edge_options()->getOptionValue('text_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = coyote_edge_options()->getOptionValue('text_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = coyote_edge_filter_px(coyote_edge_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo coyote_edge_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_text_styles');
}

if (!function_exists('coyote_edge_link_styles')) {

    function coyote_edge_link_styles() {

        $link_styles = array();

        if(coyote_edge_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = coyote_edge_options()->getOptionValue('link_color');
        }
        if(coyote_edge_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = coyote_edge_options()->getOptionValue('link_fontstyle');
        }
        if(coyote_edge_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = coyote_edge_options()->getOptionValue('link_fontweight');
        }
        if(coyote_edge_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = coyote_edge_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo coyote_edge_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_link_styles');
}

if (!function_exists('coyote_edge_link_hover_styles')) {

    function coyote_edge_link_hover_styles() {

        $link_hover_styles = array();

        if(coyote_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = coyote_edge_options()->getOptionValue('link_hovercolor');
        }
        if(coyote_edge_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = coyote_edge_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo coyote_edge_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(coyote_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = coyote_edge_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo coyote_edge_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_link_hover_styles');
}

if (!function_exists('coyote_edge_smooth_page_transition_styles')) {

    function coyote_edge_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(coyote_edge_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = coyote_edge_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.edgtf-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo coyote_edge_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(coyote_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = coyote_edge_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.edgtf-st-loader .pulse',
            '.edgtf-st-loader .double_pulse .double-bounce1',
            '.edgtf-st-loader .double_pulse .double-bounce2',
            '.edgtf-st-loader .cube',
            '.edgtf-st-loader .rotating_cubes .cube1',
            '.edgtf-st-loader .rotating_cubes .cube2',
            '.edgtf-st-loader .stripes > div',
            '.edgtf-st-loader .wave > div',
            '.edgtf-st-loader .two_rotating_circles .dot1',
            '.edgtf-st-loader .two_rotating_circles .dot2',
            '.edgtf-st-loader .five_rotating_circles .container1 > div',
            '.edgtf-st-loader .five_rotating_circles .container2 > div',
            '.edgtf-st-loader .five_rotating_circles .container3 > div',
            '.edgtf-st-loader .atom .ball-1:before',
            '.edgtf-st-loader .atom .ball-2:before',
            '.edgtf-st-loader .atom .ball-3:before',
            '.edgtf-st-loader .atom .ball-4:before',
            '.edgtf-st-loader .clock .ball:before',
            '.edgtf-st-loader .mitosis .ball',
            '.edgtf-st-loader .lines .line1',
            '.edgtf-st-loader .lines .line2',
            '.edgtf-st-loader .lines .line3',
            '.edgtf-st-loader .lines .line4',
            '.edgtf-st-loader .fussion .ball',
            '.edgtf-st-loader .fussion .ball-1',
            '.edgtf-st-loader .fussion .ball-2',
            '.edgtf-st-loader .fussion .ball-3',
            '.edgtf-st-loader .fussion .ball-4',
            '.edgtf-st-loader .wave_circles .ball',
            '.edgtf-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
            echo coyote_edge_dynamic_css($spinner_selectors, $spinner_style);
        }

        $spinner_text_style = array();

        if((coyote_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') && (coyote_edge_options()->getOptionValue('smooth_pt_spinner_type') == 'coyote')) {
            $spinner_text_style['color'] = coyote_edge_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_text_selectors = array(
            '.edgtf-coyote-spinner-holder .edgtf-coyote-spinner'
        );

        if (!empty($spinner_text_style)) {
            echo coyote_edge_dynamic_css($spinner_text_selectors, $spinner_text_style);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_smooth_page_transition_styles');
}

if (!function_exists('coyote_edge_404_styles')) {

    function coyote_edge_404_styles() {

        $image404_style = array();

        if(coyote_edge_options()->getOptionValue('404_image') !== '') {
            $image404_style['background-image'] = "url(".coyote_edge_options()->getOptionValue('404_image').")";
        }

        $image404_selector = array('.error404 .edgtf-content .edgtf-container');

        if (!empty($image404_style)) {
            echo coyote_edge_dynamic_css($image404_selector, $image404_style);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_edge_404_styles');
}

if(!function_exists('coyote_footer_background_image')) {
    function coyote_footer_background_image() {
        $footer_background_image = array();

        if(coyote_edge_options()->getOptionValue('footer_background_image') !== '') {
            $footer_background_image['background-image'] = "url(".coyote_edge_options() -> getOptionValue('footer_background_image').")";
        }

        $footer_background_image_selector = array('footer');

        if(!empty($footer_background_image)) {
            echo coyote_edge_dynamic_css($footer_background_image_selector, $footer_background_image);
        }
    }

    add_action('coyote_edge_style_dynamic','coyote_footer_background_image');
}

if(!function_exists('coyote_side_area_background_image')) {
    function coyote_side_area_background_image() {
        $side_area_background_image = array();

        if(coyote_edge_options()->getOptionValue('side_area_background_image') != '') {
            $side_area_background_image['background-image'] = "url(".coyote_edge_options()->getOptionValue('side_area_background_image').")";
        }

        $side_area_background_image_selector = array('.edgtf-side-menu');

        if(!empty($side_area_background_image)) {
            echo coyote_edge_dynamic_css($side_area_background_image_selector, $side_area_background_image);
        }
    }

    add_action('coyote_edge_style_dynamic', 'coyote_side_area_background_image');
}