<?php
namespace CoyoteEdge\Modules\Shortcodes\InteractiveItems;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveItems implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_interactive_items';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Interactive Items', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-interactive-items extended-custom-icon',
			'category' => esc_html__('by EDGE','coyote'),
			'as_parent' => array('only' => 'edgtf_interactive_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title Text','coyote'),
					'param_name' => 'title_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Highlighted Title Text','coyote'),
					'param_name'	=> 'highlighted_text',
					'description'   => esc_html__('Highlighted title text will be appended to title text','coyote')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title Size (px)','coyote'),
					'param_name' => 'title_size',
					'group'       => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Color', 'coyote'),
					'param_name' => 'title_color',
					'dependency' => array('element' => 'title_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote'),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Highlighted Color','coyote'),
					'param_name'  => 'highlighted_color',
					'dependency'  => array('element' => 'highlighted_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Area Background Color', 'coyote'),
					'param_name' => 'title_area_background_color',
					'group'       => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title Area Padding','coyote'),
					'param_name' => 'title_area_padding',
					'group'       => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'dropdown',
					'heading' =>esc_html__( 'Columns','coyote'),
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('3 Columns','coyote')     => 'three-columns',
						esc_html__('4 Columns' ,'coyote')    => 'four-columns',
						esc_html__('5 Columns','coyote')     => 'five-columns',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' =>esc_html__( 'Tile hover effect','coyote'),
					'param_name' => 'tile_effect',
					'value' => array(
						esc_html__('Yes','coyote')   => 'yes',
						esc_html__('No' ,'coyote')  	=> 'no',
					),
				),
				array(
					'type' => 'dropdown',
					'heading' =>esc_html__( 'Appear effect','coyote'),
					'param_name' => 'appear_effect',
					'value' => array(
						esc_html__('Randomize','coyote')   => 'randomize',
						esc_html__('One by One','coyote')   => 'one-by-one',
						esc_html__('None' ,'coyote')  	=> 'none',
					),
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title_text'		=> '',
			'title_size'		=> '',
			'title_color'		=> '',
			'highlighted_text'	=> '',
			'highlighted_color'	=> '',
			'title_area_padding'=> '',
			'title_area_background_color' => '',
			'number_of_columns' => 'three-columns',
			'appear_effect' 	=> 'randomize',
			'tile_effect' 		=> 'yes',
		);
		$params = shortcode_atts($args, $atts);
		$params['content'] = $content;

		$params['interactive_classes'] = $this->getInteractiveClasses($params);
		$params['title_params'] = $this->getTitleSectionParams($params);
		$params['title_area_style'] = $this->getTitleSectionStyle($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/interactive-items-template', 'interactive-items', '', $params);

		return $html;

	}

	private function getInteractiveClasses($params) {
		$classes = array();		
		$classes[] = 'edgtf-interactive-items-holder';

		if($params['number_of_columns'] != ''){
			$classes[] = 'edgtf-ii-'.$params['number_of_columns'];
		}

		if($params['tile_effect'] == 'yes'){
			$classes[] = 'edgtf-tile-hover-effect' ;
		}

		if($params['appear_effect'] != 'none'){
			$classes[] = 'edgtf-appear-effect';
			$classes[] = 'edgtf-'.$params['appear_effect'];
		}

		$classes[] = 'clearfix';

		return implode(' ', $classes);
	}

	private function getTitleSectionParams($params){
		$title_params = array();

		if ($params['title_text'] !== ''){
			$title_params['title_text'] = $params['title_text'];
		}

		if ($params['title_color'] !== ''){
			$title_params['text_color'] = $params['title_color'];
		}

		if ($params['title_size'] !== ''){
			$title_params['text_size'] = $params['title_size'];
		}

		if ($params['highlighted_text'] !== ''){
			$title_params['highlighted_text'] = $params['highlighted_text'];
		}

		if ($params['highlighted_color'] !== ''){
			$title_params['highlighted_color'] = $params['highlighted_color'];
		}

		return $title_params;
	}

	private function getTitleSectionStyle($params){
		$title_area_style = array();

		if ($params['title_area_padding'] !== ''){
			$title_area_style[] = 'padding: '.$params['title_area_padding'];
		}

		if ($params['title_area_background_color'] !== ''){
			$title_area_style[] = 'background-color: '.$params['title_area_background_color'];
		}

		return implode(';', $title_area_style);
	}


}
