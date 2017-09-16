<?php

if(!function_exists('coyote_edge_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function coyote_edge_get_button_html($params) {
        $button_html = coyote_edge_execute_shortcode('edgtf_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}