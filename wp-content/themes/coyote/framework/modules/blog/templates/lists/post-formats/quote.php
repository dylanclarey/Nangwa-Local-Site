<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text" <?php coyote_edge_inline_style($background_image);?>>
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-mark edgtf-quote-mark">
				</div>
				<div class="edgtf-post-ql-table-cell">
					<h5 class="edgtf-post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(coyote_edge_get_quote_standard(get_the_ID())); ?></a>
					</h5>
				</div>
			</div>
		</div>
	</div>
</article>