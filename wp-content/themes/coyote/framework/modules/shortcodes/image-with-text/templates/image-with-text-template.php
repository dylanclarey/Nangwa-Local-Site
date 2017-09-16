<div <?php coyote_edge_class_attribute($holder_class); ?>>
	<div class="edgtf-iwt-image">
		<?php if ($link !== '' && $link_text === ''){ ?>
			<a class="edgtf-iwt-link" href="<?php echo esc_url($link)?>" target="<?php echo esc_attr($target);?>">
		<?php } ?>

			<?php if(is_array($image_size) && count($image_size)) {
				echo coyote_edge_generate_thumbnail($image, null, $image_size[0], $image_size[1]);
			} else {
				echo wp_get_attachment_image($image, $image_size);
			} ?>

		<?php if ($link !== '' && $link_text === ''){ ?>
			</a>
		<?php } ?>
	</div>
	<div class="edgtf-iwt-text">
		<?php if ($show_separator == 'yes') { 
			echo coyote_edge_execute_shortcode('edgtf_separator',$separator_params);
		} ?>
		<?php if ($title !== '') { ?>
			<<?php echo esc_attr($title_tag) ?> class="edgtf-iwt-title" <?php coyote_edge_inline_style($title_style);?>>
				<?php echo esc_html($title);?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if ($text !== '') { ?>
			<p class="edgtf-iwt-content">
				<?php echo esc_html($text);?>
			</p>
		<?php } ?>
		<?php if ($link !== '' && $link_text !== ''){ ?>
			<a class="edgtf-iwt-link" href="<?php echo esc_url($link)?>" target="<?php echo esc_attr($target);?>">
				<?php echo esc_html($link_text); ?>
			</a>
		<?php } ?>
	</div>
</div>