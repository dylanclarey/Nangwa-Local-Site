<?php
namespace CoyoteEdge\Modules\Shortcodes\Dropcaps;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Dropcaps
 */
class Dropcaps implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_dropcaps';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/*
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	 
	public function vcMap() {
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type' => '',
			'color' => '',
			'background_color' => '',
			'border_style' => '',
			'thickness'		=>	'',
			'border_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['letter'] = $content;
		$params['dropcaps_style'] = $this->getDropcapsStyle($params);
		$params['dropcaps_class'] = $this->getDropcapsClass($params);

		//Get HTML from template
		$html = coyote_edge_get_shortcode_module_template_part('templates/dropcaps-template', 'dropcaps', '', $params);

		return $html;

	}

	/**
	 * Return Style for Dropcaps
	 *
	 * @param $params
	 * @return string
	 */
	private function getDropcapsStyle($params) {
		$dropcaps_style = array();

		if ($params['color'] !== '') {
			$dropcaps_style[] = 'color: '.$params['color'];
		}

		if ($params['background_color'] !== '') {
			$dropcaps_style[] = 'background-color: '.$params['background_color'];
		}

		if ($params['border_style'] !== '') {
			$dropcaps_style[] = 'border-style: ' . $params['border_style'];
		}

		if ($params['thickness'] !== '') {
			$dropcaps_style[] = 'border-width: ' . $params['thickness'] . 'px';
		}

		if ($params['border_color'] !== '') {
			$dropcaps_style[] = 'border-color: '.$params['border_color'];
		}

		return implode(';', $dropcaps_style);
	}

	/**
	 * Return Class for Dropcaps
	 *
	 * @param $params
	 * @return string
	 */
	private function getDropcapsClass($params) {
		return ($params['type'] !== '') ? 'edgtf-'.$params['type'] : '';
	}
}