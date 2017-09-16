<?php
$link_text = get_post_meta(get_the_ID(), "edgtf_post_link_link_text_meta", true);

if ($link_text == ''){
	$link_text = get_the_title();
}

if ($link_text !== '') { ?>
<h5 class="edgtf-post-title">
	<?php echo esc_html($link_text); ?>
</h5>
<?php } ?>