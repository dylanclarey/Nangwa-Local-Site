<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="edgtf-blockquote-shortcode" <?php coyote_edge_inline_style($blockquote_style); ?> >
	<span class="edgtf-icon-quotations-holder">
		<?php echo coyote_edge_icon_collections()->getQuoteIcon("font_elegant", true); ?>
	</span>
	<h5 class="edgtf-blockquote-text">
		<?php echo esc_attr($text); ?>
	</h5>
</blockquote>