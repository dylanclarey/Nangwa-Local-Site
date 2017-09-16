<?php
namespace CoyoteEdge\Modules\Shortcodes\SectionHolder;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class SectionHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_section_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Section Holder', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-section-holder extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'as_parent' => array('only' => 'edgtf_section_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Number of Items', 'coyote'),
					'admin_label' => true,
					'param_name' => 'number_of_items',
					'value' => array(
						'4'  => '4',
						'2'  => '2',
						'1'  => '1',
					)
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Area Background Color', 'coyote'),
					'param_name' => 'title_area_background_color',
					'group'       => esc_html__('Design Options','coyote')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title Text','coyote'),
					'param_name'	=> 'title_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Highlighted Title Text','coyote'),
					'param_name'	=> 'highlighted_text',
					'description'   =>esc_html__('Highlighted title text will be appended to title text','coyote')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Color', 'coyote'),
					'param_name' => 'title_color',
					'dependency' => array('element' => 'title_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title Size (px)', 'coyote'),
					'param_name' => 'title_size',
					'dependency' => array('element' => 'title_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Highlighted Color', 'coyote'),
					'param_name' => 'highlighted_color',
					'dependency' => array('element' => 'highlighted_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote')
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
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Subtitle Text','coyote'),
					'param_name'	=> 'subtitle_text',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Subtitle Color', 'coyote'),
					'param_name' => 'subtitle_color',
					'dependency' => array('element' => 'subtitle_text', 'not_empty' => true),
					'group'       => esc_html__('Design Options','coyote')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Show Border Between Items','coyote'),
					'param_name' => 'show_border',
					'value' => array(
						esc_html__('Yes','coyote') => 'yes',
						esc_html__('No','coyote') => 'no'
					)
				),
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_items' => '4',
			'title_area_background_color' => '',
			'title_text' => '',
			'highlighted_text' => '',
			'title_color' => '',
			'title_size' => '',
			'highlighted_color' => '',
			'show_separator' => 'yes',
			'subtitle_text' => '',
			'subtitle_color' => '',
			'show_border' => 'yes'
		);
		$params = shortcode_atts($args, $atts);
		$params['content'] = $content;

		$params['section_classes'] = $this->getSectionClasses($params);
		$params['title_area_style'] = $this->getSectionTitleAreaStyle($params);
		$params['title_params'] = $this->getTitleSectionParams($params);
		$params['subtitle_params'] = $this->getSubtitleSectionParams($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/section-holder-template', 'section-holder', '', $params);

		return $html;

	}

	public function getSectionClasses($params){
		$classes = array();
		$classes[] = 'edgtf-section-holder';

		switch ($params['number_of_items']) {
		 	case '1':
		 		$classes[] = 'edgtf-sh-items-one';
		 		break;		 	
		 	case '2':
		 		$classes[] = 'edgtf-sh-items-two';
		 		break;
		 	default:
		 		$classes[] = 'edgtf-sh-items-four';
	 		break;
		}

		if ($params['show_border'] == 'yes'){
			$classes[] = 'edgtf-sh-border';
		}

		return implode(' ', $classes);
	}

	public function getSectionTitleAreaStyle($params){
		$style = array();

		if ($params['title_area_background_color'] !== ''){
			$style[] = 'background-color:'.$params['title_area_background_color'];
		}

		return implode('; ', $style);
	}

	public function getTitleSectionParams($params){
		$title_params = array();

		if ($params['title_text'] !== ''){
			$title_params['title_text'] = $params['title_text'];
		}

		if ($params['highlighted_text'] !== ''){
			$title_params['highlighted_text'] = $params['highlighted_text'];
		}

		if ($params['title_color'] !== ''){
			$title_params['text_color'] = $params['title_color'];
		}

		if ($params['title_size'] !== ''){
			$title_params['text_size'] = $params['title_size'];
		}

		if ($params['highlighted_color'] !== ''){
			$title_params['highlighted_color'] = $params['highlighted_color'];
		}

		return $title_params;
	}

	public function getSubtitleSectionParams($params){
		$subtitle_params = array();

		if ($params['subtitle_text'] !== ''){
			$subtitle_params['subtitle_text'] = $params['subtitle_text'];
		}

		if ($params['subtitle_color'] !== ''){
			$subtitle_params['text_color'] = $params['subtitle_color'];
		}

		$subtitle_params['text_align'] = 'left';


		return $subtitle_params;
	}

}
