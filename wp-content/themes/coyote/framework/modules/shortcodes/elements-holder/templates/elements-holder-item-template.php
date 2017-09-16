<div class="edgtf-elements-holder-item <?php echo esc_attr($elements_holder_item_class); ?>" <?php echo coyote_edge_get_inline_attrs($elements_holder_item_data); ?> <?php echo coyote_edge_get_inline_style($elements_holder_item_style); ?>>
	<?php if ($clickable == 'yes' && $link !== '') { ?>
		<a class="edgtf-eh-item-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"></a>
	<?php } ?>
	<div class="edgtf-elements-holder-item-inner">
		<div class="edgtf-elements-holder-item-content <?php echo esc_attr($elements_holder_item_content_class); ?>" <?php echo coyote_edge_get_inline_style($elements_holder_item_content_style); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>