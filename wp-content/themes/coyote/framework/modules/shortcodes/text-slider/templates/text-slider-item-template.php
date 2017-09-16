<div class="edgtf-text-slider-item">
	<?php if ($item_title !== '') { ?>
		<<?php echo esc_attr($title_tag);?> class="edgtf-ts-item-title">
			<?php echo esc_html($item_title); ?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
	<?php if ($show_separator == 'yes'){
		echo coyote_edge_execute_shortcode('edgtf_separator', array('position' => 'left'));
	} ?>
	<?php if ($item_text !== '') { ?>
		<p class="edgtf-ts-item-text"> <?php echo esc_html($item_text); ?> </p>
	<?php } ?>
</div>