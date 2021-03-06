<?php coyote_edge_get_module_template_part('templates/lists/parts/filter', 'blog'); ?>
<div class="edgtf-blog-holder edgtf-blog-type-masonry-gallery <?php echo esc_attr($blog_classes)?> edgtf-masonry-pagination-<?php echo coyote_edge_options()->getOptionValue('masonry_gallery_pagination'); ?>">
	<div class="edgtf-blog-masonry-gallery-grid-sizer"></div>
	<div class="edgtf-blog-masonry-gallery-grid-gutter"></div>
	<?php
	if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
		coyote_edge_get_post_format_html($blog_type);
	endwhile;
	else:
		coyote_edge_get_module_template_part('templates/parts/no-posts', 'blog');
	endif;
	?>
</div>
<?php
if(coyote_edge_options()->getOptionValue('pagination') == 'yes') {

	$pagination_type = coyote_edge_options()->getOptionValue('masonry_gallery_pagination');
	if($pagination_type == 'load-more' || $pagination_type == 'infinite-scroll'){
		$type = ($pagination_type == 'infinite-scroll') ? 'transparent' : 'outline';
		if(get_next_posts_page_link($blog_query->max_num_pages)){ ?>
			<div class="edgtf-blog-<?php echo esc_attr($pagination_type); ?>-button-holder">
					<span class="edgtf-blog-<?php echo esc_attr($pagination_type); ?>-button" data-rel="<?php echo esc_attr($blog_query->max_num_pages); ?>">
						<?php
						echo coyote_edge_get_button_html(array(
							'type' => $type,
							'link' => get_next_posts_page_link($blog_query->max_num_pages),
							'text' => 'Show more'
						));
						?>
					</span>
			</div>
		<?php }
	}
}
?>