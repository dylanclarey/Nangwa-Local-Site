<?php

class CoyoteEdgeRawHTMLWidget extends CoyoteEdgeWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_raw_html_widget',
            esc_html__( 'Edge Raw HTML Widget', 'coyote' ),
            array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'coyote' ) )
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'extra_class',
                'title' => esc_html__( 'Extra Class Name', 'coyote' )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__( 'Widget Title', 'coyote' )
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'widget_grid',
                'title'   => esc_html__( 'Widget Grid', 'coyote' ),
                'options' => array(
                    ''     => esc_html__( 'Full Width', 'coyote' ),
                    'auto' => esc_html__( 'Auto', 'coyote' )
                )
            ),
            array(
                'type'  => 'textarea',
                'name'  => 'content',
                'title' => esc_html__( 'Content', 'coyote' )
            )
        );
    }

    public function widget( $args, $instance ) {
        $extra_class   = array();
        $extra_class[] = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
        $extra_class[] = ! empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'edgtf-grid-auto-width' : '';
        ?>

        <div class="widget edgtf-raw-html-widget <?php echo esc_attr( implode( ' ', $extra_class ) ); ?>">
            <?php


            if ( ! empty( $instance['widget_title'] ) ) {
                echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
            }
            if ( ! empty( $instance['content'] ) ) {
                print $instance['content'];
            }
            ?>
        </div>
        <?php
    }
}