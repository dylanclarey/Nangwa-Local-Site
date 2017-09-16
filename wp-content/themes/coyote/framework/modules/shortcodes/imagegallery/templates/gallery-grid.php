<div class="edgtf-image-gallery">
	<div <?php coyote_edge_class_attribute($classes)?>>
		<?php foreach ($images as $image) { ?>
			<div class="edgtf-gallery-image">
				<?php if ($pretty_photo) { ?>
					<a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
				<?php } 
				elseif ($image['link'] !== '') { ?>
					<a class="edgtf-ig-link" href="<?php echo esc_url($image['link'])?>" target="<?php echo esc_attr($image['link_target']);?>">
						<div class="edgtf-ig-overlay">
							<?php if ($image['title'] !== ''){ ?>
								<div class="edgtf-ig-overlay-table">
									<div class="edgtf-ig-overlay-table-cell">
										<h3 class="edgtf-ig-overlay-title"><?php echo esc_html($image['title']); ?></h3>
									</div>
								</div>
							<?php } ?>
						</div>
				<?php } ?>
					<div class="edgtf-ig-image-holder">
						<?php if(is_array($image_size) && count($image_size)) : ?>
							<?php echo coyote_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
						<?php else: ?>
							<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
						<?php endif; ?>
					</div>
				<?php if ($pretty_photo || $image['link'] !== '') {?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>