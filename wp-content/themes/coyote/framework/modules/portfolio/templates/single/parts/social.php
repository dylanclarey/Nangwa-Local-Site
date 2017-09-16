<?php if(coyote_edge_options()->getOptionValue('enable_social_share') == 'yes'
    && coyote_edge_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
	<?php 
	if (shortcode_exists('edgtf_separator')) {
		echo coyote_edge_execute_shortcode('edgtf_separator',array('position' => 'left')); 
	} else { ?>
		<div class="edgtf-separator-holder clearfix  edgtf-separator-left">
			<div class="edgtf-separator"></div>
		</div>
	<?php } ?>
    <div class="edgtf-portfolio-social">
        <?php echo coyote_edge_get_social_share_html() ?>
    </div>
<?php endif; ?>