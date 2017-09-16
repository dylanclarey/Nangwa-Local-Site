<?php do_action('coyote_edge_before_mobile_header'); ?>

<header class="edgtf-mobile-header">
    <div class="edgtf-mobile-header-inner">
        <?php do_action( 'coyote_edge_after_mobile_header_html_open' ) ?>
        <div class="edgtf-mobile-header-holder">
            <div class="edgtf-grid">
                <div class="edgtf-vertical-align-containers">
                    <?php if($show_navigation_opener) : ?>
                        <div class="edgtf-mobile-menu-opener">
                            <a href="javascript:void(0)">
                    <span class="edgtf-mobile-opener-icon-holder">
                        <span class="edgtf-mobile-opener-icon-dot-1"></span>
                        <span class="edgtf-mobile-opener-icon-dot-2"></span>
                        <span class="edgtf-mobile-opener-icon-dot-3"></span>
                        <span class="edgtf-mobile-opener-icon-dot-4"></span>
                        <span class="edgtf-mobile-opener-icon-dot-5"></span>
                        <span class="edgtf-mobile-opener-icon-dot-6"></span>
                        <span class="edgtf-mobile-opener-icon-dot-7"></span>
                        <span class="edgtf-mobile-opener-icon-dot-8"></span>
                        <span class="edgtf-mobile-opener-icon-dot-9"></span>
                    </span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($show_logo) : ?>
                        <div class="edgtf-position-center">
                            <div class="edgtf-position-center-inner">
                                <?php coyote_edge_get_mobile_logo(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="edgtf-position-right">
                        <div class="edgtf-position-right-inner">
                            <?php if(is_active_sidebar('edgtf-mobile-widget-area')) {
                                dynamic_sidebar('edgtf-mobile-widget-area');
                            } ?>
                        </div>
                    </div>
                </div> <!-- close .edgtf-vertical-align-containers -->
            </div>
        </div>
        <?php coyote_edge_get_mobile_nav(); ?>
    </div>
</header> <!-- close .edgtf-mobile-header -->

<?php do_action('coyote_edge_after_mobile_header'); ?>