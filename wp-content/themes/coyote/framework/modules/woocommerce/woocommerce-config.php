<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for WooCommerce
add_theme_support( 'woocommerce' );

// Disable the default WooCommerce stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if (!function_exists('coyote_edge_woocommerce_content')){
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function coyote_edge_woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else {

			if ( have_posts() ) :

				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				woocommerce_product_subcategories();

				while ( have_posts() ) : the_post();

					wc_get_template_part( 'content', 'product' );

				endwhile; // end of the loop.

				woocommerce_product_loop_end();

				do_action( 'woocommerce_after_shop_loop' );

			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

				wc_get_template( 'loop/no-products-found.php' );

			endif;

		}
	}
}

//Define number of products per page
add_filter('loop_shop_per_page', 'coyote_edge_woocommerce_products_per_page', 20);

//Set number of related products
add_filter( 'woocommerce_output_related_products_args', 'coyote_edge_woocommerce_related_products_args');

//Overide Product List Loop Title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'coyote_edge_woocommerce_template_loop_product_title', 10 );

//Override Product List Loop Add To Cart
add_filter('woocommerce_loop_add_to_cart_link', 'coyote_edge_woocommerce_loop_add_to_cart_link');

//Product List Masonry Loop Add To Cart
add_action('coyote_edge_woocommerce_loop_masonry_add_to_cart_link', 'coyote_edge_woocommerce_loop_masonry_add_to_cart_link', 5);

//Single Product Title template override
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'coyote_edge_woocommerce_template_single_title', 5 );

//Single product add social share
add_action( 'woocommerce_share', 'coyote_edge_woocommerce_share', 70);

//Sale flash template override
add_filter( 'woocommerce_sale_flash', 'coyote_edge_woocommerce_sale_flash');

// Out of stock badge
add_action( 'woocommerce_before_shop_loop_item_title', 'coyote_edge_woocommerce_out_of_stock_flash');

//Override Checkout Fields
add_filter('woocommerce_checkout_fields', 'coyote_edge_custom_override_checkout_fields');

//Set Woocommerce button style
//Simple and grouped products
add_action('coyote_edge_woocommerce_add_to_cart_button', 'coyote_edge_get_woocommerce_add_to_cart_button');

//External product
add_action('coyote_edge_woocommerce_add_to_cart_button_external', 'coyote_edge_get_woocommerce_add_to_cart_button_external');

//Variable product
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'woocommerce_single_variation', 'coyote_edge_woocommerce_single_variation_add_to_cart_button', 20 );

//Apply Coupon Button
add_action('coyote_edge_woocommerce_apply_coupon_button', 'coyote_edge_get_woocommerce_apply_coupon_button');

//Update Cart
add_action('coyote_edge_woocommerce_update_cart_button', 'coyote_edge_get_woocommerce_update_cart_button');

//Proceed To Checkout Button
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
add_action( 'woocommerce_proceed_to_checkout', 'coyote_edge_woocommerce_button_proceed_to_checkout', 20 );

//Update Totals Button, Shipping Calculator
add_action('coyote_edge_woocommerce_update_totals_button', 'coyote_edge_get_woocommerce_update_totals_button');

//Pay For Order Button, Checkout page
add_filter('woocommerce_pay_order_button_html', 'coyote_edge_woocommerce_pay_order_button_html');

//Place Order Button, Checkout page
add_filter('woocommerce_order_button_html', 'coyote_edge_woocommerce_order_button_html');

//Override Review Form (Single Product)
add_filter('woocommerce_product_review_comment_form_args', 'coyote_edge_woocommerce_single_review_form');

// Remove price if a product is out of stock on single product and list
add_action('woocommerce_single_product_summary','coyote_edge_woocommerce_out_of_stock_price_single',1);

//Reorder price
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
add_action('woocommerce_shop_loop_item_title','coyote_edge_woocommerce_out_of_stock_price_list',1);

//Add categories
add_action('woocommerce_after_shop_loop_item_title','coyote_edge_woocommerce_product_categories',10);

//Remove product rating from loop
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

//Reorder add to cart button
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
add_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',1);

//Reorder link
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',15);

// Add navigation for products
add_action('coyote_edge_single_related_products','coyote_edge_woocommerce_product_navigation',15);

//Gravatar image size for reviews
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before', 'coyote_edge_woocommerce_review_display_gravatar', 10 );

//Reviews rating comment meta(text)
remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
add_action( 'woocommerce_review_meta', 'coyote_edge_woocommerce_review_display_meta', 10 );

//Filter single post thumbnails html
add_action( 'woocommerce_product_thumbnails', 'coyote_edge_woocommerce_before_thumbnails', 15 );
add_action( 'woocommerce_product_thumbnails', 'coyote_edge_woocommerce_after_thumbnails', 25 );

//Reorder related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('coyote_edge_single_related_products','woocommerce_output_related_products',10);

//Reorder tabs
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
add_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs',60);

//Review Comment Form adj for 3.0
add_filter('woocommerce_product_review_comment_form_args','coyote_edge_woocommerce_review_comment_form_args');