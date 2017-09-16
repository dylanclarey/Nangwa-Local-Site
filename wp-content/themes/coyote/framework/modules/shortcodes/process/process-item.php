<?php
namespace CoyoteEdge\Modules\Shortcodes\Process;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_item';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process Item','coyote'),
			'base'                    => $this->getBase(),
			'as_child'                => array('only' => 'edgtf_process_holder'),
			'category'                => esc_html__('by EDGE', 'coyote'),
			'icon'                    => 'icon-wpb-process-item extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
                array(
                    'type'       => 'attach_image',
                    'heading'    => esc_html__('Image', 'coyote'),
                    'param_name' => 'process_image'
                ),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Number', 'coyote'),
					'param_name'  => 'number',
					'admin_label' => true
				),
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Enable Underscore After Number','coyote'),
                    'param_name'	=> 'enable_underscore',
                    'value'			=> array(
                        esc_html__('No','coyote')	=> 'no',
                        esc_html__('Yes','coyote')	=> 'yes'
                    )
                ),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'coyote'),
					'param_name'  => 'title',
					'admin_label' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text', 'coyote'),
					'param_name'  => 'text',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Highlight Item?', 'coyote'),
					'param_name'  => 'highlighted',
					'value'       => array(
						esc_html__('No','coyote')  => 'no',
						esc_html__('Yes', 'coyote') => 'yes'
					),
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
            'process_image' => '',
			'number'     => '',
            'enable_underscore' => 'no',
			'title'     => '',
			'text'      => '',
			'highlighted' => 'no'
		);

		$params = shortcode_atts($default_atts, $atts);
        $params['background_style'] = $this->getBackgroundStyle($params);

		$params['item_classes'] = array(
			'edgtf-process-item-holder'
		);

		if($params['highlighted'] === 'yes') {
			$params['item_classes'][] = 'edgtf-pi-highlighted';
		}

        if($params['process_image']) {
            $params['item_classes'][] = 'edgtf-process-background-image';
        }

        if ($params['enable_underscore'] == 'yes') {
            $params['item_classes'][] = 'edgtf-process-underscore-enabled';
        }

		return coyote_edge_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
	}

    /**
     * Return Process background style
     *
     * @param $params
     *
     * @return false|string
     */

    private function getBackgroundStyle($params){
        $background_style = array();

        if ($params['process_image']){
            $background_style[] = 'background-image: url('.wp_get_attachment_url($params['process_image']).')';
        }

        return implode('; ', $background_style);
    }

}