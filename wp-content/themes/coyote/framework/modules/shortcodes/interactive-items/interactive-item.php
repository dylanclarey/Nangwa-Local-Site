<?php
namespace CoyoteEdge\Modules\Shortcodes\InteractiveItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_interactive_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Interactive Item', 'coyote'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_interactive_items'),
					'category' => esc_html__('by EDGE','coyote'),
					'icon' => 'icon-wpb-interactive-item extended-custom-icon',
					'params' => array_merge(
						\CoyoteEdgeIconCollections::get_instance()->getVCParamsArray(),
						array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Title', 'coyote'),
								'param_name' => 'title',
							),
		                    array(
		                        'type'       => 'dropdown',
		                        'heading'    => esc_html__('Title Tag', 'coyote'),
		                        'param_name' => 'title_tag',
		                        'value'      => array(
		                            ''   => '',
		                            'h2' => 'h2',
		                            'h3' => 'h3',
		                            'h4' => 'h4',
		                            'h5' => 'h5',
		                            'h6' => 'h6',
		                        ),
		                        'dependency' => array('element' => 'title', 'not_empty' => true),
								'group'	=> esc_html__('Design Options', 'coyote'),
		                    ),
							array(
								'type' => 'textarea',
								'heading' => esc_html__( 'Text', 'coyote'),
								'param_name' => 'text',
							),
							array(
								'type' => 'colorpicker',
								'class' => '',
								'heading' => esc_html__('Background Color', 'coyote'),
								'param_name' => 'background_color',
								'group'	=> esc_html__('Design Options', 'coyote'),
							),
							array(
								'type' => 'textfield',
								'heading' =>esc_html__('Padding', 'coyote'),
								'param_name' => 'padding',
							),
							array(
								'type' => 'attach_image',
								'heading' => esc_html__('Image', 'coyote'),
								'param_name' => 'image',
							),
							array(
								'type' => 'textfield',
								'heading' =>esc_html__('Link', 'coyote'),
								'param_name' => 'link',
							),
							array(
								'type' => 'dropdown',
								'heading' =>esc_html__( 'Target','coyote'),
								'param_name' => 'target',
								'value' => array(
									esc_html__('New Window','coyote')     => '_blank',
									esc_html__('Same Window','coyote')     => '_self',
								),
		                        'dependency'  => array('element' => 'link', 'not_empty' => true)
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Icon Size','coyote'),
								'param_name' => 'icon_size',
								'group'	=> esc_html__('Design Options', 'coyote'),
							),
							array(
								'type' => 'colorpicker',
								'heading' => esc_html__('Icon Color','coyote'),
								'param_name' => 'icon_color',
								'group'	=> esc_html__('Design Options', 'coyote'),
							)
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'title'	=> '',
			'title_tag' => 'h3',
			'text' => '',
			'image' => '',
			'link'	=> '',
			'target'	=> '_blank',
			'background_color' => '',
			'padding' => '',
			'icon_size' => '',
			'icon_color' => ''
		);
		
        $args = array_merge($args, coyote_edge_icon_collections()->getShortcodeParams());
		
        $params = shortcode_atts($args, $atts);

		$params['interactive_item_holder_styles'] = $this->getInteractiveItemHolderStyles($params);
		$params['interactive_back_styles'] = $this->getInteractiveItemBackStyles($params);
        $params['icon_parameters'] = $this->getIconParameters($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/interactive-item-template', 'interactive-items', '', $params);

		return $html;
	}


	/**
	 * Return Interactive Item Holder Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getInteractiveItemHolderStyles($params) {
		$interactive_item_holder_styles = array();

		if ($params['background_color'] !== '') {
			$interactive_item_holder_styles[] = 'background-color: ' . $params['background_color'];
		}

		if ($params['padding'] !== '') {
			$interactive_item_holder_styles[] = 'padding: ' . $params['padding'];
		}

		return implode(';', $interactive_item_holder_styles);

	}

	/**
	 * Return Interactive Item Back Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getInteractiveItemBackStyles($params) {
		$interactive_back_styles = array();

		if ($params['image'] !== '') {
			$interactive_back_styles[] = 'background-image: url(' . wp_get_attachment_url($params['image']).')';
		}

		return implode(';', $interactive_back_styles);

	}
    private function getIconParameters($params) {
        $params_array = array();

        $iconPackName = coyote_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $params_array['icon_pack']   = $params['icon_pack'];
        $params_array[$iconPackName] = $params[$iconPackName];

        if(!empty($params['icon_size'])) {
            $params_array['custom_size'] = $params['icon_size'];
        }

        if(!empty($params['icon_color'])) {
            $params_array['icon_color'] = $params['icon_color'];
        }

        if ($params_array[$iconPackName] == ''){
        	$params_array = array();
        }

        return $params_array;
    }
}
