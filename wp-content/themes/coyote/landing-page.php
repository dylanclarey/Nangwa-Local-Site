<?php
/*
Template Name: Landing Page
*/
$coyote_edge_sidebar = coyote_edge_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * coyote_edge_header_meta hook
         *
         * @see coyote_edge_header_meta() - hooked with 10
         * @see edgt_user_scalable_meta() - hooked with 10
         */
        do_action('coyote_edge_header_meta');
        ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php 
if (coyote_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
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
		<div class="edgtf-content">
			<div class="edgtf-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="edgtf-full-width">
					<div class="edgtf-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($coyote_edge_sidebar == 'default')||($coyote_edge_sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('coyote_edge_page_after_content'); ?>
							<?php elseif($coyote_edge_sidebar == 'sidebar-33-right' || $coyote_edge_sidebar == 'sidebar-25-right'): ?>
								<div <?php echo coyote_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1 edgtf-content-left-from-sidebar">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('coyote_edge_page_after_content'); ?>
										</div>
									</div>
									<div class="edgtf-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($coyote_edge_sidebar == 'sidebar-33-left' || $coyote_edge_sidebar == 'sidebar-25-left'): ?>
								<div <?php echo coyote_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="edgtf-column2 edgtf-content-right-from-sidebar">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('coyote_edge_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>