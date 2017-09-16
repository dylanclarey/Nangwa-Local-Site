<div <?php coyote_edge_class_attribute($si_slasses); ?>>
	<div class="edgtf-si-images-holder">
		<div class="edgtf-si-images-holder-table">
			<div class="edgtf-si-images-holder-cell">
				<div class="edgtf-si-images-holder-inner">
					<div class="edgtf-si-hero-image-holder">
						<a href="<?php echo esc_url($hero_image_link) ?>" target="<?php echo esc_attr($hero_image_link_target);?>">
							<img src="<?php echo wp_get_attachment_url($hero_image); ?>" alt="<?php echo get_the_title($hero_image);?>">
						</a>
					</div>
					<div class="edgtf-si-aux-image-holder edgtf-si-aux-image-1">
						<img src="<?php echo wp_get_attachment_url($aux_image_1); ?>" alt="<?php echo get_the_title($aux_image_1);?>">
					</div>
					<div class="edgtf-si-aux-image-holder edgtf-si-aux-image-2">
						<img src="<?php echo wp_get_attachment_url($aux_image_2); ?>" alt="<?php echo get_the_title($aux_image_2);?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="edgtf-si-text-content-holder">
		<div class="edgtf-si-title-holder">
            <h2 class="edgtf-si-title" <?php echo coyote_edge_get_inline_style($title_styles); ?>><?php echo esc_attr($title); ?></h2>
		</div>
		<div class="edgtf-si-subtitle-holder">
			<h4 class="edgtf-si-subtitle" <?php echo coyote_edge_get_inline_style($subtitle_styles); ?>><?php echo esc_attr($subtitle); ?></h4>
		</div>
		<div class="edgtf-si-text-holder">
			<p class="edgtf-si-text" <?php echo coyote_edge_get_inline_style($text_styles); ?>><?php echo esc_attr($text); ?></p>
		</div>
		<div class="edgtf-button-holder">
			<?php echo coyote_edge_get_button_html($button_params); ?>
		</div>
	</div>
</div>