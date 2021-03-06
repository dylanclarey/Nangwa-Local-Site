<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$product_id = '';

$product_id = $product->get_id();
?>

<li>
	<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php print $product->get_image('thumbnail'); ?>
	</a>
	<div>
		<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<span class="product-title"><?php print $product->get_title(); ?></span>
		</a>
		<?php if ( ! empty( $show_rating ) ) {
			print wc_get_rating_html( $product->get_average_rating() );			
		} ?>
		<?php print $product->get_price_html(); ?>
	</div>
</li>
