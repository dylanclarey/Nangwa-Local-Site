<?php
namespace CoyoteEdge\Modules\Shortcodes\Clients;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Clients
 */

class Clients implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_clients';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Clients', 'coyote'),
			'base' => $this->base,
			'as_parent' => array('only' => 'edgtf_client'),
			'content_element' => true,
			'category' => esc_html__('by EDGE', 'coyote'),
			'icon' => 'icon-wpb-clients extended-custom-icon',
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Columns', 'coyote'),
					'param_name' => 'columns',
					'value' => array(
						esc_html__('Two', 'coyote') => 'two-columns',
						esc_html__('Three','coyote') => 'three-columns',
						esc_html__('Four', 'coyote') => 'four-columns',
						esc_html__('Five', 'coyote') => 'five-columns',
						esc_html__('Six', 'coyote') => 'six-columns'
					),
					'save_always' => true,
				)
			),
			'js_view' => 'VcColumnView'

		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'columns' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;
		$html						= '';

		$html = coyote_edge_get_shortcode_module_template_part('templates/clients-template', 'clients', '', $params);

		return $html;

	}

}
