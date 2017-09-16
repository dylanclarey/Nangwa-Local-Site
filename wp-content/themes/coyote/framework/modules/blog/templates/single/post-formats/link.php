<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<a class="edgtf-post-whole-link" href="<?php echo esc_attr(coyote_edge_get_post_link_single_link()); ?>" title="<?php the_title_attribute(); ?>"></a>
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-mark edgtf-link-mark">
				</div>
				<div class="edgtf-post-ql-table-cell">
					<?php coyote_edge_get_module_template_part('templates/single/parts/link', 'blog'); ?>
				</div>
			</div>
		</div>

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
</article>