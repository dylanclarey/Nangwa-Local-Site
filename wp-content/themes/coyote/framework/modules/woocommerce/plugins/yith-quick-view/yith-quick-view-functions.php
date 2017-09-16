<?php

if(!function_exists('coyote_edge_woocommerce_quickview_link')) {
	/**
	 * Function that returns quick view link
	 */
	function coyote_edge_woocommerce_quickview_link(){
		global $product;

		$product_id = $product->get_id();

		print '<div class="edgtf-yith-wcqv-holder"><a href="#" class="yith-wcqv-button" data-product_id="'.$product_id.'"><span>'.esc_html__('QUICK LOOK', 'coyote').'</span></a></div>';

	}
}

if(!function_exists('coyote_edge_woocommerce_disable_yith_pretty_photo')) {
	/**
	 * Function that disable YITH Quick View pretty photo style
	 */
	function coyote_edge_woocommerce_disable_yith_pretty_photo() {
		//is woocommerce installed?
		if(coyote_edge_is_woocommerce_installed() && coyote_edge_is_yith_wcqv_install()) {

			wp_deregister_style('woocommerce_prettyPhoto_css');
		}
	}

	add_action('wp_footer', 'coyote_edge_woocommerce_disable_yith_pretty_photo');
}