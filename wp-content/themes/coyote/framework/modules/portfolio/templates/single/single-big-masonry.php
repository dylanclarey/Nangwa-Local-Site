<div class="edgtf-two-columns-75-25 clearfix">
	<div class="edgtf-column1">
		<div class="edgtf-column-inner">
			<?php coyote_edge_portfolio_get_info_part('content'); ?>
		</div>
	</div>
	<div class="edgtf-column2">
		<div class="edgtf-column-inner">
			<div class="edgtf-portfolio-info-holder">
				<?php

				//get portfolio custom fields section
				coyote_edge_portfolio_get_info_part('custom-fields');

				//get portfolio date section
				coyote_edge_portfolio_get_info_part('date');

				//get portfolio categories section
				coyote_edge_portfolio_get_info_part('categories');

				//get portfolio tags section
				coyote_edge_portfolio_get_info_part('tags');

				//get portfolio share section
				coyote_edge_portfolio_get_info_part('social');
				?>
			</div>
		</div>
	</div>
</div>
<div class="edgtf-big-masonry-holder">
	<?php
	$media = coyote_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-media">
			<div class="edgtf-single-masonry-grid-sizer"></div>
			<?php foreach($media as $single_media) :
				?>
				<div class="edgtf-portfolio-single-media <?php echo esc_html($single_media['class_size']); ?>">
					<?php coyote_edge_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
