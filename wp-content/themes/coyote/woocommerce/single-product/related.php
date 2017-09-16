<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<div class="edgtf-related-products-title-holder">
			<div class="edgtf-related-nav-holder">
				<span class="edgtf-related-prev"><span class="icon-arrows-slim-left"></span><span class="edgtf-related-nav-text"><?php esc_html_e('Prev','coyote')?></span></span>
				<span class="edgtf-related-glob"><a href="<?php echo get_permalink( get_option( 'woocommerce_shop_page_id' ) ); ?>"><span class="icon_grid-3x3"></span></a></span>
				<span class="edgtf-related-next"><span class="edgtf-related-nav-text"><?php esc_html_e('Next','coyote')?></span><span class="icon-arrows-slim-right"></span></span>
			</div>
		</div>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();