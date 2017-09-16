<?php
/**
 * Counter shortcode template
 */
?>
<div class="edgtf-counter-holder <?php echo esc_attr($position); ?> <?php echo esc_attr($counter_holder_class); ?>" <?php echo coyote_edge_get_inline_style($counter_holder_styles); ?>>
	<?php
	if (is_array($icon_parameters) && count($icon_parameters)) { ?>
		<span class="edgtf-counter-icon">
			<?php echo coyote_edge_execute_shortcode('edgtf_icon', $icon_parameters); ?>
		</span>
	<?php }	?>
    <span class="edgtf-digit-wrapper" <?php echo coyote_edge_get_inline_style($counter_styles); ?>>
        <span class="edgtf-counter <?php echo esc_attr($type) ?>">
		<?php echo esc_attr($digit); ?>
	    </span>
        <?php if ($enable_underscore == 'yes'){ ?><span class="edgtf-counter-underscore edgtf-underscore"></span><?php } ?>
    </span>
	<?php if($title != '') { ?>
		<<?php echo esc_html($title_tag); ?> class="edgtf-counter-title" <?php echo coyote_edge_get_inline_style($title_styles); ?>>
			<?php echo esc_attr($title); ?>
		</<?php echo esc_html($title_tag);; ?>>
	<?php } ?>
	<?php if ($text != "") { ?>
		<p class="edgtf-counter-text" <?php echo coyote_edge_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>

</div>