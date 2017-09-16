<?php
namespace CoyoteEdge\Modules\Shortcodes\TextSliderItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class TextSliderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_text_slider_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Text Slider Item', 'coyote'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_text_slider'),
					'category' => esc_html__('by EDGE','coyote'),
					'icon' => 'icon-wpb-text-slider-item extended-custom-icon',
					'params' => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Item Title','coyote'),
							'param_name'  => 'item_title',
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Title Tag', 'coyote'),
							'param_name' => 'title_tag',
							'value' => array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							),
							'dependency' => array('element' => 'item_title', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show Separator','coyote'),
							'param_name' => 'show_separator',
							'value' => array(
								esc_html__('Yes','coyote') => 'yes',
								esc_html__('No','coyote') => 'no'
							)
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__('Item Text','coyote'),
							'param_name'  => 'item_text',
						),
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_alignment' => 'left',
			'item_title' => '',
			'title_tag' => 'h2',
			'show_separator' => 'yes',
			'item_text' => '',
		);

		$params = shortcode_atts($args, $atts);

		$html = coyote_edge_get_shortcode_module_template_part('templates/text-slider-item-template', 'text-slider', '', $params);

		return $html;
	}


}
