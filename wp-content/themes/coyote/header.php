<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see coyote_edge_header_meta() - hooked with 10
     * @see edgt_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('coyote_edge_header_meta'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<?php coyote_edge_get_side_area(); ?>


<?php 
if(coyote_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
    $coyote_edge_ajax_class = 'edgtf-mimic-ajax';
?>
<div class="edgtf-smooth-transition-loader <?php echo esc_attr($coyote_edge_ajax_class); ?>">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php coyote_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
    <div class="edgtf-wrapper-inner">
        <?php coyote_edge_get_header(); ?>

        <?php if (coyote_edge_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='edgtf-back-to-top'  href='#'>
                <span class="edgtf-icon-stack">
                     <?php
                        coyote_edge_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php coyote_edge_get_full_screen_menu(); ?>

        <div class="edgtf-content" <?php coyote_edge_content_elem_style_attr(); ?>>
            <div class="edgtf-content-inner">