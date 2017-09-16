<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class CoyoteEdgeSeparatorWidget extends CoyoteEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_separator_widget', // Base ID
            esc_html__('Edge Separator Widget','coyote') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'coyote'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'coyote'),
                    'full-width' => esc_html__('Full Width', 'coyote'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'coyote'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'coyote'),
                    'left' => esc_html__('Left', 'coyote'),
                    'right' => esc_html__('Right', 'coyote'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'coyote'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'coyote'),
                    'dashed' => esc_html__('Dashed', 'coyote'),
                    'dotted' => esc_html__('Dotted','coyote'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'coyote'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'coyote'),
                'name' => 'width',
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'coyote'),
                'name' => 'thickness',
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'coyote'),
                'name' => 'top_margin',
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'coyote'),
                'name' => 'bottom_margin',
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[edgtf_separator $params]"); // XSS OK

        echo '</div>'; //close div.edgtf-separator-widget
    }
}