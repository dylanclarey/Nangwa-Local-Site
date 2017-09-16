<li class="edgtf-blog-list-item clearfix">
	<div class="edgtf-blog-list-item-inner">
		<?php if ($show_image == 'yes' && has_post_thumbnail()) { ?>
			<div class="edgtf-item-image">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php
						 echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
					?>
				</a>
			</div>
		<?php } ?>
		<div class="edgtf-item-text-holder">
			<<?php echo esc_html( $title_tag)?> class="edgtf-item-title">
                <a href="<?php echo esc_url(get_permalink()) ?>" >
                    <?php echo esc_attr(get_the_title()) ?>
                </a>
		    </<?php echo esc_html($title_tag) ?>>
			<div class="edgtf-item-info-section">
				<?php coyote_edge_post_info(array(
					'date' => 'yes',
					'author' => 'yes',
					'category' => 'yes'
				)) ?>
			</div>
						
			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p class="edgtf-excerpt"><?php echo esc_html($excerpt)?>...</p>
			<?php } ?>

			<?php 
			if (shortcode_exists('edgtf_separator')) {
				echo coyote_edge_execute_shortcode('edgtf_separator',array('position' => 'left')); 
			} else { ?>
				<div class="edgtf-separator-holder clearfix  edgtf-separator-left">
					<div class="edgtf-separator"></div>
				</div>
			<?php } ?>

            <div class="edgtf-post-info-bottom">
                <div class="edgtf-post-info-bottom-left">
                    <?php coyote_edge_post_info(array(
                        'comments' => 'yes',
                        'like' => 'yes'
                    )) ?>
                </div>
                <div class="edgtf-post-info-bottom-right">
                    <?php echo coyote_edge_get_button_html(array(
                        'type' => 'transparent',
                        'link' => get_the_permalink(),
                        'text' => esc_html__('Read More', 'coyote'),
                        'custom_class' => 'edgtf-blog-btn-read-more'
                    )); ?>
                </div>
            </div>
		</div>
	</div>	
</li>