<?php
namespace CoyoteEdge\Modules\Shortcodes\RestaurantMenuItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class RestaurantMenuItem implements ShortcodeInterface{
    private $base;

    function __construct() {
        $this->base = 'edgtf_restaurant_menu_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if(function_exists('vc_map')){
            vc_map(
                array(
                    'name' => esc_html__('Restaurant Menu Item', 'coyote'),
                    'base' => $this->base,
                    'as_child' => array('only' => 'edgtf_restaurant_menu'),
                    'category' => esc_html__('by EDGE', 'coyote'),
                    'icon' => 'icon-wpb-restaurant-menu-item extended-custom-icon',
                    'params' =>	array(
                        array(
                            'type' => 'textfield',
                            'class' => '',
                            'heading' => esc_html__('Item Title', 'coyote'),
                            'param_name' => 'title',
                            'value' => '',
                            'description' => ''
                        ),
                        array(
                            'type' => 'colorpicker',
                            'class' => '',
                            'heading' => esc_html__('Item Title Border Bottom Color', 'coyote'),
                            'param_name' => 'title_border_bottom_color',
                            'value' => '',
                            'description' => ''
                        ),
                        array(
                            'type'       => 'dropdown',
                            'heading'    =>esc_html__( 'Title Tag', 'coyote'),
                            'param_name' => 'title_tag',
                            'value'      => array(
                                ''   => '',
                                'h2' => 'h2',
                                'h3' => 'h3',
                                'h4' => 'h4',
                                'h5' => 'h5',
                                'h6' => 'h6',
                            ),
                            'dependency' => array('element' => 'title', 'not_empty' => true)
                        ),
                        array(
                            'type'       => 'dropdown',
                            'heading'    => esc_html__( 'Mark as Trending?', 'coyote'),
                            'param_name' => 'trending_item',
                            'value'      => array(
                                esc_html__('No', 'coyote')   => 'no',
                                esc_html__('Yes', 'coyote')   => 'yes'
                            ),
                            'dependency' => array('element' => 'title', 'not_empty' => true)
                        ),
                        array(
                            'type' => 'textfield',
                            'class' => '',
                            'heading' => esc_html__('Currency', 'coyote'),
                            'param_name' => 'currency',
                            'value' => '',
                            'description' => esc_html__('Default is "$"', 'coyote')
                        ),
                        array(
                            'type' => 'textfield',
                            'class' => '',
                            'heading' =>esc_html__( 'Price', 'coyote'),
                            'param_name' => 'price',
                            'value' => '',
                            'description' => ''
                        ),
                        array(
                            'type' => 'dropdown',
                            'class' => '',
                            'heading' => esc_html__('Show Item Image', 'coyote'),
                            'param_name' => 'show_item_image',
                            'value' => array(
                                esc_html__('No','coyote') => 'no',
                                esc_html__('Yes','coyote') => 'yes',
                            ),
                            'save_always' => true,
                            'description' => ''
                        ),
                        array(
                            'type' => 'attach_image',
                            'class' => '',
                            'heading' => esc_html__('Item Image', 'coyote'),
                            'param_name' => 'item_image',
                            'value' => '',
                            'description' => '',
                            'dependency' => array(
                                'element' => 'show_item_image',
                                'value'  => 'yes'
                            )
                        ),
                        array(
                            'type' => 'textfield',
                            'class' => '',
                            'heading' =>esc_html__( 'Description', 'coyote'),
                            'param_name' => 'description',
                            'value' => '',
                            'description' => ''
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'title' => '',
            'title_tag' => 'h5',
            'title_border_bottom_color' => '',
            'trending_item' => 'no',
            'currency' => '$',
            'show_item_image' => '',
            'item_image' => '',
            'price' => '',
            'description' => ''
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['title_style'] = $this->getTitleStyles($params);
        $params['item_classes'] = $this->getItemClasses($params);

        $html = coyote_edge_get_shortcode_module_template_part('templates/item-template', 'restaurant-menu', '', $params);

        return $html;
    }

    private function getTitleStyles($params){

        $title_style = array();
        if($params['title_border_bottom_color'] !== ''){

            $title_style[] = 'border-color: '. $params['title_border_bottom_color'];

        }
        return $title_style;
    }

    private function getItemClasses($params) {
        $item_classes = 'edgtf-restaurantmenu-item';

        return $item_classes;
    }
}
