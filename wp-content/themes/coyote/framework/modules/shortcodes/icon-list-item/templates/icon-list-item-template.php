<?php
$icon_html = coyote_edge_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="edgtf-icon-list-item">
	<div class="edgtf-icon-list-icon-holder">
        <div class="edgtf-icon-list-icon-holder-inner clearfix">
			<?php 
			print $icon_html;
			?>
		</div></div>
    <p class="edgtf-icon-list-text" <?php echo coyote_edge_get_inline_style($title_style)?> ><?php if(!empty($link)) : ?><a class="edgtf-icon-list-text-link" href="<?php echo esc_attr($link); ?>"><?php endif; ?><?php echo esc_attr($title)?><?php if(!empty($link)) : ?></a><?php endif; ?></p>

</div>