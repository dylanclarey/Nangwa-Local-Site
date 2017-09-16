<?php
/**
 * Custom Font shortcode template
 */
?>

<<?php echo esc_attr($custom_font_tag);?> class="edgtf-custom-font-holder" <?php coyote_edge_inline_style($custom_font_style); echo ' '.esc_attr($custom_font_data);?>>
	<?php if($type_out_effect == 'yes') { ?>
		<div class="edgtf-typed-wrap">
			<div class="edgtf-typed-exec <?php echo esc_attr($type_out_random_class); ?>"></div>
			<div class="edgtf-typed-src <?php echo esc_attr($type_out_random_class); ?>">
	<?php } ?>
	<?php echo wp_kses_post($content_custom_font);?><?php if ($highlighted_text !== ''){ ?><span class="edgtf-highlighted" <?php coyote_edge_inline_style($highlighted_style)?>><?php echo esc_html($highlighted_text);?></span><?php } ?>
	<?php if($type_out_effect == 'yes') { ?>
			</div>
		</div>
	<?php } ?>
</<?php echo esc_attr($custom_font_tag);?>>