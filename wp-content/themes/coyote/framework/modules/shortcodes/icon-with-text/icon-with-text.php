<?php
namespace CoyoteEdge\Modules\Shortcodes\IconWithText;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class IconWithText
 * @package CoyoteEdge\Modules\Shortcodes\IconWithText
 */
class IconWithText implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'edgtf_icon_with_text';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Icon With Text', 'coyote'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-icon-with-text extended-custom-icon',
            'category'                  => esc_html__('by EDGE', 'coyote'),
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                coyote_edge_icon_collections()->getVCParamsArray(),
                array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('Custom Icon', 'coyote'),
                        'param_name' => 'custom_icon'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Position', 'coyote'),
                        'param_name'  => 'icon_position',
                        'value'       => array(
							esc_html__('Top', 'coyote') => 'top',
							esc_html__('Left', 'coyote') => 'left',
							esc_html__('Left From Title', 'coyote') => 'left-from-title',
							esc_html__('Right', 'coyote') => 'right'
                        ),
                        'description' => esc_html__('Icon Position', 'coyote'),
                        'save_always' => true,
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Type', 'coyote'),
                        'param_name'  => 'icon_type',
                        'value'       => array(
							esc_html__('Normal', 'coyote')   => 'normal',
							esc_html__('Circle', 'coyote') => 'circle',
							esc_html__('Square', 'coyote') => 'square'
                        ),
                        'save_always' => true,
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Size', 'coyote'),
                        'param_name'  => 'icon_size',
                        'value'       => array(
							esc_html__('Tiny','coyote') => 'edgtf-icon-tiny',
							esc_html__('Small', 'coyote')=> 'edgtf-icon-small',
							esc_html__('Medium', 'coyote')=> 'edgtf-icon-medium',
							esc_html__('Large', 'coyote') => 'edgtf-icon-large',
							esc_html__('Very Large','coyote') => 'edgtf-icon-huge'
                        ),
                        'save_always' => true,
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Custom Icon Size (px)', 'coyote'),
                        'param_name' => 'custom_icon_size',
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Animation', 'coyote'),
                        'param_name'  => 'icon_animation',
                        'value'       => array(
							esc_html__('No', 'coyote')  => '',
							esc_html__('Yes', 'coyote') => 'yes'
                        ),
                        'group'       => esc_html__('Icon Settings','coyote'),
                        'save_always' => true,
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Icon Animation Delay (ms)', 'coyote'),
                        'param_name' => 'icon_animation_delay',
                        'group'       => esc_html__('Icon Settings','coyote'),
                        'dependency' => array('element' => 'icon_animation', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Icon Margin', 'coyote'),
                        'param_name'  => 'icon_margin',
                        'value'       => '',
                        'description' => esc_html__('Margin should be set in a top right bottom left format', 'coyote'),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Shape Size (px)', 'coyote'),
                        'param_name'  => 'shape_size',
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Color', 'coyote'),
                        'param_name' => 'icon_color',
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Hover Color', 'coyote'),
                        'param_name' => 'icon_hover_color',
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Background Color', 'coyote'),
                        'param_name'  => 'icon_background_color',
                        'description' => esc_html__('Icon Background Color (only for square and circle icon type)', 'coyote'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Hover Background Color', 'coyote'),
                        'param_name'  => 'icon_hover_background_color',
                        'description' => esc_html__('Icon Hover Background Color (only for square and circle icon type)', 'coyote'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Color', 'coyote'),
                        'param_name'  => 'icon_border_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'coyote'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Hover Color', 'coyote'),
                        'param_name'  => 'icon_border_hover_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'coyote'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Border Width', 'coyote'),
                        'param_name'  => 'icon_border_width',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'coyote'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => esc_html__('Enable Icon Overlay','coyote'),
                        'param_name'    => 'icon_overlay',
                        'value'         => array(
                            esc_html__('Yes','coyote') => 'yes',
                            esc_html__('No','coyote') => 'no',
                        ),
                        'dependency' => array('element' => 'custom_icon', 'not_empty' => true),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => esc_html__('Icon Overlay Skin','coyote'),
                        'param_name'    => 'icon_overlay_skin',
                        'value'         => array(
                            esc_html__('Light','coyote') => 'light',
                            esc_html__('Dark','coyote') => 'dark',
                        ),
                        'dependency' => array('element' => 'icon_overlay', 'value' => array('yes')),
                        'group'       => esc_html__('Icon Settings','coyote'),
                    ),
                    array(
                        'type'			=> 'dropdown',
                        'heading'		=> esc_html__('Show Separator','coyote'),
                        'param_name'	=> 'show_separator',
                        'value'			=> array(
                            esc_html__('Yes','coyote') => 'yes',
                            esc_html__('No','coyote') => 'no',
                        ),
                        'dependency' => array('element' => 'icon_position', 'value' => array('top')),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Title', 'coyote'),
                        'param_name'  => 'title',
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
                        'group'      => esc_html__('Text Settings','coyote')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Title Color', 'coyote'),
                        'param_name' => 'title_color',
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings','coyote')
                    ),
                    array(
                        'type'       => 'textarea',
                        'heading'    => esc_html__('Text', 'coyote'),
                        'param_name' => 'text'
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Text Color', 'coyote'),
                        'param_name' => 'text_color',
                        'dependency' => array('element' => 'text', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings','coyote')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'coyote'),
                        'param_name'  => 'link',
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Link Text', 'coyote'),
                        'param_name' => 'link_text',
                        'description'=> esc_html__('If not entered link will be set on icon', 'coyote'),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Target', 'coyote'),
                        'param_name' => 'target',
                        'value'      => array(
                            ''      => '',
							esc_html__('Self', 'coyote')  => '_self',
							esc_html__('Blank','coyote') => '_blank'
                        ),
                        'dependency' => array('element' => 'link', 'not_empty' => true),
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Left Padding (px)', 'coyote'),
                        'param_name' => 'text_left_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('left')),
                        'group'      => esc_html__('Text Settings','coyote')
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Right Padding (px)', 'coyote'),
                        'param_name' => 'text_right_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('right')),
                        'group'      => esc_html__('Text Settings','coyote')
                    )
                )
            )
        ));
    }

    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'custom_icon'                 => '',
            'icon_position'               => '',
            'icon_type'                   => '',
            'icon_size'                   => '',
            'custom_icon_size'            => '',
            'icon_animation'              => '',
            'icon_animation_delay'        => '',
            'icon_margin'                 => '',
            'shape_size'                  => '',
            'icon_color'                  => '',
            'icon_hover_color'            => '',
            'icon_background_color'       => '',
            'icon_hover_background_color' => '',
            'icon_border_color'           => '',
            'icon_border_hover_color'     => '',
            'icon_border_width'           => '',
            'icon_overlay'                => 'yes',
            'icon_overlay_skin'           => 'light',
            'show_separator'	          => 'yes',
            'title'                       => '',
            'title_tag'                   => 'h5',
            'title_color'                 => '',
            'text'                        => '',
            'text_color'                  => '',
            'link'                        => '',
            'link_text'                   => '',
            'target'                      => '_self',
            'text_left_padding'           => '',
            'text_right_padding'          => ''
        );

        $default_atts = array_merge($default_atts, coyote_edge_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['holder_classes']  = $this->getHolderClasses($params);
        $params['title_styles']    = $this->getTitleStyles($params);
        $params['content_styles']  = $this->getContentStyles($params);
        $params['text_styles']     = $this->getTextStyles($params);
        $params['icon_holder_styles'] = $this->getIconHolderStyles($params);
        $params['separator_params'] = $this->getSeparatorParams($params);

        return coyote_edge_get_shortcode_module_template_part('templates/iwt', 'icon-with-text', $params['icon_position'], $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = coyote_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = $params['custom_icon_size'];
            }

            if(!empty($params['icon_type'])) {
                $params_array['type'] = $params['icon_type'];
            }

            $params_array['shape_size'] = $params['shape_size'];

            if(!empty($params['icon_border_color'])) {
                $params_array['border_color'] = $params['icon_border_color'];
            }

            if(!empty($params['icon_border_hover_color'])) {
                $params_array['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if(!empty($params['icon_border_width'])) {
                $params_array['border_width'] = $params['icon_border_width'];
            }

            if(!empty($params['icon_background_color'])) {
                $params_array['background_color'] = $params['icon_background_color'];
            }

            if(!empty($params['icon_hover_background_color'])) {
                $params_array['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $params_array['icon_color'] = $params['icon_color'];

            if(!empty($params['icon_hover_color'])) {
                $params_array['hover_icon_color'] = $params['icon_hover_color'];
            }

			if (!empty($params['link']) && empty($params['link_text'])){
				$params_array['link'] = $params['link'];

				if (!empty($params['target'])){
					$params_array['target'] = $params['target'];
				}
			}
			
            $params_array['icon_animation']       = $params['icon_animation'];
            $params_array['icon_animation_delay'] = $params['icon_animation_delay'];
        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $classes = array('edgtf-iwt', 'clearfix');

        if(!empty($params['icon_position'])) {
            switch($params['icon_position']) {
                case 'top':
                    $classes[] = 'edgtf-iwt-icon-top';
                    break;
                case 'left':
                    $classes[] = 'edgtf-iwt-icon-left';
                    break;
                case 'right':
                    $classes[] = 'edgtf-iwt-icon-right';
                    break;
                case 'left-from-title':
                    $classes[] = 'edgtf-iwt-left-from-title';
                    break;
                default:
                    break;
            }
        }

        if(!empty($params['icon_size'])) {
            $classes[] = 'edgtf-iwt-'.str_replace('edgtf-', '', $params['icon_size']);
        }

        if(!empty($params['icon_overlay']) && ($params['icon_overlay'] === 'yes') && !empty($params['custom_icon'])) {
            $classes[] = 'edgtf-with-overlay';

            $classes[] = 'edgtf-overlay-'.$params['icon_overlay_skin'];
        }

        return $classes;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        return $styles;
    }

    private function getIconHolderStyles($params) {
        $styles = array();

        if(!empty($params['icon_margin'])) {
            $styles[] = 'margin: '.$params['icon_margin'];
        }

        return $styles;
    }

    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        return $styles;
    }

    private function getContentStyles($params) {
        $styles = array();

        if($params['icon_position'] == 'left' && !empty($params['text_left_padding'])) {
            $styles[] = 'padding-left: '.coyote_edge_filter_px($params['text_left_padding']).'px';
        }

        if($params['icon_position'] == 'right' && !empty($params['text_right_padding'])) {
            $styles[] = 'padding-right: '.coyote_edge_filter_px($params['text_right_padding']).'px';
        }

        return $styles;
    }

    private function getSeparatorParams($params) {
        $separator_params = array();

        $separator_params['type'] = 'normal';
        $separator_params['position'] = 'center';
        $separator_params['border_style'] = 'solid';

        return $separator_params;

    }
}