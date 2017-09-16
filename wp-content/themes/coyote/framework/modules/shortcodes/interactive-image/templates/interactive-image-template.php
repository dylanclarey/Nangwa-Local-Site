<div class="edgtf-interactive-image-wrapper <?php echo esc_attr($holder_classes); ?>">
	<?php if ($link !== ''){ ?>
		<a class="edgtf-interactive-image-link" href="<?php echo esc_url($link)?>" target="<?php echo esc_attr($target);?>"></a>
	<?php } ?>
	<div class="edgtf-interactive-image-holder">
		<?php echo wp_get_attachment_image($image, 'full'); ?>
	</div>
	<?php if ($text !== '') { ?>
		<div class="edgtf-interactive-image-text-holder">
			<div class="edgtf-interactive-image-table">
				<div class="edgtf-interactive-image-cell">
					<h2 class="edgtf-interactive-image-text" <?php coyote_edge_inline_style($text_style);?>><?php echo esc_attr($text) ?></h2>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="edgtf-overlay" <?php coyote_edge_inline_style($overlay_style);?>></div>
</div>