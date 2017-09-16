<?php
namespace CoyoteEdge\Modules\Shortcodes\Button;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package CoyoteEdge\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * Sets base attribute and registers shortcode with Visual Composer
	 */
	public function __construct() {
		$this->base = 'edgtf_button';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base attribute
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Button', 'coyote'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by EDGE', 'coyote'),
			'icon'                      => 'icon-wpb-button extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Size', 'coyote'),
						'param_name'  => 'size',
						'value'       => array(
							esc_html__('Default','coyote') => '',
							esc_html__('Small', 'coyote')  => 'small',
							esc_html__('Medium', 'coyote') => 'medium',
							esc_html__('Large', 'coyote')  => 'large',
							esc_html__('Full Width', 'coyote')  => 'huge-full-width'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Type', 'coyote'),
						'param_name'  => 'type',
						'value'       => array(
							esc_html__('Default', 'coyote') => '',
							esc_html__('Transparent', 'coyote') => 'transparent',
							esc_html__('Outline', 'coyote') => 'outline',
							esc_html__('Solid', 'coyote') => 'solid'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text', 'coyote'),
						'param_name'  => 'text',
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Link', 'coyote'),
						'param_name'  => 'link',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Link Target', 'coyote'),
						'param_name'  => 'target',
						'value'       => array(
							esc_html__('Self', 'coyote')  => '_self',
							esc_html__('Blank', 'coyote') => '_blank'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Custom CSS class', 'coyote'),
						'param_name'  => 'custom_class',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Hover Type', 'coyote'),
						'param_name'  => 'hover_type',
						'value'       => array(
							esc_html__('Default', 'coyote')  => '',
							esc_html__('Shuffle', 'coyote') => 'shuffle',
						),
						'description' => esc_html__('When Hover Type set to Shuffle, Hover Design Options are disabled.', 'coyote'),
					)
				),
				coyote_edge_icon_collections()->getVCParamsArray(array(), '', true),
				array(
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Color', 'coyote'),
						'param_name'  => 'color',
						'group'       => esc_html__('Design Options','coyote'),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Color', 'coyote'),
						'param_name'  => 'hover_color',
						'group'       => esc_html__('Design Options','coyote'),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Background Color', 'coyote'),
						'param_name'  => 'background_color',
						'group'       => esc_html__('Design Options','coyote'),
						'dependency'  => array('element' => 'type', 'value' => array('solid',''))
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Background Color', 'coyote'),
						'param_name'  => 'hover_background_color',
						'group'       => esc_html__('Design Options','coyote'),
						'dependency'  => array('element' => 'type', 'value' => array('solid','outline',''))
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Border Color', 'coyote'),
						'param_name'  => 'border_color',
						'group'       => esc_html__('Design Options','coyote'),
						'dependency'  => array('element' => 'type', 'value' => array('solid','outline',''))
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Border Color', 'coyote'),
						'param_name'  => 'hover_border_color',
						'group'       => esc_html__('Design Options','coyote'),
						'dependency'  => array('element' => 'type', 'value' => array('solid','outline',''))
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Font Size (px)', 'coyote'),
						'param_name'  => 'font_size',
						'group'       => esc_html__('Design Options','coyote'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Font Weight', 'coyote'),
						'param_name'  => 'font_weight',
						'value'       => array_flip(coyote_edge_get_font_weight_array(true)),
						'group'       => esc_html__('Design Options','coyote'),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Margin', 'coyote'),
						'param_name'  => 'margin',
						'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'coyote'),
						'group'       => esc_html__('Design Options','coyote'),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Icon Color', 'coyote'),
						'param_name'  => 'icon_color',
						'group'       => esc_html__('Design Options','coyote'),
					)
				)
			) //close array_merge
		));
	}

	/**
	 * Renders HTML for button shortcode
	 *
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$default_atts = array(
			'size'                   => '',
			'type'                   => '',
			'text'                   => '',
			'link'                   => '',
			'target'                 => '',
			'color'                  => '',
			'background_color'       => '',
			'border_color'           => '',
			'hover_color'            => '',
			'hover_background_color' => '',
			'hover_border_color'     => '',
			'font_size'              => '',
			'font_weight'            => '',
			'icon_color'			 => '',
			'margin'                 => '',
			'custom_class'           => '',
			'html_type'              => 'anchor',
			'input_name'             => '',
			'hover_type'			 => '',
			'custom_attrs'           => array()
		);

		$default_atts = array_merge($default_atts, coyote_edge_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
        	$icon_attributes = array();

            $iconPackName   = coyote_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';

			$icon_attributes['class'] = 'edgtf-btn-icon-holder';
        }

		$params['type'] = !empty($params['type']) ? $params['type'] : 'solid';

		$params['size'] = !empty($params['size']) ? $params['size'] : 'medium';


		$params['link']   = !empty($params['link']) ? $params['link'] : '#';
		$params['target'] = !empty($params['target']) ? $params['target'] : '_self';

		//prepare params for template
		$params['button_classes']      = $this->getButtonClasses($params);
		$params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
		$params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);
        $params['button_text_data']         = $this->getButtonTextDataAttr($params);
		$params['icon_styles']       = $this->getIconStyle($params);

		return coyote_edge_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', '', $params);
	}

	/**
	 * Returns array of button styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonStyles($params) {
		$styles = array();

		if(!empty($params['color'])) {
			$styles[] = 'color: '.$params['color'];
		}

		if(!empty($params['background_color']) && $params['type'] !== 'outline') {
			$styles[] = 'background-color: '.$params['background_color'];
		}

		if(!empty($params['border_color'])) {
			$styles[] = 'border: 1px solid '.$params['border_color'];
		}

		if(!empty($params['font_size'])) {
			$styles[] = 'font-size: '.coyote_edge_filter_px($params['font_size']).'px';
		}

		if(!empty($params['font_weight'])) {
			$styles[] = 'font-weight: '.$params['font_weight'];
		}

		if(!empty($params['margin'])) {
			$styles[] = 'margin: '.$params['margin'];
		}

		return $styles;
	}

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }


    /**
     *
     * Returns array of button text data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonTextDataAttr($params) {
        $data = array();

        if ($params['hover_type'] === 'shuffle') {
        	$data['data-lang'] = 'en';
        }

        return $data;
    }

	/**
	 * Returns array of HTML classes for button
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonClasses($params) {
		$buttonClasses = array(
			'edgtf-btn',
			'edgtf-btn-'.$params['size'],
			'edgtf-btn-'.$params['type']
		);

		if(!empty($params['icon'])) {
			$buttonClasses[] = 'edgtf-btn-icon';
		}

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'edgtf-btn-custom-hover-color';
        }

		if(!empty($params['custom_class'])) {
			$buttonClasses[] = $params['custom_class'];
		}

		if ($params['hover_type'] !== ''){
			$buttonClasses[] = 'edgtf-btn-hover-'.$params['hover_type'];
		}

		return $buttonClasses;
	}

	/**
	 * Returns icon style
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getIconStyle($params) {
		$style = '';

		if(!empty($params['icon_color'])) {
			$style .= 'color: '.$params['icon_color'];
		}

		return $style;
	}
}