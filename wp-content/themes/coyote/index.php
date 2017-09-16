<?php
$blog_archive_pages_classes = coyote_edge_blog_archive_pages_classes(coyote_edge_get_default_blog_list());
?>
<?php get_header(); ?>
<?php if ( coyote_edge_options()->getOptionValue('title_on_post_page') == 'yes') {
    coyote_edge_get_title();
} ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
	<?php do_action('coyote_edge_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php coyote_edge_get_blog(coyote_edge_get_default_blog_list()); ?>
	</div>
	<?php do_action('coyote_edge_before_container_close'); ?>
</div>
<?php do_action('coyote_edge_after_container_close'); ?>
<?php get_footer(); ?>
