<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="edgtf-post-content">
		<?php coyote_edge_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size'=>$image_size)); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<a class="edgtf-blog-masonry-gallery-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
				<div class="edgtf-post-text-inner-cell">
					<?php coyote_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
					<div class="edgtf-post-info">
						<?php coyote_edge_post_info(array(
							'date' => 'yes',
							'category' => $show_category
						)) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>