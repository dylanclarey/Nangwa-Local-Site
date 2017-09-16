<div class="edgtf-post-info-date">
	<?php if(!coyote_edge_post_has_title()) { ?><a href="<?php the_permalink() ?>"><?php } ?>
		<?php the_time(get_option('date_format')); ?>
	<?php if(!coyote_edge_post_has_title()) { ?></a><?php } ?>
</div>