<?php do_action('coyote_edge_before_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action( 'coyote_edge_after_sticky_menu_html_open' ); ?>
    <div class="edgtf-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            coyote_edge_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php
							coyote_edge_get_full_screen_opener();
						?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('coyote_edge_after_sticky_header'); ?>