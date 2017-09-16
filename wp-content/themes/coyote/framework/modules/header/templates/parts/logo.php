<?php do_action('coyote_edge_before_site_logo'); ?>

<div class="edgtf-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php coyote_edge_inline_style($logo_styles); ?>>
        <img class="edgtf-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','coyote'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img class="edgtf-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_html_e('dark logo','coyote'); ?>o"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img class="edgtf-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_html_e('light logo','coyote'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('coyote_edge_after_site_logo'); ?>