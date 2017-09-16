<?php
namespace CoyoteEdge\Modules\Shortcodes\ElementsHolder;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elements Holder', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'as_parent' => array('only' => 'edgtf_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color', 'coyote'),
					'param_name' => 'background_color',
					'value' => '',
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns', 'coyote'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column', 'coyote')   => 'one-column',
						esc_html__('2 Columns', 'coyote')  => 'two-columns',
						esc_html__('3 Columns', 'coyote')  => 'three-columns',
						esc_html__('4 Columns', 'coyote')  => 'four-columns',
						esc_html__('5 Columns', 'coyote')  => 'five-columns',
						esc_html__('6 Columns','coyote')   => 'six-columns'
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Items Float Left', 'coyote'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?','coyote') => 'yes'),
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness','coyote'),
					'heading' => esc_html__('Switch to One Column', 'coyote'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
						esc_html__('Default','coyote')    		=> '',
						esc_html__('Below 1280px', 'coyote') 	=> '1280',
						esc_html__('Below 1024px', 'coyote')   => '1024',
						esc_html__('Below 768px', 'coyote')    => '768',
						esc_html__('Below 600px', 'coyote')   	=> '600',
						esc_html__('Below 480px', 'coyote')   	=> '480',
						esc_html__('Never', 'coyote')    		=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'coyote'),
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness','coyote'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode', 'coyote'),
					'param_name' => 'alignment_one_column',
					'value' => array(
						esc_html__('Default','coyote') => '',
						esc_html__('Left', 'coyote') 	=> 'left',
						esc_html__('Center','coyote')  => 'center',
						esc_html__('Right', 'coyote')  => 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'coyote')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'edgtf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'edgtf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'edgtf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'edgtf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'edgtf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'edgtf-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . coyote_edge_get_class_attribute($elements_holder_class) . ' ' . coyote_edge_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
