<?php
namespace CoyoteEdge\Modules\Shortcodes\SectionItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class SectionItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_section_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Section Item', 'coyote'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_section_holder'),
					'as_parent' => array('except' => 'vc_row, vc_accordion, edgtf_portfolio_list, edgtf_portfolio_slider'),
					'content_element' => true,
					'category' => esc_html__('by EDGE', 'coyote'),
					'icon' => 'icon-wpb-section-item extended-custom-icon',
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Background Color', 'coyote'),
							'param_name' => 'background_color',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Padding', 'coyote'),
							'param_name' => 'item_padding',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Horizontal Alignment', 'coyote'),
							'param_name' => 'horizontal_aligment',
							'value' => array(
								esc_html__('Left', 'coyote') => 'left',
								esc_html__('Right', 'coyote') => 'right',
								esc_html__('Center', 'coyote') => 'center'
							),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Vertical Alignment', 'coyote'),
							'param_name' => 'vertical_alignment',
							'value' => array(
								esc_html__('Middle', 'coyote') => 'middle',
								esc_html__('Top', 'coyote') => 'top',
								esc_html__('Bottom', 'coyote') => 'bottom'
							),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
			'item_padding' => '',
			'horizontal_aligment' => 'left',
			'vertical_alignment' => 'middle',
		);
		
		$params = shortcode_atts($args, $atts);
		$params['content']= $content;

		$params['section_item_style'] = $this->getSectionItemStyle($params);
		$params['section_item_class'] = $this->getSectionItemClass($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/section-item-template', 'section-holder', '', $params);

		return $html;
	}


	/**
	 * Return Section Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getSectionItemStyle($params) {

		$section_item_style = array();

		if ($params['background_color'] !== '') {
			$section_item_style[] = 'background-color: ' . $params['background_color'];
		}
	
		if ($params['item_padding'] !== '') {
			$section_item_style[] = 'padding: ' . $params['item_padding'];
		}
		return implode(';', $section_item_style);

	}


	/**
	 * Return Section Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getSectionItemClass($params) {

		$section_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$section_item_class[] = 'edgtf-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$section_item_class[] = 'edgtf-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		return implode(' ', $section_item_class);

	}

}
