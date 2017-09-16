<?php
namespace CoyoteEdge\Modules\Shortcodes\InteractiveImage;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveImage implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_interactive_image';

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
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Interactive Image', 'coyote'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE', 'coyote'),
			'icon'                      => 'icon-wpb-interactive-image extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_image',
					'heading'		=> esc_html__('Image', 'coyote'),
					'param_name'	=> 'image',
					'description'	=> esc_html__('Select image from media library', 'coyote')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Text','coyote'),
					'param_name'	=> 'text'
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Text Color','coyote'),
					'param_name'	=> 'text_color',
					'dependency'	=> array('element' => 'text', 'not_empty' => true)
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Overlay Color','coyote'),
					'param_name'	=> 'overlay_color',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Link','coyote'),
					'param_name'	=> 'link'
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Target', 'coyote'),
                    'param_name' => 'target',
                    'value'      => array(
						esc_html__('Self', 'coyote')  => '_self',
						esc_html__('Blank','coyote') => '_blank'
                    ),
                    'dependency' => array('element' => 'link', 'not_empty' => true),
                ),
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'image'				=> '',
			'text'				=> '',
			'text_color'		=> '',
			'overlay_color'		=> '',
			'link'				=> '',
			'target'			=> '_self'
		);

		$params = shortcode_atts($args, $atts);
		$params['text_style'] = $this->getTextStyle($params);
		$params['overlay_style'] = $this->getOverlayStyle($params);
		$params['holder_classes'] = $this->getHolderClasses($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/interactive-image-template' , 'interactive-image', '', $params);

		return $html;

	}

	private function getHolderClasses($params) {
		$classes = array();

		if ($params['text'] == '') {
			$classes[] = 'edgtf-without-text';
		}

		return implode(' ', $classes);
	}

	private function getTextStyle($params) {
		$style = array();

		if ($params['text_color'] !== ''){
			$style[] = 'color: '.$params['text_color'];
		}

		return implode(';', $style);
	}

	private function getOverlayStyle($params) {
		$style = array();

		if ($params['overlay_color'] !== ''){
			$style[] = 'background-color: '.$params['overlay_color'];
		}

		return implode(';', $style);
	}
}