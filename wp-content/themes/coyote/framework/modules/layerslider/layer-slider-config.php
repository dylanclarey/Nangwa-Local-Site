<?php
	if(!function_exists('coyote_edge_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function coyote_edge_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'coyote_edge_layerslider_overrides');
	}
?>