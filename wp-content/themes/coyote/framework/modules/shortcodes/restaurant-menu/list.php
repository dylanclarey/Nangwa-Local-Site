<?php
namespace CoyoteEdge\Modules\Shortcodes\RestaurantMenu;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class RestaurantMenu implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'edgtf_restaurant_menu';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map( array(
            'name' => esc_html__('Restaurant Menu', 'coyote'),
            'base' => $this->base,
            'icon' => 'icon-wpb-restaurant-menu extended-custom-icon',
            'category' =>  esc_html__('by EDGE','coyote'),
            'as_parent' => array('only' => 'edgtf_restaurant_menu_item'),
            'js_view' => 'VcColumnView',
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__( 'Background Color','coyote'),
                    'param_name' => 'background_color',
                    'value' => '',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Skin',
                    'param_name' => 'skin',
                    'value' => array(
                        'Default' => 'default',
                        'Light' => 'light',
                    )
                ),
                array(
                    'type'       => 'dropdown',
                    'param_name' => 'number_of_columns',
                    'heading'    => esc_html__('Number of Columns', 'coyote'),
                    'value'      => array(
                        esc_html__('One', 'coyote') => '1',
                        esc_html__('Two', 'coyote') => '2',
                    ),
                    'save_always' => true
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'background_color' => '',
            'skin'             => '',
            'number_of_columns'=> '',
        );

        $params = shortcode_atts($args, $atts);

        $restaurant_menu_style = '';
        if ($params['background_color'] !== ''){
            $restaurant_menu_style .= 'background-color: '.$params['background_color'].';';
        }

        $holder_classes = 'edgtf-restaurant-menu';

        if($params['skin'] == 'light') {
            $holder_classes .= ' edgtf-restaurant-menu-light';
        }

        if($params['number_of_columns'] == '2') {
            $holder_classes .= ' edgtf-restaurant-menu-two-columns clearfix';
        }

        $html = '';

        $html .= '<div class="'.$holder_classes.'" '.coyote_edge_get_inline_style($restaurant_menu_style).'>';
        $html .= '<div class="edgtf-restaurant-menu-holder">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }

}
