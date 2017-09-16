<?php

if (!function_exists('coyote_edge_register_widgets')) {

	function coyote_edge_register_widgets() {

		$widgets = array(
			'CoyoteEdgeFullScreenMenuOpener',
			'CoyoteEdgeLatestPosts',
            'CoyoteEdgeRawHTMLWidget',
			'CoyoteEdgeSearchOpener',
			'CoyoteEdgeSideAreaOpener',
			'CoyoteEdgeStickySidebar',
			'CoyoteEdgeSocialIconWidget',
			'CoyoteEdgeSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'coyote_edge_register_widgets');