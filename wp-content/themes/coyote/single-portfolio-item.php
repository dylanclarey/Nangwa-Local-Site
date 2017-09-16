<?php

get_header();
coyote_edge_get_title();
get_template_part('slider');
coyote_edge_single_portfolio();
do_action('coyote_edge_after_container_close');
get_footer();

?>