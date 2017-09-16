<div <?php coyote_edge_class_attribute($section_classes)?>>
	<div class="edgtf-sh-title-area" <?php coyote_edge_inline_style($title_area_style);?>>
		<div class="edgtf-sh-title-area-inner">
			<?php 
			if ($title_text !== '' || $highlighted_text !== '') {
				echo coyote_edge_execute_shortcode('edgtf_section_title', $title_params);
			}
			if ($show_separator == 'yes'){
				echo coyote_edge_execute_shortcode('edgtf_separator', array('position' => 'left'));
			}
			if ($subtitle_text !== ''){
				echo coyote_edge_execute_shortcode('edgtf_section_subtitle', $subtitle_params);
			}
			?>
		</div>
	</div>
	<div class="edgtf-sh-content-area">
		<?php echo do_shortcode($content);?>
	</div>
</div>