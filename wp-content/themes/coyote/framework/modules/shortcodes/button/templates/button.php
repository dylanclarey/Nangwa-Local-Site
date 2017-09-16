<button type="submit" <?php coyote_edge_inline_style($button_styles); ?> <?php coyote_edge_class_attribute($button_classes); ?> <?php echo coyote_edge_get_inline_attrs($button_data); ?> <?php echo coyote_edge_get_inline_attrs($button_custom_attrs); ?>>
    <?php if ($text !== '') { ?>
		<span class="edgtf-btn-text" <?php echo coyote_edge_get_inline_attrs($button_text_data); ?>><?php echo esc_html($text); ?></span>
	<?php } ?>
    <?php if ($icon !== '' && $icon_pack !== '') { ?>
		<span class="edgtf-btn-icon-holder" <?php coyote_edge_inline_style($icon_styles);?>>
			<?php echo coyote_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
		</span>
	<?php } ?>
</button>