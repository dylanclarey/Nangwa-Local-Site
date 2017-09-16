<?php
namespace CoyoteEdge\Modules\Shortcodes\SectionTitle;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class SectionTitle
 */
class SectionTitle implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_section_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 */
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Section Title', 'coyote'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE','coyote'),
				'icon' => 'icon-wpb-section-title extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Title Text','coyote'),
						'param_name'	=> 'title_text',
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Enable Underscore After Title','coyote'),
						'param_name'	=> 'enable_underscore',
						'value'			=> array(
							esc_html__('No','coyote')	=> 'no',
							esc_html__('Yes','coyote')	=> 'yes'
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Underscore Position','coyote'),
						'param_name'	=> 'underscore_position',
						'value'			=> array(
							''			=> '',
							esc_html__('Left','coyote')	=> 'left',
							esc_html__('Right','coyote')	=> 'right'
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Text Align','coyote'),
						'param_name'	=> 'text_align',
						'value'			=> array(
							''			=> '',
							esc_html__('Left','coyote')	=> 'left',
							esc_html__('Center','coyote')	=> 'center',
							esc_html__('Right','coyote')	=> 'right',
							esc_html__('Justify','coyote')	=> 'justify'
						)
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Text Color','coyote'),
						'param_name'  => 'text_color',
						'dependency'  => array('element' => 'title_text', 'not_empty' => true)
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text Size (px)', 'coyote'),
						'param_name' => 'text_size',
						'dependency' => array('element' => 'title_text', 'not_empty' => true),
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'title_text' => '',
			'enable_underscore' => 'no',
			'underscore_position' => 'right',
			'text_align' => 'left',
			'text_color' => '',
			'text_size' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['classes'] = $this->getTitleSectionClass($params);
		$params['title_style'] = $this->getTitleStyle($params);

		//Get HTML from template
		$html = coyote_edge_get_shortcode_module_template_part('templates/section-title-template', 'section-title', '', $params);

		return $html;

	}

    /**
     * Generates classes for title section
     *
     * @param $params
     *
     * @return array
     */
	private function getTitleSectionClass($params){
		$classes = array();
		$classes[] = 'edgtf-section-title';

		if ($params['text_align'] != ''){
			$classes[] = 'edgtf-section-align-'.$params['text_align'];
		}

		if ($params['enable_underscore'] == 'yes'){
			$classes[] = 'edgtf-section-underscore-enabled';
		}

		if ($params['underscore_position'] != ''){
			$classes[] = 'edgtf-underscore-'.$params['underscore_position'];
		}

		return $classes;
	}

    /**
     * Generates style for title text
     *
     * @param $params
     *
     * @return string
     */
	private function getTitleStyle($params){
		$title_style = array();

		if ($params['text_color'] != ''){
			$title_style[] = 'color: '.$params['text_color'];
		}

		if ($params['text_size'] != ''){
			$title_style[] = 'font-size: '.coyote_edge_filter_px($params['text_size']).'px';
		}

		return implode(';', $title_style);
	}
}