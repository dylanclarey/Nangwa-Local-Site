<?php

class CoyoteEdgeSideAreaOpener extends CoyoteEdgeWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_side_area_opener', // Base ID
            esc_html__('Edge Side Area Opener','coyote') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color', 'coyote'),
				'description'	=> esc_html__('Define color for Side Area opener icon', 'coyote'),
			)
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}
		
		$icon_size = '';
		if ( coyote_edge_options()->getOptionValue('side_area_predefined_icon_size') ) {
			$icon_size = coyote_edge_options()->getOptionValue('side_area_predefined_icon_size');
		}
		?>
        <a class="edgtf-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php coyote_edge_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
			<span class="edgtf-side-area-icon-dot-1"></span>
			<span class="edgtf-side-area-icon-dot-2"></span>
			<span class="edgtf-side-area-icon-dot-3"></span>
			<span class="edgtf-side-area-icon-dot-4"></span>
			<span class="edgtf-side-area-icon-dot-5"></span>
			<span class="edgtf-side-area-icon-dot-6"></span>
			<span class="edgtf-side-area-icon-dot-7"></span>
			<span class="edgtf-side-area-icon-dot-8"></span>
			<span class="edgtf-side-area-icon-dot-9"></span>
        </a>

    <?php }

}