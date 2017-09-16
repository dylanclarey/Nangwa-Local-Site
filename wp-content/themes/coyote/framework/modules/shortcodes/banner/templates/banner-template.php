<?php
/**
 * Banner shortcode template
 */
?>

<div class="edgtf-banner <?php echo esc_attr($banner_classes);?>">
	<?php if($link != '') { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
	<?php } ?>
		<div class="edgtf-banner-image-inner">
			<?php if ($item_image !== '') { ?>
				<div class="edgtf-banner-image">
					<?php echo wp_get_attachment_image($item_image,'full');?>
				</div>
			<?php } ?>	
			<div class="edgtf-banner-info">
				<div class="edgtf-banner-info-table">
					<div class="edgtf-banner-info-table-cell">
						<?php if ($banner_title !== '') { ?>
							<div class="edgtf-banner-title-holder">
								<<?php echo esc_attr($title_tag);?> class="edgtf-banner-title">
									<?php echo wp_kses_post($banner_title) ?>
								</<?php echo esc_attr($title_tag);?>>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php if($link != '') { ?>
		</a>
	<?php } ?>
</div>