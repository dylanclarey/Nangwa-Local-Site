<?php

if(!function_exists('coyote_edge_register_required_plugins')) {
    /**
     * Registers Visual Composer, Layer Slider, Revolution Slider, Edge Core, Edge Instagram Feed, Edgef Twitter Feed  as required plugins. Hooks to tgmpa_register hook
     */
    function coyote_edge_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'coyote'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'required'           => true,
                'version'            => '5.2.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'coyote'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '5.4.5.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Edge CPT', 'coyote'),
                'slug'               => 'edge-cpt',
                'source'             => get_template_directory().'/includes/plugins/edge-cpt.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Edge Instagram Feed', 'coyote'),
                'slug'               => 'edge-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/edge-instagram-feed.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Edge Twitter Feed', 'coyote'),
                'slug'               => 'edge-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/edge-twitter-feed.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            )
        );

        $config = array(
            'domain'           => 'coyote',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'coyote'),
                'menu_title'                      => esc_html__('Install Plugins', 'coyote'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'coyote'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'coyote'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'coyote'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'coyote'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'coyote'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'coyote'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'coyote'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'coyote'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'coyote'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'coyote'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'coyote'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'coyote'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'coyote'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'coyote'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'coyote'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'coyote_edge_register_required_plugins');
}


