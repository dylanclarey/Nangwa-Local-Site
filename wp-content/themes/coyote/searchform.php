<?php $coyote_edge_search_rand = rand(); ?>
<form method="get" id="searchform-<?php echo esc_attr($coyote_edge_search_rand);?>" action="<?php echo esc_url(home_url( '/' )); ?>">
	 <div class="edgtf-search-wrapper">
		<input type="text" value="" placeholder="<?php esc_html_e('Search', 'coyote'); ?>" name="s" id="s-<?php echo esc_attr($coyote_edge_search_rand);?>" />
		<input type="submit" id="searchsubmit-<?php echo esc_attr($coyote_edge_search_rand);?>" value="&#xe86f;" />
	</div>
</form>