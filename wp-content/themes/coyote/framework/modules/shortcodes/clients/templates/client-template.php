<?php if($image != '') {  ?>
	<div class="edgtf-client-holder <?php echo esc_attr($class);?>">
		<div class="edgtf-client-holder-inner">
			<div class="edgtf-client-image-holder">
				<div class="edgtf-client-image-holder-inner">
				<?php if($link != '') { ?>
					<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
				<?php } ?>
					<span class="edgtf-client-image">
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_url($image_alt); ?>" />
					</span>
					<?php if($hover_image != '') {  ?>
						<span class="edgtf-client-hover-image">
							<img src="<?php echo esc_url($hover_image); ?>" alt="<?php echo esc_url($hover_image_alt); ?>" />
						</span>
					<?php } ?>
				<?php if($link != '') { ?>
					</a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>