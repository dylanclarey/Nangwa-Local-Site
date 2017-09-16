<?php
/**
 * Section Title shortcode template
 */
?>

<div <?php coyote_edge_class_attribute($classes); ?> <?php coyote_edge_inline_style($title_style)?>>
	<span class="edgtf-section-title-inner"><?php if ($underscore_position == 'left' && $enable_underscore == 'yes') { ?><span class="edgtf-section-underscore edgtf-underscore"></span><?php } ?><?php echo esc_html($title_text);?><?php if ($underscore_position !== 'left' && $enable_underscore == 'yes'){ ?><span class="edgtf-section-underscore edgtf-underscore"></span><?php } ?></span>
</div>