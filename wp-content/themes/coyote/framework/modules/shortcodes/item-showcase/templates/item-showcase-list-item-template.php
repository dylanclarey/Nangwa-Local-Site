<div class="edgtf-item <?php echo esc_attr($item_showcase_list_item_class); ?>">
	<div class="edgtf-item-content">
		<?php if ($item_title != '') { ?>
		<div class="edgtf-showcase-title-holder">
			<?php if ($item_position == 'right' && !empty($icon)) { ?>
				<div class="edgtf-item-icon-holder">
					<div class="edgtf-item-icon-inner" <?php coyote_edge_inline_style($border_style)?>></div>
					<div class="edgtf-item-icon">
						<?php echo coyote_edge_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
					</div>
				</div>
			<?php } ?>
			<h5 class="edgtf-showcase-title">
				<?php if ($item_link != '' ) { ?>
					<a href="<?php echo esc_url($item_link) ?>" target="_blank">
				<?php } ?>
					<?php echo esc_attr($item_title) ?>
				<?php if ($item_link != '' ) { ?>
					</a>
				<?php } ?>
			</h5>
			<?php if ($item_position == 'left' && !empty($icon)) { ?>
				<div class="edgtf-item-icon-holder">
					<div class="edgtf-item-icon-inner" <?php coyote_edge_inline_style($border_style)?>></div>
					<div class="edgtf-item-icon">
						<?php echo coyote_edge_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php } if ($item_text != '') { ?>
		<div class="edgtf-showcase-text-holder">
			<?php if ($item_position == 'right') { ?>
				<span class="edgtf-showcase-line-holder" <?php coyote_edge_inline_style($border_style)?>></span>
			<?php } ?>

			<p class="edgtf-showcase-text"><?php echo esc_attr($item_text) ?></p>

			<?php if ($item_position == 'left') { ?>
				<span class="edgtf-showcase-line-holder" <?php coyote_edge_inline_style($border_style)?>></span>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>