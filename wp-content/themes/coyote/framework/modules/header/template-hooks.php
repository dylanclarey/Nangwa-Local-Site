<?php

//top header bar
add_action('coyote_edge_before_page_header', 'coyote_edge_get_header_top');

//mobile header
add_action('coyote_edge_after_page_header', 'coyote_edge_get_mobile_header');