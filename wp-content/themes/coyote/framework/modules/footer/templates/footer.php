<?php
/**
 * Footer template part
 */

coyote_edge_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php if (!isset($_REQUEST["ajax_req"]) || $_REQUEST["ajax_req"] != 'yes') { ?>
<footer <?php coyote_edge_class_attribute($footer_classes); ?>>
	<div class="edgtf-footer-inner clearfix">

		<?php

		if($display_footer_top) {
			coyote_edge_get_footer_top();
		}
		if($display_footer_bottom) {
			coyote_edge_get_footer_bottom();
		}
		?>

	</div>
</footer>
<?php } ?>

</div> <!-- close div.edgtf-wrapper-inner  -->
</div> <!-- close div.edgtf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>