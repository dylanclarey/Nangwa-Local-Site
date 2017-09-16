<div <?php coyote_edge_class_attribute($interactive_classes)?>>
	<div class="edgtf-int-item" <?php coyote_edge_inline_style($title_area_style);?>>
		<div class="edgtf-int-item-table">
			<div class="edgtf-int-item-cell">
				<?php 
				if ($title_text !== '' || $highlighted_text !== '') {
					echo coyote_edge_execute_shortcode('edgtf_section_title', $title_params);
				}
				?>
			</div>
		</div>
	</div>
	<?php echo do_shortcode($content);?>
</div>