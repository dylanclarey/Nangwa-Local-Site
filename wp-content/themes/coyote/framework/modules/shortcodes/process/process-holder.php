<?php
namespace CoyoteEdge\Modules\Shortcodes\Process;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessHolder implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_holder';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process','coyote'),
			'base'                    => $this->getBase(),
			'as_parent'               => array('only' => 'edgtf_process_item'),
			'content_element'         => true,
			'category'                => esc_html__('by EDGE', 'coyote'),
			'icon'                    => 'icon-wpb-process-holder extended-custom-icon',
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'param_name'  => 'number_of_items',
					'heading'     => esc_html__('Number of Process Items', 'coyote'),
					'value'       => array(
						esc_html__('Three', 'coyote') => 'three',
						esc_html__('Four', 'coyote')  => 'four',
						esc_html__('Five', 'coyote')  => 'five'
					),
					'admin_label' => true,
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number_of_items' => 'three'
		);

		$params            = shortcode_atts($default_atts, $atts);
		$params['content'] = $content;

		$params['holder_classes'] = array(
			'edgtf-process-holder',
			'edgtf-process-holder-items-'.$params['number_of_items']
		);

		return coyote_edge_get_shortcode_module_template_part('templates/process-holder-template', 'process', '', $params);
	}
}