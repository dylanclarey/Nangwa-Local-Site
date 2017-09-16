<?php
$coyote_edge_slider_shortcode = get_post_meta(coyote_edge_get_page_id(), 'edgtf_page_slider_meta', true);
if (!empty($coyote_edge_slider_shortcode)) { ?>
	<div class="edgtf-slider">
		<div class="edgtf-slider-inner">
			<?php echo do_shortcode(wp_kses_post($coyote_edge_slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>