<?php $link_text = get_post_meta(get_the_ID(), "edgtf_post_link_link_text_meta", true);

if ($link_text == ''){
	$link_text = get_the_title();
}

if ($link_text !== '') { ?>
<h5 class="edgtf-post-title">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html($link_text); ?></a>
</h5>
<?php } ?>