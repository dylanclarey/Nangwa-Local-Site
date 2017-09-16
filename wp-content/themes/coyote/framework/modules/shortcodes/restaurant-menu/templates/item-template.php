<div <?php coyote_edge_class_attribute($item_classes); ?>>

    <?php
    if($show_item_image === 'yes' && $item_image !== ''){ ?>

        <div class="edgtf-restaurantmenu-item-image">
            <?php echo wp_get_attachment_image( $item_image, array(52,52) ); ?>
        </div>

    <?php } ?>

    <div class="edgtf-restaurantmenu-item-inner">

        <?php if ($title !== '' || $price !== '' ) {?>

        <div class="edgtf-restaurantmenu-title-price-holder clearfix">

            <?php if ($title !== '') { ?>

            <<?php echo esc_attr($title_tag);?> class="edgtf-restaurantmenu-title">
            <span class="edgtf-restaurantmenu-title-area" <?php echo coyote_edge_get_inline_style($title_style) ?>>
							<?php echo esc_html($title); ?>
                <?php if($trending_item ===  'yes'){?>
                    <span class="edgtf-restaurantmenu-trending-item icon_star"></span>
                <?php } ?>
						</span>
        </<?php echo esc_attr($title_tag);?>>
    <?php }

    if ($price !== '') { ?>

        <div class="edgtf-restaurantmenu-price-holder">
            <h5 class="edgtf-restaurantmenu-price">
                <?php echo esc_html($currency); ?><?php echo esc_html($price); ?>
            </h5>
        </div>

    <?php } ?>

    </div>

<?php } ?>

    <?php if ($description !== '') { ?>
        <p class="edgtf-restaurantmenu-desc"><?php echo esc_html($description); ?></p>
    <?php } ?>
</div>
</div>