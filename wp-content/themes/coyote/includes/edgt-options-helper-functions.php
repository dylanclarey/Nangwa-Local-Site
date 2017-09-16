<?php

if(!function_exists('coyote_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function coyote_edge_is_responsive_on() {
        return coyote_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}