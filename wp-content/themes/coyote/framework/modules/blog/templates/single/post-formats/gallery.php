<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<?php coyote_edge_get_module_template_part('templates/single/parts/gallery', 'blog'); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<?php coyote_edge_get_module_template_part('templates/single/parts/title', 'blog'); ?>

				<?php the_content(); ?>

				<?php coyote_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
				
				<div class="edgtf-separator-holder clearfix edgtf-separator-left">
					<div class="edgtf-separator"></div>
				</div>
				
				<div class="edgtf-post-info-bottom">
					<div class="edgtf-post-info-bottom-left">
						<?php coyote_edge_post_info(array(
							'date' => 'yes',
							'author' => 'yes',
							'category' => 'yes',
						)) ?>
					</div>
					<div class="edgtf-post-info-bottom-right">
						<?php coyote_edge_post_info(array(
							'comments' => 'yes',
							'like' => 'yes',
						), 'single') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php do_action('coyote_edge_before_blog_article_closed_tag'); ?>
</article>