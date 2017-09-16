<?php

class CoyoteEdgeFullScreenMenuOpener extends CoyoteEdgeWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_full_screen_menu_opener', // Base ID
            esc_html__('Edge Full Screen Menu Opener','coyote') // Name
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color',  'coyote'),
				'description'	=> esc_html__('Define color for Side Area opener icon','coyote'),
			)
		);

	}

    public function widget($args, $instance) {

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}


		$icon_size = '';
		if (coyote_edge_options()->getOptionValue('fullscreen_menu_icon_size') !== '' ) {
			$icon_size = coyote_edge_options()->getOptionValue('fullscreen_menu_icon_size');
		}
		?>

        <a href="javascript:void(0)" class="edgtf-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
            <span class="edgtf-fullscreen-menu-opener-inner">
				<span class="edgtf-fullscreen-icon ion-navicon" <?php coyote_edge_inline_style($fullscreen_icon_styles); ?>></span>
				<span class="edgtf-fullscreen-icon-close lnr lnr-cross"></span>
            </span>
        </a>
    <?php }

}