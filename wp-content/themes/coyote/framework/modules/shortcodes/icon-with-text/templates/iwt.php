<div <?php coyote_edge_class_attribute($holder_classes); ?>>
    <div class="edgtf-iwt-icon-holder" <?php coyote_edge_inline_style($icon_holder_styles); ?>>
        <?php if(!empty($custom_icon)) : ?>
            <?php if(!empty($link) && empty($link_text)) : ?>
                <a href="<?php echo esc_attr($link); ?>" <?php coyote_edge_inline_attr($target, 'target'); ?>>
            <?php endif; ?>
            <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
            <?php if(!empty($link) && empty($link_text)) : ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <?php echo coyote_edge_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
        <?php endif; ?>
    </div>
    <?php if ($show_separator == 'yes') {
        echo coyote_edge_execute_shortcode('edgtf_separator',$separator_params);
    } ?>
    <div class="edgtf-iwt-content-holder" <?php coyote_edge_inline_style($content_styles); ?>>
        <div class="edgtf-iwt-title-holder">
            <<?php echo esc_attr($title_tag); ?> <?php coyote_edge_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        </div>
        <div class="edgtf-iwt-text-holder">
            <p <?php coyote_edge_inline_style($text_styles); ?>><?php echo wp_kses_post($text); ?></p>

            <?php if(!empty($link) && !empty($link_text)) : ?>
                <a class="edgtf-iwt-link" href="<?php echo esc_attr($link); ?>" <?php coyote_edge_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>