<?php if(coyote_edge_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

    <div class="edgtf-portfolio-info-item edgtf-portfolio-date">
        <h5 class="edgtf-portfolio-info-item-title"><?php esc_html_e('Date:', 'coyote'); ?></h5>

        <p><?php the_time(get_option('date_format')); ?></p>
    </div>

<?php endif; ?>