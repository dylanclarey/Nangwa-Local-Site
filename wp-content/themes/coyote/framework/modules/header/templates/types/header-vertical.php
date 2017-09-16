<?php do_action('coyote_edge_before_page_header'); ?>
<aside class="edgtf-vertical-menu-area">
    <div class="edgtf-vertical-menu-area-inner">
        <div class="edgtf-vertical-area-background" <?php coyote_edge_inline_style(array($vertical_header_background_color,$vertical_header_opacity,$vertical_background_image)); ?>></div>
        <?php if(!$hide_logo) {
            coyote_edge_get_logo();
        } ?>
        <?php coyote_edge_get_vertical_main_menu(); ?>
        <div class="edgtf-vertical-area-widget-holder">
           <?php coyote_edge_get_header_widget(); ?>
        </div>
    </div>
</aside>

<?php do_action('coyote_edge_after_page_header'); ?>