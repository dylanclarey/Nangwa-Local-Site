<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="edgtf-post-content">
		<?php coyote_edge_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size'=>$image_size)); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-text-inner-cell">
					<div class="edgtf-post-mark edgtf-quote-mark">
					</div>
					<div class="edgtf-post-ql-table-cell">
						<h5 class="edgtf-post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "edgtf_post_quote_text_meta", true)); ?></a>
						</h5>
						<span class="edgtf-quote-author"><?php the_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>