<?php $title_tag = isset($title_tag) ? $title_tag : 'h1' ?>
<<?php echo esc_attr($title_tag);?> class="edgtf-post-title">
	<?php the_title(); ?>
</<?php echo esc_attr($title_tag);?>>