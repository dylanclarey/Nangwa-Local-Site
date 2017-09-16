<?php

/*************** YITH QUICK VIEW CONTENT FILTERS - begin ***************/
$this_element = YITH_WCQV_Frontend::get_instance();

//Override product title
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'yith_wcqv_product_summary', 'coyote_edge_woocommerce_yith_template_single_title', 5 );

//Remove quick view
remove_action( 'woocommerce_after_shop_loop_item', array($this_element, 'yith_add_quick_view_button'), 15 );
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//Remove default actions for product image and add custom
remove_action('yith_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10);
remove_action('yith_wcqv_product_image', 'woocommerce_show_product_images', 20);
add_action('yith_wcqv_product_image', 'coyote_edge_woocommerce_show_product_images', 9);

//Add yith quick view button
add_action( 'coyote_edge_woocommerce_masonry_quick_view', 'coyote_edge_woocommerce_quickview_link', 2 );

//Add additional html around single product summary
add_action('yith_wcqv_product_summary', 'coyote_edge_woocommerce_quick_view_tag_before', 1);
add_action('yith_wcqv_product_summary', 'coyote_edge_woocommerce_quick_view_tag_after', 35);

//Add social share (default woocommerce_share)
add_action( 'yith_wcqv_product_summary', 'coyote_edge_woocommerce_share', 32 );

//Remove product meta
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );


/*************** YITH QUICK VIEW CONTENT FILTERS - end ***************/

