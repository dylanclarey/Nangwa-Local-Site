<?php 
$back_to_link = get_post_meta( get_the_ID(), 'portfolio_single_back_to_link', true );
?>
<div class="edgtf-portfolio-list-holder-outer edgtf-ptf-gallery edgtf-portfolio-slider-holder edgtf-portfolio-related-holder edgtf-ptf-hover-zoom-out-simple edgtf-ptf-nav-hidden" data-items='3'>
	<div class="edgtf-related-nav-holder">
		<span class="edgtf-related-prev"><span class="icon-arrows-slim-left"></span><span class="edgtf-related-nav-text"><?php esc_html_e('Prev','coyote')?></span></span>
		<?php if ( $back_to_link !== '' ) : ?>
			<div class="edgtf-portfolio-back-btn">
				<a href="<?php echo esc_url( get_permalink( $back_to_link ) ); ?>">
					<span class="icon_grid-3x3"></span>
				</a>
			</div>
		<?php endif; ?>
		<span class="edgtf-related-next"><span class="edgtf-related-nav-text"><?php esc_html_e('Next','coyote')?></span><span class="icon-arrows-slim-right"></span></span>
	</div>
    <div class="edgtf-portfolio-list-holder clearfix">
        <?php
        $query = coyote_edge_get_related_post_type(get_the_ID(), array('posts_per_page' => '6'));
        if (is_object($query)) {
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    $id = get_the_ID();
                    $item_link = get_permalink($id);
                    if (get_post_meta($id, 'portfolio_external_link', true) !== '') {
                        $item_link = get_post_meta($id, 'portfolio_external_link', true);
                    }

                    $categories = wp_get_post_terms($id, 'portfolio-category');
                    $category_html = '';
                    $k = 1;
                    foreach ($categories as $cat) {
                        $category_html .= '<span>' . $cat->name . '</span>';
                        if (count($categories) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }
                    ?>
                    <article class="edgtf-portfolio-item mix">
	                    <div class="edgtf-portfolio-item-inner">
	                    	<div class = "edgtf-item-image-holder">
								<a class="edgtf-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>
									<?php
										echo get_the_post_thumbnail(get_the_ID(),'coyote_edge_landscape');
									?>
								<div class="edgtf-item-text-overlay">
									<div class="edgtf-item-text-overlay-inner">
										<div class="edgtf-item-text-holder">
											<h4 class="edgtf-item-title">
												<a class="edgtf-portfolio-title-link" href="<?php echo esc_url($item_link); ?>">
													<?php echo esc_attr(get_the_title()); ?>
												</a>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </article>
                <?php } ?>
                <?php
            endwhile;
            endif;
            wp_reset_postdata();
        } else { ?>
            <p><?php esc_html_e('No related portfolios were found.', 'coyote'); ?></p>
        <?php }
        ?>
    </div>
</div>

