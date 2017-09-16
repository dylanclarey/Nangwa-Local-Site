<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php coyote_edge_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="edgtf-container">
		<?php do_action('coyote_edge_after_container_open'); ?>
		<div class="edgtf-container-inner">
			<?php coyote_edge_get_blog_single(); ?>
		</div>
		<?php do_action('coyote_edge_before_container_close'); ?>
	</div>
	<?php do_action('coyote_edge_after_container_close'); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>