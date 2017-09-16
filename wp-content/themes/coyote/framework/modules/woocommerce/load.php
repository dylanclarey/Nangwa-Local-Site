<?php

include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-functions.php';

if (coyote_edge_is_woocommerce_installed()) {
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/options-map/map.php';
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-template-hooks.php';
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-config.php';
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/custom-styles/woocommerce.php';
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/widgets/woocommerce-dropdown-cart.php';
	
	foreach(glob(EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/plugins/*/load.php') as $plugin_load) {
		include_once $plugin_load;
	}
}