<?php
    /*
        Template Name: Blog: Split
    */
?>
<?php get_header(); ?>
<?php coyote_edge_get_title(); ?>
<?php get_template_part('slider'); ?>
<div class="edgtf-container">
    <?php do_action('coyote_edge_after_container_open'); ?>
    <div class="edgtf-container-inner" >
        <?php coyote_edge_get_blog('split'); ?>
    </div>
    <?php do_action('coyote_edge_before_container_close'); ?>
</div>
<?php do_action('coyote_edge_after_container_close'); ?>
<?php get_footer(); ?>