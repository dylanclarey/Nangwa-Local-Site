<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$coyote_edge_id = get_option('woocommerce_shop_page_id');
$coyote_edge_shop = get_post($coyote_edge_id);
$coyote_edge_sidebar = coyote_edge_sidebar_layout();

if(get_post_meta($coyote_edge_id, 'edgt_page_background_color', true) != ''){
	$coyote_edge_background_color = 'background-color: '.esc_attr(get_post_meta($coyote_edge_id, 'edgt_page_background_color', true));
}else{
	$coyote_edge_background_color = '';
}

$coyote_edge_content_style = '';
if(get_post_meta($coyote_edge_id, 'edgt_content-top-padding', true) != '') {
	if(get_post_meta($coyote_edge_id, 'edgt_content-top-padding-mobile', true) == 'yes') {
		$coyote_edge_content_style = 'padding-top:'.esc_attr(get_post_meta($coyote_edge_id, 'edgt_content-top-padding', true)).'px !important';
	} else {
		$coyote_edge_content_style = 'padding-top:'.esc_attr(get_post_meta($coyote_edge_id, 'edgt_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$coyote_edge_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$coyote_edge_paged = get_query_var('page');
} else {
	$coyote_edge_paged = 1;
}

get_header();

coyote_edge_get_title();
get_template_part('slider');

$coyote_edge_full_width = false;

if ( coyote_edge_options()->getOptionValue('edgtf_woo_products_list_full_width') == 'yes' && !is_singular('product') ) {
	$coyote_edge_full_width = true;
}

if ( $coyote_edge_full_width ) { ?>
	<div class="edgtf-full-width" <?php coyote_edge_inline_style($coyote_edge_background_color); ?>>
		<div class="edgtf-full-width-inner" <?php coyote_edge_inline_style($coyote_edge_content_style); ?>>
<?php } else { ?>
	<div class="edgtf-container" <?php coyote_edge_inline_style($coyote_edge_background_color); ?>>
		<div class="edgtf-container-inner clearfix" <?php coyote_edge_inline_style($coyote_edge_content_style); ?>>
<?php }
			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $coyote_edge_sidebar ) {

					case 'sidebar-33-right': ?>
						<div class="edgtf-two-columns-66-33 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php coyote_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="edgtf-two-columns-75-25 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1 edgtf-content-left-from-sidebar">
								<div class="edgtf-column-inner">
									<?php coyote_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="edgtf-two-columns-33-66 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2">
								<div class="edgtf-column-inner">
									<?php coyote_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="edgtf-two-columns-25-75 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2 edgtf-content-right-from-sidebar">
								<div class="edgtf-column-inner">
									<?php coyote_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					default:
						coyote_edge_woocommerce_content();
				}

			} else {
				coyote_edge_woocommerce_content();
			} ?>

			</div>
	</div>
	<?php do_action('coyote_edge_after_container_close'); ?>
<?php get_footer(); ?>
