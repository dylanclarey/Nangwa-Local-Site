<?php
namespace CoyoteEdge\Modules\Shortcodes\VerticalSplitSliderContentItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSliderContentItem implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_vertical_split_slider_content_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Slide Content Item', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-vertical-split-slider-content-item extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'edgtf_vertical_split_slider_left_panel,edgtf_vertical_split_slider_right_panel'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'			=>	'colorpicker',
					'heading'		=>	esc_html__('Background Color', 'coyote'),
					'param_name'	=>	'background_color',
					'value' 		=>	''
				),
				array(
					'type'			=>	'attach_image',
					'heading'		=>	esc_html__('Background Image', 'coyote'),
					'param_name'	=>	'background_image',
					'value'			=>	''
				),
				array(
					'type'			=>	'textfield',
					'heading'		=>	esc_html__('Padding left/right', 'coyote'),
					'param_name'	=>	'item_padding',
					'value'			=>  '',
					"description"	=>	'Please insert padding in format "10px""'
				),
				array(
					'type'			=>	'dropdown',
					'heading'		=>	esc_html__('Content Aligment', 'coyote'),
					'param_name'	=>	'alignment',
					'value' => array(
						esc_html__('Left', 'coyote')	=> 'left',
						esc_html__('Right', 'coyote')	=> 'right',
						esc_html__('Center', 'coyote')	=> 'center'
					)
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'background_color'	=> '',
			'background_image'	=> '',
			'item_padding'		=> '',
			'alignment'			=> 'left',
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['content_style'] = $this->getContentStyle($params);
		$params['content'] = $content;

		$html = coyote_edge_get_shortcode_module_template_part('templates/vertical-split-slider-content-item-template', 'vertical-split-slider', '', $params);

		return $html;

	}


	/**
	 * Return Content Style
	 *
	 * @param $params
	 * @return array
	 */
	private function getContentStyle($params) {

		$content_style = array();

		if ($params['background_color'] !== '') {
			$content_style[] = 'background-color:'. $params['background_color'];
		}

		if ($params['background_image'] !== '') {
			$url = wp_get_attachment_url($params['background_image']);
			$content_style[] = 'background-image:url('. $url . ')';
		}

		if ($params['item_padding'] !== '') {
			$content_style[] = 'padding:'. $params['item_padding'] . 'px';
		}

		if ($params['alignment'] !== '') {
			$content_style[] = 'text-align:'. $params['alignment'];
		}


		return $content_style;
	}

}
