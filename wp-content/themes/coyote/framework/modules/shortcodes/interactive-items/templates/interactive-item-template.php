<div class="edgtf-int-item">
	<?php if ($link != '') { ?>
		<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"></a>
	<?php } ?>
	<div class="edgtf-int-front-holder" <?php coyote_edge_inline_style($interactive_item_holder_styles); ?>>
		<div class="edgtf-int-item-table">
			<div class="edgtf-int-item-cell">
				<?php if (is_array($icon_parameters) && count($icon_parameters)) {
					echo coyote_edge_execute_shortcode('edgtf_icon', $icon_parameters);
				} ?>
				<?php if ($title !== '') { ?>
					<<?php echo esc_attr($title_tag);?> class="edgtf-int-title">
						<?php echo esc_attr($title); ?>
					</<?php echo esc_attr($title_tag);?>>
				<?php } ?>
				<?php if ($text !== '') { ?>
					<p class="edgtf-int-text"><?php echo esc_html($text); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="edgtf-int-back-holder" <?php coyote_edge_inline_style($interactive_back_styles);?>></div>
</div>