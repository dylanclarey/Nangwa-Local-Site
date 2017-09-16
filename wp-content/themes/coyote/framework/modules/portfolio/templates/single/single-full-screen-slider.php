<?php $date_format = 'F d, Y';?>
<div class="edgtf-portfolio-slider-content">
	<div class="edgtf-description">
		<div class="edgtf-ptf-table">
			<div class="edgtf-ptf-table-cell">
				<span class="edgtf-ptf-info-opening edgtf-control"><?php esc_html_e('Info','coyote');?><span class="edgtf-section-underscore edgtf-underscore"></span></span>
			</div>
		</div>
	</div>

	<div class="edgtf-portfolio-slider-content-info">
		<div class="edgtf-ptf-table">
			<div class="edgtf-ptf-table-cell">
				<div class="egtf-ptf-content-holder">
					<?php coyote_edge_portfolio_get_info_part('content'); ?>
				</div>
				<div class="edgtf-portfolio-info-holder">
					<?php

						//get portfolio custom fields section
						coyote_edge_portfolio_get_info_part('custom-fields');

						//get portfolio categories section
						coyote_edge_portfolio_get_info_part('categories');

						//get portfolio tags section
						coyote_edge_portfolio_get_info_part('tags');

						//get portfolio date section
						coyote_edge_portfolio_get_info_part('date');

						//get portfolio share section
						coyote_edge_portfolio_get_info_part('social');
					?>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="edgtf-full-screen-slider-holder">
	<?php
	$media = coyote_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-full-screen-slider">
			<?php foreach($media as $single_media) : 
				$skin_class = "";

				if ($single_media['skin'] == 'light'){
					$skin_class = 'edgtf-slide-light-skin';
				} else if ($single_media['skin'] == 'dark'){
					$skin_class = 'edgtf-slide-dark-skin';
				}
			?>
				<div class="edgtf-portfolio-single-media <?php echo esc_attr($skin_class);?>">
					<?php coyote_edge_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>