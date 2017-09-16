<?php get_header(); ?>
	<div class="edgtf-container">
	<?php do_action('coyote_edge_after_container_open'); ?>
		<div class="edgtf-container-inner edgtf-404-page">

			<div class="edgtf-page-not-found-part">
				<div class="edgtf-404-text"><?php esc_html_e('404', 'coyote'); ?><span class="edgtf-underscore"></span></div>
			</div>

			<div class="edgtf-page-not-found">
				<h2>
					<?php if(coyote_edge_options()->getOptionValue('404_text')){
						echo esc_html(coyote_edge_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist.', 'coyote');
					} ?>
				</h2>
				<?php
					$params = array();
					if (coyote_edge_options()->getOptionValue('404_back_to_home')){
						$params['text'] = coyote_edge_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__("Back to Home",'coyote');
					}
					$params['type'] = 'outline';
                    $params['color'] = '#fff';
					$params['link'] = esc_url(home_url('/'));
					$params['target'] = '_self';

				if (shortcode_exists('edgtf_button')) {
					echo coyote_edge_execute_shortcode('edgtf_button',$params);
				} else { ?>
					<a href="<?php echo esc_url(home_url('/'))?>" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-outline">
						<span class="edgtf-btn-text"><?php esc_html_e("Back to Home",'coyote')?></span>
					</a>
				<?php } ?>
			</div>
		</div>
		<?php do_action('coyote_edge_before_container_close'); ?>
	</div>
	<?php wp_footer(); ?>