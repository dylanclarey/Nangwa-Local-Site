<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
    exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

    <?php do_action( 'woocommerce_product_meta_start' ); ?>

    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) { ?>

        <span class="sku_wrapper"><h5 class="edgtf-info-meta-title"><?php esc_html_e( 'SKU:', 'coyote' ); ?></h5><span class="sku edgtf-info-meta-content"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html_e( 'N/A', 'coyote' ); ?></span></span>

    <?php } ?>

    <?php 
		print wc_get_product_category_list( $product->get_id(), '<span class="edgtf-product-meta-separator">, </span>', '<span class="posted_in"><h5 class="edgtf-info-meta-title">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'coyote' ) . '</h5><span class="edgtf-info-meta-content">', '</span></span>');
		print wc_get_product_tag_list( $product->get_id(), '<span class="edgtf-product-meta-separator">, </span>', '<span class="tagged_as"><h5 class="edgtf-info-meta-title">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'coyote' ) . '</h5><span class="edgtf-info-meta-content">', '</span></span>');
	 ?>

    <?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>