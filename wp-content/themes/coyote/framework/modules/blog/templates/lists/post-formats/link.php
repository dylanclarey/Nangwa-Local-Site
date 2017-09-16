<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<a class="edgtf-post-whole-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
		<div class="edgtf-post-text" <?php coyote_edge_inline_style($background_image);?>>
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-mark edgtf-link-mark">
				</div>
				<div class="edgtf-post-ql-table-cell">
					<?php coyote_edge_get_module_template_part('templates/lists/parts/link', 'blog'); ?>
				</div>
			</div>
		</div>
	</div>
</article>