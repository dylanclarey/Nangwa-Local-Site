<div class='edgtf-shop-product <?php echo esc_attr($image_size_class); echo esc_html($cats);  echo esc_attr($out_stock_class);  echo esc_attr($on_sale_class);?>'>
	<a href="<?php the_permalink(); ?>" class="edgtf-masonry-product-item-link"></a>
    <div class="edgtf-masonry-product-image-holder">
    <?php
    	echo woocommerce_get_product_thumbnail($thumb_size);
    ?>
    </div>
    <div class="edgtf-masonry-product-meta-wrapper">
        <div class="edgtf-masonry-product-overlay-outer">
	        <div class="edgtf-masonry-product-overlay-inner">
	            <div class="edgtf-masonry-product-quick-view">
	                <?php
	                /**
	                 * coyote_edge_woocommerce_masonry_quick_view hook
	                 *
	                 * @hooked coyote_edge_woocommerce_quickview_link - 2
	                 */
	                do_action( 'coyote_edge_woocommerce_masonry_quick_view' );

	                ?>
	            </div>
	            <div class="edgtf-masonry-product-button">
	                <?php
	                /**
	                 * coyote_edge_woocommerce_loop_masonry_add_to_cart_link hook
	                 *
	                 * @hooked coyote_edge_woocommerce_loop_masonry_add_to_cart_link - 5
	                 */
	                do_action( 'coyote_edge_woocommerce_loop_masonry_add_to_cart_link' );

	                ?>
	            </div>
	        </div>
        </div>
    </div>
</div>
