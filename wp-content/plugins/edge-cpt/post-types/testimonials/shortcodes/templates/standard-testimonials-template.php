<div class="edgtf-testimonial-content edgtf-testimonials<?php echo esc_attr($current_id) ?>">
	<div class="edgtf-testimonial-content-inner">
		<div class="edgtf-testimonial-text-holder">
			<div class="edgtf-testimonial-text-inner">
				<div class="edgtf-testimonials-quotes">“</div>
				<?php if($show_title == "yes" && $title != ''){ ?>
					<h2 class="edgtf-testimonial-title">
						<?php echo esc_attr($title) ?>
					</h2>
				<?php }?>
				<p class="edgtf-testimonial-text"><?php echo trim($text) ?></p>
                <?php if (has_post_thumbnail($current_id) && $show_featured_image == 'yes') { ?>
                    <div class="edgtf-testimonial-image-holder">
                        <?php esc_html(the_post_thumbnail($current_id)) ?>
                    </div>
                <?php } ?>
				<?php if ($show_author == "yes") { ?>
					<div class = "edgtf-testimonial-author">
						<h5 class="edgtf-testimonial-author-text"><?php echo esc_attr($author)?>
							<?php if($show_position == "yes" && $job !== ''){ ?>
								<span class="edgtf-testimonials-job"> - <?php echo esc_attr($job)?></span>
							<?php }?>
						</h5>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>	
</div>
