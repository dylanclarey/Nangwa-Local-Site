<div class="edgtf-blog-carousel-item">
	<?php if($show_image == 'yes' && has_post_thumbnail()) { ?>
		<div class="edgtf-blog-slide-image">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ($image_size != 'custom') {
						the_post_thumbnail($image_size);
					} else {
						print coyote_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $image_width, $image_height);
					}
                ?>
			</a>
		</div>
	<?php } ?>
	<div class="edgtf-blog-slide-info-holder clearfix">
		<div class="edgtf-item-info-section">
			<?php coyote_edge_post_info(array(
				'category' => 'yes'
			)) ?>
			<?php coyote_edge_post_info(array(
				'date' => 'yes',
			)) ?>
		</div>

		<h3 class="edgtf-blog-slide-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if ($text_length != '0') {
			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
			<p class="edgtf-blog-slide-excerpt"><?php echo esc_html($excerpt)?>...</p>
		<?php } ?>

		<div class="edgtf-item-read-more">
			<?php echo coyote_edge_get_button_html(array(
				'type' => 'transparent',
				'size' => 'large',
				'link' => get_the_permalink(),
				'text' => esc_html__('Read More', 'coyote'),
				'icon_pack' => 'font_elegant',
				'fe_icon' => 'arrow_right'
			)); ?>
		</div>
	</div>
</div>