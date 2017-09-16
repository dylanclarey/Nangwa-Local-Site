<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<a class="edgtf-post-whole-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	<div class="edgtf-post-content">
		<?php coyote_edge_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size'=>$image_size)); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-text-inner-cell">
					<div class="edgtf-post-mark edgtf-link-mark">
					</div>
					<div class="edgtf-post-ql-table-cell">
						<?php coyote_edge_get_module_template_part('templates/lists/parts/link', 'blog'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>